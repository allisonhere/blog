<?php

/**
 * Sanitization Functions
 *
 * @package WordPress
 * @subpackage Personal_Blog
 */

// ========================================================
// Allowed HTML wp_kses() function
// ========================================================

if ( ! function_exists( 'tfm_sanitize_html' ) ) {

	function tfm_sanitize_html( $input ) {

		return wp_kses_post( $input );

	}

}

// ========================================================
// Sanitize Checkbox
// ========================================================
/**
* @param $input
* @return bool
*/

if ( ! function_exists( 'tfm_sanitize_checkbox' ) ) {

	function tfm_sanitize_checkbox( $input ) {

			return ( $input === true ) ? true : false;

	}

}

// ========================================================
// Santitize text field
// ========================================================

if ( ! function_exists( 'tfm_sanitize_text' ) ) {

	function tfm_sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}

// ========================================================
// Sanitize Radio
// ========================================================

if ( ! function_exists( 'tfm_sanitize_radio' ) ) {

	function tfm_sanitize_radio( $input, $setting ) {

		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	    $input = sanitize_key($input);
	  
	    // get the list of possible select options 
	    $choices = $setting->manager->get_control( $setting->id )->choices;
	                      
	    //return input if valid or return default option
	    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

}

// ========================================================
// Sanitize Select
// ========================================================
if ( ! function_exists( 'tfm_sanitize_select' ) ) {

	function tfm_sanitize_select( $input, $setting ) {

		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
	    $input = sanitize_key($input);
	  
	    // get the list of possible select options 
	    $choices = $setting->manager->get_control( $setting->id )->choices;
	                      
	    //return input if valid or return default option
	    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

}

// ========================================================
// Sanitize image upload
// ========================================================

if ( ! function_exists( 'tfm_sanitize_image' ) ) {

	function tfm_sanitize_image( $image, $setting ) {
		/*
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types()
		 */
	    $mimes = array(
	        'jpg|jpeg|jpe' => 'image/jpeg',
	        'gif'          => 'image/gif',
	        'png'          => 'image/png',
	        'bmp'          => 'image/bmp',
	        'tif|tiff'     => 'image/tiff',
	        'ico'          => 'image/x-icon'
	    );
		// Return an array with file extension and mime_type.
	    $file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
	    return ( $file['ext'] ? $image : $setting->default );
	}

}
