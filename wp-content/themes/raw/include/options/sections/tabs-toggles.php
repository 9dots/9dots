<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/ui-tab-content.png",
	'title'  => __('Tabs & Toggles', 'nhp-opts'),
	'desc'   => __('<p class="description">All of the options below have something to do with the appearance of the theme\'s visual aspects.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Tabs - Buttons', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_tabs_button_text_style',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style that will be used for the tab buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'Button Text Mouse Over Color',
			'type'     => 'color',
			'title'    => __('Text Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the mouse over color for the text of the tab buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_tabs_button_icon_color',
			'type'     => 'color',
			'title'    => __('Icon Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the color of the optional icon that can be used within the tab buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Tabs - Panel', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_tabs_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color of the tab panels.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_tabs_body_text_style',
			'type'     => 'style_text',
			'title'    => __('Body Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the body text style of the tab panels.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Tabs - Subject', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_tabs_subject_heading',
			'type'     => 'style_text',
			'title'    => __('Subject Heading', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the headings of the subject tabs.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Accordion & Toggles - Button', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_toggles_button_text_style',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the toggle buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_toggles_button_text_hover_color',
			'type'     => 'color',
			'title'    => __('Text Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the mouse over color that will be used when you move your cursorm of the toggle buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_toggles_button_arrow_color',
			'type'     => 'color',
			'title'    => __('Arrow Icon Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the toggle\'s arrow icon color.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Accordion & Toggles - Panel', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_toggles_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the toggle\'s panel.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_toggles_body_text_style',
			'type'     => 'style_text',
			'title'    => __('Body Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the body text style of the toggle\'s panel.', WAVE_TEXT_DOMAIN),
		)
	)
);
