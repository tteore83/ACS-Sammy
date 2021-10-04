<?php
/**
 * Featured Category Section.
 *
 * @package Narrative Lite
 */

if ( !function_exists('narrative_lite_featured_category') ) :

    function narrative_lite_featured_category(){

        $narrative_lite_default = narrative_lite_get_default_theme_options();
        $enable_header_featured_category = get_theme_mod( 'enable_header_featured_category', $narrative_lite_default['enable_header_featured_category'] );

        if( $enable_header_featured_category ){

            $enable_header_featured_category_column = get_theme_mod( 'enable_header_featured_category_column', $narrative_lite_default['enable_header_featured_category_column'] );
            if( $enable_header_featured_category_column == '2' ){
                $class_grid = 'site-column-6';
                $image_size = 'medium_large';
                $grid_size = 'data-bg-big';
            }elseif( $enable_header_featured_category_column == '3' ){
                $class_grid = 'site-column-4';
                $image_size = 'medium_large';
                $grid_size = 'data-bg-medium';
            }else{
                $class_grid = 'site-column-3';
                $image_size = 'medium';
                $grid_size = 'data-bg-small';
            }
         ?>

            <div class="wedevs-block wedevs-categories-block">
                <div class="site-wrapper">
                    <div class="site-row">
                        <?php
                        for( $i = 1; $i <= 7; $i++  ){

                            $featured_category = get_theme_mod('narrative_lite_header_featured_category_cat_'.$i);

                            if( $featured_category ){

                                $cat_obj = get_category_by_slug($featured_category);
                                $cat_name = isset( $cat_obj->name ) ? $cat_obj->name : '';
                                $cat_id = isset( $cat_obj->term_id ) ? $cat_obj->term_id : '';
                                $count = isset( $cat_obj->count ) ? $cat_obj->count : '';
                                $cat_link = get_category_link($cat_id);
                                $wedev_term_image = get_term_meta($cat_id, 'wedevs-term-featured-image', true);
                                $wedev_term_image = wp_get_attachment_image_url( $wedev_term_image,$image_size ); ?>
                                <div class="site-column <?php echo $class_grid; ?> site-column-sm-12">
                                    <div class="wedevs-featured-categories data-bg <?php echo $grid_size; ?>" <?php if ($wedev_term_image) { ?> data-background="<?php echo esc_url($wedev_term_image); ?>" <?php } ?>>
                                        <a href="<?php echo esc_url($cat_link); ?>">
                                            
                                            <span class="cat-title"><?php echo esc_html( $cat_name ); ?></span>

                                            <?php if( $count ){ ?>
                                                <span class="post-count"><?php echo esc_html( $count ).esc_html__(' Posts','narrative-lite'); ?></span>
                                            <?php } ?>

                                        </a>
                                        <div class="wedevs-categorie-overlay"></div>
                                    </div>
                                </div>

                            <?php } ?>

                            <?php 
                            if( $enable_header_featured_category_column == $i ){ break; }

                        } ?>
                    </div>
                </div>
            </div>

        <?php
        }

    }

endif;