<?php
// Template Name: Default Template
$context = Timber::context();
$post = Timber::get_post();
$context['post'] = $post;
$templates = ['page.twig'];
Timber::render( $templates, $context );
