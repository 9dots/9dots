<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/shortcodes.png",
	'title'  => __('Shortcodes', 'nhp-opts'),
	'desc'   => __('<p class="description">All of the options below have something to do with the appearance of the theme\'s visual aspects.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Icons', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_icons_default_color',
			'type'     => 'color',
			'title'    => __('Default Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the default color that will be used for all icons which do not have a custom icon color defined.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Testimonials', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_testimonials_quote',
			'type'     => 'style_text',
			'title'    => __('Quotation', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the text style of the quotation of the testimonials.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_testimonials_name',
			'type'     => 'style_text',
			'title'    => __('Name', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the text style of the name of the person that wrote the testimonial.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_testimonials_company',
			'type'     => 'style_text',
			'title'    => __('Company', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the text style of the company of the person that wrote the testimonial.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Alerts - General', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_alert_roundness',
			'type'     => 'slider',
			'title'    => __('Roundness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the roundess or softness of the corners of all alerts.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'validate' => "numeric",
			'slider'   => array(
				'range' => "0,20",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'type'  => 'header',
			'title' => __('Alerts - Info', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_alert_info_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the info alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_alert_info_icon_color',
			'type'     => 'color',
			'title'    => __('Icon Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the icon color of the info alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_alert_info_text',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the info alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Alerts - Success', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_alert_success_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the success alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_alert_success_icon_color',
			'type'     => 'color',
			'title'    => __('Icon Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the icon color of the success alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_alert_success_text',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the success alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Alerts - Notice', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_alert_notice_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the notice alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_alert_notice_icon_color',
			'type'     => 'color',
			'title'    => __('Icon Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the icon color of the notice alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_alert_notice_text',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the notice alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Alerts - Error', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_alert_error_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the error alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_alert_error_icon_color',
			'type'     => 'color',
			'title'    => __('Icon Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the icon color of the error alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_alert_error_text',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the error alerts.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Separators', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_separator_color',
			'type'     => 'color',
			'title'    => __('Default Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the default color that will be used when a separator does not have a custom color.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_separator_weight',
			'type'     => 'slider',
			'title'    => __('Default Thickness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the default thickness of the separators which do not have a custom thickness.', WAVE_TEXT_DOMAIN),
			'desc'     => __('pixels', WAVE_TEXT_DOMAIN),
			'validate' => "numeric",
			'slider'   => array(
				'range' => "1,10",
				'step'  => "1",
				'snap'  => "true"
			)
		),
		array(
			'type'  => 'header',
			'title' => __('Animated Counters', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_counters_color',
			'type'     => 'color',
			'title'    => __('Animated Counters Default Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('When using Animated Counters in your pages, the label containing the current value or in Circular Counter the circel around the counter will have a default color.', WAVE_TEXT_DOMAIN),
			'desc'     => __('You can also change the color of each individual counter by using the shortcode attributes. Please view the document for more information.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_counters_bgcolor',
			'type'     => 'color',
			'title'    => __('Animated Counters Background Default Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Allows you to change the default background color of the Circular Counters', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Boxed Counters', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_counters_boxed_background_color',
			'type'     => 'color',
			'title'    => __('Boxed Animated Counters Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color for the boxed counters. Boxed counters are the counters that have the boxed style enabled.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Bar Graphs', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_bar_graph_color',
			'type'     => 'color',
			'title'    => __('Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the color that will be used for the bar graphs.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_bar_graph_bgcolor',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color that will be used for the bar graphs.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_bar_graph_heading',
			'type'     => 'style_text',
			'title'    => __('Heading', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the style of the heading that is on top of the each bar.', WAVE_TEXT_DOMAIN),
		),
	)
);
