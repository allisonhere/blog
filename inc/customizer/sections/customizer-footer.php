<?php


/**
 * Footer Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_footer( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_footer_settings', array(
		'title'    => esc_html__( 'Footer Settings', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_theme_settings',
	) );

	// Footer text
	$wp_customize->add_setting( 'tfm_footer_text', array(
		'default'           => get_bloginfo('description'),
		'sanitize_callback' => 'tfm_sanitize_html',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_footer_text', array(
		'label'       => esc_html__( 'Footer Text', 'mozda' ),
		'description' => esc_html__( 'Basic HTML is supported', 'mozda'),
		'section'     => 'tfm_footer_settings',
		'type'        => 'textarea',
	) );

	if ( function_exists('tfm_social_icons_theme_footer')) :

		$wp_customize->add_setting( 'tfm_footer_text_social_icons', array(
	        'default'           => false,
	        'sanitize_callback' => 'tfm_sanitize_checkbox',
	    ) );

	    $wp_customize->add_control( 'tfm_footer_text_social_icons', array(
	        'label'       => esc_html__( 'Display Social Icons', 'mozda' ),
	        'description' => esc_html__( 'Configure icon style in: Appearance > TFM Social Media Channels: Site Footer', 'mozda'),
	        'section'     => 'tfm_footer_settings',
	        'type'        => 'checkbox',
	    ) );

	endif;

}

add_action( 'customize_register', 'tfm_customize_register_footer' );