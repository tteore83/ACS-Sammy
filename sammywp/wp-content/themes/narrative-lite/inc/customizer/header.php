<?php
/**
 * Single Post Settings.
 *
 * @package Narrative Lite
**/

$narrative_lite_default = narrative_lite_get_default_theme_options();
$google_fonts = narrative_lite_google_fonts();
$google_fonts_array = narrative_lite_font_array();
$wedev_tagline_font = get_theme_mod( 'wedev_tagline_font',$narrative_lite_default['wedev_tagline_font'] );
$wedev_tagline_font_key = array_search( $wedev_tagline_font, array_column( $google_fonts_array, 'family') );
$wedev_tagline_font_variants = $google_fonts_array[$wedev_tagline_font_key]['variants'];

// Layout Section.
$wp_customize->add_section( 'header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'narrative-lite' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'narrative_lite_options',
	)
);

$wp_customize->add_setting('enable_header_search',
    array(
        'default' => $narrative_lite_default['enable_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_header_search',
    array(
        'label' => esc_html__('Enable Search', 'narrative-lite'),
        'section' => 'header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('logo_width',
    array(
        'default' => $narrative_lite_default['logo_width'],
        'capability' => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('logo_width',
    array(
        'label' => esc_html__('Logo Width', 'narrative-lite'),
        'section' => 'title_tagline',
        'type' => 'number',
        'priority' => 50,
    )
);

$wp_customize->add_setting( 'wedev_tagline_font',
    array(
    'default'           => $narrative_lite_default['wedev_tagline_font'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'narrative_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'wedev_tagline_font',
    array(
    'label'       => esc_html__( 'Tagline Font', 'narrative-lite' ),
    'section'     => 'title_tagline',
    'type'        => 'select',
    'choices'     => $google_fonts,
    )
);

$wp_customize->add_setting( 'wedev_tagline_font_weight',
    array(
    'default'           => $narrative_lite_default['wedev_tagline_font_weight'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'narrative_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'wedev_tagline_font_weight',
    array(
    'label'       => esc_html__( 'Tagline Font Weight', 'narrative-lite' ),
    'section'     => 'title_tagline',
    'type'        => 'select',
    'choices'     => $wedev_tagline_font_variants,
    )
);

$wp_customize->add_setting(
    'narrative_lite_tagline_font_size',
    array(
        'default'           => $narrative_lite_default['narrative_lite_tagline_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);
$wp_customize->add_control(
    new Narrative_Lite_Range_Slider( 
        $wp_customize,
        'narrative_lite_tagline_font_size',
        array(
            'label'      => esc_html__( 'Tagline Font Size', 'narrative-lite' ),
            'settings' => 'narrative_lite_tagline_font_size',
            'section'       => 'title_tagline',
            'min'        => '1',
            'max'        => '100',
        )
    )
);

$wp_customize->add_setting( 'narrative_lite_tagline_font_case',
    array(
        'default'           => $narrative_lite_default['narrative_lite_tagline_font_case'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'narrative_lite_tagline_font_case',
    array(
    'label'       => esc_html__( 'Tagline Case', 'narrative-lite' ),
    'section'     => 'title_tagline',
    'type'        => 'select',
    'choices'               => array(
        'none'      => esc_html__( 'Normal', 'narrative-lite' ),
        'uppercase' => esc_html__( 'Uppercase', 'narrative-lite' ),
        'lowercase' => esc_html__( 'Lowercase', 'narrative-lite' ),
        ),
    )
);

$wp_customize->add_setting(
    'narrative_lite_premium_notiece_header',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Narrative_Lite_Premium_Notiece_Control( 
        $wp_customize,
        'narrative_lite_premium_notiece_header',
        array(
            'label'      => esc_html__( 'Notice', 'narrative-lite' ),
            'settings' => 'narrative_lite_premium_notiece_header',
            'section'       => 'header_setting',
        )
    )
);