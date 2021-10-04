<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Narrative Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head itemscope itemtype="https://schema.org/WebSite">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'narrative-lite' ); ?></a>


	<header id="masthead" class="site-header" itemscope itemtype="https://schema.org/WPHeader">
		<?php get_template_part( 'template-parts/header-component' ); ?>
	</header><!-- #masthead -->

    <?php
    if( !is_home() && !is_front_page() && !is_archive() && !is_search() ){
        if (have_posts()) :
            /* Start the Loop */
            while (have_posts()) :
                the_post();

                narrative_lite_single_banner();

            endwhile;
        endif;

    } ?>

    <div id="content" class="site-content" role="main">
    
    <?php
    if( !is_home() && !is_front_page() && !is_404() && !is_page() && !is_single() && !is_archive() && !is_search() ){
        echo '<div class="site-wrapper">';
        narrative_lite_breadcrumb();
        echo '</div>';
    } ?>