<?php


/**
 * Single Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_single( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	// ========================================================
	// Single Post Settings
	// ========================================================

	$wp_customize->add_section( 'tfm_single_settings', array(
		'title'    => esc_html__( 'Single Post Settings', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_theme_settings',
	) );

	// Sidebar
	$wp_customize->add_setting( 'tfm_single_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_single_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Sidebar position
	$wp_customize->add_setting( 'tfm_single_sidebar_position', array(
		'default'           => 'side',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_single_sidebar_position', array(
		'label'       => esc_html__( 'Sidebar Position', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'radio',
		'choices'     => array(
			'side' => esc_html__( 'Side', 'mozda' ),
			'after' => esc_html__( 'After Header', 'mozda' ),
		),
	) );

	// Post style
	$wp_customize->add_setting( 'tfm_single_post_style', array(
		'default'           => 'default',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_single_post_style', array(
		'label'       => esc_html__( 'Post Style', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'select',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'mozda' ),
			'default-alt' => esc_html__( 'Default Alt.', 'mozda' ),
			'cover' => esc_html__( 'Cover', 'mozda' ),
		),
	) );

	// Image aspect ratio
	$wp_customize->add_setting( 'tfm_single_thumbnail_aspect_ratio', array(
		'default'           => 'hero',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_single_thumbnail_aspect_ratio', array(
		'label'       => esc_html__( 'Thumbnail Aspect Ratio', 'mozda' ),
		'section'     => 'tfm_single_settings',
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

	// Excerpt
	$wp_customize->add_setting( 'tfm_single_thumbnail', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_thumbnail', array(
		'label'       => esc_html__( 'Thumbnail', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	if ( apply_filters( 'tfm_theme_supports_full_width_posts', true )) :

		// Full width
		$wp_customize->add_setting( 'tfm_single_full_width', array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'tfm_single_full_width', array(
			'label'       => esc_html__( 'Full Width', 'mozda' ),
			'section'     => 'tfm_single_settings',
			'type'        => 'checkbox',
		) );

	endif;

	// Excerpt
	$wp_customize->add_setting( 'tfm_single_custom_excerpt', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_custom_excerpt', array(
		'label'       => esc_html__( 'Display Custom excerpt', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Show by meta
	$wp_customize->add_setting( 'tfm_single_entry_meta_by', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_single_entry_meta_by', array(
		'label'       => esc_html__( '"by"', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Show by meta
	$wp_customize->add_setting( 'tfm_single_entry_meta_in', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_single_entry_meta_in', array(
		'label'       => esc_html__( '"in"', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_single_entry_meta_author', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_entry_meta_author', array(
		'label'       => esc_html__( 'Author', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_single_entry_meta_author_avatar', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_entry_meta_author_avatar', array(
		'label'       => esc_html__( 'Avatar', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_single_entry_meta_author_nickname', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_entry_meta_author_nickname', array(
		'label'       => esc_html__( 'Nickname', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_single_entry_meta_category', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_entry_meta_category', array(
		'label'       => esc_html__( 'Category', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_single_entry_meta_date', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_entry_meta_date', array(
		'label'       => esc_html__( 'Date', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_single_entry_meta_date_updated', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_entry_meta_date_updated', array(
		'label'       => esc_html__( 'Updated Date', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	if ( function_exists( 'tfm_read_time') ) {

		$wp_customize->add_setting( 'tfm_single_entry_meta_read_time', array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		) );

		$wp_customize->add_control( 'tfm_single_entry_meta_read_time', array(
			'label'       => esc_html__( 'Read Time', 'mozda' ),
			'section'     => 'tfm_single_settings',
			'type'        => 'checkbox',
		) );

	}

	$wp_customize->add_setting( 'tfm_single_entry_meta_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_entry_meta_comment_count', array(
		'label'       => esc_html__( 'Comment Count', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_single_post_tags', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_post_tags', array(
		'label'       => esc_html__( 'Post Tags', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_single_post_tags_count', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_post_tags_count', array(
		'label'       => esc_html__( 'Post Tag Count', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	/**
	Separator
	**/
	$wp_customize->add_setting('tfm_single_post_navigation_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_single_post_navigation_separator', array(
		'settings'		=> 'tfm_single_post_navigation_separator',
		'section'  		=> 'tfm_single_settings',
	)));

	// Prev/Next
	$wp_customize->add_setting( 'tfm_single_post_navigation', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_post_navigation', array(
		'label'       => esc_html__( 'Previous/Next Post', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Prev/next layout
	$wp_customize->add_setting( 'tfm_single_post_navigation_layout', array(
		'default'           => 'grid',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_single_post_navigation_layout', array(
		'label'       => esc_html__( 'Prev/Next Post Layout', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'select',
		'choices'     => array(
			'grid' => esc_html__( 'Grid', 'mozda' ),
			'list' => esc_html__( 'List', 'mozda' ),
		),
	) );

	// Prev/next style
	$wp_customize->add_setting( 'tfm_single_post_navigation_style', array(
		'default'           => 'default',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_single_post_navigation_style', array(
		'label'       => esc_html__( 'Prev/Next Post Style', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'select',
		'choices'     => array(
			'default' => esc_html__( 'Default', 'mozda' ),
			'default-alt' => esc_html__( 'Default Alt.', 'mozda' ),
			'cover' => esc_html__( 'Cover', 'mozda' ),
		),
	) );


	// Prev/Next Thumbnail
	$wp_customize->add_setting( 'tfm_single_post_navigation_thumbnail', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_post_navigation_thumbnail', array(
		'label'       => esc_html__( 'Prev/Next Post Thumbnail', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Prev/Next Thumbnail
	$wp_customize->add_setting( 'tfm_single_post_navigation_excerpt', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_post_navigation_excerpt', array(
		'label'       => esc_html__( 'Prev/Next Post Excerpt', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Prev/Next Thumbnail
	$wp_customize->add_setting( 'tfm_single_post_navigation_category', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_post_navigation_category', array(
		'label'       => esc_html__( 'Prev/Next Post Category', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Prev/Next Thumbnail
	$wp_customize->add_setting( 'tfm_single_post_navigation_header', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_single_post_navigation_header', array(
		'label'       => esc_html__( 'Prev/Next Post Header', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	/**
	Separator
	**/
	$wp_customize->add_setting('tfm_single_post_author_bio_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_single_post_author_bio_separator', array(
		'settings'		=> 'tfm_single_post_author_bio_separator',
		'section'  		=> 'tfm_single_settings',
	)));

	// Show Author Bio Avatar
	$wp_customize->add_setting( 'tfm_single_author_bio_avatar', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_single_author_bio_avatar', array(
		'label'       => esc_html__( 'Author Bio Avatar', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Show Author Bio Avatar
	$wp_customize->add_setting( 'tfm_single_author_bio_name', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_single_author_bio_name', array(
		'label'       => esc_html__( 'Author Bio Name', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Show Author Bio Avatar
	$wp_customize->add_setting( 'tfm_single_author_bio_info', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_single_author_bio_info', array(
		'label'       => esc_html__( 'Author Bio Info', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

	// Toggle Comments
	$wp_customize->add_setting( 'tfm_single_toggle_comments', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_single_toggle_comments', array(
		'label'       => esc_html__( 'Click Button to Open Comments', 'mozda' ),
		'section'     => 'tfm_single_settings',
		'type'        => 'checkbox',
	) );

}

add_action( 'customize_register', 'tfm_customize_register_single' );