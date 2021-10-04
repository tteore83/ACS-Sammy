<?php
/**
 * VW Restaurant Lite: Block Patterns
 *
 * @package VW Restaurant Lite
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-restaurant-lite',
		array( 'label' => __( 'VW Restaurant Lite', 'vw-restaurant-lite' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-restaurant-lite/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-restaurant-lite' ),
			'categories' => array( 'vw-restaurant-lite' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":432,\"minHeight\":550,\"align\":\"full\",\"className\":\"banner-section\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim banner-section\" style=\"min-height:550px\"><img class=\"wp-block-cover__image-background wp-image-432\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"m-0\"} -->\n<div class=\"wp-block-columns alignwide m-0\"><!-- wp:column {\"width\":\"20%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:20%\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"60%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:60%\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"style\":{\"typography\":{\"fontSize\":35}},\"textColor\":\"white\",\"className\":\"px-md-5 px-0 mb-3\"} -->\n<h1 class=\"has-text-align-center px-md-5 px-0 mb-3 has-white-color has-text-color\" style=\"font-size:35px\">LOREM IPSUM IS SIMPLY DUMMY TEXT OF THE PRINTING</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":15}},\"textColor\":\"white\",\"className\":\"text-center px-md-5 px-0\"} -->\n<p class=\"has-text-align-center text-center px-md-5 px-0 has-white-color has-text-color\" style=\"font-size:15px\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"contentJustification\":\"center\",\"className\":\"text-center\"} -->\n<div class=\"wp-block-buttons is-content-justification-center text-center\"><!-- wp:button {\"borderRadius\":0,\"style\":{\"color\":{\"text\":\"#ffea54\"}},\"className\":\"is-style-outline hvr-sweep-to-right mt-4\"} -->\n<div class=\"wp-block-button is-style-outline hvr-sweep-to-right mt-4\"><a class=\"wp-block-button__link has-text-color no-border-radius\" style=\"color:#ffea54\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"20%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:20%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-restaurant-lite/about-section',
		array(
			'title'      => __( 'About Section', 'vw-restaurant-lite' ),
			'categories' => array( 'vw-restaurant-lite' ),
			'content'    => "<!-- wp:columns {\"align\":\"wide\",\"className\":\"about-section mx-0 py-5\"} -->\n<div class=\"wp-block-columns alignwide about-section mx-0 py-5\"><!-- wp:column {\"width\":\"40%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:40%\"><!-- wp:image {\"id\":456,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/about.png\" alt=\"\" class=\"wp-image-456\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"text-center\"} -->\n<div class=\"wp-block-column text-center\"><!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"typography\":{\"fontSize\":53}},\"className\":\"px-3 pb-2\"} -->\n<h2 class=\"has-text-align-center px-3 pb-2\" style=\"font-size:53px\"><em>Lorem ipsum dolor</em></h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":14},\"color\":{\"text\":\"#727272\"}},\"className\":\"text-center\"} -->\n<p class=\"has-text-align-center text-center has-text-color\" style=\"color:#727272;font-size:14px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"contentJustification\":\"center\",\"className\":\"text-center\"} -->\n<div class=\"wp-block-buttons is-content-justification-center text-center\"><!-- wp:button {\"borderRadius\":0,\"textColor\":\"black\",\"className\":\"is-style-outline hvr-sweep-to-right mt-4\"} -->\n<div class=\"wp-block-button is-style-outline hvr-sweep-to-right mt-4\"><a class=\"wp-block-button__link has-black-color has-text-color no-border-radius\">ABOUT US</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}