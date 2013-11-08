<?php
if ( ! isset( $content_width ) ) $content_width = 1090;
paginate_links(false);
$bravo_options = get_option('Bravo');
add_action( 'after_setup_theme', 'bravo_setup' );
if ( ! function_exists( 'bravo_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @since be 1.0
 */
function bravo_setup() {
	/* Make be available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'bravo', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
		
	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'menus' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'header', __( 'Primary Menu', 'bravo' ) );
	// This theme uses Featured Images (also known as post thumbnails)
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
}
endif; // be_setup

function bravo_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'bravo_add_editor_styles' );

/***********************************************************
			Include the Meta Box Class framework
************************************************************/
	
	// Re-define meta box path and URL
	define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
	define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory() . '/meta-box' ) );

	// Include the meta box script
	require_once RWMB_DIR . 'meta-box.php';

	// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
	include 'bravo-metabox.php';
	
/***********************************************************
			Add Post Format To Posts
************************************************************/
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'quote', 'video', 'audio','link' ) );

/***********************************************************
			Image Crop
************************************************************/
if(!empty($bravo_options['full_width_portfolio_max_height']))
	$portfolio_image_height = intval($bravo_options['full_width_portfolio_max_height']);
else
	$portfolio_image_height = 240;

function bravo_image_sizes( $sizes ) {

    global $_wp_additional_image_sizes;
    if ( empty( $_wp_additional_image_sizes ) )
        return $sizes;

    foreach ( $_wp_additional_image_sizes as $id => $data ) {
        if ( !isset($sizes[$id]) )
            $sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
    }

    return $sizes;
}

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'recent-post-widget', 85, 60, true );
	add_image_size( 'related-posts', 330, 200, true );
	add_image_size( 'blog-posts', 438 );
	add_image_size( 'single-blog', 700 );
	add_image_size( 'music-player', 520, 520, true );
	add_image_size( 'portfolio-thumbnail', 360, $portfolio_image_height, true );
	add_image_size( 'one-column', 1090);
	add_image_size( 'one-half', 520);
	add_image_size( 'one-third', 330);
	add_image_size( 'one-fourth', 235);	
	add_image_size( 'three-fourth', 805);
	add_image_size( 'two-third', 710);
	add_image_size( 'fullwidth', 1090);

	add_filter( 'image_size_names_choose', 'bravo_image_sizes' );
}

add_filter('widget_text', 'do_shortcode');

/***********************************************************
			Navigation Menu Filter
************************************************************/

class my_nav_menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	  
		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
			( $depth >=2 ? 'sub-sub-menu-item' : '' ),
			( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			'menu-item-depth-' . $depth
		);
		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	  
		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
	  
		// build html
		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
	  
		// link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		//$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ! empty( $item->object_id )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		//$attributes .=' href="#section-'.$item->object_id.'"';
		$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
	  
		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		// build html
		
    }
}

/***********************************************************
			Disable Admin Bar
************************************************************/

add_filter('show_admin_bar', '__return_false');

/***********************************************************
			Enqueue Style Sheets
************************************************************/

function bravo_add_styles(){
	wp_register_style( 'plugin', get_template_directory_uri() . '/css/plugin.css');
	wp_enqueue_style( 'plugin' );
	
	wp_register_style( 'ttw-music-player', get_template_directory_uri() . '/css/style.css');
	wp_enqueue_style( 'ttw-music-player' );
	
	wp_register_style( 'novecentowide_bold', get_template_directory_uri() . '/fonts/novecentowide_bold_macroman/stylesheet.css');
	wp_enqueue_style( 'novecentowide_bold' );
	
	wp_register_style( 'novecentowide_medium', get_template_directory_uri() . '/fonts/novecentowide_medium_macroman/stylesheet.css');
	wp_enqueue_style( 'novecentowide_medium' );
	
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/fonts/Font-Awesome-master/css/font-awesome.css');
	wp_enqueue_style( 'font-awesome' );

	wp_register_style( 'font-social-regular', get_template_directory_uri() . '/fonts/icomoon/style.css');
	wp_enqueue_style( 'font-social-regular' );	

	wp_register_style( 'mediaelementplayer', get_template_directory_uri() . '/css/mediaelementplayer.css');
	wp_enqueue_style( 'mediaelementplayer' );

    wp_register_style( 'bra_photostream_css', get_template_directory_uri()."/functions/widgets/brankic-photostream-widget/bra_photostream_widget.css");
    wp_enqueue_style( 'bra_photostream_css' );

    wp_register_style( 'bravo_lightbox', get_template_directory_uri()."/css/magnific-popup.css");
    wp_enqueue_style( 'bravo_lightbox' );    

	wp_register_style( 'ie8', get_template_directory_uri() .'/css/ie8.css', false );
    $GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'IE 8' );
    wp_enqueue_style( 'ie8' );    
	
	wp_register_style('paws-css', admin_url('admin-ajax.php?action=bravo_options_css'));
	wp_enqueue_style('paws-css');
	
}
add_action( 'wp_enqueue_scripts', 'bravo_add_styles' );

