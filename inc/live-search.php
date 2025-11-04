<?php
/**
 * AJAX live search endpoint.
 *
 * @package WordPress
 * @subpackage Mozda
 */

defined( 'ABSPATH' ) || exit;

/**
 * Handle live search requests.
 */
function mozda_handle_live_search() {
	check_ajax_referer( 'mozda_live_search', 'nonce' );

	$query = isset( $_POST['query'] ) ? sanitize_text_field( wp_unslash( $_POST['query'] ) ) : '';

	if ( '' === $query ) {
		wp_send_json_success(
			array(
				'results' => array(),
			)
		);
	}

	$search = new WP_Query(
		array(
			'post_type'           => array( 'post', 'page' ),
			'post_status'         => 'publish',
			's'                   => $query,
			'posts_per_page'      => 6,
			'no_found_rows'       => true,
			'ignore_sticky_posts' => true,
		)
	);

	$results = array();

	if ( $search->have_posts() ) {
		while ( $search->have_posts() ) {
			$search->the_post();

			$results[] = array(
				'title'   => get_the_title(),
				'url'     => get_permalink(),
				'excerpt' => wp_trim_words( strip_shortcodes( get_the_excerpt() ? get_the_excerpt() : get_the_content() ), 18 ),
				'date'    => get_the_date(),
			);
		}
		wp_reset_postdata();
	}

	wp_send_json_success(
		array(
			'results' => $results,
		)
	);
}
add_action( 'wp_ajax_mozda_live_search', 'mozda_handle_live_search' );
add_action( 'wp_ajax_nopriv_mozda_live_search', 'mozda_handle_live_search' );
