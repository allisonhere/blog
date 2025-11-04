<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main" tabindex="-1">

		<div id="primary" class="content-area flex-grid">

			<header class="page-header">
			<h1 class="page-title title-404"><?php echo esc_html__( '404', 'mozda' ); ?></h1>
		</header>

			<div class="flex-box has-post-thumbnail error">

				<h2 class="message-404"><?php echo esc_html__( 'Oops!, Page Not Found.', 'mozda' ); ?></h2>

				<p class="sub-message-404"><?php echo esc_html__( 'Sorry, the requested page could not be found.', 'mozda'); ?> <strong><a class="toggle-search"><?php echo esc_html__( 'Try searching?', 'mozda' ); ?></a></strong></p>

				<p class="gohome"><a href="<?php echo esc_url( get_home_url() ); ?> " class="button"><?php echo esc_html__( 'Go Back Home', 'mozda'); ?></a></p>

			</div>

		</div><!-- #primary -->
	</main><!-- #main -->

<?php get_footer();
