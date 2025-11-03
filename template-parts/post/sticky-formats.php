<?php
/**
 * Template part for displaying post format icons and sticky
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

?>

<?php

$show_media = is_home() ? get_theme_mod( 'tfm_homepage_post_media', true ) : get_theme_mod( 'tfm_archive_post_media', true );
$show_icons = ( ! $show_media && ( has_post_format( 'video' ) || has_post_format( 'audio' ) ) ) || has_post_format( 'gallery' ) ? true : false;

// Formats key
if ( ( ( is_home() && ! is_paged() && is_sticky() ) || ! is_single() && get_theme_mod( 'tfm_post_format_icons', true ) && $show_icons ) && 'page' !== get_post_type() ) : ?>


		<?php if ( is_sticky() && is_home() && ! is_paged() ): ?>

			<span class="tfm-format-sticky"><i class="icon-star"></i></span>

		<?php endif; ?>

		<?php if ( ! is_single() && get_theme_mod( 'tfm_post_format_icons', true ) ): ?>

			<?php if ( has_post_format( 'gallery' ) && $show_icons ): ?>

				<span class="tfm-format-gallery"><i class="icon-picture"></i></span>

			<?php endif; ?>

			<?php if ( has_post_format( 'video' ) && $show_icons): ?>

				<span class="tfm-format-video"><i class="icon-video"></i></span>

			<?php endif; ?>

			<?php if ( has_post_format( 'audio' ) && $show_icons ): ?>

				<span class="tfm-format-audio"><i class="icon-headphones"></i></span>

			<?php endif; ?>

		<?php endif; ?>

		<?php tfm_append_formats_key(); ?>


<?php endif; ?>