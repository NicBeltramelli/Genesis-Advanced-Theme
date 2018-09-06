<?php
/**
 * Genesis Advanced
 *
 * This file adds the content setting.
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
 * Modify the size of the Gravatar in the author box
 *
 * @since 2.2.3
 *
 * @param int $size Original icon size.
 * @return int Modified icon size.
 */
add_filter( 'genesis_author_box_gravatar_size', function ( $size ) {

	return 90;

} );

/**
 * Modify the size of the Gravatar in the entry comments
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 * @return array Gravatar settings with modified size.
 */
add_filter( 'genesis_comment_list_args', function ( $args ) {

	$args['avatar_size'] = 60;
	return $args;

} );