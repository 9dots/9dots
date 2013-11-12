<?php

// Define WaveThemes constants
define("WAVE_THEME_NAME", "RAW");
define("WAVE_TEXT_DOMAIN", "wave-theme");
define("WAVE_OPTION_NAME", "wave_raw_theme");
define("WAVE_DEBUG", false);
define("WAVE_WHITELABEL", false);
define("WAVETHEMES_DIRECTORY", get_template_directory() . "/include/wavethemes");
define("WAVETHEMES_THEME_DIRECTORY", get_template_directory() . "/");
define("WAVETHEMES_THEME_URI", get_template_directory_uri() . "/");
define("WAVETHEMES_GOOGLE_API_KEY", "AIzaSyDXbX-zpj64FwFrAds_n3KA8bDMZnEGbiI");
define('WAVE_DEFAULT_FONTS', 'Arvo:400,Arvo:700,Copse:400,Droid Sans:400,Droid Sans:700,Droid Serif:400,Droid Serif:400-italic,Droid Serif:700,Lobster:400,Nobile:400,Nobile:400-italic,Nobile:700,Open Sans:300,Open Sans:300-italic,Open Sans:400,Open Sans:400-italic,Open Sans:600,Open Sans:600-italic,Open Sans:700,Open Sans:700-italic,Open Sans:800,Open Sans:800-italic,Open Sans Condensed:300,Open Sans Condensed:700,Oswald:300,Oswald:400,Oswald:700,Pacifico:400,Rokkitt:400,Rokkitt:700,PT Sans:400,PT Sans:400-italic,PT Sans:700,Quattrocento:400,Quattrocento:700,Raleway:300,Raleway:400,Raleway:600,Raleway:700,Ubuntu:300,Ubuntu:400,Ubuntu:400-italic,Ubuntu:700,Yanone Kaffeesatz:300,Yanone Kaffeesatz:400,Yanone Kaffeesatz:700');

// Disable the use WooCommerce's default CSS
define('WOOCOMMERCE_USE_CSS', false);

// Include WordPress's $pagenow variable to see on what page we are now
global $pagenow;

// If Wave Debug is active, set the content type to plain text and set the error handler
if (WAVE_DEBUG) {
	header("Content-Type: text/plain");
	set_error_handler("wave_exception_error_handler");
}

// Include classes from library
include_once "library/Wave/RegEx.php";
include_once "library/Wave/Colors.php";
include_once "library/Wave/Filters.php";
include_once "library/Wave/Fonts.php";
include_once "library/Wave/Js.php";
include_once "library/Wave/Registry.php";
include_once "library/Wave/Popup.php";
include_once "library/Wave/Dynamic.php";
include_once "library/Wave/Inline.php";
include_once "library/Wave/Widget/RecentPosts.php";
include_once "library/Wave/Widget/RecentProjects.php";
include_once "library/TGM/Plugin/Activation.php";

// Include Options Framework (Modified Redux Options Framework)
include_once "include/options/fields/checkbox/field_checkbox.php";
include_once "include/options/options.php";

// Add the content filter for filtering rough HTML tags between shortcodes
add_filter('the_content', 'wave_content_filter');

// Add the button class to the next and previous post links
add_filter('next_post_link', 'wave_add_button_class');
add_filter('previous_post_link', 'wave_add_button_class');

// Add filters for next and previous links in posts
add_filter("next_posts_link_attributes", array(
	"Wave_Filters",
	"postsLinkAttributes"
));
add_filter("previous_posts_link_attributes", array(
	"Wave_Filters",
	"postsLinkAttributes"
));

// Add filter for wp_title
add_filter("wp_title", array(
	"Wave_Filters",
	"title"
), 10, 2);

// Add filter for adding widget last and first classes
add_filter("dynamic_sidebar_params", array(
	"Wave_Filters",
	"widgetFirstLastClasses"
));

// Filter Gravity Forms' submit button to make it work from within the popup
add_filter("gform_submit_button", "wave_gform_submit_button", 10, 2);

// Filter menu items, to use a hash instead of a full url when it's a one pager
add_filter("wp_nav_menu_objects", "wave_filter_nav_items", 2000, 2);

// Add theme support
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

// Define the content width for WordPress
if (!isset($content_width)) {
	$content_width = 1100;
}

// Register required plugins using TGM
add_action('tgmpa_register', 'wave_register_required_plugins');

// Hide editor for certain templates and post types
add_action('load-page.php', 'wave_hide_editor');

// Add AJAX action for the Select Icon dialog
add_action("wp_ajax_dialog_select_icon", "wave_dialog_select_icon");

// Add actions for registering sidebars
add_action("widgets_init", "wave_register_sidebar_blog");
add_action("widgets_init", "wave_register_sidebar_shop");
add_action("widgets_init", "wave_register_sidebar_footer");

// Add AJAX action for demo import from the Theme Options
add_action('wp_ajax_demo_import', 'wave_ajax_demo_import');

// Add AJAX action for setting up permalinks
add_action('wp_ajax_setup_permalinks', 'wave_ajax_setup_permalinks');

// Add the mobile menu
add_action("wave_after_header", "wave_add_mobilemenu", 10);

// Add back to top button
add_action("wave_after_header", "wave_add_back_to_top_button", 20);

// Add call to action button to the menu of the right
add_action("wave_header_right_default", "wave_call_to_action_button");

// Add action button to the mobile menu
add_action("wave_header_right_mobile", "wave_call_to_action_button");

// Add action button to the footer menu for small devices
add_action('wave_footer_mobile_menu', "wave_call_to_action_button");

// Add cart icon to the menu
add_action('wave_header_menu_icons', 'wave_header_menu_icons_add_cart');

// Output the popups that need to be generated
add_action('wave_after_header', 'wave_print_popups');

// Add the tracking code to the footer
add_action("wave_after_footer", "wave_add_tracking_code", 10);

// Enqueue strings and stylesheets
add_action('wp_enqueue_scripts', "wave_frontend_scripts", 1000);

// Add RAW Editor button
add_action('init', 'wave_add_editor_button');

// Register the custom widgets
add_action('widgets_init', "wave_widgets_active");

// Register and enqueue scripts and stylesheets for the admin
add_action('admin_enqueue_scripts', 'wave_admin_enqueue_scripts');

// Register page sections meta boxes
add_action('admin_init', 'wave_metabox_page_sections');

// Register meta boxes for custom post types and page templates
add_action("admin_init", "wave_register_meta_boxes");

add_action('admin_init', 'wave_register_fonts');

// Handler for when you save the theme options
add_action('admin_init', 'wave_theme_options_save');

// Add the swatches to the admin
add_filter('admin_head', 'wave_add_admin_js_colors');

// Remove actions for WooCommerce, we will replace them with our own actions
remove_action("woocommerce_before_main_content", "woocommerce_output_content_wrapper", 10);
remove_action("woocommerce_after_main_content", "woocommerce_output_content_wrapper_end", 10);

// Clear the floats after the shop loop
add_action("woocommerce_after_shop_loop", "wave_clearboth");

// Change the default number of shop items per page to 9
add_filter('loop_shop_per_page', create_function('$cols', 'return 9;'), 20);

// Change the default number of columns for the shop items (depends on the sidebar)
add_filter('loop_shop_columns', 'wave_woocommerce_shop_columns');

// Close a div that we'd openened before the single product summary
add_action("woocommerce_before_single_product_summary", "wave_close_div", 20);

// Add three-fifth column before the single product summary
add_action("woocommerce_before_single_product_summary", "wave_woocommerce_before_single_product_summary_add_three_fifth", 35);

// Add the optional sidebar to the shop page (left side)
add_action("woocommerce_before_shop_loop", "wave_woocommerce_before_shop_loop", 40);

// Add some fragments to the AJAX response for when you add a product to the cart
add_filter('add_to_cart_fragments', 'wave_woocommerce_header_add_to_cart_fragment');

// Remove the related products after the single products summary
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
remove_action('woocommerce_after_single_product', 'woocommerce_output_related_products', 10);

// Remove the default add to cart button
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Add our own related products handler
add_action('woocommerce_after_single_product_summary', 'wave_woocommerce_output_related_products', 20);

// Clear all floats after the single product summary
add_action("woocommerce_after_single_product_summary", "wave_clearboth", 50);

// Add the optional sidebar to the shop page (right side)
add_filter("woocommerce_after_shop_loop", 'wave_woocommerce_after_shop_loop', 1);

// Close a div that we'd opened previously
add_action("woocommerce_after_single_product_summary", "wave_close_div", 4);

// Filter the add to cart class to include the button CSS class
add_filter("add_to_cart_class", "wave_woocommerce_filter_add_to_cart_class", 99);

// Add a two-fifth column before the single product summary
add_action("woocommerce_before_single_product_summary", "wave_woocommerce_before_single_product_summary_add_two_fifth", 1);

// Add ignore filter for BWP Minify
add_filter('bwp_minify_style_ignore', 'wave_style_ignore_bwp_minify');

// Register the primary Navigation Menu
register_nav_menu('primary', __('Navigation Menu', WAVE_TEXT_DOMAIN));
register_nav_menu('header-top-left', __('Header Top Left', WAVE_TEXT_DOMAIN));
register_nav_menu('header-top-right', __('Header Top Right', WAVE_TEXT_DOMAIN));
register_nav_menu('footer', __('Footer', WAVE_TEXT_DOMAIN));

// Register a navigation menu for each one pager
foreach (wave_get_one_pagers() as $page) {
	register_nav_menu('mainmenu-' . md5($page->guid), "One Pager: " . $page->post_title);
}

// Filter the body classes for all wave specific details
add_filter('body_class', 'wave_add_body_classes');

// Load the text domain for the theme
load_theme_textdomain(WAVE_TEXT_DOMAIN, get_template_directory() . '/languages');

// If the current page is singular, we need to enqueue the comment reply script
if (is_singular() && comments_open() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}


add_action('wave_header_start', 'wave_add_header_topbar');


function wave_add_header_topbar() {
	if (wave_option('header_topbar_enabled')) {
		get_template_part('parts/header/topbar');
	}
}


function wave_add_back_to_top_button() {
	if (wave_option('back_to_top_button_enabled')) {
		get_template_part('parts/header/back-to-top-button');
	}
}


// Check if the sample data has already been imported
function wave_is_demo_imported() {

	if (get_option(WAVE_OPTION_NAME . '_demo') == '1') {
		return true;
	} else {
		return false;
	}

}

