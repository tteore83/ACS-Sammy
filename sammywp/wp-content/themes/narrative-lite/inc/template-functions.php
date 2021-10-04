<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Narrative Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function narrative_lite_body_classes( $classes ) {
    $narrative_lite_default = narrative_lite_get_default_theme_options();
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

        // sidebar layout
    $homepage_sidebar_layout = get_theme_mod( 'global_sidebar_layout', $narrative_lite_default['global_sidebar_layout'] );
    $archive_sidebar_layout = get_theme_mod( 'archive_sidebar_layout', $narrative_lite_default['archive_sidebar_layout'] );
    $single_sidebar_layout = get_theme_mod( 'single_sidebar_layout', $narrative_lite_default['single_sidebar_layout'] );
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}elseif ((is_single()) || is_page()) {
        $classes[] = $single_sidebar_layout;
    }elseif (is_archive() || is_search()) {
        $classes[] = $archive_sidebar_layout;
    }else {
        $classes[] = $homepage_sidebar_layout;
    }

    $homepage_banner_enable = get_theme_mod( 'enable_header_banner', $narrative_lite_default['enable_header_banner'] );

    if ($homepage_banner_enable && is_front_page() ) {
    	$classes[] = 'has-slider-enabled';
    }
    
	return $classes;
}
add_filter( 'body_class', 'narrative_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function narrative_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'narrative_lite_pingback_header' );