/***********************************************************
			Enqueue Javascripts
************************************************************/

function bravo_add_scripts(){

	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js');
	wp_enqueue_script( 'modernizr' );

	wp_deregister_script('jquery');

	wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery-1.8.2.min.js');
	wp_enqueue_script( 'jquery' );

	
	
	wp_register_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.10.1.custom/js/jquery-ui-1.10.1.custom.js', array( 'jquery' ),FALSE, TRUE);
	wp_enqueue_script( 'jquery-ui' );
	
	wp_register_script( 'bravo-plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ),FALSE, TRUE);
	wp_enqueue_script( 'bravo-plugins' );
	
	wp_register_script( 'bravo-music-player', get_template_directory_uri() . '/js/jquery.jplayer.js', array( 'jquery' ),FALSE, TRUE);
	wp_enqueue_script( 'bravo-music-player' );
	
	wp_register_script( 'bravo-ttw-music-player', get_template_directory_uri() . '/js/ttw-music-player.js', array( 'jquery' ),FALSE, TRUE);
	wp_enqueue_script( 'bravo-ttw-music-player' );

	wp_register_script( 'bravo-lightbox-js', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ),FALSE, TRUE);
	wp_enqueue_script( 'bravo-lightbox-js' );	
	
	wp_register_script( 'mediaelements', get_template_directory_uri() . '/functions/mediaelement-master/build/mediaelement-and-player.min.js', array( 'jquery' ),FALSE, TRUE);
	//wp_register_script( 'mediaelements', get_template_directory_uri() . '/js/mediaelement-and-player.min.js', array( 'jquery' ));
	wp_enqueue_script( 'mediaelements' );
	
	wp_register_script( 'bravo-main', get_template_directory_uri() . '/js/main.js', array( 'jquery','bravo-plugins','mediaelements' ),FALSE, TRUE);
	wp_enqueue_script( 'bravo-main' );

    wp_register_script('retina-js', get_template_directory_uri() . '/js/retina-update.js', array('jquery','bravo-main'),FALSE, TRUE);
	wp_enqueue_script('retina-js');
	
}
add_action( 'wp_enqueue_scripts', 'bravo_add_scripts' );

add_action('wp_footer','nice_scroll');

function nice_scroll(){
	global $bravo_options;
	$output ='';
	if(!empty($bravo_options['enable_nicescroll'])){
		$output .= '<script>';
		$output .='jQuery(document).ready(function(){
				function niceScrollInit(){
					jQuery("html").niceScroll({
						scrollspeed: 50,
						mousescrollstep: 30,
						cursorwidth: 20,
						cursorborder: 0,
						cursorcolor: "#222222",
						cursorborderradius: 2,
						autohidemode: false,
						zindex: 9999999999
					});
				}
				if(jQuery(window).width() > 690){ niceScrollInit(); }
			});';
		$output .='</script>';
	}
	echo $output;
}

/* Filter to prevent wordpress from adding empty <p> tags */

add_filter('the_content', 'do_shortcode', 7);



/***********************************************************
			Helper Functions
************************************************************/
/* function to trim content to the required characters  */

