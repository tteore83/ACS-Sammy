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
<div class="search-modal cover-modal header-footer-group" data-modal-target-string=".search-modal">
	<div class="search-modal-inner modal-inner">
		<div class="site-wrapper">
            <div class="site-row">
                <div class="site-column site-column-12">
                    <div class="wedevs-search-bar">
                    
                        <?php
                        get_search_form(
                            array(
                                'label' => __( 'Search for:', 'narrative-lite' ),
                            )
                        ); ?>

                        <button class="toggle search-untoggle close-search-toggle fill-children-current-color" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
                            <span class="screen-reader-text"><?php esc_html_e( 'Close search', 'narrative-lite' ); ?></span>
                            <?php narrative_lite_get_theme_svg( 'cross' ); ?>
                        </button><!-- .search-toggle -->

                    </div>
                </div>
            </div>
		</div>
	</div><!-- .search-modal-inner -->
</div><!-- .menu-modal -->
