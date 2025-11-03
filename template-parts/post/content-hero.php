<?php
/**
 * Template part for displaying posts
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

$tfm_vars = tfm_template_vars( 'content', false);
$hero_style = ( 'cover' === $tfm_vars['content']['post_style'] ? 'cover' : 'default' );
//echo $tfm_vars['content']['full_width'];
// $full_width = $tfm_vars['content']['full_width'] ? 'true' : 'false';
$margins = ( 'true' === $full_width ? 'false' : 'true' );
$has_background = '' !== get_theme_mod( 'tfm_single_hero_background', '') ? ' has-background' : '';
$has_thumbnail = '' !== get_the_post_thumbnail() && ! $tfm_vars['content']['disabled_thumbnail'] ? 'true' : 'false';

?>

<div class="single-hero<?php echo esc_attr( $has_background . ' ' . $tfm_vars['content']['post_style'] ); ?>" data-fullwidth="<?php echo tfm_full_width_featured_media( true ); ?>" data-margins="<?php echo esc_attr( $margins ); ?>" data-thumbnails="<?php echo esc_attr( $has_thumbnail); ?>">
<div <?php post_class( $hero_style ) ?>>

	<div class="post-inner">

	<?php if ( $tfm_vars['content']['post_style'] === 'cover' ): ?>

	<div class="cover-wrapper">

	<?php endif; ?>

	<?php

	// ========================================================
	// Post thumbnail
	// ========================================================

	if ( '' !== get_the_post_thumbnail() && ! $tfm_vars['content']['disabled_thumbnail'] ) : ?>

		<div class="thumbnail-wrapper">

			<figure class="post-thumbnail<?php echo esc_attr( $tfm_vars['content']['figcaption'] ); ?>">

				<?php tfm_get_post_thumbnail(); ?>

				<?php if ( $tfm_vars['content']['figcaption'] ) : // Figcaption ?>

					<figcaption class="featured-media-caption"><?php echo esc_html( get_the_post_thumbnail_caption() ); ?></figcaption>

				<?php endif; ?>

			</figure>

		</div>
		
	<?php endif; ?>

	<?php if ( ( '' !== get_the_post_thumbnail() && ! $tfm_vars['content']['disabled_thumbnail'] && ( $tfm_vars['content']['post_style'] === 'cover' || $tfm_vars['content']['post_style'] === 'default-alt' )) || ( '' === get_the_post_thumbnail() || $tfm_vars['content']['disabled_thumbnail'])  ): ?>
	<div class="entry-wrapper">

	<header class="entry-header">
		<?php

		// ========================================================
		// Entry header
		// ========================================================

		if ( 'post' === get_post_type() ) {

		get_template_part( 'template-parts/post/sticky-formats' );

		// Category meta
			tfm_get_entry_meta( $meta_data = array('category'), $has_wrapper = true, $has_container = true, $html_style = 'li', $meta_wrapper_class = 'category-meta', $meta_class = 'categories' );

		}

		the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) {

			tfm_get_entry_meta( $meta_data = array('author_avatar', 'author', 'author_nickname', 'date', 'updated_date', 'read_time', 'comment_count', 'post_views' ) );

		}

		?>

		<?php tfm_get_excerpt( ); ?>

		<?php //tfm_entry_header_close();  ?>

		<?php tfm_single_hero_entry_header_close();  ?>

	</header>

	<?php tfm_single_hero_cover_wrapper_close(); ?>

		</div>
<?php endif; // endif default-alt/cover ?>
<?php if ( $tfm_vars['content']['post_style'] === 'cover' ): ?>
	</div><!-- whats this -->
<?php endif; ?>

	</div><!-- .post-inner -->

</div><!-- .article -->
</div><!-- .hero -->