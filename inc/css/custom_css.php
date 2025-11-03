<?php 

/**
 * Customizer Colour Options
 *
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

/**
 * Generate and output inline (in header) CSS for Colour Customizer
 */

function tfm_custom_color_scheme() {

		$customizer_settings = tfm_general_settings();

		// ========================================================
		// Settings and light (default) theme CSS vars
		// ========================================================

		require( get_template_directory() . '/inc/css/colors.php' );
		require( get_template_directory() . '/inc/css/settings.php' );

		// Output filtered CSS vars

		$css_vars = array_filter($custom_css);

		if ( count($css_vars) !== 0 ) :

			echo '<style type="text/css" id="mozda-custom-css-vars">' . "\n";
			echo ':root {' . "\n";
			foreach ($css_vars as $css ) {
				echo wp_strip_all_tags( $css ) . "\n";
			}
			echo '}' . "\n";
			echo '</style>' . "\n";

		endif;

		// ========================================================
		// Dark theme CSS
		// ========================================================

		// Return if running light mode only
		if ( 'light' === get_theme_mod( 'tfm_theme_color_scheme', 'system') && false === get_theme_mod( 'tfm_toggle_color_mode', true) ) {
			return false;
		} else {
			require( get_template_directory() . '/inc/css/colors-dark.php' );
		}

		// Background Image

		$bg_css[] = get_background_image() && ( is_single() || is_page() ) && false === get_theme_mod( 'tfm_background_image_single', true ) ? 'body.custom-background.single, body.custom-background.page { background-image:none;}' : ''; 
		$bg_css[] = get_background_image() && ( is_archive() || is_search() ) && false === get_theme_mod( 'tfm_background_image_archive', true ) ? 'body.custom-background.archive, body.custom-background.search { background-image:none;}' : ''; 

		$background_image_css = array_filter($bg_css);

		if ( count($background_image_css) !== 0 ) :

			echo '<style type="text/css" id="mozda-bg-css">';
			foreach ($background_image_css as $css ) {
				echo wp_strip_all_tags( $css );
			}
			echo  '</style>' . "\n";

		endif;


		require( get_template_directory() . '/inc/css/category-tags.php' );

}

add_action( 'wp_head', 'tfm_custom_color_scheme' ); // Enqueue the CSS Inline Style after the main stylesheet


// ========================================================
// Admin Inline CSS for Gutenebrg editor
// ========================================================

function tfm_admin_gutenberg_inline_css() {

	$customizer_settings = tfm_general_settings();

	$bg_color = '' !== get_theme_mod( 'tfm_single_background_color', '' ) ? str_replace('#', '', get_theme_mod( 'tfm_single_background_color', '' )) : get_background_color();

	// button
	$button_background = get_theme_mod( 'tfm_button_background', $customizer_settings['tfm_button_background'] );
	$button_gradient = get_theme_mod( 'tfm_button_background_gradient', $customizer_settings['tfm_button_background_gradient']  );

	$button_css = ( $button_background || ( $button_background && $button_gradient ) ) ? '--button-background:' : '';
	if ( $button_background && ! $button_gradient ) {
	    $button_css .= $button_background . ';';
	}
	if ( $button_background && $button_gradient ) {
	    $button_css .= 'linear-gradient( var(--button-gradient-deg), ' . $button_gradient . ', ' .$button_background . ');';
	}

	echo '<style id="mozda-inline-gutenberg-css">';
	echo ':root {';
	echo '--site-width:' . esc_attr( get_theme_mod( 'tfm_site_width', $customizer_settings['site_width'] )) . 'px;';
	echo '--site-max-width:' . esc_attr( get_theme_mod( 'tfm_site_width', $customizer_settings['site_width'] )) . 'px;';
	echo wp_strip_all_tags($button_css);
	echo '} ';
	echo '.wp-block-button .wp-block-button__link { border-radius: ' . esc_attr( get_theme_mod( 'tfm_button_border_radius', $customizer_settings['button_border_radius'] )) . 'px;}';
	echo '.editor-styles-wrapper { background-color:#' . esc_attr( $bg_color ) . '}';
	echo 'button.components-circular-option-picker__option[aria-label="Color: Light/Dark Theme Highlight"] { background: linear-gradient(90deg, #45464b 50%, #f2f2f2 50%) !important; color: transparent !important}';
	// echo 'button.components-circular-option-picker__option[aria-label="Color: Light/Dark Theme Highlight"]::after { content:\'\'; width:14px; height:28px; background: #131315; border-radius:0; border-top-left-radius:14px; border-bottom-left-radius: 14px; position:absolute; top:0;left:0 }';
	echo '</style>';

}

add_action('admin_head', 'tfm_admin_gutenberg_inline_css');

 ?>