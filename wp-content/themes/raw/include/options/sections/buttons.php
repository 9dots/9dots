<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/buttons.png",
	'title'  => __('Buttons', 'nhp-opts'),
	'desc'   => __('<p class="description">Here you will find all options regarding the buttons that are used throughout the theme.<br/>Please read the descriptions of each option to find out what they are for.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Buttons Style', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_default_style',
			'type'     => 'button_set',
			'title'    => __('Button Type', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This option allows you to choose whether you would like the 3D or 2D button type as the default button type.', WAVE_TEXT_DOMAIN),
			'options'  => array(
				'3d' => __('3D'),
				'2d' => __('2D')
			),
			'std'      => '3d'
		),
		array(
			'id'       => 'style_button_primary_color',
			'type'     => 'color',
			'title'    => __('Primary Button Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the color for the primary button. The primary button style is used when the button style is not defined.', WAVE_TEXT_DOMAIN),
			'std'      => '#FFFFFF'
		),
		array(
			'id'       => 'style_button_secondary_color',
			'type'     => 'color',
			'title'    => __('Secondary Button Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the color that is used for the secondary button style.', WAVE_TEXT_DOMAIN),
			'std'      => '#FFFFFF'
		),
		array(
			'type'  => 'header',
			'title' => __('Small Buttons', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_small_label',
			'type'     => 'style_text',
			'title'    => __('Small Button Label', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('A button label contains the text that appears within small buttons. Here you can change the color, font and size of the label.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_small_roundness',
			'type'     => 'slider',
			'title'    => __('Small Button Roundness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change to roundness or softness of the corners of small buttons.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'validate' => "numeric",
			'class'    => "input_pixels",
			'slider'   => array(
				'range' => "0,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'id'       => 'style_button_small_shadow',
			'type'     => 'slider',
			'title'    => __('Small Button Shadow', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('The small button has a small shadow to create the 3D effect. With this feature you can increase or decrease the size of the shadow.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'validate' => "numeric",
			'slider'   => array(
				'range' => "0,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'type'  => 'header',
			'title' => __('Large Buttons', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_large_label',
			'type'     => 'style_text',
			'title'    => __('Large Button Label', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('A button label contains the text that appears within large buttons. Here you can change the color, font and size of the label.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_large_roundness',
			'type'     => 'slider',
			'title'    => __('Large Button Roundness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change to roundness or softness of the corners of large buttons.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'slider'   => array(
				'range' => "0,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'id'       => 'style_button_large_shadow',
			'type'     => 'slider',
			'title'    => __('Large Button Shadow', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('The large button has a small shadow to create the 3D effect. With this feature you can increase or decrease the size of the shadow.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'validate' => "numeric",
			'slider'   => array(
				'range' => "0,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'type'  => 'header',
			'title' => __('Alt Buttons', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_alt_label',
			'type'     => 'style_text',
			'title'    => __('Alt Button Label', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('A button label contains the text that appears within Alt Buttons. Here you can change the color, font and size of the label.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_alt_roundness',
			'type'     => 'slider',
			'title'    => __('Alt Button Roundness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change to roundness or softness of the corners of Alt Buttons.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'slider'   => array(
				'range' => "0,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'id'       => 'style_button_alt_border_weight',
			'type'     => 'slider',
			'title'    => __('Alt Button Border Thickness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the border (outline) thickness of the Alt Buttons.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'validate' => "numeric",
			'slider'   => array(
				'range' => "1,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'id'       => 'style_button_alt_border_color',
			'type'     => 'color',
			'title'    => __('Alt Button Border Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the border color of the Alt Buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_button_alt_hover_border_color',
			'type'     => 'color',
			'title'    => __('Alt Button Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the color you\'d like to use when you move your cursor over the Alt Buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Plain Buttons', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_plain_label',
			'type'     => 'style_text',
			'title'    => __('Plain Button Label', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('A button label contains the text that appears within Plain Buttons. Here you can change the color, font and size of the label.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_plain_background_color',
			'type'     => 'color',
			'title'    => __('Plain Button Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the background color for the Plain Buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_button_plain_label_hover_color',
			'type'     => 'color',
			'title'    => __('Plain Button Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the color for when you move your cursor over the Plain Buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_button_plain_hover_background_color',
			'type'     => 'color',
			'title'    => __('Plain Button Mouse Over Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the background color for when you move your cursor over the Plain Buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('UI Buttons', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_ui_label',
			'type'     => 'style_text',
			'title'    => __('UI Button Label', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('A button label contains the text that appears within UI Buttons. Here you can change the color, font and size of the label.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_button_ui_shadow_color',
			'type'     => 'color',
			'title'    => __('UI Button Label Shadow Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the color you\'d like to use for the text shadow that adds the depth effect in the UI Buttons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_button_ui_roundness',
			'type'     => 'slider',
			'title'    => __('UI Button Roundness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the UI Button\'s roundness or softness of the corners.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'slider'   => array(
				'range' => "0,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'id'       => 'style_button_ui_color',
			'type'     => 'color',
			'title'    => __('UI Button Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color that you\'d like to use for the UI Buttons.', WAVE_TEXT_DOMAIN),
		),
	)
);

