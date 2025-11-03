<?php


/**
 * Header Color Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_colors_header( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_header_colors', array(
		'title'    => esc_html__( 'Header Colors', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_color_settings',
	) );

	// Add Setting
	$wp_customize->add_setting( 'tfm_header_background_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_background_color', array(
      'section' => 'tfm_header_colors',
      'label'   => esc_html__( 'Header Background', 'mozda' ),
    ) ) );

	// Add Setting
	$wp_customize->add_setting( 'tfm_header_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_color', array(
      'section' => 'tfm_header_colors',
      'label'   => esc_html__( 'Header Color', 'mozda' ),
      'description' => esc_html__( 'Menus and Icons', 'mozda'),
    ) ) );

	    // Add Setting
	$wp_customize->add_setting( 'tfm_header_elements_background', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_elements_background', array(
      'section' => 'tfm_header_colors',
      'label'   => esc_html__( 'Header Elements Background', 'mozda' ),
    ) ) );

	    // Add Setting
	$wp_customize->add_setting( 'tfm_header_elements_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_elements_color', array(
      'section' => 'tfm_header_colors',
      'label'   => esc_html__( 'Header Elements Color', 'mozda' ),
    ) ) );


}

add_action( 'customize_register', 'tfm_customize_register_colors_header' );