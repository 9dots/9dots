<?php


$sections[] = array(
	'icon'       => get_template_directory_uri() . "/assets/img/admin/icons/gear.png",
	'icon_class' => 'icon-large',
	'title'      => __('General', WAVE_TEXT_DOMAIN),
	'desc'       => (WAVE_WHITELABEL ? "" : __('<p class="description">Welcome the RAW Theme options panel! You can use the tabs on your left hand-side to navigate through the options.<br/><br/>You can find the documentation for this theme in the Documentation tab at the bottom of the tabs.</p>', WAVE_TEXT_DOMAIN)),
	'fields'     => array(
		array(
			'type'  => 'header',
			'title' => __('Basic Features', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_responsive_design',
			'type'     => 'checkbox',
			'title'    => __('Enable Responsive Design', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Enable this to use the theme\'s responsive features.<br/><br/>Responsive means that the layout responds to different screen sizes and devices. Such as mobile phones and tablets.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'id'       => 'back_to_top_button_enabled',
			'type'     => 'checkbox',
			'title'    => __('Enable Back to Top Button', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can enable/disable the back to top button that will appear at the button of the browser viewport (the area where you see the website) when you scroll down.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'id'       => 'scroll_easing_enabled',
			'type'     => 'checkbox',
			'title'    => __('Enable Scroll Easing', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can specify whether you would like to enable or disable the scroll easing (animation) effect for when you click a navigation menu item.', WAVE_TEXT_DOMAIN),
			'switch'   => true,
			'std'      => '1'
		),
		array(
			'type'  => 'header',
			'title' => __('Body Background', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_body_background_color',
			'type'     => 'color',
			'title'    => __('Body Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Allows you to change the background color of the main content.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Icons', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'favicon',
			'type'     => 'upload',
			'title'    => __('Favicon', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Add a 16x16 pixels image that will be used for the favicon.<br/><br/>You can use the favicon generator at <a href="http://www.favicon.cc/" target="_blank">favicon.cc</a> to generate a .ICO file from any type of image.', WAVE_TEXT_DOMAIN),
			'desc'     => __('Please only select PNG, GIF or ICO files.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'ios_icon_57',
			'type'     => 'upload',
			'title'    => __('Apple iPhone &amp; iPod Icon 57x57', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Add a 57x57 pixels PNG image that will be used for Apple iPhone &amp; iPod.', WAVE_TEXT_DOMAIN),
			'desc'     => __('Please only select PNG files and make sure they are exactly 57x57 pixels.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'ios_icon_114',
			'type'     => 'upload',
			'title'    => __('Apple iPhone &amp; iPod Icon 114x114', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Add a 114x114 pixels PNG image that will be used for Apple iPhone &amp; iPod.', WAVE_TEXT_DOMAIN),
			'desc'     => __('Please only select PNG files and make sure they are exactly 114x114 pixels.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'ios_icon_72',
			'type'     => 'upload',
			'title'    => __('Apple iPad Icon 72x72', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Add a 72x72 pixels PNG image that will be used for Apple iPad.', WAVE_TEXT_DOMAIN),
			'desc'     => __('Please only select PNG files and make sure they are exactly 72x72 pixels.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'ios_icon_144',
			'type'     => 'upload',
			'title'    => __('Apple iPad Icon 144x144', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Add a 144x144 pixels PNG image that will be used for Apple iPad.', WAVE_TEXT_DOMAIN),
			'desc'     => __('Please only select PNG files and make sure they are exactly 144x144 pixels.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Tracking Code', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'tracking_code',
			'type'     => 'textarea',
			'title'    => __('Tracking Code (optional)', WAVE_TEXT_DOMAIN),
			'sub_desc' => __("Enter your tracking code for Google Analytics or any other statistics or tracking service.<br/><br/>This code will be added to the footer of the theme on every page.", WAVE_TEXT_DOMAIN),
			'desc'     => __('Please include the entire script. Not just the property ID. Google\'s support page: <a href="https://support.google.com/analytics/answer/1008080?hl=en" target="_blank">How to set up the web tracking code</a> can be consulted to find out how to obtain your Google Analytics web tracking code.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Custom CSS', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'custom_css',
			'type'     => 'textarea',
			'title'    => __('Custom CSS', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can add your custom CSS. Any CSS code you enter here will override the theme\'s CSS code.<br/><br/>You can use tools like <a href="https://getfirebug.com/" target="_blank">Firebug</a> for Firefox or <a href="https://developers.google.com/chrome-developer-tools/" target="_blank">Developer Tools</a> for Chrome to find out which CSS rules are in place and how to overrride them.', WAVE_TEXT_DOMAIN)
		)
	)
);