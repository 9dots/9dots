<?php

$socialMediaFields = array(
	array(
		'type'  => 'header',
		'title' => __('Social Media URL\'s', WAVE_TEXT_DOMAIN)
	)
);

foreach (wave_get_social_media_channels() as $channelId => $channelName) {
	$socialMediaFields[] = array(
		'id'       => 'socialmedia_url_' . $channelId,
		'type'     => 'text',
		'title'    => __($channelName . ' URL', WAVE_TEXT_DOMAIN),
		'sub_desc' => sprintf(__("Enter your %s URL. (Optional)", WAVE_TEXT_DOMAIN), $channelName)
	);
}


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/social-media.png",
	'title'  => __('Social Media', 'nhp-opts'),
	'desc'   => __('<p class="description">Here you can enter your Social Media URL\'s. The URL\'s you can enter can then be optionally displayed in the Header Top Bar and in the Footer section.</p>', 'nhp-opts'),
	'fields' => $socialMediaFields
);