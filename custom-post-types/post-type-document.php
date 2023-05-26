<?php
// https://developer.wordpress.org/reference/functions/register_post_type
$labels = [
	'name'               => __( 'Documents', 'rscr' ),
	'singular_name'      => __( 'Document', 'rscr' ),
	'add_new'            => _x( 'Add Document', 'rscr', 'rscr' ),
	'add_new_item'       => __( 'Add Document', 'rscr' ),
	'edit_item'          => __( 'Edit Document', 'rscr' ),
	'new_item'           => __( 'New Document', 'rscr' ),
	'view_item'          => __( 'View Document', 'rscr' ),
	'search_items'       => __( 'Search Documents', 'rscr' ),
	'not_found'          => __( 'No Documents found', 'rscr' ),
	'not_found_in_trash' => __( 'No Documents found in Trash', 'rscr' ),
	'parent_item_colon'  => __( 'Parent Employee:', 'rscr' ),
	'menu_name'          => __( 'Documents', 'rscr' ),
];

$args = [
	'labels'              => $labels,
	'hierarchical'        => true,
	'description'         => '',
	'taxonomies'          => ['document-tax'],
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_admin_bar'   => true,
	'show_in_rest'		  => true,
	'menu_icon'           => 'dashicons-pdf',
	'show_in_nav_menus'   => false,
	'publicly_queryable'  => true,
	'exclude_from_search' => false,
	'has_archive'         => false,
	'query_var'           => true,
	'can_export'          => true,
	'rewrite'             => true,
	'capability_type'     => 'post',
	'supports'            => ['title'],
];
register_post_type( 'document', $args );

// https://developer.wordpress.org/reference/functions/register_taxonomy
$tax_labels = [
	'name' 				=> _x( 'Document Taxonomies', 'rscr' ),
	'singular_name' 	=> _x( 'Document Taxonomy', 'rscr' ),
	'search_items' 		=> __( 'Search Document Taxonomies', 'rscr' ),
	'all_items' 		=> __( 'All Document Taxonomies', 'rscr' ),
	'edit_item' 		=> __( 'Edit Document Taxonomy', 'rscr' ),
	'update_item' 		=> __( 'Update Document Taxonomy', 'rscr' ),
	'add_new_item' 		=> __( 'Add Document Taxonomy', 'rscr' ),
	'new_item_name' 	=> __( 'Create Document Taxonomy', 'rscr' ),
	'menu_name' 		=> __( 'Document Taxonomies', 'rscr' ),
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
	'rewrite'			=> false,
];
register_taxonomy( 'document-tax', ['document'], $tax_args );