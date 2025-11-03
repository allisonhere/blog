<?php

// ========================================================
// Category & Tag Slug colors
// ========================================================

$categories = apply_filters( 'tfm_set_category_colors', true ) ? array_slice( get_categories('type=post'), 0, apply_filters( 'tfm_set_category_colors_max_count', 50 ) ) : false;
$tags = apply_filters( 'tfm_set_tag_colors', false ) ? array_slice( get_tags(), 0, apply_filters( 'tfm_set_tag_colors_max_count', 50 ) ) : false;
$shop_categories = class_exists('WooCommerce') ? get_categories( array( 'taxonomy' => 'product_cat') ) : false;

if ( $categories || $tags || $shop_categories) :

	// Categories
	if ( $categories ) {

		// light
		$slug_color = '' !== get_theme_mod( 'category_slug_color', $customizer_settings['category_slug_color'] ) ? 'color:' . get_theme_mod( 'category_slug_color', $customizer_settings['category_slug_color']  ) . ';' : '';
		$slug_background = ''  !== get_theme_mod( 'category_slug_background', $customizer_settings['category_slug_background']  ) ? 'background:' . get_theme_mod( 'category_slug_background', $customizer_settings['category_slug_background']  ) . '; border: 0 !important;' : '';

		// dark
		$slug_color_dark = $customizer_settings['category_slug_color_dark'] !== get_theme_mod( 'category_slug_color_dark', $customizer_settings['category_slug_color_dark'] ) ? 'color:' . get_theme_mod( 'category_slug_color_dark', $customizer_settings['category_slug_color_dark'] ) . ';' : '';
		$slug_background_dark = $customizer_settings['category_slug_background_dark'] !== get_theme_mod( 'category_slug_background_dark', $customizer_settings['category_slug_background_dark']  ) ? 'background:' . get_theme_mod( 'category_slug_background_dark', $customizer_settings['category_slug_background_dark']  ) . '; border: 0 !important;' : '';

		// light
		$custom_slug_color[] =  ( $slug_color || $slug_background ? '.entry-meta a[class*="cat-link"] { ' . $slug_color . $slug_background . ' } .widget a[class*="tag-link"], .sub-categories a[class*="cat-link"] { ' . $slug_color . $slug_background . ' }' : '' );
		// dark
		$custom_slug_color[] =  ( $slug_color_dark || $slug_background_dark ? 'body.tfm-dark-mode .entry-meta a[class*="cat-link"], body[data-color-mode="dark"]:not(.tfm-light-mode) .entry-meta a[class*="cat-link"], body.custom-background.tfm-dark-mode .entry-meta a[class*="cat-link"] { ' . $slug_color_dark . $slug_background_dark . ' } .widget a[class*="tag-link"], .sub-categories a[class*="cat-link"] { ' . $slug_color_dark . $slug_background_dark . ' }' : '' );


		// Custom category tags
		foreach ( $categories as $key => $value) {

		$slug_color = '' !== get_theme_mod( 'category_slug_color_' . $value->slug . '', '' ) ? 'color:' . get_theme_mod( 'category_slug_color_' . $value->slug . '', '' ) . ' !important;' : '';
		$slug_background = '' !== get_theme_mod( 'category_slug_background_' . $value->slug . '', '' ) ? 'background:' . get_theme_mod( 'category_slug_background_' . $value->slug . '', '' ) . ' !important; border: 0 !important;' : '';

			$custom_slug_color[] =  ( $slug_color || $slug_background ? 'body .entry-meta a.cat-link-' . $value->term_id . ' { ' . $slug_color . $slug_background . '} .widget a.tag-link-' . $value->term_id . ', .sub-categories a.cat-link-' . $value->term_id . ' { ' . $slug_color . $slug_background . ' }' : '' );
			
		}

	}

	// Tags
	if ( $tags ) {
		
		foreach ($tags as $key => $value) {

			$custom_slug_color[] =  ( '' !== get_theme_mod( 'tag_slug_color_' . $value->slug . '', '' ) ? '.single-post-tags a.tag-link-' . $value->term_id . ', .widget a.tag-link-' . $value->term_id . ' { background:' . get_theme_mod( 'tag_slug_color_' . $value->slug . '', '' ) . '; color: #ffffff }' : '' );
			
		}

	}

	// Shop Categories
	if ( $shop_categories) {

		foreach ($shop_categories as $key => $value) {

			$custom_slug_color[] =  ( '' !== get_theme_mod( 'woo_category_slug_color_' . $value->slug . '', '' ) ? '.entry-meta a.cat-link-' . $value->term_id . ' { color:' . get_theme_mod( 'woo_category_slug_color_' . $value->slug . '', '' ) . '; }' : '' );
			
		}

	}

	$slug_colors = array_filter($custom_slug_color);

	if ( count($slug_colors) !== 0 ) :

		echo '<style type="text/css" id="mozda-custom-slug-css">';
		foreach ($slug_colors as $css ) {
			echo wp_strip_all_tags( $css ) . "\n";
		}
		echo  '</style>' . "\n";

	endif;

endif;