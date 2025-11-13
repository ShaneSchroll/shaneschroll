<?php
// Template Name: Clients & Partners Template
$context = Timber::context();
$post = Timber::get_post();
$context['post'] = $post;

$context['clients_and_partners'] = Timber::get_posts([
    'post_type'      => 'client',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'facetwp'        => true
]);

$templates = ['pages/clients-and-partners.twig'];
Timber::render( $templates, $context );
