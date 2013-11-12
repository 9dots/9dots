<?php



$call_to_actions = wave_get_call_to_actions_list(true, false);

$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/layout-header.png",
	'title'  => __('Header', 'nhp-opts'),
	'desc'   => __('<p class="description">The header tab contains all options regarding the header that will stick to the top of your browser window.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Call To Action', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'header_call_to_action_enabled',
			'type'     => 'checkbox',
			'title'    => __('Show Call To Action Button', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('On the right hand-side of the header a Call To Action Button can be shown. By using this option you can enable or disable the Call To Action Button.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'id'       => 'header_call_to_action',
			'type'     => 'select',
			'title'    => __('Call To Action', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the Call to Action that will be used for all pages. You can override this setting by changing the Call to Action setting on individual pages.', WAVE_TEXT_DOMAIN),
			'options'  => $call_to_actions,
			'std'      => ''
		),
		array(
			'type'  => 'header',
			'title' => __('Logo', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'header_logo_image',
			'type'     => 'upload',
			'title'    => __('Logo Image', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Add a 190x40 pixels image that will be used as the logo in the header section.<br/><br/>Please note that when the Navigation Resize option is enabled, your logo will resize too. So make sure the height of the logo is an even number of pixels, to avoid blurryness.', WAVE_TEXT_DOMAIN),
			'desc'     => __('Please only select PNG or JPEG files.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'header_logo_image_retina',
			'type'     => 'upload',
			'title'    => __('Retina Logo Image (High Density)', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Add a 380x80 pixels image that will be used as the logo in the header section.<br/><br/>For the Retina Logo Image the even number of pixels is less important because it will be hardly noticable.', WAVE_TEXT_DOMAIN),
			'desc'     => __('Please only select PNG or JPEG files.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Header Style', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_easing_enabled',
			'type'     => 'checkbox',
			'title'    => __('Enable Header Easing', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify whether you would like to enable or disable the header easing (animation) effect when resizing.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'id'       => 'style_header_background_color',
			'type'     => 'color',
			'title'    => __('Header Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the Background Color of the main header section.', WAVE_TEXT_DOMAIN),
			'std'      => '#FFFFFF'
		),
		array(
			'id'       => 'style_header_shadow_enabled',
			'type'     => 'checkbox',
			'title'    => __('Show Header Shadow', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('By default the header will have a shadow. You can use this option to enable or disable the header\'s shadow.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'id'       => 'style_header_shadow_color',
			'type'     => 'color',
			'title'    => __('Header Shadow Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the color of the header\'s shadow. This is especially useful when you are using dark colors for the main content and header.', WAVE_TEXT_DOMAIN),
			'std'      => '#FFFFFF'
		),
		array(
			'id'       => 'style_header_shadow_opacity',
			'type'     => 'slider',
			'title'    => __('Header Shadow Opacity', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('If you think the current shadow strength is not right, you can use the opacity to increase or decrease the shadow\'s strength.', WAVE_TEXT_DOMAIN),
			'desc'     => __('%', WAVE_TEXT_DOMAIN),
			'validate' => "numeric",
			'slider'   => array(
				'range' => "0,100",
				'step'  => "5",
				'snap'  => "true"
			)
		),
		array(
			'id'       => 'style_header_shadow_size',
			'type'     => 'slider',
			'title'    => __('Header Shadow Size', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('With this option you can change the size of the header\'s shadow. You set it from 1 to 30 pixels.<br/><br/>If you want to disable the shadow, please use the Show Header Shadow option above.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'validate' => "numeric",
			'slider'   => array(
				'range' => "1,30",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'type'  => 'header',
			'title' => __('Header Link Style', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_link',
			'type'     => 'style_text',
			'title'    => __('Header Link', WaveRedux_TEXT_DOMAIN),
			'sub_desc' => __('With this option you can change the style of the primary menu. You can change the color, font and size of the menu items.', WaveRedux_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_link_hover_color',
			'type'     => 'color',
			'title'    => __('Header Link Hover &amp; Active Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('When you move your cursor over the primary menu items and when a menu item belongs to the page or section where you are, this color will be used.', WAVE_TEXT_DOMAIN),
			'std'      => '#FFFFFF'
		),
		array(
			'type'  => 'header',
			'title' => __('Header Top Bar Options', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'header_topbar_enabled',
			'type'     => 'checkbox',
			'title'    => __('Enable Header Top Bar', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Above the primary header section an extra bar can be displayed. This bar can be used to for 2 extra menus, social media icons and the language switcher.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'id'       => 'header_topbar_social_media_icons_enabled',
			'type'     => 'checkbox',
			'title'    => __('Show Social Media Icons', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Enable or disable this option if you wish to show or hide the social media icons in the Header Top Bar.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'id'       => 'header_topbar_language_switcher_enabled',
			'type'     => 'checkbox',
			'title'    => __('Show Language Switcher', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Enable or disable this option if you wish to use the Language Switcher.<br/><br/>Please not that this feature is only available when you have the multilingual plugin <a href="http://wpml.org/" target="_blank">WPML</a> installed.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'type'  => 'header',
			'title' => __('Header Top Bar Style', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_topbar_background_color',
			'type'     => 'color',
			'title'    => __('Header Top Bar Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This option can be used to set the Header Top Bar background color.', WAVE_TEXT_DOMAIN),
			'std'      => '#FFFFFF'
		),
		array(
			'id'       => 'style_header_topbar_line_enabled',
			'type'     => 'checkbox',
			'title'    => __('Show Header Top Bar Line', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('The Header Top Bar can display a 1 pixel line to separate the Header Top Bar from the Primary Header Section. Enable or disable this option to show or hide the line.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'id'       => 'style_header_topbar_line_color',
			'type'     => 'color',
			'title'    => __('Header Top Bar Line Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('If the Header Top Bar Line is enabled it will use this color.', WAVE_TEXT_DOMAIN),
			'std'      => '#FFFFFF'
		),
		array(
			'type'  => 'header',
			'title' => __('Header Top Bar Link Style', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_topbar_link',
			'type'     => 'style_text',
			'title'    => __('Header Top Bar Link', WaveRedux_TEXT_DOMAIN),
			'sub_desc' => __('The Header Top Bar can contain a few clickable items, such as menu items and social media icons. Here you can select the font, color and size that should be used for these items.', WaveRedux_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_topbar_link_hover_color',
			'type'     => 'color',
			'title'    => __('Header Top Bar Link Hover', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('With this option you can set the color that is used when you move your cursor over the Header Top Bar Links.', WAVE_TEXT_DOMAIN),
			'std'      => '#FFFFFF'
		),
		array(
			'type'  => 'header',
			'title' => __('Header Sub-menus', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_submenu_background_color',
			'type'     => 'color',
			'title'    => __('Header Sub-menu Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Whenever you have a second level in your menus a sub-menu will be shown when you move your cursor over the parent menu item. With this option you can change the background color of these menus.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_submenu_background_hover_color',
			'type'     => 'color',
			'title'    => __('Header Sub-menu Background Hover Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Additional to that when you move your cursor over the child items, a different color can be used to highlight that the item is clickable.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_submenu_link',
			'type'     => 'style_text',
			'title'    => __('Header Sub-menu Link', WaveRedux_TEXT_DOMAIN),
			'sub_desc' => __('This option is for the color of the links that are shown in the sub-menu child items. Here you can select the color, font and size for the child items.', WaveRedux_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_header_submenu_link_hover_color',
			'type'     => 'color',
			'title'    => __('Header Sub-menu Link Hover Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('When you move your cursor over the sub-menu\'s child items, this color will be used.', WaveRedux_TEXT_DOMAIN)
		)
	)
);