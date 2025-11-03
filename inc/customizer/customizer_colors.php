<?php
/**
 * Mozda: Customizer Colour Scheme Settings
 *
 * @package WordPress
 * @subpackage mozda
 * @since 1.0
 * @version 1.2
 */

require( get_template_directory() . '/inc/customizer/custom_controls.php' );

// Load the sections
require( get_template_directory() . '/inc/customizer/sections/colors/light.php' );
require( get_template_directory() . '/inc/customizer/sections/colors/dark.php' );
require( get_template_directory() . '/inc/customizer/sections/colors/color-mode.php' );
require( get_template_directory() . '/inc/customizer/sections/colors/category-tags.php' );


// Load theme options panel
function tfm_color_scheme_customize_register( $wp_customize ) {

		$wp_customize->add_panel( 'tfm_color_settings', array(
	  'title' => esc_html__( 'Mozda: Color Settings', 'mozda' ),
	  'priority' => 140,
	  ) );

}

add_action( 'customize_register', 'tfm_color_scheme_customize_register', 20 );

// Remove default WP colors section
function tfm_color_scheme_remove_sections( $wp_customize ) {

      $wp_customize->remove_section('colors');

}

add_action( 'customize_register', 'tfm_color_scheme_remove_sections', 20 );