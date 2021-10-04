<?php
if( !function_exists( 'narrative_lite_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function narrative_lite_sanitize_sidebar_option( $input ){

        $sidebar_option = narrative_lite_sidebar_options();
        if( array_key_exists( $input,$sidebar_option ) ){

            return $input;

        }

        return;

    }

endif;


if ( ! function_exists( 'narrative_lite_sanitize_reorder' ) ) :

    /**
     * Sanitize Reorder.
     */

    function narrative_lite_sanitize_reorder( $input = array() ) {

        if ( is_string( $input ) || is_numeric( $input ) ) {
            return array(
                sanitize_text_field( $input ),
            );
        }

        $new_value = array();

        foreach( $input as $child_value ){

            $new_value[] = sanitize_text_field( $child_value );
        
        }

        return $new_value;

    }

endif;


if ( ! function_exists( 'narrative_lite_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function narrative_lite_sanitize_checkbox( $narrative_lite_checked ) {

		return ( ( isset( $narrative_lite_checked ) && true === $narrative_lite_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'narrative_lite_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function narrative_lite_sanitize_select( $input, $settings ) {

        // Ensure input is a slug.
        $input = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $settings->manager->get_control( $settings->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $settings->default );

    }

endif;


if ( ! function_exists( 'narrative_lite_sanitize_social_icons' ) ) :
    
    /**
    * Social Icon Sanitize
    */
    function narrative_lite_sanitize_social_icons($input){
        $input_decoded = json_decode( $input, true );
        
        if(!empty($input_decoded)) {

            foreach ($input_decoded as $boxes => $box ){

                foreach ($box as $key => $value){

                    if($key == 'social_svg_icon' ){

                        $input_decoded[$boxes][$key] =  narrative_lite_svg_escape( $value );

                    }elseif( 'social_link' ){
                        $input_decoded[$boxes][$key] =  esc_url_raw( $value );
                    }else{

                        $input_decoded[$boxes][$key] = sanitize_text_field( $value );

                    }
                    
                }

            }
           
            return json_encode($input_decoded);

        }

        return $input;
    }
endif;

if ( ! function_exists( 'narrative_lite_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function narrative_lite_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

    }

endif;

if ( ! function_exists( 'narrative_lite_sanitize_dropdown_pages' ) ) :

    /**
     * Sanitize dropdown pages.
     *
     * @since 1.0.0
     *
     * @param int                  $page_id Page ID.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return int|string Page ID if the page is published; otherwise, the setting default.
     */
    function narrative_lite_sanitize_dropdown_pages( $page_id, $setting ) {

        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );

        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );

    }

endif;


if ( ! function_exists( 'narrative_lite_sanitize_positive_integer' ) ) :

    /**
     * Sanitize positive integer.
     *
     * @since 1.0.0
     *
     * @param int                  $input Number to sanitize.
     * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
     * @return int Sanitized number; otherwise, the setting default.
     */
    function narrative_lite_sanitize_positive_integer( $input, $setting ) {

        $input = absint( $input );

        // If the input is an absolute integer, return it.
        // otherwise, return the default.
        return ( $input ? $input : $setting->default );

    }

endif;