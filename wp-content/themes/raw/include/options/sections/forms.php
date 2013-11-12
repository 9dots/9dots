<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/ui-text-field.png",
	'title'  => __('Forms', 'nhp-opts'),
	'desc'   => __('<p class="description">All of the options below have something to do with the appearance of the theme\'s visual aspects.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Text Field', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_form_input_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color of the text fields.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_form_input_focus_background_color',
			'type'     => 'color',
			'title'    => __('Focus Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color for when you place your cursor within the text fields.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_form_input_text',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the text within the text fields. The style of the text remains the same when you place your cursor within the text fields. So you will need to make sure there is enough contrast between text and both background colors.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Slider', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_form_slider_handle_color',
			'type'     => 'color',
			'title'    => __('Handle Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('The handles of the slider are the little circular button which allow you to change the values. With this option you can change the color of the handles.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_form_slider_range_color',
			'type'     => 'color',
			'title'    => __('Range Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('The range of the slider is the area between the minimum and maximum handles. With this option you can set the color the range indicator should have.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_form_slider_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the background color of the slider.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Select - Button', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_form_select_button_text',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the select button\'s text.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_form_select_button_text_shadow_color',
			'type'     => 'color',
			'title'    => __('Text Shadow Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the color of the select button\'s text shadow.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_form_select_button_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the background color that should be used for the background color of the select buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_form_select_button_roundness',
			'type'     => 'slider',
			'title'    => __('Roundness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the roundness or softness of the corners of the select buttons.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'slider'   => array(
				'range' => "0,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'type'  => 'header',
			'title' => __('Select - Drop Down', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_form_select_list_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the background color that you\'d like to use for the select drop down.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_form_select_list_text_style',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the style of the text items within the drop down.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_form_select_list_text_hover_background_color',
			'type'     => 'color',
			'title'    => __('Mouse Over Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color for when you move your cursor over the drop down text items.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_form_select_list_text_hover_color',
			'type'     => 'color',
			'title'    => __('Text Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the color of the drop down text items for when you move your cursor over the text items.', WAVE_TEXT_DOMAIN),
		)
	)
);
