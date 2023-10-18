<?php
// Custom blocks added via ACF

if( function_exists('acf_register_block_type') ) :
	require 'custom-blocks-render.php'; // pass-off to let Timber render the blocks

	// image left and text right (schools and parishes primarily)
	$header_block = [
		'name' => 'header-block',
		'title' => __( 'Page Header', 'srs' ),
		'description' => __( 'Default, sitewide header block.', 'srs' ),
		'render_callback' => 'custom_blocks_callback',
		'category' => 'srs-blocks',
		'align' => 'wide',
		'icon' => 'info',
		'mode' => 'auto',  
		'supports' => [ 'mode' => true ],
		'keywords' => [ 'hero', 'header' ]
	];
	acf_register_block_type( $header_block );

	$text_block = [
		'name' => 'text-block',
		'title' => __( 'Text Block', 'srs' ),
		'description' => __( 'Text block with optional small header, large header, and paragraph content.', 'srs' ),
		'render_callback' => 'custom_blocks_callback',
		'category' => 'srs-blocks',
		'align' => 'wide',
		'icon' => 'info',
		'mode' => 'auto',  
		'supports' => [ 'mode' => true ],
		'keywords' => [ 'text', 'block', 'content', 'paragraph', 'small', 'large' ]
	];
	acf_register_block_type( $text_block );
endif;