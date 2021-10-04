<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Narrative Lite
 */

?>

<div class="wedevs-post-wrapper">
    
    <article id="article-post-<?php the_ID(); ?>" <?php post_class('wedevs-post wedevs-article-post'); ?> itemscope itemtype="https://schema.org/Blog">

        <div class="entry-thumbnail entry-thumbnail-effect">
            
            <?php narrative_lite_post_thumbnail(); ?>

            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <?php
                    narrative_lite_posted_on();
                    ?>
                </div>
            <?php endif; ?>
            
        </div>

        <div class="entry-details">
            <div class="site-row">
                <div class="site-column site-column-3 site-column-sm-12">
                    <?php if ('post' === get_post_type()) : ?>

                        <div class="entry-meta">
                            <?php narrative_lite_posted_by($c_title = true, $image = true); ?>
                        </div>
                        <div class="entry-meta">
                            <?php narrative_lite_entry_tag(); ?>
                        </div>

                    <?php endif; ?>
                </div>
                <div class="site-column site-column-9 site-column-sm-12">

                    <header class="entry-header">

                        <?php if ('post' === get_post_type()) : ?>

                            <div class="entry-meta">
                                <?php narrative_lite_entry_cat(); ?>
                            </div>

                        <?php endif;

                        if (is_singular()) :
                            the_title('<h1 class="entry-title entry-title-large" itemprop="headline">', '</h1>');
                        else :
                            the_title('<h2 class="entry-title entry-title-big" itemprop="headline"><a itemprop="url" href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                        endif; ?>

                    </header><!-- .entry-header -->

                    <div class="entry-content" itemprop="text">

                        <?php
                        if (has_excerpt()) {

                            the_excerpt();

                        } else {

                            echo '<p>';
                            echo esc_html(wp_trim_words(get_the_content(), 25, '...'));
                            echo '</p>';

                        }
                        ?>


                        <?php if (!is_singular()) : ?>
                            <div class="wedevs-continue-reading">
                                <a href="<?php the_permalink(); ?>" class="wedevs-btn wedevs-btn-primary">
                                    <?php esc_html_e('Continue Reading', 'narrative-lite'); ?>
                                    <span class="wedevs-btn-icon"><?php narrative_lite_get_theme_svg('chevron-right'); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>

                    </div><!-- .entry-content -->

                    <div class="entry-footer">

                        <div class="entry-footer-left">

                            <?php
                            if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {

                                $comment_count = get_comments_number(get_the_ID());
                                $comment_url = get_comments_link(get_the_ID());
                                ?>

                                <div class="comment-link">
                                    <a href="<?php echo esc_url($comment_url); ?>">
                                        <span><?php narrative_lite_get_theme_svg('comment'); ?></span>
                                        <span><?php echo absint($comment_count) . esc_html__(' Comments', 'narrative-lite'); ?></span>
                                    </a>
                                </div>

                            <?php } ?>

                        </div>

                        <div class="entry-footer-right">
                            <div class="wedevs-social-share">
                                <?php narrative_lite_social_share(); ?>
                            </div>
                        </div>
                    </div><!-- .entry-footer -->

                </div>
            </div>
        </div>
        

    </article><!-- #post-<?php the_ID(); ?> -->
    
    <?php if (!is_search()) {
        narrative_lite_archive_recommended_posts();
    } ?>
    

</div>