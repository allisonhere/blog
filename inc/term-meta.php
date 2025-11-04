<?php
/**
 * Additional term meta for archive enhancements.
 *
 * @package WordPress
 * @subpackage Mozda
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register hooks for category meta.
 */
function mozda_register_term_meta_hooks() {
	add_action( 'category_add_form_fields', 'mozda_category_meta_add_fields' );
	add_action( 'category_edit_form_fields', 'mozda_category_meta_edit_fields' );
	add_action( 'created_category', 'mozda_save_category_meta' );
	add_action( 'edited_category', 'mozda_save_category_meta' );
	add_action( 'admin_enqueue_scripts', 'mozda_enqueue_term_meta_assets' );
}
add_action( 'init', 'mozda_register_term_meta_hooks' );

/**
 * Output term meta fields on add screen.
 *
 * @param string $taxonomy Taxonomy slug.
 */
function mozda_category_meta_add_fields( $taxonomy ) {
	wp_nonce_field( 'mozda_save_term_meta', 'mozda_term_meta_nonce' );
	?>
	<div class="form-field">
		<label for="mozda_intro_text"><?php esc_html_e( 'Archive intro', 'mozda' ); ?></label>
		<textarea name="mozda_intro_text" id="mozda_intro_text" rows="4" placeholder="<?php esc_attr_e( 'Short teaser that appears above the grid.', 'mozda' ); ?>"></textarea>
		<p class="description"><?php esc_html_e( 'Use one or two sentences to set the scene for this category.', 'mozda' ); ?></p>
	</div>

	<div class="form-field mozda-term-media">
		<label><?php esc_html_e( 'Cover image', 'mozda' ); ?></label>
		<input type="hidden" name="mozda_cover_image_id" id="mozda_cover_image_id" value="">
		<div class="mozda-term-image-preview" style="display:none;"></div>
		<button type="button" class="button mozda-upload-cover"><?php esc_html_e( 'Choose image', 'mozda' ); ?></button>
		<button type="button" class="button button-link-delete mozda-remove-cover" style="display:none;"><?php esc_html_e( 'Remove image', 'mozda' ); ?></button>
		<p class="description"><?php esc_html_e( 'Shown in the archive hero panel.', 'mozda' ); ?></p>
	</div>

	<div class="form-field">
		<label for="mozda_accent_color"><?php esc_html_e( 'Accent color', 'mozda' ); ?></label>
		<input type="text" name="mozda_accent_color" id="mozda_accent_color" class="mozda-color-field" value="">
		<p class="description"><?php esc_html_e( 'Optional accent used for gradients and dividers.', 'mozda' ); ?></p>
	</div>
	<?php
}

/**
 * Output term meta fields on edit screen.
 *
 * @param WP_Term $term Term object.
 */
function mozda_category_meta_edit_fields( $term ) {
	wp_nonce_field( 'mozda_save_term_meta', 'mozda_term_meta_nonce' );

	$intro      = get_term_meta( $term->term_id, 'mozda_intro_text', true );
	$image_id   = absint( get_term_meta( $term->term_id, 'mozda_cover_image_id', true ) );
	$accent     = get_term_meta( $term->term_id, 'mozda_accent_color', true );
	$image_url  = $image_id ? wp_get_attachment_image_url( $image_id, 'medium' ) : '';
	?>
	<tr class="form-field term-group-wrap">
		<th scope="row"><label for="mozda_intro_text"><?php esc_html_e( 'Archive intro', 'mozda' ); ?></label></th>
		<td>
			<textarea name="mozda_intro_text" id="mozda_intro_text" rows="4" class="large-text"><?php echo esc_textarea( $intro ); ?></textarea>
			<p class="description"><?php esc_html_e( 'Use one or two sentences to set the scene for this category.', 'mozda' ); ?></p>
		</td>
	</tr>

	<tr class="form-field term-group-wrap mozda-term-media">
		<th scope="row"><label><?php esc_html_e( 'Cover image', 'mozda' ); ?></label></th>
		<td>
			<input type="hidden" name="mozda_cover_image_id" id="mozda_cover_image_id" value="<?php echo esc_attr( $image_id ); ?>">
			<div class="mozda-term-image-preview" <?php echo $image_url ? '' : 'style="display:none;"'; ?>>
				<?php if ( $image_url ) : ?>
					<img src="<?php echo esc_url( $image_url ); ?>" alt="" />
				<?php endif; ?>
			</div>
			<button type="button" class="button mozda-upload-cover"><?php echo $image_url ? esc_html__( 'Change image', 'mozda' ) : esc_html__( 'Choose image', 'mozda' ); ?></button>
			<button type="button" class="button button-link-delete mozda-remove-cover" <?php echo $image_url ? '' : 'style="display:none;"'; ?>><?php esc_html_e( 'Remove image', 'mozda' ); ?></button>
			<p class="description"><?php esc_html_e( 'Shown in the archive hero panel.', 'mozda' ); ?></p>
		</td>
	</tr>

	<tr class="form-field term-group-wrap">
		<th scope="row"><label for="mozda_accent_color"><?php esc_html_e( 'Accent color', 'mozda' ); ?></label></th>
		<td>
			<input type="text" name="mozda_accent_color" id="mozda_accent_color" class="mozda-color-field" value="<?php echo esc_attr( $accent ); ?>">
			<p class="description"><?php esc_html_e( 'Optional accent used for gradients and dividers.', 'mozda' ); ?></p>
		</td>
	</tr>
	<?php
}

/**
 * Save term meta.
 *
 * @param int $term_id Term ID.
 */
function mozda_save_category_meta( $term_id ) {
	if ( ! isset( $_POST['mozda_term_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mozda_term_meta_nonce'] ) ), 'mozda_save_term_meta' ) ) {
		return;
	}

	$map = array(
		'mozda_intro_text'     => 'sanitize_textarea_field',
		'mozda_cover_image_id' => 'absint',
		'mozda_accent_color'   => 'sanitize_hex_color',
	);

	foreach ( $map as $key => $sanitize ) {
		if ( isset( $_POST[ $key ] ) ) {
			$value = call_user_func( $sanitize, wp_unslash( $_POST[ $key ] ) );
			if ( $key === 'mozda_accent_color' && empty( $value ) ) {
				delete_term_meta( $term_id, $key );
			} else {
				update_term_meta( $term_id, $key, $value );
			}
		}
	}
}

/**
 * Enqueue admin assets for term meta UI.
 *
 * @param string $hook Current admin page hook.
 */
function mozda_enqueue_term_meta_assets( $hook ) {
	$screen_taxonomy = '';

	if ( isset( $_GET['taxonomy'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$screen_taxonomy = sanitize_key( wp_unslash( $_GET['taxonomy'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}

	if ( 'category' !== $screen_taxonomy ) {
		return;
	}

	if ( ! in_array( $hook, array( 'edit-tags.php', 'term.php' ), true ) ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script(
		'mozda-term-meta',
		get_template_directory_uri() . '/admin/js/mozda-term-meta.js',
		array( 'jquery', 'wp-color-picker' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
	wp_localize_script(
		'mozda-term-meta',
		'mozdaTermMeta',
		array(
			'choose' => esc_html__( 'Choose image', 'mozda' ),
			'change' => esc_html__( 'Change image', 'mozda' ),
		)
	);
}