function trim_content($content,$count) {
	if(strlen($content) > $count) {
		return substr($content, 0, $count).'. . .';
	}
	else {
		return substr($content, 0, $count);
	}
}
function beat_get_the_category_list($id) {
	$numItems = count(get_the_category($id));
	$i = 0;
	foreach((get_the_category($id)) as $category) {
		if(++$i === $numItems) {
			echo '<a href="'.get_category_link( $category->cat_ID ).'" title="View all posts in '.$category->cat_name.'"> '.$category->cat_name.'</a>' ;
		}
		else {
			echo '<a href="'.get_category_link( $category->cat_ID ).'" title="View all posts in '.$category->cat_name.'"> '.$category->cat_name.'</a> , ' ;
		}
	}
}
function get_beat_get_the_category_list($id) {
	$terms=wp_get_object_terms( $id, 'portfolio_categories' );
	$category="";
	$taxonomies=get_the_term_list( $id, 'portfolio_categories', '', ' / ', '' );
	$taxonomies = strip_tags( $taxonomies );
	$term_count = count($terms);
	$i = 0;
	foreach ($terms as $term) {
		if(++$i === $term_count)
			$category.=$term->slug;
		else 
			$category.=$term->slug.", ";
	}
	return $category;
}

/* function for handling typography options in bravo-styles.php */

function bravo_print_typography($tag){
	global $bravo_options;    
	$get_font =  get_font($bravo_options[$tag]['family']);
    if(isset($get_font['weight'])){ $weight = $get_font['weight']; }else{ $weight = $bravo_options[$tag]['weight']; }
    if(isset($get_font['style'])){ $style = $get_font['style']; }else{ $style = 'normal'; }
	echo 'font: '.$style.' '.$weight.' '.$bravo_options[$tag]["size"].' "'.$get_font["name"].'","PT Sans Narrow","Arial Narrow",sans-serif;';
	echo 'color: '.$bravo_options[$tag]["color"].';
    line-height: '.$bravo_options[$tag]["line_height"].';
    text-transform: '.$bravo_options[$tag]["transform"].';';
}

/* function for including the required google fonts  */

function bravo_google_fonts(){
	global $bravo_options;
	$bravo_fonts[]=$bravo_options['h1']['family'];
	$google_fonts = array();
	array_push($bravo_fonts,
	$bravo_options['h2']['family'],
	$bravo_options['h3']['family'],
	$bravo_options['h4']['family'],
	$bravo_options['h5']['family'],
	$bravo_options['h6']['family'],
	$bravo_options['body_text']['family'],
	$bravo_options['bottom_widget_text']['family'],
	$bravo_options['footer_text']['family'],
	$bravo_options['navigation_text']['family'],
	$bravo_options['sub_title']['family']);
	
	$bravo_fonts = array_unique($bravo_fonts);
	
	foreach($bravo_fonts as $font){
	    $font_family = explode('/', $font);
		if($font_family[0] == 'google'){
			$google_fonts[] .= "'".$font_family[1]."'";
		}
	}
	
	if(isset($google_fonts))
		$fonts_include = implode(',', $google_fonts);
		
	if(isset($fonts_include) && !empty($google_fonts)){
		echo 
		         '<script type="text/javascript">
		      		WebFontConfig = {
		        		google: { families: ['.$fonts_include.']}
		      		};
		      		(function() {
				        var wf = document.createElement("script");
				        wf.src = ("https:" == document.location.protocol ? "https" : "http") +
				            "://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js";
				        wf.type = "text/javascript";
				        wf.async = "true";
				        var s = document.getElementsByTagName("script")[0];
				        s.parentNode.insertBefore(wf, s);
				    })();
			    </script>';
	}	    
	
}
add_action('wp_head','bravo_google_fonts');

/* Function for setting the background image of the page - body tag  */