// Import the sample data
function wave_demo_import() {

	// Check if the sample data has already been imported
	if (wave_is_demo_imported()) {
		return;
	}

	// Include the modified WordPress Importer classes
	include_once 'library/Wave/Demo/Import.php';
	include_once 'library/Wave/Demo/Parser.php';
	include_once 'library/Wave/Demo/Parser/Regex.php';
	include_once 'library/Wave/Demo/Parser/SimpleXML.php';
	include_once 'library/Wave/Demo/Parser/XML.php';

	// Define the location of the sample data file
	$demo_file = WAVETHEMES_DIRECTORY . '/data/demo.xml';

	// Catch any type of output
	ob_start();

	// Instantiate the sample data import class and import the sample data file
	$import = new Wave_Demo_Import();
	$import->import($demo_file);

	// Get the result and store it in the variable
	$result = ob_get_clean();

	// Update the menu settings
	wave_demo_update_theme_mods();

	// If the import went successfully, the result output should contain this string value, if not the import failed
	if (strpos($result, Wave_Demo_Import::IMPORT_COMPLETE)) {
		add_option(WAVE_OPTION_NAME . '_demo', '1');

		return true;
	} else {
		return false;
	}

}

// AJAX action handler for importing sample data
function wave_ajax_demo_import() {

	// Check if the sample data has already been imported
	if (wave_is_demo_imported()) {
		echo __('The sample data was already imported previously.', WAVE_TEXT_DOMAIN);
	}

	// Import the sample data and check if everything went well, if not we will return a an error
	if (wave_demo_import()) {
		echo "ok";
	} else {
		echo __('An error occured when importing the sample data...', WAVE_TEXT_DOMAIN);
	}

	exit;

}

// Generate the sample data import button
function wave_get_demo_import_button($label) {

	// If the sample data hasn't already been imported, return the button HTML code
	if (!wave_is_demo_imported()) {

		$html = '<input id="button-demo-import" class="button" value="' . $label . '" type="button" />';
		$html .= '<span class="wp-spinner inactive"></span>';

		return $html;

	}

	// The sample data has already been imported, it returns an empty string
	return '';
}

// Get the current page ID
function wave_get_the_id() {

	// Work-around because WooCommerce returns the product ID instead of the page ID
	if (wave_is_active_plugin('woocommerce/woocommerce') && is_shop()) {
		return get_option('woocommerce_shop_page_id');
	}

	// If it is not the shop page, return the normal ID
	return get_the_ID();

}


// Output the page title, if the page title has been enabled
function wave_page_title($tag = 'h2') {

	$page_id = wave_get_the_id();

	$display_title = get_post_meta($page_id, "display_title", true);

	if ($display_title !== '0') {
		if (is_singular() || (function_exists('is_shop') && is_shop())) {
			echo '<' . $tag . ' class="page-title">' . get_the_title($page_id) . '</' . $tag . '>';
		} else {
			echo '<' . $tag . ' class="section-title">' . get_the_title($page_id) . '</' . $tag . '>';
		}
	}
}

// AJAX action handler for the setting up the permalinks structure
function wave_ajax_setup_permalinks() {
	update_option('permalink_structure', '/%postname%/');
	echo 'ok';
	exit;
}

// Generate a admin link button using a label and a link
function wave_get_admin_link_button($label, $link, $condition = true) {
	if ($condition) {
		return '<a class="button" href="' . $link . '">' . $label . '</a>';
	} else {
		return '';
	}
}

// Generate an AJAX button with a spinner
function wave_get_setup_ajax_button($action, $label) {

	$html = '<input data-action="' . $action . '" class="wave-setup-button button" value="' . $label . '" type="button" />';
	$html .= '<span class="wp-spinner inactive"></span>';

	return $html;
}

// Generate setup permalink button if the permalink structure has not been set
function wave_get_setup_permalink_button() {

	if (get_option('permalink_structure') == '') {
		return wave_get_setup_ajax_button('setup_permalinks', __('Setup Permalinks', WAVE_TEXT_DOMAIN));
	} else {
		return '';
	}

}

// Add TinyMCE button for the shortcode generator
function wave_add_editor_button() {

	// If the user cannot editor posts and pages, we need to stop here
	if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
		return;
	}

	// If TinyMCE has been enabled and the RAW Theme Essentials plugin is active, add the button
	if (get_user_option('rich_editing') == 'true' && wave_is_active_plugin('raw-theme-essentials/raw-theme-essentials')) {
		add_filter('mce_external_plugins', 'wave_register_shortcode_generator_plugin');
		add_filter('mce_buttons_2', 'wave_add_shortcode_generator_button');
	}
}

// Register the shortcode generator plugin with TinyMCE
function wave_register_shortcode_generator_plugin($plugins) {
	$plugins['wave_shortcodes'] = get_template_directory_uri() . '/assets/plugins/wave-shortcodes/wave-shortcodes.js';

	return $plugins;
}

// Add the shortcode generator button to TinyMCE
function wave_add_shortcode_generator_button($buttons) {
	array_push($buttons, "wave_shortcodes");

	return $buttons;
}

// Filter the body classes to include some classes that are used to know if certain configurations are used
function wave_add_body_classes($classes) {

	// Add the default wave class
	$classes[] = 'wave';

	// Add the topbar class to activate the topbar CSS statements
	if (wave_option('header_topbar_enabled')) {
		$classes[] = 'topbar';
	}

	// Add the call to action button class to tell CSS that the footer mobile menu should be displated on small devices
	if (wave_call_to_action_button(true)) {
		$classes[] = 'call-to-action-button';
	}

	// Define the default button style
	if (wave_option('style_button_default_style')) {
		$classes[] = 'buttons-style-' . wave_option('style_button_default_style');
	} else {
		$classes[] = 'buttons-style-3d';
	}

	// If WooCommerce is enabled, add a class to tell if the woocommerce sidebar is enabled
	if (function_exists('is_shop')) {
		if (is_shop() && wave_option('shop_sidebar')) {
			$classes[] = 'woocommerce-sidebar';
		} else {
			$classes[] = 'woocommerce-no-sidebar';
		}
	} else {
		$classes[] = 'woocommerce-no-sidebar';
	}

	return $classes;
}

// Throw an error exception (this is used when wave debug is enabled)
function wave_exception_error_handler($errno, $errstr, $errfile, $errline) {
	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}

// Register OS and Google Fonts
function wave_register_fonts() {

	// Add OS Fonts
	Wave_Fonts::add_font("Arial", "os", "Arial, sans-serif", '400,400-italic,700');
	Wave_Fonts::add_font("Cambria", "os", "Cambria, Georgia, serif", '400,400-italic,700');
	Wave_Fonts::add_font('Garamond', 'os', 'Garamond, Times New Roman, Times, serif', '400,400-italic,700');
	Wave_Fonts::add_font('Georgia', 'os', 'Georgia, serif', '400,400-italic,700');
	Wave_Fonts::add_font('Helvetica', 'os', 'Helvetica, sans-serif', '400,400-italic,700');
	Wave_Fonts::add_font('Tahoma', 'os', 'Tahoma, Geneva, sans-serif', '400,400-italic,700');

	// Add Google Fonts
	$list = explode(',', wave_option('fonts', false));

	$fonts = array();

	foreach($list as $font){
		list($family, $variant) = explode(':', $font);
		$fonts[$family][] = $variant;
	}

	foreach($fonts as $family => $variants){
		Wave_Fonts::add_font($family, 'google', $family . ', sans-serif', join(',', $variants));
	}
}

