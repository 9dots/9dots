<?php



$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/switch-color.png",
	'title'  => __('Style Presets', WAVE_TEXT_DOMAIN),
	'desc'   => __('<p class="description">Select a preset to change all colors and fonts according to the selected preset.</p>', WAVE_TEXT_DOMAIN),
	'fields' => array(
		array(
			'id'       => 'style_preset',
			'type'     => 'radio_img',
			'title'    => WAVE_THEME_NAME . __(' Style Presets', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Style presets can assist you in rapidly changing the style to those of the preset.<br/><br/>This option is specifically useful when you want to use a style you have seen in a demo or if you wish to use it as base to get started with your own style.<br/><br/>If you are just getting started with building your website and haven\'t made any style changes to the theme, you can always try a few of the presets to see if you any of the presets is to your liking.<br/><br/>To apply a preset style, select one of the options on your right hand-side and click on Save Settings to apply the selected preset.', WAVE_TEXT_DOMAIN),
			'desc'     => __('<strong>WARNING: This will overwrite all options with colors and fonts!</strong><br/>Press Save Settings after selecting a preset to apply the selected preset.', WaveRedux_TEXT_DOMAIN),
			'options'  => array(
				'light'  => array(
					'title' => 'RAW Light',
					'img'   => get_template_directory_uri() . '/assets/img/admin/preset-light.png'
				),
				'dark'   => array(
					'title' => 'RAW Dark',
					'img'   => get_template_directory_uri() . '/assets/img/admin/preset-dark.png'
				),
				'blue' => array(
					'title' => 'RAW Blue',
					'img'   => get_template_directory_uri() . '/assets/img/admin/preset-blue.png'
				),
				'sepia' => array(
					'title' => 'RAW Sepia',
					'img'   => get_template_directory_uri() . '/assets/img/admin/preset-sepia.png'
				),
				'grey' => array(
					'title' => 'RAW Grey',
					'img'   => get_template_directory_uri() . '/assets/img/admin/preset-grey.png'
				)
			),
			'std'      => '2'
		)
	)
);