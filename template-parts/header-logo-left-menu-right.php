<?php
/**
 * Template part for displaying the header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

?>

<div class="site-header-inner">
<div class="header-layout-wrapper">
<div class="header-section header-left header-branding">

<?php tfm_toggle_icon( 'menu' ); ?>

<?php tfm_site_logo( ); ?>

<?php tfm_header_left(); ?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<div class="primary-menu-container">

	    <?php

	    wp_nav_menu( array( 'theme_location' => 'primary',
	     					'container' => 'nav',
	     					'container_class' => 'primary-menu-wrapper',
	     					'menu_class' => 'primary-menu',
	     					'menu_id' => 'primary-menu',
	     					'link_before' => '<span class="menu-label">',
	     					'link_after' => '</span>'));

	    ?>

	</div>

	<?php endif; ?>

</div>

	<div class="header-section header-right">

		<?php tfm_header_right(); ?>
		 
	<?php tfm_toggle_icon( 'color-mode' );
		  tfm_toggle_icon( 'search' ); ?>

	<?php if ( has_nav_menu( 'header-secondary' ) ) : ?>

		    <?php

		    $cta_background = get_theme_mod( 'tfm_cta_background', '' ) ? ' has-cta-background' : '';

		    wp_nav_menu( array( 'theme_location' => 'header-secondary',
		     					'container' => 'div',
		     					'container_class' => 'header-secondary-menu-wrapper',
		     					'menu_class' => 'primary-menu header-secondary' . $cta_background,
		     					'menu_id' => 'header-secondary-menu',
			     				'link_before' => '<span class="menu-label">',
		     					'link_after' => '</span>')); 

		     					?>

		    <?php endif; ?>

</div>
</div>
</div>