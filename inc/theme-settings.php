<?php

/**
 * Theme Settings
 *
 * @package WordPress
 * @subpackage Personal_Blog
 * @since 1.0
 * @version 1.0
 */

// ========================================================
// Theme Settings
// ========================================================

function tfm_general_settings( ) {

	return array(
		'site_width' => 1300,
		'sidebar_width' => 303,
		'content_max_width' => 736,
		'default_border_radius' => 5,
		'thumbnail_border_radius' => 5,
		'button_border_radius' => 100,
		'input_border_radius' => 5,
		'primary_menu_font_size' => 14,
		'single_entry_font_size' => 19,
		// theme colours
		'default_post_background' => '',
		'primary_theme_color' => '#da4453',
		'secondary_theme_color' => '#89216b',
		'tertiary_theme_color' => '#ffb14f',
		// body
		'tfm_body_background_color' => '',
		'tfm_body_background_gradient' => '',
		'tfm_body_font_color' => '#131315',
		'tfm_link_color' => '#89216b',
		'tfm_link_hover_color' => '#89216b',
		// buttons
		'tfm_button_background' => '#da4453',
		'tfm_button_background_gradient' => '#89216b',
		'tfm_button_color' => '#ffffff',
		// header colours
		'tfm_header_background_color' => '#da4453',
		'tfm_header_background_gradient' => '#89216b',
		'tfm_header_color' => '#ffffff',
		'tfm_header_logo_color' => '#ffffff',
		'tfm_header_elements_background' => '#ffffff',
		'tfm_header_elements_color' => '#44464b',
		// footer colours
		'tfm_footer_background' => '#89216b',
		'tfm_footer_background_gradient' => '#da4453',
		'tfm_footer_font_color' => '#ffffff',
		'tfm_footer_link_color' => '#ffffff',
		// category header
		'tfm_archive_header_background' => '',
		'tfm_archive_header_color' => '#000000',
		'tfm_archive_header_meta_color' => '#94979e',
		// section header
		'tfm_section_header_color' => '#000000',
		'tfm_section_header_meta_color' => '#94979e',
		// entry
		'tfm_entry_title_link_color' => '#000000',
		'tfm_entry_color' => '#131315',
		'tfm_entry_meta_color' => '#94979e',
		'tfm_entry_meta_link_color' => '#000000',
		'tfm_post_format_icon_color' => '#ffffff',
		'tfm_post_format_icon_background' => '#da4453',
		'tfm_continue_reading_button_background' => '',
		'tfm_continue_reading_button_color' => '',
		'tfm_continue_reading_button_hover_background' => '',
		'tfm_continue_reading_button_hover_color' => '',
		'tfm_cover_format_primary_color' => '#ffffff',
		// widgets
		'tfm_widget_background' => '',
		'tfm_widget_color' => '#94979e',
		'tfm_widget_link_color' => '#000000',
		'tfm_widget_title_color' => '#000000',
		// tags
		'tfm_post_tag_background' => '',
		'tfm_post_tag_color' => '',
		'category_slug_background' => '#cfd0d2',
		'category_slug_color' => '#000000',
		////////////////////////////////////////////////
		// Dark theme
		////////////////////////////////////////////////
		'default_post_background_dark' => '',
		'primary_theme_color_dark' => '#da4453',
		'secondary_theme_color_dark' => '#89216b',
		'tertiary_theme_color_dark' => '#ffb14f',
		// body
		'tfm_body_background_color_dark' => '#370D2B',
		'tfm_body_background_gradient_dark' => '',
		'tfm_body_font_color_dark' => '#cfd0d2',
		'tfm_link_color_dark' => '#ffffff',
		'tfm_link_hover_color_dark' => '#cfd0d2',
		// buttons
		'tfm_button_background_dark' => '#da4453',
		'tfm_button_background_gradient_dark' => '#89216b',
		'tfm_button_color_dark' => '#ffffff',
		// header colours
		'tfm_header_background_color_dark' => '#da4453',
		'tfm_header_background_gradient_dark' => '#89216b',
		'tfm_header_color_dark' => '#ffffff',
		'tfm_header_logo_color_dark' => '#ffffff',
		'tfm_header_elements_background_dark' => '#ffffff',
		'tfm_header_elements_color_dark' => '#44464b',
		// footer colours
		'tfm_footer_background_dark' => '#89216b',
		'tfm_footer_background_gradient_dark' => '#da4453',
		'tfm_footer_font_color_dark' => '#ffffff',
		'tfm_footer_link_color_dark' => '#ffffff',
		// category header
		'tfm_archive_header_background_dark' => '',
		'tfm_archive_header_color_dark' => '#ffffff',
		'tfm_archive_header_meta_color_dark' => '#cfd0d2',
		// section header
		'tfm_section_header_color_dark' => '#ffffff',
		'tfm_section_header_meta_color_dark' => '#94979e',
		// entry
		'tfm_entry_title_link_color_dark' => '#ffffff',
		'tfm_entry_color_dark' => '#ffffff',
		'tfm_entry_meta_color_dark' => '#cfd0d2', // theme light grey
		'tfm_entry_meta_link_color_dark' => '#ffffff',
		'tfm_post_format_icon_color_dark' => '#ffffff',
		'tfm_post_format_icon_background_dark' => '#da4453',
		'tfm_continue_reading_button_background_dark' => '',
		'tfm_continue_reading_button_color_dark' => '',
		'tfm_continue_reading_button_hover_background_dark' => '',
		'tfm_continue_reading_button_hover_color_dark' => '',
		'tfm_cover_format_primary_color_dark' => '#ffffff',
		// widgets
		'tfm_widget_background_dark' => '',
		'tfm_widget_color_dark' => '#94979e',
		'tfm_widget_link_color_dark' => '#ffffff',
		'tfm_widget_title_color_dark' => '#ffffff',
		// tags
		'tfm_post_tag_background_dark' => '',
		'tfm_post_tag_color_dark' => '',
		'category_slug_background_dark' => '#cfd0d2',
		'category_slug_color_dark' => '#000000',
		// Branded sections defaults
		'branded_hero_heading' => 'Welcome to the story',
		'branded_hero_subheading' => 'Insights, experiments, and notes from the journey.',
		'branded_hero_button_label' => 'Start reading',
		'branded_hero_button_url' => '',
		'branded_newsletter_heading' => 'Stay in the loop',
		'branded_newsletter_text' => 'Join the newsletter to receive curated notes once a week.',
		'branded_newsletter_shortcode' => '',
		'branded_post_footer_heading' => 'Keep exploring',
		'branded_post_footer_text' => 'Readers also enjoyed these picks.',
		'branded_post_footer_button_label' => 'Browse the archive',
		'branded_post_footer_button_url' => '',
		'branded_accent_fallback' => '#da4453',
		'featured_badge_default_label' => 'Featured',

	);

}

?>
