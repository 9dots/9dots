<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/map.png",
	'title'  => __('Contact Map', 'nhp-opts'),
	'desc'   => __('<p class="description">The contact map is the map that is intended for a contact page. Whenever you use a map shortcode without defining any attributes, the options delow will be used to render the map.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('Map Zoom', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'contact_map_zoom_default',
			'type'     => 'slider',
			'slider'   => array(
				'range' => "1,18",
				'step'  => "1",
				'snap'  => "true"
			),
			'title'    => __('Map Zoom Level', WAVE_TEXT_DOMAIN),
			'sub_desc' => __("Here you can define the initial zoom level that the map should use, before the user alters the zoom level.", WAVE_TEXT_DOMAIN),
			'desc'     => __("(1 = Earth level, 18 = Street level)", WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'contact_map_zoom_user',
			'type'     => 'checkbox',
			'title'    => __('Enable Map Zoom Feature', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('With this option you can enable or disable the user\'s ability to change the zoom level.', WAVE_TEXT_DOMAIN),
			'switch'   => true
		),
		array(
			'type'  => 'header',
			'title' => __('Map Center', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'contact_map_center_latitude',
			'type'     => 'text',
			'title'    => __('Map Center Latitude', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Enter the latitude decimal value for the map\'s center.<br/><br/>You can use <a href="http://www.mapseasy.com/adress-to-gps-coordinates.php" target="_blank">MapsEasy.com</a> to covert an address or location to coordinates.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'contact_map_center_longitude',
			'type'     => 'text',
			'title'    => __('Map Center Longitude', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Enter the longitude decimal value for the map\'s center.<br/><br/>You can use <a href="http://www.mapseasy.com/adress-to-gps-coordinates.php" target="_blank">MapsEasy.com</a> to covert an address or location to coordinates.', WAVE_TEXT_DOMAIN)
		),
		array(
			'type'  => 'header',
			'title' => __('Markers', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'contact_map_marker_image',
			'type'     => 'upload',
			'title'    => __('Marker Image', WaveRedux_TEXT_DOMAIN),
			'sub_desc' => __('Here you can upload/select a custom marker image.<br/><br/>Please note that the marker you upload will not be resized, so you will have to upload the custom marker image at the size you wish to display it.', WaveRedux_TEXT_DOMAIN)
		),
		array(
			'id'       => 'contact_map_markers',
			'type'     => 'google_maps_locations',
			'title'    => __('Markers', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('You can add as many markers as you like.<br/><br/>Please not that you will need to make sure that the Map Zoom Level and Map Center are combined in way that you will be able to see the markers that you add here.<br/><br/>You can use <a href="http://www.mapseasy.com/adress-to-gps-coordinates.php" target="_blank">MapsEasy.com</a> to covert an address or location to coordinates.', WAVE_TEXT_DOMAIN)
		),
	)
);
