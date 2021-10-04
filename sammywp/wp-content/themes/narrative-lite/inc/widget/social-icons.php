<?php
/**
 * Social Icon Widgets.
 *
 * @package Narrative Lite
 */

if ( !function_exists('narrative_lite_social_icon_widgets') ) :

    function narrative_lite_social_icon_widgets(){
        
        register_widget('Narrative_Lite_Sidebar_Social_Icon_Widget');

    }

endif;

add_action('widgets_init', 'narrative_lite_social_icon_widgets');


if ( !class_exists('Narrative_Lite_Sidebar_Social_Icon_Widget') ) :

    // Recent Post widget Form & Display

    class Narrative_Lite_Sidebar_Social_Icon_Widget extends Narrative_Lite_Widget_Base{

        function __construct(){

            $opts = array(
                'classname' => 'narrative_lite_social_icon_widget',
                'description' => esc_html__('Display social icon. You can enable and manage settings from Customizer -> Theme Option.', 'narrative-lite'),
                'customize_selective_refresh' => true,
            );


            $fields = array(
                'display_style' => array(
                    'label' => esc_html__('Layout:', 'narrative-lite'),
                    'type' => 'select',
                    'default' => 'layout-1',
                    'options' => array(
                        'layout-1' => esc_html__('Layout One','narrative-lite'),
                        'layout-2' => esc_html__('Layout Two','narrative-lite'),
                    ),
                ),
            );

            parent::__construct( 'narrative-lite-social-icon', esc_html__('Devs: Social Icon Widget', 'narrative-lite'), $opts, array(), $fields );

        }

        /**
         * Outputs the content for the current widget instance.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments.
         * @param array $instance Settings for the current widget instance.
         */
        function widget( $args, $instance ){

            $params = $this->get_params( $instance );

            echo $args['before_widget'];

            $display_style = isset( $params['display_style'] ) ? $params['display_style'] : '';

            narrative_lite_social_icon( $display_style, $social_label = true );
            
            echo $args['after_widget'];
        }

    }

endif;