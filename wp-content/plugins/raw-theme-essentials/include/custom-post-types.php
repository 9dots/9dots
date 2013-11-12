<?php

// Add actions for the Portfolio Dialog
add_action("wp_ajax_dialog_portfolio", "wave_ajax_frontend_dialog_portfolio");
add_action("wp_ajax_nopriv_dialog_portfolio", "wave_ajax_frontend_dialog_portfolio");

// Add action for registering portfolio and team post types
add_action("init", "wave_register_portfolio");
add_action("init", "wave_register_team");
add_action("init", "wave_register_cta");

// Register the portfolio custom post type
function wave_register_portfolio() {
	register_post_type('portfolio', array(
			'labels'       => array(
				'name'          => __('Portfolio'),
				'singular_name' => __('Project')
			),
			'public'       => true,
			'has_archive'  => true,
			'show_in_menu' => true,
			'supports'     => array(
				"title",
				"editor",
				"thumbnail",
				"comments"
			),
			'taxonomies'   => array('category')
		));

	register_taxonomy('project-attributes', array('portfolio'), array(
			'hierarchical' => true,
			'labels'       => array(
				'name'          => __('Project Attributes', WAVE_TEXT_DOMAIN),
				'singular_name' => __('Project Attribute', WAVE_TEXT_DOMAIN),
				'search_items'  => __('Search Project Attributes', WAVE_TEXT_DOMAIN),
				'all_items'     => __('All Project Attributes', WAVE_TEXT_DOMAIN),
				'parent_item'   => __('Parent Project Attribute', WAVE_TEXT_DOMAIN),
				'edit_item'     => __('Edit Project Attribute', WAVE_TEXT_DOMAIN),
				'update_item'   => __('Update Project Attribute', WAVE_TEXT_DOMAIN),
				'add_new_item'  => __('Add New Project Attribute', WAVE_TEXT_DOMAIN),
				'new_item_name' => __('New Project Attribute', WAVE_TEXT_DOMAIN),
				'menu_name'     => __('Project Attributes', WAVE_TEXT_DOMAIN)
			),
			'show_ui'      => true,
			'query_var'    => true,
			'rewrite'      => array('slug' => 'project-attributes')
		));

}

// Register the team custom post type
function wave_register_team() {
	register_post_type('team', array(
			'labels'              => array(
				'name'          => __('Team Members'),
				'singular_name' => __('Team Member')
			),
			'public'              => true,
			'has_archive'         => true,
			'show_in_menu'        => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'supports'            => array(
				"title",
				"thumbnail"
			)
		));
}


// Register the call to action custom post type
function wave_register_cta() {
	register_post_type('cta', array(
			'labels'             => array(
				'name'               => __('Call to Actions'),
				'singular_name'      => __('Call to Action'),
				'add_new'            => __('Add New'),
				'add_new_item'       => __('Add New Call to Action'),
				'edit_item'          => __('Edit Call to Action'),
				'new_item'           => __('New Call to Action'),
				'all_items'          => __('All Call to Actions'),
				'view_item'          => __('View Call to Action'),
				'search_items'       => __('Search Call to Actions'),
				'not_found'          => __('No Call to Actions found'),
				'not_found_in_trash' => __('No Call to Actions found in Trash'),
				'parent_item_colon'  => '',
				'menu_name'          => __('Call to Action')
			),
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => false,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 31,
			'supports'           => array("title")
		));
}

