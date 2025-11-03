<?php


/**
 * Default scheme colors
 * light and dark theme
 * $scheme variable
 *
 * @package WordPress
 * @subpackage Mozda
 */


// ========================================================
// Primary Colors
// ========================================================

// Theme colour scheme
$wp_customize->add_setting( 'tfm_primary_theme_color' . $scheme, array(
	'default'           => $customizer_settings['primary_theme_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_primary_theme_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Primary Theme Color', 'mozda' ),
) ) );


if ( array_key_exists('secondary_theme_color', $customizer_settings)) {

    $wp_customize->add_setting( 'tfm_secondary_theme_color' . $scheme, array(
		'default'           => $customizer_settings['secondary_theme_color' . $scheme],
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_secondary_theme_color' . $scheme, array(
      'section' => 'tfm_theme_colors' . $scheme,
      'label'   => esc_html__( 'Secondary Theme Color', 'mozda' ),
    ) ) );

}

if ( array_key_exists('tertiary_theme_color', $customizer_settings)) {
	
    $wp_customize->add_setting( 'tfm_tertiary_theme_color' . $scheme, array(
		'default'           => $customizer_settings['tertiary_theme_color' . $scheme],
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_tertiary_theme_color' . $scheme, array(
      'section' => 'tfm_theme_colors' . $scheme,
      'label'   => esc_html__( 'Tertiary Theme Color', 'mozda' ),
    ) ) );

}

// ========================================================
// Global Font and Link Colors
// ========================================================

 // Add Setting
$wp_customize->add_setting( 'tfm_body_font_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_body_font_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_body_font_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Body Font Color', 'mozda' ),
) ) );

 // Add Setting
$wp_customize->add_setting( 'tfm_link_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_link_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_link_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Body Link Color', 'mozda' ),
) ) );

$wp_customize->add_setting( 'tfm_link_hover_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_link_hover_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_link_hover_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Body Link Hover Color', 'mozda' ),
) ) );

$wp_customize->add_setting( 'tfm_button_background' . $scheme, array(
	'default'           => $customizer_settings['tfm_button_background' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_button_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Button Background', 'mozda' ),
) ) );

$wp_customize->add_setting( 'tfm_button_background_gradient' . $scheme, array(
	'default'           => $customizer_settings['tfm_button_background_gradient' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_button_background_gradient' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Button Background Gradient', 'mozda' ),
) ) );

$wp_customize->add_setting( 'tfm_button_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_button_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_button_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Button Color', 'mozda' ),
) ) );

// ========================================================
// Theme background
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_body_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_body_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_body_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

// Add Setting
$wp_customize->add_setting( 'tfm_body_background_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_body_background_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_body_background_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Body Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_body_background_gradient' . $scheme, array(
	'default'           => $customizer_settings['tfm_body_background_gradient' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_body_background_gradient' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Body Gradient', 'mozda' ),
) ) );

// ========================================================
// Header Colors
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_header_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_header_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_header_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

// Add Setting
$wp_customize->add_setting( 'tfm_header_background_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_header_background_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_background_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Header Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_header_background_gradient' . $scheme, array(
	'default'           => $customizer_settings['tfm_header_background_gradient' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_background_gradient' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Header Gradient', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_header_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_header_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Header Color', 'mozda' ),
  'description' => esc_html__( 'Menus and Icons', 'mozda'),
) ) );

    // Add Setting
$wp_customize->add_setting( 'tfm_header_logo_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_header_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_logo_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Logo Color', 'mozda' ),
  'description' => esc_html__( 'Or upload a logo', 'mozda'),
) ) );

    // Add Setting
$wp_customize->add_setting( 'tfm_header_elements_background' . $scheme, array(
	'default'           => $customizer_settings['tfm_header_elements_background' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_elements_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Header Elements Background', 'mozda' ),
) ) );

    // Add Setting
