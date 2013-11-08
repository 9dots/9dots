<?php
/**************************************
			CONTENT FORMATING
**************************************/
/***********ONE HALF**************/
/*
[one_half]	your content here [/one_half]
[one_half_last]	your content here [/one_half_last]
*/	
add_shortcode('one_half','bravo_one_half');
function bravo_one_half($atts,$content){
	$output ='';
	$output='<div class="one-half column-block">'.do_shortcode($content).'</div>';
	return $output;
}
add_shortcode('one_half_last','bravo_one_half_last');
function bravo_one_half_last($atts,$content){
	$output ='';
	$output .='<div class="one-half column-block last">'.do_shortcode($content).'</div>';
	$output .='<div class="clear"></div>';
	return $output;
}
/*
[one_third]	your content here [/one_third]
[one_third_last]	your content here [/one_third_last]
*/	
add_shortcode('one_third','bravo_one_third');
function bravo_one_third($atts,$content){
	$output ='';
	$output='<div class="one-third column-block">'.do_shortcode($content).'</div>';
	return $output;
}
add_shortcode('one_third_last','bravo_one_third_last');
function bravo_one_third_last($atts,$content){
	$output ='';
	$output .='<div class="one-third column-block last">'.do_shortcode($content).'</div>';
	$output .='<div class="clear"></div>';
	return $output;
}
/*
[one_fourth]	your content here [/one_fourth]
[one_fourth_last]	your content here [/one_fourth_last]
*/	
add_shortcode('one_fourth','bravo_one_fourth');
function bravo_one_fourth($atts,$content){
	$output ='';
	$output='<div class="one-fourth column-block">'.do_shortcode($content).'</div>';
	return $output;
}
add_shortcode('one_fourth_last','bravo_one_fourth_last');
function bravo_one_fourth_last($atts,$content){
	$output ='';
	$output .='<div class="one-fourth column-block last">'.do_shortcode($content).'</div>';
	$output .='<div class="clear"></div>';
	return $output;
}
/*
[one_fifth]	your content here [/one_fifth]
[one_fifth_last]	your content here [/one_fifth_last]
*/	
add_shortcode('one_fifth','bravo_one_fifth');
function bravo_one_fifth($atts,$content){
	$output ='';
	$output='<div class="one-fifth column-block">'.do_shortcode($content).'</div>';
	return $output;
}
add_shortcode('one_fifth_last','bravo_one_fifth_last');
function bravo_one_fifth_last($atts,$content){
	$output ='';
	$output .='<div class="one-fifth column-block last">'.do_shortcode($content).'</div>';
	$output .='<div class="clear"></div>';
	return $output;
}

add_shortcode('two_third','bravo_two_third');
function bravo_two_third($atts,$content){
	$output ='';
	$output='<div class="two-third column-block">'.do_shortcode($content).'</div>';
	return $output;
}
add_shortcode('two_third_last','bravo_two_third_last');
function bravo_two_third_last($atts,$content){
	$output ='';
	$output .='<div class="two-third column-block last">'.do_shortcode($content).'</div>';
	$output .='<div class="clear"></div>';
	return $output;
}

add_shortcode('three_fourth','bravo_three_fourth');
function bravo_three_fourth($atts,$content){
	$output ='';
	$output='<div class="three-fourth column-block">'.do_shortcode($content).'</div>';
	return $output;
}
add_shortcode('three_fourth_last','bravo_three_fourth_last');
function bravo_three_fourth_last($atts,$content){
	$output ='';
	$output .='<div class="three-fourth column-block last">'.do_shortcode($content).'</div>';
	$output .='<div class="clear"></div>';
	return $output;
}

/**************************************
			Contact Form
**************************************/
add_shortcode('contact','bravo_contact');
function bravo_contact($atts){
$output ="";
$output .='<div class="contact-form-wrap contact_form"><form class="contact">
				<div class="one-third">
					<input type="text" name="contact_name" placeholder="'.__('Name','bravo').'" />	
				</div>
				<div class="one-third">
					<input type="text" name="contact_email" placeholder="'.__('Email','bravo').'" />		
				</div>
				<div class="one-third last">
					<input type="text" name="contact_website" placeholder="'.__('Website','bravo').'" />	
				</div>
				<div class="clear"></div>
				<div>
					<textarea name="contact_comment" placeholder="'.__('Message','bravo').'"></textarea>
				</div>
				<div>
					<input type="submit" name="submit" value="'.__('Send','bravo').'" class="uppercase contact_submit" />
				</div>
				<div class="notification"><div class="contact_status"></div></div>
			</form></div>';
return $output;
}
/**************************************
			SEPARATOR
**************************************/

add_shortcode('separator','bravo_separator');
function bravo_separator($atts){
	extract(shortcode_atts(array('color'=>'#222222'),$atts));
	if($color == 'none')
		$color = '#222222';
	return '<hr style="background: '.$color.'"/>';
}
/**************************************
			SUB TITLE
**************************************/

