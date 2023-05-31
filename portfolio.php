<?php
// Template Name: Portfolio Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

// $context['portfolio'] = Timber::get_posts([
//     'post_type' => 'portfolio',
//     'post_per_page' => -1,
//     'order' => 'ASC',
//     'orderby' => 'title',
// ]);

$templates = ['pages/portfolio.twig'];
Timber::render( $templates, $context );