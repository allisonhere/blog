<?php

$customizer_settings = tfm_general_settings();

// Adds support for editor color palette.
add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Primary Theme Color', 'mozda' ),
		'slug'  => 'primary-theme-color',
		'color'	=> get_theme_mod( 'tfm_primary_theme_color', $customizer_settings['primary_theme_color'] ),
	),
	array(
		'name'  => __( 'Secondary Theme Color', 'mozda' ),
		'slug'  => 'secondary-theme-color',
		'color'	=> get_theme_mod( 'tfm_secondary_theme_color', $customizer_settings['secondary_theme_color'] ),
	),
	array(
		'name'  => __( 'Tertiary Theme Color', 'mozda' ),
		'slug'  => 'tertiary-theme-color',
		'color'	=> get_theme_mod( 'tfm_tertiary_theme_color', $customizer_settings['tertiary_theme_color'] ),
	),
	array(
		'name'  => __( 'Black', 'mozda' ),
		'slug'  => 'black',
		'color' => '#000000',
	),
	array(
		'name'  => __( 'Very Dark Grey', 'mozda' ),
		'slug'  => 'very-dark-grey',
		'color' => get_theme_mod( 'tfm_very_dark_grey', '#131315' ),
       ),
	array(
		'name'  => __( 'Dark Grey', 'mozda' ),
		'slug'  => 'dark-grey',
		'color' => get_theme_mod( 'tfm_dark_grey', '#45464b' ),
       ),
	array(
		'name'  => __( 'Medium Grey', 'mozda' ),
		'slug'  => 'medium-grey',
		'color' => get_theme_mod( 'tfm_medium_grey', '#94979e' ),
       ),
	array(
		'name'  => __( 'Light Grey', 'mozda' ),
		'slug'  => 'light-grey',
		'color' => get_theme_mod( 'tfm_medium_grey', '#cfd0d2' ),
       ),
	array(
		'name'  => __( 'Light/Dark Theme Highlight', 'mozda' ),
		'slug'  => 'light-dark-highlight',
		'color' => '#f2f2f2',
       ),
) );

$gradient_primary = get_theme_mod( 'tfm_primary_theme_color', tfm_hex2rgba($customizer_settings['primary_theme_color'] ) );
$gradient_secondary = get_theme_mod( 'tfm_secondary_theme_color', tfm_hex2rgba( $customizer_settings['secondary_theme_color'] ) );
$gradient_tertiary = get_theme_mod( 'tfm_tertiary_theme_color', tfm_hex2rgba( $customizer_settings['tertiary_theme_color'] ) );

add_theme_support(
	'editor-gradient-presets',
	array(
		array(
			'name'     => __( 'Primary to Secondary', 'mozda' ),
			'gradient' => 'linear-gradient(135deg, ' . esc_attr( $gradient_primary ) . ' 0%, ' . esc_attr( $gradient_secondary ) . ' 100%)',
			'slug'     => 'primary-to-secondary',
		),
		array(
			'name'     => __( 'Secondary to Tertiary', 'mozda' ),
			'gradient' => 'linear-gradient(135deg, ' . esc_attr( $gradient_secondary) . ' 0%, ' . esc_attr( $gradient_tertiary ) . ' 100%)',
			'slug'     => 'secondary-to-tertiary',
		),
		array(
			'name'     => __( 'Primary to Tertiary', 'mozda' ),
			'gradient' => 'linear-gradient(135deg, ' . esc_attr( $gradient_primary) . ' 0%, ' . esc_attr( $gradient_tertiary ) . ' 100%)',
			'slug'     => 'primary-to-tertiary',
		),
	)
);