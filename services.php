<?php
// Template Name: Services Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;
$templates = ['pages/services.twig'];
Timber::render( $templates, $context );