// Register the sidebar for the footer
function wave_register_sidebar_footer() {
	register_sidebar(array(
		'name'          => 'Footer',
		'id'            => 'footer',
		'before_widget' => '<section id="%1$s" class="one_fourth widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
}

// Register the sidebar for the blog
function wave_register_sidebar_blog() {
	register_sidebar(array(
		'name'          => 'Blog Sidebar',
		'id'            => 'sidebar_blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}

// Register the sidebar for WooCommerce
function wave_register_sidebar_shop() {
	register_sidebar(array(
		'name'          => 'Shop Sidebar',
		'id'            => 'sidebar_shop',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}

// Add the swatches to the admin using JavaScript
function wave_add_admin_js_colors() {
	echo '<script>';
	Wave_Dynamic::print_js();
	echo '</script>';
}

// Convert Google Font data to CSS rules
function wave_google_font_2_css($fontName) {
	$fontWeight = "normal";

	$font = explode("-", $fontName);

	switch (count($font)) {
		case 1:
			$fontName   = $font[0];
			$fontWeight = "normal";
			$fontStyle  = "normal";
			break;
		case 2:
			$fontName   = $font[0];
			$fontWeight = $font[1];
			$fontStyle  = "normal";
			break;
		case 3:
			$fontName   = $font[0];
			$fontWeight = $font[1];
			$fontStyle  = $font[2];
			break;
	}

	$fontName = str_replace("+", " ", $fontName);

	return "font-family: '{$fontName}', sans-serif !important;" . "font-weight: {$fontWeight};" . "font-style: {$fontStyle};";

}

// Convert a theme options text style to CSS rules
function wave_text_style_to_css($style, $key) {
	return 'color:' . $style[$key . '_color'] . ';' . wave_google_font_2_css($style[$key . '_font']) . 'font-size:' . $style[$key . '_size'] . 'px;';
}

// Get the brightness of a color
function wave_get_color_brightness($hex) {
	$hex = str_replace('#', '', $hex);

	return ((hexdec(substr($hex, 0, 2)) * 299) + (hexdec(substr($hex, 2, 2)) * 587) + (hexdec(substr($hex, 4, 2)) * 114)) / 1000;
}

// Check if a color is bright or not
function wave_is_light_color($hex) {
	$brightness = wave_get_color_brightness($hex);

	return $brightness > 130;
}

// Get a Unique Element ID for dynamically generated elements
function wave_ueid() {
	return 'wave-' . wave_uuid();
}

// Generate a Universally Unique Identifier (a unique id, that has over 300 undecillion possible combinations)
function wave_uuid() {
	return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
}

// If any custom CSS has been generated, this function will output it
function wave_custom_css() {
	$custom_css = get_option(WAVE_OPTION_NAME . '_css');
	if (!empty($custom_css)) {
		echo '<style type="text/css">' . $custom_css . '</style>';
	}
}

// Output custom JavaScript is any was generated
function wave_custom_js() {
	$custom_js = get_option(WAVE_OPTION_NAME . '_js');
	if (!empty($custom_js)) {
		echo '<script>' . $custom_js . '</script>';
	}

}

// Save handler for when saving theme options
function wave_theme_options_save($overrride = false) {

	// If the current page is the wave theme options page or if we override it
	if ((isset($_POST["option_page"]) && $_POST["option_page"] == WAVE_OPTION_NAME . "_group") || $overrride) {

		$options = $_POST[WAVE_OPTION_NAME];

		// If a style preset was selected, overwrite the options with the preset data
		if (!empty($options['style_preset'])) {
			$options = $_POST[WAVE_OPTION_NAME] = wave_set_style_preset($options['style_preset']);
		}

		// If there are no fonts selected, use the default fonts selection
		if(empty($options['fonts'])){
			$options['fonts'] = $_POST[WAVE_OPTION_NAME]['fonts'] = WAVE_DEFAULT_FONTS;
		}

		$style      = array();
		$fonts      = array();
		$text_style = array();
		$css        = '';

		// Loop through the options to get all style and font options
		foreach ($options as $key => $value) {
			if (strpos($key, "style_") !== false) {
				$key         = substr($key, 6);
				$style[$key] = $value;
			}
			if (strpos($key, "_font") !== false) {
				$key_parent   = substr($key, 0, strpos($key, "_font"));
				$text_style[] = $key_parent;
				$fonts[$key]  = $value;
			}
		}

		// Get the easing settings from the theme options
		$style_header_easing_enabled = empty($options['style_header_easing_enabled']) ? 'true' : 'false';
		$scroll_easing_enabled       = empty($options['scroll_easing_enabled']) ? 'true' : 'false';

		// Loop through the list of fonts and add a CSS import rule for all Google Fonts
		foreach (array_unique($fonts) as $fontName) {
			if (Wave_Fonts::isType($fontName, "google")) {
				$fontName = Wave_RegEx::replace('/([\-])([0-9]+)$/', ":$2", $fontName);
				$fontName = str_replace(" ", "+", $fontName);
				$css .= '@import url(\'http://fonts.googleapis.com/css?family=' . $fontName . '&subset=all\');';
			}
		}

		// Define and get the custom CSS template
		$file     = get_template_directory() . '/include/wavethemes/data/style.css.txt';
		$template = file_get_contents($file);

		// Define custom CSS variables and apply custom filters to those who need it
		$vars                                      = $style;
		$vars['header_shadow']                     = wave_hex_to_rgba($style['header_shadow_color'], $style['header_shadow_opacity'] / 100);
		$vars['blog_item_hover_icon_color']        = $style['blog_item_hover_background_color'];
		$vars['blog_item_hover_background_color']  = wave_hex_to_rgba($style['blog_item_hover_background_color'], 0.9);
		$vars['portfolio_hover_icon_color']        = $style['portfolio_hover_background_color'];
		$vars['portfolio_hover_background_color']  = wave_hex_to_rgba($style['portfolio_hover_background_color'], 0.9);
		$vars['person_hover_icon_color']           = $style['person_hover_background_color'];
		$vars['person_hover_background_color']     = wave_hex_to_rgba($style['person_hover_background_color'], 0.9);
		$vars['cta_popup_header_background_color'] = wave_hex_to_rgba($style['cta_popup_header_background_color'], 0.8);
		$vars['button_alt_border_color']           = wave_hex_to_rgba($style['button_alt_border_color'], 0.5);

		// If the color is light the shadow should appear under the text else make it appear above the text
		if (wave_is_light_color($style['button_ui_shadow_color'])) {
			$vars['button_ui_shadow_size'] = "1";
		} else {
			$vars['button_ui_shadow_size'] = "-1";
		}

		if (wave_is_light_color($style['form_select_button_text_shadow_color'])) {
			$vars['form_select_button_text_shadow_size'] = "1";
		} else {
			$vars['form_select_button_text_shadow_size'] = "-1";
		}

		// Convert text style options to CSS rules
		foreach ($text_style as $key) {
			if (isset($style[$key . '_font'], $style[$key . '_size'], $style[$key . '_color'])) {
				$vars[$key] = wave_text_style_to_css($style, $key);
			}
		}

		// Detect all variables from the template
		$keys = Wave_RegEx::get_all('/{([a-z0-9\_]+)}/si', $template);
		$keys = next($keys);

		// Loop through all the variables within the template and replace the values
		foreach ($keys as $key) {
			if (empty($vars[$key])) {
				$vars[$key] = "";
			}
			$template = str_replace('{' . $key . '}', $vars[$key], $template);
		}

		// Add the theme options custom CSS
		if (isset($options['custom_css'])) {
			$css .= stripcslashes($options['custom_css']);
		}

		// Add the template to CSS rules and strip all line feeds, carriage returns and tabs
		$css .= str_replace(array(
			"\n",
			"\r",
			"\t"
		), '', $template);

		// Update the custom CSS option
		update_option(WAVE_OPTION_NAME . '_css', $css);


		// Set the array containing the default map settings and replace the values that have been set
		$options = shortcode_atts(array(
			'contact_map_center_latitude'  => "",
			'contact_map_center_longitude' => "",
			'contact_map_marker_image'     => "",
			'contact_map_zoom_user'        => "",
			'contact_map_zoom_default'     => "",
			'contact_map_markers'          => ""
		), $options);

		// Get all the markers for the contact map
		$markers = $options['contact_map_markers'];

		// Add the info to the map_data variable
		$map_data              = new stdClass;
		$map_data->markers     = array();
		$map_data->latitude    = $options['contact_map_center_latitude'];
		$map_data->longitude   = $options['contact_map_center_longitude'];
		$map_data->markerImage = $options['contact_map_marker_image'];
		$map_data->zoomUser    = $options['contact_map_zoom_user'];
		$map_data->zoomDefault = $options['contact_map_zoom_default'];

		// Prepare the marker data for JavaScript
		if (!empty($markers) && is_array($markers)) {

			foreach ($markers as $marker) {
				if ($marker['longitude'] != "" && $marker['latitude'] != "") {
					$map_data->markers[] = array(
						'latLng'  => array(
							(float)$marker['latitude'],
							(float)$marker['longitude']
						),
						'data'    => $marker['text'],
						'options' => array(
							'icon' => $map_data->markerImage
						)
					);
				}
			}

		}

		// Convert the map data to a JavaScript object (JSON)
		$map_data = json_encode($map_data);

		// Add the custom script variables
		//$custom_script = 'var wave_disable_header_easing = ' . ($style_header_easing_enabled ? 'false' : 'true') . ';';
		//$custom_script .= 'var wave_disable_scroll_easing = ' . ($scroll_easing_enabled ? 'false' : 'true') . ';';
		$custom_script = 'var wave_disable_header_easing = ' . $style_header_easing_enabled . ';';
		$custom_script .= 'var wave_disable_scroll_easing = ' . $scroll_easing_enabled . ';';
		$custom_script .= 'var wave_maps_config = ' . $map_data . ';';

		// Update the custom JavaScript option
		update_option(WAVE_OPTION_NAME . '_js', $custom_script);

	}

}

// Output the popups that have been activated within using shortcodes, theme options or page settings
function wave_print_popups() {
	Wave_Popup::print_popups();
}

// Overwrite the theme options with a preset style and return the result (it doesn't store it at this point)
function wave_set_style_preset($style_preset = null) {

	// If the options have been saved, use the saved options data, else use the data from the database
	if (isset($_POST[WAVE_OPTION_NAME])) {
		$options = $_POST[WAVE_OPTION_NAME];
	} else {
		$options = get_option(WAVE_OPTION_NAME);
	}

	// Define the preset file
	$presetFile = get_template_directory() . "/include/wavethemes/data/presets/" . $style_preset . ".txt";

	// If the preset file exists
	if (file_exists($presetFile)) {

		// Get the preset file and unserialize it
		$presetData = file_get_contents($presetFile);

		//echo $presetData;

		$presetData = unserialize($presetData);

		//print_r($presetData);exit;

		// Loop through the preset data and apply the style options to the existing options
		foreach ($presetData as $presetKey => $presetValue) {
			if (substr($presetKey, 0, 6) == "style_") {
				$options[$presetKey] = $presetValue;
			}
		}
	}

	// Set the style preset to empty, else it would be used on every save
	$options['style_preset'] = "";

	return $options;

}

// Adds the button and plain class to links
function wave_add_button_class($format) {
	return str_replace('href=', 'class="button plain" href=', $format);
}


// Build the page sections meta box
function wave_metabox_page_sections_build() {

	$html = '';
	$html .= '<div id="page-sections">';
	$html .= '<div class="sections-list-wrapper">';
	$html .= '<ul class="sections-list">';

	// Get all the children of the current page
	$args = array(
		'post_type'   => "page",
		'post_parent' => get_the_ID(),
		'order'       => "ASC",
		'orderby'     => "menu_order"
	);

	query_posts($args);

	$index = 0;

	// Loop through the children and add a page section item for each page
	if (have_posts()): while (have_posts()): the_post();

		$index++;

		$html .= '<li>';
		$html .= '<input type="hidden" name="page_order[' . get_the_ID() . ']" value="' . $index . '" />';
		$html .= '<div class="header">';
		$html .= '<div class="handle"></div>';
		$html .= '<div class="title">' . get_the_title() . '</div>';
		$html .= '</div>';
		$html .= '</li>';


	endwhile; endif;

	$html .= '</ul>';
	$html .= '</div>';
	$html .= '</div>';

	echo $html;

}

// Create a page thumb from an existing file
function wave_create_thumb($filename, $width, $height) {
	$image = wp_get_image_editor($filename);
	if (!is_wp_error($image)) {
		$new_filename = $image->generate_filename($width . 'x' . $height);
		if (!file_exists($new_filename)) {
			$image->resize($width, $height, true);
			$image->save($new_filename);
		}

		return $new_filename;
	}

	return null;
}

// Check if a thumb aleady exists
function wave_thumb_exists($filename, $width, $height) {
	$image        = wp_get_image_editor($filename);
	$suffix       = $width . 'x' . $height;
	$new_filename = $image->generate_filename($suffix);

	return file_exists($new_filename);
}

// Get a thumb URL
function wave_get_thumb_url($attachment_id, $width = 150, $height = 150) {
	$attachment = get_attached_file($attachment_id);
	$filename   = wave_create_thumb($attachment, $width, $height);
	$url        = site_url() . substr($filename, strpos($filename, "/wp-content/"));

	return $url;
}

// Get a thumb based up a post
function wave_get_post_thumb_url($post_id, $width = 150, $height = 150) {
	$attachment_id = get_post_thumbnail_id($post_id);

	return wave_get_thumb_url($attachment_id, $width, $height);
}

// Convert a HEX color code to RGBA
function wave_hex_to_rgba($hex, $alpha = 1) {

	// Make sure the alpha value is a float
	$alpha = floatval($alpha);

	// Strip off the octothorpe
	$hex = str_replace("#", "", $hex);

	// Define the default rgb variable as null, in case the HEX value is not a valid color code
	$rgb = null;

	// If the HEX value consists of 3 characters, else if the HEX value consists of 6 characters
	if (strlen($hex) == 3) {
		$rgb = array(
			hexdec(substr($hex, 0, 1) . substr($hex, 0, 1)),
			hexdec(substr($hex, 1, 1) . substr($hex, 1, 1)),
			hexdec(substr($hex, 2, 1) . substr($hex, 2, 1))
		);
	} elseif (strlen($hex) == 6) {
		$rgb = array(
			hexdec(substr($hex, 0, 2)),
			hexdec(substr($hex, 2, 2)),
			hexdec(substr($hex, 4, 2))
		);
	}

	// If the rgb variable is an array we're going to return the RGB or RGBA value
	if (is_array($rgb)) {

		if ($alpha === 1) {
			return "rgb({$rgb[0]}, {$rgb[1]}, {$rgb[2]})";
		} else {
			return "rgba({$rgb[0]}, {$rgb[1]}, {$rgb[2]}, $alpha)";
		}

	}

	// If the HEX color value was invalid we will return null
	return null;
}

// Get a list of all IcoMoon Ultimate icons
function wave_get_icomoon_list() {
	$filename = get_template_directory() . '/include/wavethemes/data/icomoon.txt';
	$data     = file_get_contents($filename);

	return unserialize($data);
}

// Get a list of all Font Awesome icons
function wave_get_fontawesome_list() {
	$filename = get_template_directory() . '/include/wavethemes/data/fontawesome.txt';
	$data     = file_get_contents($filename);

	return unserialize($data);
}

// Closes a div element (this is used for hooks)
function wave_close_div() {
	echo '</div>';
}

// Add a clearboth element to clear floats (this is used for hooks)
function wave_clearboth($return = false) {
	if ($return) {
		return '<div class="clearboth"></div>';
	} else {
		echo '<div class="clearboth"></div>';
	}
}

// Get a list of all Gravity Forms and Contact Form 7 forms
function wave_get_forms() {

	$list = array();

	// Gravity Forms is active and the class we need exists, add the forms to the list
	if (class_exists("RGFormsModel")) {
		$forms = RGFormsModel::get_forms(null, "title");

		foreach ($forms as $form) {
			$list['gravityforms-' . $form->id] = __('Gravity Forms - ', WAVE_TEXT_DOMAIN) . $form->title;
		}
	}

	// Contact Form 7 is active and the class we need exists, add the forms to the list
	if (class_exists("WPCF7_ContactForm")) {
		$forms = WPCF7_ContactForm::find();

		foreach ($forms as $form) {
			$list['contactform7-' . $form->id] = __('Contact Form 7 - ', WAVE_TEXT_DOMAIN) . $form->title;
		}
	}

	return $list;

}

// Add a meta box using RW Meta Box
function wave_add_meta_box($metaBox) {
	require_once locate_template("/include/meta-box/meta-box.php");
	new RW_Meta_Box($metaBox);
}

// Get a list of all call to actions
function wave_get_call_to_actions_list($add_none = true, $add_inherit = true) {

	$list = array();

	// If add_none is true, we need to add a 'none' option to the list
	if ($add_none) {
		$list['none'] = __('None (hides button)', WAVE_TEXT_DOMAIN);
	}

	// If add_inherit is true, we need to add a 'inherit' option to the list
	if ($add_inherit) {
		$list['inherit'] = __('Inherit (Theme Options)', WAVE_TEXT_DOMAIN);
	}

	// Search for all cta post types
	$posts = get_posts(array('post_type' => "cta"));

	// Loop through the posts and store the name and id in the list variable
	foreach ($posts as $post) {
		$list[$post->ID] = $post->post_title;
	}

	return $list;

}

// Register the custom meta boxes
function wave_register_meta_boxes() {

	// If we're at a edit/add post post page
	if (isset($_POST['post_ID']) || isset($_GET['post'])) {

		// Get the post ID from either the post or post_ID post variable
		$post_id = isset($_GET['post']) ? $_GET['post'] : $_POST['post_ID'];

		// Get the posts page template
		$template_file = get_post_meta($post_id, '_wp_page_template', true);

		// Get the list of available sliders
		$sliders = wave_get_sliders();

		// Get the list of available call to actions
		$call_to_actions = wave_get_call_to_actions_list();

		$fields = array();

		// If the current post is anything but a one pager
		if ($template_file != "page-onepager.php") {

			// Add the show section title field
			$fields[] = array(
				'name'     => __('Show Section Title', WAVE_TEXT_DOMAIN),
				'id'       => "display_title",
				'type'     => 'switch',
				'sub_desc' => __('Whether to show the title at the top of the page.', WAVE_TEXT_DOMAIN),
				'std'      => 1
			);

			// Add the background color field
			$fields[] = array(
				'name'     => __('Background Color', WAVE_TEXT_DOMAIN),
				'id'       => "background_color",
				'type'     => 'color',
				'sub_desc' => __('With this option you set a custom background color for the page. (Optional)', WAVE_TEXT_DOMAIN),
				'std'      => ""
			);

			// Add the background image field
			$fields[] = array(
				'name'             => __('Background Image', WAVE_TEXT_DOMAIN),
				'id'               => "background_image",
				'type'             => 'image_advanced',
				'sub_desc'         => __('Here you can select a background image. (Optional)', WAVE_TEXT_DOMAIN),
				'max_file_uploads' => 1,
				'std'              => ""
			);

			// Add the switch to enable/disable parallax for the background
			$fields[] = array(
				'name'     => __('Use Parallax', WAVE_TEXT_DOMAIN),
				'id'       => "enable_parallax",
				'sub_desc' => __('Enable/disable this to the use a parallax effect for the background image.', WAVE_TEXT_DOMAIN),
				'type'     => 'switch',
				'std'      => 0
			);

		}

		// If the current post is anything but a page section
		if ($template_file != "page-onepager-section.php") {

			// Add the slider field
			$fields[] = array(
				'name'        => __('Slider', WAVE_TEXT_DOMAIN),
				'id'          => "slider",
				'type'        => 'select_advanced',
				'sub_desc'    => __('Select a slider that will be shown at the top of the page. (Optional)', WAVE_TEXT_DOMAIN),
				'options'     => $sliders,
				'multiple'    => false,
				'placeholder' => __('Select an Item', WAVE_TEXT_DOMAIN),
			);

			// Add the call to action field
			$fields[] = array(
				'name'        => __('Call To Action', WAVE_TEXT_DOMAIN),
				'id'          => "cta_id",
				'type'        => 'select_advanced',
				'sub_desc'    => __('Select a Call to Action that will be shown in the header. By default the settings from the Theme Options will be used. (Optional)', WAVE_TEXT_DOMAIN),
				'options'     => $call_to_actions,
				'multiple'    => false,
				'placeholder' => __('Select an Item', WAVE_TEXT_DOMAIN),
			);

		}

		// Add the meta box using the fields that have been added above
		wave_add_meta_box(array(
			'id'       => "page_settings",
			'title'    => __('Settings', WAVE_TEXT_DOMAIN),
			'context'  => 'normal',
			'priority' => 'high',
			'pages'    => array('page'),
			'fields'   => $fields
		));

		// If the current post is a page section
		if ($template_file == "page-onepager-section.php") {

			// Add the separator meta box
			wave_add_meta_box(array(
				'id'       => "onepager_section_separator",
				'title'    => __('Separator', WAVE_TEXT_DOMAIN),
				'context'  => 'normal',
				'priority' => 'default',
				'pages'    => array('page'),
				'fields'   => array(
					array(
						'name'     => __('Enable Separator', WAVE_TEXT_DOMAIN),
						'id'       => "enable_separator",
						'sub_desc' => __('Enable/disable this to show or hide the separator below the page section.'),
						'type'     => 'switch',
						'std'      => 0,
					),
					array(
						'name'     => __('Use Parallax', WAVE_TEXT_DOMAIN),
						'id'       => "enable_separator_parallax",
						'sub_desc' => __('Enable/disable this to the use a parallax effect for the background image.', WAVE_TEXT_DOMAIN),
						'type'     => 'switch',
						'std'      => 1,
					),
					array(
						'name'     => __('Show Pattern', WAVE_TEXT_DOMAIN),
						'id'       => "enable_separator_pattern",
						'sub_desc' => __('Enable/disable this to show or hide the pattern that will cover the background image.', WAVE_TEXT_DOMAIN),
						'type'     => 'switch',
						'std'      => 1,
					),
					array(
						'name'             => __('Background Image', WAVE_TEXT_DOMAIN),
						'id'               => "separator_background",
						'type'             => 'image_advanced',
						'sub_desc'         => __('Here you can choose a background image that will be used in the separator.', WAVE_TEXT_DOMAIN),
						'max_file_uploads' => 1,
					),
					array(
						'name'     => __('Content', WAVE_TEXT_DOMAIN),
						'id'       => "separator_content",
						'type'     => 'wysiwyg',
						'sub_desc' => __('With this editor you can add the content that will be shown within the separator.', WAVE_TEXT_DOMAIN),
						'raw'      => false,
						'options'  => array(
							'textarea_rows' => 6,
							'teeny'         => false,
							'media_buttons' => true,
						),
					)
				)
			));
		}

	}

	// Add the portfolio meta box to portfolio post types
	wave_add_meta_box(array(
		'title'  => __('Project Details', WAVE_TEXT_DOMAIN),
		'pages'  => array("portfolio"),
		'fields' => array(
			array(
				'name'     => __('Project URL', WAVE_TEXT_DOMAIN),
				'id'       => "wave_project_url",
				'desc'     => __('(Optional)', WAVE_TEXT_DOMAIN),
				'sub_desc' => __('Enter the project URL.', WAVE_TEXT_DOMAIN),
				'type'     => 'text'
			),
			array(
				'name'             => __('Project Images', WAVE_TEXT_DOMAIN),
				'id'               => "wave_project_images",
				'type'             => 'image_advanced',
				'sub_desc'         => __('Select or upload the project related images.', WAVE_TEXT_DOMAIN),
				'max_file_uploads' => 120,
			)
		)
	));

	// Add the team member meta box to team post types
	wave_add_meta_box(array(
		'id'       => 'standard',
		'title'    => __('Team Member', WAVE_TEXT_DOMAIN),
		'pages'    => array('team'),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name'     => __('Title', WAVE_TEXT_DOMAIN),
				'id'       => "teammember_title",
				'sub_desc' => __('For example: Director, Designer, Manager, etc...', WAVE_TEXT_DOMAIN),
				'type'     => 'text',
				'std'      => ""
			),
			array(
				'name'     => __('Description', WAVE_TEXT_DOMAIN),
				'id'       => "teammember_description",
				'sub_desc' => __('Tell something about the team member.', WAVE_TEXT_DOMAIN),
				'type'     => 'textarea',
				'std'      => ""
			),
		)
	));

	// Add the social media meta box to team post types
	wave_add_meta_box(array(
		'id'       => 'socialmedia',
		'title'    => __('Social Media', WAVE_TEXT_DOMAIN),
		'pages'    => array('team'),
		'context'  => 'normal',
		'priority' => 'high',
		'autosave' => true,
		'fields'   => array(
			array(
				'name' => __('Facebook URL (Optional)', WAVE_TEXT_DOMAIN),
				'id'   => "teammember_socialmedia_facebook",
				'type' => 'text',
				'desc' => __('Leave empty if you don\'t intend to use this.', WAVE_TEXT_DOMAIN),
				'std'  => ""
			),
			array(
				'name' => __('Google Plus URL (Optional)', WAVE_TEXT_DOMAIN),
				'id'   => "teammember_socialmedia_googleplus",
				'type' => 'text',
				'desc' => __('Leave empty if you don\'t intend to use this.', WAVE_TEXT_DOMAIN),
				'std'  => ""
			),
			array(
				'name' => __('Twitter URL (Optional)', WAVE_TEXT_DOMAIN),
				'id'   => "teammember_socialmedia_twitter",
				'type' => 'text',
				'desc' => __('Leave empty if you don\'t intend to use this.', WAVE_TEXT_DOMAIN),
				'std'  => ""
			),
			array(
				'name' => __('LinkedIn URL (Optional)', WAVE_TEXT_DOMAIN),
				'id'   => "teammember_socialmedia_linkedin",
				'type' => 'text',
				'desc' => __('Leave empty if you don\'t intend to use this.', WAVE_TEXT_DOMAIN),
				'std'  => ""
			)
		)
	));

	// Add the call to action button meta box to cta post types
	wave_add_meta_box(array(
		'id'       => "cta_button",
		'title'    => __('Button', WAVE_TEXT_DOMAIN),
		'context'  => 'normal',
		'priority' => 'default',
		'pages'    => array('cta'),
		'fields'   => array(
			array(
				'name'     => __('Button Text', WAVE_TEXT_DOMAIN),
				'id'       => "cta_button_text",
				'desc'     => __('Text description', WAVE_TEXT_DOMAIN),
				'sub_desc' => __('Enter the the text that will be displayed within the button.', WAVE_TEXT_DOMAIN),
				'type'     => 'text',
				'std'      => __('Button Text', WAVE_TEXT_DOMAIN)
			),
			array(
				'name'     => __('Button Icon', WAVE_TEXT_DOMAIN),
				'id'       => "cta_button_icon",
				'type'     => 'text',
				'class'    => "icons-select",
				'multiple' => false,
				'sub_desc' => __('Select an icon that will be shown at the left hand side of the button.', WAVE_TEXT_DOMAIN),
				'desc'     => __('(Optional)', WAVE_TEXT_DOMAIN),
				'std'      => '',
			)
		)
	));

	// Add the call to action popup meta box to the cta post types
	wave_add_meta_box(array(
		'id'       => "cta_popup",
		'title'    => __('Popup', WAVE_TEXT_DOMAIN),
		'context'  => 'normal',
		'priority' => 'default',
		'pages'    => array('cta'),
		'fields'   => array(
			array(
				'name'     => __('Popup Heading', WAVE_TEXT_DOMAIN),
				'id'       => "cta_popup_header_text",
				'sub_desc' => __('Enter the text that should be used as the popup\'s heading.', WAVE_TEXT_DOMAIN),
				'type'     => 'text',
				'std'      => __('Heading', WAVE_TEXT_DOMAIN),
			),
			array(
				'name'     => __('Popup Sub-Heading', WAVE_TEXT_DOMAIN),
				'id'       => "cta_popup_header_subtext",
				'sub_desc' => __('This is the smaller text that will be displayed below the popup\'s heading.', WAVE_TEXT_DOMAIN),
				'type'     => 'text',
				'std'      => __('Sub-heading', WAVE_TEXT_DOMAIN)
			),
			array(
				'name'     => __('Popup Width', WAVE_TEXT_DOMAIN),
				'id'       => "cta_popup_width",
				'sub_desc' => __('Enter the width of the popup.', WAVE_TEXT_DOMAIN),
				'type'     => 'text',
				'std'      => '300'
			),
			array(
				'name'        => __('Popup Form', WAVE_TEXT_DOMAIN),
				'id'          => "cta_popup_form",
				'type'        => 'select_advanced',
				'options'     => wave_get_forms(),
				'multiple'    => false,
				'sub_desc'    => __('Select the form that you wish to display in the popup.', WAVE_TEXT_DOMAIN),
				'placeholder' => __('Select a form', WAVE_TEXT_DOMAIN),
			)
		)
	));

}

// Add ignore filter for BWP Minify
function wave_style_ignore_bwp_minify($excluded) {
	$excluded = array(
		'font-awesome',
		'font-awesome-ie7'
	);

	return $excluded;
}

// Register and enqueue scripts and stylesheets for in the wordpress admin
function wave_admin_enqueue_scripts() {

	// Register scripts
	wp_register_script('wave-backend', get_template_directory_uri() . '/assets/js/backend.js', false, '1.0', true);
	wp_register_script('simple-slider', get_template_directory_uri() . '/assets/plugins/simple-slider/simple-slider.min.js', false, '1.0', true);
	wp_register_script('chosen', get_template_directory_uri() . '/assets/plugins/chosen/chosen.jquery.min.js', false, '1.0', true);
	wp_register_script('spectrum', get_template_directory_uri() . '/assets/plugins/spectrum/spectrum.js', 'jquery', '1.0', true);
	wp_register_script('icheck', get_template_directory_uri() . '/assets/plugins/icheck/jquery.icheck.min.js', 'jquery', '1.0', true);

	// Register stylesheets
	wp_register_style('chosen', get_template_directory_uri() . '/assets/plugins/chosen/chosen.css');
	wp_register_style('simple-slider', get_template_directory_uri() . '/assets/plugins/simple-slider/simple-slider.css');
	wp_register_style('simple-slider-volume', get_template_directory_uri() . '/assets/plugins/simple-slider/simple-slider-volume.css');
	wp_register_style('admin', get_template_directory_uri() . '/assets/css/backend/backend.css');
	wp_register_style('font-open-sans', get_template_directory_uri() . '/assets/fonts/OpenSans/OpenSans.css');
	wp_register_style('spectrum', get_template_directory_uri() . '/assets/plugins/spectrum/spectrum.css');
	wp_register_style('font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome/font-awesome.min.css', null, '1.0');
	wp_register_style('font-awesome-ie7', get_template_directory_uri() . '/assets/fonts/font-awesome/font-awesome-ie7.min.css', null, '1.0');
	wp_register_style('icomoon', get_template_directory_uri() . '/assets/fonts/icomoon/icomoon.css', null, '1.0');

	// Enqueue scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('icheck');
	wp_enqueue_script('spectrum');
	wp_enqueue_script('simple-slider');
	wp_enqueue_script('chosen');
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-selectable');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('wave-backend');

	// Enqueue stylesheets
	wp_enqueue_style('thickbox');
	wp_enqueue_style('simple-slider');
	wp_enqueue_style('chosen');
	wp_enqueue_style('simple-slider-volume');
	wp_enqueue_style('admin');
	wp_enqueue_style('font-open-sans');
	wp_enqueue_style('spectrum');
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('font-awesome-ie7');
	wp_enqueue_style('icomoon');

}

// Get a list of all sliders from both Layer Slider and Slider Revolution
function wave_get_sliders() {

	$list = array();

	// If the Layer Slider list function is defined, add all sliders
	if (function_exists("lsSliders")) {

		$sliders = lsSliders();

		foreach ($sliders as $slider) {
			$list['lay-' . $slider['id']] = "Layer Slider - " . $slider['name'];
		}

	}

	// If the Revolution Slider class is defined, add all sliders
	if (class_exists("RevSlider")) {

		$revolutionSlider = new RevSlider();
		$sliders          = $revolutionSlider->getArrSliders();

		foreach ($sliders as $slider) {
			$list['rev-' . $slider->getID()] = "Revolution Slider - " . $slider->getTitle();
		}

	}

	// Order by slider type and id
	ksort($list);

	return $list;

}

// Update the page sections order
function wave_metabox_page_sections_save($post_id) {
	if (isset($_POST['page_order'])) {
		$page_order = $_POST['page_order'];
		unset($_POST['page_order']);
		foreach ($page_order as $page_id => $menu_order) {
			wp_update_post(array(
				'ID'         => $page_id,
				'menu_order' => $menu_order
			));
		}
	}
}

// Add the page sections meta box to the one pager template
function wave_metabox_page_sections() {
	if (isset($_GET['post']) || isset($_POST['post_ID'])) {

		$post_id = isset($_GET['post']) ? $_GET['post'] : $_POST['post_ID'];

		$template_file = get_post_meta($post_id, '_wp_page_template', true);

		if ($template_file == 'page-onepager.php') {
			add_meta_box('page_sections', 'Page Sections', 'wave_metabox_page_sections_build', 'page', 'normal', 'default');
			add_action('save_post', 'wave_metabox_page_sections_save');
		} else {
			remove_meta_box("onepager_main", "page", "normal");
		}
	}
}

// If the theme has just been activated and body text style has not been set, apply the light style preset
if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php') {

	$options = get_option(WAVE_OPTION_NAME);

	if (empty($options['style_body_text'])) {
		$options                 = wave_set_style_preset("light");
		$_POST[WAVE_OPTION_NAME] = $options;
		wave_theme_options_save(true);
		update_option(WAVE_OPTION_NAME, $options);
	}

}

// Hide TinyMCE from one pagers in the edit/add post page
function wave_hide_editor() {

	// If the post variable has not been defined, do not continue
	if (!isset($_GET['post'])) {
		return;
	}

	// Get the current page's template file name
	$template = get_post_meta($_GET['post'], '_wp_page_template', true);

	// If the current page is a one pager, remove TinyMCE and the thumbnail features
	if ($template == 'page-onepager.php') {
		remove_post_type_support('page', 'editor');
		remove_post_type_support('page', 'thumbnail');
	}
}

// Filter navigation menu items, within one pagers, to use a hash instead of a full URL
function wave_filter_nav_items($items, $args) {

	// Loop through all menu items
	foreach ($items as $index => $item) {

		// Get the post's parent item
		$parent = current(get_pages(array('include' => $item->post_parent)));

		// If the parent's template is a one pager, alter the URL
		if (get_post_meta($parent->ID, '_wp_page_template', true) == "page-onepager.php") {
			$permalink          = get_permalink($parent->ID);
			$url                = rtrim($item->url, "/");
			$items[$index]->url = $permalink . "#" . substr($url, strrpos($url, "/") + 1);
		}

	}

	return $items;
}

// Register required plugins with TGM
function wave_register_required_plugins() {

	$plugins = array(
		array(
			'name'               => 'RAW Theme Essentials',
			'slug'               => 'raw-theme-essentials',
			'version'            => '1.0',
			'source'             => get_template_directory() . '/include/wavethemes/plugins/raw-theme-essentials.zip',
			'force_deactivation' => true,
			'required'           => true,
			'is_automatic'       => true
		),
		array(
			'name'         => 'Revolution Slider',
			'slug'         => 'revslider',
			'version'      => '3.0.95',
			'source'       => get_template_directory() . '/include/wavethemes/plugins/revslider.zip',
			'required'     => false,
			'is_automatic' => true
		),
		array(
			'name'         => 'Layer Slider',
			'slug'         => 'LayerSlider',
			'version'      => '4.6.3',
			'source'       => get_template_directory() . '/include/wavethemes/plugins/layersliderwp-4.6.3.installable.zip',
			'required'     => false,
			'is_automatic' => true
		)
	);

	$config = array(
		'domain'           => WAVE_TEXT_DOMAIN,
		'default_path'     => '',
		'parent_menu_slug' => 'themes.php',
		'parent_url_slug'  => 'themes.php',
		'menu'             => 'install-required-plugins',
		'has_notices'      => true,
		'is_automatic'     => false,
		'message'          => '',
		'strings'          => array(
			'page_title'                      => __('Install Required Plugins', WAVE_TEXT_DOMAIN),
			'menu_title'                      => __('Install Plugins', WAVE_TEXT_DOMAIN),
			'installing'                      => __('Installing Plugin: %s', WAVE_TEXT_DOMAIN),
			'oops'                            => __('Something went wrong with the plugin API.', WAVE_TEXT_DOMAIN),
			'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', WAVE_TEXT_DOMAIN),
			'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', WAVE_TEXT_DOMAIN),
			'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', WAVE_TEXT_DOMAIN),
			'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', WAVE_TEXT_DOMAIN),
			'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', WAVE_TEXT_DOMAIN),
			'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', WAVE_TEXT_DOMAIN),
			'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', WAVE_TEXT_DOMAIN),
			'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', WAVE_TEXT_DOMAIN),
			'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', WAVE_TEXT_DOMAIN),
			'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', WAVE_TEXT_DOMAIN),
			'return'                          => __('Return to Required Plugins Installer', WAVE_TEXT_DOMAIN),
			'plugin_activated'                => __('Plugin activated successfully.', WAVE_TEXT_DOMAIN),
			'complete'                        => __('All plugins installed and activated successfully. %s', WAVE_TEXT_DOMAIN)
		)
	);

	tgmpa($plugins, $config);

}


