<?php
/**
* Header Banner Options.
*
* @package Narrative Lite
*/

$narrative_lite_default = narrative_lite_get_default_theme_options();
$narrative_lite_post_category_list = narrative_lite_post_category_list();

$wp_customize->add_section( 'header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Banner Settings', 'narrative-lite' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'narrative_lite_home',
    )
);

$wp_customize->add_setting('enable_header_banner',
    array(
        'default' => $narrative_lite_default['enable_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_header_banner',
    array(
        'label' => esc_html__('Enable Slider Banner', 'narrative-lite'),
        'section' => 'header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'narrative_lite_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'narrative_lite_sanitize_select',
    )
);
$wp_customize->add_control( 'narrative_lite_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'narrative-lite' ),
    'section'     => 'header_banner_setting',
    'type'        => 'select',
    'choices'     => $narrative_lite_post_category_list,
    )
);


$wp_customize->add_setting('enable_banner_excerpt',
    array(
        'default' => $narrative_lite_default['enable_banner_excerpt'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_banner_excerpt',
    array(
        'label' => esc_html__('Enable Banner Excerpt', 'narrative-lite'),
        'section' => 'header_banner_setting',
        'type' => 'checkbox',
    )
);
