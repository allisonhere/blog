<?php

/**
 * Personal Blog: Plugin & theme Filters and actions
 *
 * @package Personal_Blog
 */

// ========================================================
// Change location of TFM header social for Logo left Header
// ========================================================

if ( function_exists('tfm_social_icons_theme_header') ) {

    if ( get_theme_mod( 'tfm_header_layout', 'logo-left-menu-right') === 'default' ) {

        remove_action( 'tfm_header_left', 'tfm_social_icons_theme_header', 10 );
        add_action( 'tfm_primary_menu_section_left', 'tfm_social_icons_theme_header', 40 );
        
    } elseif ( get_theme_mod( 'tfm_header_layout', 'logo-left-menu-right') === 'default-logo-left' ) {

        remove_action( 'tfm_header_left', 'tfm_social_icons_theme_header', 10 );
        add_action( 'tfm_primary_menu_section_left', 'tfm_social_icons_theme_header', 40 );
        
    } elseif ( get_theme_mod( 'tfm_header_layout', 'logo-left-menu-right') === 'logo-left-menu-right' ) {

        remove_action( 'tfm_header_left', 'tfm_social_icons_theme_header', 10 );
        add_action( 'tfm_header_right', 'tfm_social_icons_theme_header', 40 );
        
    } elseif ( get_theme_mod( 'tfm_header_layout', 'logo-left-menu-right') === 'default-advert' ) {
        remove_action( 'tfm_header_left', 'tfm_social_icons_theme_header', 10 );
        add_action( 'tfm_primary_menu_section_left', 'tfm_social_icons_theme_header', 40 );
        
    }

}

// ========================================================
// Change location of TFM Related Posts
// ========================================================
if ( function_exists('tfm_related_posts') ) {

    remove_action( 'tfm_after_comments', 'tfm_related_posts', 10 );
    add_action( 'tfm_before_footer', 'tfm_related_posts', 10 );

}

// ========================================================
// Add share to archive posts
// ========================================================

function mozda_enable_share_in_blog_lists() {

    if ( function_exists('tfm_share_content') ) {

        return true;

    }
}
add_filter( 'tfm_social_plugin_theme_supports_share_blog_list_posts', 'mozda_enable_share_in_blog_lists' );

// ========================================================
// Max slides for Hero
// ========================================================
function mozda_max_hero_slides() {

    return 6;
}
add_filter( 'tfm_hero_max_slidestoshow', 'mozda_max_hero_slides' );
add_filter( 'tfm_hero_max_grid_posts', 'mozda_max_hero_slides');


// ========================================================
// Modify action for archive share icons
// ========================================================

// if ( function_exists('tfm_share_archive_content')) {
//     remove_action( 'tfm_post_inner_close', 'tfm_share_archive_content', 10 );
//     add_action( 'tfm_after_continue_reading_button', 'tfm_share_archive_content', 30 );
// }

// ========================================================
// Remove customizer controls, sections and panels
// ========================================================
function mozda_remove_customizer_optons( $wp_customize ) {

    if ( function_exists('tfm_post_blocks') ) {

        $post_blocks = tfm_get_post_blocks();

        if ( count($post_blocks) !== 0 ) {

            foreach ( $post_blocks as $block => $value ) {

            $wp_customize->remove_control($block . '_continue_reading_button_background');
            $wp_customize->remove_control($block . '_continue_reading_button_color');
            $wp_customize->remove_control($block . '_continue_reading_button_hover_background');
            $wp_customize->remove_control($block . '_continue_reading_button_hover_color');
            $wp_customize->remove_control($block . '_continue_reading_button_background_dark');
            $wp_customize->remove_control($block . '_continue_reading_button_color_dark');
            $wp_customize->remove_control($block . '_continue_reading_button_hover_background_dark');
            $wp_customize->remove_control($block . '_continue_reading_button_hover_color_dark');
            $wp_customize->remove_control($block . '_widget_meta_color'); // Remove these from plugin 
            $wp_customize->remove_control($block . '_widget_meta_link_color'); // Remove these from plugin 

            $wp_customize->remove_control($block . '_read_more');
            $wp_customize->remove_control($block . '_entry_meta_author_nickname');
            $wp_customize->remove_control($block . '_entry_meta_in');

            }

        }

    }
    // tfm related psts
    $wp_customize->remove_control( 'tfm_related_posts_read_more');
    $wp_customize->remove_control( 'tfm_related_posts_entry_meta_in');
    $wp_customize->remove_control( 'tfm_related_posts_continue_reading_button_color');
    $wp_customize->remove_control( 'tfm_related_posts_continue_reading_button_background');
    $wp_customize->remove_control( 'tfm_related_posts_continue_reading_button_hover_color');
    $wp_customize->remove_control( 'tfm_related_posts_continue_reading_button_hover_background');
    $wp_customize->remove_control( 'tfm_related_posts_continue_reading_button_color_dark');
    $wp_customize->remove_control( 'tfm_related_posts_continue_reading_button_background_dark');
    $wp_customize->remove_control( 'tfm_related_posts_continue_reading_button_hover_color_dark');
    $wp_customize->remove_control( 'tfm_related_posts_continue_reading_button_hover_background_dark');

    // tfm mc4wp
    $wp_customize->remove_control( 'tfm_before_footer_background_image');
    $wp_customize->remove_control( 'tfm_before_footer_background');
    $wp_customize->remove_control( 'tfm_before_footer_background_gradient');
    $wp_customize->remove_control( 'tfm_before_footer_title_color');
    $wp_customize->remove_control( 'tfm_before_footer_text_color');



    // Theme options
    $wp_customize->remove_control( 'tfm_homepage_read_more');
    $wp_customize->remove_control( 'tfm_homepage_entry_meta_in');
    $wp_customize->remove_control( 'tfm_archive_read_more');
    $wp_customize->remove_control( 'tfm_archive_entry_meta_in');
    $wp_customize->remove_control( 'tfm_image_format_read_more');
    $wp_customize->remove_control( 'tfm_hero_read_more');
    $wp_customize->remove_control( 'tfm_hero_entry_meta_in');
    $wp_customize->remove_control( 'tfm_archive_entry_meta_author_nickname');
    $wp_customize->remove_control( 'tfm_homepage_entry_meta_author_nickname');
    $wp_customize->remove_control( 'tfm_single_entry_meta_author_nickname');
    $wp_customize->remove_control( 'tfm_single_entry_meta_in');
    $wp_customize->remove_control( 'tfm_image_format_entry_meta_author_nickname');

    $wp_customize->remove_control( 'tfm_post_background');
    $wp_customize->remove_control( 'tfm_post_background_dark');

    $wp_customize->remove_control( 'tfm_continue_reading_button_background');
    $wp_customize->remove_control( 'tfm_continue_reading_button_color');
    $wp_customize->remove_control( 'tfm_continue_reading_button_hover_background');
    $wp_customize->remove_control( 'tfm_continue_reading_button_hover_color');

    $wp_customize->remove_control( 'tfm_continue_reading_button_background_dark');
    $wp_customize->remove_control( 'tfm_continue_reading_button_color_dark');
    $wp_customize->remove_control( 'tfm_continue_reading_button_hover_background_dark');
    $wp_customize->remove_control( 'tfm_continue_reading_button_hover_color_dark');
    $wp_customize->remove_control( 'tfm_archive_subcats');
    $wp_customize->remove_control( 'tfm_single_post_navigation_header');
}
add_action( 'customize_register', 'mozda_remove_customizer_optons', 100 );