function bravo_set_backgrounds($section){
	global $bravo_options;
	$background_color='';
	$background_image='';
	$background_repeat='';
	$background_attachment='';
	$background_position='';
	if(isset($bravo_options[$section]['color'])){
		$background_color = $bravo_options[$section]['color'];
	}
	if(isset($bravo_options[$section]['recur'])){
		$background_repeat = $bravo_options[$section]['recur'];
	}
	if(isset($bravo_options[$section]['attach'])){
		$background_attachment = $bravo_options[$section]['attach'];
	}
	if(isset($bravo_options[$section]['position'])){
		$background_position = $bravo_options[$section]['position'];
	}
    if(isset($bravo_options[$section]['none'])) {
        echo 'background: none;';
	} 
    else if(isset($bravo_options[$section]['custom'])){
	    if(!empty($bravo_options[$section]['bgpattern'])){
	    	$background_image=$bravo_options[$section]['bgpattern'];
	    	echo 'background: '.$background_color.' url('.$background_image.') '.$background_repeat.' '.$background_attachment.' '.$background_position.';';
	    }
	    else{
		    if(!empty($background_color)){
			    bravo_background_colors($bravo_options[$section]['color'],$bravo_options[$section]['opacity']);
		    }
	    }  
    }
 	else if($bravo_options[$section]['background'] !="None") { 
    		if(isset($bravo_options[$section]['background'])){
	    		$background_image = 'url('.get_template_directory_uri().'/css/patterns/'.$bravo_options[$section]['background'].'.png)';
	    	}   
	    	echo 'background: '.$background_color.' '.$background_image.' '.$background_repeat.' '.$background_attachment.' '.	$background_position.';';  
   	}
    else {
          bravo_background_colors($bravo_options[$section]['color'],$bravo_options[$section]['opacity']);
    } 
}
function bravo_background_colors($color,$opacity){
	$rgb = hexa_to_rgb($color);  
    $color = $rgb[0].','.$rgb[1].','.$rgb[2];
    echo 'background-color: rgb('.$color.');'; 
    echo 'background-color: rgba('.$color.','.$opacity.');'; 
}

/***********************************************************
			Blog Comment Section
************************************************************/

if ( ! function_exists( 'bravo_comment' ) ) :

function bravo_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback clearfix">
		<p><?php echo ucfirst($comment->comment_type).":  "; comment_author_link(); ?><?php edit_comment_link( __('Edit','bravo') , '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment clearfix">
			<div class="comment-author vcard">
					<div class="comment-author-inner">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size ); ?>
					</div>
			</div><!-- .comment-author .vcard -->
			
			<div class="comment-content">
			
				<footer class="comment-meta">
				<?php
					printf( __('%1$s %2$s','bravo'), 
						sprintf( '<span>'.__("By ","bravo").'</span><span class="fn">%s</span>', get_comment_author_link() ),
						sprintf( '<span>'.__("On ","bravo").'</span><a href="%1$s" class="comment-date-time"><time datetime="%2$s">%3$s</time></a> | ',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( '%1$s', get_comment_date('F d Y') )
							)
						);
					?>
				<span class="reply"> <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __('Reply','bravo'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
					
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','bravo'); ?></em>
					<br />
				<?php endif; ?>

			</footer>
			<div class="comment_text">
				<?php comment_text(); ?>
		  	</div>
					<ul class="comment-edit-reply clearfix">
						<?php edit_comment_link( __( 'Edit', 'bravo' ), '<li class="edit-link">', '</li>' ); ?>
			</ul>
			
			
			</div>


		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for bravo_comment()

function bravo_related_posts($id) {
	global $bravo_options;
	//$tags = wp_get_post_tags($id);
	$cats = get_the_category($id);
	if ($cats) {
		$ids = array();
		foreach ($cats as $cat) {
			array_push($ids, $cat->cat_ID);
		}
		$posts_per_page = $bravo_options['related_posts_count'];
		$args=array(
			'category__in' => $ids,
			'post__not_in' => array($id),
			'posts_per_page'=>$posts_per_page,
			'ignore_sticky_posts'=>1
		);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() && $posts_per_page ) {
			echo '<h4 class="related-posts-title">'.__( 'Related Posts', 'bravo' ).'</h4>';
			echo '<div class="related-posts-lists clearfix">';
			$i=1;
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="related-posts-list <?php echo $i%2 == 0 ? "last" : "first" ?>">
					<?php
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'related-posts');
					$url = $thumb['0']; ?>
					<div class="related-posts-image">
						<a class="thumb-wrap" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php if($url) { ?>
								<img src="<?php echo $url; ?>" />
							<?php }
							else { ?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder1.png" />
							<?php } ?>
							<div class="thumb-overlay"><div class="thumb-title"><h6><?php echo trim_content(get_the_title(get_the_ID()),80); ?></h6></div></div>
						</a>
					</div>
					<p class="related-post-content-wrap"> <?php echo trim_content(get_the_content(get_the_ID()),200); ?> </p>
				</div>
				<?php
				$i++;
			endwhile;
			echo '</div>';
		}
		wp_reset_query();
	}
}

