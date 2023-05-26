<?php
// Template Name: Home Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$templates = ['home.twig'];
Timber::render( $templates, $context );