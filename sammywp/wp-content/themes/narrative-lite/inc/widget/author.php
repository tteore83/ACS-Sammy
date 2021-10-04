<?php
/**
 * Author Widgets.
 *
 * @package Narrative Lite
 */

if ( !function_exists('narrative_lite_author_widgets') ) :

    function narrative_lite_author_widgets(){
        
        register_widget('Narrative_Lite_Sidebar_Author_Widget');

    }

endif;

add_action('widgets_init', 'narrative_lite_author_widgets');


if ( !class_exists('Narrative_Lite_Sidebar_Author_Widget') ) :

    // Recent Post widget Form & Display

    class Narrative_Lite_Sidebar_Author_Widget extends Narrative_Lite_Widget_Base{

        function __construct(){

            $opts = array(
                'classname' => 'narrative_lite_author_widget',
                'description' => esc_html__('Displays Author Details.', 'narrative-lite'),
                'customize_selective_refresh' => true,
            );
            
            $category_list = narrative_lite_post_category_list();

            $fields = array(
                'title' => array(
                    'label' => esc_html__('Author Name:', 'narrative-lite'),
                    'type' => 'text',
                    'class' => 'widefat',
                ),
                'author_image' => array(
                    'label' => esc_html__('Author Image:', 'narrative-lite'),
                    'type' => 'image',
                    'class' => 'widefat',
                ),
                'author_autograph' => array(
                    'label' => esc_html__('Signature Image', 'narrative-lite'),
                    'type' => 'image',
                    'class' => 'widefat',
                ),
                'description' => array(
                    'label' => esc_html__('Description:', 'narrative-lite'),
                    'type' => 'textarea',
                    'class' => 'widefat',
                ),
                'facebook_link' => array(
                    'label' => esc_html__('Facebook Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'twitter_link' => array(
                    'label' => esc_html__('Twitter Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'instagram_link' => array(
                    'label' => esc_html__('Instagram Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'pinterest_link' => array(
                    'label' => esc_html__('Pinterest Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'youtube_link' => array(
                    'label' => esc_html__('Youtube Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'linkedin_link' => array(
                    'label' => esc_html__('LinkedIn Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'vk_link' => array(
                    'label' => esc_html__('VK Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'reddit_link' => array(
                    'label' => esc_html__('Reddit Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
                'wordpress_link' => array(
                    'label' => esc_html__('WordPress Link:', 'narrative-lite'),
                    'type' => 'url',
                    'class' => 'widefat',
                ),
            );

            parent::__construct( 'narrative-lite-author', esc_html__('Devs: Sidebar Author Widget', 'narrative-lite'), $opts, array(), $fields );

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

                $title = isset( $params['title'] ) ? $params['title'] : '';
                $description = isset( $params['description'] ) ? $params['description'] : '';
                $facebook_link = isset( $params['facebook_link'] ) ? $params['facebook_link'] : '';
                $twitter_link = isset( $params['twitter_link'] ) ? $params['twitter_link'] : '';
                $instagram_link = isset( $params['instagram_link'] ) ? $params['instagram_link'] : '';
                $pinterest_link = isset( $params['pinterest_link'] ) ? $params['pinterest_link'] : '';
                $youtube_link = isset( $params['youtube_link'] ) ? $params['youtube_link'] : '';
                $linkedin_link = isset( $params['linkedin_link'] ) ? $params['linkedin_link'] : '';
                $vk_link = isset( $params['vk_link'] ) ? $params['vk_link'] : '';
                $wordpress_link = isset( $params['wordpress_link'] ) ? $params['wordpress_link'] : '';
                $reddit_link = isset( $params['reddit_link'] ) ? $params['reddit_link'] : '';
                $author_image = isset( $params['author_image'] ) ? $params['author_image'] : '';
                $author_autograph = isset( $params['author_autograph'] ) ? $params['author_autograph'] : '';
                ?>

                <div class="site-widget site-widget-author">

                    <?php if( $author_image ){ ?>
                        <div class="wedevs-author-image">
                            <?php
                            $image = wp_get_attachment_image( $author_image,'full' );
                            if( $image ){
                                echo wp_kses_post( $image );                                      
                            } ?>
                        </div>
                    <?php } ?>

                    <div class="wedevs-author-content">

                        <?php
                        if( $title ){ ?>
                        <div class="author-title">
                            <?php echo $args['before_title'] . esc_html( $title ) . $args['after_title']; ?>
                        </div>
                        <?php } ?>

                        <div class="wedevs-author-description">
                            <p><?php echo esc_html( $description ); ?></p>
                        </div>

                        <?php if( $author_autograph ){ ?>
                            <div class="wedevs-author-signature">
                                
                                <?php
                                $image = wp_get_attachment_image( $author_autograph,'full' );
                                if( $image ){
                                    echo wp_kses_post( $image );                                      
                                } ?>
                            
                            </div>
                        <?php } ?>

                        <div class="wedevs-author-social">

                            <ul class="author-social-icons">

                                <?php if( $facebook_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $facebook_link ); ?>"><?php narrative_lite_get_theme_svg('facebook'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if( $twitter_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $twitter_link ); ?>"><?php narrative_lite_get_theme_svg('twitter'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if( $instagram_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $instagram_link ); ?>"><?php narrative_lite_get_theme_svg('instagram'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if( $pinterest_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $pinterest_link ); ?>"><?php narrative_lite_get_theme_svg('pinterest'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if( $youtube_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $youtube_link ); ?>"><?php narrative_lite_get_theme_svg('youtube'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if( $linkedin_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $linkedin_link ); ?>"><?php narrative_lite_get_theme_svg('linkedin'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if( $vk_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $vk_link ); ?>"><?php narrative_lite_get_theme_svg('vk'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if( $reddit_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $reddit_link ); ?>"><?php narrative_lite_get_theme_svg('reddit'); ?></a>
                                    </li>
                                <?php } ?>

                                <?php if( $wordpress_link ){ ?>
                                    <li class="author-social-media">
                                        <a target="_blank" href="<?php echo esc_url( $wordpress_link ); ?>"><?php narrative_lite_get_theme_svg('wp'); ?></a>
                                    </li>
                                <?php } ?>

                            </ul>

                        </div>

                    </div>

                </div>
            
            <?php
            echo $args['after_widget'];
        }

    }

endif;