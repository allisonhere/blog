<?php
/**
 * Template part for displaying prev/next post navigation
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Mozda
 * @since 1.0
 * @version 1.0
 */

?>

<?php

if ( false === get_theme_mod( 'tfm_single_post_navigation', true ) ) {
	return false;
}

$prev_post = get_previous_post();
$next_post = get_next_post();

$layout = get_theme_mod( 'tfm_single_post_navigation_layout', 'grid');
$prev_next_post_style = get_theme_mod( 'tfm_single_post_navigation_style', 'default' );
$thumbnail_aspect_ratio = 'list' === $layout ? 'square' : 'wide';
$prev_thumbnail= ( $prev_post && get_theme_mod( 'tfm_single_post_navigation_thumbnail', false ) && '' !== get_the_post_thumbnail( $prev_post->ID ) ? ' has-post-media has-post-thumbnail thumbnail-' . $thumbnail_aspect_ratio : '' );
$next_thumbnail = ( $next_post && get_theme_mod( 'tfm_single_post_navigation_thumbnail', false ) && '' !== get_the_post_thumbnail( $next_post->ID ) ? ' has-post-media has-post-thumbnail thumbnail-' . $thumbnail_aspect_ratio : '' );
$has_section_header = get_theme_mod( 'tfm_single_post_navigation_header', true ) ? ' has-header' : '';
$prev_next_post_style = 'list' === $layout ? 'default' : $prev_next_post_style;
$cols = $layout === 'list' && (( $prev_post && ! $next_post ) || ( $next_post && ! $prev_post)) ? 1 : 2;
$has_prev_post = $prev_post ? ' has-prev-post' : '';
$has_next_post = $next_post ? ' has-next-post' : '';
$has_excerpt = get_theme_mod( 'tfm_single_post_navigation_excerpt', false ) ? ' has-excerpt' : false;
$has_category = get_theme_mod( 'tfm_single_post_navigation_category', false ) ? ' has-category' : false;

if ( $prev_post || $next_post ) : ?>

<div class="content-area post-navigation post-grid mobile-compact <?php echo esc_attr( $layout . $has_section_header . $has_next_post . $has_prev_post ); ?> cols-<?php echo esc_attr( $cols ); ?>">
	<?php if ( get_theme_mod( 'tfm_single_post_navigation_header', false )): ?>
	<div class="section-header">
		<h4><?php echo esc_html__( 'More Reading', 'mozda' ); ?></h4>
	</div>
<?php endif; ?>
	<h2 class="screen-reader-text">Post navigation</h2>

<?php if ( $prev_post ): ?>

	<article class="article post hentry previous-article has-category-meta <?php echo esc_attr( $prev_thumbnail . $has_excerpt . $has_category . ' ' . $prev_next_post_style  ); ?>">
		<div class="post-inner">
		<?php if ( $prev_thumbnail ) : ?>
			<div class="thumbnail-wrapper">
			<figure class="post-thumbnail">
	  				<a href="<?php the_permalink( $prev_post->ID ); ?>"><?php echo get_the_post_thumbnail( $prev_post->ID, 'medium_large' ); ?></a>
	  	</figure>
	  	<?php if ( 'cover' !== $prev_next_post_style ): ?>
	  	<a href="<?php the_permalink( $prev_post->ID ); ?>">
	  	<div class="entry-meta after-title prev-next-wrap"> 

  				<span class="prev-next prev"><?php echo esc_html__( 'Previous Post', 'mozda' ); ?></span>

  			</div>
  		</a>
  	<?php endif; ?>
	  </div>
	  <?php endif; ?>
	  <?php if ( ( $layout === 'list' || $prev_next_post_style === 'cover' ) && '' !== $prev_thumbnail ): ?>
	  <div class="entry-wrapper">
	  <?php endif; ?>
  				<?php if ( get_theme_mod( 'tfm_single_post_navigation_category', false ) ) :
  				tfm_get_entry_meta( $meta_data = array('category', 'args' => array('num' => 1, 'post_id' => $prev_post->ID)), $has_wrapper = true, $has_container = true, $html_style = 'li', $meta_wrapper_class = 'category-meta', $meta_class = 'categories' );
  				endif; ?>
  			<h3 class="entry-title"><a href="<?php the_permalink( $prev_post->ID ); ?>"><?php echo wp_kses_post( $prev_post->post_title ); ?></a></h3>
  			<?php if ( ! $prev_thumbnail || ( $prev_thumbnail && 'cover' === $prev_next_post_style ) ) : ?>
  						<div class="entry-meta after-title prev-next-wrap"> 
  				<?php 

          // Link the prev/next post string if we have no titles

  				if ( strlen($prev_post->post_title) == 0 ) : ?>

            <a href="<?php the_permalink( $prev_post->ID ); ?>">

  				<?php endif; ?>

  					<span class="prev-next prev"><?php echo esc_html__( 'Previous Post', 'mozda' ); ?></span>

  				<?php if ( strlen($prev_post->post_title) == 0 ) : ?>

            </a>

  				<?php endif; ?>

  				</div>

  			<?php endif; ?>

  				<?php if ( get_theme_mod( 'tfm_single_post_navigation_excerpt', false ) ): ?>

  				<?php tfm_get_excerpt( $prev_post->ID, 16 ); ?>

  			<?php endif; ?>

  				<?php if ( ( $layout === 'list' || $prev_next_post_style === 'cover' ) && '' !== $prev_thumbnail ): ?>
  	</div>
  <?php endif; ?>
  	</div>
  </article>

