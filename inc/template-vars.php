<?php

/**
 * Template variables
 *
 * @package WordPress
 * @subpackage Personal_Blog
 * @since 1.0
 * @version 1.0
 */

/**
 * This file contains the variables and queries
 * that would othersise exists inside template parts
 * */

if ( ! function_exists( 'tfm_template_vars' ) ) {

	function tfm_template_vars( $template = '', $args = false ) {

		$customizer_settings = tfm_general_settings();

		$faux_count = isset($args['faux_count']) ? $args['faux_count'] : null;
		$true_count = isset($args['count']) ? $args['count'] : null;

		global $post;
		global $wp_query;


		$queried_object = get_queried_object();
		$post_count = $wp_query->found_posts;

		$post_layout = tfm_get_post_layout();
		$post_cols = tfm_get_post_cols( 'count' );

		// ========================================================
		// Cover wrapper
		// ========================================================

		$cover_wrapper = ( ( is_single() || is_page() ) && in_array('cover', get_post_class( ) ) && ! in_array('disabled-post-thumbnail', get_post_class( )) ? ' cover-wrapper' : false );

		// ========================================================
		// Post style
		// ========================================================

		$post_media = is_archive() || is_search() ? get_theme_mod( 'tfm_archive_post_media', true ) : get_theme_mod( 'tfm_homepage_post_media', true);

		$post_style = ( is_home() ? get_theme_mod( 'tfm_homepage_loop_style', 'default' ) : get_theme_mod( 'tfm_archive_loop_style', 'default' )  );
		if ( ! is_single() && has_post_format( 'image') ) {
			$post_style = 'cover';
		}
		if ( ( ( has_post_format( 'video' ) && tfm_featured_video( true ) ) || ( has_post_format( 'audio') && tfm_featured_audio( true )) ) && $post_media ) {
			$post_style = 'default';
		}
		if ( is_single() ) {
			if ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_single_post_style', true ) && get_post_meta( get_the_ID(), 'tfm_single_post_style', true ) !== 'global' ) {
				$post_style = get_post_meta( get_the_ID(), 'tfm_single_post_style', true );
			} else {
				$post_style = get_theme_mod( 'tfm_single_post_style', 'default' );
			}
			if ( ( has_post_format('video') || has_post_format( 'audio' ) ) && $post_style === 'cover' ) {
				$post_style = 'default';
			}
		}
		if ( is_page() ) {
			// $post_style = get_theme_mod( 'tfm_page_style', 'default' );
			if ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_page_style', true ) && get_post_meta( get_the_ID(), 'tfm_page_style', true ) !== 'global' ) {
				$post_style = get_post_meta( get_the_ID(), 'tfm_page_style', true );
			} else {
				$post_style = get_theme_mod( 'tfm_page_style', 'default' );
			}
		}

		// ========================================================
		// Post thumbnail
		// ========================================================

		$disabled_thumbnail = ( in_array('disabled-post-thumbnail', get_post_class()) ? true : false );
		$post_thumbnail = '' !== get_the_post_thumbnail() && ! $disabled_thumbnail && ! tfm_featured_video( true ) && ! tfm_featured_audio( true ) ? true : false;
		$thumbnail_size = ( $args && $args['count'] ? $args['count'] : '' );
		$figcaption = ( is_single() && ! $cover_wrapper && get_post( get_post_thumbnail_id() )->post_excerpt ? ' has-figcaption' : false );

		// ========================================================
		// Entry wrapper list and cover
		// ========================================================

		$has_entry_wrapper = (( ! is_single() || ( is_single() && $post_thumbnail ) ) && $post_style === 'cover' ) || ($post_layout === 'list' && has_post_thumbnail() && ! $disabled_thumbnail ) ? true : false;

		// ========================================================
		// Entry header (single/page)
		// ========================================================
		$hero = ( is_single() || is_page() ) && has_post_thumbnail() && in_array('has-sidebar', get_body_class()) && in_array('sidebar-after', get_body_class()) ? true : false;

		$hero_entry_header = ( is_single() || is_page() ) && in_array('has-sidebar', get_body_class()) && in_array('sidebar-after', get_body_class()) && ( ( $post_thumbnail && $post_style !== 'default' ) || ! $post_thumbnail ) ? true : false;

		if ( $hero ) {
			$post_thumbnail = false;
		}
		if ( $hero_entry_header ) {
			$has_entry_wrapper = false;
		}

		$has_entry_header = ( is_single() || is_page() ) && ! $hero_entry_header ? true : false;

		// ========================================================
		// Entry title
		// ========================================================

		$entry_title = ( is_home() ? get_theme_mod( 'tfm_homepage_entry_title', true ) : get_theme_mod( 'tfm_archive_entry_title', true ) );
		if  ( has_post_format( 'image' ) && false === get_theme_mod( 'tfm_image_format_use_global', true ) ) {
			$entry_title = get_theme_mod( 'tfm_image_format_entry_title', true );
		}

		// ========================================================
		// Full width single
		// ========================================================

		$full_width = is_single() || is_page() ? tfm_full_width_featured_media( true ) : '';

		// ========================================================
		// Hero header
		// ========================================================

		$hero_header = is_single() && in_array('has-sidebar', get_body_class()) && '' !== $full_width && 'cover' === $post_style ? true : false;

		// ========================================================
		// Pagination
		// ========================================================
		$show_pagination_numbers = ( get_theme_mod( 'tfm_pagination_numbers', true ) ? ' has-pagination-numbers' : '' );
		$show_pagination_prev_next = ( get_theme_mod( 'tfm_pagination_prev_next', true ) ? ' has-pagination-prev-next' : '' );

		// ========================================================
		// Header
		// ========================================================

		$sticky_nav = ( get_theme_mod( 'tfm_sticky_nav', true ) ? ' sticky-nav' : '' );
		$sticky_mobile_nav = ( get_theme_mod( 'tfm_sticky_nav_mobile', true ) ? ' sticky-mobile-nav' : '' );
		$header_size = ( get_theme_mod( 'tfm_header_full_width', false) ? ' fullwidth' : '' );
		$header_search_input = ( get_theme_mod( 'tfm_header_search_input', false) ? ' has-search-input' : '' );
		$header_primary_nav = ( has_nav_menu( 'primary' ) ? ' has-primary-nav' : '' );
		$header_secondary_nav = ( has_nav_menu( 'header-secondary' ) ? ' has-secondary-nav' : '' );
		$header_third_nav = ( has_nav_menu( 'header-third' ) ? ' has-third-nav' : '' );
		$header_split_menu = ( 'logo-split-menu' === get_theme_mod( 'tfm_header_layout', 'default' ) && has_nav_menu( 'split-menu-left' ) ? ' has-split-menu-left' : '' );
		$header_split_menu .= ( 'logo-split-menu' === get_theme_mod( 'tfm_header_layout', 'default' ) && has_nav_menu( 'split-menu-right' ) ? ' has-split-menu-right' : '' );
		$header_toggle_icons = ( get_theme_mod( 'tfm_toggle_menu', true ) ? ' has-toggle-menu' : '' );
		$header_toggle_icons .= ( get_theme_mod( 'tfm_toggle_search', true ) ? ' has-toggle-search' : '' );
		$header_toggle_icons .= ( get_theme_mod( 'tfm_toggle_color_mode', true ) ? ' has-toggle-color-mode' : '' );
		$header_social_icons = function_exists('tfm_social_icons_theme_header') && get_theme_mod( 'tfm_header_social', false ) ? ' has-tfm-social-icons' : '';
		$header_background = '' !== get_theme_mod( 'tfm_header_background_color', '' ) ? ' has-background' : '';

		$overlay_header = is_single() ? get_theme_mod( 'tfm_header_overlay_single', true ) : get_theme_mod( 'tfm_header_overlay_homepage', true );
		$header_overlay = $overlay_header ? ' overlay-header' : '';

		// ========================================================
		// Footer
		// ========================================================

		$footer_classes = function_exists('tfm_social_icons_theme_footer') && get_theme_mod( 'tfm_footer_social', false ) ? ' has-tfm-social-icons' : '';
		$footer_classes = function_exists('tfm_social_icons_theme_footer') && get_theme_mod( 'tfm_footer_text_social_icons', false ) ? ' has-footer-text-social-icons' : '';

		$footer_classes .= has_nav_menu( 'footer' ) ? ' has-footer-nav' : '';
		$footer_classes .= get_theme_mod( 'tfm_footer_text', get_bloginfo('description') ) ? ' has-footer-text' : '';
		$footer_classes .= $customizer_settings['tfm_footer_background'] !== get_theme_mod( 'tfm_footer_background', $customizer_settings['tfm_footer_background'] ) ? ' has-custom-background' : '';
		$footer_classes .= '' !== $customizer_settings['tfm_footer_background']  ? ' has-background' : '';
		$footer_classes .= $customizer_settings['tfm_footer_font_color'] !== get_theme_mod( 'tfm_footer_font_color', $customizer_settings['tfm_footer_font_color'] ) ? ' has-custom-color' : '';
		$footer_classes .= $customizer_settings['tfm_footer_link_color'] !== get_theme_mod( 'tfm_footer_link_color', $customizer_settings['tfm_footer_link_color'] ) ? ' has-custom-link-color' : '';

		// remove single overlay class for unsupported settings
		// we also fallback to CSS

		if ( is_single() && 
		( in_array('has-tfm-ad-after-header', get_body_class()) || // has ads
		in_array('has-tfm-ad-before-header', get_body_class()) || // has ads
		in_array('sidebar-side', get_body_class()) || // sidebar side
		'' === $full_width || // not full width media
		'default-alt' === $post_style || // unsupported post style
		'' !== $header_size || // has full width header
		( 'logo-split-menu' !== get_theme_mod( 'tfm_header_layout', 'logo-left-menu-right' ) && // unsupported header layouts
		'logo-left-menu-right' !== get_theme_mod( 'tfm_header_layout', 'logo-left-menu-right' )))) {
			$header_overlay = '';
		}

		// ========================================================
		// Sidebar
		// ========================================================

		$sidebar = '';
		if ( current_theme_supports( 'woocommerce') && class_exists('WooCommerce')) {
			if ( is_page( 'cart' ) || is_page( 'checkout') || is_page( 'basket' ) || is_account_page() ) {
				$sidebar = 'shop';
			}

		}

		return array(
			'show_pagination_numbers' => $show_pagination_numbers,
			'show_pagination_prev_next' => $show_pagination_prev_next,
			'post_count' => $post_count,
			'object' => $queried_object,
			'sticky_nav' => $sticky_nav,
			'sticky_mobile_nav' => $sticky_mobile_nav,
			'header_size' => $header_size,
			'header_search_input' => $header_search_input,
			'header_toggle_icons' => $header_toggle_icons,
			'header_primary_nav' => $header_primary_nav,
			'header_secondary_nav' => $header_secondary_nav,
			'header_third_nav' => $header_third_nav,
			'header_split_menu' => $header_split_menu,
			'header_social_icons' => $header_social_icons,
			'header_background' => $header_background,
			'header_overlay' => $header_overlay,
			'footer_classes' => $footer_classes,
			'sidebar' => $sidebar,
			'content' => array(
				'hero_entry_header' => $hero_entry_header,
				'entry_wrapper' => $has_entry_wrapper,
				'entry_header' => $has_entry_header,
				'cover_wrapper' => $cover_wrapper,
				'post_thumbnail' => $post_thumbnail,
				'disabled_thumbnail' => $disabled_thumbnail,
				'thumbnail_size' => $thumbnail_size,
				'figcaption' => $figcaption,
				'entry_title' => $entry_title,
				'post_style' => $post_style,
				'hero_header' => $hero_header,
				'full_width' => $full_width,
			),
		);

	}

} ?>