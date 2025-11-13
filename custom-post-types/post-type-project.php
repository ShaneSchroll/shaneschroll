<?php

$labels = [
	'name'               => __( 'Projects', 'srs' ),
	'singular_name'      => __( 'Project', 'srs' ),
	'add_new'            => _x( 'Add Project', 'srs', ),
	'add_new_item'       => __( 'Add Project', 'srs' ),
	'edit_item'          => __( 'Edit Project', 'srs' ),
	'new_item'           => __( 'New Project', 'srs' ),
	'view_item'          => __( 'View Project', 'srs' ),
	'search_items'       => __( 'Search Projects', 'srs' ),
	'not_found'          => __( 'No Projects found', 'srs' ),
	'not_found_in_trash' => __( 'No Projects found in Trash', 'srs' ),
	'parent_item_colon'  => __( 'Parent Project:', 'srs' ),
	'menu_name'          => __( 'Projects', 'srs' ),
];

$args = [
	'labels'              => $labels,
	'hierarchical'        => false,
	'description'         => '',
	'taxonomies'          => [],
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'show_in_rest'		  => true,
	'menu_icon'           => 'dashicons-edit',
	'show_in_nav_menus'   => false,
	'publicly_queryable'  => true,
	'exclude_from_search' => false,
	'has_archive'         => true,
	'query_var'           => true,
	'can_export'          => true,
	'rewrite'             => true,
	'capability_type'     => 'post',
	'supports'            => [ 'title', 'thumbnail', 'editor' ],
];
register_post_type( 'project', $args );
