<?php
/**
 * Branded sections and reusable hook content.
 *
 * @package WordPress
 * @subpackage Mozda
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register branded sections against theme hooks.
 */
function mozda_register_branded_sections() {
	add_action( 'tfm_before_loop', 'mozda_render_archive_hero', 5 );
	add_action( 'tfm_after_loop', 'mozda_render_newsletter_banner', 12 );
	add_action( 'tfm_after_the_content', 'mozda_render_post_footer_cta', 15 );
	add_action( 'mozda_archive_intro_card', 'mozda_render_archive_intro_card', 10 );
	add_action( 'tfm_post_inner_open', 'mozda_render_featured_badge', 5 );
}
add_action( 'after_setup_theme', 'mozda_register_branded_sections' );

/**
 * Return default settings array.
 *
 * @return array
 */
function mozda_get_branded_defaults() {
	$settings = tfm_general_settings();

	return array(
		'hero_heading'        => isset( $settings['branded_hero_heading'] ) ? $settings['branded_hero_heading'] : __( 'Welcome to the story', 'mozda' ),
		'hero_subheading'     => isset( $settings['branded_hero_subheading'] ) ? $settings['branded_hero_subheading'] : __( 'Insights, experiments, and notes from the journey.', 'mozda' ),
		'hero_button_label'   => isset( $settings['branded_hero_button_label'] ) ? $settings['branded_hero_button_label'] : __( 'Start reading', 'mozda' ),
		'hero_button_url'     => isset( $settings['branded_hero_button_url'] ) ? $settings['branded_hero_button_url'] : '',
		'newsletter_heading'  => isset( $settings['branded_newsletter_heading'] ) ? $settings['branded_newsletter_heading'] : __( 'Stay in the loop', 'mozda' ),
		'newsletter_text'     => isset( $settings['branded_newsletter_text'] ) ? $settings['branded_newsletter_text'] : __( 'Join the newsletter to receive curated notes once a week.', 'mozda' ),
		'newsletter_shortcode'=> isset( $settings['branded_newsletter_shortcode'] ) ? $settings['branded_newsletter_shortcode'] : '',
		'post_footer_heading' => isset( $settings['branded_post_footer_heading'] ) ? $settings['branded_post_footer_heading'] : __( 'Keep exploring', 'mozda' ),
		'post_footer_text'    => isset( $settings['branded_post_footer_text'] ) ? $settings['branded_post_footer_text'] : __( 'Readers also enjoyed these picks.', 'mozda' ),
		'post_footer_button_label' => isset( $settings['branded_post_footer_button_label'] ) ? $settings['branded_post_footer_button_label'] : __( 'Browse the archive', 'mozda' ),
		'post_footer_button_url'   => isset( $settings['branded_post_footer_button_url'] ) ? $settings['branded_post_footer_button_url'] : '',
		'accent'              => isset( $settings['branded_accent_fallback'] ) ? $settings['branded_accent_fallback'] : '#da4453',
		'featured_badge'      => isset( $settings['featured_badge_default_label'] ) ? $settings['featured_badge_default_label'] : __( 'Featured', 'mozda' ),
	);
}

/**
 * Build archive context data.
 *
 * @return array
 */