add_shortcode('sub_title','bravo_sub_title');
function bravo_sub_title($atts, $content){
	extract(shortcode_atts(array('color'=>'#cdd0d2','align'=> 'left'),$atts));
	return '<h6 class="sub-title" style="color: '.$color.';text-align:'.$align.'">'.do_shortcode($content).'</h6>';
}
/**************************************
			TABS
**************************************/
add_shortcode( 'tabs', 'bravo_tabs' );
function bravo_tabs( $atts, $content ){
	$GLOBALS['tabs_cnt'] = 0;
	$tabs_cnt=0;
	$content=do_shortcode( $content );
		
	if( is_array( $GLOBALS['tabs'] ) ){
		foreach( $GLOBALS['tabs'] as $tab ){
			$tabs_cnt++;
			$tabs[] = '<li><a href="#fragment'.$tabs_cnt.'" >'.$tab['title'].'</a></li>';
			$panes[] = '<div id="fragment'.$tabs_cnt.'"><p>'.$tab['content'].'</p></div>';
		}
		$return = "\n".'<div class="tabs"><ul class="clearfix">'.implode( "\n", $tabs ).'</ul>'.implode( $panes ).'</div>'."\n";
	}
	return $return;
}
add_shortcode( 'tab', 'bravo_tab' );
function bravo_tab( $atts, $content ){
	$content= do_shortcode($content);
	extract($atts);
	$x = $GLOBALS['tabs_cnt'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tabs_cnt'] ), 'content' =>  $content);
	$GLOBALS['tabs_cnt']++;
}		
/**************************************
			ACCORDIAN
**************************************/
add_shortcode( 'accordian', 'bravo_accordian' );
function bravo_accordian( $atts, $content ){
	return '<div class="accordion">'.do_shortcode($content).'</div>';
}
add_shortcode( 'toggle', 'bravo_toggle' );
function bravo_toggle( $atts, $content ){
	extract(shortcode_atts(array('title'=>''),$atts));
	return '<h3>'.$title.'</h3><div>'.do_shortcode($content).'</div>';
}
/**************************************
			NOTIFICATION
**************************************/
add_shortcode( 'notification', 'bravo_notification' );
function bravo_notification( $atts, $content ){
	extract(shortcode_atts(array('style'=>'black'),$atts));
	return '<div class="notification '.$style.'">'.do_shortcode($content).'<span class="close"></span></div>';
}
/**************************************
			Buttons
**************************************/
add_shortcode( 'button', 'bravo_button' );
function bravo_button( $atts, $content ){
	extract(shortcode_atts(array('color'=>'#000000','hover'=>'#000000','url'=>'http://www.google.com/'),$atts));
	$background_color="";
    if(!empty($color)){
    	$background_color = "background-color:".$color;
    }	
	return '<a class="button" data-hover-color="'.$hover.'" data-default-color="'.$color.'" href="'.$url.'" style="'.$background_color.'">'.do_shortcode($content).'</a>';
}
/**************************************
		FULL SCREEN SLIDER
**************************************/
add_shortcode( 'full_screen_slider', 'bravo_full_screen_slider' );
function bravo_full_screen_slider( $atts, $content ){
	extract(shortcode_atts(array(
        'slider_categories'=>'',
		'padding_top'=>'160', 
		'padding_bottom'=>'160',        

	),$atts));
	$output= "";
	if(empty($slider_categories))
		$tax_query = '';
	else
		$tax_query = array( array('taxonomy' => 'slider_categories',  'field' => 'slug', 'terms' => explode(',', $slider_categories), 'operator' => 'IN')  );
	$args = array(
		'post_type'=>'slider',
		'tax_query' => $tax_query,
		'posts_per_page' => -1
	);
	$flex_slides = new WP_Query($args);
	while ( $flex_slides->have_posts() ) :$flex_slides->the_post();
		if (has_post_thumbnail(get_the_ID()) ) {
			$attachment_id = get_post_thumbnail_id(get_the_ID());
			$attachment_info=wp_get_attachment_image_src( $attachment_id,'full');
			$attachment_url = $attachment_info[0];
		}
		$temp_array ='<div class="slidecontent">'.apply_filters('the_content', get_the_content(get_the_ID())).'</div>';
		if(get_post_meta(get_the_ID(),'bravo-more-link',true)) {
			$temp_array.='<a class="uppercase read-more-btn" href="'.get_post_meta(get_the_ID(),'bravo-more-link',true).'">'.__('Continue Reading','bravo').'</a>';
		}
		if(empty($attachment_url))
			$attachment_url = '';
		$output .= '<div class="slider parallax"><div class="background-animate" style="background: url('.$attachment_url.') 50% 0 no-repeat scroll;"></div><div class="content-area orbit-caption">'.$temp_array.'</div></div>';
	endwhile;
	wp_reset_query();
	return '<div class="full-screen-slider-wrap"><div class="full-width-slider">'.$output.'</div></div>';
}
add_shortcode( 'full_screen_slider_module', 'bravo_full_screen_slider_module' );
function bravo_full_screen_slider_module( $atts, $content ) {
	extract(shortcode_atts(array('slider_categories'=>'', 'padding_top'=>'160', 'padding_bottom'=>'160',),$atts));
	return '<section class="section full-screen-slider no-parallax">'.do_shortcode('[full_screen_slider slider_categories="'.$slider_categories.'" padding_top="'.$padding_top.'" padding_bottom="'.$padding_bottom.'"]').'</section>';
}
/**************************************
			SLIDER
**************************************/
add_shortcode('flex_slider','bravo_flex_slider');
function bravo_flex_slider($atts){
	extract(shortcode_atts(array(
        'category'=>'',
        'animation'=> 'fade',
        'auto_slide'=> 0,                //Boolean: Animate slider automatically
		'slide_interval'=> '1000',           //Integer: Set the speed of the slideshow cycling, in milliseconds
    ),$atts));
    $output ="";
    $output .='<div class="home-slider clearfix flex-loading"><i class="icon-cog icon-spin"></i><div class="flexslider content-flexslider" data-animation="'.$animation.'" data-auto-slide='.$auto_slide.' data-slide-interval="'.$slide_interval.'"><ul class="slides">';
    if(empty($category))
    	$tax_query = '';
    else
    	$tax_query = array( array('taxonomy' => 'slider_categories',  'field' => 'slug', 'terms' => explode(',', $category), 'operator' => 'IN')  );
	$args = array(
        'post_type'=>'slider',
        'tax_query' => $tax_query,
		'posts_per_page' => -1
    );
	$flex_slides = new WP_Query($args);
	while ( $flex_slides->have_posts() ) :$flex_slides->the_post();
        $output .='<li>';
		if(get_post_meta(get_the_ID(),'slider_video_select',true)) {
			$url=get_post_meta(get_the_ID(),'slider_video_url',true);
			$videoType=be_video_type($url);
			if($videoType == "youtube") {
				if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
					$video_id = $match[1];
				}
				$output.='<iframe width="940" height="450" src="http://www.youtube.com/embed/'.$video_id.'" allowfullscreen></iframe>';
			}
			elseif($videoType == "vimeo") {
				sscanf(parse_url($url, PHP_URL_PATH), '/%d', $video_id);
				$output.='<iframe src="http://player.vimeo.com/video/'.$video_id.'" width="500" height="281" allowFullScreen></iframe>';
			}
			if(get_post_meta(get_the_ID(),'slider_show_caption',true)) {
				$output .=  '<div class="flex-caption"><h3 class="flex-slide-title alt_bg_color">'.get_the_title().'</h3>';
			}
		}
		else {
			if (has_post_thumbnail(get_the_ID()) ) { // check if the post has a Post Thumbnail assigned to it.
				$attachment_id = get_post_thumbnail_id(get_the_ID());
				$attachment_info=wp_get_attachment_image_src( $attachment_id,'fullwidth');
				$attachment_url = $attachment_info[0];
				$output .=  '<img src="'.$attachment_url.'" alt="" />';
				if(get_post_meta(get_the_ID(),'slider_show_caption',true)) {
					$output .=  '<div class="flex-caption"><h3 class="flex-slide-title alt_bg_color">'.get_the_title().'</h3></div>';
				}
			}
		}
        $output .='</li>';
	endwhile;
	wp_reset_query();
    $output .='</ul><ul class="flex-direction-nav flex-direction-nav-container"><li><a class="flex-prev background_animate icon-chevron-left" href="#"></a></li><li><a class="flex-next background_animate icon-chevron-right" href="#"></a></li></ul></div></div>';
    return $output;
}
/**************************************
		ATTACHMENT SLIDER
**************************************/
add_shortcode('attachments','bravo_attachments');
function bravo_attachments($atts){
	extract(shortcode_atts(array(
        'animation'=> 'slide',
        'auto_slide'=> 0,                //Boolean: Animate slider automatically
		'slide_interval'=> '1000',           //Integer: Set the speed of the slideshow cycling, in milliseconds
    ),$atts));
    $output ="";
	$args = array(
		'numberposts'     => -1,
		'post_type' => 'attachment',
		'post_parent' => get_the_ID(),
		'exclude' => array(get_post_thumbnail_id(get_the_ID())),
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby' => 'menu_order'
	);
	$attachments = get_posts($args);
	if($attachments) {
		$output .='<div class="home-slider clearfix"><div class="flexslider content-flexslider" data-animation="'.$animation.'" data-auto-slide='.$auto_slide.' data-slide-interval="'.$slide_interval.'"><ul class="slides">';
		foreach ($attachments as $attachment) {
			$image_attributes = wp_get_attachment_image_src( $attachment->ID,'full',true );
			$output .='<li>';
			$output .=  '<img src="'.$image_attributes[0].'" alt="" />';
			$output .='</li>';
		}
		$output .='</ul><ul class="flex-direction-nav flex-direction-nav-container"><li><a class="flex-prev background_animate icon-angle-left" href="#"></a></li><li><a class="flex-next background_animate icon-angle-right" href="#"></a></li></ul></div></div>';
	}
    return $output;
}
/**************************************
			PORTFOLIO
**************************************/

