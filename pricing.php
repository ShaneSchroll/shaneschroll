<?php
// Template Name: Pricing Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$templates = ['pages/pricing.twig'];
Timber::render( $templates, $context );