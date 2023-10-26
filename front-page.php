<?php
// Template Name: Home Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$context['portfolio'] = Timber::get_posts([
    'post_type' => 'portfolio',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'ASC'
]);

$templates = ['pages/home.twig'];
Timber::render( $templates, $context );