function mozda_remove_pvc_archive_views() {
    return false;
}
add_filter( 'pvc_shortcode_filter_hook', 'mozda_remove_pvc_archive_views' );

// Remove ratings actions
function mozda_ratings_support() {
    return false;
}
add_filter( 'tfm_theme_supports_ratings', 'mozda_ratings_support' );
if ( function_exists('tfm_ratings')) {
    remove_action( 'tfm_hentry_footer_close', 'tfm_ratings', 20 );
}

// tfm breadcrumbs

if ( function_exists('tfm_breadcrumbs')) {
    remove_action( 'tfm_after_header', 'tfm_breadcrumbs', 10);
    add_action( 'tfm_entry_header_close', 'tfm_breadcrumbs', 10);
    add_action( 'tfm_cover_wrapper_close', 'tfm_breadcrumbs', 10);
    add_action( 'tfm_single_hero_entry_header_close', 'tfm_breadcrumbs', 10);
}

// if ( function_exists('tfm_theme_boost_mc4wp_widget_display') && class_exists( 'MC4WP_Form_Widget' ) && get_theme_mod( 'tfm_mc4wp_footer_widget', false ) ) {
//     remove_action('tfm_append_footer_bottom', 'tfm_social_icons_theme_footer', 10);
// } else {
//     remove_action('tfm_footer_inner', 'tfm_social_icons_theme_footer', 10);
// }

// function remove_this() {
// if ( has_nav_menu( 'footer' ) ) {
//     echo 'fuck';
//     remove_action('tfm_append_footer_bottom', 'tfm_social_icons_theme_footer', 10);
// } else {
//     echo 'vagina';
//     remove_action('tfm_footer_inner', 'tfm_social_icons_theme_footer', 10);
// }
// }

function mozda_post_blocks_count() {
    return array(
         'tfm_post_block_1' => 'tfm_custom_post_blocks_tfm_post_block_1',
         'tfm_post_block_2' => 'tfm_custom_post_blocks_tfm_post_block_2',
         'tfm_post_block_3' => 'tfm_custom_post_blocks_tfm_post_block_3',
         'tfm_post_block_4' => 'tfm_custom_post_blocks_tfm_post_block_4',
         'tfm_post_block_5' => 'tfm_custom_post_blocks_tfm_post_block_5',
         'tfm_post_block_6' => 'tfm_custom_post_blocks_tfm_post_block_6',
         'tfm_post_block_7' => 'tfm_custom_post_blocks_tfm_post_block_7',
         'tfm_post_block_8' => 'tfm_custom_post_blocks_tfm_post_block_8',
         'tfm_post_block_9' => 'tfm_custom_post_blocks_tfm_post_block_9',
         'tfm_post_block_10' => 'tfm_custom_post_blocks_tfm_post_block_10',
     );
}
add_filter( 'tfm_post_blocks_list', 'mozda_post_blocks_count');






