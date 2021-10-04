<?php
/**
 * Narrative Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Narrative Lite
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'narrative_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function narrative_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Narrative Lite, use a find and replace
		 * to change 'narrative-lite' to the name of your theme in all the template files.
		 */
		//load_theme_textdomain( 'narrative-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'narrative-lite-primary-menu' => esc_html__( 'Primary Menu', 'narrative-lite' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'narrative_lite_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 100,
				'width'       => 150,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        /**
         * Add theme support for gutenberg block
         *
         */
        add_theme_support( 'align-wide' );

        add_theme_support( 'responsive-embeds' );

        add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'narrative_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function narrative_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'narrative_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'narrative_lite_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function narrative_lite_scripts() {

	$fonts_url = narrative_lite_font_url();
    if( $fonts_url ){
    	
    	require_once get_theme_file_path( 'assets/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'narrative-lite-google-fonts',
			wptt_get_webfont_url( $fonts_url ),
			array(),
			_S_VERSION
		);
    }

    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/magnific-popup.css');
    wp_enqueue_style( 'swiper-bundle', get_template_directory_uri() . '/assets/lib/swiper/css/swiper-bundle.min.css');
    if( class_exists('WooCommerce') ){

    	wp_enqueue_style( 'narrative-lite-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');
    }
	wp_enqueue_style( 'narrative-lite-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri() . '/assets/lib/magnific-popup/jquery.magnific-popup.min.js', array('jquery'), '', 1);
    wp_enqueue_script('theiaStickySidebar', get_template_directory_uri() . '/assets/lib/theiaStickySidebar/theia-sticky-sidebar.min.js', array('jquery'), '', 1);

    wp_enqueue_script( 'swiper-bundle', get_template_directory_uri() . '/assets/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
    wp_enqueue_script( 'narrative-lite-frontend', get_template_directory_uri() . '/assets/js/frontend.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $c_paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $narrative_lite_default = narrative_lite_get_default_theme_options();
    $narrative_lite_pagination_layout = get_theme_mod( 'narrative_lite_pagination_layout',$narrative_lite_default['narrative_lite_pagination_layout'] );
    
	wp_localize_script( 
        'narrative-lite-frontend',
        'narrative_lite_frontend',
        array(
            'paged'  => absint( $c_paged ),
	        'maxpage'   => absint( $max ),
	        'nextLink'   => next_posts( $max, false ),
	        'loadmore'   => esc_html__( 'Load More Posts', 'narrative-lite' ),
	        'nomore'     => esc_html__( 'No More Posts', 'narrative-lite' ),
	        'loading'    => esc_html__( 'Loading...', 'narrative-lite' ),
	        'pagination_layout'   => esc_html( $narrative_lite_pagination_layout ),
         )
    );

}
add_action( 'wp_enqueue_scripts', 'narrative_lite_scripts' );

/**
 * Admin enqueue script
 */
function narrative_lite_admin_scripts($hook){

	wp_enqueue_media();
    wp_enqueue_style('narrative-lite-admin', get_template_directory_uri() . '/assets/css/admin.css');
    wp_enqueue_script('narrative-lite-admin', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), '', 1);

    $ajax_nonce = wp_create_nonce('narrative_lite_ajax_nonce');

	wp_localize_script( 
        'narrative-lite-admin',
        'narrative_lite_admin',
        array(
            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
            'title'   =>  esc_html__('Choose Image','narrative-lite'),
            'label'   =>  esc_html__('Select','narrative-lite'),
            'ajax_nonce'   =>  $ajax_nonce,
            'active' => esc_html__('Active','narrative-lite'),
		    'deactivate' => esc_html__('Deactivate','narrative-lite'),
         )
    );

}

add_action('admin_enqueue_scripts', 'narrative_lite_admin_scripts');

require get_template_directory() . '/inc/customizer/default-options.php';
require get_template_directory() . '/inc/plugins.php';
require get_template_directory() . '/inc/about.php';
require get_template_directory() . '/inc/admin-notice.php';
require get_template_directory() . '/inc/term-meta.php';
require get_template_directory() . '/inc/functions.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/inc/fonts.php';
require get_template_directory() . '/inc/featured-category.php';
require get_template_directory() . '/inc/subscribe.php';
require get_template_directory() . '/inc/class-walker-page.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/class-svg-icons.php';
require get_template_directory() . '/inc/widget/widget.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/assets/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/assets/lib/tgmpa/recommended-plugins.php';
require get_template_directory() . '/assets/css/style.php';

if( class_exists('WooCommerce') ){
	require get_template_directory() . '/inc/woocommerce.php';
}
