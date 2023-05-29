<?php
// Template Name: Tech-Stack Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$templates = ['pages/tech-stack.twig'];
Timber::render( $templates, $context );