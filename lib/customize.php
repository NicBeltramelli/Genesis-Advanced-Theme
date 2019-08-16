<?php
/**
 * Genesis Advanced
 *
 * This file adds the Customizer additions.
 *
 * @package Genesis Advanced
 * @author  NicBeltramelli
 * @license GPL-2.0-or-later
 * @link    https://github.com/NicBeltramelli/genesis-advanced.git
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register settings and controls with the Customizer
 *
 * @since 3.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
add_action(
	'customize_register',
	function ( $wp_customize ) {

		/* Link color addition */
		$wp_customize->add_setting(
			'genesis_advanced_link_color',
			[
				'default'           => genesis_advanced_customizer_get_default_link_color(),
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'genesis_advanced_link_color',
				[
					'description' => __( 'Change the default color of post info links, the hover color of linked titles and menu items, and more.', 'genesis-advanced' ),
					'label'       => __( 'Link Color', 'genesis-advanced' ),
					'section'     => 'colors',
					'settings'    => 'genesis_advanced_link_color',
				]
			)
		);

		/* Accent color addition */
		$wp_customize->add_setting(
			'genesis_advanced_accent_color',
			[
				'default'           => genesis_advanced_customizer_get_default_accent_color(),
				'sanitize_callback' => 'sanitize_hex_color',
			]
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'genesis_advanced_accent_color',
				[
					'description' => __( 'Change the default hovers color for buttons.', 'genesis-advanced' ),
					'label'       => __( 'Accent Color', 'genesis-advanced' ),
					'section'     => 'colors',
					'settings'    => 'genesis_advanced_accent_color',
				]
			)
		);

		/* Logo width addition */
		$wp_customize->add_setting(
			'genesis_advanced_logo_width',
			[
				'default'           => 350,
				'sanitize_callback' => 'absint',
			]
		);

		$wp_customize->add_control(
			'genesis_advanced_logo_width',
			[
				'label'       => __( 'Logo Width', 'genesis-advanced' ),
				'description' => __( 'The maximum width of the logo in pixels.', 'genesis-advanced' ),
				'priority'    => 9,
				'section'     => 'title_tagline',
				'settings'    => 'genesis_advanced_logo_width',
				'type'        => 'number',
				'input_attrs' =>
				[
					'min' => 100,
				],

			]
		);

	}
);
