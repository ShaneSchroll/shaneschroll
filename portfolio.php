<?php
// Template Name: Portfolio Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$templates = ['portfolio.twig'];
Timber::render( $templates, $context );