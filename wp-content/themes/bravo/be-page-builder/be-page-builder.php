<?php

// windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester
$fslashed_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
$fslashed_abs = trailingslashit(str_replace('\\','/',ABSPATH));

if(!defined('BE_PAGE_BUILDER_DIR')){
	define('BE_PAGE_BUILDER_DIR', $fslashed_dir);
}

if(!defined('BE_PAGE_BUILDER_URL')){
	define('BE_PAGE_BUILDER_URL', site_url(str_replace( $fslashed_abs, '', $fslashed_dir )));
} 

function get_shortcode_form() {

	global $be_shortcode;
	extract($_POST);

	be_pb_print_form($shortcode);
	
	
	die();
}
function get_shortcode_block() {
	global $be_shortcode;
	extract($_POST);
	$output = '';


	 foreach ($be_shortcode[$shortcode_name]['options'] as $att => $value) {
		if(array_key_exists('content', $value)){
			if($value['content'] == true){
				$has_content = true;
				$content_att = $att;
				break;
			}
		}
		else{
			$has_content = false;
		}
	 }
	 
	 $output .='['.$shortcode_name;
	 if($has_content == true){
	 	foreach ($be_shortcode_atts as $att => $value) {
	 		if($att != $content_att){
	 			if(is_array($value)){
	 				$value = implode(',', $value);
	 			}
	 			$output .=' '.$att.'= "'.$value.'"';
	 		}
	 	}
	 	$output .=' ]'.wpautop(stripslashes_deep($be_shortcode_atts[$content_att])).'[/'.$shortcode_name.']';	
	 }
	 else{
	 	foreach ($be_shortcode_atts as $att => $value) {
				if(is_array($value)){
					$value = implode(',', $value);
				}
				$output .=' '.$att.'= "'.$value.'"';
	 	}
	 	$output .=' ]';
	 }

	

	if($shortcode_name == 'page_module'){		 
 		$page = ' | '.get_the_title($be_shortcode_atts['page_id']);	
 	}
 	else{
 		$page ='';		
 	}

	 if($shortcode_action == 'edit'){
	 	$return = array();
	 	$return['shortcode'] = $output;
	 	$return['page'] = $page;
	 	echo json_encode($return);
	 }
	 else {

		 echo json_encode('<div class="portlet be-pb-element">
			<div class="portlet-header"><span class="control-icon icon-delete" title="Delete"></span><span class="control-icon icon-edit edit-shortcode" title="Edit" data-shortcode="'.$shortcode_name.'" data-action="edit"></span><span class="be-pb-element-name">'.$be_shortcode[$shortcode_name]['name'].$page.'</span></div>
			<pre class="shortcode">'.$output.'</pre>
		</div>'); 
	}
	
	die();
}

function edit_shortcode_form(){
	
	global $be_shortcode;

	$post = stripslashes_deep($_POST);

	$shortcode = $post['shortcode'];

	$pattern = get_shortcode_regex();
	
	preg_match("/$pattern/s", $shortcode, $parsed_value );

	//$parsed_value = preg_replace_callback( "/$pattern/s", 'be_pb_shortcode_parser', $shortcode );

	if (preg_last_error() == PREG_BACKTRACK_LIMIT_ERROR) {
    	print 'Backtrack limit was exhausted!';
	}


	$shortcode_name = $parsed_value[2]; 

	$atts = shortcode_parse_atts($parsed_value[3]);

	if(!empty($parsed_value[5])){
		$content = $parsed_value[5];	
	}
	else{
		$content='';
	}


 be_pb_print_form($shortcode_name, 'edit', $atts, $content);

 die();

}

function be_pb_shortcode_parser($m){
	list($output, $m_one, $tag, $attr_string, $m_four, $content) = $m;
	return $content; 
}

function be_pb_print_form($shortcode_name, $action='generate', $atts = array(), $content='') {
	global $be_shortcode;

	$chosen_shortcode = $be_shortcode[$shortcode_name];
	echo '<h2>'.$chosen_shortcode['name'].'</h2>';
	echo '<form data-shortcode-name="'.$shortcode_name.'">';

	foreach ($chosen_shortcode['options'] as $option_key => $option) {
		$default = isset( $option['default'] ) ? $option['default'] : '';
		if($action == 'edit'){
			if(array_key_exists($option_key, $atts)){
				$att_value = $atts[$option_key];
			}
			else{
				$att_value='';
			}
		}
		else {
			$att_value = $default;
			$content = $default;
		}
		
		echo '<fieldset class="clearfix">';
				if ($option['type'] == 'text' || $option['type'] == 'select')
			$label_class = "padding-top-5";
		else
			$label_class = "padding-top-0";
			echo '<div class="left-section '.$label_class.'"><label for="be_shortcode_atts['.$option_key.']" class="be-pb-label">'.$option['title'].'</label></div>';
		switch ($option['type']) {
				case 'text':
					echo '<div class="right-section"><input type="text" name="be_shortcode_atts['.$option_key.']" id="#'.$option_key.'" value="'.$att_value.'" class="be-shortcode-atts be-pb-text" /></div>';
					break;
				case 'select':		
					echo
					'<div class="right-section"><select name="be_shortcode_atts['.$option_key.']" id="#'.$option_key. '" class="be-shortcode-atts be-pb-select">';
					if(empty($att_value) || $att_value == 'none'){
						echo '<option value="none" disabled="disabled">'.esc_html__('Select', 'bravo').'</option>';
					}
					
					foreach ($option['options'] as $value) {
						echo '<option value="'.$value.'" '.selected( $value, $att_value, false ).'>'.esc_html($value).'</option>';
					}
					echo '</select></div>';
					break;
				case 'tinymce':
					//$content = wpautop($content);
					wp_editor($content, $option_key, array('textarea_name'=> 'be_shortcode_atts['.$option_key.']','editor_class'=>'be-shortcode-atts be-pb-editor', 'quicktags'=>false, 'wpautop'=>false ,'textarea_rows'=>20));
					
					break;
				case 'checkbox':
					echo '<input type="checkbox" name="be_shortcode_atts['.$option_key.']" value="1" class="be-shortcode-atts be-pb-checkbox" '.checked($att_value,'1',false).' />';
					break;	
				case 'multi_check':
					if(empty($att_value)){
						$att_value = array();
					}
					else {
						if(!is_array($att_value)){
							$att_value = explode(',', $att_value);
						}
					}
					echo '<div class="right-section">';
					foreach ($option['options'] as $value) {
						
						$checkbox_option = '<div class="margin-bottom-5"><input type="checkbox" name="be_shortcode_atts['.$option_key.'][]" value="'.$value.'" class="be-shortcode-atts be-pb-checkbox" ';
						if(in_array($value, $att_value)){
							$checkbox_option .= 'checked="checked" />';	
						}
						else{
							$checkbox_option .='/>';
						}
						echo $checkbox_option;
						echo '<label for="'.$value.'">'.$value.'</label></div>';
					}
					echo '</div>';
					break;
				case 'radio':
					echo '<div class="right-section">';
					foreach ($option['options'] as $value) {
						echo '<div class="margin-bottom-5"><input type="radio" name="be_shortcode_atts['.$option_key.'][]" value="'.$value.'" class="be-shortcode-atts be-pb-radio" '.checked($value,$att_value,false).' />';
						echo '<label for="'.$value.'">'.$value.'</label></div>';
					}
					break;
				case 'media':
					if(empty($att_value)){
						$att_value = array();
					}
					else {
						if(!is_array($att_value)){
							$att_value = explode(',', $att_value);
						}
					}									
					echo '<div class="right-section"><a href="#" class="button-secondary btn_browse_files '.$option['select'].'">Browse Files</a>
						<div class="browsed-images-container clearfix be-pb-sortable" data-name="be_shortcode_atts['.$option_key.']">';
						foreach ($att_value as $attachment_id) {
							echo '<div class="seleced-images-wrap">
								<input type="hidden" name="be_shortcode_atts['.$option_key.'][]" value="'.$attachment_id.'">
								<img src="'.wp_get_attachment_url( $attachment_id ).'">
								<span class="remove"></span>
								</div>';
						}
					echo '</div></div>';
					break;
				case 'color':
					echo '<div class="right-section"><input type="text" name="be_shortcode_atts['.$option_key.']" id="#'.$option_key.'" value="'.$att_value.'" class="be-pb-color-field be-shortcode-atts" /></div>';
					break;
				case 'taxo':
					if(empty($att_value)){
						$att_value = array();
					}
					else {
						if(!is_array($att_value)){
							$att_value = explode(',', $att_value);
						}
					}
					echo '<div class="right-section">';
					$taxonomy = get_terms($option['taxonomy']);
					foreach ($taxonomy as $term) {
						
						$checkbox_option = '<div class="margin-bottom-5"><input type="checkbox" name="be_shortcode_atts['.$option_key.'][]" value="'.$term->slug.'" class="be-shortcode-atts be-pb-checkbox" ';
						if(in_array($term->slug, $att_value)){
							$checkbox_option .= 'checked="checked" />';	
						}
						else{
							$checkbox_option .='/>';
						}
						echo $checkbox_option;
						echo '<label for="'.$term->name.'">'.$term->name.'</label></div>';
					}
					echo '</div>';
					break;
				case 'page':
					$pages = get_pages(array('post_type'=>'page'));	
					echo '<div class="right-section"><select name="be_shortcode_atts['.$option_key.']" id="#'.$option_key. '" class="be-shortcode-atts be-pb-select">';
					

					if(empty($att_value) || $att_value == 'none'){
						echo '<option value="none" disabled="disabled">'.esc_html__('Select', 'bravo').'</option>';
					}
					
					foreach ($pages as $page) {
						echo '<option value="'.$page->ID.'" '.selected( $page->ID, $att_value, false ).'>'.esc_html($page->post_title).'</option>';
					}
						
					echo '</select></div>';
					break;															
			}
		echo "</fieldset>";		
	}
	echo '<input type="submit" class="bluefoose-button-light add-shortcode" data-action="'.$action.'" value="Submit" />
	</form>';
}



function save_be_pb_builder(){
	extract($_POST);
	
    if(get_post_meta($post_id,'_be_pb_html',true)){
    	$return['html'] = update_post_meta($post_id,'_be_pb_html',$html);
    }
    else{
    	$return['html'] = add_post_meta($post_id,'_be_pb_html',$html,true);
    }

    if(get_post_meta($post_id,'_be_pb_content',true)){
	
		$return['output']= update_post_meta($post_id,'_be_pb_content',$content);
	}
	else{
		$return['output']= add_post_meta($post_id,'_be_pb_content',$content,true);
	}

	if($return['html'] > 0){
		echo "success";
	}
	else {
		echo "no_changes";
	}
	die();
}


add_action( 'wp_ajax_nopriv_edit_shortcode_form', 'edit_shortcode_form' );
add_action( 'wp_ajax_edit_shortcode_form', 'edit_shortcode_form' );
add_action( 'wp_ajax_nopriv_get_shortcode_form', 'get_shortcode_form' );
add_action( 'wp_ajax_get_shortcode_form', 'get_shortcode_form' );
add_action( 'wp_ajax_nopriv_get_shortcode_block', 'get_shortcode_block' );
add_action( 'wp_ajax_get_shortcode_block', 'get_shortcode_block' );

add_action( 'wp_ajax_save_be_pb_builder', 'save_be_pb_builder' );
add_action( 'wp_ajax_save_be_pb_builder', 'save_be_pb_builder' );

add_action( 'init', 'be_page_builder_init' );

function be_page_builder_init() {

	add_action( 'admin_enqueue_scripts', 'be_page_builder_enqueue');
	function be_page_builder_enqueue() {

		wp_enqueue_media();
		wp_enqueue_script( 'custom-header' );

		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_script('jquery-uniform-js', BE_PAGE_BUILDER_URL.'/js/jquery.uniform.min.js');

		wp_enqueue_script('be-page-builder-js', BE_PAGE_BUILDER_URL.'/js/script.js', array('jquery','jquery-ui-core','jquery-ui-sortable','jquery-ui-draggable','jquery-ui-droppable','jquery-ui-dialog','wp-color-picker','jquery-uniform-js'));

		wp_register_style('be-page-builder', BE_PAGE_BUILDER_URL.'/css/style.css');
		wp_enqueue_style('be-page-builder',array( 'jquery-ui-core', 'jquery-ui-theme' ), '1.8.17');
	} 

	add_action( 'add_meta_boxes', 'be_page_builder_add_custom_box' ); 
	function be_page_builder_add_custom_box(){

	    $screens = array( 'page' );
	    foreach ($screens as $screen) {
	        add_meta_box(
	            'be-page-builder',
	            __( 'Page Builder', 'bravo' ),
	            'be_page_builder_custom_box',
	            $screen,
	            'normal',
	            'high'
	        );
	    }

	}

	function be_page_builder_custom_box() {
			global $be_shortcode;
		?>
		<input type="hidden" id="ajax_url" value="<?php echo home_url(); ?>/wp-admin/admin-ajax.php" />
		<h4><?php _e('Add Page Module','bravo'); ?> </h4>
		<p id="be-pb-intro"><?php _e('Start building your page by adding a new module. Click on any of the buttons below to create a new shortcode module.','bravo'); ?></p>
		<!-- <div id="be-page-builder-controls"><a href="#" class="bluefoose-button-dark" id="be-pb-add-row">Add Row</a></div> -->
  			<?php
  				foreach ($be_shortcode as $shortcode_key => $shortcode) {
  					echo '<div class="bluefoose-ui-button-light be-pb-choose-shortcode">
					          <button class="be-icon-'.$shortcode['name'].' insert-shortcode bluefoose-button-light" data-shortcode="'.$shortcode_key.'" data-action="insert" />
					          	'.$shortcode['name'].'
					          </button>
					        </div>';
  				}
  			?>
		<div id="shortcodes" title="Choose a Shortcode Module" style="display:none;">

			<div id="shortcode-form"></div>
		</div>

		<div id="edit-shortcode" title="Edit Shortcode Module"></div>	
		
		<!--   Confirm Dialog  -->
		<div id="dialog-confirm" title="Empty the recycle bin?" style="display:none;">
			<p>
				<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
				<?php _e('This items will be permanently deleted and cannot be recovered. Are you sure?','bravo'); ?>
			</p>
		</div>
		
		<!--   Notification Dialog  -->
		<div id="dialog-notification">
			
		</div>

		<div id="be-pb-main" class="be-pb-sortable">
			<?php 
				global $post_ID;
				$modules = get_post_meta($post_ID,'_be_pb_html',true);
			?>
			<div class="be-pb-row-wrap clearfix">
					<div class="be-pb-row be-pb-sortable clearfix">
						<div class="be-pb-col-wrap one_col" data-col-name="one_col">
							<div class="be-pb-column"><?php echo $modules; ?></div>
						</div>
					</div>	

			</div>
		</div>	

		<div id="be-pb-save-wrap"><a href="#" class="bluefoose-button-light" id="be-pb-save">Save</a><span id="be-pb-loader"></span></div>

		<?php	
		
	} 

}

?>