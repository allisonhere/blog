<?php


/**
 * Header Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_header( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_header_settings', array(
		'title'    => esc_html__( 'Header Settings', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_theme_settings',
	) );

	// Layout style
	$wp_customize->add_setting( 'tfm_header_layout', array(
		'default'           => 'logo-left-menu-right',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	if ( function_exists('tfm_theme_boost_init')) {
		$wp_customize->add_control( 'tfm_header_layout', array(
			'label'       => esc_html__( 'Header Layout', 'mozda' ),
			'section'     => 'tfm_header_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'mozda' ),
				'logo-split-menu' => esc_html__( 'Logo Center Split Menu (supports overlay)', 'mozda' ),
				'logo-left-menu-right' => esc_html__( 'Logo Left w/Menu (supports overlay)', 'mozda' ),
				'logo-below-nav' => esc_html__( 'Logo Below Nav', 'mozda' ),
				'default-advert' => esc_html__( 'Default w/Advert', 'mozda'),
			),
		) );
	} else {
		$wp_customize->add_control( 'tfm_header_layout', array(
			'label'       => esc_html__( 'Header Layout', 'mozda' ),
			'section'     => 'tfm_header_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'mozda' ),
				'default-logo-left' => esc_html__( 'Default Logo Left', 'mozda'),
				'logo-split-menu' => esc_html__( 'Logo Center Split Menu', 'mozda' ),
				'logo-left-menu-right' => esc_html__( 'Logo Left w/Menu', 'mozda' ),
				'logo-below-nav' => esc_html__( 'Logo Below Nav', 'mozda' ),
			),
		) );
	}

	// Enable toggle menu
	$wp_customize->add_setting( 'tfm_header_full_width', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_header_full_width', array(
		'label'       => esc_html__( 'Full width', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	// ========================================================
	// Overlay header
	// ========================================================
	$wp_customize->add_setting('tfm_header_overlay_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_header_overlay_separator', array(
		'settings'		=> 'tfm_header_overlay_separator',
		'section'     => 'tfm_header_settings',
	)));

	// Info custom control
    $wp_customize->add_setting('tfm_header_overlay_info', array(
        'default'           => '',
        'sanitize_callback' => 'tfm_sanitize_text',
     
    ));
    $wp_customize->add_control(new tfm_Info_Custom_Control($wp_customize, 'tfm_header_overlay_info', array(
        'label'         => esc_html__('Overlay Header', 'mozda'),
        'description' => esc_html__( 'Enable overlay header for single post and homepage layouts that support it. E.g. Full width single posts and homepage sliders', 'mozda' ),
        'settings'      => 'tfm_header_overlay_info',
        'section'     => 'tfm_header_settings',
    )));

    // Enable toggle menu
	$wp_customize->add_setting( 'tfm_header_overlay_single', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_header_overlay_single', array(
		'label'       => esc_html__( 'Single Posts', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	// Enable toggle menu
	$wp_customize->add_setting( 'tfm_header_overlay_homepage', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_header_overlay_homepage', array(
		'label'       => esc_html__( 'Homepage', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting('tfm_header_options_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_header_options_separator', array(
		'settings'		=> 'tfm_header_options_separator',
		'section'     => 'tfm_header_settings',
	)));

	// Enable toggle menu
	$wp_customize->add_setting( 'tfm_toggle_menu', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_toggle_menu', array(
		'label'       => esc_html__( 'Show Toggle Menu on Desktop', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	// Enable toggle menu
	$wp_customize->add_setting( 'tfm_toggle_menu_mobile', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_toggle_menu_mobile', array(
		'label'       => esc_html__( 'Show Toggle Menu on Mobile', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	// Enable toggle search
	$wp_customize->add_setting( 'tfm_toggle_search', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_toggle_search', array(
		'label'       => esc_html__( 'Show Toggle Search on Desktop', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	// Enable toggle search
	$wp_customize->add_setting( 'tfm_toggle_search_mobile', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_toggle_search_mobile', array(
		'label'       => esc_html__( 'Show Toggle Search on Mobile', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	// Sticky Nav Desktop
	$wp_customize->add_setting( 'tfm_sticky_nav', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_sticky_nav', array(
		'label'       => esc_html__( 'Make Header Nav Sticky on Desktop', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	// Sticky Nav Mobile
	$wp_customize->add_setting( 'tfm_sticky_nav_mobile', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_sticky_nav_mobile', array(
		'label'       => esc_html__( 'Make Header Nav Sticky on Mobile', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

	// Tagline
	$wp_customize->add_setting( 'tfm_header_tagline', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_header_tagline', array(
		'label'       => esc_html__( 'Show Site Tagline', 'mozda' ),
		'section'     => 'tfm_header_settings',
		'type'        => 'checkbox',
	) );

}

add_action( 'customize_register', 'tfm_customize_register_header' );