// Enqueue all stylesheets and script for the front end.
function wave_frontend_scripts() {

	// Get all wave options
	$options = get_option(WAVE_OPTION_NAME);

	// Define path variables for JavaScripts, CSS, plugins and fonts
	$path_js      = get_template_directory_uri() . '/assets/js';
	$path_css     = get_template_directory_uri() . '/assets/css';
	$path_plugins = get_template_directory_uri() . '/assets/plugins';
	$path_fonts   = get_template_directory_uri() . '/assets/fonts';

	// Dequeue jQuery Chosen for WooCommerce. It doesn't work well with mobile devices.
	wp_dequeue_style('woocommerce_chosen_styles');
	wp_dequeue_script('wc-chosen');

	// Deregister HoverIntent. The version that comes with WordPress 3.5 has a conflict with SuperFish.
	wp_deregister_script('hoverIntent');

	// Register all JavaScripts
	wp_register_script('modernizr', $path_plugins . '/modernizr/modernizr-2.6.2.dev.js', 'jquery', '1.0', true);
	wp_register_script('transit', $path_plugins . '/transit/jquery.transit.min.js', 'jquery', '1.0', true);
	wp_register_script('waypoints', $path_plugins . '/waypoints/waypoints.min.js', 'jquery', '1.0', true);
	wp_register_script('hoverIntent', $path_plugins . '/hover-intent/hoverIntent.js', 'jquery', '1.0', true);
	wp_register_script('flexslider', $path_plugins . '/flexslider/jquery.flexslider-min.js', 'jquery', '1.0', true);
	wp_register_script('superfish', $path_plugins . '/superfish/superfish.js', 'jquery', '1.0', true);
	wp_register_script('stellar', $path_plugins . '/stellar/jquery.stellar.min.js', 'jquery', '1.0', true);
	wp_register_script('chosen', $path_plugins . '/chosen/chosen.jquery.min.js', false, '1.0', true);
	wp_register_script('jquery-tools', $path_plugins . '/jquery-tools/jquery.tools.min.js', 'jquery', '1.1.2', true);
	wp_register_script('carouFredSel', $path_plugins . '/caroufredsel/jquery.carouFredSel-6.2.1-packed.js', 'jquery', '6.2.1', true);
	wp_register_script('fancybox', $path_plugins . '/fancybox/jquery.fancybox-1.3.4.pack.js', 'jquery', '1.3.4', true);
	wp_register_script('wave-frontend', $path_js . '/frontend.js', 'jquery', '1.0', true);

	// Register all stylesheets
	wp_register_style('font-awesome', $path_fonts . '/font-awesome/font-awesome.min.css', null, '1.0');
	wp_register_style('font-awesome-ie7', $path_fonts . '/font-awesome/font-awesome-ie7.min.css', null, '1.0');
	wp_register_style('icomoon', $path_fonts . '/icomoon/icomoon.css', null, '1.0');
	wp_register_style('chosen', $path_plugins . '/chosen/chosen.css', null, '1.0');
	wp_register_style('superfish', $path_plugins . '/superfish/superfish.css', null, '1.0');
	wp_register_style('flexslider', $path_plugins . '/flexslider/flexslider.css', null, '1.0');
	wp_register_style('fancybox', $path_plugins . '/fancybox/jquery.fancybox-1.3.4.css', null, '1.3.4');
	wp_register_style('wave-frontend', $path_css . '/frontend/frontend.css', null, '1.0');

	$custom_css = get_option(WAVE_OPTION_NAME . '_css');
	if (!empty($custom_css)) {
		wp_add_inline_style('wave-frontend', $custom_css);
	}

	// Enqueue all JavaScripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-spinner');
	wp_enqueue_script('modernizr');
	wp_enqueue_script('transit');
	wp_enqueue_script('chosen');
	wp_enqueue_script('waypoints');
	wp_enqueue_script('hoverIntent');
	wp_enqueue_script('flexslider');
	wp_enqueue_script('jquery-tools');
	wp_enqueue_script('carouFredSel');
	wp_enqueue_script('superfish');
	wp_enqueue_script('stellar');
	wp_enqueue_script('fancybox');
	wp_enqueue_script('wave-frontend');

	// Enqueue all stylesheets
	wp_enqueue_style('font-awesome');
	wp_enqueue_style('font-awesome-ie7');
	wp_enqueue_style('chosen');
	wp_enqueue_style('flexslider');
	wp_enqueue_style('superfish');
	wp_enqueue_style('fancybox');
	wp_enqueue_style('spectrum');
	wp_enqueue_style('icomoon');
	wp_enqueue_style('wave-frontend');

}

