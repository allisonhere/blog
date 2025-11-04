<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.1
 */

$tfm_vars = tfm_template_vars( 'archive', false );

get_header(); ?>

		<main id="main" class="site-main<?php echo esc_attr( $tfm_vars['show_pagination_numbers'] . $tfm_vars['show_pagination_prev_next']  ); ?>" role="main" tabindex="-1">

		<?php tfm_before_loop(); ?>

		<div id="primary" class="content-area post-grid <?php echo esc_attr( tfm_get_post_cols() . ' ' . tfm_get_post_layout( $mobile = true )  ); ?>">

			<?php 
			// Open masonry container
			if ( tfm_get_post_layout() === 'masonry' && have_posts() ) : ?>

				<div id="masonry-container" class="masonry-container">

			<?php endif; ?>

			<?php
			if ( have_posts() ) :

				$count = 0;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					$count++;

					/*
					 * In loop sidebar
					 */

					if ( function_exists('tfm_between_posts')) :
						tfm_between_posts( $count );
					endif;

					/*
					 * Pass count arg for use in tfm_post_thumbnail() function
					 */
					get_template_part( 'template-parts/post/content', null, array( 'count' => $count ) );

				endwhile;

				// Close masonry container

				if ( tfm_get_post_layout() === 'masonry' && have_posts() ) : ?>

					</div>

				<?php endif;

				the_posts_pagination( array(
				    'mid_size' => 2,
				    'prev_text' => '<span>' . esc_html__( 'Newer Posts', 'mozda' ) . '</span>',
				    'next_text' => '<span>' . esc_html__( 'Older Posts', 'mozda' ) . '</span>',
					) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif; ?>

		</div><!-- #primary -->
		<?php tfm_after_loop(); ?>
	</main><!-- #main -->
	<?php 
		get_sidebar( 'aside' );
	?>

<?php get_footer();
