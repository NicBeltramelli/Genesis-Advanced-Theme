<?php
/**
 * Genesis Advanced
 *
 * This file adds the search template.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Remove the default archive title */
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );

/* Add custom search result title */
add_action(
	'genesis_before_loop',
	function () {

		echo '<div class="archive-description">';
		echo '<h1 class="archive-title">' . esc_html__( 'Search Results:', 'genesis-advanced' ) . '</h1>';
		echo '</div>';
	}
);

genesis();
