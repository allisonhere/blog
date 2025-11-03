<?php


/**
 * Post Color Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_colors_color_mode( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_color_mode', array(
		'title'    => esc_html__( 'Color Mode', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_color_settings',
	) );

	$wp_customize->add_setting( 'tfm_theme_color_scheme', array(
		'default'           => 'system',
		'sanitize_callback' => 'tfm_sanitize_radio',
	) );

	$wp_customize->add_control( 'tfm_theme_color_scheme', array(
		'label'       => esc_html__( 'Color Scheme', 'mozda' ),
		'section'     => 'tfm_color_mode',
		'type'        => 'radio',
		'choices'     => array(
			'system' => esc_html__( 'System Preference', 'mozda' ),
			'dark' => esc_html__( 'Dark', 'mozda' ),
			'light' => esc_html__( 'Light', 'mozda' ),
		),
	) );


	$wp_customize->add_setting( 'tfm_toggle_color_mode', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_toggle_color_mode', array(
		'label'       => esc_html__( 'Show Color Mode Toggle', 'mozda' ),
		'section'     => 'tfm_color_mode',
		'type'        => 'checkbox',
	) );

}

add_action( 'customize_register', 'tfm_customize_register_colors_color_mode' );