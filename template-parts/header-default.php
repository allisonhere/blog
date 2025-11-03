<?php
/**
 * Template part for displaying the header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage mozda
 * @since 1.0
 * @version 1.0
 */

?>
<div class="header-branding">
<div class="header-section header-left">

<?php tfm_header_left(); ?>
</div>

<div class="header-section logo-branding">
<?php tfm_site_logo( ); ?>

	<?php if ( get_theme_mod( 'tfm_header_tagline', false ) && get_bloginfo( 'description' ) ) : ?>

		<p class="tagline"><?php echo get_bloginfo( 'description' ); ?></p>

	<?php endif; ?>
</div>

<div class="header-section header-right">
	 <?php if ( get_theme_mod( 'tfm_header_search_input', false ) ):

    	get_template_part( 'searchform', false );

    	endif; ?>

    	<?php tfm_header_right(); ?>
</div>
</div>

<div class="site-header-inner">
	<div class="header-layout-wrapper">
	<div class="primary-menu-container">

		<div class="primary-menu-section section-left">

			<?php tfm_toggle_icon( 'menu' ); ?>

			<?php tfm_primary_menu_section_left(); ?>

		</div>

		<?php if ( has_nav_menu( 'primary' ) ) :

	    wp_nav_menu( array( 'theme_location' => 'primary',
	     					'container' => 'nav',
	     					'container_class' => 'primary-menu-wrapper',
	     					'menu_class' => 'primary-menu',
	     					'menu_id' => 'primary-menu',
	     					'link_before' => '<span class="menu-label">',
	     					'link_after' => '</span>'));

	    endif; ?>

	    <div class="primary-menu-section section-right">

	    	<?php tfm_primary_menu_section_right(); ?>

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

			<?php tfm_toggle_icon( 'color-mode' );
				  tfm_toggle_icon( 'search' ); ?>

		</div>


	</div>
</div>

</div>