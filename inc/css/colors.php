<?php

// ========================================================
// Colors CSS
// ========================================================

$scheme = '';

$custom_css[] = array_key_exists('primary_theme_color' . $scheme, $customizer_settings ) ? '--primary-theme-color:' . get_theme_mod( 'tfm_primary_theme_color' . $scheme, $customizer_settings['primary_theme_color' . $scheme] ) . ';' : ''; 
$custom_css[] = array_key_exists('secondary_theme_color' . $scheme, $customizer_settings ) ? '--secondary-theme-color:' . get_theme_mod( 'tfm_secondary_theme_color' . $scheme, $customizer_settings['secondary_theme_color' . $scheme] ) . ';' : '';
$custom_css[] = array_key_exists('tertiary_theme_color' . $scheme, $customizer_settings ) ? '--tertiary-theme-color:' . get_theme_mod( 'tfm_tertiary_theme_color' . $scheme, $customizer_settings['tertiary_theme_color' . $scheme] ) . ';' : '';


// Body font colour
$custom_css[] = ( get_theme_mod( 'tfm_body_font_color' . $scheme, $customizer_settings['tfm_body_font_color' . $scheme] ) !== $customizer_settings['tfm_body_font_color' . $scheme] ? '--body-font-color:' . get_theme_mod( 'tfm_body_font_color' . $scheme, $customizer_settings['tfm_body_font_color' . $scheme] ) . ';' : '' );