// Filter the Gravity Forms submit button, to exclude the onclick attribute (to make the form work from within popups)
function wave_gform_submit_button($button, $form) {
	return Wave_RegEx::replace("#(onclick='[^']+)'#si", '', $button);
}

// Get a list of all one pagers
function wave_get_one_pagers() {

	$list = array();

	// Get al list of all pages
	$pages = get_pages();

	// Loop through the list of pages
	foreach ($pages as $page) {

		// Get the template file name of each page
		$template_file = get_post_meta($page->ID, '_wp_page_template', true);

		// If the template file is a one pager template, add it to the list
		if ($template_file == "page-onepager.php") {
			$list[] = $page;
		}

	}

	return $list;

}

// Convert a number to a number with pixels. It also allows percentage values to pass
function wave_html_size($str) {

	if (is_numeric($str)) {
		$str .= 'px';
	}

	return $str;

}

// Outputs the slider that was configured for the current page
function wave_page_slider($post_id = null) {

	// If the current page is a 404 page, we don't need to do anything
	if (is_404()) {
		return;
	}

	// If the post_id variable was not defined, we will use the global post ID
	if (is_null($post_id)) {
		$post_id = get_the_ID();
	}

	if (wave_is_active_plugin('woocommerce/woocommerce') && is_shop()) {
		$post_id = get_option('woocommerce_shop_page_id');
	}

	// If the topbar is enabled, add the has-topbar class to the slider element
	if (wave_option('header_topbar_enabled')) {
		$class_has_topbar = ' class="has-topbar"';
	} else {
		$class_has_topbar = "";
	}

	// Get the slider meta value for the current page
	$slider = get_post_meta($post_id, 'slider', true);

	// If the slider value contains a dash (which separates the slider type and ID)
	if (strpos($slider, "-")) {

		// Split the slider type and ID into two separate variables
		list($slider_type, $slider_id) = explode("-", $slider);

		// Use the slider type to determine whether to use Layer Slider or Slider Revolution
		switch ($slider_type) {
			case "lay":

				// If the Layer Slider function exists
				if (function_exists("layerslider")) {

					// Get the slider output by slider ID
					$slider = lsSliderById($slider_id);

					// Convert the height of the slider to a HTML valid height
					$height = wave_html_size($slider['data']['properties']['height']);

					// Output the slider element and Layer Slider
					echo '<div id="slider"' . $class_has_topbar . ' style="height: ' . $height . '">';
					layerslider($slider_id);
					echo '</div>';
				}
				break;
			case "rev":

				// If the Slider Revolution function exists
				if (function_exists("putRevSlider")) {

					// Start a Revolution Slider Instance and get the slider output by slider ID
					$slider = new Revslider();
					$slider->initByID($slider_id);

					// Convert the height of the slider to a HTML valid height
					$height = wave_html_size($slider->getParam('height'));

					// Output the slider element and Revolution Slider
					echo '<div id="slider"' . $class_has_topbar . ' style="height: ' . $height . '">';
					putRevSlider($slider_id);
					echo '</div>';
				}
				break;
		}
	}
}

