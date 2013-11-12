<?php do_action('wave_before_html'); ?><!doctype html>
<!--[if lt IE 7 ]>
<html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head id="html-head">
	<meta charset="<?php bloginfo('charset'); ?>">
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<?php if (is_search()) : ?>
		<meta name="robots" content="noindex, nofollow"/>
	<?php endif; ?>
	<title><?php wp_title('|', true, 'right'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>"/>
	<meta name="viewport" content="initial-scale=1"/>
	<?php if (wave_info('ios_icon_57')) : ?>
		<link rel="apple-touch-icon" href="<?php echo wave_info("ios_icon_57"); ?>"/>
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo wave_info("ios_icon_57"); ?>"/>
	<?php endif; ?>
	<?php if (wave_info('ios_icon_72')) : ?>
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo wave_info("ios_icon_72"); ?>"/>
	<?php endif; ?>
	<?php if (wave_info('ios_icon_114')) : ?>
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo wave_info("ios_icon_114"); ?>"/>
	<?php endif; ?>
	<?php if (wave_info('ios_icon_144')) : ?>
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo wave_info("ios_icon_144"); ?>"/>
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"/>
	<script type="text/javascript">var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';</script>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php do_action('wave_before_html_head_end'); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action('wave_after_html_body'); ?>
<div id="wrapper">
	<header id="header">
		<?php do_action('wave_header_start'); ?>
		<div id="header-content-wrapper">
			<div id="header-content">
				<nav id="nav" role="navigation">
					<?php wave_primary_menu(); ?>
					<div>
						<ul class="sf-menu menu-icons">
							<?php do_action("wave_header_menu_icons"); ?>
						</ul>
					</div>
				</nav>
				<div class="left">
					<a id="logo-anchor" href="<?php echo esc_url(home_url('/')); ?>"
					   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
						<?php if (wave_option('header_logo_image')): ?>
							<img id="logo" src="<?php echo wave_option('header_logo_image'); ?>" data-src-x1="<?php echo wave_option('header_logo_image'); ?>"
							     data-src-x2="<?php echo wave_option('header_logo_image_retina'); ?>" alt=""/>
						<?php else: ?>
							<span id="logo"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></span>
						<?php endif; ?>
					</a>
				</div>
				<div class="right right-default">
					<?php do_action('wave_header_right_default'); ?>
				</div>
				<div class="right right-mobile">
					<?php do_action('wave_header_right_mobile'); ?>
					<a class="button-mobilemenu" href="javascript:void(0);"><i class="icon icon-reorder"></i></a>
				</div>
			</div>
		</div>
		<?php do_action('wave_header_end'); ?>
	</header>
	<?php do_action('wave_after_header'); ?>
	<div id="footer-mobile-menu">
		<?php do_action('wave_footer_mobile_menu'); ?>
	</div>
	<?php wave_page_slider(); ?>
	<?php if (wave_option('header_topbar_enabled')): ?>
	<div id="main-content-wrapper" class="has-topbar">
		<?php else: ?>
		<div id="main-content-wrapper">
			<?php endif; ?>
			<div id="main-content">
