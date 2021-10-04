<?php
/**
* Sidebar Metabox.
*
* @package Narrative Lite
*/
 
add_action( 'add_meta_boxes', 'narrative_lite_metabox' );

if( ! function_exists( 'narrative_lite_metabox' ) ):


    function  narrative_lite_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Sidebar Settings', 'narrative-lite' ),
            'narrative_lite_post_metafield_callback',
            'post', 
            'side', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Sidebar Settings', 'narrative-lite' ),
            'narrative_lite_post_metafield_callback',
            'page',
            'side', 
            'high'
        ); 
    }

endif;

$narrative_lite_post_sidebar_fields =  narrative_lite_sidebar_options();


/**
 * Callback function for post option.
*/
if( ! function_exists( 'narrative_lite_post_metafield_callback' ) ):
    
    function narrative_lite_post_metafield_callback() {
        global $post, $narrative_lite_post_sidebar_fields;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'narrative_lite_post_meta_nonce' ); ?>
        
        <div class="wedevs-meta-wrap">
            <?php
            $narrative_lite_post_sidebar = esc_html( get_post_meta( $post->ID, 'narrative_lite_post_sidebar_option', true ) ); 
            if( $narrative_lite_post_sidebar == '' ){ $narrative_lite_post_sidebar = 'right-sidebar'; }

            foreach ( $narrative_lite_post_sidebar_fields as $key => $narrative_lite_post_sidebar_field) { ?>

                <div class="components-panel__row">
                    <div class="components-base-control__field">
                        <div class="components-base-control">
                        
                            <span class="components-checkbox-control__input-container">
                                <input type="radio" name="narrative_lite_post_sidebar_option" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $narrative_lite_post_sidebar ){ echo "checked='checked'";} if( empty( $narrative_lite_post_sidebar ) && $key =='right-sidebar' ){ echo "checked='checked'"; } ?>/>
                            </span>

                            <label class="components-checkbox-control__label">
                                <?php echo esc_html( $narrative_lite_post_sidebar_field); ?>
                            </label>

                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>

    <?php
    }
endif;

// Save metabox value.
add_action( 'save_post', 'narrative_lite_save_post_meta' );

if( ! function_exists( 'narrative_lite_save_post_meta' ) ):

    function narrative_lite_save_post_meta( $post_id ) {

        global $post;

        if ( !isset( $_POST[ 'narrative_lite_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['narrative_lite_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){
            return;
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
            return;
        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  
            if ( !current_user_can( 'edit_page', $post_id ) ){  
                return $post_id;
            }
        }elseif( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }

        $narrative_lite_post_sidebar_option_old = esc_html( get_post_meta( $post_id, 'narrative_lite_post_sidebar_option', true ) ); 
        $narrative_lite_post_sidebar_option_new = isset( $_POST['narrative_lite_post_sidebar_option'] ) ? narrative_lite_sanitize_sidebar_option_meta( wp_unslash( $_POST['narrative_lite_post_sidebar_option'] ) ) : '';

        if ( $narrative_lite_post_sidebar_option_new && $narrative_lite_post_sidebar_option_new != $narrative_lite_post_sidebar_option_old ){
            update_post_meta ( $post_id, 'narrative_lite_post_sidebar_option', $narrative_lite_post_sidebar_option_new );
        }elseif( '' == $narrative_lite_post_sidebar_option_new && $narrative_lite_post_sidebar_option_old ) {
            delete_post_meta( $post_id,'narrative_lite_post_sidebar_option', $narrative_lite_post_sidebar_option_old );
        }
        
    }

endif;   