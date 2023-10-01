<?php
// Template Name: Mockups Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$context['mockups'] = Timber::get_posts([
    'post_type' => 'mockup',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
]);

$templates = ['pages/mockups.twig'];
Timber::render( $templates, $context );