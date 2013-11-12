<?php

$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/fonts.png",
	'title'  => __('Fonts', WAVE_TEXT_DOMAIN),
	'desc'   => __('<p class="description">Within this tab you can select the fonts you would like to use in your website. Selecting or deselecting fonts can be done by clicking the fonts.<br/><br/>Make sure to save this page before trying to use any of the newly selected fonts.</p>', WAVE_TEXT_DOMAIN),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Google Fonts', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'fonts',
			'type'     => 'fonts',
			'title'    => __('Google Fonts', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Within this tab you can select the fonts you would like to use in your website. Selecting or deselecting fonts can be done by clicking the fonts.<br/><br/>Make sure to save this page before trying to use any of the newly selected fonts.', WAVE_TEXT_DOMAIN)
		)
	)
);