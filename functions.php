<?php

/**
 * Personal Blog functions and definitions
 *
 *
 * @package WordPress
 * @subpackage Personal_Blog
 * @since 1.0
 * @version 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tfm_theme_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'personal-blog', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'search',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats',
		array(  
		'gallery',
		'image',
		'video',
		'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support('custom-logo');

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add theme support for custom background
	add_theme_support( 'custom-background',
		array(
			'default-color' => 'ffffff',
		)
	);

	// Block styles
	add_theme_support( 'wp-block-styles' );

	// Register Menus
	register_nav_menus( array(
		'primary'    => esc_html__( 'Primary Menu', 'mozda' ),
		'split-menu-left'    => esc_html__( 'Split Menu Left Items', 'mozda' ),
		'split-menu-right'    => esc_html__( 'Split Menu Right Items', 'mozda' ),
		'slide-menu-primary'    => esc_html__( 'Toggle Sidebar Primary Menu', 'mozda' ),
		'header-secondary'    => esc_html__( 'Header Secondary Menu', 'mozda' ),
		'footer'     => esc_html__( 'Footer Menu', 'mozda'),
	) );

	// ========================================================
	// Additional image sizes
	// ========================================================
	/**
	 * Not required but helps reduce page load by adding
	 * additional smaller images for specific layouts
	 */

	$site_settings = tfm_general_settings();
	$site_width = get_theme_mod( 'tfm_site_width', $site_settings['site_width'] );

	// Mobile image size
	add_image_size( 'tfm-mobile-image', apply_filters( 'tfm_mobile_image_width', 432 ), 0, false );

	add_image_size( 'tfm-single-image', apply_filters( 'tfm_single_image_width', $site_width ), 0, false );

}

add_action( 'after_setup_theme', 'tfm_theme_setup' );

// ========================================================
// Set content width
// ========================================================

if ( ! isset( $content_width ) ) {
	$content_width = 1300;
}

// ========================================================
// Register Widget areas
// ========================================================

function tfm_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Static Sidebar', 'mozda' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your static sidebar', 'mozda' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Slide Out Sidebar', 'mozda' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your slide out sidebar', 'mozda' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
}
add_action( 'widgets_init', 'tfm_widgets_init' );

// ========================================================
// Enqueue Google Fonts
// ========================================================

if ( ! function_exists( 'tfm_fonts_url' ) ) {

	function tfm_fonts_url( $font ) {

		$fonts_url = '';
		 
		 /*
	    Translators: If there are characters in your language that are not supported
	    by chosen font(s), translate this to 'off'. Do not translate into your own language.
	     */
	    if ( 'off' !== _x( 'on', 'Google font: on or off', 'mozda' ) ) {
	    	if ($font === 'jakarta') {
		        $fonts_url = add_query_arg( 'family', 'Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap', "https://fonts.googleapis.com/css2" );
		    }
	    }
		 
		return esc_url_raw( $fonts_url );

	}

}

// ========================================================
// Enqueue scripts and styles
// ========================================================

