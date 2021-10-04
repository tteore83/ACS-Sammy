<?php
/**
 * Narrative Lite Theme Customizer
 *
 * @package Narrative Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function narrative_lite_customize_register( $wp_customize ) {
	
	require get_template_directory().'/inc/customizer/active-callback.php';
	require get_template_directory().'/inc/customizer/custom-classes.php';
	require get_template_directory().'/inc/customizer/sanitize.php';
	require get_template_directory().'/inc/customizer/header.php';
	require get_template_directory().'/inc/customizer/typography.php';
	require get_template_directory().'/inc/customizer/social-icon.php';
	require get_template_directory().'/inc/customizer/social-share.php';
	require get_template_directory().'/inc/customizer/banner.php';
	require get_template_directory().'/inc/customizer/cat-section.php';
	require get_template_directory().'/inc/customizer/sidebar.php';
	require get_template_directory().'/inc/customizer/archive.php';
	require get_template_directory().'/inc/customizer/pagination.php';
	require get_template_directory().'/inc/customizer/single.php';
	require get_template_directory().'/inc/customizer/newsletter.php';
	require get_template_directory().'/inc/customizer/404.php';
	require get_template_directory().'/inc/customizer/footer.php';
	require get_template_directory().'/inc/customizer/home.php';
	
	$wp_customize->register_control_type( 'Narrative_Lite_Sortable_Control' );
	
	$wp_customize->get_section( 'colors' )->panel = 'narrative_lite_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','narrative-lite');
	$wp_customize->get_section( 'title_tagline' )->panel = 'narrative_lite_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'narrative_lite_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'narrative_lite_general_settings';
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'narrative_lite_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'narrative_lite_customize_partial_blogdescription',
			)
		);
	}

    $wp_customize->add_panel( 'narrative_lite_home',
        array(
            'title'      => esc_html__( 'Homepage Sections', 'narrative-lite' ),
            'priority'   => 150,
            'capability' => 'edit_theme_options',
        )
    );

	$wp_customize->add_panel( 'narrative_lite_options',
		array(
			'title'      => esc_html__( 'Theme Options', 'narrative-lite' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);


	$wp_customize->add_panel( 'narrative_lite_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'narrative-lite' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'narrative_lite_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'narrative-lite' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'Narrative_Lite_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Narrative_Lite_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Narrative Lite', 'narrative-lite' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'narrative-lite' ),
				'pro_url'  => esc_url('https://wedevstudios.com/theme/narrative-pro/'),
				'priority'  => 1,
			)
		)
	);


	$wp_customize->add_setting(
	    'narrative_lite_premium_notiece',
	    array(
	        'default'           => '',
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'sanitize_text_field'
	    )
	);
	$wp_customize->add_control(
	    new Narrative_Lite_Premium_Notiece_Control( 
	        $wp_customize,
	        'narrative_lite_premium_notiece',
	        array(
	            'label'      => esc_html__( 'Notice', 'narrative-lite' ),
	            'settings' => 'narrative_lite_premium_notiece',
	            'section'       => 'colors',
	        )
	    )
	);

}
add_action( 'customize_register', 'narrative_lite_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function narrative_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function narrative_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function narrative_lite_customize_preview_js() {
	wp_enqueue_script( 'narrative-lite-customizer-preview', get_template_directory_uri() . '/assets/js/customizer-preview.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'narrative_lite_customize_preview_js' );


if (!function_exists('narrative_lite_customizer_scripts')) :

    function narrative_lite_customizer_scripts(){

    	wp_enqueue_style( 'sifter', get_template_directory_uri() . '/assets/lib/sifter/sifter.min.css' );
    	wp_enqueue_style('narrative-lite-customizer', get_template_directory_uri() . '/assets/css/customizer.css');

    	wp_enqueue_script('sifter', get_template_directory_uri() . '/assets/lib/sifter/sifter.min.js', array('jquery'), '', 1);
    	wp_enqueue_script('narrative-lite-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('jquery','customize-controls', 'jquery-ui-core', 'jquery-ui-sortable'), '', 1);

    	wp_localize_script( 
	        'narrative-lite-customizer',
	        'narrative_lite_customizer',
	        array(
	            'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
	         )
	    );
    	
    }

endif;

add_action('customize_controls_enqueue_scripts', 'narrative_lite_customizer_scripts');
add_action('customize_controls_init', 'narrative_lite_customizer_scripts');