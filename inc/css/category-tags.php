<?php

// ========================================================
// Category & Tag Slug colors
// ========================================================

if ( ! function_exists( 'mozda_build_category_pill_rule' ) ) {
	/**
	 * Generate CSS custom property declarations for category pills.
	 *
	 * @param string $selector CSS selector to target.
	 * @param string $accent   Base accent colour.
	 * @param string $text     Foreground colour.
	 * @return string
	 */
	function mozda_build_category_pill_rule( $selector, $accent = '', $text = '' ) {
		$rules  = array();
		$accent = mozda_normalize_hex_color( $accent );

		if ( $accent ) {
			$rules[] = '--mozda-category-accent:' . $accent;

			$accent_soft = mozda_lighten_hex_color( $accent, 0.75 );
			if ( $accent_soft ) {
				$rules[] = '--mozda-category-accent-soft:' . $accent_soft;
				if ( ! $text ) {
					$text = mozda_get_contrast_color( $accent_soft );
				}
			}

			$accent_border = mozda_darken_hex_color( $accent, 0.15 );
			if ( $accent_border ) {
				$rules[] = '--mozda-category-border:' . $accent_border;
			}
		}

		$text = mozda_normalize_hex_color( $text );
		if ( $text ) {
			$rules[] = '--mozda-category-foreground:' . $text;
		}

		if ( empty( $rules ) ) {
			return '';
		}

		$declarations = implode(
			'',
			array_map(
				function ( $rule ) {
					return $rule . ';';
				},
				$rules
			)
		);

		return $selector . ' { ' . $declarations . ' }';
	}
}

$categories      = apply_filters( 'tfm_set_category_colors', true ) ? array_slice( get_categories( 'type=post' ), 0, apply_filters( 'tfm_set_category_colors_max_count', 50 ) ) : false;
$tags            = apply_filters( 'tfm_set_tag_colors', false ) ? array_slice( get_tags(), 0, apply_filters( 'tfm_set_tag_colors_max_count', 50 ) ) : false;
$shop_categories = class_exists( 'WooCommerce' ) ? get_categories( array( 'taxonomy' => 'product_cat' ) ) : false;
$custom_slug_color = array();

