<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/table.png",
	'title'  => __('Tables', 'nhp-opts'),
	'desc'   => __('<p class="description">This tab contains all options regarding pricing tables and regular tables.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Table - General', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_roundness',
			'type'     => 'slider',
			'title'    => __('Corner Roundness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the roundness or softness of the corners of the pricing columns.', WAVE_TEXT_DOMAIN),
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
			'id'       => 'style_table_line_color',
			'type'     => 'color',
			'title'    => __('Line Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the color of the line that separates the rows of the pricing table.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Table - Header', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_header_background_color',
			'type'     => 'color',
			'title'    => __('Header Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the option for changing the header background color of columns that are not highlighted.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_heading',
			'type'     => 'style_text',
			'title'    => __('Heading', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the headings of the pricing columns.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color that is used for the largest part of the pricing columns.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_odd_row_color',
			'type'     => 'color',
			'title'    => __('Odd Row Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color for the odd rows of the pricing table. The even rows will use the background color that was selected above.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_body_text',
			'type'     => 'style_text',
			'title'    => __('Body Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the style of the text that is used in the list of features.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Pricing Table - Body', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color that is used for the largest part of the pricing columns.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_odd_row_color',
			'type'     => 'color',
			'title'    => __('Odd Row Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color for the odd rows of the pricing table. The even rows will use the background color that was selected above.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_body_text',
			'type'     => 'style_text',
			'title'    => __('Body Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the style of the text that is used in the list of features.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Pricing Table - General', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_roundness',
			'type'     => 'slider',
			'title'    => __('Corner Roundness', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the roundness or softness of the corners of the pricing columns.', WAVE_TEXT_DOMAIN),
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
			'id'       => 'style_table_pricing_line_color',
			'type'     => 'color',
			'title'    => __('Line Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the color of the line that separates the rows of the pricing table.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Pricing Table - Header', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_header_background_color',
			'type'     => 'color',
			'title'    => __('Header Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the option for changing the header background color of columns that are not highlighted.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_header_highlight_background_color',
			'type'     => 'color',
			'title'    => __('Header Highlight Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the highlighted header background color of the pricing columns.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_heading',
			'type'     => 'style_text',
			'title'    => __('Heading', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the headings of the pricing columns.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_highlight_heading',
			'type'     => 'style_text',
			'title'    => __('Highlight Heading', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the style of the highlighted headings of the pricing columns.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_highlight_subheading',
			'type'     => 'style_text',
			'title'    => __('Highlight Sub-heading', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('The highlighted prcing columns can contain a sub-heading. For example: \'Best Offer\'. This options allows you to change the style of the sub-heading.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Pricing Table - Pricing', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_currency_text',
			'type'     => 'style_text',
			'title'    => __('Currency Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the style for the currency symbol that appears on the left hand-side of the amount.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_amount_text',
			'type'     => 'style_text',
			'title'    => __('Amount Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('The style for the amount of the pricing column. Don\'t make the size too large in case you want to use large numbers.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_decimal_text',
			'type'     => 'style_text',
			'title'    => __('Decimal Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the text style for the optional decimal value that can be shown after the amount,', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_recurrence_text',
			'type'     => 'style_text',
			'title'    => __('Recurrence Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('The recurrence text is the text that describes whether the pricing is per month, per year or perhaps one time off.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Pricing Table - Body', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color that is used for the largest part of the pricing columns.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_odd_row_color',
			'type'     => 'color',
			'title'    => __('Odd Row Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can change the background color for the odd rows of the pricing table. The even rows will use the background color that was selected above.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_table_pricing_body_text',
			'type'     => 'style_text',
			'title'    => __('Body Text', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('This is the style of the text that is used in the list of features.', WAVE_TEXT_DOMAIN)
		)
	)
);