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

	</div>

	<?php

		// Widgets
		if (is_active_sidebar( 'search-sidebar' )) {
			dynamic_sidebar( 'search-sidebar');
		}

		?>
		
	</aside>
