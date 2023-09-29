<?php
// Custom blocks added via ACF

if( function_exists('acf_register_block_type') ) :
	include 'custom-blocks-callback.php'; // pass-off to let Timber render the blocks

	// image left and text right (schools and parishes primarily)
	$header_block = [
		'name' => 'ps-header-block',
		'title' => __( 'Image / Text Header', 'srs' ),
		'description' => __( 'Creates a hero image on the left with text content to the right.', 'srs' ),
		'render_callback' => 'acf_custom_blocks_callback',
		'category' => 'srs-blocks',
		'align' => 'wide',
		'icon' => 'info',
		'mode' => 'auto',
		'supports' => [ 'mode' => true ],
		'keywords' => [ 'hero', 'header' ]
	];
	acf_register_block_type( $header_block );
endif;