<?php
// Global Custom Post Type Controller
$context = Timber::context();
$post = Timber::get_post();
$context['post'] = $post;
the_post();

Timber::render([
    'singles/single-' . $post->post_type . '.twig',
    'single.twig'
], $context );
