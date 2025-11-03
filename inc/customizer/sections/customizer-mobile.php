<?php


/**
 * Mobile display Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_mobile( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	// ========================================================
	// Mobile display settings
	// ========================================================

	$wp_customize->add_section( 'tfm_mobile_settings', array(
		'title'    => esc_html__( 'Mobile Display Settings', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_theme_settings',
	) );

	// Sidebar
	$wp_customize->add_setting( 'tfm_mobile_hide_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_sidebar', array(
		'label'       => esc_html__( 'Hide Sidebar', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Post layout
	$wp_customize->add_setting( 'tfm_mobile_layout', array(
		'default'           => 'grid',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_mobile_layout', array(
		'label'       => esc_html__( 'Post Layout', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'select',
		'choices'     => array(
			'grid' => esc_html__( 'Grid', 'mozda' ),
			'compact' => esc_html__( 'List', 'mozda' ),
		),
	) );

	// ========================================================
	// Info header
	// ========================================================
    $wp_customize->add_setting('tfm_mobile_toggle_meta_header', array(
        'default'           => '',
        'sanitize_callback' => 'tfm_sanitize_text',
     
    ));
    $wp_customize->add_control(new Tfm_Info_Custom_Control($wp_customize, 'tfm_mobile_toggle_meta_header', array(
        'label'         => esc_html__('Hide meta data on mobile devices', 'mozda'),
        'description'         => esc_html__('These settings apply to homepage, archive, blog and search results', 'mozda'),
        'settings'      => 'tfm_mobile_toggle_meta_header',
        'section'     => 'tfm_mobile_settings',
    )));


	// Excerpt
	$wp_customize->add_setting( 'tfm_mobile_hide_excerpt', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'tfm_mobile_hide_excerpt', array(
		'label'       => esc_html__( 'Excerpt', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show by meta
	$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_by', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_by', array(
		'label'       => esc_html__( '"by"', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show "in" meta
	$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_in', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_in', array(
		'label'       => esc_html__( '"in"', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show author meta
	$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_author', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_author', array(
		'label'       => esc_html__( 'Author', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show author meta
	$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_author_avatar', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_author_avatar', array(
		'label'       => esc_html__( 'Avatar', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show author nickname
	$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_author_nickname', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_author_nickname', array(
		'label'       => esc_html__( 'Nickname', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show category meta
	$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_category', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_category', array(
		'label'       => esc_html__( 'Category', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show read time (TFM theme boost plugin)
	if ( function_exists( 'tfm_read_time') ) {
		$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_read_time', array(
			'default'           => false,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_read_time', array(
			'label'       => esc_html__( 'Read Time', 'mozda' ),
			'section'     => 'tfm_mobile_settings',
			'type'        => 'checkbox',
		) );
	}

	// Show date meta
	$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_comment_count', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_comment_count', array(
		'label'       => esc_html__( 'Comment Count', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show date meta
	$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_date', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_date', array(
		'label'       => esc_html__( 'Date', 'mozda' ),
		'section'     => 'tfm_mobile_settings',
		'type'        => 'checkbox',
	) );

	// Show post views (TFM theme boost plugin)
	if ( function_exists( 'pvc_get_post_views') ) {
		$wp_customize->add_setting( 'tfm_mobile_hide_entry_meta_post_views', array(
			'default'           => false,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'tfm_mobile_hide_entry_meta_post_views', array(
			'label'       => esc_html__( 'Post Views', 'mozda' ),
			'section'     => 'tfm_mobile_settings',
			'type'        => 'checkbox',
		) );
	}

}

add_action( 'customize_register', 'tfm_customize_register_mobile' );