<?php
/**
 * Pagination Settings
 *
 * @package Narrative Lite
 */

$narrative_lite_default = narrative_lite_get_default_theme_options();

// Pagination Section.
$wp_customize->add_section( 'narrative_lite_pagination_section',
	array(
	'title'      => esc_html__( 'Pagination Settings', 'narrative-lite' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'		 => 'narrative_lite_options',
	)
);

// Pagination Layout Settings
$wp_customize->add_setting( 'narrative_lite_pagination_layout',
	array(
	'default'           => $narrative_lite_default['narrative_lite_pagination_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'narrative_lite_pagination_layout',
	array(
	'label'       => esc_html__( 'Pagination Method', 'narrative-lite' ),
	'section'     => 'narrative_lite_pagination_section',
	'type'        => 'select',
	'choices'     => array(
		'next-prev' => esc_html__('Next/Previous Method','narrative-lite'),
		'numeric' => esc_html__('Numeric Method','narrative-lite'),
		'load-more' => esc_html__('Ajax Load More Button','narrative-lite'),
		'auto-load' => esc_html__('Ajax Auto Load','narrative-lite'),
	),
	)
);