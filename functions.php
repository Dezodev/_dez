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
	];

	foreach ($js_includes as $js_include) {
		wp_register_script( $js_include['name'], $js_include['url'], $js_include['dependencies'], $js_include['version'], $js_include['inFooter'] );
		wp_enqueue_script( $js_include['name'] );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );
