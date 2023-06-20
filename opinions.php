<?php
// Template Name: Opinions Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;
$templates = ['pages/opinions.twig'];
Timber::render( $templates, $context );