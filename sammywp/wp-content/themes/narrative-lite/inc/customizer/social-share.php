<?php
/**
 * Social Share Settings.
 *
 * @package Narrative Lite
**/

$narrative_lite_default = narrative_lite_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'social_share',
	array(
	'title'      => esc_html__( 'Social Share Settings', 'narrative-lite' ),
	'capability' => 'edit_theme_options',
	'panel'      => 'narrative_lite_options',
	)
);

$wp_customize->add_setting('enable_facebook',
    array(
        'default' => $narrative_lite_default['enable_facebook'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_facebook',
    array(
        'label' => esc_html__('Enable Facebook', 'narrative-lite'),
        'section' => 'social_share',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('enable_twitter',
    array(
        'default' => $narrative_lite_default['enable_twitter'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_twitter',
    array(
        'label' => esc_html__('Enable Twitter', 'narrative-lite'),
        'section' => 'social_share',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('enable_pinterest',
    array(
        'default' => $narrative_lite_default['enable_pinterest'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_pinterest',
    array(
        'label' => esc_html__('Enable Pinterest', 'narrative-lite'),
        'section' => 'social_share',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('enable_linkedin',
    array(
        'default' => $narrative_lite_default['enable_linkedin'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_linkedin',
    array(
        'label' => esc_html__('Enable LinkedIn', 'narrative-lite'),
        'section' => 'social_share',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('enable_email',
    array(
        'default' => $narrative_lite_default['enable_email'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'narrative_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control('enable_email',
    array(
        'label' => esc_html__('Enable Email', 'narrative-lite'),
        'section' => 'social_share',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'narrative_lite_more_options_social_share',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Narrative_Lite_Premium_Notiece( 
        $wp_customize,
        'narrative_lite_more_options_social_share',
        array(
            'label'      => esc_html__( 'More Options Available On Premium Version.', 'narrative-lite' ),
            'settings' => 'narrative_lite_more_options_social_share',
            'section'       => 'social_share',
        )
    )
);
