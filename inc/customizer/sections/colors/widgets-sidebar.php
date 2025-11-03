<?php


/**
 * Sidebar Widget Color Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_colors_widgets_sidebar( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_sidebar_widget_colors', array(
		'title'    => esc_html__( 'Widgets (Sidebar)', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_color_settings',
	) );

	// Add Setting
	$wp_customize->add_setting( 'tfm_widget_background', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_background', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Background Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_widget_title_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_title_color', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Title Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_widget_subtitle_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_subtitle_color', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Subtitle Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_widget_font_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_font_color', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Font Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_widget_link_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_link_color', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Link Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_widget_child_link_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_child_link_color', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Child Link Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_widget_meta_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_meta_color', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Meta Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_widget_meta_link_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_meta_link_color', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Meta Link Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_widget_button_background', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_button_background', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Button Color', 'mozda' ),
    ) ) );

     // Add Setting
	$wp_customize->add_setting( 'tfm_widget_button_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_button_color', array(
      'section' => 'tfm_sidebar_widget_colors',
      'label'   => esc_html__( 'Widget Button Text Color', 'mozda' ),
    ) ) );

}

add_action( 'customize_register', 'tfm_customize_register_colors_widgets_sidebar' );