$wp_customize->add_setting( 'tfm_header_elements_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_header_elements_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_header_elements_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Header Elements Color', 'mozda' ),
) ) );

// ========================================================
// Footer Colors
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_footer_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_footer_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_footer_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

// Add Setting
$wp_customize->add_setting( 'tfm_footer_background' . $scheme, array(
	'default'           => $customizer_settings['tfm_footer_background' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_footer_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Footer Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_footer_background_gradient' . $scheme, array(
	'default'           => $customizer_settings['tfm_footer_background_gradient' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_footer_background_gradient' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Footer Gradient', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_footer_font_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_footer_font_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_footer_font_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Footer Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_footer_link_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_footer_link_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_footer_link_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Footer Link Color', 'mozda' ),
) ) );

// ========================================================
// Entry Colors
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_entry_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_entry_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_entry_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

// Add Setting
$wp_customize->add_setting( 'tfm_post_background' . $scheme, array(
	'default'  => $customizer_settings['default_post_background' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_post_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Post Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_entry_title_link_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_entry_title_link_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_title_link_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Entry Title Color', 'mozda' ),
) ) );

 // Add Setting
$wp_customize->add_setting( 'tfm_entry_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_entry_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Entry Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_entry_meta_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_entry_meta_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_meta_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Entry Meta Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_entry_meta_link_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_entry_meta_link_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_meta_link_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Entry Meta Link Color', 'mozda' ),
) ) );

// ========================================================
// Button
// ========================================================

// Add Setting
$wp_customize->add_setting( 'tfm_continue_reading_button_background' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_continue_reading_button_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Button Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_continue_reading_button_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_continue_reading_button_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Button Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_continue_reading_button_hover_background' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_continue_reading_button_hover_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Button Hover Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_continue_reading_button_hover_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_continue_reading_button_hover_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Button Hover Color', 'mozda' ),
) ) );

 // Add Setting
$wp_customize->add_setting( 'tfm_cover_format_primary_color' . $scheme, array(
	'default'           => '#ffffff',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_cover_format_primary_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Cover/Image Format Primary Color', 'mozda' ),
) ) );

// ========================================================
// Single Post/Page Entry Colors
// ========================================================

// If theme supports single color settings

if ( apply_filters( 'tfm_theme_supports_single_color_settings', false )):

	// Separator
	$wp_customize->add_setting('tfm_color_settings_single_entry_separator' . $scheme, array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_single_entry_separator' . $scheme, array(
		'settings'		=> 'tfm_color_settings_single_entry_separator' . $scheme,
		'section'  		=> 'tfm_theme_colors' . $scheme,
	)));

	$wp_customize->add_setting('tfm_color_settings_single_entry_info', array(
	    'default'           => '',
	    'sanitize_callback' => 'tfm_sanitize_text',
	 
	));
	$wp_customize->add_control(new Tfm_Info_Custom_Control($wp_customize, 'tfm_color_settings_single_entry_info', array(
	    'label'         => esc_html__('Single Post & Page', 'mozda'),
	    'settings'      => 'tfm_color_settings_single_entry_info',
	    'section'  		=> 'tfm_theme_colors' . $scheme,
	)));

	// Add Setting
	$wp_customize->add_setting( 'tfm_entry_title_link_color_single' . $scheme, array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_title_link_color_single' . $scheme, array(
	  'section' => 'tfm_theme_colors' . $scheme,
	  'label'   => esc_html__( 'Entry Title Color', 'mozda' ),
	) ) );

	// Add Setting
	$wp_customize->add_setting( 'tfm_excerpt_color_single' . $scheme, array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_excerpt_color_single' . $scheme, array(
	  'section' => 'tfm_theme_colors' . $scheme,
	  'label'   => esc_html__( 'Excerpt Color', 'mozda' ),
	) ) );

	// Add Setting
	$wp_customize->add_setting( 'tfm_entry_meta_color_single' . $scheme, array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_meta_color_single' . $scheme, array(
	  'section' => 'tfm_theme_colors' . $scheme,
	  'label'   => esc_html__( 'Entry Meta Color', 'mozda' ),
	) ) );

	// Add Setting
	$wp_customize->add_setting( 'tfm_entry_meta_link_color_single' . $scheme, array(
		'default'           => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Control Options
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_entry_meta_link_color_single' . $scheme, array(
	  'section' => 'tfm_theme_colors' . $scheme,
	  'label'   => esc_html__( 'Entry Meta Link Color', 'mozda' ),
	) ) );