if ( $categories || $tags || $shop_categories ) :

	// Categories.
	if ( $categories ) {
		$default_rule = mozda_build_category_pill_rule(
			'.entry-meta .categories li',
			get_theme_mod( 'category_slug_background', $customizer_settings['category_slug_background'] ),
			get_theme_mod( 'category_slug_color', $customizer_settings['category_slug_color'] )
		);

		if ( $default_rule ) {
			$custom_slug_color[] = $default_rule;
		}

		$dark_rule = mozda_build_category_pill_rule(
			'body.tfm-dark-mode .entry-meta .categories li, body[data-color-mode="dark"]:not(.tfm-light-mode) .entry-meta .categories li, body.custom-background.tfm-dark-mode .entry-meta .categories li',
			get_theme_mod( 'category_slug_background_dark', $customizer_settings['category_slug_background_dark'] ),
			get_theme_mod( 'category_slug_color_dark', $customizer_settings['category_slug_color_dark'] )
		);

		if ( $dark_rule ) {
			$custom_slug_color[] = $dark_rule;
		}

		// Maintain widget/sub-category styling.
		$widget_base_css = '';
		$widget_color    = mozda_normalize_hex_color( get_theme_mod( 'category_slug_color', $customizer_settings['category_slug_color'] ) );
		$widget_bg       = mozda_normalize_hex_color( get_theme_mod( 'category_slug_background', $customizer_settings['category_slug_background'] ) );

		if ( $widget_color ) {
			$widget_base_css .= 'color:' . $widget_color . ';';
		}
		if ( $widget_bg ) {
			$widget_base_css .= 'background:' . $widget_bg . '; border: 0 !important;';
		}

		if ( $widget_base_css ) {
			$custom_slug_color[] = '.widget a[class*="tag-link"], .sub-categories a[class*="cat-link"] { ' . $widget_base_css . ' }';
		}

		$widget_dark_css = '';
		$widget_dark_color = mozda_normalize_hex_color( get_theme_mod( 'category_slug_color_dark', $customizer_settings['category_slug_color_dark'] ) );
		$widget_dark_bg    = mozda_normalize_hex_color( get_theme_mod( 'category_slug_background_dark', $customizer_settings['category_slug_background_dark'] ) );

		if ( $widget_dark_color ) {
			$widget_dark_css .= 'color:' . $widget_dark_color . ';';
		}
		if ( $widget_dark_bg ) {
			$widget_dark_css .= 'background:' . $widget_dark_bg . '; border: 0 !important;';
		}

		if ( $widget_dark_css ) {
			$custom_slug_color[] = 'body.tfm-dark-mode .widget a[class*="tag-link"], body[data-color-mode="dark"]:not(.tfm-light-mode) .widget a[class*="tag-link"], body.custom-background.tfm-dark-mode .widget a[class*="tag-link"], body.tfm-dark-mode .sub-categories a[class*="cat-link"], body[data-color-mode="dark"]:not(.tfm-light-mode) .sub-categories a[class*="cat-link"], body.custom-background.tfm-dark-mode .sub-categories a[class*="cat-link"] { ' . $widget_dark_css . ' }';
		}

		// Per-category overrides.
		foreach ( $categories as $value ) {
			$cat_rule = mozda_build_category_pill_rule(
				'.entry-meta li.cat-id-' . $value->term_id,
				get_theme_mod( 'category_slug_background_' . $value->slug, '' ),
				get_theme_mod( 'category_slug_color_' . $value->slug, '' )
			);

			if ( $cat_rule ) {
				$custom_slug_color[] = $cat_rule;
			}

			$cat_widget_css = '';
			$cat_widget_color = mozda_normalize_hex_color( get_theme_mod( 'category_slug_color_' . $value->slug, '' ) );
			$cat_widget_bg    = mozda_normalize_hex_color( get_theme_mod( 'category_slug_background_' . $value->slug, '' ) );

			if ( $cat_widget_color ) {
				$cat_widget_css .= 'color:' . $cat_widget_color . ' !important;';
			}
			if ( $cat_widget_bg ) {
				$cat_widget_css .= 'background:' . $cat_widget_bg . ' !important; border: 0 !important;';
			}

			if ( $cat_widget_css ) {
				$custom_slug_color[] = '.widget a.tag-link-' . $value->term_id . ', .sub-categories a.cat-link-' . $value->term_id . ' { ' . $cat_widget_css . ' }';
			}
		}
	}

	// Tags.
	if ( $tags ) {
		foreach ( $tags as $value ) {
			$tag_color = mozda_normalize_hex_color( get_theme_mod( 'tag_slug_color_' . $value->slug, '' ) );
			if ( $tag_color ) {
				$custom_slug_color[] = '.single-post-tags a.tag-link-' . $value->term_id . ', .widget a.tag-link-' . $value->term_id . ' { background:' . $tag_color . '; color:#ffffff }';
			}
		}
	}

	// Shop Categories.
	if ( $shop_categories ) {
		foreach ( $shop_categories as $value ) {
			$shop_color = mozda_normalize_hex_color( get_theme_mod( 'woo_category_slug_color_' . $value->slug, '' ) );
			if ( $shop_color ) {
				$custom_slug_color[] = '.entry-meta a.cat-link-' . $value->term_id . ' { color:' . $shop_color . '; }';
			}
		}
	}

	$slug_colors = array_filter( $custom_slug_color );

	if ( count( $slug_colors ) !== 0 ) :

		echo '<style type="text/css" id="mozda-custom-slug-css">';
		foreach ( $slug_colors as $css ) {
			echo wp_strip_all_tags( $css ) . "\n";
		}
		echo '</style>' . "\n";

	endif;

endif;
