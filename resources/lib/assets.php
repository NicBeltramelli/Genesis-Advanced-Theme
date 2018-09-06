<?php
/**
 * Genesis Advanced
 *
 * This file enqueues assets.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0+
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue assets
 *
 * @since 2.6.0.1
 */
add_action('wp_enqueue_scripts', function () {

	// Enqueue Google Fonts.
	wp_enqueue_style(
		'genesis-advanced-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
		[],
		CHILD_THEME_VERSION
	);

	// Enqueue Dashicons.
	wp_enqueue_style( 'dashicons' );

	// Enqueue main style.
	wp_enqueue_style(
		'genesis-advanced-styles',
		genesis_advanced_asset_path( 'styles/main.css' ),
		false,
		null
	);

	// Enqueue main script.
	wp_enqueue_script(
		'genesis-advanced-scripts',
		genesis_advanced_asset_path( 'scripts/main.js' ),
		[ 'jquery' ],
		null,
		true
	);

	// Enqueue comment reply js.
	if (
		is_single() &&
		comments_open() &&
		get_option( 'thread_comments' ) ) {

			wp_enqueue_script( 'comment-reply' );
	}

	// Localize Genesis Responsive Menu.
	wp_localize_script(
		'genesis-advanced-scripts',
		'genesis_responsive_menu',
		genesis_advanced_responsive_menu_settings()
	);

}, 100 );