// Filter the content for rough HTML elements around shortcode tags
function wave_content_filter($content) {

	// Define the list of strange patterns
	$replacements = array(
		'<p>['    => "[",
		']</p>'   => "]",
		']<br />' => "]",
		']<br/>'  => "]",
		'<br />[' => "[",
		'<br/>['  => "["
	);

	// Replace all occurences of the patterns with their counter parts
	return strtr($content, $replacements);

}

// Register custom widgets
function wave_widgets_active() {

	// If the RAW Theme Essentials plugin is active, register the recent projects widget
	if (wave_is_active_plugin('raw-theme-essentials/raw-theme-essentials')) {
		register_widget('Wave_Widget_RecentProjects');
	}

	// Register the recent posts widget
	register_widget('Wave_Widget_RecentPosts');
}

// Get the template for the select icon dialog
function wave_dialog_select_icon() {
	get_template_part("parts/admin/dialog/select-icon");
	exit;
}

// Get information by using a key
function wave_info($key) {

	switch ($key) {
		case "ios_icon_57":
		case "ios_icon_114":
		case "ios_icon_72":
		case "ios_icon_144":
		case "favicon":
			if (wave_option($key)) {
				return wave_option($key);
			}
			break;
	}

	return null;
}

// Get the slug of a post
function wave_get_the_slug($post_id = null) {
	global $post;
	$post_data = get_post($post_id ? $post_id : $post->ID, ARRAY_A);

	return $post_data['post_name'];
}

// Output the slug of a post
function wave_the_slug($post_id = null) {
	echo wave_get_the_slug($post_id);
}

// Output the tracking code in case one was defined
function wave_add_tracking_code() {

	if (wave_option('tracking_code')) {
		echo wave_option('tracking_code');
	}

}


function wave_get_one_page_menu_location() {
	$post = current(get_pages(array('include' => get_the_ID())));

	if (isset($post->guid)) {
		return 'mainmenu-' . md5($post->guid);
	} else {
		return false;
	}

}


// Output the default primary menu using a container ID
function wave_default_primary_menu($container_id = "mainmenu") {

	// If the container ID is empty, do not proceed
	if (empty($container_id) || !has_nav_menu('primary')) {
		return;
	}

	// Output the navigation menu and if the container ID is mobilemenu use the mobile class name, else use sf-menu
	wp_nav_menu(array(
		'theme_location' => 'primary',
		'container_id'   => $container_id,
		'menu_class'     => ($container_id == "mobilemenu" ? 'mobile' : "sf-menu"),
		'depth'          => 2
	));

}

// Output the primary menu
function wave_primary_menu() {

	// If the current page is a 404 page, do not output the primary menu
	if (is_404()) {
		wave_default_primary_menu();

		return;
	}

	$menu_location = wave_get_one_page_menu_location();

	// If the current page is a one pager and it has its own menu, else use the default primary menu
	if (has_nav_menu($menu_location)) {
		wp_nav_menu(array(
			'theme_location' => $menu_location,
			'menu_class'     => 'sf-menu',
			'container_id'   => "mainmenu",
			'depth'          => 2
		));
	} else {
		wave_default_primary_menu();
	}
}

// Output the menu mobile
function wave_add_mobilemenu() {

	// If the current page is a 404 page, do not proceeed
	if (is_404()) {
		wave_default_primary_menu("mobilemenu");

		return;
	}

	$menu_location = wave_get_one_page_menu_location();

	// If the current page is a one pager and it has its own menu, else use the default mobile menu
	if (has_nav_menu($menu_location)) {
		wp_nav_menu(array(
			'theme_location' => $menu_location,
			'container_id'   => "mobilemenu",
			'depth'          => 2
		));
	} else {
		wave_default_primary_menu("mobilemenu");
	}
}

// Build a form using Gravity Forms or Contact Form 7
function wave_build_form($form) {

	// If the form variable does not contain a dash, the value is invalid
	if (!strpos($form, '-')) {
		return;
	}

	// Split the form value into the form type and ID
	list($type, $id) = explode("-", $form);

	// Build the form using the shortcode and the form ID
	switch ($type) {
		case "gravityforms":
			return do_shortcode("[gravityform id=\"{$id}\" ajax=\"true\"]");
			break;
		case "contactform7":
			return do_shortcode("[contact-form-7 id=\"{$id}\" title=\"\"]");
			break;
	}

	return null;

}

// Add call to action popup based upon the current post ID
function wave_add_call_to_action_popup() {

	// If the current page is a 404 page, do not proceed
	if (is_404()) {
		return;
	}

	// Get the call to action button status
	$cta_button_enable = get_post_meta(get_the_ID(), "cta_button_enable", true);

	// If the call to action button status is not empty, get the popup template
	if (!empty($cta_button_enable)) {
		get_template_part("parts/call-to-action/popup");
	}

}

// Return or output a call to action button
function wave_call_to_action_button($return = false) {

	// If the current page is a 404 page, do not proceed
	if (is_404()) {
		return;
	}

	// Get the call to action ID based upon the post ID
	$page_cta = get_post_meta(get_the_ID(), "cta_id", true);

	// Check if the header call to action has been enabled and define cta_id
	if (wave_option('header_call_to_action')) {
		$cta_id = wave_option('header_call_to_action');
	}

	// If the page has its own call to action defined, use this setting instead of the global settings
	if (is_numeric($page_cta) && $page_cta > 0) {
		$cta_id = $page_cta;
	}

	// If cta_id is valid and the page has not been set to not show a call to action, return or output the button
	if (!empty($cta_id) && $page_cta != "none" && is_numeric($cta_id)) {
		$button = do_shortcode('[cta_button id="' . $cta_id . '"]');

		if (!apply_filters('wave_header_call_to_action_button_enabled', true)) {
			return;
		}

		if ($return) {
			return $button;
		} else {
			echo $button;
		}
	}

}

// Get a list of social media channels
function wave_get_social_media_channels() {

	$channels = array(
		'facebook'      => "Facebook",
		'twitter'       => "Twitter",
		'google-plus'   => "Google+",
		'dribbble'      => "Dribbble",
		'pinterest'     => "Pinterest",
		'youtube'       => "YouTube",
		'tumblr'        => "Tumblr",
		'linkedin'      => "LinkedIn",
		'instagram'     => "Instagram",
		'github'        => "GitHub",
		'stackexchange' => "StackExchange"
	);

	return $channels;

}

// Get a list of all active social media channels
function wave_get_active_social_media_channels() {

	// Get the list of all social media channels
	$channels = wave_get_social_media_channels();
	$active   = array();

	// Loop through all social media chanels and check of the url has set in the theme options, if so add it to the list
	foreach ($channels as $channel_id => $channel_name) {
		if (wave_option('socialmedia_url_' . $channel_id)) {
			$active[$channel_id] = array(
				'name' => $channel_name,
				'url'  => wave_option('socialmedia_url_' . $channel_id)
			);
		}
	}

	return $active;
}

// Output a comment item
function wave_comment($comment, $args, $depth) {

	// Define the current comment as the global comment
	$GLOBALS['comment'] = $comment;

	// Define arguments as variables, skip all collisions
	extract($args, EXTR_SKIP);

	// If the element to be used is a div use these settings, else use those for a list item
	if ('div' == $args['style']) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	// Get the commenter's avatar
	$avatar = get_avatar($comment, array(
		32,
		32
	));

	// Output the comment HTML code
	echo '<' . $tag . ' ' . comment_class(empty($args['has_children']) ? '' : 'parent', null, null, false) . ' id="comment-' . get_comment_ID() . '">';
	echo '<div class="comment-author vcard">';
	echo '<div class="avatar">' . $avatar . '</div>';
	echo '<div class="author">' . get_comment_author_link() . '</div>';
	echo '<div class="date">';

	echo '<a href="' . htmlspecialchars(get_comment_link($comment->comment_ID)) . '">' . sprintf(__('%1$s at %2$s', WAVE_TEXT_DOMAIN), get_comment_date(), get_comment_time()) . '</a>';

	// Output the comment edit link
	edit_comment_link(__('(Edit)', WAVE_TEXT_DOMAIN), '  ', '');

	echo '</div>';
	echo '<div class="clearboth"></div>';
	echo '</div>';

	// If the current comment item element is a div, add the comment body element
	if ('div' != $args['style']) {
		echo '<div id="div-comment-' . get_comment_ID() . '" class="comment-body">';
	}

	// If the comment has not been approved yet, add this notice
	if ($comment->comment_approved == '0') {
		echo '<em class="comment-awaiting-moderation">' . __('Your comment is awaiting moderation.', WAVE_TEXT_DOMAIN) . '</em><br />';
	}

	// Output the comment body
	comment_text();

	// Output the reply option
	echo '<div class="reply">';

	comment_reply_link(array_merge($args, array(
		'add_below' => $add_below,
		'depth'     => $depth,
		'max_depth' => $args['max_depth']
	)));

	echo '</div>';

	// If the comment item element is a div, output a div closing tag
	if ('div' != $args['style']) {
		echo '</div>';
	}

}

// Output posts navigation buttons
function wave_navigation() {
	echo '<div class="navigation">';
	echo '	<div class="next-posts">' . get_next_posts_link('&laquo; Older Entries') . '</div>';
	echo '	<div class="prev-posts">' . get_previous_posts_link('Newer Entries &raquo;') . '</div>';
	echo '</div>';
}

