<?php
$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
$templates = ['index.twig'];
Timber::render( $templates, $context );