<?php


/**
 * Logo Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_logo( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_logo_settings', array(
		'title'    => esc_html__( 'Logo Settings', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_theme_settings',
	) );

	// ========================================================
    // Info Header
    // ========================================================
    $wp_customize->add_setting('tfm_general_logo_settings_header', array(
        'default'           => '',
        'sanitize_callback' => 'tfm_sanitize_text',
     
    ));
    $wp_customize->add_control(new tfm_Info_Custom_Control($wp_customize, 'tfm_general_logo_settings_header', array(
        'description' => esc_html__( 'Upload and manage your logos in in Appearance > Customize > Site Identity', 'mozda'),
        'settings'      => 'tfm_general_logo_settings_header',
        'section'       => 'tfm_logo_settings',
    )));

	// ========================================================
    // Info Header
    // ========================================================
    $wp_customize->add_setting('tfm_site_title_logo_settings_header', array(
        'default'           => '',
        'sanitize_callback' => 'tfm_sanitize_text',
     
    ));
    $wp_customize->add_control(new tfm_Info_Custom_Control($wp_customize, 'tfm_site_title_logo_settings_header', array(
        'label'         => esc_html__('Site title', 'mozda'),
        'settings'      => 'tfm_site_title_logo_settings_header',
        'section'       => 'tfm_logo_settings',
    )));

	// Logo Font Size
	$wp_customize->add_setting( 'tfm_logo_font_size', array(
		'default'           => '40',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_logo_font_size', array(
		'label'       => esc_html__( 'Font Size *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => 100,
		        'step' => 1,
		    ),
	) );

	// Logo Font Size (medium mobile)
	$wp_customize->add_setting( 'tfm_logo_font_size_medium_mobile', array(
		'default'           => '28',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_logo_font_size_medium_mobile', array(
		'label'       => esc_html__( 'Large Mobile Font Size *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => 100,
		        'step' => 1,
		    ),
	) );

	// Logo Font Size (medium mobile)
	$wp_customize->add_setting( 'tfm_logo_font_size_small_mobile', array(
		'default'           => '20',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_logo_font_size_small_mobile', array(
		'label'       => esc_html__( 'Small Mobile Font Size *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => 100,
		        'step' => 1,
		    ),
	) );

	/**
	Separator
	**/
	$wp_customize->add_setting('tfm_custom_logo_settings_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_custom_logo_settings_separator', array(
		'settings'		=> 'tfm_custom_logo_settings_separator',
		'section'  		=> 'tfm_logo_settings',
	)));

	// ========================================================
    // Info Header
    // ========================================================
    $wp_customize->add_setting('tfm_custom_logo_settings_header', array(
        'default'           => '',
        'sanitize_callback' => 'tfm_sanitize_text',
     
    ));
    $wp_customize->add_control(new tfm_Info_Custom_Control($wp_customize, 'tfm_custom_logo_settings_header', array(
        'label'         => esc_html__('Custom Logo', 'mozda'),
        'settings'      => 'tfm_custom_logo_settings_header',
        'section'       => 'tfm_logo_settings',
    )));

	// Logo Image Width (Desktop)
	$wp_customize->add_setting( 'tfm_custom_logo_max_width', array(
		'default'           => '210',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_custom_logo_max_width', array(
		'label'       => esc_html__( 'Max Width Desktop *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => apply_filters( 'tfm_site_max_width', 1200 ),
		        'step' => 1,
		    ),
	) );

	// Logo Image Width (Large Mobile Breakpoint)
	$wp_customize->add_setting( 'tfm_custom_logo_max_width_mobile', array(
		'default'           => '100',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_custom_logo_max_width_mobile', array(
		'label'       => esc_html__( 'Max Width Large Mobile *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => 999,
		        'step' => 1,
		    ),
	) );

	// Logo Image Width (Small Mobile)
	$wp_customize->add_setting( 'tfm_custom_logo_max_width_small', array(
		'default'           => '70',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_custom_logo_max_width_small', array(
		'label'       => esc_html__( 'Max Width Small Mobile *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => 999,
		        'step' => 1,
		    ),
	) );

	/**
	Separator
	**/
	$wp_customize->add_setting('tfm_sidebar_logo_settings_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_sidebar_logo_settings_separator', array(
		'settings'		=> 'tfm_sidebar_logo_settings_separator',
		'section'  		=> 'tfm_logo_settings',
	)));

	// ========================================================
    // Info Header
    // ========================================================
    $wp_customize->add_setting('tfm_sidebar_logo_settings_header', array(
        'default'           => '',
        'sanitize_callback' => 'tfm_sanitize_text',
     
    ));
    $wp_customize->add_control(new tfm_Info_Custom_Control($wp_customize, 'tfm_sidebar_logo_settings_header', array(
        'label'         => esc_html__('Toggle Sidebar', 'mozda'),
        'settings'      => 'tfm_sidebar_logo_settings_header',
        'section'       => 'tfm_logo_settings',
    )));

	// Logo Font Size Sidebar
	$wp_customize->add_setting( 'tfm_logo_font_size_sidebar', array(
		'default'           => '40',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_logo_font_size_sidebar', array(
		'label'       => esc_html__( 'Site Title Font Size *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => 100,
		        'step' => 1,
		    ),
	) );

	// Logo Image Width (Desktop)
	$wp_customize->add_setting( 'tfm_sidebar_custom_logo_max_width', array(
		'default'           => '150',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_sidebar_custom_logo_max_width', array(
		'label'       => esc_html__( 'Custom Logo Max Width *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => 250,
		        'step' => 1,
		    ),
	) );

	// Toggle Logo
	$wp_customize->add_setting( 'tfm_sidebar_logo', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_sidebar_logo', array(
		'label'       => esc_html__( 'Display Sidebar Logo/Site Title', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'checkbox',
	) );


	// ========================================================
    // Info Header
    // ========================================================
    $wp_customize->add_setting('tfm_footer_logo_settings_header', array(
        'default'           => '',
        'sanitize_callback' => 'tfm_sanitize_text',
     
    ));
    $wp_customize->add_control(new tfm_Info_Custom_Control($wp_customize, 'tfm_footer_logo_settings_header', array(
        'label'         => esc_html__('Footer', 'mozda'),
        'settings'      => 'tfm_footer_logo_settings_header',
        'section'       => 'tfm_logo_settings',
    )));

	// Logo Image Width (Desktop)
	$wp_customize->add_setting( 'tfm_footer_custom_logo_max_width', array(
		'default'           => '100',
		'sanitize_callback' => 'absint',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_footer_custom_logo_max_width', array(
		'label'       => esc_html__( 'Custom Logo Max Width *px', 'mozda' ),
		'section'     => 'tfm_logo_settings',
		'type'        => 'number',
		'input_attrs' => array(
		        'min'   => 0,
		        'max' => 250,
		        'step' => 1,
		    ),
	) );

}

add_action( 'customize_register', 'tfm_customize_register_logo' );