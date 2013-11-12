<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/application-icon-large.png",
	'title'  => __('Portfolio', 'nhp-opts'),
	'desc'   => __('<p class="description">The options below are used for everything related to the portfolio.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Shortcode - Mouse Over Style', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_portfolio_hover_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the background color that will be used when you move your cursor over the images of the portfolio shortcode\'s projects.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_portfolio_hover_content',
			'type'     => 'style_text',
			'title'    => __('Icon &amp; Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the icon color and text style that will be used when you move your cursor over the images of the portfolio shortcode\'s projects.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Shortcode - Category Text Links', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_portfolio_category_link_color',
			'type'     => 'color',
			'title'    => __('Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the link style of the categories that will be displayed on top of the portfolio shortcode projects.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_portfolio_category_link_hover_color',
			'type'     => 'color',
			'title'    => __('Mouse Over Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the color of the link style of the portfolio shortcode category links.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Project - Project Attributes', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_portfolio_project_attributes_icon_color',
			'type'     => 'color',
			'title'    => __('Icon Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the color of the projects attributes that will appear on the portfolio page.', WAVE_TEXT_DOMAIN),
		),
	)
);
