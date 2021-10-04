<?php
/**
 * Social Icon Settings.
 *
 * @package Narrative Lite
**/

$narrative_lite_default = narrative_lite_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'social_icon',
    array(
    'title'      => esc_html__( 'Social Icon Settings', 'narrative-lite' ),
    'capability' => 'edit_theme_options',
    'panel'      => 'narrative_lite_options',
    )
);

$wp_customize->add_setting('enable_social_link',
    array(
        'default' => $narrative_lite_default['enable_social_link'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_social_link',
    array(
        'label' => esc_html__('Enable Social Link', 'narrative-lite'),
        'section' => 'social_icon',
        'type' => 'checkbox',
    )
);

// Social Icons
$wp_customize->add_setting( 'narrative_lite_social_icon_4', array(
    'sanitize_callback' => 'narrative_lite_sanitize_social_icons',
    'default' => $narrative_lite_default['narrative_lite_social_icon_4'],
    'sanitize_callback' => 'narrative_lite_sanitize_social_icons',
));

$wp_customize->add_control(  new Narrative_Lite_Social_Icon_Controler( $wp_customize, 'narrative_lite_social_icon_4',
    array(
        'section' => 'social_icon',
        'settings' => 'narrative_lite_social_icon_4',
        'narrative_lite_box_label' => esc_html__('Social Profile','narrative-lite'),
        'narrative_lite_box_add_control' => esc_html__('Add New Social Link','narrative-lite'),
    ),
    array(
        'social_svg_icon' => array(
            'type'        => 'icons',
            'label'       => esc_html__( 'SVG Icons', 'narrative-lite' ),
            'class'     => 'ta-fa-icons-rep'
        ),
        'social_link' => array(
            'type'        => 'link',
            'label'       => esc_html__( 'Social Links', 'narrative-lite' ),
        ),
        'label' => array(
            'type'        => 'text',
            'label'       => esc_html__( 'Social Icon Label', 'narrative-lite' ),
        ),
    )
));