endif; 

// ========================================================
// Archive header
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_archive_header_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_archive_header_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_entry_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

// Add Setting
$wp_customize->add_setting( 'tfm_archive_header_background' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_archive_header_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Category Header Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_archive_header_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_archive_header_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Category Header Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_archive_header_meta_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_archive_header_meta_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Category Header Meta Color', 'mozda' ),
) ) );

// ========================================================
// section header
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_section_header_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_section_header_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_section_header_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

// Add Setting
$wp_customize->add_setting( 'tfm_section_header_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_section_header_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Section Header Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_section_header_meta_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_section_header_meta_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Section Header Meta Color', 'mozda' ),
) ) );

// ========================================================
// Misc.
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_tags_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_tags_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_tags_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

 // Add Setting
$wp_customize->add_setting( 'tfm_post_tag_background' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_post_tag_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Tag Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_post_tag_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_post_tag_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Tag Color', 'mozda' ),
) ) );

// ========================================================
// Widgets
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_widgets_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_widgets_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_widgets_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

// Add Setting
$wp_customize->add_setting( 'tfm_widget_background' . $scheme, array(
	'default'           => $customizer_settings['tfm_widget_background' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Widget Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_widget_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_widget_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Widget Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_widget_title_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_widget_title_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_title_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Widget Title Color', 'mozda' ),
) ) );


// Add Setting
$wp_customize->add_setting( 'tfm_widget_link_color' . $scheme, array(
	'default'           => $customizer_settings['tfm_widget_link_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_widget_link_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Widget Link Color', 'mozda' ),
) ) );

// ========================================================
// Misc.
// ========================================================

// Separator
$wp_customize->add_setting('tfm_color_settings_misc_separator' . $scheme, array(
	'default'           => '',
	'sanitize_callback' => 'esc_html',
));
$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_color_settings_misc_separator' . $scheme, array(
	'settings'		=> 'tfm_color_settings_misc_separator' . $scheme,
	'section'  		=> 'tfm_theme_colors' . $scheme,
)));

// Add Setting
$wp_customize->add_setting( 'tfm_cta_background' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_cta_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'CTA Button Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_cta_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_cta_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'CTA Button Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_cta_background_hover' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_cta_background_hover' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'CTA Button Hover Background', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_cta_color_hover' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_cta_color_hover' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'CTA Button Hover Color', 'mozda' ),
) ) );

// Add Setting
$wp_customize->add_setting( 'tfm_meta_theme_color' . $scheme, array(
	'default'           => '',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_meta_theme_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Meta Theme Color', 'mozda' ),
) ) );

  // Add Setting
$wp_customize->add_setting( 'tfm_menu_sash_background' . $scheme, array(
	'default'           => $customizer_settings['primary_theme_color' . $scheme],
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_menu_sash_background' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Menu Sash Background', 'mozda' ),
) ) );

  // Add Setting
$wp_customize->add_setting( 'tfm_menu_sash_color' . $scheme, array(
	'default'           => '#ffffff',
	'transport' => 'refresh',
	'sanitize_callback' => 'sanitize_hex_color',
) );

// Control Options
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tfm_menu_sash_color' . $scheme, array(
  'section' => 'tfm_theme_colors' . $scheme,
  'label'   => esc_html__( 'Menu Sash Color', 'mozda' ),
) ) );