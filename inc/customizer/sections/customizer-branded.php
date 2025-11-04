<?php
/**
 * Customizer controls for branded sections.
 *
 * @package WordPress
 * @subpackage Mozda
 */

function mozda_customize_register_branded_sections( $wp_customize ) {
	$defaults = tfm_general_settings();

	$wp_customize->add_section(
		'mozda_branded_sections',
		array(
			'title'       => esc_html__( 'Branded Sections', 'mozda' ),
			'description' => esc_html__( 'Control the reusable hero, newsletter banner, and post footer call-to-actions.', 'mozda' ),
			'panel'       => 'tfm_theme_settings',
			'priority'    => 45,
		)
	);

	// Hero CTA.
	$wp_customize->add_setting(
		'tfm_branded_hero_enable',
		array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_hero_enable',
		array(
			'label'   => esc_html__( 'Show hero CTA on archive views', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_hero_heading',
		array(
			'default'           => isset( $defaults['branded_hero_heading'] ) ? $defaults['branded_hero_heading'] : esc_html__( 'Welcome to the story', 'mozda' ),
			'sanitize_callback' => 'tfm_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_hero_heading',
		array(
			'label'       => esc_html__( 'Hero heading', 'mozda' ),
			'section'     => 'mozda_branded_sections',
			'type'        => 'text',
			'description' => esc_html__( 'Used as the primary title on the blog homepage and fallback for archives without custom meta.', 'mozda' ),
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_hero_subheading',
		array(
			'default'           => isset( $defaults['branded_hero_subheading'] ) ? $defaults['branded_hero_subheading'] : '',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_hero_subheading',
		array(
			'label'       => esc_html__( 'Hero subheading', 'mozda' ),
			'section'     => 'mozda_branded_sections',
			'type'        => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_hero_button_label',
		array(
			'default'           => isset( $defaults['branded_hero_button_label'] ) ? $defaults['branded_hero_button_label'] : esc_html__( 'Start reading', 'mozda' ),
			'sanitize_callback' => 'tfm_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_hero_button_label',
		array(
			'label'   => esc_html__( 'Hero button label', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_hero_button_url',
		array(
			'default'           => isset( $defaults['branded_hero_button_url'] ) ? $defaults['branded_hero_button_url'] : '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_hero_button_url',
		array(
			'label'   => esc_html__( 'Hero button link', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_hero_cover_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'tfm_sanitize_image',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'tfm_branded_hero_cover_image',
			array(
				'label'       => esc_html__( 'Default hero image', 'mozda' ),
				'section'     => 'mozda_branded_sections',
				'description' => esc_html__( 'Fallback image used when a category does not specify its own cover.', 'mozda' ),
			)
		)
	);

	// Newsletter banner.
	$wp_customize->add_setting(
		'tfm_branded_newsletter_enable',
		array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_newsletter_enable',
		array(
			'label'   => esc_html__( 'Show newsletter banner after loops', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_newsletter_heading',
		array(
			'default'           => isset( $defaults['branded_newsletter_heading'] ) ? $defaults['branded_newsletter_heading'] : esc_html__( 'Stay in the loop', 'mozda' ),
			'sanitize_callback' => 'tfm_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_newsletter_heading',
		array(
			'label'   => esc_html__( 'Newsletter heading', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_newsletter_text',
		array(
			'default'           => isset( $defaults['branded_newsletter_text'] ) ? $defaults['branded_newsletter_text'] : '',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_newsletter_text',
		array(
			'label'   => esc_html__( 'Newsletter copy', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_newsletter_shortcode',
		array(
			'default'           => isset( $defaults['branded_newsletter_shortcode'] ) ? $defaults['branded_newsletter_shortcode'] : '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_newsletter_shortcode',
		array(
			'label'       => esc_html__( 'Newsletter form shortcode', 'mozda' ),
			'description' => esc_html__( 'Paste the shortcode supplied by your email provider (e.g. Mailchimp).', 'mozda' ),
			'section'     => 'mozda_branded_sections',
			'type'        => 'textarea',
		)
	);

	// Post footer CTA.
	$wp_customize->add_setting(
		'tfm_branded_post_footer_enable',
		array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_post_footer_enable',
		array(
			'label'   => esc_html__( 'Show post footer card on single posts', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_post_footer_heading',
		array(
			'default'           => isset( $defaults['branded_post_footer_heading'] ) ? $defaults['branded_post_footer_heading'] : esc_html__( 'Keep exploring', 'mozda' ),
			'sanitize_callback' => 'tfm_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_post_footer_heading',
		array(
			'label'   => esc_html__( 'Post footer heading', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_post_footer_text',
		array(
			'default'           => isset( $defaults['branded_post_footer_text'] ) ? $defaults['branded_post_footer_text'] : '',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_post_footer_text',
		array(
			'label'   => esc_html__( 'Post footer subheading', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_post_footer_button_label',
		array(
			'default'           => isset( $defaults['branded_post_footer_button_label'] ) ? $defaults['branded_post_footer_button_label'] : esc_html__( 'Browse the archive', 'mozda' ),
			'sanitize_callback' => 'tfm_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_post_footer_button_label',
		array(
			'label'   => esc_html__( 'Post footer button label', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_post_footer_button_url',
		array(
			'default'           => isset( $defaults['branded_post_footer_button_url'] ) ? $defaults['branded_post_footer_button_url'] : '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'tfm_branded_post_footer_button_url',
		array(
			'label'   => esc_html__( 'Post footer button link', 'mozda' ),
			'section' => 'mozda_branded_sections',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'tfm_branded_post_footer_accent',
		array(
			'default'           => isset( $defaults['branded_accent_fallback'] ) ? $defaults['branded_accent_fallback'] : '#da4453',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'tfm_branded_post_footer_accent',
			array(
				'label'   => esc_html__( 'Post footer accent', 'mozda' ),
				'section' => 'mozda_branded_sections',
			)
		)
	);
}
add_action( 'customize_register', 'mozda_customize_register_branded_sections' );
