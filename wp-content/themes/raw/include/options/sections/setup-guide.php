<?php

$option = get_option(WAVE_TEXT_DOMAIN);

$setup_progress = wave_get_setup_progress();


$sections[] = array(
	'class'      => "aaaaa",
	'icon'       => get_template_directory_uri() . "/assets/img/admin/icons/wand.png",
	'icon_class' => 'icon-large',
	'title'      => __('Setup Guide', WAVE_TEXT_DOMAIN),
	'desc'       => __('<p class="description">Welcome the RAW Theme options panel! You can use the tabs on your left hand-side to navigate through the options.<br/><br/>You can find the documentation for this theme in the Documentation tab at the bottom of the tabs.</p>', WAVE_TEXT_DOMAIN),
	'fields'     => array(
		array(
			'type'  => 'header',
			'title' => __('Step 1: Install RAW Theme Essentials Plugin', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'          => "guide_raw_theme_essentials",
			'type'        => 'status',
			'title'       => __('Install RAW Theme Essentials Plugin <span class="required">*</span>', WAVE_TEXT_DOMAIN),
			'sub_desc'    => __('In order to use all RAW\'s features you will need to install and activate the RAW Theme Essentials plugin. The RAW Theme Essentials Plugin has been included in this Theme by default.', WAVE_TEXT_DOMAIN),
			'desc'        => wave_get_admin_link_button(__('Install RAW Theme Essentials', WAVE_TEXT_DOMAIN), 'themes.php?page=install-required-plugins', !$setup_progress['plugins']['raw-theme-essentials']),
			'test'        => $setup_progress['plugins']['raw-theme-essentials']
		),
		array(
			'type'  => 'header',
			'title' => __('Step 2: Setup Permalinks', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => "guide_permalink_structure",
			'type'     => 'status',
			'title'    => __('Setup Permalinks <span class="required">*</span>', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('For the One Page functionality to work properly, configuring permalinks is required.', WAVE_TEXT_DOMAIN),
			'desc'     => wave_get_setup_permalink_button(),
			'test'     => $setup_progress['wordpress']['permalink_structure']
		),
		array(
			'type'  => 'header',
			'title' => __('Step 3: Import Sample Data', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => "guide_demo_import",
			'type'     => 'status',
			'title'    => __('Import Sample Data', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('If you want to use the sample data as the basis of your website or just to learn from, you import the sample data by clicking \'Import Sample Data\'. If you don\'t want to use the sample data, you can check \'No, I don\'t want to import the sample data.\' to complete this step.', WAVE_TEXT_DOMAIN),
			'desc'     => wave_get_demo_import_button(__('Import Sample Data', WAVE_TEXT_DOMAIN)),
			'test'     => $setup_progress['theme']['demo_data'],
			'has_options' => !$setup_progress['theme']['demo_data'],
			'label_yes'   => "Yes, I want to import the sample data.",
			'label_no'    => "No, I don't want to import the sample data."
		),
		array(
			'type'  => 'header',
			'title' => __('Step 4: Set a Static Front Page', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => "guide_static_front_page",
			'type'     => 'status',
			'title'    => __('Set a Static Front Page <span class="required">*</span>', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('WordPress shows blog posts by default as the front page. When you use a theme such as this one, you will not use the front page in that way. That\'s what it is required to set a static page as the front page of the website.', WAVE_TEXT_DOMAIN),
			'desc'        => wave_get_admin_link_button(__('Set Static Front Page', WAVE_TEXT_DOMAIN), 'options-reading.php', !$setup_progress['wordpress']['static_front_page']),
			'test'     => $setup_progress['wordpress']['static_front_page']
		),
		array(
			'type'  => 'header',
			'title' => __('Step 5: Required Plugins', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'          => "guide_slider_revolution",
			'type'        => 'status',
			'title'       => __('5.1 - Slider Revolution', WAVE_TEXT_DOMAIN),
			'sub_desc'    => __('Create a responsive or fullwidth slider with must-see-effects and meanwhile keep or build your SEO optimization.<br/><br/>This plugin was developed by <a href="http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380" target="_blank">themepunch</a> and has been included in this theme for free.', WAVE_TEXT_DOMAIN),
			'desc'        => wave_get_admin_link_button(__('Install Slider Revolution', WAVE_TEXT_DOMAIN), 'themes.php?page=install-required-plugins', !$setup_progress['plugins']['slider_revolution']),
			'test'        => $setup_progress['plugins']['slider_revolution'],
			'has_options' => !$setup_progress['plugins']['slider_revolution'],
			'label_yes'   => "Yes, I want to use Slider Revolution.",
			'label_no'    => "No, I don't want to use Slider Revolution."
		),
		array(
			'id'          => "guide_layer_slider",
			'type'        => 'status',
			'title'       => __('5.2 - Layer Slider', WAVE_TEXT_DOMAIN),
			'sub_desc'    => __('LayerSlider is the most advanced Responsive jQuery Slider Plugin with the famous Parallax Effect and optional 3D Transitions.<br/><br/>This plugin was developed by <a href="http://codecanyon.net/item/layerslider-responsive-wordpress-slider-plugin-/1362246" target="_blank">kreatura</a> and has been included in this theme for free.', WAVE_TEXT_DOMAIN),
			'desc'        => wave_get_admin_link_button(__('Install Layer Slider', WAVE_TEXT_DOMAIN), 'themes.php?page=install-required-plugins', !$setup_progress['plugins']['layer_slider']),
			'test'        => $setup_progress['plugins']['layer_slider'],
			'has_options' => !$setup_progress['plugins']['layer_slider'],
			'label_yes'   => "Yes, I want to use Layer Slider.",
			'label_no'    => "No, I don't want to use Layer Slider."
		),
		array(
			'type'  => 'header',
			'title' => __('Step 6: Recommended Plugins', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'          => "guide_contact_form_7",
			'type'        => 'status',
			'title'       => __('6.1 - Contact Form 7', WAVE_TEXT_DOMAIN),
			'sub_desc'    => __('If you value simplicity and flexibility, Contact Form 7 is a great choice. It allows you to flexibly design the form and mail.<br/><br/>This plugin was developed by <a href="http://contactform7.com/" target="_blank">Takayuki Miyoshi</a>.<br/><br/>You can install this plugin by pressing the \'Install Contact Form 7\' button.', WAVE_TEXT_DOMAIN),
			'desc'        => wave_get_plugin_install_button("contact-form-7/wp-contact-form-7", __('Install Contact Form 7', WAVE_TEXT_DOMAIN)),
			'has_options' => !wave_is_active_plugin("contact-form-7/wp-contact-form-7"),
			'test'        => $setup_progress['plugins']['contact_form_7'],
			'label_yes'   => "Yes, I want to use Contact Form 7.",
			'label_no'    => "No, I don't want to use Contact Form 7."
		),
		array(
			'id'          => "guide_woocommerce",
			'type'        => 'status',
			'title'       => __('6.2 - WooCommerce', WAVE_TEXT_DOMAIN),
			'sub_desc'    => __('Transform your WordPress website into a thorough-bred eCommerce store. Delivering enterprise-level quality and features whilst backed by a name you can trust.<br/><br/>You can install this plugin by pressing the \'Install WooCommerce\' button.', WAVE_TEXT_DOMAIN),
			'desc'        => wave_get_plugin_install_button("woocommerce/woocommerce", __('Install WooCommerce', WAVE_TEXT_DOMAIN)),
			'test'        => $setup_progress['plugins']['woocommerce'],
			'has_options' => !wave_is_active_plugin("woocommerce/woocommerce"),
			'label_yes'   => "Yes, I want to use WooCommerce to build my webshop.",
			'label_no'    => "No, this website will not have a webshop."
		),
		array(
			'id'          => "guide_gravity_forms",
			'type'        => 'status',
			'title'       => __('6.3 - Gravity Forms', WAVE_TEXT_DOMAIN),
			'sub_desc'    => __('Build and publish your WordPress forms in just minutes. No drudgery, just quick and easy form-building.<br/><br/>This plugin was developed by <a href="http://www.gravityforms.com/" target="_blank">Rocketgenius, Inc</a>.<br/><br/>This is a commercial plugin and needs to be purchased in order to use it. Click <a href="http://www.gravityforms.com/" target="_blank">here</a> to visit the vendor\'s website.', WAVE_TEXT_DOMAIN),
			'desc'        => __('', WAVE_TEXT_DOMAIN),
			'has_options' => !wave_is_active_plugin("gravityforms/gravityforms"),
			'test'        => $setup_progress['plugins']['gravity_forms'],
			'label_yes'   => "Yes, I want to use Gravity Forms.",
			'label_no'    => "No, I don't want to use Gravity Forms."
		),
		array(
			'id'          => "guide_wpml_sitepress",
			'type'        => 'status',
			'title'       => __('6.4 - WPML Multilingual CMS', WAVE_TEXT_DOMAIN),
			'sub_desc'    => __('WPML makes it easy to build multilingual sites and run them. It’s powerful enough for corporate sites, yet simple for blogs.<br/><br/>This plugin was developed by <a href="http://wpml.org/" target="_blank">OnTheGoSystems, Inc</a>.<br/><br/>This is a commercial plugin and needs to be purchased in order to use it. Click <a href="http://wpml.org/" target="_blank">here</a> to visit the vendor\'s website.', WAVE_TEXT_DOMAIN),
			'desc'        => __('', WAVE_TEXT_DOMAIN),
			'has_options' => !wave_is_active_plugin("sitepress-multilingual-cms/sitepress"),
			'test'        => $setup_progress['plugins']['wpml_sitepress'],
			'label_yes'   => "This multi language website.",
			'label_no'    => "This single language website."
		)
	)
);