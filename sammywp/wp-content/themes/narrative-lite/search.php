<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Narrative Lite
 */

get_header();
$content_column_class = narrative_lite_sidebar();

narrative_lite_search_banner();

?>
    <div class="site-wrapper">
        <div class="site-row">
            <div id="primary" class="content-area site-column site-column-sm-12 <?php echo esc_attr($content_column_class); ?>">
                <main id="main" class="site-main site-archive-main">

                    <?php if (have_posts()) : ?>

                        <?php
                        /* Start the Loop */
                        while (have_posts()) :
                            the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_type());

                        endwhile;

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>

                </main><!-- #main -->

                <?php do_action('narrative_lite_archive_pagination'); ?>

            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer();