if ( ! function_exists( 'tfm_scripts' ) ) {

	function tfm_scripts() {

		// Get Theme Version.
		$theme_version = wp_get_theme()->get( 'Version' );
		
		// CSS
		wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0.0', 'all');
		wp_enqueue_style('fontello', get_template_directory_uri() . '/css/fontello/css/fontello.css', array(), null );
		wp_enqueue_style( 'tfm-google-font-jakarta', tfm_fonts_url('jakarta'), array(), '1.0.0' );
		wp_enqueue_style('tfm-core-style', get_template_directory_uri() . '/style.css', array(), $theme_version, 'all');
		wp_enqueue_style('tfm-gutenberg-style', get_template_directory_uri() . '/css/gutenberg.css', array(), '1.0.0', 'all');
		wp_enqueue_style('tfm-graphic-enhancements', get_template_directory_uri() . '/css/graphic-enhancements.css', array('tfm-core-style'), '1.0.0', 'print');
		wp_enqueue_style('tfm-cool-graphics', get_template_directory_uri() . '/css/cool-graphics.css', array('tfm-graphic-enhancements'), '1.0.0', 'print');
		wp_style_add_data( 'tfm-core-style', 'rtl', 'replace' );
		wp_style_add_data( 'tfm-gutenberg-style', 'rtl', 'replace' );
		if ( is_rtl() ) {
			wp_enqueue_style('tfm-rtl-extra', get_template_directory_uri() . '/css/rtl-extra.css', array(), '1.0.0', 'all' );
		}

		// Load Masonry
		if ( 'masonry' === tfm_get_post_layout() )  {
			wp_enqueue_script( 'masonry');
			wp_enqueue_script( 'tfm-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array(), null, true);
		}

		// Main JS
		wp_enqueue_script( 'tfm-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), $theme_version, true);
		wp_script_add_data( 'tfm-main', 'defer', true );
		wp_add_inline_script(
			'tfm-main',
			'window.TFM_THEME = window.TFM_THEME || {}; window.TFM_THEME.baseUrl = ' . wp_json_encode( trailingslashit( get_template_directory_uri() ) ) . ';',
			'before'
		);

		wp_enqueue_script( 'mozda-live-search', get_template_directory_uri() . '/js/search-live.js', array(), $theme_version, true );
		wp_script_add_data( 'mozda-live-search', 'defer', true );
		wp_localize_script(
			'mozda-live-search',
			'mozdaLiveSearch',
			array(
				'ajaxUrl'   => admin_url( 'admin-ajax.php' ),
				'nonce'     => wp_create_nonce( 'mozda_live_search' ),
				'noResults' => esc_html__( 'No matches yet—keep typing!', 'mozda' ),
				'searching' => esc_html__( 'Searching…', 'mozda' ),
			)
		);

		// Comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
}
add_action( 'wp_enqueue_scripts', 'tfm_scripts' );

// ========================================================
// Enqueue Gutenberg Editor scripts and styles
// ========================================================

function tfm_gutenberg_styles() {

	 wp_enqueue_style('fontello', get_template_directory_uri() . '/css/fontello/css/fontello.css', array(), null );
	 wp_enqueue_style( 'tfm-gutenberg-editor', get_template_directory_uri() . '/css/gutenberg-editor-style.css', false, '1.0.0', 'all' );
	 wp_enqueue_style( 'tfm-google-font-jakarta', tfm_fonts_url('jakarta'), array(), '1.0.0' );

}
add_action( 'enqueue_block_editor_assets', 'tfm_gutenberg_styles' );

// ========================================================
// Custom classes added to body class array
// ========================================================

if ( ! function_exists( 'tfm_body_classes' ) ) {

	function tfm_body_classes( $classes ) {

		if ( ( is_single( ) && get_theme_mod( 'tfm_single_sidebar', false ) || is_home() && get_theme_mod( 'tfm_homepage_sidebar', true ) || ( is_archive() || is_search() ) && get_theme_mod( 'tfm_archive_sidebar', true ) || is_page() && get_theme_mod( 'tfm_page_sidebar', false ) ) && is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'has-sidebar';
		}
		if ( is_single( ) && is_active_sidebar( 'sidebar-1' ) && get_theme_mod( 'tfm_single_sidebar', false )) {
			$classes[] = 'sidebar-' . get_theme_mod( 'tfm_single_sidebar_position', 'side' );
		}
		if ( is_page( ) && is_active_sidebar( 'sidebar-1' ) && get_theme_mod( 'tfm_page_sidebar', false )) {
			$classes[] = 'sidebar-' . get_theme_mod( 'tfm_page_sidebar_position', 'side' );
		}
		if ( get_theme_mod( 'tfm_sticky_nav', true ) ) {
			$classes[] = 'has-sticky-nav';
		}
		if ( get_theme_mod( 'tfm_sticky_nav_mobile', true ) ) {
			$classes[] = 'has-sticky-nav-mobile';
		}
		if ( get_theme_mod( 'tfm_header_full_width', false ) ) {
			$classes[] = 'has-full-width-header';
		}
		$classes[] = 'header-' . get_theme_mod( 'tfm_header_layout', 'logo-left-menu-right' );

		/**
		 *  Overlay header (theme specific)
		 */
		$overlay_header = ( is_single() || ( is_page() && ! is_front_page() ) ) ? get_theme_mod( 'tfm_header_overlay_single', true ) : get_theme_mod( 'tfm_header_overlay_homepage', true );
		$classes[] = $overlay_header ? 'has-overlay-header' : '';

		$disabled_post_thumbnail = ( is_single() && ( ! get_theme_mod( 'tfm_single_thumbnail', true ) || ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_disable_featured_media', true ) ) ) ) || ( is_page() && ( ! get_theme_mod( 'tfm_page_thumbnail', true ) || ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_disable_featured_media_page', true ) ) ) ) ? true : false;

		$has_featured_media = ( has_post_format('video') && tfm_featured_video( true ) ) || ( has_post_format( 'audio' ) && tfm_featured_audio( true ) ) ? true : false;

		if ( is_single() && ( ( has_post_thumbnail() && ! $disabled_post_thumbnail ) || $has_featured_media ) && ( get_theme_mod( 'tfm_single_full_width', true ) || ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_single_full_width', true ) ) ) ) {
			$classes[] = 'has-full-width-media';
		}
		if ( is_page() && ( ( has_post_thumbnail() && ! $disabled_post_thumbnail ) ) && ( get_theme_mod( 'tfm_page_full_width', true ) || ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_page_full_width', true ) ) ) ) {
			$classes[] = 'has-full-width-media';
		}
		$single_post_style = function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_single_post_style', true ) && get_post_meta( get_the_ID(), 'tfm_single_post_style', true ) !== 'global' ? get_post_meta( get_the_ID(), 'tfm_single_post_style', true ) : get_theme_mod( 'tfm_single_post_style', 'default' );
		if ( is_page()) {
			$single_post_style = function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_page_style', true ) && get_post_meta( get_the_ID(), 'tfm_page_style', true ) !== 'global' ? get_post_meta( get_the_ID(), 'tfm_page_style', true ) : get_theme_mod( 'tfm_page_style', 'default' );
		}

		$classes[] = is_single() || is_page() ? 'post-style-' . $single_post_style : '';
		/**
		 *  end
		 */
		if ( get_query_var( 'cpage' ) ) {
			$classes[] = 'comment-page';
		}
		if ( is_single() && ( get_previous_post() || get_next_post() ) && get_theme_mod( 'tfm_single_post_navigation', true) ) {
			$classes[] = 'has-post-nav';
		}
		if ( is_single() && get_theme_mod( 'tfm_single_author_bio', true ) ) {
			$classes[] = 'has-author-bio';
		}
		if ( is_home() && '' !== get_theme_mod( 'tfm_homepage_loop_title', '' ) ) {
			$classes[] = 'has-loop-header';
		}
		if ( is_archive() && get_theme_mod( 'tfm_archive_title_position', 'header' ) === 'loop' && get_theme_mod( 'tfm_archive_title', true ) ) {
			$classes[] = 'header-in-loop';
		}
		if ( get_theme_mod( 'tfm_goto_top', true )) {
			$classes[] = 'has-backtotop';
		}

		// color mode

		$classes[] = 'tfm-' . get_theme_mod( 'tfm_theme_color_scheme', 'system' ) . '-mode';

		return $classes;
	}

}
add_filter( 'body_class', 'tfm_body_classes', 10 );

// ========================================================
// Display the custom logo or title
// ========================================================

if ( ! function_exists( 'tfm_site_logo' ) ) {

	function tfm_site_logo( $args = array() ) {

		$defaults = array(
			'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
			'mobile_logo' => '%1$s',
			'footer_logo' => '%1$s',
			'dark_theme_logo' => '%1$s',
			'logo_class'  => 'site-logo',
			'title'       => '<a href="%1$s">%2$s</a>',
			'title_class' => 'site-title',
			'home_wrap'   => '<h1 class="%1$s">%2$s</h1>',
			'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
			'footer_wrap' => '<div class="footer-logo">%2$s</div>',
			'mobile'      => false,
			'sidebar'	  => false,
			'footer'      => false,
			'condition'   => ( ( is_front_page() || is_home() )),
		);

		$args = wp_parse_args( $args, $defaults );

		$site_title = get_bloginfo( 'name' );
		$mobile_logo = get_theme_mod( 'tfm_mobile_logo_upload', '' ) ? get_theme_mod( 'tfm_mobile_logo_upload', '' ) : wp_get_attachment_url(get_theme_mod( 'custom_logo' ));
		$sidebar_logo = get_theme_mod( 'tfm_sidebar_logo_upload', '' ) ? get_theme_mod( 'tfm_sidebar_logo_upload', '' ) : wp_get_attachment_url(get_theme_mod( 'custom_logo' ));
		$footer_logo = get_theme_mod( 'tfm_footer_logo_upload', '' ) ? get_theme_mod( 'tfm_footer_logo_upload', '' ) : ''; // display nothing of empty
		// dark theme logos
		$dark_theme_logo = get_theme_mod( 'tfm_logo_upload_dark', '' ) ? get_theme_mod( 'tfm_logo_upload_dark', '' ) : '';
		$sidebar_logo_dark = get_theme_mod( 'tfm_sidebar_logo_upload_dark', '' ) ? get_theme_mod( 'tfm_sidebar_logo_upload_dark', '' ) : '';
		$mobile_logo_dark = get_theme_mod( 'tfm_mobile_logo_upload_dark', '' ) ? get_theme_mod( 'tfm_mobile_logo_upload_dark', '' ) : '';
		$footer_logo_dark = get_theme_mod( 'tfm_footer_logo_upload_dark', '' ) ? get_theme_mod( 'tfm_footer_logo_upload_dark', '' ) : '';

		// logo url
	    $custom_logo_id = $args['mobile'] ? $mobile_logo : wp_get_attachment_url( get_theme_mod( 'custom_logo' ) );
	    if ( $args['sidebar'] ) {
	    	$custom_logo_id = $sidebar_logo;
	    }
	    if ( $args['footer'] ) {
	    	$custom_logo_id = $footer_logo;
	    }
	    $custom_logo_id_dark = $dark_theme_logo;
	    if ( $args['mobile']) {
	    	$custom_logo_id_dark  = $mobile_logo_dark;
	    }
	    if ( $args['sidebar']) {
	    	$custom_logo_id_dark = $sidebar_logo_dark ? $sidebar_logo_dark : $dark_theme_logo;
	    }
	    if ( $args['footer']) {
	    	$custom_logo_id_dark = $footer_logo_dark;
	    }
	    $logo_size = $args['mobile'] ? wp_get_attachment_image_src( $custom_logo_id, 'full' ) : wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
	    if ( empty($logo_size)) {
	    	$logo_size = array(1 => false);
	    }
		$logo_width = get_theme_mod( 'tfm_custom_logo_max_width', '210' ) ? get_theme_mod( 'tfm_custom_logo_max_width', '210' ) : $logo_size[1];
		if ( get_theme_mod( 'tfm_retina_logo', false ) ) {
			$logo_width  = floor( $logo_size[1] / 2 );
		}
		if ( $args['sidebar'] ) {
			$logo_width = get_theme_mod( 'tfm_sidebar_custom_logo_max_width', '150' );
		}
		if ( $args['footer'] ) {
			$logo_width = get_theme_mod( 'tfm_footer_custom_logo_max_width', '100' );
		}
		$hidden_dark = $custom_logo_id_dark ? ' hidden-dark-theme' : '';
		$logo = '<a href="' . esc_url( get_home_url() ) . '" rel="home">';
		$logo .= '<img src="' . esc_url( $custom_logo_id ) . '" alt="' . get_bloginfo( 'name' ) . '" class="custom-logo' . $hidden_dark . '" width="' . $logo_width . '" />';
		// Dark theme logos (hidden in light theme)
		if ( $custom_logo_id_dark ) {
			$logo .= '<img src="' . esc_url( $custom_logo_id_dark ) . '" alt="' . get_bloginfo( 'name' ) . '" class="custom-logo dark-theme-logo hidden-light-theme" width="' . $logo_width . '" />';
		}
		$logo .= '</a>';
		$contents   = '';
		$classname  = '';

		if ( $custom_logo_id ) {
			if ( $args['footer']) {
				$contents  = sprintf( $args['footer_logo'], $logo, esc_html( $site_title ) );
				$classname = $args['logo_class'];
			} elseif ( $args['mobile'] ) {
				$contents  = sprintf( $args['mobile_logo'], $logo, esc_html( $site_title ) );
				$classname = $args['logo_class'];
			} else {
				$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
				$classname = $args['logo_class'];
			}
			// if ( ! $args['mobile'] ) {
			// 	$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
			// 	$classname = $args['logo_class'];
			// } else {
			// 	$contents  = sprintf( $args['mobile_logo'], $logo, esc_html( $site_title ) );
			// 	$classname = $args['logo_class'];
			// }
		} else {
			$contents  = ! $args['footer'] ? sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) ) : '';
			$classname = $args['title_class'];
		}

		$wrap = $args['condition'] && ! $args['mobile'] && ! $args['sidebar'] && ! $args['footer']  ? 'home_wrap' : 'single_wrap';
		if ( $args['footer'] ) {
			$wrap = 'footer_wrap';
		}

		$html = sprintf( $args[ $wrap ], $classname, $contents );

		$html = apply_filters( 'tfm_site_logo', $html, $args, $classname, $contents );

		echo wp_kses_post( $html );

	}

}

// ========================================================
// Output toggle icons
// ========================================================

if ( ! function_exists( 'tfm_toggle_icon' ) ) {

	function tfm_toggle_icon( $icon, $mobile = false ) {

		$mobile_toggle = ( $mobile ? ' mobile-toggle' : '' );
		$has_toggle_background = '';
		$has_toggle_text = ( 'menu' === $icon && get_theme_mod( 'tfm_toggle_menu_text', '' ) || 'search' === $icon && get_theme_mod( 'tfm_toggle_search_text', '' ) ? 'has-toggle-text' : '' );
		$show_icon = ( ( true === $mobile && ( ( $icon === 'menu' && get_theme_mod( 'tfm_toggle_menu_mobile', true ) ) || ( $icon === 'search' && get_theme_mod( 'tfm_toggle_search_mobile', true ) ) || ( $icon === 'color-mode' && get_theme_mod( 'tfm_toggle_color_mode_mobile', true ) ) ) ) || 
			// Desktop Menu
			( false === $mobile && ( ( $icon === 'menu' && get_theme_mod( 'tfm_toggle_menu', true ) && ( is_active_sidebar( 'sidebar-2') || ( ! is_active_sidebar( 'sidebar-2') && ( has_nav_menu( 'slide-menu-primary' ) || has_nav_menu( 'primary' ) ) && get_theme_mod( 'tfm_sidebar_primary_nav', false ) ) ) ) || 
			// Desktop search
			( $icon === 'search' && get_theme_mod( 'tfm_toggle_search', true ) ) ||
			// Desktop color mode
			( $icon === 'color-mode' && get_theme_mod( 'tfm_toggle_color_mode', true ) ) ) ) ? '' : ' hidden' );


		$html = '';

		$attributes = array(
			'type'  => 'button',
			'class' => 'toggle toggle-' . $icon . $mobile_toggle . $show_icon,
		);

		if ( in_array( $icon, array( 'menu', 'search' ), true ) ) {
			$attributes['aria-expanded'] = 'false';
		}

		if ( 'menu' === $icon ) {
			$attributes['aria-controls'] = 'toggle-sidebar';
		}

		if ( 'search' === $icon ) {
			$attributes['aria-controls'] = 'toggle-search-sidebar';
		}

		if ( 'color-mode' === $icon ) {
			$attributes['aria-pressed'] = 'false';
		}

		$attr_string = '';
		foreach ( $attributes as $attr => $value ) {
			$attr_string .= sprintf( ' %1$s="%2$s"', esc_attr( $attr ), esc_attr( $value ) );
		}

		$html .= '<button' . $attr_string . '>';

		if ( $icon === 'menu' ) {

			$html .= '<span><i class="icon-menu"></i></span><span class="screen-reader-text">' . esc_html__( 'Menu', 'mozda' ) . '</span>';

		}

		if ( $icon === 'search' ) {
			
			$html .= '<span><i class="icon-search"></i></span><span class="screen-reader-text">' . esc_html__( 'Search', 'mozda' ) . '</span>';

		}

		if ( $icon === 'color-mode' ) {
			
			$html .= '<span class="tfm-color-mode tfm-light-mode"><i class="icon-sun-inv"></i></span>';
			$html .= '<span class="tfm-color-mode tfm-dark-mode"><i class="icon-moon-inv"></i></span>';

		}

		$html .= '</button>';

		echo wp_kses_post( $html );


	}

}


// ========================================================
// Output category tags in post meta
// ========================================================

if ( ! function_exists( 'tfm_get_category_slugs' ) ) {

	function tfm_get_category_slugs( $num = 999, $post_id = false ) {

		$customizer_settings = tfm_general_settings();

		$num = ( ! is_single() ? get_theme_mod( 'tfm_archive_cat_slug_num', 2 ) : $num );
		$category = array_slice( get_the_category( $post_id ), 0, $num );
		$count = 0;

		$html = '';

		foreach( $category as $the_category ) {

			// Additional color classes
			$slug_color[] = '' !== get_theme_mod( 'category_slug_color_' . $the_category->slug . '', '' ) || '' !== get_theme_mod( 'category_slug_color', $customizer_settings['category_slug_color'] ) ? 'has-slug-color' : '';
			$slug_color[] = '' !== get_theme_mod( 'category_slug_background_' . $the_category->slug . '', '' ) || '' !== get_theme_mod( 'category_slug_background', $customizer_settings['category_slug_background'] ) ? 'has-slug-background' : '';

			$slug_colors = array_filter($slug_color);
			
			$slug_css = count($slug_colors) !== 0 ? ' ' . implode(' ', $slug_color) : '';

			$count++;

			$html.= '<li class="cat-slug-' . esc_attr( $the_category->slug ) . ' cat-id-' . esc_attr( $the_category->cat_ID ) . $slug_css . '">';
			// "In" text string
			if ( $count === 1 && tfm_toggle_entry_meta( 'in' ) ) {
				$html .= '<span class="screen-reader-text">' . esc_html__( 'Posted in', 'mozda' ) . '</span><i dir="ltr">' . esc_html__( 'in', 'mozda' ) . '</i> ';
			}
			$html .= '<a href="' . get_category_link( $the_category->cat_ID ) . '" class="cat-link-' . esc_attr( $the_category->cat_ID ) . '">' . esc_html( $the_category->cat_name ) . '</a></li>';

		}

		return $html;

	}

}

// ========================================================
// Output entry meta
// ========================================================

function tfm_get_entry_meta( $meta_data = array(), $has_wrapper = true, $has_container = true, $html_style = 'li', $meta_wrapper_class = '', $meta_class = '', $cats_wrapper = false, $multi_line = true ) {

	// Make sure we don't have an empty array
	if ( ! $meta_data ) {
		$meta_data = apply_filters( 'tfm_entry_meta_data', array('author_avatar', 'author', 'author_nickname', 'date', 'updated_date', 'comment_count', 'read_time', 'post_views' ) );
	}

	// Create an array of meta items

	/**
	 * Filter empty 
	 * Remove avatar
	 * Set 'multi-meta-items' class
	 * */

	$meta_item['author_avatar'] = in_array('author_avatar', $meta_data ) && tfm_toggle_entry_meta( 'author_avatar' ) ? true : false;
	$meta_item['author'] = in_array('author', $meta_data ) && tfm_toggle_entry_meta( 'author' )  ? true : false;
	$meta_item['author_nickname'] = in_array('author_nickname', $meta_data ) && '' !== get_the_author_meta( 'nickname' ) && tfm_toggle_entry_meta( 'author_nickname' )  ? true : false;
	$meta_item['date'] = in_array('date', $meta_data ) && tfm_toggle_entry_meta( 'date' ) ? true : false;
	$meta_item['updated_date'] = in_array('updated_date', $meta_data ) && tfm_toggle_entry_meta( 'updated_date' ) ? true : false;
	$meta_item['comment_count'] = in_array('comment_count', $meta_data ) && tfm_toggle_entry_meta( 'comment_count' ) ? true : false;
	$meta_item['read_time'] = in_array('read_time', $meta_data ) && tfm_toggle_entry_meta( 'read_time' ) ? true : false;
	$meta_item['category'] = in_array('category', $meta_data ) && tfm_toggle_entry_meta( 'category' )  ? true : false;
	$meta_item['post_views'] = in_array('post_views', $meta_data) && function_exists( 'tfm_post_views') && '' !== tfm_post_views($post_id = '', $precision = 1, $abbrv = true, $views_style = $html_style, $return = true ) ? true : false;

	$meta_items = array_filter($meta_item);

	unset($meta_items['author_avatar']); // do not count avatar

	$meta_items_class = count($meta_items) > 1 ? ' multi-meta-items' : ''; // more than one meta item (not including avatar)

	// Additonal classes
	$meta_wrapper_class = '' === $meta_wrapper_class ? ' after-title' : ' ' . $meta_wrapper_class;
	$meta_class = '' !== $meta_class ? ' ' . $meta_class : '';
	$meta_class .= $meta_item['author_avatar'] ? ' has-avatar' : '';
	$container_style = $html_style === 'li' ? 'ul' : 'div';
	$multi_line_class = $multi_line && $meta_item['author'] && $meta_items_class ? ' multi-line' : '';
	$multi_line_class .= $multi_line_class && ( get_theme_mod('tfm_mobile_hide_entry_meta_author_avatar', false ) || get_theme_mod('tfm_mobile_hide_entry_meta_author', false ) ) ? ' single-line-mobile' : '';

	// Hidden mobile
	$hidden_avatar = ! is_single() && $meta_item['author_avatar'] && get_theme_mod('tfm_mobile_hide_entry_meta_author_avatar', false ) ? ' hidden-mobile' : '';
	$hidden_author = ! is_single() && $meta_item['author'] && get_theme_mod('tfm_mobile_hide_entry_meta_author', false ) ? ' hidden-mobile' : '';
	$hidden_author_nickname = ! is_single() && $meta_item['author_nickname'] && get_theme_mod('tfm_mobile_hide_entry_meta_author_nickname', false ) ? ' hidden-mobile' : '';
	$hidden_date = ! is_single() && $meta_item['date'] && get_theme_mod('tfm_mobile_hide_entry_meta_date', false ) ? ' hidden-mobile' : '';
	$hidden_comment_count = ! is_single() && $meta_item['comment_count'] && get_theme_mod('tfm_mobile_hide_entry_meta_comment_count', false ) ? ' hidden-mobile' : '';
	$hidden_read_time = ! is_single() && $meta_item['read_time'] && get_theme_mod('tfm_mobile_hide_entry_meta_read_time', false ) ? ' hidden-mobile' : '';
	$hidden_category = ! is_single() && $meta_item['category'] && get_theme_mod('tfm_mobile_hide_entry_meta_category', false ) ? ' hidden-mobile' : '';

	// Hide the entire wrapper if no meta items

	$hidden_entry_meta_wrapper = ! is_single() && ( $meta_item['category'] && $hidden_category ) || ( ! $meta_item['category']  && ( $hidden_avatar && $hidden_author && $hidden_date && $hidden_comment_count && $hidden_read_time )) ? ' hidden-mobile' : '';

	// Figure out the first meta item after hiding items for mobile and append to hidden-mobile class

	$author_nickname_first = ! is_single() && ( $meta_item['author'] && $hidden_author ) && ! $hidden_author_nickname ? ' first' : '';

	$date_first = ! is_single() && ( $meta_item['author'] && $hidden_author ) && ( $meta_item['author_nickname'] && $hidden_author_nickname ) && ! $hidden_date ? ' first' : '';

	$comment_count_first = ! is_single() && ( $meta_item['author'] && $hidden_author ) && ( $meta_item['author_nickname'] && $hidden_author_nickname ) && ( $meta_item['date'] && $hidden_date ) && ! $hidden_comment_count  ? ' first' : '';

	$read_time_first = ! is_single() && ( $meta_item['author'] && $hidden_author ) && ( $meta_item['author_nickname'] &&  $hidden_author_nickname ) && ( $meta_item['date'] && $hidden_date ) && ( ( $meta_item['comment_count'] && $hidden_comment_count ) || ! $meta_item['comment_count'] ) && ! $hidden_read_time ? ' first' : '';

	// We have an avatar and author name
	if ( $multi_line_class && ' single-line-mobile' !== $multi_line_class ) {

		$date_first = ! is_single() && ( ( $meta_item['author_nickname'] && $hidden_author_nickname ) || ( ! $meta_item['author_nickname'] ) ) && ! $hidden_date  ? ' first' : '';

		$comment_count_first = ! is_single() && ( ( $meta_item['author_nickname'] && $hidden_author_nickname ) || ( ! $meta_item['author_nickname'] ) ) && ( $meta_item['date'] && $hidden_date ) && ! $hidden_comment_count  ? ' first' : '';

		$read_time_first = ! is_single() && ( ( $meta_item['author_nickname'] && $hidden_author_nickname ) || ( ! $meta_item['author_nickname'] ) ) && ( $meta_item['date'] && $hidden_date ) && ( ( $meta_item['comment_count'] && $hidden_comment_count ) || ! $meta_item['comment_count'] ) && ! $hidden_read_time  ? ' first' : '';
	}

	$html = '';

	if ( ! empty($meta_items) || $meta_item['author_avatar'] || $meta_item['category'] ) :

		if ( $has_wrapper ) {

			$html .= '<div class="entry-meta' . $meta_wrapper_class . $meta_items_class . $multi_line_class . $hidden_entry_meta_wrapper . '">';

		}

		if ( $has_container ) {

			$html .= '<' . $container_style . ' class="post-meta' . $meta_class . $multi_line_class . '">';

		}

	// Avatar

	if ( $meta_item['author_avatar'] ) :

		$avatar_size = is_single() ? 60 : 40;

		$html .= '<' . $html_style . ' class="entry-meta-avatar' . $hidden_avatar . '">';

		$html .= '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">';

		$html .= get_avatar( get_the_author_meta('ID'), esc_attr( $avatar_size ) );

		$html .= '</a>';

		$html .= '</' . $html_style . '>';


	endif;

	// Author

	if ( $meta_item['author'] ) :

		$html .= '<' . $html_style . ' class="entry-meta-author' . $hidden_author . '">';

		$html .= '<span class="screen-reader-text">' . esc_html__( 'Posted by', 'mozda' ) . '</span>';
		if ( tfm_toggle_entry_meta( 'by' ) ):
			$html .= '<i dir="ltr">' . esc_html__( 'by', 'mozda' ) . '</i> ';
			endif;
		$html .= '<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) . '">' . get_the_author() . '</a>';

		if ( tfm_toggle_entry_meta( 'author_nickname' ) && '' !== get_the_author_meta( 'nickname' ) ) :

			$html .= '</' . $html_style . '>';

			$html .= '<' . $html_style . ' class="entry-meta-author-nickname' . $hidden_author_nickname . $author_nickname_first . '">';

			$html .= '<span class="nickname">' . get_the_author_meta( 'nickname' ) . '</span>';

		endif;

		$html .= '</' . $html_style . '>';

	endif;

	// Date

	if ( $meta_item['date']) :

		$tfm_date = function_exists('tfm_human_entry_date') ? tfm_human_entry_date() : get_the_time( get_option( 'date_format' ));

		$html .= '<' . $html_style . ' class="entry-meta-date' . $hidden_date . $date_first . '">';

		$title = get_the_title('','', false);

		if ( ! is_single( ) && strlen($title) == 0 ) {

		$html .= '<a href="' . get_the_permalink() . '">';

		}

		$html .= '<time datetime="' . get_the_date( 'Y-m-d' ) . '">' . $tfm_date . '</time>';

		if ( ! is_single( ) && strlen($title) == 0 ) {

		$html .= '</a>';

		}

	   $html .= '</' . $html_style . '>';

	endif;

	// Updated date

	if ( $meta_item['updated_date'] ) :

		$html .= '<' . $html_style . ' class="entry-meta-date-updated">';

		$html .= tfm_updated_date();

	    $html .= '</' . $html_style . '>';

	endif;

	// Comment count

	if ( $meta_item['comment_count']) :

		$html .= '<' . $html_style . ' class="entry-meta-comment-count' . $hidden_comment_count . $comment_count_first . '">';

		if ( is_single( ) ) : 

			$html .= '<a href="#comments">';

		endif;

		$comment_string = (int)get_comments_number() === 1 ? esc_html__( ' Comment', 'mozda' ) : esc_html__( ' Comments', 'mozda' );

		$html .= get_comments_number() . '<span>' . esc_attr( $comment_string ) . '</span>';

		if ( is_single( ) ) :

			$html .= '</a>';

		endif;

	$html .= '</' . $html_style . '>';

	endif;

	// TFM Read time (theme boost plugin)

	if ( function_exists('tfm_read_time') ) :

		if ( $meta_item['read_time'] && tfm_show_read_time() ) :

			$html .= tfm_read_time( $forced_request = true, $return = true, $style = $html_style, $classes = $hidden_read_time . $read_time_first );

		endif;

	endif;

	// TFM Post Views (theme boost plugin)

	if ( function_exists('tfm_post_views') ) :

		if ( $meta_item['post_views']) :

			$html .= tfm_post_views( $post_id = '', $precision = 1, $abbrv = true, $html_style = $html_style, $return = true );

		endif;

	endif;

	if ( $meta_item['category'] ) :

		$num = 999;
		$post_id = false;

			if ( array_key_exists('args', $meta_data ) ) {

				$num = array_key_exists('num', $meta_data['args']) ? $meta_data['args']['num'] : '';
				$post_id = array_key_exists('post_id', $meta_data['args']) ? $meta_data['args']['post_id'] : false;
			}

		$html .= $cats_wrapper ? '<li class="entry-meta-categories"><ul>' : '';

		$html .= tfm_get_category_slugs( $num, $post_id );

		$html .= $cats_wrapper ? '</li></ul>' : '';

	endif;

	if ( $has_container ) {

		$html .= '</' . $container_style . '>';

	}

	if ( $has_wrapper ) {

		$html .= '</div>';

	}

	endif; // endif after/before meta

	echo wp_kses_post( $html );

}

// ========================================================
// Additional custom post_class classes
// ========================================================

if ( ! function_exists( 'tfm_post_class' ) ) {

	function tfm_post_class( $classes ) {

		global $post;

		$customizer_settings = tfm_general_settings();

		$classes[] = 'article'; // Always set .article class

		// Post background class

		$default_post_background = array_key_exists('default_post_background', $customizer_settings ) ? $customizer_settings['default_post_background'] : '';
		$default_post_background_dark = array_key_exists('default_post_background_dark', $customizer_settings ) ? $customizer_settings['default_post_background_dark'] : '';

		$tfm_post_background = '' !== get_theme_mod( 'tfm_post_background', '' ) ? get_theme_mod( 'tfm_post_background', '' ) : $default_post_background;
		$tfm_post_background_dark = '' !== get_theme_mod( 'tfm_post_background_dark', '' ) ? get_theme_mod( 'tfm_post_background_dark', '' ) : $default_post_background_dark;
		

		if ( ! is_single() && '' !== $tfm_post_background ) {
			$classes[] = 'has-background';
		}

		//  Meta
		if ( tfm_toggle_entry_meta( 'excerpt' ) ) {
			$classes[] = 'has-excerpt';
		}
		if ( tfm_toggle_entry_meta( 'author_avatar' ) ) {
			$classes[] = 'has-avatar';
		}
		if ( tfm_toggle_entry_meta( 'author' ) ) {
			$classes[] = 'has-author';
		}
		if ( tfm_toggle_entry_meta( 'date' ) || tfm_toggle_entry_meta( 'updated_date' ) ) {
			$classes[] = 'has-date';
		}
		if ( tfm_toggle_entry_meta( 'comment_count' ) ) {
			$classes[] = 'has-comment-count';
		}
		if ( tfm_toggle_entry_meta( 'category' ) ) {
			$classes[] = 'has-category-meta';
		}
		// Read more
		if ( tfm_toggle_entry_meta( 'read_more' ) ) {
				$classes[] = 'has-read-more';
		}
		if ( tfm_toggle_entry_meta( 'entry_title' ) ) {
				$classes[] = 'has-title';
		}
		// post format icons
		if ( ! is_single() && get_theme_mod( 'tfm_post_format_icons', true ) && ( has_post_format( 'video') || has_post_format( 'audio') || has_post_format( 'gallery') || has_post_format( 'image') ) ) {
			$classes[] = 'has-format-icons';
		}


		// Disabled Post Thumbnail
		$disabled_thumbnail = false;

		if ( ( is_archive() || is_search() ) && ! get_theme_mod( 'tfm_archive_post_thumbnail', true ) ||
		is_home() && ! get_theme_mod( 'tfm_homepage_post_thumbnail', true ) ||
		is_single() && ( ! get_theme_mod( 'tfm_single_thumbnail', true ) || ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_disable_featured_media', true ) ) ) || is_page() && ( ! get_theme_mod( 'tfm_page_thumbnail', true ) || ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_disable_featured_media_page', true ) ) ) )  {

				$classes[] = 'disabled-post-thumbnail';
				$disabled_thumbnail = true;

		}

		$show_media = is_home() ? get_theme_mod( 'tfm_homepage_post_media', true ) : get_theme_mod( 'tfm_archive_post_media', true );

		if ( ( ( has_post_format( 'video') && tfm_featured_video( true ) ) || ( has_post_format( 'audio') && tfm_featured_audio( true ) ) ) || ( has_post_thumbnail( ) && ! $disabled_thumbnail ) ) {
			$classes[] = 'has-post-media';
		}

		// Media files
		if ( $show_media && ( has_post_format( 'video') && tfm_featured_video( true ) ) || ( has_post_format( 'audio') && tfm_featured_audio( true ) ) ) {
			$classes[] = 'has-post-format-media';
		}

		// Thumbnail size
		$thumbnail_size = 'thumbnail-';

			if ( is_single() ) {
				if ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_single_post_thumbnail_size', true ) && get_post_meta( get_the_ID(), 'tfm_single_post_thumbnail_size', true ) !== 'global' ) {
				$thumbnail_size = $thumbnail_size . get_post_meta( get_the_ID(), 'tfm_single_post_thumbnail_size', true );
				} else {
					$thumbnail_size = $thumbnail_size . get_theme_mod( 'tfm_single_thumbnail_aspect_ratio', 'hero' );
				}
			}
			if ( is_page() ) {
				if ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_page_thumbnail_size', true ) && get_post_meta( get_the_ID(), 'tfm_page_thumbnail_size', true ) !== 'global' ) {
				$thumbnail_size = $thumbnail_size . get_post_meta( get_the_ID(), 'tfm_page_thumbnail_size', true );
				} else {
					$thumbnail_size = $thumbnail_size . get_theme_mod( 'tfm_page_thumbnail_aspect_ratio', 'hero' );
				}
			}
			if ( is_home() ) {
				$thumbnail_size = $thumbnail_size . get_theme_mod( 'tfm_homepage_thumbnail_aspect_ratio', 'uncropped' );
			}
			if ( is_archive() || is_search() ) {
				$thumbnail_size =  $thumbnail_size . get_theme_mod( 'tfm_archive_thumbnail_aspect_ratio', 'landscape' );
			}

		$classes[] = $thumbnail_size;

		// Post style
		if ( is_home() || is_archive() || is_search() ) {

			$archive_style = is_home() ? get_theme_mod( 'tfm_homepage_loop_style', 'default' ) : get_theme_mod( 'tfm_archive_loop_style', 'default' );

			if ( 'list' === tfm_get_post_layout() || 'list-grid' === tfm_get_post_layout() ) {
				$classes[] = 'default';
			} else {

				if ( $show_media && ( ( has_post_format( 'video' ) && tfm_featured_video( true ) ) || ( has_post_format( 'audio') && tfm_featured_audio( true ) ) ) ) {
					$classes[] = 'cover' !== $archive_style ? $archive_style : 'default';
				} elseif ( has_post_format( 'image' ) && has_post_thumbnail() && ! $disabled_thumbnail) {
					$classes[] = 'list' !== tfm_get_post_layout() && 'list-grid' !== tfm_get_post_layout()  ? 'cover' : '';
				} else {
					$classes[] = $archive_style;
				}

			}
		} 
		
		// Override post style for single and page (check for custom post meta)
		if ( is_single() ) {
			$single_post_style = function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_single_post_style', true ) && get_post_meta( get_the_ID(), 'tfm_single_post_style', true ) !== 'global' ? get_post_meta( get_the_ID(), 'tfm_single_post_style', true ) : get_theme_mod( 'tfm_single_post_style', 'default' );
			if ( ( ! has_post_thumbnail() || $disabled_thumbnail || has_post_format('video') || has_post_format( 'audio' ) ) && $single_post_style === 'cover' ) {
				$single_post_style = 'default';
			}
			$classes[] = $single_post_style;
		}
		if ( is_page() ) {
			$single_page_style = function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_page_style', true ) && get_post_meta( get_the_ID(), 'tfm_page_style', true ) !== 'global' ? get_post_meta( get_the_ID(), 'tfm_page_style', true ) : get_theme_mod( 'tfm_page_style', 'default' );
			if ( ( ! has_post_thumbnail() || $disabled_thumbnail ) && $single_page_style === 'cover' ) {
				$single_page_style = 'default';
			}
			$classes[] = $single_page_style;
		}

			return $classes;

	}

	add_filter( 'post_class', 'tfm_post_class' );

}

