<?php
/**
 * The toggle sidebar containing the search form and widget area
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

?>

<aside id="toggle-search-sidebar" class="sidebar site-search" aria-label="<?php esc_attr_e( 'Search Sidebar', 'mozda' ); ?>">
	<div class="site-search-wrapper">
	<div class="toggle-sidebar-header site-search-header">
		<div class="close-menu"><span class="close"><?php echo esc_html__('close', 'mozda' ); ?></span></div>
	</div>

		<?php 

		get_search_form( ); ?>

		<?php
		$popular_terms = get_terms(
			array(
				'taxonomy'   => 'category',
				'orderby'    => 'count',
				'order'      => 'DESC',
				'number'     => 6,
				'hide_empty' => true,
			)
		);

		if ( ! is_wp_error( $popular_terms ) && ! empty( $popular_terms ) ) :
			?>
			<div class="search-quick-links" aria-label="<?php esc_attr_e( 'Popular topics', 'mozda' ); ?>">
				<span class="search-quick-links__label"><?php esc_html_e( 'Try:', 'mozda' ); ?></span>
				<div class="search-quick-links__items">
					<?php foreach ( $popular_terms as $term ) : ?>
						<button type="button" class="search-quick-links__item" data-search-term="<?php echo esc_attr( $term->name ); ?>">
							<?php echo esc_html( $term->name ); ?>
						</button>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="live-search-results" aria-live="polite" role="status">
			<p class="live-search-placeholder"><?php esc_html_e( 'Start typing to see suggestions…', 'mozda' ); ?></p>
		</div>

	</div>

	<?php

		// Widgets
		if (is_active_sidebar( 'search-sidebar' )) {
			dynamic_sidebar( 'search-sidebar');
		}

		?>
		
	</aside>
