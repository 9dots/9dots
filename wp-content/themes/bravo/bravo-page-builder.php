<?php
add_action('init','be_shortcodes_init');

function be_shortcodes_init(){

	global $be_shortcode;

	$be_shortcode['full_width_portfolio_module'] = array(
		'name' => __('Full Width Portfolio', 'bravo'),
		'icon' => BE_PAGE_BUILDER_URL.'/images/shortcodes/icon.png',
		'options' => array(
			'is_custom_bg' =>array(
				'title'=>__('Add Custom Background','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			),
			'background_image' => array(
				'title'=> __('Upload a Background Image or Pattern','bravo'),
				'type'=>'media',
				'default'=>'',
				'select' => 'multiple'
			),
			'background_pattern' =>array(
				'title'=>__('Select a Preset Pattern','bravo'),
				'type'=>'select',
				'options'=> array('none','pattern-1','pattern-2','pattern-3','pattern-4'),
				'default'=> ''
			),			
			'background_color' => array(
				'title'=> __('Choose a background color','bravo'),
				'type'=>'color',
				'default'=>'#f9f9f9'
			),
			'background_repeat' =>array(
				'title'=>__('Background Repeat','bravo'),
				'type'=>'select',
				'options'=> array('repeat','repeat-x','repeat-y','no-repeat'),
				'default'=> ''
			),
			'background_attachment' => array(
				'title'=> __('Background Attachment','bravo'),
				'type'=>'select',
				'options'=> array('scroll','fixed'),
				'default'=> 'fixed'
			),
			'background_position' => array(
				'title'=> __('Background Position','bravo'),
				'type'=>'select',
				'options'=> array('left top','left center','left bottom','right top','right center','right bottom','center top','center center','center bottom'),
				'default'=> ''
			),
			'padding_top' =>array(
				'title'=> __('Top Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'padding_bottom' =>array(
				'title'=> __('Bottom Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'is_parallax_section' =>array(
				'title'=>__('Enable Parallax','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			)
		)
	);

	$be_shortcode['three_column_portfolio_module'] = array(
		'name' => __('Three Column Portfolio', 'bravo'),
		'icon' => BE_PAGE_BUILDER_URL.'/images/shortcodes/icon.png',
		'options' => array(
			'is_custom_bg' =>array(
				'title'=>__('Add Custom Background','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			),
			'background_image' => array(
				'title'=> __('Upload a Background Image or Pattern','bravo'),
				'type'=>'media',
				'default'=>'',
				'select' => 'multiple'
			),
			'background_pattern' =>array(
				'title'=>__('Select a Preset Pattern','bravo'),
				'type'=>'select',
				'options'=> array('none','pattern-1','pattern-2','pattern-3','pattern-4'),
				'default'=> ''
			),			
			'background_color' => array(
				'title'=> __('Choose a background color','bravo'),
				'type'=>'color',
				'default'=>'#f9f9f9'
			),
			'background_repeat' =>array(
				'title'=>__('Background Repeat','bravo'),
				'type'=>'select',
				'options'=> array('repeat','repeat-x','repeat-y','no-repeat'),
				'default'=> ''
			),
			'background_attachment' => array(
				'title'=> __('Background Attachment','bravo'),
				'type'=>'select',
				'options'=> array('scroll','fixed'),
				'default'=> 'fixed'
			),
			'background_position' => array(
				'title'=> __('Background Position','bravo'),
				'type'=>'select',
				'options'=> array('left top','left center','left bottom','right top','right center','right bottom','center top','center center','center bottom'),
				'default'=> ''
			),
			'padding_top' =>array(
				'title'=> __('Top Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'padding_bottom' =>array(
				'title'=> __('Bottom Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'is_parallax_section' =>array(
				'title'=>__('Enable Parallax','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			)	
		)
	);

	$be_shortcode['blog_module'] = array(
		'name' => __('Blog', 'bravo'),
		'icon' => BE_PAGE_BUILDER_URL.'/images/shortcodes/icon.png',
		'options' => array(
			'is_custom_bg' =>array(
				'title'=>__('Add Custom Background','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			),
			'background_image' => array(
				'title'=> __('Upload a Background Image or Pattern','bravo'),
				'type'=>'media',
				'default'=>'',
				'select' => 'multiple'
			),
			'background_pattern' =>array(
				'title'=>__('Select a Preset Pattern','bravo'),
				'type'=>'select',
				'options'=> array('none','pattern-1','pattern-2','pattern-3','pattern-4'),
				'default'=> ''
			),			
			'background_color' => array(
				'title'=> __('Choose a background color','bravo'),
				'type'=>'color',
				'default'=>'#f9f9f9'
			),
			'background_repeat' =>array(
				'title'=>__('Background Repeat','bravo'),
				'type'=>'select',
				'options'=> array('repeat','repeat-x','repeat-y','no-repeat'),
				'default'=> ''
			),
			'background_attachment' => array(
				'title'=> __('Background Attachment','bravo'),
				'type'=>'select',
				'options'=> array('scroll','fixed'),
				'default'=> 'fixed'
			),
			'background_position' => array(
				'title'=> __('Background Position','bravo'),
				'type'=>'select',
				'options'=> array('left top','left center','left bottom','right top','right center','right bottom','center top','center center','center bottom'),
				'default'=> ''
			),
			'padding_top' =>array(
				'title'=> __('Top Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'padding_bottom' =>array(
				'title'=> __('Bottom Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'is_parallax_section' =>array(
				'title'=>__('Enable Parallax','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			)			
		)
	);



	$be_shortcode['page_module'] = array(
		'name' => __('Page', 'bravo'),
		'icon' => BE_PAGE_BUILDER_URL.'/images/shortcodes/icon.png',
		'options' => array(
			'page_id' => array(
				'title'=> __('Select a Page','bravo'),
				'type'=>'page'
			),
			'title' =>array(
				'title'=>__('Show Page Title','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			),			
			'is_custom_bg' =>array(
				'title'=>__('Add Custom Background','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			),
			'background_image' => array(
				'title'=> __('Upload a Background Image or Pattern','bravo'),
				'type'=>'media',
				'default'=>'',
				'select' => 'multiple'
			),
			'background_pattern' =>array(
				'title'=>__('Select a Preset Pattern','bravo'),
				'type'=>'select',
				'options'=> array('none','pattern-1','pattern-2','pattern-3','pattern-4'),
				'default'=> ''
			),			
			'background_color' => array(
				'title'=> __('Select a Background Color','bravo'),
				'type'=>'color',
				'default'=>'#f9f9f9'
			),
			'background_repeat' =>array(
				'title'=>__('Background Repeat','bravo'),
				'type'=>'select',
				'options'=> array('repeat','repeat-x','repeat-y','no-repeat'),
				'default'=> ''
			),
			'background_attachment' => array(
				'title'=> __('Background Attachment','bravo'),
				'type'=>'select',
				'options'=> array('scroll','fixed'),
				'default'=> 'fixed'
			),
			'background_position' => array(
				'title'=> __('Background Position','bravo'),
				'type'=>'select',
				'options'=> array('left top','left center','left bottom','right top','right center','right bottom','center top','center center','center bottom'),
				'default'=> ''
			),
			'padding_top' =>array(
				'title'=> __('Top Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'padding_bottom' =>array(
				'title'=> __('Bottom Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'is_parallax_section' =>array(
				'title'=>__('Enable Parallax','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			)											 							
		)
	);

	$be_shortcode['title_module'] = array(
		'name' => __('Title Module', 'bravo'),
		'icon' => BE_PAGE_BUILDER_URL.'/images/shortcodes/icon.png',
		'options' => array(
			'title' =>array(
				'title'=>__('Title','bravo'),
				'type'=>'text',
				'default'=> ''
			),
			'sub_title' =>array(
				'title'=>__('Sub Title','bravo'),
				'type'=>'text',
				'default'=> ''
			),
			'text_color' => array(
				'title'=> __('Choose the text color','bravo'),
				'type'=>'color',
				'default'=>'#ffffff'
			),
			'separator' => array(
				'title'=> __('Show Divider between Title and Sub Title','bravo'),
				'type'=>'checkbox',
				'default'=>'1'
			),												
			'is_custom_bg' =>array(
				'title'=>__('Check this box if you want to use a custom background','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			),
			'background_image' => array(
				'title'=> __('Upload a Background Image or Pattern','bravo'),
				'type'=>'media',
				'default'=>'',
				'select' => 'multiple'
			),
			'background_pattern' =>array(
				'title'=>__('Select a Preset Pattern','bravo'),
				'type'=>'select',
				'options'=> array('none','pattern-1','pattern-2','pattern-3','pattern-4'),
				'default'=> ''
			),			
			'background_color' => array(
				'title'=> __('Choose a background color','bravo'),
				'type'=>'color',
				'default'=>'#f9f9f9'
			),
			'background_repeat' =>array(
				'title'=>__('Background Repeat','bravo'),
				'type'=>'select',
				'options'=> array('repeat','repeat-x','repeat-y','no-repeat'),
				'default'=> ''
			),
			'background_attachment' => array(
				'title'=> __('Background Attachment','bravo'),
				'type'=>'select',
				'options'=> array('scroll','fixed'),
				'default'=> 'fixed'
			),
			'background_position' => array(
				'title'=> __('Background Position','bravo'),
				'type'=>'select',
				'options'=> array('left top','left center','left bottom','right top','right center','right bottom','center top','center center','center bottom'),
				'default'=> ''
			),
			'padding_top' =>array(
				'title'=> __('Top Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'padding_bottom' =>array(
				'title'=> __('Bottom Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'is_parallax_section' =>array(
				'title'=>__('Enable Parallax','bravo'),
				'type'=>'checkbox',
				'default'=> '1'
			)												 							
		)
	);

	$be_shortcode['full_screen_slider_module'] = array(
		'name' => __('Full Width Slider', 'bravo'),
		'icon' => BE_PAGE_BUILDER_URL.'/images/shortcodes/icon.png',
		'options' => array(
			'slider_categories' => array(
				'title'=> __('Choose slider categories from which the images need to be fetched','bravo'),
				'type'=>'taxo',
				'taxonomy'=> 'slider_categories'
			),
			'padding_top' =>array(
				'title'=> __('Top Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
			'padding_bottom' =>array(
				'title'=> __('Bottom Margin (in pixels)','bravo'),
				'type'=>'text',
				'default'=>'160'
			),
		)
	);		

}
?>