<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Narrative Lite
 */

$content_column_class = narrative_lite_sidebar( $block = 'sidebar' );

if ( is_active_sidebar( 'sidebar-1' ) && $content_column_class ) { ?>

	<aside id="secondary" class="widget-area site-column site-column-sm-12 <?php echo esc_attr( $content_column_class ); ?>" itemscope itemtype="https://schema.org/WPSideBar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->

<?php } ?>