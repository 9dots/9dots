<?php


$colorsNum = 30;

$colorFields = array();

foreach (range(0, $colorsNum - 1) as $colorIndex) {

	$colorFields[] = array(
		'id'    => 'color_' . $colorIndex,
		'type'  => 'color_named',
		'title' => __('Color ' . ($colorIndex + 1), WAVE_TEXT_DOMAIN)
	);

}


$sections[] = array(
	'icon'   => get_template_directory_uri() . "assets/img/admin/icons/color.png",
	'title'  => __('Colors', 'nhp-opts'),
	'desc'   => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'nhp-opts'),
	'fields' => $colorFields
);