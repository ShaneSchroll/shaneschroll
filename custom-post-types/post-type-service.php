<?php

$labels = [
	'name'               => __( 'Services', 'rscr' ),
	'singular_name'      => __( 'Service', 'rscr' ),
	'add_new'            => _x( 'Add Service', 'rscr', ),
	'add_new_item'       => __( 'Add Service', 'rscr' ),
	'edit_item'          => __( 'Edit Service', 'rscr' ),
	'new_item'           => __( 'New Service', 'rscr' ),
	'view_item'          => __( 'View Service', 'rscr' ),
	'search_items'       => __( 'Search Services', 'rscr' ),
	'not_found'          => __( 'No Services found', 'rscr' ),
	'not_found_in_trash' => __( 'No Services found in Trash', 'rscr' ),
	'parent_item_colon'  => __( 'Parent Service:', 'rscr' ),
	'menu_name'          => __( 'Services', 'rscr' ),
];

$args = [
	'labels'              => $labels,
	'hierarchical'        => true,
	'description'         => '',
	'taxonomies'          => [ 'service-type' ],
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'show_in_rest'		  => true,
	'menu_icon'           => 'dashicons-image-filter',
	'show_in_nav_menus'   => false,
	'publicly_queryable'  => true,
	'exclude_from_search' => false,
	'has_archive'         => false,
	'query_var'           => true,
	'can_export'          => true,
	'rewrite'             => true,
	'capability_type'     => 'post',
	'supports'            => [ 'title', 'thumbnail', 'excerpt' ],
];
register_post_type( 'service', $args );


$tax_labels = [
	'name' 				=> _x( 'Service Types', 'rscr' ),
	'singular_name' 	=> _x( 'Service Type', 'rscr' ),
	'search_items' 		=> __( 'Search Service Types', 'rscr' ),
	'all_items' 		=> __( 'All Service Types', 'rscr' ),
	'edit_item' 		=> __( 'Edit Service Type', 'rscr' ),
	'update_item' 		=> __( 'Update Service Type', 'rscr' ),
	'add_new_item' 		=> __( 'Add Service Type', 'rscr' ),
	'new_item_name' 	=> __( 'Create Service Type', 'rscr' ),
	'menu_name' 		=> __( 'Service Types', 'rscr' ),
	'parent_item'		=> NULL,
];

$tax_args = [
	'hierarchical' 	    => true,
	'labels' 	    	=> $tax_labels,
	'show_ui' 	    	=> true,
	'show_admin_column' => true,
	'has_archive'		=> false,
	'query_var'	    	=> true,
	'show_in_rest'		=> true,
	'rewrite'			=> true,
];
register_taxonomy( 'service-type', 'service', $tax_args );