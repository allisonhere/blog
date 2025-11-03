<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Personal_Blog
 * @since 1.0
 * @version 1.0
 */

$tfm_vars = tfm_template_vars('', false);

tfm_before_wrapper_close();

?>
</div><!-- wrap-inner -->
</div><!-- .wrap -->

<?php

// Before Footer Hook
tfm_before_footer();

?>

		<footer id="colophon" class="site-footer<?php echo esc_attr( $tfm_vars['footer_classes']); ?>">

			<div class="site-footer-inner">

			<div class="footer-bottom">

				<?php if ( get_theme_mod( 'tfm_footer_text', get_bloginfo('description')) || get_theme_mod( 'tfm_footer_logo_upload', '') || ( function_exists('tfm_social_icons_theme_footer') && get_theme_mod( 'tfm_footer_text_social_icons', false ) )): ?>

					<div class="footer-copyright">
						<?php if (get_theme_mod( 'tfm_footer_logo_upload', '')):
						 tfm_site_logo( array( 'footer' => true ) );
						 endif; ?>
						<?php echo wp_kses_post( get_theme_mod( 'tfm_footer_text', get_bloginfo('description')) ); ?>
						<?php tfm_footer_copyright(); // hook ?>
					</div>

				<?php endif; ?>

				<?php

				if ( has_nav_menu( 'footer' ) ) :

				 wp_nav_menu( array( 'theme_location' => 'footer',
			     					 'container' => 'ul',
			     					 'depth' => 2,
			     					 'menu_class' => 'footer-nav',
			     					 'menu_id' => 'footer-nav'));

			     endif; ?>

				<?php

				// Append Footer Bottom
				tfm_append_footer_bottom();

				?>
			

			</div>

			<?php tfm_footer_inner(); ?>

		</div><!-- .footer-inner -->
		</footer>
		<?php if ( get_theme_mod( 'tfm_goto_top', true ) ): ?>
			<a href="" class="goto-top backtotop"><i class="icon-up-open"></i></a>
		<?php endif; ?>
		
		<?php

		// After Footer Hook
		tfm_after_footer();

		?>
		
<?php wp_footer(); ?>

</body>
</html>
