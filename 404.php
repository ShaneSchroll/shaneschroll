<?php
$context = Timber::get_context();
$post = Timber::get_post();
$context['post'] = $post;
$templates = ['404.twig'];
Timber::render( $templates, $context );