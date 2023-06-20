<?php
// Template Name: Policies Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;
$templates = ['pages/policies.twig'];
Timber::render( $templates, $context );