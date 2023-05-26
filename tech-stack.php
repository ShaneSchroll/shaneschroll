<?php
// Template Name: Tech-Stack Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$templates = ['tech-stack.twig'];
Timber::render( $templates, $context );