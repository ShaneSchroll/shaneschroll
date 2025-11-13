<?php
$context = Timber::context();
$context['posts'] = Timber::get_posts();
$templates = ['index.twig'];
Timber::render( $templates, $context );
