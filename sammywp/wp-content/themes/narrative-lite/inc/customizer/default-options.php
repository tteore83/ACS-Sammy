<?php
/**
 * Default Values
 *
 * @package Narrative Lite
 */

if( !function_exists('narrative_lite_get_default_theme_options') ):

    /**
     * Get default theme options
     *
     * @return array Default theme options.
     * @since 1.0.0
     *
    */

    function narrative_lite_get_default_theme_options(){

        $narrative_lite_defaults = array();

        $narrative_lite_defaults['narrative_lite_social_icon_4'] = json_encode( array(
            array(
                'social_svg_icon'     => narrative_lite_get_theme_svg( 'facebook',true ),
                'social_link'     => '#',
                'label'     => esc_html__('Facebook','narrative-lite'),
            ),
            array(
                'social_svg_icon'     => narrative_lite_get_theme_svg( 'twitter',true ),
                'social_link'     => '#',
                'label'     => esc_html__('Twitter','narrative-lite'),
            ),
            array(
                'social_svg_icon'     => narrative_lite_get_theme_svg( 'instagram',true ),
                'social_link'     => '#',
                'label'     => esc_html__('Instagram','narrative-lite'),
            ),
        ) );

        $narrative_lite_defaults['header_text']                               = esc_html__('Hello World!','narrative-lite');
        $narrative_lite_defaults['header_button_label']                       = esc_html__('Learn more','narrative-lite');

        $narrative_lite_defaults['narrative_lite_pagination_layout']                  = 'numeric';
        $narrative_lite_defaults['global_sidebar_layout']             = 'right-sidebar';
        $narrative_lite_defaults['single_sidebar_layout']             = 'right-sidebar';
        $narrative_lite_defaults['archive_sidebar_layout']             = 'right-sidebar';
        $narrative_lite_defaults['enable_recommended_posts']             = 1;
        $narrative_lite_defaults['enable_facebook']                  = 1;
        $narrative_lite_defaults['enable_twitter']                   = 1;
        $narrative_lite_defaults['enable_pinterest']                 = 1;
        $narrative_lite_defaults['enable_linkedin']                  = 1;
        $narrative_lite_defaults['enable_email']                     = 1;
        $narrative_lite_defaults['enable_author_box']                = 1;
        $narrative_lite_defaults['logo_width']                       = '60';
        $narrative_lite_defaults['enable_single_related_post']       = 1;
        $narrative_lite_defaults['enable_subscribe']                 = 0;
        $narrative_lite_defaults['related_post_title']               = esc_html__('Related Posts','narrative-lite');
        $narrative_lite_defaults['subscribe_section_title']          = esc_html__('Newsletter Subscription Us','narrative-lite');
        $narrative_lite_defaults['subscribe_section_desc']           = esc_html__("Newsletter Subscription Us and we'll keep you updated with news and information",'narrative-lite');

        $narrative_lite_defaults['enable_header_search']             = 1;
        $narrative_lite_defaults['enable_social_link']               = 1;
        $narrative_lite_defaults['enable_popup_newsletter']          = 1;
        $narrative_lite_defaults['popup_newsletter_description']     = esc_html__("Newsletter Subscription Us and we'll keep you updated with news and information",'narrative-lite');
        $narrative_lite_defaults['popup_newsletter_title']             = esc_html__('Newsletter Subscription Us','narrative-lite');
        $narrative_lite_defaults['404_page_image']             = get_template_directory_uri() . '/assets/images/404-image.jpg';
        $narrative_lite_defaults['enable_404_recommended_posts'] = 1;
        $narrative_lite_defaults['ed_floating_next_previous_nav'] = 1;
        $narrative_lite_defaults['ed_popup_model_box'] = 0;
        $narrative_lite_defaults['ed_popup_model_box_home_only'] = 0;
        $narrative_lite_defaults['ed_popup_model_box_first_loading_only'] = 0;
        $narrative_lite_defaults['wedev_popup_title'] = esc_html__('Sign Up to Our Newsletter', 'narrative-lite');
        $narrative_lite_defaults['wedev_popup_desc'] = esc_html__('Get notified about exclusive offers every week!', 'narrative-lite');
        $narrative_lite_defaults['enable_404_recommended_posts_title'] = esc_html__('Recommended Posts', 'narrative-lite');
        $narrative_lite_defaults['archive_recommended_posts_title'] = esc_html__('More like this', 'narrative-lite');
        $narrative_lite_defaults['enable_header_banner'] = 1;
        $narrative_lite_defaults['enable_banner_excerpt'] = 0;
        $narrative_lite_defaults['enable_header_featured_category'] = 0;

        // Typography.
        $narrative_lite_defaults['wedev_tagline_font'] = 'Poppins';
        $narrative_lite_defaults['wedev_tagline_font_weight'] = '900';
        $narrative_lite_defaults['narrative_lite_tagline_font_size'] = '34';

        $narrative_lite_defaults['wedev_general_font'] = 'Roboto';
        $narrative_lite_defaults['wedev_general_font_weight'] = 'regular';
        $narrative_lite_defaults['narrative_lite_general_font_size'] = '18';

        $narrative_lite_defaults['wedev_heading_font'] = 'Poppins';
        $narrative_lite_defaults['wedev_heading_font_case'] = 'none';

        $narrative_lite_defaults['narrative_lite_h1_font_size'] = '54';
        $narrative_lite_defaults['narrative_lite_h2_font_size'] = '42';
        $narrative_lite_defaults['narrative_lite_h3_font_size'] = '34';
        $narrative_lite_defaults['narrative_lite_h4_font_size'] = '28';
        $narrative_lite_defaults['narrative_lite_h5_font_size'] = '24';
        $narrative_lite_defaults['narrative_lite_h6_font_size'] = '20';
        $narrative_lite_defaults['narrative_lite_h1_font_weight'] = '700';
        $narrative_lite_defaults['narrative_lite_h2_font_weight'] = '700';
        $narrative_lite_defaults['narrative_lite_h3_font_weight'] = '700';
        $narrative_lite_defaults['narrative_lite_h4_font_weight'] = '700';
        $narrative_lite_defaults['narrative_lite_h5_font_weight'] = '700';
        $narrative_lite_defaults['narrative_lite_h6_font_weight'] = '700';
        $narrative_lite_defaults['narrative_lite_tagline_font_case'] = 'none';

        $narrative_lite_defaults['home_section_order_6'] = array('cta-section','banner','featured-category','latest-posts' );

        $narrative_lite_defaults['enable_header_featured_category_column'] = 4;

        // Pass through filter.
        $narrative_lite_defaults = apply_filters('narrative_lite_filter_default_theme_options', $narrative_lite_defaults);

        return $narrative_lite_defaults;

    }

endif;
