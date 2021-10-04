<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Narrative Lite
 */

?>

</div><!-- #content -->

<?php
if( is_single() && 'post' === get_post_type() ){ ?>
    <div id="additional-content" class="site-additional-content">
        <?php narrative_lite_related_posts(); ?>
    </div>
<?php } ?>


<?php
/**
 * narrative_lite_subscribe - 10
 **/

do_action('narrative_lite_bottom_content');

?>
<footer id="site-footer" class="wedevs-site-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
    <button type="button" class="scroll-up">
        <span><?php narrative_lite_get_theme_svg('arrow-up'); ?></span>
        <small><?php esc_html_e( 'Scroll Up', 'narrative-lite' ); ?></small>
    </button>


        <?php

        if( is_active_sidebar('narrative-lite-footer-widget-1') ||
            is_active_sidebar('narrative-lite-footer-widget-2') ||
            is_active_sidebar('narrative-lite-footer-widget-3') ):

            $widgets = 0;
            if( is_active_sidebar('narrative-lite-footer-widget-1') ){
                $widgets++;
            }
            if( is_active_sidebar('narrative-lite-footer-widget-2') ){
                $widgets++;
            }
            if( is_active_sidebar('narrative-lite-footer-widget-3') ){
                $widgets++;
            }
            if( $widgets == '3' ){
                $widget_class = 'site-column-4';
            }elseif( $widgets == '2' ){
                $widget_class = 'site-column-6';
            }else{
                $widget_class = 'site-column-12';
            } ?>

            <div id="footer-widgetarea" class="site-footer-widgetarea">
                <div class="site-wrapper">
                    <div class="site-row">

                        <?php if( is_active_sidebar('narrative-lite-footer-widget-1') ): ?>
                            <div class="site-column <?php echo $widget_class; ?> site-column-sm-12">
                                <?php dynamic_sidebar('narrative-lite-footer-widget-1'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( is_active_sidebar('narrative-lite-footer-widget-2') ): ?>
                            <div class="site-column <?php echo $widget_class; ?> site-column-sm-12">
                                <?php dynamic_sidebar('narrative-lite-footer-widget-2'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if( is_active_sidebar('narrative-lite-footer-widget-3') ): ?>
                            <div class="site-column <?php echo $widget_class; ?> site-column-sm-12">
                                <?php dynamic_sidebar('narrative-lite-footer-widget-3'); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>

        <?php
        endif; ?>

    <div id="footer-copyrightarea" class="site-footer-copyrightarea">
        <div class="site-wrapper">
            <div class="site-row">
                <div class="site-column site-column-8">
                    <?php narrative_lite_footer_credit(); ?>
                </div>

                <?php
                $narrative_lite_default = narrative_lite_get_default_theme_options();
                $enable_social_link = get_theme_mod('enable_social_link', $narrative_lite_default['enable_social_link']);
                if ($enable_social_link) { ?>
                    <div class="site-column site-column-4">
                        <?php narrative_lite_social_icon(); ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

</footer><!-- #site-footer -->

<?php

get_template_part('template-parts/modal-menu');

get_template_part('template-parts/modal-search');

?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
