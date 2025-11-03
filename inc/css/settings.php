<?php

// ========================================================
// Theme Settings CSS
// ========================================================

// Logo

$custom_css[] = '--logo-font-size:' . get_theme_mod( 'tfm_logo_font_size', '40' ) . 'px;';
$custom_css[] = '--large-mobile-logo-font-size:' . get_theme_mod( 'tfm_logo_font_size_medium_mobile', '28' ) . 'px;';
$custom_css[] = '--mobile-logo-font-size:' . get_theme_mod( 'tfm_logo_font_size_small_mobile', '20' ) . 'px;';
$custom_css[] = '--custom-logo-width-mobile:' . get_theme_mod( 'tfm_custom_logo_max_width_mobile', '100' ) . 'px;';
$custom_css[] = '--custom-logo-width-small-mobile:' . get_theme_mod( 'tfm_custom_logo_max_width_small', '70' ) . 'px;';
// Sidebar Logo
$custom_css[] = '--sidebar-logo-font-size:' . get_theme_mod( 'tfm_logo_font_size_sidebar', '40' ) . 'px;';

// General
$custom_css[] = '--site-width:' . get_theme_mod( 'tfm_site_width', $customizer_settings['site_width'] ) . 'px; --site-max-width: ' . get_theme_mod( 'tfm_site_width', $customizer_settings['site_width'] ) . 'px;';
$custom_css[] = ( get_theme_mod( 'tfm_sidebar_width', $customizer_settings['sidebar_width'] ) !== $customizer_settings['sidebar_width'] ? '--sidebar-width: calc(' . get_theme_mod( 'tfm_sidebar_width', $customizer_settings['sidebar_width'] ) . 'px + ( var(--post-margin) * 2));' : '' );

// Content max width not more than site width
$content_max_width = get_theme_mod( 'tfm_content_max_width', $customizer_settings['content_max_width'] ) > get_theme_mod( 'tfm_site_width', $customizer_settings['site_width'] ) ? get_theme_mod( 'tfm_site_width', $customizer_settings['site_width'] ) : get_theme_mod( 'tfm_content_max_width', $customizer_settings['content_max_width'] );

// Modified content width
$custom_css[] = ( get_theme_mod( 'tfm_content_max_width', $customizer_settings['content_max_width'] ) !== $customizer_settings['content_max_width'] ? '--content-max-width:' . $content_max_width . 'px;' : '' );

// Unchanged content width is more than site width
$custom_css[] = ( get_theme_mod( 'tfm_content_max_width', $customizer_settings['content_max_width'] ) === $customizer_settings['content_max_width'] && get_theme_mod( 'tfm_content_max_width', $customizer_settings['content_max_width'] ) > get_theme_mod( 'tfm_site_width', $customizer_settings['site_width'] ) ? '--content-max-width:' . $content_max_width . 'px;' : '' );

// Border radius

$custom_css[] =  ( $customizer_settings['input_border_radius'] !== get_theme_mod( 'tfm_input_border_radius', $customizer_settings['input_border_radius'] ) ? '--input-border-radius:' . get_theme_mod( 'tfm_input_border_radius', $customizer_settings['input_border_radius'] ) . 'px;' : '' );
$custom_css[] =  ( $customizer_settings['button_border_radius'] !== get_theme_mod( 'tfm_button_border_radius', $customizer_settings['button_border_radius'] ) ? '--button-border-radius:' . get_theme_mod( 'tfm_button_border_radius', $customizer_settings['button_border_radius'] ) . 'px;' : '' );
$custom_css[] =  ( $customizer_settings['thumbnail_border_radius'] != get_theme_mod( 'tfm_thumbnail_border_radius', $customizer_settings['thumbnail_border_radius'] ) ? '--post-thumbnail-border-radius:' . get_theme_mod( 'tfm_thumbnail_border_radius', $customizer_settings['thumbnail_border_radius'] ) . 'px;' : '' );
$custom_css[] =  ( 0 !== get_theme_mod( 'tfm_image_embed_border_radius', 0 ) ? '--image-embed-border-radius:' . get_theme_mod( 'tfm_image_embed_border_radius', 0 ) . 'px;' : '' );