// ========================================================
// Get post cols count
// ========================================================

if ( ! function_exists('tfm_get_post_cols') ) {

	function tfm_get_post_cols( $value = 'class' ) {

		$post_layout = tfm_get_post_layout();
		$post_cols = ( is_home() ? get_theme_mod( 'tfm_homepage_loop_cols', 3 ) : get_theme_mod( 'tfm_archive_loop_cols', 3 ) );
		if ( is_single() || is_page() ) {
			$post_cols = false;
		}
		$enabled_sidebar = ( is_home() ? get_theme_mod( 'tfm_homepage_sidebar', true ) : get_theme_mod( 'tfm_archive_sidebar', true ) );
		$has_sidebar = is_active_sidebar( 'sidebar-1') && $enabled_sidebar ? true : false;

		$max_post_cols = $post_layout === 'list' ? apply_filters( 'tfm_max_post_cols_list', 1 ) : apply_filters( 'tfm_max_post_cols_grid', 4 );
		$max_post_cols_width_sidebar = $post_layout === 'list' ? apply_filters( 'tfm_max_post_cols_list_width_sidebar', 1 ) : apply_filters( 'tfm_max_post_cols_with_sidebar', 3 );

		// Check for max columns filters (per theme basis)
		if ( $post_cols > $max_post_cols ) {
			$post_cols = $max_post_cols;
		}
		
		// Check for sidebar and adjust cols
		if ( $has_sidebar && $post_cols > $max_post_cols_width_sidebar ) {
			$post_cols = $max_post_cols_width_sidebar;

		}

		if ( '' === $value || 'class' === $value ) {
			$post_cols = ' cols-' . $post_cols;
		}

		if ( 'count' === $value ) {
			$post_cols = $post_cols;
		}

		return $post_cols;
	}

}