function mozda_get_archive_context() {
	$defaults = mozda_get_branded_defaults();

	$context = array(
		'title'       => '',
		'description' => '',
		'image'       => '',
		'accent'      => $defaults['accent'],
		'button_label'=> get_theme_mod( 'tfm_branded_hero_button_label', $defaults['hero_button_label'] ),
		'button_url'  => get_theme_mod( 'tfm_branded_hero_button_url', $defaults['hero_button_url'] ),
		'overline'    => '',
	);

	if ( is_category() || is_tag() || is_tax() ) {
		$term = get_queried_object();

		if ( ! $term instanceof WP_Term ) {
			return $context;
		}

		$context['title'] = $term->name;

		$intro = get_term_meta( $term->term_id, 'mozda_intro_text', true );
		if ( empty( $intro ) ) {
			$intro = term_description( $term, $term->taxonomy );
		}
		$context['description'] = wp_strip_all_tags( $intro );

		$image_id = absint( get_term_meta( $term->term_id, 'mozda_cover_image_id', true ) );
		if ( $image_id ) {
			$context['image'] = wp_get_attachment_image_url( $image_id, 'large' );
		}

		$accent = get_term_meta( $term->term_id, 'mozda_accent_color', true );
		if ( $accent ) {
			$context['accent'] = $accent;
		}

		$context['overline'] = sprintf(
			/* translators: %s: taxonomy singular label */
			__( 'Browse %s', 'mozda' ),
			esc_html( get_taxonomy( $term->taxonomy )->labels->singular_name )
		);
	} elseif ( is_search() ) {
		$context['title']       = __( 'Search results', 'mozda' );
		$context['description'] = esc_html__( 'Fresh finds as you explore the archive. Refine the query to zero in on the story you need.', 'mozda' );
		$context['overline']    = esc_html__( 'Live search', 'mozda' );
	} elseif ( is_author() ) {
		$author = get_queried_object();
		if ( $author instanceof WP_User ) {
			$context['title']       = $author->display_name;
			$context['description'] = get_user_meta( $author->ID, 'description', true );
			$context['overline']    = esc_html__( 'Stories by', 'mozda' );
		}
	} elseif ( is_home() || is_post_type_archive( 'post' ) ) {
		$context['title']       = get_theme_mod( 'tfm_branded_hero_heading', $defaults['hero_heading'] );
		$context['description'] = get_theme_mod( 'tfm_branded_hero_subheading', $defaults['hero_subheading'] );
		$context['overline']    = esc_html__( 'Latest dispatch', 'mozda' );
		$context['image']       = get_theme_mod( 'tfm_branded_hero_cover_image', '' );
	}

	return apply_filters( 'mozda_archive_context', $context );
}

/**
 * Render hero CTA before the main loop.
 */
function mozda_render_archive_hero() {
	set_query_var( 'mozda_archive_intro_displayed', false );

	if ( is_paged() ) {
		return;
	}

	if ( ! ( is_home() || is_archive() || is_search() ) ) {
		return;
	}

	if ( ! get_theme_mod( 'tfm_branded_hero_enable', true ) ) {
		return;
	}

	$context = mozda_get_archive_context();

	if ( empty( $context['title'] ) && empty( $context['description'] ) ) {
		return;
	}

	$accent   = $context['accent'];
	$gradient = sprintf( 'linear-gradient(135deg, %1$s 0%%, rgba(255,255,255,0) 100%%)', esc_attr( $accent ) );
	?>
	<section class="mozda-branded-section mozda-archive-hero" aria-label="<?php echo esc_attr__( 'Featured introduction', 'mozda' ); ?>">
		<div class="mozda-hero-shell">
			<?php if ( ! empty( $context['image'] ) ) : ?>
				<div class="mozda-hero-media" style="<?php echo esc_attr( 'background-image: url(' . esc_url( $context['image'] ) . ');' ); ?>" aria-hidden="true"></div>
			<?php endif; ?>
			<div class="mozda-glass-card">
				<span class="mozda-gradient-divider" style="<?php echo esc_attr( 'background-image:' . $gradient . ';' ); ?>"></span>
				<?php if ( ! empty( $context['overline'] ) ) : ?>
					<p class="mozda-overline"><?php echo esc_html( $context['overline'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $context['title'] ) ) : ?>
					<h1 class="mozda-hero-title"><?php echo esc_html( $context['title'] ); ?></h1>
				<?php endif; ?>
				<?php if ( ! empty( $context['description'] ) ) : ?>
					<p class="mozda-hero-description"><?php echo esc_html( $context['description'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $context['button_label'] ) && ! empty( $context['button_url'] ) ) : ?>
					<a class="mozda-hero-button" href="<?php echo esc_url( $context['button_url'] ); ?>">
						<?php echo esc_html( $context['button_label'] ); ?>
						<span aria-hidden="true">&rarr;</span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}

