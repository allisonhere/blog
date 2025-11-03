	<?php

	if ( is_single()) {
		return;
	}

	// ========================================================
	// Archive read more button
	// ========================================================

	if ( tfm_toggle_entry_meta( 'read_more' ) ): ?>

	<div class="entry-read-more">

		<div class="read-more-button"><a href="<?php echo esc_url( get_permalink() ); ?>" class="button read-more"><?php echo esc_html__( 'Continue Reading', 'mozda'); ?></a></div>

		<?php tfm_after_continue_reading_button(); ?>

	</div>
	
	<?php

	endif;