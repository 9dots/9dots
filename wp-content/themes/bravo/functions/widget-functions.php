<?php
/********************************************
			REGISTER WIDGET AREA
*********************************************/
	add_action( 'widgets_init', 'bottom_register_sidebars' );
	function bottom_register_sidebars() {
		register_sidebar(array(
	           'name' => __('Bottom Widget','bravo'),
	           'id'   => 'bottom-widget',
	           'description'   => __('Bottom widget area','bravo'),
	           'before_widget' => '<div class="%2$s widgets one-third">',
			   'after_widget'  => '</div>',
	           'before_title'  => '<h5 class="widget-title">',
	           'after_title'   => '</h5>'
		));
		register_sidebar(array(
	           'name' => __('Right Sidebar Widget','bravo'),
	           'id'   => 'right-sidebar',
	           'description'   => __('Right Sidebar area','bravo'),
	           'before_widget' => '<div class="%2$s widget sidebar-widget">',
			   'after_widget'  => '</div><div class="separator"></div>',
	           'before_title'  => '<h5 class="widget-title">',
	           'after_title'   => '</h5>'
		));
	}
	function unregister_default_wp_widgets() {
		unregister_widget('WP_Widget_Recent_Posts');
	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);

/********************************************
			INCLUDE WIDGET FUNCTIONS
*********************************************/
	require_once(get_template_directory() .'/functions/widgets/recent_post_widget.php');
	require_once(get_template_directory() .'/functions/widgets/twitter_widget.php');
	require_once(get_template_directory() .'/functions/widgets/brankic-photostream-widget/bra_photostream_widget.php');
	register_widget('BraPhotostreamWidget');
?>