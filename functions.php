<?php

// change 'views' directory to 'templates'
Timber::$locations = __DIR__ . '/templates';

class ShaneSchrollSite extends TimberSite {

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
			.hide-if-no-customize { display: none !important; }
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

			#backtoblog { display: none !important; }
			.privacy-policy-page-link { display: none !important; }
			p#nav { display: none !important; }
		</style>
		<?php
	}

	// enqueue styles & scripts
	function enqueue_scripts() {
		$version = filemtime( get_stylesheet_directory() . '/style.css' );
		wp_enqueue_style( 'srs-css', get_stylesheet_directory_uri() . '/style.css', [], $version );
		wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/aos.js', [], '3.0.0' );
		wp_enqueue_script( 'srs-js', get_template_directory_uri() . '/assets/js/aos-init.js', ['aos'], $version );

		// remove jquery from frontend
		if( ! is_admin() ) {
			wp_deregister_script( 'jquery');
		}
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
		return $context;
	}

	// theme support and options page
	function after_setup_theme() {
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'disable-custom-colors' );
	}

	function register_post_types() {
		include_once( 'custom-post-types/post-type-portfolio.php');
	}

	// remove unused items from admin menu
	function admin_menu_cleanup() {
		remove_menu_page( 'edit.php' ); // Default Posts
		remove_menu_page( 'edit-comments.php' ); // Comments
	}

	// removed comment column from posts pages
	function remove_pages_count_columns( $defaults ) {
		unset($defaults['comments']);
		return $defaults;
	}
}

new ShaneSchrollSite();