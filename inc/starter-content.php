<?php
/**
 * Seed initial welcome post on theme activation.
 *
 * @package WordPress
 * @subpackage Mozda
 */

defined( 'ABSPATH' ) || exit;

/**
 * Insert welcome post the first time the theme is activated.
 */
function mozda_seed_welcome_post() {
	if ( get_option( 'mozda_welcome_post_seeded' ) ) {
		return;
	}

	if ( defined( 'WP_IMPORTING' ) && WP_IMPORTING ) {
		return;
	}

	$user_id = get_current_user_id();
	if ( ! $user_id ) {
		$user_id = get_users(
			array(
				'role__in' => array( 'administrator', 'editor' ),
				'number'   => 1,
				'orderby'  => 'ID',
				'order'    => 'ASC',
				'fields'   => array( 'ID' ),
			)
		);

		$user_id = ! empty( $user_id ) ? (int) $user_id[0]->ID : 1;
	}

	$category = get_term_by( 'slug', 'announcements', 'category' );
	if ( ! $category ) {
		$term_result = wp_insert_term(
			__( 'Announcements', 'mozda' ),
			'category',
			array(
				'slug'        => 'announcements',
				'description' => __( 'High-level updates and orientation posts.', 'mozda' ),
			)
		);

		if ( ! is_wp_error( $term_result ) ) {
			$category = get_term( $term_result['term_id'], 'category' );
		}
	}

	$category_ids = array();
	if ( $category instanceof WP_Term ) {
		$category_ids[] = (int) $category->term_id;
	}

	$post_content = <<<HTML
<!-- wp:paragraph {"className":"mozda-featured-intro"} -->
<p class="mozda-featured-intro">Forty years ago, a curious kid with a Commodore and graph paper started sketching cities. One of those sketches became SimCity.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>Why I Built This Home</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>I wanted a space that feels like my earliest notebooks: part lab, part journal, part launchpad. Social feeds gulp things down too fast. This blog lets me take my time—sketching maps, iterating systems, and documenting what actually works.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>Inside the Lab</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li><strong>Field Notes:</strong> snapshots of whatever prototype, prompt, or system I’m testing right now.</li><li><strong>Deep Dives:</strong> essays that trace the design thinking behind SimCity and the enterprise dashboards I built for Fortune 500 teams.</li><li><strong>Toolbox Updates:</strong> reviews of the 3D rigs, UX frameworks, and templates I still rely on.</li></ul>
<!-- /wp:list -->

<!-- wp:image {"sizeSlug":"large","className":"is-style-default"} -->
<figure class="wp-block-image size-large is-style-default"><img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&amp;fit=crop&amp;w=1600&amp;q=80" alt="Early computer desk with city simulation sketches." /><figcaption>SimCity began as pencil sketches and probability charts. I still sketch the messy middle first.</figcaption></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":2} -->
<h2>What I’ve Been Building</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>My career has bounced between code and canvas. I shipped SimCity in the late 80s, animated collision reconstructions in the 90s, and led UX teams for Fortune 500 backends when Netscape was still cutting edge. The throughline has always been systems thinking and human intuition.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>These days I’m retired from titles, not from the craft. I still write code, still wireframe, still obsess over how interaction models make people feel.</p>
<!-- /wp:paragraph -->

<!-- wp:quote -->
<blockquote class="wp-block-quote"><p>“SimCity taught me a lifetime lesson: small rules can bloom into whole worlds. Thoughtful UX does the same.”</p><cite>— Field Notes</cite></blockquote>
<!-- /wp:quote -->

<!-- wp:heading {"level":3} -->
<h3>What’s Coming Next</h3>
<!-- /wp:heading -->

<!-- wp:list {"ordered":true} -->
<ol><li>A behind-the-scenes series on how SimCity’s simulation engine informs today’s product strategy.</li><li>Templates for UX teams wrestling with enterprise-scale dashboards.</li><li>A monthly feature called <em>Studio Dispatch</em>—part nostalgia, part prototype lab.</li></ol>
<!-- /wp:list -->

<!-- wp:image {"sizeSlug":"large","className":"is-style-default"} -->
<figure class="wp-block-image size-large is-style-default"><img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&amp;fit=crop&amp;w=1600&amp;q=80" alt="Hands sketching interface wireframes." /><figcaption>Whether it’s city simulators, accident reconstructions, or UX dashboards—everything starts with a pencil.</figcaption></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":2} -->
<h2>Stay in the Loop</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Drop your email in the bright newsletter box and I’ll send the highlight reel straight to you. Subscribers get:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Weekly summaries in under five minutes.</li><li>First access to my UX templates, simulation spreadsheets, and reconstruction walk-throughs.</li><li>A curated “signal vs. noise” reading list from someone who still reads the footnotes.</li></ul>
<!-- /wp:list -->

<!-- wp:image {"sizeSlug":"large","className":"is-style-default"} -->
<figure class="wp-block-image size-large is-style-default"><img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&amp;fit=crop&amp;w=1600&amp;q=80" alt="Person reading a notebook with coffee nearby." /><figcaption>Settle in with your favorite notebook—we’re just getting started.</figcaption></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":2} -->
<h2>How You Can Join In</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Tell me what you’re building. Drop a note if you’re remixing SimCity’s mindset, modernizing a backend, or stitching motion into your prototypes. The comments are open, and I still love a good design challenge.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Thanks for stopping by. Scroll through the archive, toggle the lights, and keep an eye out for the first <em>Studio Dispatch</em>. Even in retirement, the lab is wide awake.</p>
<!-- /wp:paragraph -->
HTML;

	$post_data = array(
		'post_title'   => __( 'Welcome to My Studio of Ideas', 'mozda' ),
		'post_name'    => 'welcome-to-my-studio-of-ideas',
		'post_content' => $post_content,
		'post_excerpt' => __( 'Every experiment, essay, and insight that shapes my practice now lives here. Let me show you around.', 'mozda' ),
		'post_status'  => 'publish',
		'post_author'  => $user_id,
	);

	$post_id = wp_insert_post( $post_data, true );

	if ( is_wp_error( $post_id ) ) {
		return;
	}

	if ( ! empty( $category_ids ) ) {
		wp_set_post_terms( $post_id, $category_ids, 'category' );
	}

update_post_meta( $post_id, 'mozda_featured_badge', 1 );
update_post_meta( $post_id, 'mozda_featured_badge_text', __( 'Origin Story', 'mozda' ) );

	update_option( 'mozda_welcome_post_seeded', 1 );
}
add_action( 'after_switch_theme', 'mozda_seed_welcome_post' );
add_action( 'admin_init', 'mozda_seed_welcome_post' );