/**
 * Render newsletter banner after loop.
 */
function mozda_render_newsletter_banner() {
	if ( ! ( is_home() || is_archive() ) ) {
		return;
	}

	if ( is_paged() ) {
		return;
	}

	if ( ! get_theme_mod( 'tfm_branded_newsletter_enable', true ) ) {
		return;
	}

	$defaults = mozda_get_branded_defaults();

	$heading      = get_theme_mod( 'tfm_branded_newsletter_heading', $defaults['newsletter_heading'] );
	$copy         = get_theme_mod( 'tfm_branded_newsletter_text', $defaults['newsletter_text'] );
	$shortcode    = get_theme_mod( 'tfm_branded_newsletter_shortcode', $defaults['newsletter_shortcode'] );
	$context      = mozda_get_archive_context();
	$accent       = isset( $context['accent'] ) ? $context['accent'] : $defaults['accent'];
	$shortcode_tag = '';
	if ( ! empty( $shortcode ) && preg_match( '/\[([a-z0-9_-]+)/i', $shortcode, $matches ) ) {
		$shortcode_tag = isset( $matches[1] ) ? sanitize_key( $matches[1] ) : '';
	}

	?>
	<section class="mozda-branded-section mozda-newsletter" aria-label="<?php echo esc_attr__( 'Newsletter signup', 'mozda' ); ?>">
		<div class="mozda-glass-card mozda-newsletter-card">
			<span class="mozda-gradient-divider" style="<?php echo esc_attr( 'background-image: linear-gradient(135deg,' . esc_attr( $accent ) . ' 0%, rgba(255,255,255,0) 100%);' ); ?>"></span>
			<div class="mozda-newsletter-copy">
				<?php if ( ! empty( $heading ) ) : ?>
					<h2><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $copy ) ) : ?>
					<p><?php echo esc_html( $copy ); ?></p>
				<?php endif; ?>
			</div>
			<div class="mozda-newsletter-form">
				<?php
				if ( ! empty( $shortcode_tag ) && shortcode_exists( $shortcode_tag ) ) {
					echo do_shortcode( $shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				} else {
					printf(
						'<a class="mozda-hero-button" href="%1$s">%2$s<span aria-hidden="true">&rarr;</span></a>',
						esc_url( home_url( '/subscribe/' ) ),
						esc_html__( 'Subscribe via email', 'mozda' )
					);
				}
				?>
			</div>
		</div>
	</section>
	<?php
}

/**
 * Calculate reading time in minutes.
 *
 * @param int $post_id Post ID.
 * @return int
 */
function mozda_calculate_reading_time( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$content = get_post_field( 'post_content', $post_id );
	$words   = str_word_count( wp_strip_all_tags( $content ) );

	return max( 1, (int) ceil( $words / 220 ) );
}

/**
 * Render post footer CTA on single posts.
 */
