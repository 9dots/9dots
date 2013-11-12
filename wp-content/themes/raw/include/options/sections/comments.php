<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/balloons-white.png",
	'title'  => __('Comment Area', 'nhp-opts'),
	'desc'   => __('<p class="description">This needs a description.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Comment Area', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_comments_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the comments area. Make sure you provide enough contrast with the body background color and the background color of the comment items.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Comment Items', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_comments_item_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the the content items.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_comments_item_body_text',
			'type'     => 'style_text',
			'title'    => __('Body Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the body text style that will be used within the comment items.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_comments_item_author',
			'type'     => 'style_text',
			'title'    => __('Author Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style that will be used for the comment\'s author.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_comments_item_date',
			'type'     => 'style_text',
			'title'    => __('Date Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style that will be used for the date and time in the comment item.', WAVE_TEXT_DOMAIN),
		),
	)
);