// ========================================================
// Get post layout
// ========================================================

if ( ! function_exists('tfm_get_post_layout') ) {

	function tfm_get_post_layout( $mobile = false ) {

		if ( is_single() || is_page()) {
			return;
		}

		$post_layout = is_home() ? get_theme_mod( 'tfm_homepage_layout', 'masonry' ) : get_theme_mod( 'tfm_archive_layout', 'list' );
		$post_style = is_home() ? get_theme_mod( 'tfm_homepage_loop_style', 'default' ) : get_theme_mod( 'tfm_archive_loop_style', 'default' );
		if ( $mobile ) {
			$post_layout .= $post_layout !== 'masonry' && $post_style !== 'cover' ? ' mobile-' . get_theme_mod( 'tfm_mobile_layout', 'grid' ) : '';
		}

		return $post_layout;
	}

}


// ========================================================
// Output the exerpt
// ========================================================

if ( ! function_exists( 'tfm_get_excerpt' ) ) {

	function tfm_get_excerpt( $post_id = '', $length = '', $hide_excerpt = false ) {

		$length = $length ? $length : get_theme_mod( 'tfm_excerpt_length', 30 );

		$html = '';

		$hidden_mobile = ( ! is_single() && get_theme_mod( 'tfm_mobile_hide_excerpt', false ) ) || $hide_excerpt ? ' hidden-mobile' : '';

		if ( tfm_toggle_entry_meta( 'excerpt' ) || $post_id ) {

			$html .= '<div class="entry-content excerpt' . $hidden_mobile . '">';
			$html .= wp_trim_words(get_the_excerpt( $post_id ), $length);
			$html .= '</div>';

		}

		echo wp_kses_post( $html );

	}

}

