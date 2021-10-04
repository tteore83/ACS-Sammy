<?php
/**
 * Term Meta
 *
 * @package Narrative Lite
 */

if( !function_exists('narrative_lite_custom_taxonomy_field') ):

	// Add term page
    function narrative_lite_custom_taxonomy_field(){

        // this will add the custom meta field to the add new term page
        ?>

        <div class="form-field">
            
            <label><?php esc_html_e('Feature Image', 'narrative-lite'); ?></label>

            <div class="wedevs-img-fields-wrap">
                <div class="attachment-media-view">
                    <div class="wedevs-img-fields-wrap">
                        <div class="wedevs-attachment-media-view">

                            <div class="wedevs-attachment-child wedevs-uploader">

                                <button type="button" class="wedevs-img-upload-button">
                                    <span class="dashicons dashicons-upload wedevs-icon wedevs-icon-large"></span>
                                </button>

                                <input class="upload-id" name="wedevs-term-featured-image" type="hidden"/>

                            </div>

                            <div class="wedevs-attachment-child wedevs-thumbnail-image">

                                <button type="button" class="wedevs-img-delete-button">
                                    <span class="dashicons dashicons-no-alt wedevs-icon"></span>
                                </button>

                                <div class="wedevs-img-container"></div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    
    <?php
    }

endif;

add_action('category_add_form_fields', 'narrative_lite_custom_taxonomy_field', 10, 2);


if( !function_exists('narrative_lite_taxonomy_edit_meta_field') ):

	// Edit term page
    function narrative_lite_taxonomy_edit_meta_field($term){

        $wedev_term_image = get_term_meta( $term->term_id, 'wedevs-term-featured-image', true ); ?>
        <tr>
            
            <th scope="row" valign="top"><label><?php esc_html_e('Feature Image', 'narrative-lite'); ?></label></th>

            <td>

                <div class="wedevs-img-fields-wrap">
                    <div class="attachment-media-view">
                        <div class="wedevs-img-fields-wrap">
                            <div class="wedevs-attachment-media-view">

                                <div class="wedevs-attachment-child wedevs-uploader">

                                    <button type="button" class="wedevs-img-upload-button">
                                        <span class="dashicons dashicons-upload wedevs-icon wedevs-icon-large"></span>
                                    </button>

                                    <input class="upload-id" name="wedevs-term-featured-image" type="hidden" value="<?php echo absint( $wedev_term_image ); ?>"/>

                                </div>

                                <div class="wedevs-attachment-child wedevs-thumbnail-image">

                                    <button type="button" class="wedevs-img-delete-button <?php if( $wedev_term_image ) { echo 'wedevs-img-show'; } ?>">
                                        <span class="dashicons dashicons-no-alt wedevs-icon"></span>
                                    </button>

                                    <div class="wedevs-img-container">

                                        <?php if( $wedev_term_image ){ ?>

                                            <?php
                                            $image = wp_get_attachment_image( $wedev_term_image,'medium' );
                                            if( $image ){
                                                echo wp_kses_post( $image );                                      
                                            } ?>

                                        <?php } ?>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </td>

        </tr>


        <?php
    }

endif;

add_action('category_edit_form_fields', 'narrative_lite_taxonomy_edit_meta_field', 10, 2);


if( !function_exists('save_taxonomy_color_class_meta') ):

	// Save extra taxonomy fields callback function.
    function save_taxonomy_color_class_meta( $term_id ){

        if( isset( $_POST['wedevs-term-featured-image'] ) ){

            update_term_meta(
                $term_id,
                'wedevs-term-featured-image',
                absint( wp_unslash( $_POST[ 'wedevs-term-featured-image' ] ) )
            );

        }

    }

endif;

add_action('edited_category', 'save_taxonomy_color_class_meta', 10, 2);
add_action('create_category', 'save_taxonomy_color_class_meta', 10, 2);