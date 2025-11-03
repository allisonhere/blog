<?php


/**
 * Archive Settings
 *
 * @package WordPress
 * @subpackage Mozda
 */

function tfm_customize_register_archive( $wp_customize ) {

	$customizer_settings = tfm_general_settings();

	$wp_customize->add_section( 'tfm_archive_settings', array(
		'title'    => esc_html__( 'Archive/Category Settings', 'mozda' ),
		'priority' => 130,
		'panel' => 'tfm_theme_settings',
	) );

	// Sidebar
	$wp_customize->add_setting( 'tfm_archive_sidebar', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_sidebar', array(
		'label'       => esc_html__( 'Display Sidebar', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Post Layout
		$wp_customize->add_setting( 'tfm_archive_layout', array(
			'default'           => 'list',
			'sanitize_callback' => 'tfm_sanitize_select',
		) );

		$wp_customize->add_control( 'tfm_archive_layout', array(
			'label'       => esc_html__( 'Post Layout', 'mozda' ),
			'section'     => 'tfm_archive_settings',
			'type'        => 'select',
			'choices'     => array(
				'masonry' => esc_html__( 'Masonry', 'mozda' ),
				'grid' => esc_html__( 'Grid', 'mozda' ),
				'list' => esc_html__( 'List', 'mozda' ),
			),
		) );

		$wp_customize->add_setting( 'tfm_archive_loop_style', array(
			'default'           => 'default',
			'sanitize_callback' => 'tfm_sanitize_select',
		) );

		$wp_customize->add_control( 'tfm_archive_loop_style', array(
			'label'       => esc_html__( 'Post Style', 'mozda' ),
			'section'     => 'tfm_archive_settings',
			'type'        => 'select',
			'choices'     => array(
				'default' => esc_html__( 'Default', 'mozda' ),
				'default-alt' => esc_html__( 'Default Alt.', 'mozda' ),
				'cover' => esc_html__( 'Cover', 'mozda' ),
			),
		) );


		// Number of columns
		$wp_customize->add_setting( 'tfm_archive_loop_cols', array(
			'default'           => '3',
			'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'tfm_archive_loop_cols', array(
			'label'       => esc_html__( 'Number of Columns', 'mozda' ),
			'section'     => 'tfm_archive_settings',
			'type'        => 'number',
			'input_attrs' => array(
		        'min'   => 1,
		        'max'   => apply_filters( 'tfm_max_post_cols', 4 ),
		    ),
		) );

	//========POST META ---------------//

	// Excerpt (Auto Generated)
	$wp_customize->add_setting( 'tfm_archive_post_excerpt', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_post_excerpt', array(
		'label'       => esc_html__( 'Excerpt', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	$wp_customize->add_setting( 'tfm_archive_read_more', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_read_more', array(
		'label'       => esc_html__( 'Read More', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show entry title
	$wp_customize->add_setting( 'tfm_archive_entry_title', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_title', array(
		'label'       => esc_html__( 'Entry Title', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show post thumbnail
	$wp_customize->add_setting( 'tfm_archive_post_thumbnail', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_post_thumbnail', array(
		'label'       => esc_html__( 'Thumbnail', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Homepage Standard Loop Image aspect ratio
	$wp_customize->add_setting( 'tfm_archive_thumbnail_aspect_ratio', array(
		'default'           => 'landscape',
		'sanitize_callback' => 'tfm_sanitize_select',
	) );

	$wp_customize->add_control( 'tfm_archive_thumbnail_aspect_ratio', array(
		'label'       => esc_html__( 'Thumbnail Aspect Ratio', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'select',
		'choices'     => array(
			'wide' => esc_html__( 'Wide', 'mozda' ),
			'landscape' => esc_html__( 'Landscape', 'mozda' ),
			'portrait' => esc_html__( 'Portrait', 'mozda' ),
			'square' => esc_html__( 'Square', 'mozda' ),
			'uncropped' => esc_html__( 'Uncropped', 'mozda' ),
		),
	) );

	// Show video/audio embeds
	$wp_customize->add_setting( 'tfm_archive_post_media', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_post_media', array(
		'label'       => esc_html__( 'Video &amp; Audio', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show by meta
	$wp_customize->add_setting( 'tfm_archive_entry_meta_by', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_meta_by', array(
		'label'       => esc_html__( '"by"', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show in meta
	$wp_customize->add_setting( 'tfm_archive_entry_meta_in', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_meta_in', array(
		'label'       => esc_html__( '"in"', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show author meta
	$wp_customize->add_setting( 'tfm_archive_entry_meta_author', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_meta_author', array(
		'label'       => esc_html__( 'Author', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show author meta avatar
	$wp_customize->add_setting( 'tfm_archive_entry_meta_author_avatar', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_meta_author_avatar', array(
		'label'       => esc_html__( 'Avatar', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show author nickname
	$wp_customize->add_setting( 'tfm_archive_entry_meta_author_nickname', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_meta_author_nickname', array(
		'label'       => esc_html__( 'Nickname', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show category meta
	$wp_customize->add_setting( 'tfm_archive_entry_meta_category', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_meta_category', array(
		'label'       => esc_html__( 'Category', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show read time
	if ( function_exists( 'tfm_read_time') ) {
		$wp_customize->add_setting( 'tfm_archive_entry_meta_read_time', array(
			'default'           => true,
			'sanitize_callback' => 'tfm_sanitize_checkbox',
		) );

		// Control Options
		$wp_customize->add_control( 'tfm_archive_entry_meta_read_time', array(
			'label'       => esc_html__( 'Read Time', 'mozda' ),
			'section'     => 'tfm_archive_settings',
			'type'        => 'checkbox',
		) );
	}

	// Show date meta
	$wp_customize->add_setting( 'tfm_archive_entry_meta_comment_count', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_meta_comment_count', array(
		'label'       => esc_html__( 'Comment Count', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show date meta
	$wp_customize->add_setting( 'tfm_archive_entry_meta_date', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_entry_meta_date', array(
		'label'       => esc_html__( 'Date', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	/**
	Separator
	**/
	$wp_customize->add_setting('tfm_archive_header_settings_separator', array(
		'default'           => '',
		'sanitize_callback' => 'esc_html',
	));
	$wp_customize->add_control(new Tfm_Separator_Custom_Control($wp_customize, 'tfm_archive_header_settings_separator', array(
		'settings'		=> 'tfm_archive_header_settings_separator',
		'section'  		=> 'tfm_archive_settings',
	)));

	// Show post count
	$wp_customize->add_setting( 'tfm_archive_title', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_title', array(
		'label'       => esc_html__( 'Show Archive Title', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show post count
	$wp_customize->add_setting( 'tfm_archive_post_count', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_post_count', array(
		'label'       => esc_html__( 'Post Count', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show Description
	$wp_customize->add_setting( 'tfm_archive_description', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_description', array(
		'label'       => esc_html__( 'Description', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show Description
	$wp_customize->add_setting( 'tfm_archive_subcats', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_subcats', array(
		'label'       => esc_html__( 'Sub Categories', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show author Avatar
	$wp_customize->add_setting( 'tfm_archive_author_avatar', array(
		'default'           => true,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_author_avatar', array(
		'label'       => esc_html__( 'Author Avatar', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

	// Show Author Bio
	$wp_customize->add_setting( 'tfm_archive_author_bio', array(
		'default'           => false,
		'sanitize_callback' => 'tfm_sanitize_checkbox',
	) );

	// Control Options
	$wp_customize->add_control( 'tfm_archive_author_bio', array(
		'label'       => esc_html__( 'Author Bio', 'mozda' ),
		'section'     => 'tfm_archive_settings',
		'type'        => 'checkbox',
	) );

}

add_action( 'customize_register', 'tfm_customize_register_archive' );