// Link colour
$custom_css[] = ( get_theme_mod( 'tfm_link_color' . $scheme, $customizer_settings['tfm_link_color' . $scheme] ) !== '' ? '--link-color:' . get_theme_mod( 'tfm_link_color' . $scheme, $customizer_settings['tfm_link_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( get_theme_mod( 'tfm_link_hover_color' . $scheme, $customizer_settings['tfm_link_hover_color' . $scheme] ) !== '' ? '--link-hover-color:' . get_theme_mod( 'tfm_link_hover_color' . $scheme, $customizer_settings['tfm_link_hover_color' . $scheme] ) . ';' : '' );

// ========================================================
// Button
// ========================================================

$button_background = get_theme_mod( 'tfm_button_background' . $scheme, $customizer_settings['tfm_button_background' . $scheme] );
$button_gradient = get_theme_mod( 'tfm_button_background_gradient' . $scheme, $customizer_settings['tfm_button_background_gradient' . $scheme]  );

$button_css = ( $button_background || ( $button_background && $button_gradient ) ) ? '--button-background:' : '';
if ( $button_background && ! $button_gradient ) {
    $button_css .= $button_background . ';';
}
if ( $button_background && $button_gradient ) {
    $button_css .= 'linear-gradient( var(--button-gradient-deg), ' . $button_gradient . ', ' .$button_background . ');';
}

$custom_css[] = $button_css;


$custom_css[] = ( get_theme_mod( 'tfm_button_color' . $scheme, $customizer_settings['tfm_button_color' . $scheme] ) !== '' ? '--button-color:' . get_theme_mod( 'tfm_button_color' . $scheme, $customizer_settings['tfm_button_color' . $scheme]  ) . ';' : '' );

// ========================================================
// Body
// ========================================================

$body_background = get_theme_mod( 'tfm_body_background_color' . $scheme, $customizer_settings['tfm_body_background_color' . $scheme] );
$body_gradient = get_theme_mod( 'tfm_body_background_gradient' . $scheme, $customizer_settings['tfm_body_background_gradient' . $scheme]  );

$body_css = ( $body_background || ( $body_background && $body_gradient ) ) ? '--body-background:' : '';
if ( $body_background && ! $body_gradient ) {
    $body_css .= $body_background . ';';
}
if ( $body_background && $body_gradient ) {
    $body_css .= 'linear-gradient( var(--body-gradient-deg), ' . $body_gradient . ', ' .$body_background . ');';
}

$custom_css[] = $body_css;


// ========================================================
// Header
// ========================================================

$header_background = get_theme_mod( 'tfm_header_background_color' . $scheme, $customizer_settings['tfm_header_background_color' . $scheme] );
$header_gradient = get_theme_mod( 'tfm_header_background_gradient' . $scheme, $customizer_settings['tfm_header_background_gradient' . $scheme] );

$header_css = ( $header_background || ( $header_background && $header_gradient ) ) ? '--header-background:' : '';
if ( $header_background && ! $header_gradient ) {
    $header_css .= $header_background . ';';
}
if ( $header_background && $header_gradient ) {
    $header_css .= 'linear-gradient( var(--header-gradient-deg), ' . $header_gradient . ', ' .$header_background . ');';
}

$custom_css[] = $header_css;

$custom_css[] = ( '' !== get_theme_mod( 'tfm_header_color' . $scheme, $customizer_settings['tfm_header_color' . $scheme] ) ? '--header-color:' . get_theme_mod( 'tfm_header_color' . $scheme, $customizer_settings['tfm_header_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_header_logo_color' . $scheme, $customizer_settings['tfm_header_logo_color' . $scheme] ) ? '--logo-color:' . get_theme_mod( 'tfm_header_logo_color' . $scheme, $customizer_settings['tfm_header_logo_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_header_elements_background' . $scheme, $customizer_settings['tfm_header_elements_background' . $scheme] ) ? '--header-elements-background:' . get_theme_mod( 'tfm_header_elements_background' . $scheme, $customizer_settings['tfm_header_elements_background' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_header_elements_color' . $scheme, $customizer_settings['tfm_header_elements_color' . $scheme] ) ? '--header-elements-color:' . get_theme_mod( 'tfm_header_elements_color' . $scheme, $customizer_settings['tfm_header_elements_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_header_color' . $scheme, $customizer_settings['tfm_header_color' . $scheme] ) ? '--header-border-color:' . tfm_hex2rgba(get_theme_mod( 'tfm_header_color' . $scheme, $customizer_settings['tfm_header_color' . $scheme] ), $alpha = 0.2 ) . ';' : '' );

// ========================================================
// Footer
// ========================================================

$footer_background = get_theme_mod( 'tfm_footer_background' . $scheme, $customizer_settings['tfm_footer_background' . $scheme] );
$footer_gradient = get_theme_mod( 'tfm_footer_background_gradient' . $scheme, $customizer_settings['tfm_footer_background_gradient' . $scheme] );

$footer_css = ( $footer_background || ( $footer_background && $footer_gradient ) ) ? '--footer-background:' : '';
if ( $footer_background && ! $footer_gradient ) {
    $footer_css .= $footer_background . ';';
}
if ( $footer_background && $footer_gradient ) {
    $footer_css .= 'linear-gradient( var(--footer-gradient-deg), ' . $footer_gradient . ', ' .$footer_background . ');';
}

$custom_css[] = $footer_css;

$custom_css[] = ( '' !== get_theme_mod( 'tfm_footer_font_color' . $scheme, $customizer_settings['tfm_footer_font_color' . $scheme]  ) ? '--footer-color:' . get_theme_mod( 'tfm_footer_font_color' . $scheme, $customizer_settings['tfm_footer_font_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_footer_link_color' . $scheme, $customizer_settings['tfm_footer_link_color' . $scheme]  ) ? '--footer-link-color:' . get_theme_mod( 'tfm_footer_link_color' . $scheme, $customizer_settings['tfm_footer_link_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_footer_font_color' . $scheme, $customizer_settings['tfm_footer_font_color' . $scheme] ) ? '--footer-border-color:' . tfm_hex2rgba(get_theme_mod( 'tfm_footer_font_color' . $scheme, $customizer_settings['tfm_footer_font_color' . $scheme] ), $alpha = 0.2 ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_footer_font_color' . $scheme, $customizer_settings['tfm_footer_font_color' . $scheme] ) ? '--footer-input-background:' . tfm_hex2rgba(get_theme_mod( 'tfm_footer_font_color' . $scheme, $customizer_settings['tfm_footer_font_color' . $scheme] ), $alpha = 0.1 ) . ';' : '' );

// ========================================================
// Page/Archive Header
// ========================================================
$custom_css[] = ( '' !== get_theme_mod( 'tfm_archive_header_background' . $scheme, $customizer_settings['tfm_archive_header_background' . $scheme]  ) ? '--archive-header-background:' . get_theme_mod( 'tfm_archive_header_background' . $scheme, $customizer_settings['tfm_archive_header_background' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_archive_header_color' . $scheme, $customizer_settings['tfm_archive_header_color' . $scheme] ) ? '--archive-header-color:' . get_theme_mod( 'tfm_archive_header_color' . $scheme, $customizer_settings['tfm_archive_header_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_archive_header_meta_color' . $scheme, $customizer_settings['tfm_archive_header_meta_color' . $scheme] ) ? '--archive-header-meta-color:' . get_theme_mod( 'tfm_archive_header_meta_color' . $scheme, $customizer_settings['tfm_archive_header_meta_color' . $scheme] ) . ';' : '' );

// ========================================================
// Section header
// ========================================================
$custom_css[] = ( '' !== get_theme_mod( 'tfm_section_header_color' . $scheme, $customizer_settings['tfm_section_header_color' . $scheme] ) ? '--section-header-color:' . get_theme_mod( 'tfm_section_header_color' . $scheme, $customizer_settings['tfm_section_header_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_section_header_meta_color' . $scheme, $customizer_settings['tfm_section_header_meta_color' . $scheme] ) ? '--section-header-meta-color:' . get_theme_mod( 'tfm_section_header_meta_color' . $scheme, $customizer_settings['tfm_section_header_meta_color' . $scheme] ) . ';' : '' );

// ========================================================
// Posts
// ========================================================

$default_post_background = array_key_exists('default_post_background' . $scheme, $customizer_settings ) ? $customizer_settings['default_post_background' . $scheme] : '';

$tfm_post_background = '' !== get_theme_mod( 'tfm_post_background' . $scheme, $customizer_settings['default_post_background' . $scheme] ) ? get_theme_mod( 'tfm_post_background' . $scheme, $customizer_settings['default_post_background' . $scheme] ) : $default_post_background;

$custom_css[] = ( '' !== $tfm_post_background ? '--post-background:' . $tfm_post_background . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_entry_title_link_color' . $scheme, $customizer_settings['tfm_entry_title_link_color' . $scheme] ) ? '--entry-title-color:' . get_theme_mod( 'tfm_entry_title_link_color' . $scheme, $customizer_settings['tfm_entry_title_link_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_entry_color' . $scheme, $customizer_settings['tfm_entry_color' . $scheme]  ) ? '--entry-color:' . get_theme_mod( 'tfm_entry_color' . $scheme, $customizer_settings['tfm_entry_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_entry_meta_color' . $scheme, $customizer_settings['tfm_entry_meta_color' . $scheme] ) ? '--entry-meta-color:' . get_theme_mod( 'tfm_entry_meta_color' . $scheme, $customizer_settings['tfm_entry_meta_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_entry_meta_link_color' . $scheme, $customizer_settings['tfm_entry_meta_link_color' . $scheme] ) ? '--entry-meta-link-color:' . get_theme_mod( 'tfm_entry_meta_link_color' . $scheme, $customizer_settings['tfm_entry_meta_link_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_continue_reading_button_color' . $scheme, $customizer_settings['tfm_continue_reading_button_color' . $scheme]  ) ? '--continue-reading-button-color:' . get_theme_mod( 'tfm_continue_reading_button_color' . $scheme, $customizer_settings['tfm_continue_reading_button_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_continue_reading_button_background' . $scheme, $customizer_settings['tfm_continue_reading_button_background' . $scheme] ) ? '--continue-reading-button-background:' . get_theme_mod( 'tfm_continue_reading_button_background' . $scheme, $customizer_settings['tfm_continue_reading_button_background' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_continue_reading_button_hover_background' . $scheme, $customizer_settings['tfm_continue_reading_button_hover_background' . $scheme] ) ? '--continue-reading-button-hover-background:' . get_theme_mod( 'tfm_continue_reading_button_hover_background' . $scheme, $customizer_settings['tfm_continue_reading_button_hover_background' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_continue_reading_button_hover_color' . $scheme, $customizer_settings['tfm_continue_reading_button_hover_color' . $scheme] ) ? '--continue-reading-button-hover-color:' . get_theme_mod( 'tfm_continue_reading_button_hover_color' . $scheme, $customizer_settings['tfm_continue_reading_button_hover_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_post_format_icon_color' . $scheme, $customizer_settings['tfm_post_format_icon_color' . $scheme] ) ? '--post-format-icon-color:' . get_theme_mod( 'tfm_post_format_icon_color' . $scheme, $customizer_settings['tfm_post_format_icon_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_post_format_icon_background' . $scheme, $customizer_settings['tfm_post_format_icon_background' . $scheme] ) ? '--post-format-icon-background:' . get_theme_mod( 'tfm_post_format_icon_background' . $scheme, $customizer_settings['tfm_post_format_icon_background' . $scheme] ) . ';' : '' );

// ========================================================
// Widgets
// ========================================================

$custom_css[] = ( '' !== get_theme_mod( 'tfm_widget_background' . $scheme, $customizer_settings['tfm_widget_background' . $scheme] ) ? '--widget-background:' . get_theme_mod( 'tfm_widget_background' . $scheme, $customizer_settings['tfm_widget_background' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_widget_color' . $scheme, $customizer_settings['tfm_widget_color' . $scheme] ) ? '--widget-color:' . get_theme_mod( 'tfm_widget_color' . $scheme, $customizer_settings['tfm_widget_color' . $scheme] ) . '; --widget-child-link-color:' . get_theme_mod( 'tfm_widget_color' . $scheme, $customizer_settings['tfm_widget_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_widget_title_color' . $scheme, $customizer_settings['tfm_widget_title_color' . $scheme] ) ? '--widget-title-color:' . get_theme_mod( 'tfm_widget_title_color' . $scheme, $customizer_settings['tfm_widget_title_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_widget_link_color' . $scheme, $customizer_settings['tfm_widget_link_color' . $scheme] ) ? '--widget-link-color:' . get_theme_mod( 'tfm_widget_link_color' . $scheme, $customizer_settings['tfm_widget_link_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_widget_background' . $scheme, $customizer_settings['tfm_widget_background' . $scheme] ) ? '--widget-border-color:' . tfm_hex2rgba(get_theme_mod( 'tfm_widget_color' . $scheme, $customizer_settings['tfm_widget_color' . $scheme] ), $alpha = 0.2 ) . ';' : '' );

// ========================================================
// Single posts/pages
// ========================================================
$custom_css[] = ( '' !== get_theme_mod( 'tfm_entry_title_link_color_single' . $scheme, '' ) ? '--entry-title-color-single:' . get_theme_mod( 'tfm_entry_title_link_color_single' . $scheme, '' ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_excerpt_color_single' . $scheme, '' ) ? '--excerpt-color-single:' . get_theme_mod( 'tfm_excerpt_color_single' . $scheme, '' ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_entry_meta_color_single' . $scheme, '' ) ? '--entry-meta-color-single:' . get_theme_mod( 'tfm_entry_meta_color_single' . $scheme, '' ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_entry_meta_link_color_single' . $scheme, '' ) ? '--entry-meta-link-color-single:' . get_theme_mod( 'tfm_entry_meta_link_color_single' . $scheme, '' ) . ';' : '' );
// ========================================================
// Cover/Image Format
// ========================================================

$custom_css[] = ( '' !== get_theme_mod( 'tfm_cover_format_primary_color' . $scheme, '#ffffff' ) ? '--cover-primary-color:' . get_theme_mod( 'tfm_cover_format_primary_color' . $scheme, '#ffffff' ) . ';' : '' );

// ========================================================
// Post tags
// ========================================================

$custom_css[] = ( '' !== get_theme_mod( 'tfm_post_tag_background' . $scheme, $customizer_settings['tfm_post_tag_background' . $scheme] ) ? '--tags-background:' . get_theme_mod( 'tfm_post_tag_background' . $scheme, $customizer_settings['tfm_post_tag_background' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_post_tag_color' . $scheme, $customizer_settings['tfm_post_tag_color' . $scheme] ) ? '--tags-color:' . get_theme_mod( 'tfm_post_tag_color' . $scheme, $customizer_settings['tfm_post_tag_color' . $scheme] ) . ';' : '' );

// ========================================================
// Misc.
// ========================================================

$custom_css[] = ( '' !== get_theme_mod( 'tfm_body_fade_background' . $scheme, '' ) ? '--body-fade-background:' . get_theme_mod( 'tfm_body_fade_background' . $scheme, '' ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_cta_background' . $scheme, '' ) ? '--tfm-cta-background:' . get_theme_mod( 'tfm_cta_background' . $scheme, '' ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_cta_color' . $scheme, '' ) ? '--tfm-cta-color:' . get_theme_mod( 'tfm_cta_color' . $scheme, '' ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_cta_background_hover' . $scheme, '' ) ? '--tfm-cta-background-hover:' . get_theme_mod( 'tfm_cta_background_hover' . $scheme, '' ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_cta_color_hover' . $scheme, '' ) ? '--tfm-cta-color-hover:' . get_theme_mod( 'tfm_cta_color_hover' . $scheme, '' ) . ';' : '' );
$custom_css[] = ( 'ffffff' !== get_background_color() ? '--body-background:#' . get_background_color() . ';' : '');
$custom_css[] = ( '' !== get_theme_mod( 'tfm_menu_sash_background' . $scheme, $customizer_settings['primary_theme_color' . $scheme] ) ? '--tfm-menu-sash-background:' . get_theme_mod( 'tfm_menu_sash_background' . $scheme, $customizer_settings['primary_theme_color' . $scheme] ) . ';' : '' );
$custom_css[] = ( '' !== get_theme_mod( 'tfm_menu_sash_color' . $scheme, '#ffffff' ) ? '--tfm-menu-sash-color:' . get_theme_mod( 'tfm_menu_sash_color' . $scheme, '#ffffff' ) . ';' : '' );