// ========================================================
// Modify Excerpt more
// ========================================================

if ( ! function_exists( 'tfm_excerpt_more' ) ) {

	function tfm_excerpt_more( $more ) {

	return '...';

	}

}

add_filter( 'excerpt_more', 'tfm_excerpt_more' );

// ========================================================
// Toggle entry-meta displays
// ========================================================

/**
 * This function handles meta data displays
 */

if ( ! function_exists( 'tfm_toggle_entry_meta' ) ) {

	function tfm_toggle_entry_meta( $meta_data = '' ) {

		$show_meta = true;

		// Before title meta
		if ( $meta_data == 'before_title_meta' ) {

			if ( ( is_home() &&
	               ! get_theme_mod( 'tfm_homepage_entry_meta_category', true ) &&
	               ! get_theme_mod( 'tfm_homepage_entry_meta_in', false ) ) ||
	               // Archive
	               ( ( is_archive() || is_search() ) &&
	               ! get_theme_mod( 'tfm_archive_entry_meta_category', true ) &&
	               ! get_theme_mod( 'tfm_archive_entry_meta_in', true ) ) ||
	               is_single() && ! get_theme_mod( 'tfm_single_entry_meta_category', true ) &&
	               ! get_theme_mod( 'tfm_single_entry_meta_in', false ) ) {

				$show_meta = false;

			}

		}

		// Category
		if ( $meta_data == 'category' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'tfm_homepage_entry_meta_category', true ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'tfm_archive_entry_meta_category', true ) ) ||
				   is_single() && ! get_theme_mod( 'tfm_single_entry_meta_category', true ) ) {

				$show_meta = false;

			}

		}

		// After title meta
		if ( $meta_data == 'after_title_meta' ) {

			if ( ( is_home() && 
			       ! get_theme_mod( 'tfm_homepage_entry_meta_date', true ) &&
			       ( function_exists('tfm_read_time') && ! get_theme_mod( 'tfm_homepage_entry_meta_read_time', true ) ) &&
 				   ! get_theme_mod( 'tfm_homepage_entry_meta_comment_count', true ) && 
 				   ! get_theme_mod( 'tfm_homepage_entry_meta_author_avatar', true ) &&
 				   ! get_theme_mod( 'tfm_homepage_entry_meta_author', true ) &&
 				   ! get_theme_mod( 'tfm_homepage_entry_meta_author_nickname', false ) &&
 				   ! get_theme_mod( 'tfm_homepage_entry_meta_by', true ) ) ||
 				   // Archive
 				   ( ( is_archive() || is_search() ) && 
			       ! get_theme_mod( 'tfm_archive_entry_meta_date', true ) && 
			       ( function_exists('tfm_read_time') && ! get_theme_mod( 'tfm_archive_entry_meta_read_time', true ) ) &&
 				   ! get_theme_mod( 'tfm_archive_entry_meta_comment_count', true ) && 
 				   ! get_theme_mod( 'tfm_archive_entry_meta_author_avatar', true ) &&
 				   ! get_theme_mod( 'tfm_archive_entry_meta_author', true ) &&
 				   ! get_theme_mod( 'tfm_archive_entry_meta_author_nickname', false ) &&
 				   ! get_theme_mod( 'tfm_archive_entry_meta_by', true ) ) || 
 					// Single
 				   ( ( is_single() ) && 
			       ! get_theme_mod( 'tfm_single_entry_meta_date', true ) && 
			       ! get_theme_mod( 'tfm_single_entry_meta_date_updated', false ) &&
			       ( function_exists('tfm_read_time') && ! get_theme_mod( 'tfm_single_entry_meta_read_time', true ) ) &&
 				   ! get_theme_mod( 'tfm_single_entry_meta_comment_count', true ) && 
 				   ! get_theme_mod( 'tfm_single_entry_meta_author_avatar', true ) &&
 				   ! get_theme_mod( 'tfm_single_entry_meta_author', true ) &&
 				   ! get_theme_mod( 'tfm_single_entry_meta_author_nickname', false ) &&
 				   ! get_theme_mod( 'tfm_single_entry_meta_by', true ) ) ) {

				$show_meta = false;

			}

		}


		// by
		if ( $meta_data == 'by' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'tfm_homepage_entry_meta_by', true ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'tfm_archive_entry_meta_by', true ) ) ||
				   ( is_single() && 
				   ! get_theme_mod( 'tfm_single_entry_meta_by', true ) ) ) {

				$show_meta = false;

			}

		}

		// in
		if ( $meta_data == 'in' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'tfm_homepage_entry_meta_in', false ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'tfm_archive_entry_meta_in', false ) ) ||
				   ( is_single() && 
				   ! get_theme_mod( 'tfm_single_entry_meta_in', false ) ) ) {

				$show_meta = false;

			}

		}

		// Author
		if ( $meta_data == 'author' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'tfm_homepage_entry_meta_author', true ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'tfm_archive_entry_meta_author', true ) ) ||
				   ( is_single() && 
				   ! get_theme_mod( 'tfm_single_entry_meta_author', true ) ) ) {

				$show_meta = false;

			}

		}

		// Author avatar
		if ( $meta_data == 'author_avatar' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'tfm_homepage_entry_meta_author_avatar', true ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'tfm_archive_entry_meta_author_avatar', true ) ) ||
				   ( is_single() && 
				   ! get_theme_mod( 'tfm_single_entry_meta_author_avatar', true ) ) ) {

				$show_meta = false;

			}

		}

		// Author nickname
		if ( $meta_data == 'author_nickname' ) {

			if ( ( is_home() && 
				   ! get_theme_mod( 'tfm_homepage_entry_meta_author_nickname', false ) ) || 
				   ( ( is_archive() || is_search() ) && 
				   ! get_theme_mod( 'tfm_archive_entry_meta_author_nickname', false ) ) ||
				   ( is_single() && 
				   ! get_theme_mod( 'tfm_single_entry_meta_author_nickname', false ) ) ) {

				$show_meta = false;

			}

		}

		// Date
		if ( $meta_data == 'date' ) {

			if ( ( is_home() && 
			       ! get_theme_mod( 'tfm_homepage_entry_meta_date', true ) ) ||
			       // Archive
			       ( ( is_archive() || is_search() ) && ! get_theme_mod( 'tfm_archive_entry_meta_date', true ) ) ||
			       // Single
			       ( is_single() && ! get_theme_mod( 'tfm_single_entry_meta_date', true ) ) ) {

				$show_meta = false;

			}

		}

		// Date Updated
		if ( $meta_data == 'updated_date' ) {

			$u_time = get_the_time('U'); 
			$u_modified_time = get_the_modified_time('U'); 

			$show_updated = ( ( $u_modified_time >= $u_time + 86400 ) ? true : false );

			if ( ! is_single() || ( is_single() && ! get_theme_mod( 'tfm_single_entry_meta_date_updated', false ) ) ) {

				$show_meta = false;

			}

			if ( $show_meta && false === $show_updated && get_theme_mod( 'tfm_single_entry_meta_date', true ) ) {

				$show_meta = false;

			}

		}

		// Comment Count
		if ( $meta_data == 'comment_count' ) {

			if ( ( is_home() && 
			       ! get_theme_mod( 'tfm_homepage_entry_meta_comment_count', true ) ) || 
			       ( ( is_archive() || is_search() ) && 
			       ! get_theme_mod( 'tfm_archive_entry_meta_comment_count', true ) ) ||
			       ( is_single() && 
			       ! get_theme_mod( 'tfm_single_entry_meta_comment_count', true ) ) ) {

				$show_meta = false;

			}

		}

		// Comment Count
		if ( $meta_data == 'excerpt' ) {

			if ( ( is_home() && 
			       ! get_theme_mod( 'tfm_homepage_post_excerpt', true ) ) || 
			       ( ( is_archive() || is_search() ) && 
			       ! get_theme_mod( 'tfm_archive_post_excerpt', true ) ) ||
			       ( is_single() && 
			       ( ! get_theme_mod( 'tfm_single_custom_excerpt', false ) || ( get_theme_mod( 'tfm_single_custom_excerpt', false ) && ! has_excerpt( ) ) ) ) ) {

				$show_meta = false;

			}

		}

		// Read more
		if ( $meta_data == 'read_more' ) {

			if ( is_single() || ( is_home() && 
			       ! get_theme_mod( 'tfm_homepage_read_more', false ) ) || 
			       ( ( is_archive() || is_search() ) && 
			       ! get_theme_mod( 'tfm_archive_read_more', false ) ) ) {

				$show_meta = false;

			}

		}

		// Read more
		if ( $meta_data == 'entry_title' ) {

			if ( (( is_archive() || is_search() ) && 
			       ! get_theme_mod( 'tfm_archive_entry_title', true ) ) || ( is_home() && ! get_theme_mod( 'tfm_homepage_entry_title', true ) ) ) {

				$show_meta = false;

			}

		}

		// Read time (tfm theme boost)
		if ( $meta_data == 'read_time' ) {

			if ( ( is_single() && ! get_theme_mod( 'tfm_single_entry_meta_read_time', true )) || ( is_home() && 
			       ! get_theme_mod( 'tfm_homepage_entry_meta_read_time', true ) ) || 
			       ( ( is_archive() || is_search() ) && 
			       ! get_theme_mod( 'tfm_archive_entry_meta_read_time', true ) ) ) {

				$show_meta = false;

			}

		}

		return $show_meta;

	}

}

