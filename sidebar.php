<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

if ( ! in_array( 'has-sidebar', get_body_class( ) ) || ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$customizer_settings = tfm_general_settings();
$widget_background = $customizer_settings['tfm_widget_background'] !== get_theme_mod( 'tfm_widget_background', $customizer_settings['tfm_widget_background'] ) ? ' has-background' : '';
$widget_color = $customizer_settings['tfm_widget_color']  !== get_theme_mod( 'tfm_widget_color', $customizer_settings['tfm_widget_color'] ) ? ' has-custom-color' : '';
$widget_link_color = $customizer_settings['tfm_widget_link_color'] !== get_theme_mod( 'tfm_widget_link_color', $customizer_settings['tfm_widget_link_color'] ) ? ' has-custom-link-color' : '';
$hidden_mobile = get_theme_mod( 'tfm_mobile_hide_sidebar', false ) ? ' hidden-mobile' : '';
?>

<aside id="aside-sidebar" class="aside-sidebar sidebar sidebar-1<?php echo esc_attr( $widget_background . $widget_color . $widget_link_color . $hidden_mobile ); ?>" aria-label="<?php esc_attr_e( 'Sidebar', 'mozda' ); ?>">
	<?php if ( get_theme_mod( 'tfm_static_sidebar_sticky', true )): ?>
	<div class="aside-sticky-container">
	<?php endif; ?>
		<?php

		// Widgets
		if (is_active_sidebar( 'sidebar-1' )) {
			dynamic_sidebar( 'sidebar-1');
		}

		?>
	<?php if ( get_theme_mod( 'tfm_static_sidebar_sticky', true )): ?>
	</div>
	<?php endif; ?>

</aside>
