<?php
/**
 * Register custom block patterns for editors.
 *
 * @package WordPress
 * @subpackage Mozda
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register pattern category and patterns.
 */
function mozda_register_block_patterns() {
	if ( ! function_exists( 'register_block_pattern' ) ) {
		return;
	}

	register_block_pattern_category(
		'mozda-library',
		array(
			'label' => esc_html__( 'Mozda Library', 'mozda' ),
		)
	);

	$hero_overline   = esc_html__( 'Fresh dispatch', 'mozda' );
	$hero_heading    = esc_html__( 'Lead with curiosity.', 'mozda' );
	$hero_paragraph  = esc_html__( 'Frame your next story with a bold opener, friendly copy, and a single clear action.', 'mozda' );
	$hero_primary    = esc_html__( 'Explore the archive', 'mozda' );
	$hero_secondary  = esc_html__( 'Read the manifesto', 'mozda' );

	$hero_content = sprintf(
		'<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"3rem","bottom":"3rem","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"1.25rem"},"border":{"radius":"32px"}},"backgroundColor":"primary","textColor":"white","className":"mozda-pattern mozda-pattern-hero","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide mozda-pattern mozda-pattern-hero has-white-color has-primary-background-color has-text-color has-background" style="border-radius:32px;padding-top:3rem;padding-right:var(--wp--preset--spacing--md);padding-bottom:3rem;padding-left:var(--wp--preset--spacing--md)"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.2em"}},"fontSize":"xs"} -->
<p class="has-xs-font-size" style="letter-spacing:0.2em;text-transform:uppercase">%1$s</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"fontSize":"display"} -->
<h1 class="wp-block-heading has-display-font-size">%2$s</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"lg"} -->
<p class="has-lg-font-size">%3$s</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"white","textColor":"primary","style":{"border":{"radius":"999px"},"typography":{"fontWeight":"600"},"spacing":{"padding":{"left":"1.75rem","right":"1.75rem","top":"0.75rem","bottom":"0.75rem"}}}} -->
<div class="wp-block-button" style="font-weight:600"><a class="wp-block-button__link has-primary-color has-white-background-color has-text-color has-background" style="border-radius:999px;padding-top:0.75rem;padding-right:1.75rem;padding-bottom:0.75rem;padding-left:1.75rem">%4$s</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline","style":{"border":{"radius":"999px"},"spacing":{"padding":{"left":"1.75rem","right":"1.75rem","top":"0.75rem","bottom":"0.75rem"}}}} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" style="border-radius:999px;padding-top:0.75rem;padding-right:1.75rem;padding-bottom:0.75rem;padding-left:1.75rem">%5$s</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
		$hero_overline,
		$hero_heading,
		$hero_paragraph,
		$hero_primary,
		$hero_secondary
	);

	$list_heading   = esc_html__( 'Reading list', 'mozda' );
	$list_one_title = esc_html__( 'The spark', 'mozda' );
	$list_one_text  = esc_html__( 'A quick primer to frame the problem you are solving.', 'mozda' );
	$list_two_title = esc_html__( 'Field notes', 'mozda' );
	$list_two_text  = esc_html__( 'Share the messy middle—wins, misses, and lessons learned.', 'mozda' );
	$list_three_title = esc_html__( 'Toolkit', 'mozda' );
	$list_three_text  = esc_html__( 'Drop the exact resources readers can copy and remix.', 'mozda' );
	$list_four_title  = esc_html__( 'Next steps', 'mozda' );
	$list_four_text   = esc_html__( 'Point to the very next thing you recommend doing.', 'mozda' );

	$reading_list_content = sprintf(
		'<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"2rem"}},"className":"mozda-pattern mozda-pattern-reading-list","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide mozda-pattern mozda-pattern-reading-list" style="padding-top:2.5rem;padding-right:var(--wp--preset--spacing--md);padding-bottom:2.5rem;padding-left:var(--wp--preset--spacing--md)"><!-- wp:heading {"textAlign":"left","fontSize":"xl"} -->
<h2 class="wp-block-heading has-text-align-left has-xl-font-size">%1$s</h2>
<!-- /wp:heading -->

<!-- wp:columns {"isStackedOnMobile":false} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:list -->
<ul><li><strong>%2$s</strong><br>%3$s</li><li><strong>%4$s</strong><br>%5$s</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:list -->
<ul><li><strong>%6$s</strong><br>%7$s</li><li><strong>%8$s</strong><br>%9$s</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
		$list_heading,
		$list_one_title,
		$list_one_text,
		$list_two_title,
		$list_two_text,
		$list_three_title,
		$list_three_text,
		$list_four_title,
		$list_four_text
	);

	$switcher_overline = esc_html__( 'View switcher', 'mozda' );
	$skim_heading      = esc_html__( 'Skim mode', 'mozda' );
	$skim_text         = esc_html__( 'Summarise your story in bullet-points for readers on the move.', 'mozda' );
	$skim_tip_one      = esc_html__( 'One insight per bullet.', 'mozda' );
	$skim_tip_two      = esc_html__( 'Link deeper sections inline.', 'mozda' );
	$skim_tip_three    = esc_html__( 'Highlight action steps.', 'mozda' );
	$deep_heading      = esc_html__( 'Deep dive', 'mozda' );
	$deep_text         = esc_html__( 'Invite readers to slow down with a pull quote, reflection, or story.', 'mozda' );
	$deep_tip          = esc_html__( 'Use this space to reinforce your perspective and nudge toward your CTA.', 'mozda' );

	$view_switcher_content = sprintf(
		'<!-- wp:group {"align":"wide","style":{"border":{"radius":"24px"},"spacing":{"padding":{"top":"2.5rem","bottom":"2.5rem","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"1.5rem"}},"backgroundColor":"off-white","className":"mozda-pattern mozda-pattern-view-switcher","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide mozda-pattern mozda-pattern-view-switcher has-off-white-background-color has-background" style="border-radius:24px;padding-top:2.5rem;padding-right:var(--wp--preset--spacing--md);padding-bottom:2.5rem;padding-left:var(--wp--preset--spacing--md)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"0.1em","textTransform":"uppercase"}},"fontSize":"xs"} -->
<p class="has-xs-font-size" style="letter-spacing:0.1em;text-transform:uppercase">%1$s</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">%2$s</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>%3$s</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>%4$s</li><li>%5$s</li><li>%6$s</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">%7$s</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>%8$s</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"fontSize":"sm"} -->
<p class="has-sm-font-size">%9$s</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
		$switcher_overline,
		$skim_heading,
		$skim_text,
		$skim_tip_one,
		$skim_tip_two,
		$skim_tip_three,
		$deep_heading,
		$deep_text,
		$deep_tip
	);

	register_block_pattern(
		'mozda/hero-intro',
		array(
			'title'       => esc_html__( 'Hero intro', 'mozda' ),
			'description' => esc_html__( 'A glassmorphism-inspired hero ready for the top of your post or landing page.', 'mozda' ),
			'categories'  => array( 'mozda-library' ),
			'content'     => $hero_content,
		)
	);

	register_block_pattern(
		'mozda/reading-list',
		array(
			'title'       => esc_html__( 'Reading list outline', 'mozda' ),
			'description' => esc_html__( 'Set expectations with a two-column breakdown of what your readers will learn.', 'mozda' ),
			'categories'  => array( 'mozda-library' ),
			'content'     => $reading_list_content,
		)
	);

	register_block_pattern(
		'mozda/view-switcher',
		array(
			'title'       => esc_html__( 'View switcher', 'mozda' ),
			'description' => esc_html__( 'Offer skimmers and deep-divers two different ways to engage with your content.', 'mozda' ),
			'categories'  => array( 'mozda-library' ),
			'content'     => $view_switcher_content,
		)
	);
}
add_action( 'init', 'mozda_register_block_patterns', 20 );
