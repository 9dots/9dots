<?php

define('WaveRedux_TEXT_DOMAIN', 'redux-opts');

require_once(dirname(__FILE__) . '/defaults.php');


function wave_setup_framework_options() {

	global $WaveRedux_Options;

	$args                        = array();
	$args['dev_mode']            = false;
	$args['icon_type']           = 'image';
	$args['dev_mode_icon_class'] = 'icon-large';
	$args['admin_stylesheet']    = 'custom';
	$args['intro_text']          = __('<p></p>', WAVE_TEXT_DOMAIN);
	$args['footer_text']         = __('', WAVE_TEXT_DOMAIN);
	$args['show_import_export']  = true;
	$args['import_icon']         = get_template_directory_uri() . '/assets/img/admin/icons/arrow-circle-double.png';
	$args['opt_name']            = WAVE_OPTION_NAME;

	if (WAVE_WHITELABEL) {
		$args['menu_icon'] = get_template_directory_uri() . '/assets/img/admin/icons/theme-options.png';
		$args['page_type'] = 'submenu';
	} else {
		$args['menu_icon'] = get_template_directory_uri() . '/assets/img/admin/wave-themes-icon-16.png';
		$args['page_type'] = 'menu';
	}

	$args['menu_title']     = __('Theme Options', WAVE_TEXT_DOMAIN);
	$args['page_title']     = __('Theme Options', WAVE_TEXT_DOMAIN);
	$args['page_slug']      = WAVE_OPTION_NAME;
	$args['page_cap']       = 'manage_options';
	$args['page_position']  = 29.6;
	$args['help_sidebar']   = __('<p>This is the sidebar content, HTML is allowed.</p>', WAVE_TEXT_DOMAIN);
	$args['google_api_key'] = WAVETHEMES_GOOGLE_API_KEY;

	$sections = array();

	if (!wave_setup_completed() && !WAVE_WHITELABEL) {
		include_once "sections/setup-guide.php";
	}
	include_once "sections/general.php";
	include_once "sections/typography.php";
	include_once "sections/fonts.php";
	include_once "sections/header.php";
	include_once "sections/footer.php";
	include_once "sections/buttons.php";
	include_once "sections/forms.php";
	include_once "sections/cta-popup.php";
	include_once "sections/tabs-toggles.php";
	include_once "sections/shortcodes.php";
	include_once "sections/blog.php";
	include_once "sections/portfolio.php";
	include_once "sections/comments.php";
	include_once "sections/shop.php";
	include_once "sections/team.php";
	include_once "sections/tables.php";
	include_once "sections/social-media.php";
	include_once "sections/contact.php";

	if (!WAVE_WHITELABEL) {
		include_once "sections/color-presets.php";
	}

	$fields_header = "";

	foreach ($sections as $section) {
		foreach ($section['fields'] as $field) {
			switch ($field['type']) {
				case 'header':
					$fields_header = $field['title'];
					break;
				case 'color':
					Wave_Colors::add_label($field['id'], $fields_header . ' - ' . $field['title']);
					break;
				case 'style_text':
					Wave_Colors::add_label($field['id'] . '_color', $fields_header . ' - ' . $field['title']);
					break;
			}
		}
	}

	$colors_keys = Wave_Colors::get_keys();

	$options = get_option(WAVE_OPTION_NAME);

	foreach ($options as $key => $value) {
		if (in_array($key, $colors_keys)) {
			Wave_Colors::add_color($key, $value);
		}
	}

	$admin_colors = Wave_Colors::get_colors();

	Wave_Dynamic::js('admin_colors', 'var wave_admin_colors = ' . json_encode($admin_colors) . ';');

	$tabs = array();

	if (function_exists('wp_get_theme')) {
		$theme_data  = wp_get_theme();
		$item_uri    = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author      = $theme_data->get('Author');
		$author_uri  = $theme_data->get('AuthorURI');
		$version     = $theme_data->get('Version');
		$tags        = $theme_data->get('Tags');
	} else {
		$theme_data  = wp_get_theme(trailingslashit(get_stylesheet_directory()) . 'style.css');
		$item_uri    = $theme_data['URI'];
		$description = $theme_data['Description'];
		$author      = $theme_data['Author'];
		$author_uri  = $theme_data['AuthorURI'];
		$version     = $theme_data['Version'];
		$tags        = $theme_data['Tags'];
	}

	$item_info = '<div class="redux-opts-section-desc">';
	$item_info .= '<p class="redux-opts-item-data description item-uri">' . __('<strong>Theme URL:</strong> ', WAVE_TEXT_DOMAIN) . '<a href="' . $item_uri . '" target="_blank">' . $item_uri . '</a></p>';
	$item_info .= '<p class="redux-opts-item-data description item-author">' . __('<strong>Author:</strong> ', WAVE_TEXT_DOMAIN) . ($author_uri ? '<a href="' . $author_uri . '" target="_blank">' . $author . '</a>' : $author) . '</p>';
	$item_info .= '<p class="redux-opts-item-data description item-version">' . __('<strong>Version:</strong> ', WAVE_TEXT_DOMAIN) . $version . '</p>';
	$item_info .= '</div>';

	$tabs['item_info'] = array(
		'icon'       => get_template_directory_uri() . "/assets/img/admin/icons/information.png",
		'icon_class' => 'icon-large',
		'title'      => __('Theme Information', WAVE_TEXT_DOMAIN),
		'content'    => $item_info
	);

	$docs_content = '<iframe src="http://wave-themes.com/docs/raw/" style="width:100%; height:800px;" frameborder="1"></iframe>';

	$tabs['docs'] = array(
		'icon'       => get_template_directory_uri() . "/assets/img/admin/icons/book-open-list.png",
		'icon_class' => 'icon-large',
		'title'      => __('Documentation', WAVE_TEXT_DOMAIN),
		'content'    => $docs_content
	);

	$WaveRedux_Options = new WaveRedux_Options($sections, $args, $tabs);
}

add_action('init', 'wave_setup_framework_options', 0);

