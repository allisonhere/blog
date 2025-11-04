<?php
/**
 * Post meta helpers.
 *
 * @package WordPress
 * @subpackage Mozda
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register meta box and REST exposure.
 */
function mozda_register_post_meta() {
	register_post_meta(
		'post',
		'mozda_featured_badge',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'boolean',
			'auth_callback'=> function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);

	register_post_meta(
		'post',
		'mozda_featured_badge_text',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
			'auth_callback'=> function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);

	register_post_meta(
		'post',
		'mozda_featured_badge_color',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'string',
			'auth_callback'=> function() {
				return current_user_can( 'edit_posts' );
			},
		)
	);
}
add_action( 'init', 'mozda_register_post_meta' );

/**
 * Register meta box.
 */
function mozda_add_post_meta_boxes() {
	add_meta_box(
		'mozda-post-highlights',
		esc_html__( 'Highlight & badge', 'mozda' ),
		'mozda_render_post_meta_box',
		'post',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'mozda_add_post_meta_boxes' );

/**
 * Render meta box content.
 *
 * @param WP_Post $post Post object.
 */
function mozda_render_post_meta_box( $post ) {
	wp_nonce_field( 'mozda_save_post_meta', 'mozda_post_meta_nonce' );

	$defaults   = mozda_get_branded_defaults();
	$enabled    = get_post_meta( $post->ID, 'mozda_featured_badge', true );
	$label      = get_post_meta( $post->ID, 'mozda_featured_badge_text', true );
	$color      = get_post_meta( $post->ID, 'mozda_featured_badge_color', true );
	?>
	<p>
		<label for="mozda_featured_badge">
			<input type="checkbox" name="mozda_featured_badge" id="mozda_featured_badge" value="1" <?php checked( $enabled, '1' ); ?> />
			<?php esc_html_e( 'Mark as featured', 'mozda' ); ?>
		</label>
	</p>
	<p>
		<label for="mozda_featured_badge_text"><?php esc_html_e( 'Badge label', 'mozda' ); ?></label>
		<input type="text" name="mozda_featured_badge_text" id="mozda_featured_badge_text" value="<?php echo esc_attr( $label ); ?>" class="widefat" placeholder="<?php echo esc_attr( $defaults['featured_badge'] ); ?>">
	</p>
	<p>
		<label for="mozda_featured_badge_color"><?php esc_html_e( 'Badge accent color', 'mozda' ); ?></label>
		<input type="text" name="mozda_featured_badge_color" id="mozda_featured_badge_color" class="mozda-color-field widefat" value="<?php echo esc_attr( $color ); ?>" placeholder="<?php esc_attr_e( '#da4453', 'mozda' ); ?>">
	</p>
	<?php
}

/**
 * Save post meta.
 *
 * @param int $post_id Post ID.
 */
function mozda_save_post_meta( $post_id ) {
	if ( ! isset( $_POST['mozda_post_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mozda_post_meta_nonce'] ) ), 'mozda_save_post_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$enabled = isset( $_POST['mozda_featured_badge'] ) ? 1 : 0;
	update_post_meta( $post_id, 'mozda_featured_badge', $enabled );

	if ( isset( $_POST['mozda_featured_badge_text'] ) ) {
		update_post_meta(
			$post_id,
			'mozda_featured_badge_text',
			sanitize_text_field( wp_unslash( $_POST['mozda_featured_badge_text'] ) )
		);
	}

	if ( isset( $_POST['mozda_featured_badge_color'] ) ) {
		$color = sanitize_hex_color( wp_unslash( $_POST['mozda_featured_badge_color'] ) );
		if ( $color ) {
			update_post_meta( $post_id, 'mozda_featured_badge_color', $color );
		} else {
			delete_post_meta( $post_id, 'mozda_featured_badge_color' );
		}
	}
}
add_action( 'save_post_post', 'mozda_save_post_meta' );

/**
 * Enqueue color picker on post edit screen.
 *
 * @param string $hook Current admin page.
 */
function mozda_enqueue_post_meta_assets( $hook ) {
	if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
		return;
	}

	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script(
		'mozda-post-meta',
		get_template_directory_uri() . '/admin/js/mozda-post-meta.js',
		array( 'jquery', 'wp-color-picker' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'admin_enqueue_scripts', 'mozda_enqueue_post_meta_assets' );
