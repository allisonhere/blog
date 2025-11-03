<?php


/**
 * Post Color Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_colors_posts( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_entry_colors', array(
		'title'    => esc_html__( 'Entry Colors', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_color_settings',
	) );

	// Add Setting
	$wp_customize->add_setting( 'tfm_archive_post_background', array(
		'default'  => $customizer_settings['default_archive_post_background'],
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_archive_post_background', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Post Background', 'mozda' ),
    ) ) );
	
    // Add Setting
	$wp_customize->add_setting( 'tfm_entry_title_link_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_title_link_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Entry Title Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_excerpt_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_excerpt_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Excerpt Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_entry_meta_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_meta_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Entry Meta Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_entry_meta_link_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_meta_link_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Entry Meta Link Color', 'mozda' ),
    ) ) );

    // ========================================================
	// Button
	// ========================================================

	// Add Setting
	$wp_customize->add_setting( 'tfm_continue_reading_button_background', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_continue_reading_button_background', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Button Background', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_continue_reading_button_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_continue_reading_button_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Button Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_continue_reading_button_hover_background', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_continue_reading_button_hover_background', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Button Hover Background', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_continue_reading_button_hover_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_continue_reading_button_hover_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Button Hover Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_post_format_icon_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_post_format_icon_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Post Format & Sticky Icon Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_post_format_icon_background', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_post_format_icon_background', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Post Format & Sticky Icon Background', 'mozda' ),
    ) ) );

    // ========================================================
	// Single
	// ========================================================

    /**
	Separator
	**/
	$wp_customize->add_setting('tfm_color_settings_single_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_single_separator', array(
		'settings'		=> 'tfm_color_settings_single_separator',
		'section'  		=> 'tfm_entry_colors',
	)));

     // Add Setting
	$wp_customize->add_setting( 'tfm_single_entry_font_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_single_entry_font_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Single Font Color', 'mozda' ),
    ) ) );

    // ========================================================
	// Single hero seperator
	// ========================================================
	$wp_customize->add_setting('tfm_color_settings_single_hero_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_single_hero_separator', array(
		'settings'		=> 'tfm_color_settings_single_hero_separator',
		'section'  		=> 'tfm_entry_colors',
	)));

	// Add Setting
	$wp_customize->add_setting( 'tfm_single_hero_background', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_single_hero_background', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Single Hero Background', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_single_hero_entry_title_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_single_hero_entry_title_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Single Hero Title Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_single_hero_entry_meta_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_single_hero_entry_meta_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Single Hero Entry Meta Color', 'mozda' ),
    ) ) );

    // Add Setting
	$wp_customize->add_setting( 'tfm_single_hero_entry_meta_link_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_single_hero_entry_meta_link_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Single Hero Entry Meta Link Color', 'mozda' ),
    ) ) );


    // ========================================================
	// Info header separator
	// ========================================================
	$wp_customize->add_setting('tfm_color_settings_cover_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_cover_separator', array(
		'settings'		=> 'tfm_color_settings_cover_separator',
		'section'  		=> 'tfm_entry_colors',
	)));

	// Info header
	$wp_customize->add_setting('tfm_color_settings_cover_info_header', array(
        'default'           => '',
        'sanitize_callback' => 'tfm_sanitize_text',
     
    ));
    $wp_customize->add_control(new Tfm_Info_Custom_Control($wp_customize, 'tfm_color_settings_cover_info_header', array(
        'label'         => esc_html__('Cover/Image Format', 'mozda'),
        'description' => esc_html__('Cover settings apply to archive, blog and single posts', 'mozda'),
        'settings'      => 'tfm_color_settings_cover_info_header',
        'section'       => 'tfm_entry_colors',
    )));
    // ========================================================
	// End
	// ========================================================

	 // Add Setting
	$wp_customize->add_setting( 'tfm_cover_format_primary_color', array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_cover_format_primary_color', array(
      'section' => 'tfm_entry_colors',
      'label'   => esc_html__( 'Primary Text Color', 'mozda' ),
    ) ) );

}

add_action( 'customize_register', 'tfm_customize_register_colors_posts' );