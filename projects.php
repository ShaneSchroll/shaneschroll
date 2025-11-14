<?php
// Template Name: Projects Template
$context = Timber::context();
$post = Timber::get_post();
$context['post'] = $post;

$context['projects'] = Timber::get_posts([
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'oprderby'       => 'date',
    'order'          => 'DESC'
]);

$templates = ['pages/home.twig'];
Timber::render( $templates, $context );
