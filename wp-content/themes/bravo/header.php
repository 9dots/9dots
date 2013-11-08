<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> 
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <meta charset="utf-8">
        <!--[if IE]>
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
		<![endif]-->
        <meta name="description" content="">
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
    	<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_url'); ?>">
		<?php
			global $bravo_options; // Get Backend Options
			$bravo_options = get_option('Bravo');
			
			if($bravo_options['favicon']) {
				echo '<link rel="icon" type="image/png" href="'.$bravo_options['favicon'].'">';
			}
			if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
			wp_head(); 
		?>
    </head>
    <body <?php body_class(); ?>>
        <!-- Add your site or application content here -->
		<?php
		if($bravo_options['layout'] == 'boxed'){
			get_template_part('header','boxed');
		}
		else{
			get_template_part('header','wide');
		}
		?>