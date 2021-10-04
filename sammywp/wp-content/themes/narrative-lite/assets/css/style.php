<?php
/**
 * Narrative Lite Dynamic Styles
 *
 * @package Narrative Lite
 */


function narrative_lite_dynamic_css_generate( $wedev_font_weight = false, $class = '' ){

    if( $wedev_font_weight ){

        $generated_css = '';
        if( $wedev_font_weight == 'regular' ){
            $wedev_font_weight = '400';
        }
        if( $wedev_font_weight != 'italic' && strpos($wedev_font_weight, 'italic') !== false) {

            $wedev_font_weight_exp = explode( 'italic',$wedev_font_weight);
            
            $font_weight = isset( $wedev_font_weight_exp[0] ) ? $wedev_font_weight_exp[0] : '';
            $font_style = isset( $wedev_font_weight_exp[1] ) ? $wedev_font_weight_exp[1] : '';
            if( $font_weight ){
                $generated_css .= "{$class}{font-weight: {$font_weight};}";
                $generated_css .= "{$class}{font-style: italic;}";
            }
        }else{

            if( $wedev_font_weight == 'italic'){
                $generated_css .= "{$class}{font-style: {$wedev_font_weight};}";    
            }else{
                $generated_css .= "{$class}{font-weight: {$wedev_font_weight};}";
            }
        }

        return $generated_css;

    }

    return false;

}