<?php endif; ?>

<?php if ( $next_post ): ?>

	<article class="article post hentry next-article has-category-meta <?php echo esc_attr( $next_thumbnail . ' ' . $prev_next_post_style  ); ?>">
		<div class="post-inner">
		<?php if ( $next_thumbnail ) : ?>
			<div class="thumbnail-wrapper">
		<figure class="post-thumbnail">

	  				<a href="<?php the_permalink( $next_post->ID ); ?>">

	  				<?php echo get_the_post_thumbnail( $next_post->ID, 'medium_large' ); ?>

	  				</a>

	  	</figure>
	  	<?php if ( 'cover' !== $prev_next_post_style ):  ?>
	  	<a href="<?php the_permalink( $next_post->ID ); ?>">
	  	<div class="entry-meta after-title prev-next-wrap"> 

  				<span class="prev-next next"><?php echo esc_html__( 'Next Post', 'mozda' ); ?></span>

  			</div>
  		</a>
  	<?php endif; ?>
	  </div>
	  	<?php endif; ?>
	  	<?php if ( ( $layout === 'list' || $prev_next_post_style === 'cover' ) && '' !== $next_thumbnail ): ?>
	  <div class="entry-wrapper">
	  <?php endif; ?>
  				<?php  if ( get_theme_mod( 'tfm_single_post_navigation_category', false ) ) :
  					tfm_get_entry_meta( $meta_data = array('category', 'args' => array('num' => 1, 'post_id' => $next_post->ID)), $has_wrapper = true, $has_container = true, $html_style = 'li', $meta_wrapper_class = 'category-meta', $meta_class = 'categories' );
  					endif; ?>
  			<h3 class="entry-title"><a href="<?php the_permalink( $next_post->ID ); ?>"><?php echo wp_kses_post( $next_post->post_title ); ?></a></h3>
  			<?php if ( ! $next_thumbnail || ( $next_thumbnail && 'cover' === $prev_next_post_style ) ) : ?>
  			<div class="entry-meta after-title prev-next-wrap"> 
  				<?php 

          // Link the prev/next post string if we have no titles

  				if ( strlen($next_post->post_title) == 0 ) : ?>

            <a href="<?php the_permalink( $next_post->ID ); ?>">

  				<?php endif; ?>

  					<span class="prev-next next"><?php echo esc_html__( 'Next Post', 'mozda' ); ?></span>

  				<?php if ( strlen($next_post->post_title) == 0 ) : ?>

            </a>

  				<?php endif; ?>

  				</div>

  			<?php endif; ?>

  				<?php if ( get_theme_mod( 'tfm_single_post_navigation_excerpt', false ) ): ?>

  				<?php tfm_get_excerpt( $next_post->ID, 16 ); ?>

  			<?php endif; ?>

  	<?php if ( ( $layout === 'list' || $prev_next_post_style === 'cover' ) && '' !== $next_thumbnail ): ?>
	  </div>
	  <?php endif; ?>
  	</div>
  	</article>

<?php endif; ?>

</div>

<?php endif; ?>