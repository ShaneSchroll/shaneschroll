<?php
// Template Name: Past Work Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$templates = ['past-work.twig'];
Timber::render( $templates, $context );