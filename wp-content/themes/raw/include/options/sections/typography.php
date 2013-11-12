<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/typography.png",
	'title'  => __('Typography', 'nhp-opts'),
	'desc'   => __('<p class="description">All of the options below have something to do with the typography of the theme.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Body Style', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_body_text',
			'type'     => 'style_text',
			'title'    => __('Body Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Body texts are all texts that make up the main content of the web pages. With this feature you can change the color, font and size of the the body text.', WAVE_TEXT_DOMAIN),
			'desc'     => "Test Description"
		),
		array(
			'type'  => 'header',
			'title' => __('Links', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_link_color',
			'type'     => 'color',
			'title'    => __('Link Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you need to select the color that will be used for text links throughout the website.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_link_hover_color',
			'type'     => 'color',
			'title'    => __('Link Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the color that will be used when you move your cursor over the text links.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Headings', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_h1',
			'type'     => 'style_text',
			'title'    => __('Heading 1', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the Heading size 1 or H1 that is used throughout the theme.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_h2',
			'type'     => 'style_text',
			'title'    => __('Heading 2', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the Heading size 2 or H2 that is used throughout the theme.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_h3',
			'type'     => 'style_text',
			'title'    => __('Heading 3', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the Heading size 3 or H3 that is used throughout the theme.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_h4',
			'type'     => 'style_text',
			'title'    => __('Heading 4', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the Heading size 4 or H4 that is used throughout the theme.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_h5',
			'type'     => 'style_text',
			'title'    => __('Heading 5', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the Heading size 5 or H5 that is used throughout the theme.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_h6',
			'type'     => 'style_text',
			'title'    => __('Heading 6', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the Heading size 6 or H6 that is used throughout the theme.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Dropcaps', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_dropcap',
			'type'     => 'style_text',
			'title'    => __('Dropcap Style', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('A dropcaps is a letter at the beginning of a paragraph or chapter that is larger than the rest of the text. You can use dropcaps by the use of the dropcap shortcode. Here you can specifiy which color should be used as the default color, as it is also possible to use custom colors within the shortcode.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Light Texts', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_light_h1',
			'type'     => 'style_text',
			'title'    => __('Light Heading 1', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the text style of the Heading 1 which are inside of a Light shortcode.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_light_h2',
			'type'     => 'style_text',
			'title'    => __('Light Heading 2', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the text style of the Heading 2 which are inside of a Light shortcode.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_light_h3',
			'type'     => 'style_text',
			'title'    => __('Light Heading 3', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the text style of the Heading 3 which are inside of a Light shortcode.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_light_h4',
			'type'     => 'style_text',
			'title'    => __('Light Heading 4', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the text style of the Heading 4 which are inside of a Light shortcode.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_light_h5',
			'type'     => 'style_text',
			'title'    => __('Light Heading 5', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the text style of the Heading 5 which are inside of a Light shortcode.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_light_h6',
			'type'     => 'style_text',
			'title'    => __('Light Heading 6', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the text style of the Heading 6 which are inside of a Light shortcode.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_light_p',
			'type'     => 'style_text',
			'title'    => __('Light Paragraph', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the text style of the Paragraphs which are inside of a Light shortcode.', WAVE_TEXT_DOMAIN),
		)
	)
);