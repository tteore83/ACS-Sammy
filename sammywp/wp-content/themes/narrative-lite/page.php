<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Narrative Lite
 */

get_header();
$content_column_class = narrative_lite_sidebar();
?>
    <div class="site-wrapper">
        <div class="site-row">
            <div id="primary"
                 class="content-area site-column site-column-sm-12 <?php echo esc_attr($content_column_class); ?>">
                <main id="main" class="site-main">

                    <?php
                    while (have_posts()) :
                        the_post();

                        get_template_part('template-parts/content', 'single');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer();