function bravo_portfolio_related_posts($id) {
	global $bravo_options;
	//$tags = get_terms('portfolio_tags',$id);
	$cats = get_terms('portfolio_categories',$id);

	if ($cats) {
		$ids = array();
		foreach ($cats as $cat) {
			array_push($ids, $cat->term_id);
		}
		
		$posts_per_page = $bravo_options['portfolio_related_posts_count'];
		$args=array(
			'post_type' => 'portfolio',
			'tax_query' => array (
				array (
					'taxonomy' => 'portfolio_categories',
					'field' => 'term_id',
					'terms' => $ids
				)
			),
			'post__not_in' => array($id),
			'posts_per_page'=>$posts_per_page,
			'ignore_sticky_posts'=>1
		);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() && $posts_per_page ) {
			echo '<h4 class="related-posts-title">'.__( 'Related Posts', 'bravo' ).'</h4>';
			echo '<div class="related-posts-lists clearfix">';
			$i=1;
			while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="one-third single-portfolio-related <?php echo $i%3 == 0 ? "last" : "first" ?>">
					<?php
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'related-posts');
					$url = $thumb['0']; ?>
					<a class="thumb-wrap" href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php if($url) { ?>
							<img src="<?php echo $url; ?>" />
						<?php }
						else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder1.png" />
						<?php } ?>
						<div class="thumb-overlay"><div class="thumb-title"><h6><?php echo trim_content(get_the_title(get_the_ID()),80); ?></h6></div></div>
					</a>
				</div>
				<?php
				$i++;
			endwhile;
			echo '</div>';
		}
		wp_reset_query();
	}
}

function bravo_comments_form() {
	$req = get_option('require_name_email');
	$fields =  array(
		'author' => '<div class="clearfix comment_fields"><p class="no-margin"><input id="author" name="author" type="text" value="" aria-required="true" placeholder = "Name"' . ( $req ? ' required' : '' ) . '/></p>',
		'email'  => '<p class="no-margin"><input id="email" name="email" type="text" value="" aria-required="true" placeholder="Email"' . ( $req ? ' required' : '' ) . ' /></p>',
		'url'    => '<p class="no-margin last"><input id="url" name="url" type="text" value="" placeholder="Website" /></p></div>'
	);
	return $fields;
}
add_filter('comment_form_default_fields', 'bravo_comments_form');

function bravo_commentfield() {
	$commentArea = '<p class="no-margin"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required placeholder="Comment"></textarea></p>';
	return $commentArea;
}
add_filter('comment_form_field_comment', 'bravo_commentfield');

add_filter( 'request', 'bravo_request_filter' );
function bravo_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}

function five_posts_on_homepage( $query ) {
    if(is_category() || is_archive() || is_tag() || is_search()) {
        $query->set( 'posts_per_page', '-1' );
    }
}
add_action( 'pre_get_posts', 'five_posts_on_homepage' );

function be_video_type($url) {
	if (strpos($url, 'youtube') > 0) {
		return 'youtube';
	} elseif (strpos($url, 'vimeo') > 0) {
		return 'vimeo';
	}
}
function attachment_id_to_src($id) {
	$url = wp_get_attachment_image_src( $id,'full',false );
	return $url[0];
}

/* Filter to add custom Tiny MCE buttons */

add_filter('mce_external_plugins', "tinyplugin_register");
add_filter('mce_buttons', 'tinyplugin_add_button', 0);
function tinyplugin_add_button($buttons)
{
    array_push($buttons, "|", "tinyplugin","linebreak");
	return $buttons;
}
function tinyplugin_register($plugin_array)
{
    $url = trim(get_template_directory_uri(), "/")."/tinymce/editor_plugin_src.js";
    $plugin_array['tinyplugin'] = $url;
	$plugin_array['linebreak'] = $url;
    return $plugin_array;
}

/**********************************************************************
	Function for generating css from options panel data and caching it
**********************************************************************/

function bravo_options_css() {
	global $bravo_options;
    header( 'Content-Type: text/css' );
    if($bravo_options['dev_or_deploy']=="dev"){
	    header( 'Expires: Thu, 31 Dec 2050 23:59:59 GMT' );
	    header( 'Pragma: cache' );
	    delete_transient( 'bravo_css' );
	}
	if ( false === ( $css = get_transient( 'bravo_css' ) ) ) {
        $paws_path = get_template_directory_uri();
        $css_dir = get_stylesheet_directory() . '/css/'; 
        ob_start(); // Capture all output (output buffering)
		require($css_dir . 'bravo-styles.php'); // Generate CSS
		$css = ob_get_clean(); // Get generated CSS (output buffering)
        set_transient( 'bravo_css', $css );
    }

    echo $css;
    die();
}
add_action('wp_ajax_bravo_options_css', 'bravo_options_css');
add_action('wp_ajax_nopriv_bravo_options_css', 'bravo_options_css');

