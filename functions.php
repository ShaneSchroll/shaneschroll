<?php

/**
 * Load Timber
 * Initialize Timber
 * Set the directory Twig loads from
*/
require_once(__DIR__ . '/vendor/autoload.php');
Timber\Timber::init();
Timber::$locations = __DIR__ . '/templates';

// create a new site class and extend the Core Site class from Timber
class ShaneSchrollSite extends Timber\Site {

	function __construct() {
		// Action Hooks //
		add_action( 'init', [ $this, 'register_post_types' ] );
		add_action( 'after_setup_theme', [ $this, 'after_setup_theme' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'admin_head', [ $this, 'admin_head_css' ] );
		add_action( 'admin_menu', [ $this, 'admin_menu_cleanup'] );
		add_action( 'login_enqueue_scripts', [ $this, 'style_login' ] );
		add_action( 'wp_default_scripts', [ $this, 'remove_jqmigrate' ] );

		// Filter Hooks //
		add_filter( 'timber_context', [ $this, 'add_to_context' ] );
		add_filter( 'manage_pages_columns', [ $this, 'remove_pages_count_columns' ] );
		add_filter( 'admin_footer_text', [ $this, 'admin_footer_white_label' ] );

		parent::__construct();
	}

	// hide nags and cleanup admin bar
	function admin_head_css() {
		?>
		<style type="text/css">
			.update-nag,
			#wp-admin-bar-comments,
			#wp-admin-bar-updates,
			#wp-admin-bar-new-content
			#comments, .column-comments,
			#wp-admin-bar-new-content,
			#wp-admin-bar-rank-math,
			#adminmenu #collapse-menu,
			#adminmenu .update-plugins,
			.hide-if-no-customize,
			.wrap .frash-notice.notice { display: none !important; }
		</style>
		<?php
	}

	// WP admin login styles
	function style_login() {
		?>
		<style type="text/css">
			#login h1, .login h1 {
				background-color: transparent;
				padding: 0;
				border: unset;
			}

			#login h1 a, .login h1 a {
				background-image: url('<?= get_stylesheet_directory_uri() . '/screenshot.png' ?>') !important;
				background-position: center;
				width: 20rem;
				height: 10rem;
				background-size: cover;
			}

			#login-message.message { border-color: #F6BE00 !important; }

			#backtoblog,
			.privacy-policy-page-link,
			p#nav { display: none !important; }
		</style>
		<?php
	}

	// admin footer white label
	function admin_footer_white_label() {
		echo '
		<span id="footer-thankyou">Developed by
			<a href="https://github.com/shaneschroll" target="_blank" rel="noreferrer">Shane Schroll</a>.
		</span>';
	}

	// enqueue styles & scripts
	function enqueue_scripts() {
		$version = filemtime( get_stylesheet_directory() . '/style.css' );
        $current_url = $_SERVER['REQUEST_URI'];

		wp_enqueue_style( 'srs-css', get_stylesheet_directory_uri() . '/style.css', [], $version );
		wp_enqueue_script( 'srs-js', get_template_directory_uri() . '/assets/js/dist/site-dist.js', ['jquery'], $version );

        // remove inline wp styles from frontend
        if ( ! is_admin() ) {
            wp_dequeue_style( 'global-styles' );
        }

        // conditional loading for tables and docs
		include( 'conditional-enqueues.php' );
	}

	// remove jqmigrate from frontend
	function remove_jqmigrate( $scripts ) {
		if( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];

			if( $script->deps ) {
				$script->deps = array_diff( $script->deps, ['jquery-migrate'] );
			}
		}
	}

	// custom context helper functions
	function add_to_context( $context ) {
		$context['site']           	= $this;
		$context['date'] 			= date('F j, Y');
		$context['date_year']      	= date('Y');
		$context['is_front_page']	= is_front_page();
		$context['is_404'] 	    	= is_404();
        $context['options']         = get_fields('option');
        $context['get_url']         = $_SERVER['REQUEST_URI'];

		$context['mockups'] = Timber::get_posts([
			'post_type' => 'mockup',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC'
		]);

		return $context;
	}

	// theme support and options page
	function after_setup_theme() {
		add_theme_support( 'html5' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'disable-custom-colors' );

		// add options for sitewide settings
		if( function_exists( 'acf_add_options_page' ) ) {
			$parent = acf_add_options_page([
				'page_title'  => __('Theme Options'),
				'menu_title'  => __('Theme Options'),
				'capability'  => 'edit_posts',
				'redirect'    => false,
				'icon_url' 	  => 'dashicons-database-add'
			]);

            // Mockup Settings
			$child = acf_add_options_sub_page([
				'page_title'  => __('Mockup Settings'),
				'menu_title'  => __('Mockup Settings'),
				'parent_slug' => $parent['menu_slug'],
			]);

			// Footer Settings
			$child = acf_add_options_sub_page([
				'page_title'  => __('Footer Settings'),
				'menu_title'  => __('Footer Settings'),
				'parent_slug' => $parent['menu_slug'],
			]);
		}
	}

	// add custom post types
	function register_post_types() {
		include_once( 'custom-post-types/post-type-mockup.php' );
		include_once( 'custom-post-types/post-type-portfolio.php' );
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

// display my time (CST)
function display_cst_time() {
    $timezone = new DateTimeZone('America/Chicago');
    $date = new DateTime('now', $timezone);
    echo $date->format('g:i A');
}

// move our ACF Options Page below the Dashboard tab
function custom_menu_order( $menu_ord ) {
	if( ! $menu_ord ) {
		return true;
	}

	$menu = 'acf-options-theme-options';

	// remove from current menu
	$menu_ord = array_diff( $menu_ord, [$menu] );

	// append after index[0]
	array_splice( $menu_ord, 1, 0, [$menu] );

	return $menu_ord;
}
add_filter( 'custom_menu_order', 'custom_menu_order' );
add_filter( 'menu_order', 'custom_menu_order' );