if ( ! function_exists('tfm_updated_date') ) {

	function tfm_updated_date( ) {

		$html = '';

		$u_time = get_the_time('U'); 
		$u_modified_time = get_the_modified_time('U'); 

		$show_updated = ( ( $u_modified_time >= $u_time + 86400 ) ? true : false );

		if ( $show_updated ) {
			$html .= '<span>' . esc_html__( 'Updated', 'mozda' ) . '</span> ';
		}
		$html .= '<time datetime="' . get_the_modified_date( 'Y-m-d' ) . '">' . get_the_modified_date( ) . '</time>';

		return $html;

	}
}

// ========================================================
// Full width featured media (single & page)
// ========================================================

// simply returns a true/false 

if ( ! function_exists( 'tfm_full_width_featured_media') ) {

	function tfm_full_width_featured_media( $echo_value = false ) {

		$full_width = false;

		if ( is_single() && ( get_theme_mod( 'tfm_single_full_width', true ) || ( false === get_theme_mod( 'tfm_single_full_width', true ) && function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_single_full_width', true ) ) ) ) {
			$full_width = true;
		}

		if ( is_page() && ( get_theme_mod( 'tfm_page_full_width', true ) || ( false === get_theme_mod( 'tfm_page_full_width', true ) && function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_page_full_width', true ) ) ) ) {
			$full_width = true;
		}

		// return false if we have a side sidebar

		if ( in_array( 'sidebar-side', get_body_class( )) ) {

			$full_width = false;

		}

		if ( $echo_value ) {

			$full_width = $full_width ? 'true' : 'false';

		}

			return $full_width;



	}

}

// ========================================================
// Get the post thumbnail size
// ========================================================

if ( ! function_exists( 'tfm_get_post_thumbnail') ) {

	function tfm_get_post_thumbnail( $count = 0,  $size = 'medium_large' ) {

		global $post;

		$site_settings = tfm_general_settings();
		$large_size_w = get_option('large_size_w');
		$site_width = get_theme_mod( 'tfm_site_width', $site_settings['site_width'] ) <= $site_settings['site_width'] ? $site_settings['site_width'] : get_theme_mod( 'tfm_site_width', $site_settings['site_width'] );


		// Post Columns (posts per row)
		$post_cols = tfm_get_post_cols( 'count' );
		// Layout
		$post_layout = tfm_get_post_layout();
		// Post style
		$post_style = is_home() ? get_theme_mod( 'tfm_homepage_loop_style', 'default' ) : get_theme_mod( 'tfm_archive_loop_style', 'default' );

		// ========================================================
		// Define the image sizes
		// ========================================================

		$size = '' === $size ? apply_filters( 'tfm_archive_medium_thumbnail_size', 'medium_large' ) : $size;

		// Check for small thumbnail
		$thumbnail  = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'tfm-mobile-image' );
		$thumbnail_src = $thumbnail ? $thumbnail[0] : '';
		$thumbnail_check = strpos($thumbnail_src, apply_filters( 'tfm_mobile_image_width', '432' ));


		// Check for single thumbnail size
		$single_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'tfm-single-image' );
		$single_thumbnail_src = $single_thumbnail ? $single_thumbnail[0] : '';
		$check_single_thumbnail = strpos($single_thumbnail_src, apply_filters( 'tfm_single_image_width', '' . $site_width . '' ));


		// Single and full width archive thumbnail size
		$single_size = $check_single_thumbnail ? 'tfm-single-image' : apply_filters( 'tfm_single_thumbnail_size', 'full' );
		$large_archive_thumbnail_size = $check_single_thumbnail ? 'tfm-single-image' : apply_filters( 'tfm_archive_large_thumbnail_size', 'large' );

		// ========================================================
		// No tfm-single-image 
		// ========================================================

		/**
		 * Let's try something else before we display the full image
		 * Settings > Media
		 * If WP Large image is same or more than site width use large
		 */

		if ( ! $check_single_thumbnail && $large_size_w >= apply_filters( 'tfm_single_image_width', $site_width )) {
			$single_size = apply_filters( 'tfm_single_large_thumbnail_size', 'large' );
		}

		// Default archive thumbnail size
		$size = $thumbnail_check ? 'tfm-mobile-image' : $size;

		// 1 Column
		if ( $post_cols === 1 ) {

			$size = $large_archive_thumbnail_size;

		}

		// 2 Column
		if ( $post_cols === 2 || $post_cols === 3 ) {

			$size = apply_filters( 'tfm_archive_medium_thumbnail_size', 'medium_large' );

		}

		// List
		if ( $post_layout === 'list' ) {

			$size = apply_filters( 'tfm_archive_medium_thumbnail_size', 'medium_large' );

			if ( $post_cols > 1 ) {
				$size = $thumbnail_check ? 'tfm-mobile-image' : $size;
			} 
		}

		// Single

		if  ( is_single() ) {

			// Full width
			if ( ( get_theme_mod( 'tfm_single_full_width', true ) || ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_single_full_width', true ) ) ) && in_array( 'sidebar-side', get_body_class( )) === false ) {
				$size = apply_filters( 'tfm_single_thumbnail_size', 'full' );

			} else {

				$size = $single_size;

			}

		}

		// Page

		if  ( is_page() ) {
			// Full width
			if ( ( get_theme_mod( 'tfm_page_full_width', true ) || ( function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_page_full_width', true ) ) ) && in_array( 'sidebar-side', get_body_class( )) === false ) {
				$size = apply_filters( 'tfm_single_thumbnail_size', 'full' );
			} else {
				$size = $single_size;
			}
		}

		// ========================================================
		// w/sidebar
		// ========================================================

		if ( in_array( 'has-sidebar', get_body_class( ))) {

			if ( $post_cols === 1 ) {
				$size = apply_filters( 'tfm_archive_large_thumbnail_size', 'large' );
			}

			if ( $post_layout === 'list' ) {

				$size = apply_filters( 'tfm_archive_medium_thumbnail_size', 'medium_large' );

				if ( $post_cols > 1 ) {
					$size = $thumbnail_check ? 'tfm-mobile-image' : $size;
				}
			}

		}

		return the_post_thumbnail( $size );

	}

}

// ========================================================
// Get post count for archive displays
// ========================================================

if ( ! function_exists( 'tfm_get_post_count' ) ) {

	function tfm_get_post_count() {

		$tfm_vars = tfm_template_vars( '', false );

		$html = '';

		if ( tfm_is_woo() || tfm_is_woo( 'archive' )) { // Shop and product category
			$html =  esc_attr( $tfm_vars['post_count'] ) . ' ' . esc_html__( 'Products', 'mozda' );
		} elseif ( is_category() ) {
			$html =  esc_attr( $tfm_vars['post_count'] ) . ' ' . esc_html__( 'Posts', 'mozda' );
		} elseif ( is_author() ) {
			$html =  count_user_posts ($tfm_vars['object']->ID ) . ' ' . esc_html__( 'Posts', 'mozda' );
		} elseif ( is_tag() ) {
			$html =  esc_attr( $tfm_vars['object']->count ) . ' ' . esc_html__( 'Posts', 'mozda' );
		} elseif ( is_search() ) {
			$html = esc_attr( $tfm_vars['post_count'] ) . ' ' . esc_html__( 'Posts', 'mozda' );
		} else {
			if ( is_archive() ) {
				$html =  esc_html__( 'Archive', 'mozda' );
			}
		}

		return $html;
	}

}

// ========================================================
// Remove archive title label
// ========================================================

if ( ! function_exists( 'tfm_remove_archive_title_label' ) ) {

	function tfm_remove_archive_title_label( $title ) {

		if ( get_theme_mod( 'tfm_remove_archive_title_label', true ) ) {

		    if ( is_category() ) {
		        $title = '<span>' . single_cat_title( '', false ) . '</span>';
		    } elseif ( is_tag() ) {
		        $title = '<span>' . single_tag_title( '', false ) . '</span>';
		    } elseif ( is_author() ) {
		        $title = '<span class="vcard">' . get_the_author() . '</span>';
		    } elseif ( is_post_type_archive() ) {
		        $title = '<span>' . post_type_archive_title( '', false ) . '</span>';
		    } elseif ( is_tax() ) {
		        $title = '<span>' . single_term_title( '', false ) . '</span>';
		    }

		}
	  
	    return $title;
	}

}
 
add_filter( 'get_the_archive_title', 'tfm_remove_archive_title_label' );


// ========================================================
// Blog header
// ========================================================

if ( ! function_exists( 'tfm_blog_header' ) ) { 

	function tfm_blog_header( ) {

		$html = '';

		$has_avatar = is_author() && get_theme_mod( 'tfm_archive_author_avatar', true ) && get_avatar( get_the_author_meta( 'ID' )) ? ' has-avatar' : '';

		// Home

		if ( is_home( ) && ! is_paged() && have_posts( ) && get_theme_mod( 'tfm_homepage_loop_title', '' ) ) {

			$html .= '<div class="section-header home-title">';
			$html .= '<h2 class="page-title">' . esc_html( get_theme_mod( 'tfm_homepage_loop_title', '' ) ) . '</h2>';

			if ( get_theme_mod( 'tfm_homepage_loop_subtitle', '' ) )  {
				$html .= '<p class="sub-title">' . esc_html( get_theme_mod( 'tfm_homepage_loop_subtitle', '') ) . '</p>';
			}
			$html .= '</div>';

		}

		// Archive

		if ( ( get_theme_mod( 'tfm_archive_title', true ) && ( is_archive() || is_search() ) ) || tfm_is_woo( 'page' ) ) {

			$html .= '<header class="archive-header' . $has_avatar . '">';

			$html .= '<div class="archive-header-inner">';

			// Author avatar
			if ( is_author() && get_theme_mod( 'tfm_archive_author_avatar', true ) && get_avatar( get_the_author_meta( 'ID' )) ) {
				// open a new flex wrapper
				$html .= '<div class="author-archive-wrapper">';
				$html .= '<div class="author-avatar"><span>' . get_avatar( get_the_author_meta( 'ID' ), 120 ) . '</span>';

				if ( function_exists('tfm_author_social_meta') && get_theme_mod( 'tfm_archive_author_social', false)) {

					$html .= tfm_author_social_meta( true );

				}
				$html .= '</div>';
			} 

			$html .= '<div class="archive-description-wrap">';

			$html .= '<div class="archive-title-section">';

			if ( get_theme_mod( 'tfm_archive_post_count', true ) ) {

				$html .= '<span class="archive-subtitle post-count entry-meta">';

				$html .= tfm_get_post_count();

				$html .= '</span>';

			}

			if ( get_theme_mod( 'tfm_archive_title', true ) ) {


				if ( current_theme_supports( 'woocommerce') && class_exists('WooCommerce') ) {

					// Woo headers

					if ( is_shop() ) { // Shop page

						$html .= '<h1 class="archive-title"><span>' . get_the_title( get_option( 'woocommerce_shop_page_id' ) ). '</span></h1>';

					} elseif ( is_cart() || is_checkout() || is_account_page() ) { // Cart & Checkout Pages

						$html .= '<h1 class="archive-title"><span>' . get_the_title( ). '</span></h1>';

					} elseif ( is_product_category() || is_product_tag() ) { // Product category

						$html .= '<h1 class="archive-title">' . get_the_archive_title( ) . '</h1>';

					// End Woo Headers

					} elseif ( is_search() ) {

						$html .= '<h1 class="archive-title"><span>' . get_search_query() . '</span></h1>';

					} else {

						$html .= '<h1 class="archive-title">' . get_the_archive_title( ) . '</h1>';

					}

			} else {

				//  No Woo Output Theme headers

				if ( is_search() ) {

					$html .= '<h1 class="archive-title"><span>' . get_search_query() . '</span></h1>';

				} else {

					$html .= '<h1 class="archive-title">' . get_the_archive_title( ) . '</h1>';

				}

			}

			$html .= '</div>'; // Archive title section

			}

			// Open the desscription wrapper

			if ( ( ! is_author() && get_theme_mod( 'tfm_archive_description', true ) && '' !== get_the_archive_description( ) ) || ( is_author() && get_theme_mod( 'tfm_archive_author_bio', false ) ) || ( is_category() && get_theme_mod( 'tfm_archive_subcats', true ) ) ) {

				$html .= '<div class="archive-description-section">';

			}

			if ( ! is_author() && get_theme_mod( 'tfm_archive_description', true ) || is_author() && get_theme_mod( 'tfm_archive_author_bio', false ) ) {

				if ( tfm_is_woo( ) ) { // Shop page

					$shop_id = get_post( get_option( 'woocommerce_shop_page_id' ) );

					$html .= apply_filters('the_content', $shop_id->post_content ); 

				} else {

					if ( is_author()) {
						$html .= '<p class="archive-description">' . get_the_archive_description( ) . '</p>';
					} else {
						$html .= get_the_archive_description( );
					}

				}

			}

			if ( is_category() && get_theme_mod( 'tfm_archive_subcats', false ) ) {

				// Display child categories if we have any

				$category = get_queried_object();
				$child_categories=get_categories(
	                array( 'parent' => $category->term_id,
	                        'hide_empty' => false )
	                        ); 

				if ( $child_categories ) {

					$html .= '<div class="sub-categories">';

					$html .= '<ul class="child-categories">';

	                foreach ( $child_categories as $child ) {

	                	if ( 0 !== $child->count ) {

	                	$html .= '<li class="child-cat"><a class="cat-link-' . $child->term_id . '" href="' . get_category_link( $child->term_id ) . '">' . $child->cat_name . '<span class="tag-link-count child-post-count">' . $child->count . '</span></a></li>';
	                	} else {
	                		$html .= '<li></li>';
	                	}

	                }

	                $html .= '</ul>';

	                $html .= '</div>';

	            }

			}

			// Close description section
			if ( ( ! is_author() && get_theme_mod( 'tfm_archive_description', true ) && '' !== get_the_archive_description( ) ) || ( is_author() && get_theme_mod( 'tfm_archive_author_bio', false ) ) || ( is_category() && get_theme_mod( 'tfm_archive_subcats', true ) ) ) {

				$html .= '</div>';

			}

			if ( function_exists('tfm_author_social_meta') && get_theme_mod( 'tfm_archive_author_social', false) && ! get_theme_mod( 'tfm_archive_author_avatar', true )) {

				$html .= tfm_author_social_meta( true );

			}

			// breadcrumbs tfm theme boost

			if ( function_exists('tfm_breadcrumbs') ) {

				$html .= tfm_breadcrumbs($return = true, $forced_request = true );

			}

			$html .= '</div>'; // Description wrap

			if ( is_author() && get_theme_mod( 'tfm_archive_author_avatar', true ) ) {
				$html .= '</div>'; // Close author wrapper if open
			} 

			$html .= '</div>'; // Header inner

			$html .= '</header>';


		}

		echo wp_kses_post( $html );



	}

}
add_action('tfm_after_header', 'tfm_blog_header', 30 );

// ========================================================
// Prev/Next Post Navigation
// ========================================================

if ( ! function_exists('tfm_prev_next_post') ) {

	function tfm_prev_next_post() {

		include_once( get_parent_theme_file_path( '/template-parts/post/single-post-navigation.php' )  );

	}

}

add_action('tfm_after_content', 'tfm_prev_next_post', 20 );

// ========================================================
// Author Bio
// ========================================================

if ( ! function_exists('tfm_author_bio') ) {

	function tfm_author_bio() {

		include_once( get_parent_theme_file_path( '/template-parts/post/single-authorbio.php' )  );

	}

}

add_action('tfm_after_content', 'tfm_author_bio', 10 );

// ========================================================
// Single hero layout
// ========================================================

if ( ! function_exists('tfm_single_full_width_header') ) {

	function tfm_single_full_width_header() {

		$pageID = get_option('page_on_front');

		// return if we are running post blocks on the homepage
		if ( is_front_page() && is_page( $pageID ) && function_exists( 'tfm_post_blocks') && tfm_post_blocks_active() ) {
			return;
		}

		$full_width = ( is_single() && ( get_theme_mod( 'tfm_single_full_width', false ) || ( false === get_theme_mod( 'tfm_single_full_width', false ) && function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_single_full_width', true ) ) ) ) || is_page() && ( get_theme_mod( 'tfm_page_full_width', false ) || ( false === get_theme_mod( 'tfm_page_full_width', false ) && function_exists('tfm_custom_meta_box') && get_post_meta( get_the_ID(), 'tfm_page_full_width', true ) ) ) ? true : false;

		if ( ( is_single() || is_page() ) && in_array( 'has-sidebar', get_body_class() ) && in_array('sidebar-after', get_body_class()) ) {

			while ( have_posts() ) : the_post();

			if ( has_post_format('video') || has_post_format( 'audio')) :
				echo tfm_featured_video();
				tfm_featured_audio();
			else:

				include_once( get_parent_theme_file_path( '/template-parts/post/content-hero.php' )  );
			endif;
			endwhile;
		}

	}

}

add_action('tfm_after_wrap', 'tfm_single_full_width_header', 10 );

// ========================================================
// Video post format
// ========================================================

/*
 * Get the first video embed in the post
 * Display it in place of the featured image if selected
 */

if ( ! function_exists( 'tfm_featured_video' ) ) {

	function tfm_featured_video( $has_video_query = false, $return = true ) {

		if ( ! has_post_format( 'video') ) {
			return;
		}
		// Return if media is disabled for home and archive
		if ( ( is_home() && ! get_theme_mod( 'tfm_homepage_post_media', true ) ) || ( ( is_archive() || is_search() ) && ! get_theme_mod( 'tfm_archive_post_media', true ) ) ) {
			return;
		}

		$html = '';

		if ( has_post_format( 'video') ) {

			$content = apply_filters( 'the_content', get_the_content() );
			$video = false;

			// Only get video from the content if a playlist isn't present.
			if ( false === strpos( $content, 'wp-playlist-script' ) ) {
				$video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

				if ( ! $video ) {
					return false;
				}

				// We have a video and a query request
				if ( $video && $has_video_query ) {
					return true;
				}
			}

			foreach ( $video as $video_html ) {
				
				// Figure out the block type by looking at the content string

				$type = 'tfm-video'; // Default is video block

				if ( strpos($video_html, 'oembed') !== false ) {
					$type = 'tfm-video-oembed'; // block oembed (Youtube block, Vimeo block etc.)
				}
				if ( strpos($video_html, 'shortcode') !== false ) {
					$type = 'tfm-video-shortcode'; // shortcode
				}

				if ( is_single()) {
					$html .= '<div class="thumbnail-wrapper" data-fullwidth="' .  esc_attr( tfm_full_width_featured_media( true ) ) . '">';
				}
				$html .= '<figure class="wp-block-embed is-type-video ' . $type . ' wp-embed-aspect-16-9 wp-has-aspect-ratio tfm-featured-media" data-fullwidth="' .  esc_attr( tfm_full_width_featured_media( true ) ) . '"><div class="wp-block-embed__wrapper">';
				$html .= $video_html;
				$html .= '</div></figure>';
				if ( is_single()) {
					$html .= '</div>';
				}

				return $html;

				break; // In case we have more than one embed lets break after the first iteration
			}

		} else {

			// Nothing here return false
			return false;
		}

	}

}

// ========================================================
// Audio post format
// ========================================================

/*
 * Get the first audio embed in the post
 * Display it in place of the featured image in single()
 */

if ( ! function_exists( 'tfm_featured_audio' ) ) {

	function tfm_featured_audio( $has_audio_query = false ) {

		if ( ! has_post_format( 'audio')) {
			return;
		}

		// Return if media is disabled in archive
		if ( ( is_home() && ! get_theme_mod( 'tfm_homepage_post_media', true ) ) || ( ( is_archive() || is_search() ) && ! get_theme_mod( 'tfm_archive_post_media', true ) ) ) {
			return;
		}

		if ( has_post_format( 'audio' ) && has_block('core/embed') ) {

			if ( $has_audio_query ) {
				return true;
			}

			$content = apply_filters( 'the_content', get_the_content() );
			$audio = false;

			// Only get audio from the content if a playlist isn't present.
			if ( false === strpos( $content, 'wp-playlist-script' ) ) {
				$audio = get_media_embedded_in_content( $content, array( 'audio', 'object', 'embed', 'iframe' ) );

				if ( ! $audio ) {
					return false;
				}

				// We have a audio file and a query request
				if ( $audio && $has_audio_query ) {
					return true;
				}
			}

			foreach ( $audio as $audio_html ) {

				$type = 'audio';

				if ( strpos($audio_html, 'spotify') !== false ) {
					$type = 'is-provider-spotify';
				} 
				if ( strpos($audio_html, 'mixcloud') !== false ) {
					$type = 'is-provider-mixcloud';
				}
				if ( strpos($audio_html, 'soundcloud') !== false ) {
					$type = 'is-provider-soundcloud';
				}
				if ( is_single()) {
					echo '<div class="thumbnail-wrapper" data-fullwidth="' .  esc_attr( tfm_full_width_featured_media( true ) ) . '">';
				}
				echo '<figure class="wp-block-embed is-type-audio ' . $type . ' wp-embed-aspect-16-9 wp-has-aspect-ratio tfm-featured-media" data-fullwidth="' .  esc_attr( tfm_full_width_featured_media( true ) ) . '"><div class="wp-block-embed__wrapper">';
				echo wp_kses_post( $audio_html );
				echo '</div></figure>';
				if ( is_single()) {
				echo '</div>';
				}
				break; // In case we have more than one embed break after the first iteration
			}

		} else {

			// Nothing here return false
			return false;
		}

	}

}

// ========================================================
// Set offset for homepage loop
// ========================================================

add_action('pre_get_posts', 'tfm_query_offset', 1 );

if ( ! function_exists( 'tfm_query_offset' ) ) {

	function tfm_query_offset(&$query) {

	    //Before anything else, make sure this is the right query...
	    if ( ! $query->is_home() ) {
	        return;
	    }

	    //First, define your desired offset...
	    $offset = get_theme_mod( 'tfm_homepage_loop_offset', 0 );
	    
	    //Next, determine how many posts per page you want (we'll use WordPress's settings)
	    $ppp = get_option('posts_per_page');

	    //Next, detect and handle pagination...
	    if ( $query->is_main_query() ) {
		    if ( $query->is_paged ) {

		        //Manually determine page query offset (offset + current page (minus one) x posts per page)
		        $page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );

		        //Apply adjust page offset
		        $query->set('offset', $page_offset );

		    }
		    else {

		        //This is the first page. Just use the offset...
		        $query->set('offset',$offset);

		    }

		}
	}

}

// ========================================================
// Modify homepage query
// ========================================================

if ( ! function_exists( 'tfm_modify_query_home' ) ) {

	function tfm_modify_query_home($query) {

	    //Before anything else, make sure this is the right query...
	    if ( ! $query->is_home() ) {
	        return;
	    }

	    $post_ids =  get_theme_mod( 'tfm_homepage_exclude_posts_ids', '' ) ? explode(',', get_theme_mod( 'tfm_homepage_exclude_posts_ids', '' ) ) : '';
	    $cat_ids =  get_theme_mod( 'tfm_homepage_exclude_cat_ids', '' ) ? explode(',', get_theme_mod( 'tfm_homepage_exclude_cat_ids', '' ) ) : '';

	    // Convert cat slugs to IDs

        if ( $cat_ids ) {

        foreach ( $cat_ids as $key => $term) {

            if ( ! is_numeric($term) ) {
                $cat = get_category_by_slug($term); 
				$term = $cat->term_id;
            }

            $terms[] = $term;

        }

        	$cat_ids = $terms;

        }

	    if ( $query->is_home() && $query->is_main_query() ) {
	        $query->set( 'post__not_in', $post_ids );
	        $query->set( 'category__not_in', $cat_ids );
	    }
	}

}
add_action('pre_get_posts', 'tfm_modify_query_home', 1);

// ========================================================
// Add iframe to allowed wp_kses_post
// ========================================================

/**
 *
 * @param array  $tags Allowed tags, attributes, and/or entities.
 * @param string $context Context to judge allowed tags by. Allowed values are 'post'.
 *
 * @return array
 */
if ( ! function_exists( 'tfm_iframe_wpkses_post_tags' ) ) {

function tfm_iframe_wpkses_post_tags( $tags, $context ) {

	if ( 'post' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
			'allow'           => true,
		);
	}

	return $tags;
}

}

add_filter( 'wp_kses_allowed_html', 'tfm_iframe_wpkses_post_tags', 10, 2 );

// ========================================================
// Modify WP Widgets HTML output
// ========================================================

// Categories widget add span around post count
function tfm_cat_widget_count_span( $links ) {

	$links = str_replace( '</a> (', '<span class="tfm-count">', $links );
	$links = str_replace( ')', ' <i>' . esc_html__( 'Posts', 'mozda' ) . '</i></span></a>', $links );
	return $links;

}
add_filter( 'wp_list_categories', 'tfm_cat_widget_count_span' );

// Archives widget add span around post count
function tfm_archive_widget_count_span( $links ) {

	$links = str_replace( '</a>&nbsp;(', '<span class="tfm-count"><i class="hidden">(</i>', $links );
	$links = str_replace( ')', ' <i>' . esc_html__( 'Posts', 'mozda' ) . '</i><i class="hidden">)</i></span></a>', $links );
	return $links;

}
add_filter( 'get_archives_link', 'tfm_archive_widget_count_span' );


// ========================================================
// Display primary menu description field
// ========================================================

if ( ! function_exists('tfm_primary_menu_desc')) {

	function tfm_primary_menu_desc( $item_output, $item, $depth, $args ) {
		
		if ( ( 'primary' == $args->theme_location || 'split-menu-left' == $args->theme_location || 'split-menu-right' == $args->theme_location || 'slide-menu-primary' == $args->theme_location ) && $item->description )
			$item_output = str_replace( '</a>', '<span class="menu-description">' . $item->description . '</span></a>', $item_output );
			
		return $item_output;
	}
}

add_filter( 'walker_nav_menu_start_el', 'tfm_primary_menu_desc', 10, 4 );

// ========================================================
// Check if this is a woocommerce page
// ========================================================

if ( ! function_exists( 'tfm_is_woo' ) ) {

	function tfm_is_woo( $woo_page ='' ) {

		$is_woo = false;

		if ( current_theme_supports( 'woocommerce') && class_exists('WooCommerce')) {

			// Shop
			if ( '' === $woo_page && is_shop() ) {
				$is_woo = true;
			}

			// Product page
			if ( $woo_page === 'product' && is_product() ) {
				$is_woo = true;
			}
			// Category/archive
			if ( $woo_page === 'archive' && ( is_product_category() || is_product_tag() ) ) {
				$is_woo = true;
			}
			// Cart/Checkout/Account
			if ( $woo_page === 'page' && ( is_cart() || is_checkout() || is_account_page() ) ) {
				$is_woo = true;
			}

		}

		return $is_woo;
	}

}

// ========================================================
// Convert Hex to RGBa
// ========================================================

function tfm_hex2rgba( $colour, $alpha = 1, $array = false ) {

        if ( $colour[0] == '#' ) {
                $colour = substr( $colour, 1 );
        }
        if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
        } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
        } else {
            return false;
        }

        $r = hexdec( $r );
        $g = hexdec( $g );
        $b = hexdec( $b );

        if ( $array ) {
	        return array( 'red' => $r, 'green' => $g, 'blue' => $b );
	    } else {
	    	return 'rgba(' . $r .',' . $g . ',' . $b . ',' . $alpha . ')';
	    }

}

// ========================================================
// Customizer and core functions
// ========================================================
require get_parent_theme_file_path( '/inc/theme-settings.php' );
require get_parent_theme_file_path( '/inc/tgmpa.php' );
require get_parent_theme_file_path( '/inc/ocdi.php' );

function tfm_theme_includes() {
	require get_parent_theme_file_path( '/inc/template-vars.php' );
	require get_parent_theme_file_path( '/inc/hooks.php' );
	require get_parent_theme_file_path( '/inc/plugin-filters.php' );
	require get_parent_theme_file_path( '/inc/customizer/customizer.php' );
		require get_parent_theme_file_path( '/inc/customizer/customizer_colors.php' );
		require get_parent_theme_file_path( '/inc/css/custom_css.php' );
		require get_parent_theme_file_path( '/inc/sanitization.php' );
		require get_parent_theme_file_path( '/inc/branded-sections.php' );
		require get_parent_theme_file_path( '/inc/term-meta.php' );
		require get_parent_theme_file_path( '/inc/post-meta.php' );
		require get_parent_theme_file_path( '/inc/block-patterns.php' );
		require get_parent_theme_file_path( '/inc/live-search.php' );
		require get_parent_theme_file_path( '/inc/starter-content.php' );
	// Woocommerce
	if ( current_theme_supports( 'woocommerce') && class_exists('WooCommerce')) {
		require get_parent_theme_file_path( '/inc/woocommerce-functions.php' );
	}
}
add_action( 'init', 'tfm_theme_includes' );

?>