function narrative_lite_dynamic_css(){

    $dynamic_css = "";
    $narrative_lite_default = narrative_lite_get_default_theme_options();
    $logo_width = esc_attr(get_theme_mod('logo_width', $narrative_lite_default['logo_width']));
    $wedev_tagline_font = esc_attr(get_theme_mod('wedev_tagline_font', $narrative_lite_default['wedev_tagline_font']));
    $wedev_tagline_font_weight = esc_attr(get_theme_mod('wedev_tagline_font_weight', $narrative_lite_default['wedev_tagline_font_weight']));
    if( $wedev_tagline_font_weight ){
        $dynamic_css .= narrative_lite_dynamic_css_generate( $wedev_tagline_font_weight, '.site-branding .site-title' );
    }

    $narrative_lite_tagline_font_size = esc_attr(get_theme_mod('narrative_lite_tagline_font_size', $narrative_lite_default['narrative_lite_tagline_font_size']));
    $narrative_lite_tagline_font_case = esc_attr(get_theme_mod('narrative_lite_tagline_font_case', $narrative_lite_default['narrative_lite_tagline_font_case']));

    $wedev_general_font = esc_attr(get_theme_mod('wedev_general_font', $narrative_lite_default['wedev_general_font']));
    $wedev_general_font_weight = esc_attr(get_theme_mod('wedev_general_font_weight', $narrative_lite_default['wedev_general_font_weight']));
    if( $wedev_general_font_weight ){
        $dynamic_css .= narrative_lite_dynamic_css_generate( $wedev_general_font_weight, 'body, button, input, select, optgroup, textarea' );
    }

    $wedev_heading_font = esc_attr(get_theme_mod('wedev_heading_font', $narrative_lite_default['wedev_heading_font']));

    $wedev_heading_font_case = esc_attr(get_theme_mod('wedev_heading_font_case', $narrative_lite_default['wedev_heading_font_case']));

    $narrative_lite_general_font_size = absint(get_theme_mod('narrative_lite_general_font_size', $narrative_lite_default['narrative_lite_general_font_size']));
    $narrative_lite_h1_font_size = absint(get_theme_mod('narrative_lite_h1_font_size', $narrative_lite_default['narrative_lite_h1_font_size']));
    $narrative_lite_h2_font_size = absint(get_theme_mod('narrative_lite_h2_font_size', $narrative_lite_default['narrative_lite_h2_font_size']));
    $narrative_lite_h3_font_size = absint(get_theme_mod('narrative_lite_h3_font_size', $narrative_lite_default['narrative_lite_h3_font_size']));
    $narrative_lite_h4_font_size = absint(get_theme_mod('narrative_lite_h4_font_size', $narrative_lite_default['narrative_lite_h4_font_size']));
    $narrative_lite_h5_font_size = absint(get_theme_mod('narrative_lite_h5_font_size', $narrative_lite_default['narrative_lite_h5_font_size']));
    $narrative_lite_h6_font_size = absint(get_theme_mod('narrative_lite_h6_font_size', $narrative_lite_default['narrative_lite_h6_font_size']));

    $narrative_lite_h1_font_weight = esc_attr(get_theme_mod('narrative_lite_h1_font_weight', $narrative_lite_default['narrative_lite_h1_font_weight']));
    if( $narrative_lite_h1_font_weight ){
        $dynamic_css .= narrative_lite_dynamic_css_generate( $narrative_lite_h1_font_weight, '.h1,.entry-title-large' );
    }

    $narrative_lite_h2_font_weight = esc_attr(get_theme_mod('narrative_lite_h2_font_weight', $narrative_lite_default['narrative_lite_h2_font_weight']));
    if( $narrative_lite_h2_font_weight ){
        $dynamic_css .= narrative_lite_dynamic_css_generate( $narrative_lite_h2_font_weight, '.h2,.entry-title-big' );
    }

    $narrative_lite_h3_font_weight = esc_attr(get_theme_mod('narrative_lite_h3_font_weight', $narrative_lite_default['narrative_lite_h3_font_weight']));
    if( $narrative_lite_h3_font_weight ){
        $dynamic_css .= narrative_lite_dynamic_css_generate( $narrative_lite_h3_font_weight, '.h3,.entry-title-medium' );
    }

    $narrative_lite_h4_font_weight = esc_attr(get_theme_mod('narrative_lite_h4_font_weight', $narrative_lite_default['narrative_lite_h4_font_weight']));
    if( $narrative_lite_h4_font_weight ){
        $dynamic_css .= narrative_lite_dynamic_css_generate( $narrative_lite_h4_font_weight, '.h4,h4' );
    }

    $narrative_lite_h5_font_weight = esc_attr(get_theme_mod('narrative_lite_h5_font_weight', $narrative_lite_default['narrative_lite_h5_font_weight']));
    if( $narrative_lite_h4_font_weight ){
        $dynamic_css .= narrative_lite_dynamic_css_generate( $narrative_lite_h4_font_weight, '.h4,h4' );
    }

    $narrative_lite_h6_font_weight = esc_attr(get_theme_mod('narrative_lite_h6_font_weight', $narrative_lite_default['narrative_lite_h6_font_weight']));
    if( $narrative_lite_h6_font_weight ){
        $dynamic_css .= narrative_lite_dynamic_css_generate( $narrative_lite_h6_font_weight, '.h6,h6' );
    }


    $dynamic_css .= " 
.site-logo img{width: {$logo_width}px;}
.site-branding .site-title{font-family: {$wedev_tagline_font};}
.site-branding .site-title{font-size: {$narrative_lite_tagline_font_size}px;}
.site-branding .site-title{text-transform: {$narrative_lite_tagline_font_case};}
:root {
 --primary-font-family: {$wedev_general_font};
 --secondary-font-family: {$wedev_heading_font};
}

body, button, input, select, optgroup, textarea{font-size: {$narrative_lite_general_font_size}px;}
        
h1,h2,h3,h4,h5,h6{text-transform: {$wedev_heading_font_case};}
                              
                
h1,.entry-title-large{font-size:{$narrative_lite_h1_font_size}px;}
h2,.entry-title-big{font-size:{$narrative_lite_h2_font_size}px;}
h3,.entry-title-medium{font-size: {$narrative_lite_h3_font_size}px;}
h4{font-size:{$narrative_lite_h4_font_size}px;}
h5{font-size:{$narrative_lite_h5_font_size}px;}
h6,.entry-title-small{font-size:{$narrative_lite_h6_font_size}px;}

        ";

    wp_add_inline_style('narrative-lite-style', $dynamic_css);
}

add_action('wp_enqueue_scripts', 'narrative_lite_dynamic_css'); ?>