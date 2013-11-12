<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/application-blog.png",
	'title'  => __('Blog', 'nhp-opts'),
	'desc'   => __('<p class="description">This tab contains all settings regarding blog posts, blog dialogs and the blog shortcode.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Basic Blog Settings', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'blog_sidebar_enable',
			'type'     => 'checkbox',
			'title'    => __('Show Sidebar', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This option allows you to enable/disable the sidebar that will show on the right hand-side of the blog pages.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'type'  => 'header',
			'title' => __('Mouse Over Style', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_blog_item_hover_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the background color that will be used when you move your cursor over the images of the shortcode\'s blogs items.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_blog_item_hover_content',
			'type'     => 'style_text',
			'title'    => __('Icon &amp; Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify the icon color and text style that will be used when you move your cursor over the images of the shortcode\'s blogs items.', WAVE_TEXT_DOMAIN),
		),
	)
);
