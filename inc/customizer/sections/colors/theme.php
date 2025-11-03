<?php


/**
 * Theme Color Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_colors_theme( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_theme_colors', array(
		'title'    => esc_html__( 'Theme Color Scheme', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_color_settings',
	) );

	// Theme colour scheme
	$wp_customize->add_setting( 'tfm_primary_theme_color', array(
		'default'           => $customizer_settings['primary_theme_color'],
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_primary_theme_color', array(
      'section' => 'tfm_theme_colors',
      'label'   => esc_html__( 'Primary Theme Color', 'mozda' ),
    ) ) );


	if ( array_key_exists('secondary_theme_color', $customizer_settings)) {

	    $wp_customize->add_setting( 'tfm_secondary_theme_color', array(
			'default'           => $customizer_settings['secondary_theme_color'],
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_secondary_theme_color', array(
	      'section' => 'tfm_theme_colors',
	      'label'   => esc_html__( 'Secondary Theme Color', 'mozda' ),
	    ) ) );

	}

	if ( array_key_exists('tertiary_theme_color', $customizer_settings)) {
		
	    $wp_customize->add_setting( 'tfm_tertiary_theme_color', array(
			'default'           => $customizer_settings['tertiary_theme_color'],
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_tertiary_theme_color', array(
	      'section' => 'tfm_theme_colors',
	      'label'   => esc_html__( 'Tertiary Theme Color', 'mozda' ),
	    ) ) );

	}

    // ========================================================
	// Global Font and Link Colors
	// ========================================================

	 // Add Setting
	$wp_customize->add_setting( 'tfm_body_font_color', array(
		'default'           => '#131315',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_body_font_color', array(
      'section' => 'tfm_theme_colors',
      'label'   => esc_html__( 'Body Font Color', 'mozda' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'tfm_link_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_link_color', array(
      'section' => 'tfm_theme_colors',
      'label'   => esc_html__( 'Body Link Color', 'mozda' ),
    ) ) );

    $wp_customize->add_setting( 'tfm_link_hover_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_link_hover_color', array(
      'section' => 'tfm_theme_colors',
      'label'   => esc_html__( 'Body Link Hover Color', 'mozda' ),
    ) ) );

	$wp_customize->add_setting( 'tfm_button_background', array(
		'default'           => $customizer_settings['primary_theme_color'],
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_button_background', array(
      'section' => 'tfm_theme_colors',
      'label'   => esc_html__( 'Button Background', 'mozda' ),
    ) ) );

	$wp_customize->add_setting( 'tfm_button_color', array(
		'default'           => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_button_color', array(
      'section' => 'tfm_theme_colors',
      'label'   => esc_html__( 'Button Color', 'mozda' ),
    ) ) );

    $wp_customize->add_setting( 'tfm_button_hover_background', array(
		'default'           => $customizer_settings['primary_theme_color'],
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_button_hover_background', array(
      'section' => 'tfm_theme_colors',
      'label'   => esc_html__( 'Button Hover Background', 'mozda' ),
    ) ) );

	$wp_customize->add_setting( 'tfm_button_hover_color', array(
		'default'           => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_button_hover_color', array(
      'section' => 'tfm_theme_colors',
      'label'   => esc_html__( 'Button Hover Color', 'mozda' ),
    ) ) );

}

add_action( 'customize_register', 'tfm_customize_register_colors_theme' );