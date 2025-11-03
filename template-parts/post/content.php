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

$count = ( ! is_single( ) ? $args['count'] : false );
$tfm_vars = tfm_template_vars( 'content', array( 'count' => $count ));

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card-3d' ); ?>>

	<div class="post-inner">

	<?php

	tfm_post_inner_open();

	// ========================================================
	// Open single() entry header/cover wrapper
	// ========================================================

	if ( $tfm_vars['content']['entry_header'] ) : ?>

	<header class="entry-header<?php echo esc_attr($tfm_vars['content']['cover_wrapper'] ); ?>" data-fullwidth="<?php echo esc_attr('cover' === $tfm_vars['content']['post_style'] ? $tfm_vars['content']['full_width'] : 'false'); ?>">

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

			<?php tfm_inside_thumbnail_wrapper(); ?>

			<figure class="post-thumbnail<?php echo esc_attr( $tfm_vars['content']['figcaption'] ); ?>">

				<?php if ( ! is_single() ) : ?>

				<a href="<?php the_permalink(); ?>">

				<?php endif; ?>

				<?php tfm_get_post_thumbnail( $tfm_vars['content']['thumbnail_size'] ); ?>

				<?php if ( ! is_single() ) : ?>

				</a>

				<?php endif; ?>
				
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

	 if ( ! $tfm_vars['content']['hero_entry_header'] ) :

		if ( 'post' === get_post_type() ) {

			// Category meta
			tfm_get_entry_meta( $meta_data = array('category'), $has_wrapper = true, $has_container = true, $html_style = 'li', $meta_wrapper_class = 'category-meta', $meta_class = 'categories' );

		}

		if ( is_single() ) {
			the_title( '<h1 class="entry-title single-entry-title">', '</h1>' );
		} else {
			if ( $tfm_vars['content']['entry_title'] ) {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}
		}

		// Primary entry meta

		if ( is_single() ) :

			tfm_get_entry_meta( $meta_data = array('author_avatar', 'author', 'author_nickname', 'date', 'updated_date', 'read_time', 'comment_count', 'post_views'));

		else:

			tfm_get_entry_meta( $meta_data = array('read_time', 'comment_count', 'post_views') );

		endif;

		tfm_get_excerpt( );

	endif;

	if ( ! is_single() ) :

		get_template_part( 'template-parts/post/hentry-footer' ); 

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

	<?php endif;

		if ( is_single() ) : ?>

			<div class="single-content-wrapper">

				<?php tfm_before_single_content(); ?>

				<div class="entry-content">

					<?php

						the_content( );

						tfm_after_the_content();


						// tfm set a prev-next class
						global $page, $numpages;

						$prev_next = $page === $numpages ? 'prev' : 'prev-next';
						if ( $page === 1) {
							$prev_next = 'next';
						}

						wp_link_pages( array(
						'before'      => '<div class="nav-links page-pagination ' . esc_attr($prev_next) . '">',
						'after'       => '</div>',
						'link_before' => '<span class="page-numbers">',
						'link_after'  => '</span>',
						'nextpagelink' => esc_html__( 'Next page', 'mozda'),
						'previouspagelink' => esc_html__( 'Previous page', 'mozda'),
						'next_or_number'   => 'next',
						) );

				    ?>

				</div><!-- .entry-content -->

			</div><!-- .single-content-wrapper -->

		<?php endif; 

		if ( is_single() ):

		// Get post tags and share template
		get_template_part( 'template-parts/post/hentry-footer' ); 

		endif;

		tfm_post_inner_close();

		?>

	</div><!-- .post-inner -->

</article>
