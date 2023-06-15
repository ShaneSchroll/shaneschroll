<?php
// Template Name: About Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

// get employees
$context['employees'] = Timber::get_posts([
	'post_type' => 'employee',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
	'facetwp' => true,
]);

$templates = ['pages/about.twig'];
Timber::render( $templates, $context );