function mozda_render_post_footer_cta() {
	if ( ! is_single() || 'post' !== get_post_type() ) {
		return;
	}

	if ( ! get_theme_mod( 'tfm_branded_post_footer_enable', true ) ) {
		return;
	}

	$defaults = mozda_get_branded_defaults();

	$heading      = get_theme_mod( 'tfm_branded_post_footer_heading', $defaults['post_footer_heading'] );
	$copy         = get_theme_mod( 'tfm_branded_post_footer_text', $defaults['post_footer_text'] );
	$button_label = get_theme_mod( 'tfm_branded_post_footer_button_label', $defaults['post_footer_button_label'] );
	$button_url   = get_theme_mod( 'tfm_branded_post_footer_button_url', $defaults['post_footer_button_url'] );
	$accent       = get_theme_mod( 'tfm_branded_post_footer_accent', $defaults['accent'] );

	$reading_time = mozda_calculate_reading_time();

	$related_args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => 3,
		'post__not_in'        => array( get_the_ID() ),
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	);

	$categories = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );
	if ( ! empty( $categories ) ) {
		$related_args['category__in'] = $categories;
	}

	$related_posts = new WP_Query( $related_args );

	?>
	<section class="mozda-branded-section mozda-post-footer" aria-label="<?php echo esc_attr__( 'More to explore', 'mozda' ); ?>">
		<div class="mozda-glass-card mozda-post-footer-card">
			<span class="mozda-gradient-divider" style="<?php echo esc_attr( 'background-image: linear-gradient(135deg,' . esc_attr( $accent ) . ' 0%, rgba(255,255,255,0) 100%);' ); ?>"></span>
			<div class="mozda-post-footer-header">
				<?php if ( ! empty( $heading ) ) : ?>
					<h2><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
				<p class="mozda-reading-time">
					<?php
					printf(
						/* translators: %d: minute count */
						esc_html__( 'Estimated reading time: %d minute(s)', 'mozda' ),
						absint( $reading_time )
					);
					?>
				</p>
				<?php if ( ! empty( $copy ) ) : ?>
					<p class="mozda-post-footer-copy"><?php echo esc_html( $copy ); ?></p>
				<?php endif; ?>
			</div>
			<?php if ( $related_posts->have_posts() ) : ?>
				<ul class="mozda-related-posts">
					<?php
					while ( $related_posts->have_posts() ) :
						$related_posts->the_post();
						?>
						<li>
							<a href="<?php the_permalink(); ?>">
								<span class="mozda-related-title"><?php the_title(); ?></span>
								<span class="mozda-related-meta"><?php echo esc_html( get_the_date() ); ?></span>
							</a>
						</li>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</ul>
			<?php endif; ?>
			<?php if ( ! empty( $button_label ) && ! empty( $button_url ) ) : ?>
				<a class="mozda-hero-button" href="<?php echo esc_url( $button_url ); ?>">
					<?php echo esc_html( $button_label ); ?>
					<span aria-hidden="true">&rarr;</span>
				</a>
			<?php endif; ?>
		</div>
	</section>
	<?php
}

/**
 * Output archive intro card inside the loop (first item only).
 */
function mozda_render_archive_intro_card() {
	if ( ! ( is_archive() || is_search() ) ) {
		return;
	}

	if ( get_query_var( 'mozda_archive_intro_displayed' ) ) {
		return;
	}

	set_query_var( 'mozda_archive_intro_displayed', true );

	$context = mozda_get_archive_context();

	if ( empty( $context['description'] ) ) {
		return;
	}

	?>
	<div class="mozda-archive-intro-card">
		<p class="mozda-overline"><?php echo esc_html__( 'In this collection', 'mozda' ); ?></p>
		<p><?php echo esc_html( $context['description'] ); ?></p>
	</div>
	<?php
}

/**
 * Render featured badge if post meta is set.
 */
function mozda_render_featured_badge() {
	if ( is_singular() ) {
		return;
	}

	$post_id = get_the_ID();
	if ( ! $post_id ) {
		return;
	}

	$badge_text = get_post_meta( $post_id, 'mozda_featured_badge_text', true );
	if ( empty( $badge_text ) ) {
		$defaults   = mozda_get_branded_defaults();
		$badge_flag = get_post_meta( $post_id, 'mozda_featured_badge', true );
		if ( ! $badge_flag ) {
			return;
		}
		$badge_text = $defaults['featured_badge'];
	}

	$badge_color = get_post_meta( $post_id, 'mozda_featured_badge_color', true );

	printf(
		'<span class="mozda-featured-badge"%2$s>%1$s</span>',
		esc_html( $badge_text ),
		! empty( $badge_color ) ? ' style="--mozda-featured-badge:' . esc_attr( $badge_color ) . ';"' : ''
	);
}
