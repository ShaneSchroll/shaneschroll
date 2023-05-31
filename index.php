<?php
// load the core Timber Library context array (helper functions)
$context = Timber::get_context();

// assign posts to the context so that were are "always in the loop" in our twig files
// allows use of $post in our twig files
$context['posts'] = Timber::get_posts();

// name our template, this can be multiple templates and are typically the same name as the PHP file they relate to
$templates = ['index.twig'];

// Render different things here. A template file and the Timber $context array are always required.
Timber::render( $templates, $context );