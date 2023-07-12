<?php

$labels = [
	'name'               => __( 'Portfolios', 'rscr' ),
	'singular_name'      => __( 'Portfolio', 'rscr' ),
	'add_new'            => _x( 'Add Portfolio', 'rscr', ),
	'add_new_item'       => __( 'Add Portfolio', 'rscr' ),
	'edit_item'          => __( 'Edit Portfolio', 'rscr' ),
	'new_item'           => __( 'New Portfolio', 'rscr' ),
	'view_item'          => __( 'View Portfolio', 'rscr' ),
	'search_items'       => __( 'Search Portfolios', 'rscr' ),
	'not_found'          => __( 'No Portfolios found', 'rscr' ),
	'not_found_in_trash' => __( 'No Portfolios found in Trash', 'rscr' ),
	'parent_item_colon'  => __( 'Parent Portfolio:', 'rscr' ),
	'menu_name'          => __( 'Portfolios', 'rscr' ),
];

$args = [
	'labels'              => $labels,
	'hierarchical'        => false,
	'description'         => '',
	'taxonomies'          => [ 'language' ],
	'public'              => false,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'show_in_rest'		  => false,
	'menu_icon'           => 'dashicons-cover-image',
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
register_post_type( 'portfolio', $args );

$tax_labels = [
	'name' 				=> _x( 'Languages', 'rscr' ),
	'singular_name' 	=> _x( 'Language', 'rscr' ),
	'search_items' 		=> __( 'Search Languages', 'rscr' ),
	'all_items' 		=> __( 'All Languages', 'rscr' ),
	'edit_item' 		=> __( 'Edit Language', 'rscr' ),
	'update_item' 		=> __( 'Update Language', 'rscr' ),
	'add_new_item' 		=> __( 'Add Language', 'rscr' ),
	'new_item_name' 	=> __( 'Create Language', 'rscr' ),
	'menu_name' 		=> __( 'Languages', 'rscr' ),
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
register_taxonomy( 'language', 'portfolio', $tax_args );