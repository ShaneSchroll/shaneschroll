<?php
/**
 * Load Timber
 * Initialize Timber
 * Set the directory Twig loads from
*/
require_once(__DIR__ . '/vendor/autoload.php');
Timber\Timber::init();
Timber::$locations = __DIR__ . '/templates';

// Extends the Core Site class from Timber with a custom class
class ShaneSchrollSite extends Timber\Site {

	function __construct() {
		// Action Hooks //
		add_action( 'init', [ $this, 'register_post_types' ] );
		add_action( 'after_setup_theme', [ $this, 'after_setup_theme' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'admin_head', [ $this, 'admin_head_css' ] );
		add_action( 'admin_menu', [ $this, 'admin_menu_cleanup'] );
		add_action( 'wp_default_scripts', [ $this, 'remove_jqmigrate' ] );

        // Disable RSS Feeds //
        add_action('do_feed', [ $this, 'disable_rss_feeds' ], 1 );
        add_action('do_feed_rdf', [ $this, 'disable_rss_feeds' ], 1 );
        add_action('do_feed_rss', [ $this, 'disable_rss_feeds' ], 1 );
        add_action('do_feed_rss2', [ $this, 'disable_rss_feeds' ], 1 );
        add_action('do_feed_atom', [ $this, 'disable_rss_feeds' ], 1 );
        add_action('do_feed_rss2_comments', [ $this, 'disable_rss_feeds' ], 1 );
        add_action('do_feed_atom_comments', [ $this, 'disable_rss_feeds' ], 1 );

        // Remove Actions //
        remove_action('wp_head', [ $this, 'feed_links' ], 2 );
        remove_action('wp_head', [ $this, 'feed_links_extra' ], 3 );

		// Filter Hooks //
		add_filter( 'timber/context', [ $this, 'add_to_context' ] );
		add_filter( 'manage_pages_columns', [ $this, 'remove_pages_count_columns' ] );

		parent::__construct();
	}

    // Disable RSS Feeds (not used)
    function disable_rss_feeds() {
        wp_die( __( 'Feeds not available.' ) );
    }

	// hide nags and cleanup admin bar
	function admin_head_css() {
		?>
		<style type="text/css">
			.update-nag,
			#wp-admin-bar-comments,
			#wp-admin-bar-updates,
			#wp-admin-bar-new-content #comments,
            .column-comments, .notice, .notice-info,
            .welcome-panel { display: none !important; }
		</style>
        <?php
	}

	// enqueue styles & scripts
	function enqueue_scripts() {
		$version = filemtime( get_stylesheet_directory() . '/style.css' );
		wp_enqueue_style( 'srs-css', get_stylesheet_directory_uri() . '/style.css', [], $version );
        wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/aos-dist.js', [], $version );
        wp_enqueue_script( 'srs-js', get_template_directory_uri() . '/assets/js/site-dist.js', ['jquery', 'aos'], $version );

        // remove inline wp styles from frontend
        if ( ! is_admin() ) {
            wp_dequeue_style( 'global-styles' );
        }
	}

	// remove jqmigrate from frontend
	function remove_jqmigrate( $scripts ) {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];

			if ( $script->deps ) {
				$script->deps = array_diff( $script->deps, ['jquery-migrate'] );
			}
		}
	}

	// custom context helper functions
	function add_to_context( $context ) {
		$context['site']           	= $this;
		$context['date_year']      	= date('Y');
		$context['is_front_page']	= is_front_page();
        $context['options']         = get_fields('option');
        $context['get_url']         = $_SERVER['REQUEST_URI'];

		return $context;
	}

	// theme support and options page
	function after_setup_theme() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'disable-custom-colors' );

        if (function_exists('acf_add_options_page')) {
            $parent = acf_add_options_page([
				'page_title' => 'Site Options',
                'menu_title' => 'Site Options',
                'menu_slug'  => 'site-options',
                'capability' => 'edit_posts',
                'redirect'   => false
			]);

            // Menus
			$child = acf_add_options_sub_page([
				'page_title'  => __('Navigation'),
				'menu_title'  => __('Navigation'),
				'parent_slug' => $parent['menu_slug'],
			]);
        }
	}

	// add custom post types
	function register_post_types() {
        include_once( 'custom-post-types/post-type-project.php' );
	}

	// remove unused items from admin menu
	function admin_menu_cleanup() {
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );
	}

	// removed comment column from posts pages
	function remove_pages_count_columns( $defaults ) {
		unset($defaults['comments']);
		return $defaults;
	}
}

// create a new instance of our site class
new ShaneSchrollSite();

// move ACF Options Page below the Dashboard tab
function custom_menu_order( $menu_ord ) {
	if( ! $menu_ord ) { return true; }
	$menu = 'site-options';
	$menu_ord = array_diff( $menu_ord, [$menu] );
	array_splice( $menu_ord, 1, 0, [$menu] );
	return $menu_ord;
}
add_filter( 'custom_menu_order', 'custom_menu_order' );
add_filter( 'menu_order', 'custom_menu_order' );
