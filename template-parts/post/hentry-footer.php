<?php
/**
 * The template for displaying tags and share links in the single post footer
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

$customizer_settings = tfm_general_settings();

?>

<?php tfm_before_hentry_footer(); ?>

<footer class="hentry-footer<?php if ( is_single() || is_page() ) { echo ' single-hentry-footer'; } ?>">
	
	<?php if ( tfm_toggle_entry_meta('read_more')) : ?>

		<a class="read-more" href="<?php the_permalink(); ?>"><?php echo esc_html__('read more', 'mozda'); ?></a>

	<?php endif; ?>

	<?php

	// ========================================================
	// Single tags
	// ========================================================

	if ( is_single() ) :
	
	$post_tags = get_the_tags();

	$tag_background = get_theme_mod( 'tfm_post_tag_background', $customizer_settings['tfm_post_tag_background']) ? ' has-background' : '';

	if ( $post_tags && get_theme_mod( 'tfm_single_post_tags', true )) : ?>

		<div class="entry-meta hentry-footer-meta post-tags">

		<ul class="single-post-tags">

		<?php foreach( $post_tags as $tag ) { ?>
	    	<li><a href="<?php echo get_tag_link($tag->term_id); ?>" aria-label="<?php echo esc_attr( $tag->name ); ?>" class="tag-link-<?php echo esc_attr( $tag->term_id . $tag_background ); ?>"><?php echo esc_html( $tag->name ); ?><?php if ( get_theme_mod( 'tfm_single_post_tags_count', true ) ) : ?><span class="tag-link-count"><span><?php echo esc_html( $tag->count ); ?></span></span><?php endif; ?></a></li> 
	    <?php } ?>

	    </ul>

	    </div>

	<?php

	endif;

	endif;

	// Author meta
	if ( ! is_single() ) :

		tfm_get_entry_meta( $meta_data = array( 'author_avatar', 'author', 'date'), $has_wrapper = true, $has_container = true, $html_style = 'li', $meta_wrapper_class = 'author', $meta_class = 'author-meta' );
		
	endif;

	tfm_hentry_footer_close(); ?>

</footer>

<?php tfm_after_hentry_footer(); ?>