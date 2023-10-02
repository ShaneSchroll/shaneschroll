<?php

$labels = [
	'name'               => __( 'Mockups', 'srs' ),
	'singular_name'      => __( 'Mockup', 'srs' ),
	'add_new'            => _x( 'Add Mockup', 'srs', ),
	'add_new_item'       => __( 'Add Mockup', 'srs' ),
	'edit_item'          => __( 'Edit Mockup', 'srs' ),
	'new_item'           => __( 'New Mockup', 'srs' ),
	'view_item'          => __( 'View Mockup', 'srs' ),
	'search_items'       => __( 'Search Mockups', 'srs' ),
	'not_found'          => __( 'No Mockups found', 'srs' ),
	'not_found_in_trash' => __( 'No Mockups found in Trash', 'srs' ),
	'parent_item_colon'  => __( 'Parent Mockup:', 'srs' ),
	'menu_name'          => __( 'Mockups', 'srs' ),
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
	'menu_icon'           => 'dashicons-html',
	'show_in_nav_menus'   => false,
	'publicly_queryable'  => true,
	'exclude_from_search' => false,
	'has_archive'         => false,
	'query_var'           => true,
	'can_export'          => true,
	'rewrite'             => true,
	'capability_type'     => 'post',
	'supports'            => [ 'title', 'thumbnail' ],
];
register_post_type( 'mockup', $args );

// $tax_labels = [
// 	'name' 				=> _x( 'Languages', 'srs' ),
// 	'singular_name' 	=> _x( 'Language', 'srs' ),
// 	'search_items' 		=> __( 'Search Languages', 'srs' ),
// 	'all_items' 		=> __( 'All Languages', 'srs' ),
// 	'edit_item' 		=> __( 'Edit Language', 'srs' ),
// 	'update_item' 		=> __( 'Update Language', 'srs' ),
// 	'add_new_item' 		=> __( 'Add Language', 'srs' ),
// 	'new_item_name' 	=> __( 'Create Language', 'srs' ),
// 	'menu_name' 		=> __( 'Languages', 'srs' ),
// 	'parent_item'		=> NULL,
// ];

// $tax_args = [
// 	'hierarchical' 	    => true,
// 	'labels' 	    	=> $tax_labels,
// 	'show_ui' 	    	=> true,
// 	'show_admin_column' => true,
// 	'has_archive'		=> false,
// 	'query_var'	    	=> true,
// 	'show_in_rest'		=> true,
// 	'rewrite'			=> true,
// ];
// register_taxonomy( 'language', 'Mockup', $tax_args );