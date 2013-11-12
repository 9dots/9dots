<?php


$sections[] = array(
	'icon'   => get_template_directory_uri() . "/assets/img/admin/icons/team.png",
	'title'  => __('Team &amp; Person', 'nhp-opts'),
	'desc'   => __('<p class="description">This tab contains all options regarding the person shortcode and the team slider.</p>', 'nhp-opts'),
	'fields' => array(
		array(
			'type'  => 'header',
			'title' => __('General', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_person_name',
			'type'     => 'style_text',
			'title'    => __('Name', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the style that should be used for the name of persons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_person_title',
			'type'     => 'style_text',
			'title'    => __('Title', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the style that should be used for the title of persons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'id'       => 'style_person_description',
			'type'     => 'style_text',
			'title'    => __('Description', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the style that should be used for the description of persons.', WAVE_TEXT_DOMAIN),
		),
		array(
			'type'  => 'header',
			'title' => __('Mouse Over', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_person_hover_background_color',
			'type'     => 'color',
			'title'    => __('Background Color', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the background color that will be shown when you move your cursor over a person.', WAVE_TEXT_DOMAIN)
		),
		array(
			'id'       => 'style_person_hover_content',
			'type'     => 'style_text',
			'title'    => __('Icons &amp; Name', WAVE_TEXT_DOMAIN),
			'sub_desc' => __('Here you can set the icon color and text style for when you move your cursor over a person.', WAVE_TEXT_DOMAIN),
		),
	)
);