function bravo_toggle_post_formats()
{

    $script = '
    <script type="text/javascript">
        jQuery( document ).ready( function($)
            {
            	var selected_post_format = jQuery("input[name=post_format]:checked").attr("value");
            	toggle_post_format_options(selected_post_format);

            	jQuery("input[name=post_format]").change(function(){
            		toggle_post_format_options(jQuery(this).attr("value"));
            	});

            }
        );
		        function toggle_post_format_options(format){
		        	
            		switch (format){
            			case "0":
            			case "image":
            			case "aside":
            				jQuery("#post_format_options .rwmb-meta-box").removeClass("visible").addClass("hidden");
            				break;
            			case "video":
            				jQuery("#post_format_options .rwmb-meta-box").removeClass("hidden").addClass("visible");
            				jQuery("#video_url").closest(".rwmb-field").removeClass("hidden").addClass("visible").siblings().addClass("hidden");
            				break;	
            			case "audio":
            				jQuery("#post_format_options .rwmb-meta-box").removeClass("hidden").addClass("visible");
            				jQuery("#audio_url").closest(".rwmb-field").removeClass("hidden").addClass("visible").siblings().addClass("hidden");
            				break;	
            			case "gallery":
            				jQuery("#post_format_options .rwmb-meta-box").removeClass("hidden").addClass("visible");
            				jQuery("label[for=gal_post_format]").closest(".rwmb-field").removeClass("hidden").addClass("visible").siblings().addClass("hidden");
            				break;
            			case "link":
            				jQuery("#post_format_options .rwmb-meta-box").removeClass("hidden").addClass("visible");
            				jQuery("#link_url").closest(".rwmb-field").removeClass("hidden").addClass("visible").siblings().addClass("hidden");
            				break;
            			case "quote":
            				jQuery("#post_format_options .rwmb-meta-box").removeClass("hidden").addClass("visible");
            				jQuery("#post_format_options").find(".rwmb-field").removeClass("visible").addClass("hidden");
            				jQuery("#quote_title").closest(".rwmb-field").removeClass("hidden").addClass("visible");
            				jQuery("#quote_author").closest(".rwmb-field").removeClass("hidden").addClass("visible");
            				jQuery("#quote_author_link").closest(".rwmb-field").removeClass("hidden").addClass("visible");
            				break;            				            					            				            				
            		}

            	}
    </script>
    ';

    return print $script;
}

add_action( 'admin_footer', 'bravo_toggle_post_formats' );

add_filter( 'attachment_fields_to_edit', 'bravo_attachment_field_add', 10, 2 );

if ( ! function_exists( 'bravo_attachment_field_add' ) ) :
	function bravo_attachment_field_add( $form_fields, $post ) {
		$form_fields['bravo-featured-video-url'] = array(
			'label' => 'Youtube/Vimeo URL',
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'bravo_featured_video_url', true ),
			'helps' => 'Enter a Youtube/Vimeo URL to be linked to the featured image',
		);

		return $form_fields;
	}
endif;


add_filter( 'attachment_fields_to_save', 'bravo_attachment_field_save', 10, 2 );

if ( ! function_exists( 'bravo_attachment_field_save' ) ) :
	function bravo_attachment_field_save( $post, $attachment ) {
		if( isset( $attachment['bravo-featured-video-url'] ) ) {
			update_post_meta( $post['ID'], 'bravo_featured_video_url', $attachment['bravo-featured-video-url'] );
		}

		return $post;
	}
endif;

require_once(get_template_directory() .'/functions/custom-post-types.php');
require_once(get_template_directory() .'/functions/shortcodes.php');
require_once(get_template_directory() .'/functions/widget-functions.php');
require_once(get_template_directory() .'/ajax-handler.php');
require_once(get_template_directory() .'/functions/option_framework_function.php');
require_once(get_template_directory() .'/bravo-page-builder.php');
require_once(get_template_directory() .'/be-page-builder/be-page-builder.php');
?>