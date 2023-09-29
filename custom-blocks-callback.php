<?php
/**
*  Callback to render our ACF blocks
*
* @param   array $block - The block settings and attributes.
* @param   string $content - The block content (empty string).
* @param   bool $is_preview - True during AJAX preview.
*/

function acf_custom_blocks_callback( $block, $content = '', $is_preview = false ) {
	$context = Timber::get_context();

	$context['block'] = $block;
	$context['fields'] = get_fields();
	$context['is_preview'] = $is_preview;

	$template = 'templates/components/' . $block['name'] . '.twig';
	Timber::render( $template, $context );
}