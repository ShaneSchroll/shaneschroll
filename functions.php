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

		// Filter Hooks //
		add_filter( 'timber_context', [ $this, 'add_to_context' ] );
		add_filter( 'manage_pages_columns', [ $this, 'remove_pages_count_columns' ] );

		parent::__construct();
	}

	// hide nags and unused items
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
			.hide-if-no-customize { display: none !important; }

			.edit-post-fullscreen-mode-close.components-button {
				background-color: #fff;
				border-bottom: 1px solid #e0e0e0;
				border-right: 1px solid #e0e0e0;
			}

			.edit-post-fullscreen-mode-close.components-button:before {
				box-shadow: unset !important;
			}
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
				background-image: url('<?= get_stylesheet_directory_uri() . '/assets/media/logo.svg' ?>') !important;
				background-position: center;
				width: 17rem;
				background-size: cover;
			}

			#backtoblog { display: none !important; }
			.privacy-policy-page-link { display: none !important; }
			p#nav { display: none !important; }
		</style>
		<?php
	}

	// enqueue styles & scripts
	function enqueue_scripts() {
		$version = filemtime( get_stylesheet_directory() . '/style.css' );
		wp_enqueue_style( 'rscr-css', get_stylesheet_directory_uri() . '/style.css', [], $version );
		wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/packages/aos.js', [], '2.3.4' );
		wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/packages/swiper.js', [], '9.2.3' );
		wp_enqueue_script( 'rscr-js', get_template_directory_uri() . '/assets/js/site-dist.js', ['jquery', 'aos', 'swiper'], $version );
	}

	// custom context helper functions
	function add_to_context( $context ) {
		$context['site']           	= $this;
		$context['date'] 			= date('F j, Y');
		$context['date_year']      	= date('Y');
		$context['options'] 		= get_fields('option');
		$context['is_front_page']	= is_front_page();
		return $context;
	}

	// theme support and options page
	function after_setup_theme() {
		add_theme_support( 'disable-custom-colors' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style.css' );

		if( function_exists( 'acf_add_options_page' ) ) {
			acf_add_options_page([
				'page_title'  => __('Notice Banner Settings'),
				'menu_title'  => __('Notice Banner'),
				'position' => 2,
				'capability'  => 'edit_posts',
				'redirect'    => false,
				'icon_url' 	  => 'dashicons-database-add'
			]);
		}
	}

	// include registered post types
	function register_post_types() {
		include_once('custom-post-types/post-type-document.php');
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