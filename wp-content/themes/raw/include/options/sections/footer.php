<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/layout-footer.png",
	'title'  => __('Footer', 'nhp-opts'),
	'desc'   => __('<p class="description">This tab contains all options for for the Footer Section of the Theme.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Footer Widget Area', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_footer_text',
			'type'     => 'style_text',
			'title'    => __('Footer Widget Text &amp; Links', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the text that is used in widgets like the Text Widget and the links of the widgets. You can change the color, font and size.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_footer_link_hover',
			'type'     => 'color',
			'title'    => __('Footer Widget Link Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('When you move your cursor over the links in widgets, this color will be used.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_footer_h3',
			'type'     => 'style_text',
			'title'    => __('Footer Widget Headings', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the style that will be used for the headings of the footer widgets.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_footer_background_color',
			'type'     => 'color',
			'title'    => __('Footer Widget Area Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This options allows you to change the background color of the footer widget area.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Copyright Bar', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_copyright_text',
			'type'     => 'style_text',
			'title'    => __('Copyright Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the texts in the copyright bar. This includes the menu items of the menu on the right hand-size of the copyright text. You can change the color, font and size.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_copyright_link_hover_color',
			'type'     => 'color',
			'title'    => __('Copyright Links Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can select the color that wil be used for the copyright links when you move your cursor over the links.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'footer_copyright_text',
			'type'     => 'text',
			'title'    => __('Copyright', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can enter the text that contains your copyright.<br/><br/>For example: &copy; Envato Pty Ltd. ', WAVE_TEXT_DOMAIN) . date("Y"),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
			'msg'      => 'custom error message',
		),
		array(
			'id'       => 'style_copyright_background_color',
			'type'     => 'color',
			'title'    => __('Copyright Bar Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the Copyright Bar\'s background color.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Copyright Bar - Social Media', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_footer_socialmedia_color',
			'type'     => 'color',
			'title'    => __('Social Media Icon Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This option is for the color of the social media icons on the Copyright Bar.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_footer_socialmedia_color_hover',
			'type'     => 'color',
			'title'    => __('Social Media Icon Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('When you move your cursor over the social media icons on the Copyright Bar, the color your select here will be used.', WAVE_TEXT_DOMAIN)
		)
	)
);