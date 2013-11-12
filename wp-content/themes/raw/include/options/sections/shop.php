<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/store.png",
	'title'  => __('Shop', 'nhp-opts'),
	'desc'   => __('<p class="description">This tab contains all settings regarding blog posts, blog dialogs and the blog shortcode.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Sidebar', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'shop_sidebar',
			'type'     => 'button_set',
			'title'    => __('Show Sidebar', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This option allows you to enable/disable the sidebar that will show on the shop pages.', WAVE_TEXT_DOMAIN),
			'options'  => array(
				''      => __('None'),
				'left'  => __('Left'),
				'right' => __('Right')
			),
			'std'      => 'left'
		),
		array(
			'type'  => 'header',
			'title' => __('Products', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_shop_products_item_background',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the products.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_shop_products_item_heading',
			'type'     => 'style_text',
			'title'    => __('Product Name', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the product name within the producs.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_shop_products_item_price',
			'type'     => 'style_text',
			'title'    => __('Price', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the price within the products.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_shop_products_item_links',
			'type'     => 'style_text',
			'title'    => __('Text Links', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the links or buttons at the bottom of the products.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_shop_products_item_links_hover_color',
			'type'     => 'color',
			'title'    => __('Text Links Hover', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the color of the text of the links or buttons at the bottom of the products.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_shop_products_item_links_line_color',
			'type'     => 'color',
			'title'    => __('Text Links Line Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the color of the line that is on top of the links at the bottom of the products.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_shop_products_item_rating_stars',
			'type'     => 'color',
			'title'    => __('Rating Stars Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the color of the rating stars of the products.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Sale Button', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_shop_sale_button',
			'type'     => 'color',
			'title'    => __('Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color of the sale buttons.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_shop_sale_button_text',
			'type'     => 'style_text',
			'title'    => __('Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the sale buttons.', WAVE_TEXT_DOMAIN),
			'desc'     => __('', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Product Page', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_shop_product_heading',
			'type'     => 'style_text',
			'title'    => __('Product Name', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the style of the product names within the product pages.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_shop_product_price',
			'type'     => 'style_text',
			'title'    => __('Product Price', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the text style of the price within the product pages.', WAVE_TEXT_DOMAIN),
		),
	)
);
