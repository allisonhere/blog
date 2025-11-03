<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.1
 */

?>

<?php  $tfm_vars = tfm_template_vars( 'content', false ); ?>

<?php $show_frontpage_title = is_front_page() ? get_theme_mod( 'tfm_front_page_entry_title', true ) : true;  ?>

<article id="page-<?php the_ID(); ?>" <?php post_class( ); ?>>

	<div class="post-inner">

	<?php

	tfm_post_inner_open();

	// ========================================================
	// Open single() entry header/cover wrapper
	// ========================================================

	if ( $tfm_vars['content']['entry_header'] ) : ?>

	<header class="entry-header <?php echo esc_attr($tfm_vars['content']['cover_wrapper'] ); ?>" data-fullwidth="<?php echo esc_attr('cover' === $tfm_vars['content']['post_style'] ? $tfm_vars['content']['full_width'] : ''); ?>">

	<?php endif;

	// ========================================================
	// Featured media video/audio/gallery
	// ========================================================
	if (! $tfm_vars['content']['hero_entry_header'] ) :

	echo tfm_featured_video();
	tfm_featured_audio();

	endif;

	// ========================================================
	// Post thumbnail
	// ========================================================

	 if ( $tfm_vars['content']['post_thumbnail'] ) : ?>

		<div class="thumbnail-wrapper" data-fullwidth="<?php echo esc_attr($tfm_vars['content']['full_width']); ?>">

			<?php get_template_part( 'template-parts/post/sticky-formats' ); ?>

			<?php tfm_inside_thumbnail_wrapper(); ?>

			<figure class="post-thumbnail<?php echo esc_attr( $tfm_vars['content']['figcaption'] ); ?>">

			<?php tfm_get_post_thumbnail( $tfm_vars['content']['thumbnail_size'] ); ?>
				
			</figure>

			<?php if ( $tfm_vars['content']['figcaption'] ) : // Figcaption ?>

				<figcaption class="featured-media-caption"><?php echo esc_html( get_the_post_thumbnail_caption() ); ?></figcaption>

			<?php endif; ?>

		</div>
		
	<?php endif; 

	// ========================================================
	// Open single() entry header/cover wrapper inner
	// ========================================================

	if ( $tfm_vars['content']['entry_header'] ) : ?>

		<div class="entry-header-inner">

	<?php

	endif;

	// ========================================================
	// Open cover style & list layout entry wrapper
	// ========================================================

	if ( $tfm_vars['content']['entry_wrapper'] ): ?>

	<div class="entry-wrapper">

	<?php endif; 

	// ========================================================
	// Do not show title/meta for Hero layouts
	// ========================================================

	 if ( ! $tfm_vars['content']['hero_entry_header'] ) : ?>

		<?php

		if ( ! $tfm_vars['content']['post_thumbnail'] ) :

			get_template_part( 'template-parts/post/sticky-formats' );

		endif;

		if ( $show_frontpage_title ) :

			the_title( '<h1 class="entry-title single-entry-title">', '</h1>' );

		endif;

	endif;

	if ( ! is_single() ) :

		get_template_part( 'template-parts/page/hentry-footer' ); 

	endif;

	// ========================================================
	// Close cover style & list layout entry wrapper
	// ========================================================

	 if ( $tfm_vars['content']['entry_wrapper'] ): ?>

	 	<?php tfm_entry_wrapper_close();
	 		  tfm_cover_wrapper_close() ?>

	</div>

	<?php endif;

	// ========================================================
	// Close single() entry header/cover wrapper
	// ========================================================

	if ( $tfm_vars['content']['entry_header'] ) : ?>

		<?php tfm_entry_header_close(); ?>

	</div><!-- .header-inner -->

	</header>

	<?php endif; ?>

			<div class="single-content-wrapper">

				<?php tfm_before_single_content(); ?>

				<div class="entry-content">

					<?php

						the_content( );

						wp_link_pages( array(
							'before'      => '<div class="nav-links">' . esc_html__( 'Pages:', 'mozda' ),
							'after'       => '</div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						) );

				    ?>

				</div><!-- .entry-content -->

			</div><!-- .single-content-wrapper -->


		<?php

		// Get post tags and share template
		get_template_part( 'template-parts/page/hentry-footer' ); 

		tfm_post_inner_close();

		?>

	</div><!-- .post-inner -->

</article>