<?php


/**
 * Footer Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_image_format( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_image_format_settings', array(
		'title'    => esc_html__( 'Image Format Settings', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_theme_settings',
	) );

	// Use global
	$wp_customize->add_setting( 'tfm_image_format_use_global', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_use_global', array(
		'label'       => esc_html__( 'Use Archive &amp; Homepage Settings', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show excerpt (Auto)
	$wp_customize->add_setting( 'tfm_image_format_post_excerpt', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_post_excerpt', array(
		'label'       => esc_html__( 'Excerpt (Auto-Generated)', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_image_format_read_more', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_read_more', array(
		'label'       => esc_html__( 'Read More', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show entry title
	$wp_customize->add_setting( 'tfm_image_format_entry_title', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_title', array(
		'label'       => esc_html__( 'Entry Title', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show post thumbnail
	$wp_customize->add_setting( 'tfm_image_format_post_thumbnail', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_post_thumbnail', array(
		'label'       => esc_html__( 'Thumbnail', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Homepage Standard Loop Image aspect ratio
	$wp_customize->add_setting( 'tfm_image_format_thumbnail_aspect_ratio', array(
		'default'           => 'uncropped',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_image_format_thumbnail_aspect_ratio', array(
		'label'       => esc_html__( 'Thumbnail Aspect Ratio', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'select',
		'choices'     => array(
			'wide' => esc_html__( 'Wide', 'mozda' ),
			'landscape' => esc_html__( 'Landscape', 'mozda' ),
			'portrait' => esc_html__( 'Portrait', 'mozda' ),
			'square' => esc_html__( 'Square', 'mozda' ),
			'uncropped' => esc_html__( 'Uncropped', 'mozda' ),
		),
	) );

	// Show by meta
	$wp_customize->add_setting( 'tfm_image_format_entry_meta_by', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_meta_by', array(
		'label'       => esc_html__( '"by"', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show "in" meta
	$wp_customize->add_setting( 'tfm_image_format_entry_meta_in', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_meta_in', array(
		'label'       => esc_html__( '"in"', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show author meta
	$wp_customize->add_setting( 'tfm_image_format_entry_meta_author', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_meta_author', array(
		'label'       => esc_html__( 'Author', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show author meta
	$wp_customize->add_setting( 'tfm_image_format_entry_meta_author_avatar', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_meta_author_avatar', array(
		'label'       => esc_html__( 'Avatar', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show author nickname
	$wp_customize->add_setting( 'tfm_image_format_entry_meta_author_nickname', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_meta_author_nickname', array(
		'label'       => esc_html__( 'Nickname', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show category meta
	$wp_customize->add_setting( 'tfm_image_format_entry_meta_category', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_meta_category', array(
		'label'       => esc_html__( 'Category', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show read time (TFM theme boost plugin)
	if ( function_exists( 'tfm_read_time') ) {
		$wp_customize->add_setting( 'tfm_image_format_entry_meta_read_time', array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'tfm_image_format_entry_meta_read_time', array(
			'label'       => esc_html__( 'Read Time', 'mozda' ),
			'section'     => 'tfm_image_format_settings',
			'type'        => 'checkbox',
		) );
	}

	// Show date meta
	$wp_customize->add_setting( 'tfm_image_format_entry_meta_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_meta_comment_count', array(
		'label'       => esc_html__( 'Comment Count', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

	// Show date meta
	$wp_customize->add_setting( 'tfm_image_format_entry_meta_date', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_image_format_entry_meta_date', array(
		'label'       => esc_html__( 'Date', 'mozda' ),
		'section'     => 'tfm_image_format_settings',
		'type'        => 'checkbox',
	) );

}

add_action( 'customize_register', 'tfm_customize_register_image_format' );