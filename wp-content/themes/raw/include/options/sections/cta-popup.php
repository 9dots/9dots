<?php



$call_to_actions = wave_get_call_to_actions_list(true, false);

$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/application-form.png",
	'title'  => __('Call to Action', 'nhp-opts'),
	'desc'   => __('<p class="description">This needs a description.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Popup Background', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_cta_popup_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WaveRedux_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the color that should be used for the background of the call to action popups.', WaveRedux_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Popup Header', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_cta_popup_header_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the background color of the call to action popup\'s header.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_cta_popup_header_heading',
			'type'     => 'style_text',
			'title'    => __('Heading', WaveRedux_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the style of the heading that will be used in the call to action popup\'s header.', WaveRedux_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_cta_popup_header_sub_heading',
			'type'     => 'style_text',
			'title'    => __('Sub Heading', WaveRedux_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the style of the sub-heading that will be used in the call to action popup\'s header.', WaveRedux_TEXT_DOMAIN)
		),
	)
);