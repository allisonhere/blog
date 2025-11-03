<?php

/**
 * The home template file
 *
 * Puts together the home page loop
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

$tfm_vars = tfm_template_vars( '', false );

<?php get_header(); ?>

<div class="hero-section">
    <span class="hero-shape"></span>
    <span class="hero-shape"></span>
    <span class="hero-shape"></span>
    <span class="hero-shape"></span>
    <span class="hero-shape"></span>
</div>

		<main id="main" class="site-main<?php echo esc_attr( $tfm_vars['show_pagination_numbers']  . $tfm_vars['show_pagination_prev_next'] ); ?>">

		<?php tfm_before_loop(); ?>

		<?php

		// ========================================================
		// Check if we're running the custom home blocks plugin
		// ========================================================

		/**
		 * Home blocks overrides static homepage settings when active
		 * Disable any active post blocks to display a static homepage
		 */

		if ( ! function_exists( 'tfm_post_blocks') || ( function_exists( 'tfm_post_blocks') && ! tfm_post_blocks_active() ) ) : ?>

		<?php if ( ! is_home() ): ?>

		<div id="primary" class="the-page">

		<?php else: ?>

		<div id="primary" class="post-grid <?php echo esc_attr( tfm_get_post_cols() . ' ' . tfm_get_post_layout( $mobile = true )  ); ?>">

		<?php endif; ?>

			<?php 
			// Masonry
			if ( tfm_get_post_layout() === 'masonry' ) : ?>

				<div id="masonry" class="masonry-container">

			<?php endif; ?>

			<?php  

			if ( have_posts() ) :

				$count = 0;

				/* Start the Loop */
				while ( have_posts() ) : the_post();


					$count++; /* Lets start counting */

					/*
					 * In loop sidebar
					 */

					if ( function_exists('tfm_between_posts')) :
						tfm_between_posts( $count );
					endif;

					/*
					 * Pass count args
					 */

					if ( ! is_home() ) {

						get_template_part( 'template-parts/page/content', null );

					} else {
					
						get_template_part( 'template-parts/post/content', null, array( 'count' => $count ) );

					}


				endwhile;

				// Close masonry container
				if ( tfm_get_post_layout() === 'masonry' ) : ?>
					
					</div>

				<?php endif;
			
				the_posts_pagination( array(
				    'mid_size' => 2,
				    'prev_text' => '<span>' . esc_html__( 'Newer Posts', 'mozda' ) . '</span>',
				    'next_text' => '<span>' . esc_html__( 'Older Posts', 'mozda' ) . '</span>',
					) );

			else :

				get_template_part( 'template-parts/post/content', 'none' );

			endif;
			?>

		</div><!-- #primary -->

		<?php endif; // Endif tfm blocks ?>

		<?php tfm_after_loop(); ?>
		
	</main><!-- #main -->
	<?php 
		get_sidebar();
	?>

<?php get_footer();
