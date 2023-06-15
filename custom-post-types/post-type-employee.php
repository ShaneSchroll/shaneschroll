<?php

$labels = [
	'name'               => __( 'Employees', 'rscr' ),
	'singular_name'      => __( 'Employee', 'rscr' ),
	'add_new'            => _x( 'Add Employee', 'rscr', ),
	'add_new_item'       => __( 'Add Employee', 'rscr' ),
	'edit_item'          => __( 'Edit Employee', 'rscr' ),
	'new_item'           => __( 'New Employee', 'rscr' ),
	'view_item'          => __( 'View Employee', 'rscr' ),
	'search_items'       => __( 'Search Employee', 'rscr' ),
	'not_found'          => __( 'No Employees found', 'rscr' ),
	'not_found_in_trash' => __( 'No Employees found in Trash', 'rscr' ),
	'parent_item_colon'  => __( 'Parent Employee:', 'rscr' ),
	'menu_name'          => __( 'Employees', 'rscr' ),
];

$args = [
	'labels'              => $labels,
	'hierarchical'        => true,
	'description'         => '',
	'taxonomies'          => [ 'department' ],
	'public'              => false,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'show_in_rest'		  => false,
	'menu_icon'           => 'dashicons-businessman',
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
register_post_type( 'employee', $args );

$tax_labels = [
	'name' 				=> _x( 'Departments', 'rscr' ),
	'singular_name' 	=> _x( 'Department', 'rscr' ),
	'search_items' 		=> __( 'Search Departments', 'rscr' ),
	'all_items' 		=> __( 'All Departments', 'rscr' ),
	'edit_item' 		=> __( 'Edit Department', 'rscr' ),
	'update_item' 		=> __( 'Update Department', 'rscr' ),
	'add_new_item' 		=> __( 'Add Department', 'rscr' ),
	'new_item_name' 	=> __( 'Create Department', 'rscr' ),
	'menu_name' 		=> __( 'Departments', 'rscr' ),
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
register_taxonomy( 'department', 'employee', $tax_args );