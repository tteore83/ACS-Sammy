<?php
/**
 * Displays the menu icon and modal
 *
 * @package Narrative Lite
 * @since 1.0.0
 */

?>

<div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">
	<div class="menu-modal-inner modal-inner">
		<div class="menu-wrapper menu-skip-link">
			<div class="menu-top">
				<button class="toggle close-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
					<?php narrative_lite_get_theme_svg( 'cross' ); ?>
				</button><!-- .nav-toggle -->

				<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'narrative-lite' ); ?>" role="navigation">
					<ul class="modal-menu reset-list-style">

						<?php
						if( has_nav_menu('narrative-lite-primary-menu')){

							wp_nav_menu(
								array(
									'container'      => '',
									'items_wrap'     => '%3$s',
									'show_toggles'   => true,
									'theme_location' => 'narrative-lite-primary-menu',
								)
							);

						}else{

							wp_list_pages(
								array(
									'match_menu_classes' => true,
									'show_toggles'       => true,
									'title_li'           => false,
									'walker'             => new Narrative_Lite_Walker_Page(),
								)
							);

						} ?>

					</ul>
            
				</nav>
			</div>

			<div class="menu-bottom">

                <?php narrative_lite_footer_credit(); ?>
            </div>
		            
		</div>
	</div>
</div>
