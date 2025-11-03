<?php


/**
 * Page Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_page( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_page_settings', array(
		'title'    => esc_html__( 'Page Settings', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_theme_settings',
	) );

	// Sidebar
	$wp_customize->add_setting( 'tfm_page_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_page_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar', 'mozda' ),
		'section'     => 'tfm_page_settings',
		'type'        => 'checkbox',
	) );

	// Sidebar position
	$wp_customize->add_setting( 'tfm_page_sidebar_position', array(
		'default'           => 'side',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_page_sidebar_position', array(
		'label'       => esc_html__( 'Sidebar Position', 'mozda' ),
		'section'     => 'tfm_page_settings',
		'type'        => 'radio',
		'choices'     => array(
			'side' => esc_html__( 'Side', 'mozda' ),
			'after' => esc_html__( 'After Header', 'mozda' ),
		),
	) );

	// Layout style
	$wp_customize->add_setting( 'tfm_page_style', array(
		'default'           => 'default',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_page_style', array(
		'label'       => esc_html__( 'Page Style', 'mozda' ),
		'section'     => 'tfm_page_settings',
		'type'        => 'select',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'mozda' ),
			'default-alt' => esc_html__( 'Default Alt.', 'mozda' ),
			'cover' => esc_html__( 'Cover', 'mozda' ),
		),
	) );

	// Image aspect ratio
	$wp_customize->add_setting( 'tfm_page_thumbnail_aspect_ratio', array(
		'default'           => 'hero',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_page_thumbnail_aspect_ratio', array(
		'label'       => esc_html__( 'Thumbnail Aspect Ratio', 'mozda' ),
		'section'     => 'tfm_page_settings',
		'type'        => 'select',
		'choices'     => array(
			'wide' => esc_html__( 'Wide', 'mozda' ),
			'landscape' => esc_html__( 'Landscape', 'mozda' ),
			'portrait' => esc_html__( 'Portrait', 'mozda' ),
			'square' => esc_html__( 'Square', 'mozda' ),
			'hero' => esc_html__( 'Hero', 'mozda' ),
			'uncropped' => esc_html__( 'Uncropped', 'mozda' ),
		),
	) );

	if ( apply_filters( 'tfm_theme_supports_full_width_posts', true )) :

		$wp_customize->add_setting( 'tfm_page_full_width', array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'tfm_page_full_width', array(
			'label'       => esc_html__( 'Full Width', 'mozda' ),
			'section'     => 'tfm_page_settings',
			'type'        => 'checkbox',
		) );

	endif;

	$wp_customize->add_setting( 'tfm_page_thumbnail', array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'tfm_page_thumbnail', array(
			'label'       => esc_html__( 'Thumbnail', 'mozda' ),
			'section'     => 'tfm_page_settings',
			'type'        => 'checkbox',
		) );

	$wp_customize->add_setting( 'tfm_front_page_entry_title', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_front_page_entry_title', array(
		'label'       => esc_html__( 'Show Page Title on Front Page', 'mozda' ),
		'description' => esc_html__( 'If your Homepage is set to a page', 'mozda'),
		'section'     => 'tfm_page_settings',
		'type'        => 'checkbox',
	) );

}

add_action( 'customize_register', 'tfm_customize_register_page' );