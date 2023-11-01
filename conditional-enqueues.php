<?php
/**
 * Conditionally load external libraries based on url
 * since the libraries are not needed sitewide.
 * 
 * New in PHP 8: str_contains() returns a boolean
*/

$current_url = $_SERVER['REQUEST_URI'];

switch (true) {

    // AOS Library - Animations Mockup
    case str_contains( $current_url, 'animations' ):
        // wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/assets/js/packages/aos.js', [], '3.0.0' );
        // wp_enqueue_script( 'aos-init', get_template_directory_uri() . '/assets/js/dist/aos-dist.js', ['aos-js'], $version );
        // wp_enqueue_style( 'aos-css', get_stylesheet_directory_uri() . '/assets/css/aos.css', [], '3.0.0' );
    break;

    // JustValidate Library - Forms Mockup
    case str_contains( $current_url, 'forms' ):
        wp_enqueue_script( 'validate-js', get_template_directory_uri() . '/assets/js/packages/validate.js', [], '4.2.0' );
        wp_enqueue_script( 'form-init', get_template_directory_uri() . '/assets/js/dist/form-dist.js', ['validate-js'], $version );
    break;

    // Datatables Library - Tables Mockup
    case str_contains( $current_url, 'tables' ):
        // wp_enqueue_script( 'dt-js', get_template_directory_uri() . '/assets/js/packages/datatables.js', [], '1.13.6' );
        // wp_enqueue_script( 'dt-init', get_template_directory_uri() . '/assets/js/dist/table-dist.js', ['dt-js'], $version );
        // wp_enqueue_style( 'dt-css', get_stylesheet_directory_uri() . '/assets/css/datatables.css', [], '1.13.6' );
    break;

    // Documentation Library - Help Docs Mockup
    case str_contains( $current_url, 'help-docs' ):
        // wp_enqueue_script( 'prism-js', get_template_directory_uri() . '/assets/js/packages/prism.js', [], '1.29.0' );
        // wp_enqueue_script( 'prism-init', get_template_directory_uri() . '/assets/js/dist/docs-dist.js', ['prism-js'], $version );
        // wp_enqueue_style( 'prism-css', get_stylesheet_directory_uri() . '/assets/css/prism.css', [], '1.29.0' );
    break;
}