<?php
// Template Name: Employees Template
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;

$templates = ['sections/employees.twig'];
Timber::render( $templates, $context );