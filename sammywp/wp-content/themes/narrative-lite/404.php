<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Narrative Lite
 */

get_header();

$narrative_lite_default = narrative_lite_get_default_theme_options();
$content_column_class = narrative_lite_sidebar();
$category = get_theme_mod('enable_404_recommended_post_cat');
$page_image = get_theme_mod('404_page_image', $narrative_lite_default['404_page_image']);
$title_error = get_theme_mod('enable_404_recommended_posts_title', $narrative_lite_default['enable_404_recommended_posts_title']);
$enable_404_recommended_posts = get_theme_mod('enable_404_recommended_posts', $narrative_lite_default['enable_404_recommended_posts']);
?>
    <div class="wedevs-block wedevs-error-block">
        <div class="site-wrapper">
            <div class="site-row">
                <div id="primary" class="content-area site-column site-column-sm-12 <?php echo esc_attr($content_column_class); ?>">
                    <main id="main" class="site-main">

                        <div class="site-row">
                            <div class="site-column site-column-4 site-column-sm-12">
                                <?php
                                if ($page_image) { ?>
                                    <div class="error-thumb-image">
                                        <img src="<?php echo esc_url($page_image); ?>" alt="<?php esc_attr_e('404 Image', 'narrative-lite'); ?>" title="<?php esc_attr_e('404 Image', 'narrative-lite'); ?>">
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="site-column site-column-7 site-column-sm-12">

                                <div class="wedevs-error-header">
                                    <h1 class="entry-title entry-title-large" itemprop="headline">
                                        <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'narrative-lite'); ?>
                                    </h1>
                                </div>

                                <div class="page-content">
                                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'narrative-lite'); ?></p>
                                </div><!-- .page-content -->
                                <div class="widget widget_search">
                                    <?php get_search_form(); ?>
                                </div>

                                <a class="wedevs-btn wedevs-btn-primary" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html('Return to Home', 'narrative-lite'); ?></a>

                            </div>
                        </div>
                    </main><!-- #main -->
                </div>
            </div>
        </div>
    </div>
    <?php if ($enable_404_recommended_posts) {
        narrative_lite_related_posts($category, $title_error);
    } ?>
<?php
get_footer();
