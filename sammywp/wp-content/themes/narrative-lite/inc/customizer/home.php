<?php
/**
 * Section Reorder
 *
 * @package Narrative Lite
**/

$narrative_lite_default = narrative_lite_get_default_theme_options();

// Section Reorder
$wp_customize->add_section( 'wedev_home_section_reorder',
	array(
	'title'      => esc_html__( 'Section Reorder', 'narrative-lite' ),
	'capability' => 'edit_theme_options',
	'panel'		 => 'narrative_lite_home',
	)
);


$wp_customize->add_setting(
	'home_section_order_6', 
	array(
		'default' => $narrative_lite_default['home_section_order_6'],
		'sanitize_callback' => 'narrative_lite_sanitize_reorder',
	)
);

$wp_customize->add_control(
	new Narrative_Lite_Sortable_Control(
		$wp_customize,
		'home_section_order_6',
		array(
			'section'     => 'wedev_home_section_reorder',
			'label'       => __( 'Home Section Re-Order', 'narrative-lite' ),
			'choices'     => array(
                'cta-section'   => __( 'Call To Action Section', 'narrative-lite' ),
                'banner'   => __( 'Slide Banner Section', 'narrative-lite' ),
        		'featured-category'  => __( 'Featured Category', 'narrative-lite' ),
        		'latest-posts'   => __( 'Latest Posts', 'narrative-lite' ),
        	),
		)
	)
);