<?php


/**
 * Light color settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_dark_theme_colors( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$scheme = '_dark';

	$wp_customize->add_section( 'tfm_theme_colors' . $scheme, array(
		'title'    => esc_html__( 'Dark Theme', 'mozda' ),
		'priority' => 140,
		'panel' => 'tfm_color_settings',
	) );

	// ========================================================
	// Include scheme file
	// ========================================================

	require( get_template_directory() . '/inc/customizer/sections/colors/scheme.php' );
}

add_action( 'customize_register', 'tfm_customize_register_dark_theme_colors' );