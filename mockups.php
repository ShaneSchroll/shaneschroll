<?php
// Template Name: Mockups Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;
$templates = ['pages/mockups.twig'];
Timber::render( $templates, $context );