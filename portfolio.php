<?php
// Template Name: Portfolio Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$context['portfolio'] = Timber::get_posts([
    'post_type' => 'portfolio',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
]);

$templates = ['pages/portfolio.twig'];
Timber::render( $templates, $context );