// Get the post excerpt, with a certain length
function wave_get_excerpt($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if (mb_strlen($excerpt) > $charlength) {
		$subex   = mb_substr($excerpt, 0, $charlength - 5);
		$exwords = explode(' ', $subex);
		$excut   = -(mb_strlen($exwords[count($exwords) - 1]));
		if ($excut < 0) {
			$excerpt = mb_substr($subex, 0, $excut);
		} else {
			$excerpt = $subex;
		}
		$excerpt = trim($excerpt) . '...';
	}

	return $excerpt;

}

// Get the next post's ID
function wave_get_next_post_id() {

	$post = get_adjacent_post(true, "", true);

	if (empty($post)) {
		return null;
	}

	return $post->ID;
}

// Get the previous post's ID
function wave_get_previous_post_id() {
	$post = get_adjacent_post(true, "", false);

	if (empty($post)) {
		return null;
	}

	return $post->ID;
}


// Add the cart icon to the header if woocommerce is active
function wave_header_menu_icons_add_cart() {

	if (apply_filters('wave_header_add_cart', wave_is_active_plugin('woocommerce/woocommerce'))) {
		get_template_part('parts/header/menu-icons/cart');
	}

}

// Get a specific option value from the theme options
function wave_option($key, $empty = true) {

	// Store the theme options using the registery, we don't want to contact the database for each time we need an option
	if (!Wave_Registry::get('options')) {
		$options = get_option(WAVE_OPTION_NAME);
		Wave_Registry::set('options', $options);
	} else {
		$options = Wave_Registry::get('options');
	}

	if (isset($options[$key])) {
		$options[$key] = apply_filters('wave_' . $key, $options[$key]);
	} else {
		$options[$key] = apply_filters('wave_' . $key, false);
	}

	// Check if the value should empty or just defined
	if ($empty) {
		if (!empty($options[$key])) {
			return $options[$key];
		}
	} else {
		return $options[$key];
	}

	return false;
}

//Check if a plugin is active or not
function wave_is_active_plugin($plugin_file) {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';

	return is_plugin_active($plugin_file . '.php');
}

// Get a plugin install button, with a thickbox
function wave_get_plugin_install_button($plugin_file, $label) {

	// If the plugin is not active, return the button HTML code
	if (!wave_is_active_plugin($plugin_file)) {

		// Get a plugin install URL using the plugin ID
		$plugin_install_url = wave_get_plugin_install_url(current(explode('/', $plugin_file)));

		return sprintf(__('<a class="button thickbox" href="%s">%s</a>', WAVE_TEXT_DOMAIN), $plugin_install_url, $label);
	}

	return '';
}

// Get a plugin install URL using the plugin ID
function wave_get_plugin_install_url($plugin_id) {
	return admin_url('plugin-install.php?tab=plugin-information&plugin=' . $plugin_id . '&from=admin&TB_iframe=true&width=640&height=459');
}

// Get a multi level array of the setup progress
function wave_get_setup_progress() {

	$setup_progress = array();

	// Get the permalink structure and page on front status
	$setup_progress['wordpress']['permalink_structure'] = get_option('permalink_structure') != '';
	$setup_progress['wordpress']['static_front_page']   = get_option('page_on_front') != '0';

	// Get logo, one pager and sample data status
	$setup_progress['theme']['added_logo']    = (bool)wave_option('header_logo_image');
	$setup_progress['theme']['has_one_pager'] = count(wave_get_one_pagers()) > 0;
	$setup_progress['theme']['demo_data']     = wave_is_demo_imported();

	// Get the status of the required and recommended plugins
	$setup_progress['plugins']['raw-theme-essentials'] = wave_is_active_plugin("raw-theme-essentials/raw-theme-essentials");
	$setup_progress['plugins']['slider_revolution']    = wave_is_active_plugin("revslider/revslider");
	$setup_progress['plugins']['layer_slider']         = wave_is_active_plugin("LayerSlider/layerslider");
	$setup_progress['plugins']['woocommerce']          = wave_is_active_plugin("woocommerce/woocommerce");
	$setup_progress['plugins']['wordpress_importer']   = wave_is_active_plugin("wordpress-importer/wordpress-importer");
	$setup_progress['plugins']['wpml_sitepress']       = wave_is_active_plugin("sitepress-multilingual-cms/sitepress");
	$setup_progress['plugins']['gravity_forms']        = wave_is_active_plugin("gravityforms/gravityforms");
	$setup_progress['plugins']['contact_form_7']       = wave_is_active_plugin("contact-form-7/wp-contact-form-7");

	return $setup_progress;

}

// Get the overall status of the setup progress
function wave_setup_completed() {

	// Get the details of all setup items
	$setup_progress = wave_get_setup_progress();

	// Loop through the list of all setup items, and if one of the items has not been completed, return false
	foreach ($setup_progress as $group) {
		foreach ($group as $item) {
			if ($item == false) {
				return false;
			}
		}
	}

	// If none of the setup items had not been completed, return true
	return true;

}

// Get the number of columns the shop page should display based upon whether the sidebar was enabled or not
function wave_woocommerce_shop_columns($cols) {
	if (wave_option('shop_sidebar')) {
		return 3;
	} else {
		return 4;
	}
}

// Add a two-fifth column before the single product summary
function wave_woocommerce_before_single_product_summary_add_two_fifth() {
	echo "<div class='two_fifth single-product-main-image'>";
}

// Add a three-fifth column before the single product summary
function wave_woocommerce_before_single_product_summary_add_three_fifth() {
	echo '<div class="three_fifth last single-product-summary">';
}

// Filter the WooCommerce add to cart CSS class names to exclude the button CSS class name
function wave_woocommerce_filter_add_to_cart_class($class) {
	return str_replace(" button ", "", $class);
}

// Add the sidebar before the shop loop if the shop sidebar has been enabled on the left side
function wave_woocommerce_before_shop_loop() {

	// Get the sidebar option value
	if (wave_option('shop_sidebar', false)) {
		$sidebar = wave_option('shop_sidebar');
	} else {
		$sidebar = "";
	}

	// Clear all floats
	wave_clearboth();

	// If the shop sidebar should appear of the left side, output the HTML code
	if ($sidebar == "left") {
		echo '<div class="one_fourth">';
		echo '<div id="sidebar">';
		echo ' <ul>';
		dynamic_sidebar('Shop Sidebar');
		echo '</ul>';
		echo '<div class="clearboth"></div>';
		echo '</div>';
		echo '</div>';
	}

	// Output the column three-fourth or just a regular div depending of whether the sidebar is used and or which side it should appear
	echo '<div class="' . (empty($sidebar) ? '' : 'three_fourth' . ($sidebar == 'left' ? ' last' : '')) . '">';

}


// Add the sidebar before the shop loop if the shop sidebar has been enabled on the right side
function wave_woocommerce_after_shop_loop() {

	// Get the sidebar option value
	if (wave_option('shop_sidebar', false)) {
		$sidebar = wave_option('shop_sidebar');
	} else {
		$sidebar = "";
	}

	echo '</div>';

	// If the shop sidebar should appear of the right side, output the HTML code
	if ($sidebar == "right") {
		echo '<div class="one_fourth last">';
		echo '<div id="sidebar">';
		echo '<ul>';
		dynamic_sidebar('Shop Sidebar');
		echo '</ul>';
		echo '<div class="clearboth"></div>';
		echo '</div>';
		echo '</div>';
	}

	// Clear all floats
	wave_clearboth();

}

// Add ajax params to update the cart details when adding a product to the cart
function wave_woocommerce_header_add_to_cart_fragment($fragments) {
	global $woocommerce;

	// Get the number of items and total from the cart
	$cart_contents = $woocommerce->cart->get_cart_contents_count();
	$cart_total    = $woocommerce->cart->get_cart_total();

	// Add updated items and total html replacements
	$fragments['#panel-cart .cart-summary .items'] = '<span class="items">' . $cart_contents . '</span>';
	$fragments['#panel-cart .cart-summary .total'] = '<span class="total">' . $cart_total . '</span>';

	// If you cart's number of items is high than 0 add the cart total, else return an empty element
	if ($woocommerce->cart->cart_contents_total > 0) {
		$fragments['.menu-item-cart a .total'] = '<span class="total">' . $cart_total . '</span>';
	} else {
		$fragments['.menu-item-cart a .total'] = '<span class="total">&nbsp;</span>';
	}

	return $fragments;
}

// Output the related products under the product tabs
function wave_woocommerce_output_related_products() {
	wave_clearboth();
	woocommerce_related_products(4, 4);
}

// Resize woocommerce thumbs (when activating the theme)
function wave_woocommerce_resize_thumbs() {
	update_option("shop_catalog_image_size", array(
		'width'  => 260,
		'height' => 260,
		'crop'   => 1
	));
	update_option("shop_single_image_size", array(
		'width'  => 414,
		'height' => 414,
		'crop'   => 1
	));
	update_option("shop_thumbnail_image_size", array(
		'width'  => 96,
		'height' => 96,
		'crop'   => 1
	));
}

// Trigger the woocommerce resize funtion when you activate the theme
if (is_admin() && isset($_GET['activated']) && $pagenow == 'themes.php') {
	add_action("init", "wave_woocommerce_resize_thumbs", 1);
}

// Update the navigation menus when you import the sample data
function wave_demo_update_theme_mods() {

	// Get the one pager's menu ID
	$mainmenu_name = 'mainmenu-' . md5(get_permalink(current(wave_get_one_pagers())));

	// Get a list of all menus
	$nav_menus = wp_get_nav_menus(array('orderby' => 'name'));

	// Define a list of the menus of the sample data
	$menus = array(
		'top-bar-left' => 0,
		'extra-menu'   => 0,
		'main'         => 0
	);

	// Loop through the list of menus and add update the menu term ID if the menu was from the sample data
	foreach ($nav_menus as $nav_menu) {
		if (in_array($nav_menu->slug, array_keys($menus))) {
			$menus[$nav_menu->slug] = $nav_menu->term_id;
		}
	}

	$theme_mods = array();

	// Define the menus positions
	$theme_mods['nav_menu_locations'] = array(
		'primary'          => $menus['main'],
		'header-top-left'  => $menus['top-bar-left'],
		'header-top-right' => $menus['extra-menu'],
		'footer'           => $menus['extra-menu'],
		$mainmenu_name     => $menus['main']
	);

	// Define the basis for the widgets
	$theme_mods['sidebars_widgets'] = array(
		'time' => time(),
		'data' => array()
	);

	// Update the theme mods option
	update_option('theme_mods_raw', $theme_mods);

}

// Check if the current page is the posts page
function wave_is_posts_page() {
	global $wp_query;

	return $wp_query->is_posts_page;
}
