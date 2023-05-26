<?php
// Template Name: Applications Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$templates = ['sections/applications.twig'];
Timber::render( $templates, $context );