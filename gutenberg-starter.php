<?php
/**
 * Plugin Name:       Gutenberg Starter
 * Description:       Starter extension for creating gutenberg based plugins.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Gutenberghub
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutenberg-starter
 *
 */

define( 'STARTER_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

add_action('init', function() {
    wp_register_script(
		"starter-plugin-script",
		STARTER_PLUGIN_URL . '/build/index.js',
		array(
			"wp-element",
			"wp-compose",
			"wp-hooks",
			"wp-block-editor",
			"wp-i18n"
		),
		'initial'
	);
	wp_register_style(
		'starter-plugin-editor-style',
		STARTER_PLUGIN_URL . '/build/index.css',
		array(),
		'initial'
	);

	wp_register_style(
		'starter-plugin-frontend-style',
		STARTER_PLUGIN_URL . '/build/style-index.css',
		array(),
		'initial'
	);
} );

add_action( 'enqueue_block_editor_assets', function () {
	wp_enqueue_script( 'starter-plugin-script' );
	wp_enqueue_style( 'starter-plugin-editor-style' );
} );

add_action( 'init', function () {
	if ( ! is_admin() ) {
		wp_enqueue_style( 'starter-plugin-frontend-style' );
	}
} );