/********* Full Width Portfolio ******/
add_shortcode('full_width_portfolio','bravo_full_width_portfolio');
function bravo_full_width_portfolio($atts =null){
	$args = array (
		'post_type' => 'portfolio',
		'showposts' => -1,
		'orderby' => 'menu_order',
		'order'=>'ASC'
	);
	$output ='';
	$output .='<div class="portfolio-wrapper full-screen-portfolio">';
	$terms = get_terms('portfolio_categories');
	if($terms) {
		$output .='<div class="portfolio-filter full-width clearfix"><a href="#" class="filter current" data-id="element">'.__('All','bravo').'</a>';
		foreach ($terms as $term) {
			$output.='<a href="#" class="filter" data-id="'.$term->slug.'">'.$term->name.'</a>';
		}
		$output .='</div>';
	}
	$output .='<div class="portfolio-container clearfix full-width">';
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$terms=wp_get_object_terms( get_the_ID(), 'portfolio_categories' );
		$category="";
		$taxonomies=get_the_term_list( get_the_ID(), 'portfolio_categories', '', ' / ', '' );
		$taxonomies = strip_tags( $taxonomies );
		foreach ($terms as $term) {
			$category.=$term->slug." ";
		}
		$output .='<div class="element '.$category.'" data-symbol="Hg" data-category="transition">';
		$attachment_images_src=wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'portfolio-thumbnail');
		$attachment_url = $attachment_images_src[0];
	// 	if($attachment_url)
	// 		$output .='<a href="'.get_permalink(get_the_ID()).'" class="image-wrap thumb-wrap"><img src="'.$attachment_url.'" alt="'.get_the_title().'" title="'.get_the_title().'" /><div class="thumb-overlay"><div class="thumb-title"><h6>'.get_the_title().'</h6></div></div><div class="filter-overlay"></div></a>';
	// 	$output .='</div>';
	// endwhile;
		if($attachment_url):
			$thumb_options = get_post_meta(get_the_ID(),'bravo_portfolio_thumb_link_options',true);
			$target ='';
			if(!empty($thumb_options) && $thumb_options == 'lightbox') {
				$thumb_class = 'lightbox';
			} else {
				$thumb_class = '';
				if($thumb_options == 'single_page') {
					$link_to = get_permalink(get_the_ID());
				} else { 
					$link_to = get_post_meta(get_the_ID(), 'bravo_portfolio_external_link',true);
					$target = 'target="_blank"';
				}
			}
			$output .= '<a href="'.$link_to.'" class="image-wrap thumb-wrap '.$thumb_class.'" '.$target.'>';
			$output .= '<img src="'.$attachment_url.'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
			$output .= '<div class="thumb-overlay">';
			$output .= '<div class="thumb-title"><h6>'.get_the_title().'</h6></div>';
			$output .= '</div>';		
			$output .= '<div class="filter-overlay"></div>';
			$output .= '</a>';
			if( !empty($thumb_options) && $thumb_options == 'lightbox' ):
				$output .='<div class="popup-gallery">';
				$attachment_args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' => 'any', 'post_parent'=> get_the_ID(), 'orderby' => 'menu_order' , 'order'=>'ASC' );
				$attachments = get_posts( $attachment_args );
				
				foreach ( $attachments as $att ) { 
					$video_url = get_post_meta( $att->ID, 'bravo_featured_video_url', true );
					$mfp_class='mfp-image';
					if( ! empty( $video_url ) ) {
						$url = $video_url;
						$mfp_class = 'mfp-iframe';
					} else {
						$url = wp_get_attachment_image_src($att->ID,'full');
						$url = $url[0];
					}
					$output .='<a href="'.$url.'" class="'.$mfp_class.'"></a>';
				}
				$output .= '</div>';
			endif;				
		endif;
		$output .='</div>';
	endwhile;		
	wp_reset_query();
	$output .='</div></div>';
	return $output;
}
add_shortcode('full_width_portfolio_module','bravo_full_width_portfolio_module');
function bravo_full_width_portfolio_module($atts){
	extract(shortcode_atts(array(
        'is_custom_bg'=>'',
		'background_image'=>'', 
		'background_pattern'=>'', 
		'background_color'=>'', 
		'background_repeat'=>'', 
		'background_attachment'=>'', 
		'background_position'=>'', 
		'padding_top'=>'', 
		'padding_bottom'=>'',
		'is_parallax_section'=>''
    ),$atts));
	if($is_parallax_section)
		$parallax = 'parallax';
	else
		$parallax = 'no-parallax';
	if($is_custom_bg)
		$style = 'background: '.$background_color.' url('.attachment_id_to_src($background_image).') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	else
		$style = 'background: '.$background_color.' url('.$is_custom_bg.') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	return '<section class="section '.$parallax.'" style="'.$style.'">'.bravo_full_width_portfolio().'</section>';
}

/********* Centered Portfolio ******/

add_shortcode('three_column_portfolio','bravo_three_column_portfolio');
function bravo_three_column_portfolio($atts){
	$args = array (
		'post_type' => 'portfolio',
		'showposts' => -1,
		'orderby' => 'menu_order',
		'order'=>'ASC'
	);
	$output ='';
	$output .='<div class="centered-screen-portfolio portfolio-wrapper clearfix">';
	$terms = get_terms('portfolio_categories');
	if($terms) {
		$output .='<div class="portfolio-filter left"><h6><a href="#" class="filter current" data-id="element">'.__('All','bravo').'</a></h6>';
		foreach ($terms as $term) {
			$output.='<h6><a href="#" class="filter" data-id="'.$term->slug.'">'.$term->name.'</a></h6>';
		}
		$output .='</div>';
	}
	$output .='<div class="portfolio-sidebar left last"><div class="portfolio-container clearfix centered-width">';
	$the_query = new WP_Query( $args );
	while ( $the_query->have_posts() ) : $the_query->the_post();
		$terms=wp_get_object_terms( get_the_ID(), 'portfolio_categories' );
		$category="";
		$taxonomies=get_the_term_list( get_the_ID(), 'portfolio_categories', '', ' / ', '' );
		$taxonomies = strip_tags( $taxonomies );
		foreach ($terms as $term) {
			$category.=$term->slug." ";
		}
		$output .='<div class="element '.$category.'" data-symbol="Hg" data-category="transition">';
		$attachment_images_src=wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'portfolio-thumbnail');
		$attachment_url = $attachment_images_src[0];
		// if($attachment_url) {
		// 	$output .='<a href="'.get_permalink(get_the_ID()).'" class="image-wrap thumb-wrap"><img src="'.$attachment_url.'" alt="'.get_the_title().'" title="'.get_the_title().'" /><div class="thumb-overlay"><div class="thumb-title"><h6>'.get_the_title().'</h6></div></div><div class="filter-overlay"></div></a>';
		// }
		if($attachment_url):
			$thumb_options = get_post_meta(get_the_ID(),'bravo_portfolio_thumb_link_options',true);
			if(!empty($thumb_options) && $thumb_options == 'lightbox') {
				$thumb_class = 'lightbox';
			} else {
				$thumb_class = '';
				if($thumb_options == 'single_page') {
					$link_to = get_permalink(get_the_ID());
				} else { 
					$link_to = get_post_meta(get_the_ID(), 'bravo_portfolio_external_link',true);
				}
			}
			$output .= '<a href="'.$link_to.'" class="image-wrap thumb-wrap '.$thumb_class.'">';
			$output .= '<img src="'.$attachment_url.'" alt="'.get_the_title().'" title="'.get_the_title().'" />';
			$output .= '<div class="thumb-overlay">';
			$output .= '<div class="thumb-title"><h6>'.get_the_title().'</h6></div>';
			$output .= '</div>';
			if( !empty($thumb_options) && $thumb_options == 'lightbox' ):
				$output .='<div class="popup-gallery">';
				$attachment_args = array( 'post_type' => 'attachment', 'posts_per_page' => -1, 'post_status' => 'any', 'post_parent'=> get_the_ID() );
				$attachments = get_posts( $attachment_args );
				
				foreach ( $attachments as $post ) { 
					$video_url = get_post_meta( $post->ID, 'bravo_featured_video_url', true );
					$mfp_class='mfp-image';
					if( ! empty( $video_url ) ) {
						$url = $video_url;
						$mfp_class = 'mfp-iframe';
					} else {
						$url = wp_get_attachment_image_src($post->ID,'full');
						$url = $url[0];
					}
					$output .='<a href="'.$url.'" class="'.$mfp_class.'"></a>';
				}
				$output .= '</div>';
			endif;			
			$output .= '<div class="filter-overlay"></div>';
			$output .= '</a>';
		endif;
		$output .='</div>';
	endwhile;
	wp_reset_postdata();
	$output .='</div></div></div>';
	return $output;
}
add_shortcode('three_column_portfolio_module','bravo_three_column_portfolio_module');
function bravo_three_column_portfolio_module($atts){
	extract(shortcode_atts(array(
		'is_custom_bg'=>'',
		'background_image'=>'', 
		'background_pattern'=>'', 
		'background_color'=>'', 
		'background_repeat'=>'', 
		'background_attachment'=>'', 
		'background_position'=>'', 
		'padding_top'=>'', 
		'padding_bottom'=>'',
		'is_parallax_section'=>''
    ),$atts));
	if($is_parallax_section)
		$parallax = 'parallax';
	else
		$parallax = 'no-parallax';
	if($is_custom_bg)
		$style = 'background: '.$background_color.' url('.attachment_id_to_src($background_image).') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	else
		$style = 'background: '.$background_color.' url('.$is_custom_bg.') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	return '<section class="section '.$parallax.'" style="'.$style.'"><div class="content-area">'.do_shortcode('[three_column_portfolio]').'</div></section>';
}
/**************************************
			Blog
**************************************/
add_shortcode('blog','bravo_blog');
function bravo_blog($atts) {
	$output ='';
	$i=0;
	global $paged;
	if(!(is_category() || is_archive() || is_tag() || is_search())) {
		query_posts('post_type=post&paged='.$paged);
	}
	if( have_posts() ) {
		$output .='<div class="blog-posts-wrap"><div class="blog-posts clearfix centered-width">';
		while (have_posts() ) : the_post();
			$format = get_post_format();
			switch ($format) {
				case "image":
					$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'blog-posts');
					$url = $thumb['0'];
					if($url) {
						$output .='<a href="'.get_permalink(get_the_ID()).'" class="image-wrap">';
						$output .='<img src="'.$url.'" alt="" />';
						$output .='</a>';
					}
					$output .='<div class="blog-post-content-area-wrap">';
					$output .='<div class="blog-post-content-area">';
					$output .='<h6 class="blog-title text-align-center"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
					$output .='<p class="text-align-center">';
					$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
					$output .='<span class="blog-detail-sep"> | </span>';
					$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
					$output .='</p>';
					$output .='</div>';
					$output .='</div>';
					$output .='</div>';
					break;
				case "video":
					$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
					//$output .='<a href="'.get_permalink(get_the_ID()).'" class="image-wrap">';
					$url=get_post_meta(get_the_ID(),'video_url',true);
					if(!empty($url)) {
						$videoType=be_video_type($url);
						if($videoType == "youtube") {
							if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
								$video_id = $match[1];
							}
							$output.='<iframe width="940" height="450" src="http://www.youtube.com/embed/'.$video_id.'" allowfullscreen></iframe>';
						}
						elseif($videoType == "vimeo") {
							sscanf(parse_url($url, PHP_URL_PATH), '/%d', $video_id);
							$output.='<iframe src="http://player.vimeo.com/video/'.$video_id.'" width="500" height="281" allowFullScreen></iframe>';
						}
						else{
							$poster = '';
							if(has_post_thumbnail()){
								$id = get_post_thumbnail_id(get_the_ID());
								$img_src = wp_get_attachment_image_src( $attachment_id, 'blog-posts');
								$poster = 'poster="'.$img_src[0].'"';
							}
							$output .='<video  class="custom-video" src="'.$url.'" '.$poster.' controls="controls"></video>';
						}
					}
					//$output .='</a>';
					$output .='<div class="blog-post-content-area-wrap">';
					$output .='<div class="blog-post-content-area">';
					$output .='<h6 class="blog-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
					$output .='<p>';
					$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
					$output .='<span class="blog-detail-sep"> | </span>';
					$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
					$output .='</p>';
					$output .='<hr />';
					$output .='<div class="blog-post-content">';
					$output .= get_the_excerpt();
					$output .='</div>';
					$output .='<a href="'.get_permalink(get_the_ID()).'" class="blog-read-more" >'.__('Continue Reading','bravo').'</a>';
					$output .='</div>';
					$output .='</div>';
					$output .='</div>';
					break;
					case "audio":
						$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
						$output .='<div class="image-wrap">';
						$url=get_post_meta(get_the_ID(),'audio_url',true);
						if(!empty($url)) {
							$output .='<audio class="audio" src="'.$url.'" controls="controls"></audio>';
						}
						$output .='</div>';
						$output .='<div class="blog-post-content-area-wrap">';
						$output .='<div class="blog-post-content-area">';
						$output .='<h6 class="blog-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
						$output .='<p>';
						$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
						$output .='<span class="blog-detail-sep"> | </span>';
						$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
						$output .='</p>';
						$output .='<hr />';
						$output .='<div class="blog-post-content">';
						$output .= get_the_excerpt();
						$output .='</div>';
						$output .='<a href="'.get_permalink(get_the_ID()).'" class="blog-read-more" >'.__('Continue Reading','bravo').'</a>';
						$output .='</div>';
						$output .='</div>';
						$output .='</div>';
						break;
				case "gallery":
					$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
					$args = array(
						'post_type' => 'attachment',
						'numberposts' => -1,
						'post_status' => null,
						'post_parent' => get_the_ID()
					);
					$attachments = get_post_meta(get_the_ID(),'gal_post_format');
					
					if(!empty($attachments)) {
						$output .='<div class="home-slider flex-loading clearfix">';
						$output .='<div class="flexslider blog-flexslider">';
						$output .='<ul class="slides">';
						foreach ( $attachments as $attachment_id ) {
							$output .='<li>';
							$attach_img=wp_get_attachment_image_src($attachment_id, 'blog-posts');
							$output .='<img src="'.$attach_img[0].'" alt="" />';
							$output .='</li>';
						}
						$output .='</ul>';
						$output .='</div>';
						$output .='</div>';
					}
					$output .='<div class="blog-post-content-area-wrap">';
					$output .='<div class="blog-post-content-area">';
					$output .='<h6 class="blog-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
					$output .='<p>';
					$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
					$output .='<span class="blog-detail-sep"> | </span>';
					$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
					$output .='</p>';
					$output .='<hr />';
					$output .='<div class="blog-post-content">';
					//$content = get_the_content(get_the_ID());
					$output .= get_the_excerpt(); //get_the_content(get_the_ID());
					$output .='</div>';
					$output .='<a href="'.get_permalink(get_the_ID()).'" class="blog-read-more" >'.__('Continue Reading','bravo').'</a>';
					$output .='</div>';
					$output .='</div>';
					$output .='</div>';
					break;
				case "quote":
					$output .='<div class="'.implode(' ',get_post_class('blog-post')).' quote">';
					$output .='<div class="blog-post-content-area-wrap">';
					$output .='<div class="blog-post-content-area">';
					$output .='<h6 class="blog-title text-align-center"><a href="'.get_permalink(get_the_ID()).'">"'.get_post_meta(get_the_ID(),'quote_title',true).'"</a></h6>';
					$output .='<p class="quote-author text-align-center"><a href="'.get_post_meta(get_the_ID(),'quote_author_link',true).'">'.get_post_meta(get_the_ID(),'quote_author',true).'</a></p>';
					$output .='<p class="text-align-center">';
					$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
					$output .='<span class="blog-detail-sep"> | </span>';
					$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
					$output .='</p>';
					$output .='</div>';
					$output .='</div>';
					$output .='</div>';
					break;
				case "link":
					$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
					$output .='<div class="blog-post-content-area-wrap">';
					$output .='<div class="blog-post-content-area">';
					$output .='<h6 class="blog-title text-align-center"><a href="'.get_post_meta(get_the_ID(),'link_url',true).'" target="_blank">'.get_the_title().'</a></h6>';
					$output .='<p class="text-align-center">';
					$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
					// $output .='<span class="blog-detail-sep"> | </span>';
					// $output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
					$output .='</p>';
					$output .='</div>';
					$output .='</div>';
					$output .='</div>';
					break;					
				case "aside":
					$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
					$output .='<div class="blog-post-content-area-wrap">';
					$output .='<div class="blog-post-content-area">';
					$output .='<p>';
					$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
					$output .='</p>';
					$output .='<hr />';
					$output .='<div class="blog-post-content">';
					$output .= get_the_excerpt();
					$output .='</div>';
					$output .='</div>';
					$output .='</div>';
					$output .='</div>';
					break;
				default :
					$output .='<div class="'.implode(' ',get_post_class('blog-post')).'">';
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'blog-posts');
					$url = $thumb['0'];
					if($url) {
						$output .='<a href="'.get_permalink(get_the_ID()).'" class="image-wrap">';
						$output .='<img src="'.$url.'" alt="" />';
						$output .='</a>';
					}
					$output .='<div class="blog-post-content-area-wrap">';
					$output .='<div class="blog-post-content-area">';
					$output .='<h6 class="blog-title"><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h6>';
					$output .='<p>';
					$output .='<span class="recent-post-time">'.get_the_date( "F j, Y" ).'</span>';
					$output .='<span class="blog-detail-sep"> | </span>';
					$output .='<a href="'.get_permalink(get_the_ID()).'" class="recent-post-comment-count">'.get_comments_number().' '.__('Comments','bravo').'</a>';
					$output .='</p>';
					$output .='<hr />';
					$output .='<div class="blog-post-content">';

					$output .= get_the_excerpt();
					$output .='</div>';
					$output .='<a href="'.get_permalink(get_the_ID()).'" class="blog-read-more" >'.__('Continue Reading','bravo').'</a>';
					$output .='</div>';
					$output .='</div>';
					$output .='</div>';
					break;
			}
			$i++;
		endwhile;
		$output .='</div>';
		$count_posts = wp_count_posts('post');
		if(!(is_category() || is_archive() || is_tag() || is_search()))
			$output .='<div class="show-more-post-btn clearfix trigger_infinite_scroll" data-paged="2" data-page-id="" data-posts-count="'.($count_posts->publish-$i).'"><span class="show-more">'.__('Show More Posts','bravo').'</span><span class="post-page-number left">'.($count_posts->publish-$i).__(' Posts Remaining','bravo').'</span><span class="post-page-count right"><i class="icon-cog icon-spin"></i></span></div><div class="notification yellow blog-notify">No more posts to Load</div></div>';
	}
	else
		$output .='<p class="inner-content">'.__('Apologies, but no results were found. Perhaps searching will help find a related post.','bravo').'</p>';
	wp_reset_query();
	wp_reset_postdata();
	return $output;
}
add_shortcode('blog_module','bravo_blog_module');
function bravo_blog_module($atts) {
	extract(shortcode_atts(array(
		'is_custom_bg'=>'',
		'background_image'=>'', 
		'background_pattern'=>'', 
		'background_color'=>'', 
		'background_repeat'=>'', 
		'background_attachment'=>'', 
		'background_position'=>'', 
		'padding_top'=>'', 
		'padding_bottom'=>'',
		'is_parallax_section'=>''
    ),$atts));
	if($is_parallax_section)
		$parallax = 'parallax';
	else
		$parallax = 'no-parallax';
	if($is_custom_bg)
		$style = 'background: '.$background_color.' url('.attachment_id_to_src($background_image).') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	else
		$style = 'background: '.$background_color.' url('.$is_custom_bg.') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	return '<section class="section '.$parallax.' blog_module" style="'.$style.'"><div class="content-area">'.do_shortcode('[blog]').'</div></section>';
}
/**************************************
			MUSIC PLAYER
**************************************/
add_shortcode('music_player','bravo_music_player');
function bravo_music_player($atts,$content){
	return '<div id="music-player"></div>';
}
add_shortcode('music_player_module','bravo_music_player_module');
function bravo_music_player_module($atts,$content) {
	return '<section class="section"><div class="content-area">'.do_shortcode('[music_player]').'</div></section>';
}
/**************************************
			YOUTUBE
**************************************/
add_shortcode('youtube','bravo_youtube');
function bravo_youtube($atts,$content){
	extract(shortcode_atts(array(
        'url'=>'http://www.youtube.com/watch?v=65hqp3xngmk'
    ),$atts));
	if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
		$video_id = $match[1];
	}
	return '<iframe class="youtube" src="http://www.youtube.com/embed/'.$video_id.'" style="border: none;"></iframe>';
}
add_shortcode('youtube_module','bravo_youtube_module');
function bravo_youtube_module($atts,$content){
	extract(shortcode_atts(array(
        'url'=>'http://www.youtube.com/watch?v=65hqp3xngmk'
    ),$atts));
	return '<section class="section"><div class="content-area">'.do_shortcode('[youtube url="'.$url.'"]').'</div></section>';
}
/**************************************
			VIMEO
**************************************/
add_shortcode('vimeo','bravo_vimeo');
function bravo_vimeo($atts,$content){
	extract(shortcode_atts(array(
        'url'=>'http://vimeo.com/25451551'
    ),$atts));
	sscanf(parse_url($url, PHP_URL_PATH), '/%d', $video_id);
	return '<iframe src="http://player.vimeo.com/video/'.$video_id.'" width="500" height="281" style="border: none;"></iframe>';
}
add_shortcode('vimeo_module','bravo_vimeo_module');
function bravo_vimeo_module($atts,$content){
	extract(shortcode_atts(array(
        'url'=>'http://vimeo.com/25451551'
    ),$atts));
	return '<section class="section"><div class="content-area">'.do_shortcode('[vimeo url="'.$url.'"]').'</div></section>';
}
/**************************************
			Latest Tweet
**************************************/
add_shortcode('tweet','bravo_tweet');
function bravo_tweet($atts,$content) {
	extract(shortcode_atts(array(
        'id'=>'brandexponents',
        'text_color'=>'#fff'
    ),$atts));
	$trends_url = "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=".$id."&count=1";
	$error = false;
	$output="";
	if ( false === ( $response = get_transient( 'tweets_single' ) ) ) {
		$response = wp_remote_get($trends_url);
		if( is_wp_error( $response ) ) {
			$error = true; 
			echo 'Tweets not available at this time. Please Try again later';
		} 
		else {
		$response = json_decode($response['body'],true);
			if(empty($response['error'])){
				set_transient('tweets_single',$response,60*60*12);
			}
			else {
				$error = true; 
			}
		}
	}
	if(is_array($response) && !$error){
		foreach($response as $status) {
			$tweets = explode(' ', $status['text']);
			foreach($tweets as $tweet) {
				//if(substr_compare($tweet, "http://", 0, 6)==0){
				if(preg_match("/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i", $tweet)) {
					$tweet_link = '<a href="'.$tweet.'">'.$tweet.'</a>';
					$status['text'] = str_replace($tweet, $tweet_link,$status['text']);
				}
			}
			$output .='<h4 class="text-align-center special-title" style="color:'.$text_color.';"><span class="light-bold">'.$status['text'].'</span></h4><hr style="background:'.$text_color.';" /><h6 class="tweet-module text-align-center tweeet-bird" style="color:'.$text_color.';"><a href="https://twitter.com/'.$id.'/status/'.$status['id_str'].'" class="tweet-time"><i class="icon-twitter-sign"></i> '.date('d M Y',strtotime($status['created_at'])).'</a></h6>';
		}	
	}
	else{
		$output .= __('<p>Tweets not available at this time. Please Try again later</p>','bravo');
	}
	return '<div class="latest-tweet">'.$output.'</div>';
}
add_shortcode('tweet_module','bravo_tweet_module');
function bravo_tweet_module($atts,$content){
	extract(shortcode_atts(array(
		'twitter_id'=>'',
		'is_custom_bg'=>'',
		'background_image'=>'', 
		'background_pattern'=>'', 
		'background_color'=>'', 
		'background_repeat'=>'', 
		'background_attachment'=>'', 
		'background_position'=>'', 
		'text_color'=>'#ffffff',
		'padding_top'=>'', 
		'padding_bottom'=>'',
		'is_parallax_section'=>''
    ),$atts));
	if($is_parallax_section)
		$parallax = 'parallax';
	else
		$parallax = 'no-parallax';
	if($is_custom_bg)
		$style = 'background: '.$background_color.' url('.attachment_id_to_src($background_image).') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	else
		$style = 'background: '.$background_color.' url('.$is_custom_bg.') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	return '<section class="section '.$parallax.'" style="'.$style.'"><div class="content-area">'.do_shortcode('[tweet id="'.$twitter_id.'" text_color="'.$text_color.'"]').'</div></section>';
}
add_shortcode('page_module','bravo_page_module');
function bravo_page_module($atts,$content) {
	extract(shortcode_atts(array(
        'page_id'=>'',
		'title'=>'',
		'is_custom_bg'=>'',
		'background_image'=>'', 
		'background_pattern'=>'', 
		'background_color'=>'', 
		'background_repeat'=>'', 
		'background_attachment'=>'', 
		'background_position'=>'', 
		'padding_top'=>'', 
		'padding_bottom'=>'',
		'is_parallax_section'=>''
    ),$atts));
	if($is_parallax_section)
		$parallax = 'parallax';
	else
		$parallax = 'no-parallax';
	$post = get_post($page_id);
	$content = apply_filters('the_content', $post->post_content);
	if($is_custom_bg)
		$style = 'background: '.$background_color.' url('.attachment_id_to_src($background_image).') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	else
		$style = 'background: '.$background_color.' url('.$is_custom_bg.') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	$output ="";
	if($post) {
		$output .='<section class="section '.$parallax.' '.$background_repeat.'" style="'.$style.'"><div class="content-area">';
		if($title)
			$output .='<h1>'.$post->post_title.'</h1>';
		$output .=do_shortcode($content).'</div></section>';
		return $output;
	}
	else
		return '';
}
add_shortcode('title_module','bravo_title_module');
function bravo_title_module($atts,$content) {
	extract(shortcode_atts(array(
		'title' => '',
        'sub_title'=>'',
		'separator'=> true,
		'text_color'	=> '#fff',
		'is_custom_bg'=>'',
		'background_image'=>'', 
		'background_pattern'=>'', 
		'background_color'=>'', 
		'background_repeat'=>'', 
		'background_attachment'=>'', 
		'background_position'=>'', 
		'padding_top'=>'', 
		'padding_bottom'=>'',
		'is_parallax_section'=>''
    ),$atts));
	if($is_parallax_section)
		$parallax = 'parallax';
	else
		$parallax = 'no-parallax';
	if($is_custom_bg)
		$style = 'background: '.$background_color.' url('.attachment_id_to_src($background_image).') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	else
		$style = 'background: '.$background_color.' url('.$is_custom_bg.') '.$background_position.' '.$background_repeat.' '.$background_attachment.';padding-top: '.$padding_top.'px;padding-bottom:'.$padding_bottom.'px';
	$output ="";
	$output .='<section class="section text-align-center '.$parallax.'" style="'.$style.'">';
	$output .='<div class="content-area">';
	$output .='<h1 style="color: '.$text_color.'">'.$title.'</h1>';
	if($separator != "false")
		$output .=do_shortcode('[separator color="'.$text_color.'"]');
	if(!empty($sub_title))
		$output .=do_shortcode('[sub_title color="'.$text_color.'" align="center"]'.$sub_title.'[/sub_title]');
	$output .='</div></section>';
	return $output;
}
add_shortcode('icon_fontawesome','bravo_icon');
function bravo_icon($atts,$content) {
	extract(shortcode_atts(array(
		'name' => '',
        'size'=> 'small',
		'color'=> '#fff',
		'bg_color'=> '#000',
		'style'=> 'square',
		'href'=> '#',
		'hover_color'=> '#fff',
		'hover_bg_color'=> '#000',
    ),$atts));

	$output ="";
	$output .='<a href="'.$href.'"><i class="font-icon icon-'.$name.' '.$size.' '.$style.'" style="color:'.$color.';background-color:'.$bg_color.';" data-color="'.$color.'" data-bg-color="'.$bg_color.'" data-hover-color="'.$hover_color.'" data-bg-hover-color="'.$hover_bg_color.'"></i></a>';
	return $output;
}
add_shortcode('icon_icomoon','bravo_icon_social');
function bravo_icon_social($atts,$content) {
	extract(shortcode_atts(array(
		'name' => 'facebook',
        'size'=> 'small',
		'color'=> '#fff',
		'bg_color'=> '#000',
		'style'=> 'square',
		'href'=> '#',
		'hover_color'=> '#fff',
		'hover_bg_color'=> '#000',
    ),$atts));
	$output ="";
	$output .='<a href="'.$href.'"><i class="font-icon social ss-'.$name.' '.$size.' '.$style.'" style="color:'.$color.';background-color:'.$bg_color.';" data-color="'.$color.'" data-bg-color="'.$bg_color.'" data-hover-color="'.$hover_color.'" data-bg-hover-color="'.$hover_bg_color.'"></i></a>';
	return $output;
}
?>