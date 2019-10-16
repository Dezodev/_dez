<?php
/*
 *  Author: DezoDev | @dezodev
 *  URL: http://dezodev.tk/
 */

/* Theme Support
**=====================================*/

if (!isset($content_width)) {
	$content_width = 900;
}

function dezo_setup() {
	if (function_exists('add_theme_support')) {
		// Add Menu Support
		add_theme_support('menus');

		// Add title support
		add_theme_support('title-tag');

		// Add Thumbnail Theme Support
		add_theme_support('post-thumbnails');
		add_image_size('cover', 1500, 600, true); // Cover
		add_image_size('xlarge', 1000, 429, true); // XLarge Thumbnail - 21:9
		add_image_size('large', 750, 322, true); // Large Thumbnail - 21:9
		add_image_size('large-169', 750, 421, true); // Large Thumbnail - 16:9
		add_image_size('medium', 250, 188, true); // Medium Thumbnail - 4:3
		add_image_size('small', 150, 150, true); // Small Thumbnail - 1:1

		// Site header image
		add_theme_support('custom-header', [
			'width'         => 1500,
			'height'        => 600,
			'default-image' => get_template_directory_uri() . '/images/header.jpg',
			'uploads'       => true,
			'flex-width' => false,
			'flex-height' => false,
		]);

		// Comments
		add_theme_support('html5', ['comment-list']);

		// Custom logo
		add_theme_support('custom-logo', array(
			'height'      => 70,
			'width'       => 300,
			'flex-width' => true,
		));

		// Localisation Support
		load_theme_textdomain('dez-starter', get_template_directory() . '/languages');
	}
}
add_action( 'after_setup_theme', 'dezo_setup' );

/* Scripts & styles
**=====================================*/

function theme_scripts() {
	$templ_dir = get_bloginfo('template_url');
	$templ_ver = '0.0.1';

	/* -- CSS -- */
	$css_includes = [
		[
			'name'          => 'dez-theme-style',
			'url'           => $templ_dir. '/dist/css/main.min.css',
			'dependencies'  => false,
			'version'       => time(),
			'media'         => 'all'
		],
	];

	foreach ($css_includes as $css_include) {
		wp_register_style( $css_include['name'], $css_include['url'], $css_include['dependencies'], $css_include['version'], $css_include['media'] );
		wp_enqueue_style( $css_include['name'] );
	}

	/* -- JS -- */
	$js_includes = [
		[
			'name'          => 'dez-theme-script',
			'url'           => $templ_dir.'/dist/js/main.min.js',
			'dependencies'  => array(),
			'version'       => time(),
			'inFooter'      => true
		],
		[
			'name'          => 'dez-font-awesome',
			'url'           => 'https://kit.fontawesome.com/e6cf48bc6b.js',
			'dependencies'  => array(),
			'version'       => time(),
			'inFooter'      => false
		],
	];

	foreach ($js_includes as $js_include) {
		wp_register_script( $js_include['name'], $js_include['url'], $js_include['dependencies'], $js_include['version'], $js_include['inFooter'] );
		wp_enqueue_script( $js_include['name'] );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

/* Navigation
**=====================================*/

function require_menu_walker () {
	if ( !file_exists(get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php') ) {
		// file does not exist... return an error.
		return new WP_Error(
			'class-wp-bootstrap-navwalker-missing',
			__( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' )
		);
	} else {
		// file exists... require it.
		require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
	}
}
add_action('after_setup_theme', 'require_menu_walker');

function register_site_menu() {
	register_nav_menus(array(
		'header-menu' => 'Menu principal', // Main Navigation
		'footer-menu' => 'Menu en pied de page', // Main Navigation
	));
}
add_action('init', 'register_site_menu');

function dezo_nav ($location) {
	if (empty($location)) return false;
	$args = [];

	switch ($location) {
		case 'header-menu':
			$args = [
				'theme_location'  => $location,
				'container'       => 'ul',
				'depth'           => 2, // 1 = no dropdowns, 3 = with dropdowns.
				'container_id'    => 'bs-example-navbar-collapse-1',
				'menu_class'      => 'navbar-nav mr-auto',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker()
			];
			break;
		case "footer-menu":
			$args = [
				'theme_location'	=> $location,
				'container'			=> 'ul',
				'depth'				=> 1,
				'menu_class'		=> 'list-inline mb-0',
				'add_li_class'		=> 'list-inline-item',
			];
			break;
	}

	wp_nav_menu($args);
}

function add_additional_class_on_li($classes, $item, $args) {
	if($args->add_li_class) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/* Sidebar
**=====================================*/

function register_theme_sidebar() {
	register_sidebar([
		'id' => 'footer-sidebar',
		'name' => 'Footer',
		'before_widget' => '<div class="footer-widget col-12 col-sm-6 col-md %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<p class="footer-widget-title">',
		'after_title' => '</p>',
	]);
}
add_action('init', 'register_theme_sidebar');
