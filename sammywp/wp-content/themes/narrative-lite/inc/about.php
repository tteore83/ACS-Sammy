<?php

/**
 * Narrative Lite About Page
 * @package Narrative Lite
 *
*/

if( !class_exists('Narrative_Lite_About_page') ):

	class Narrative_Lite_About_page{

		function __construct(){

			add_action('admin_menu', array($this, 'narrative_lite_backend_menu'),999);

		}

		// Add Backend Menu
        function narrative_lite_backend_menu(){

            add_theme_page(esc_html__( 'Narrative Lite Options','narrative-lite' ), esc_html__( 'Narrative Lite Options','narrative-lite' ), 'activate_plugins', 'narrative-lite-about', array($this, 'narrative_lite_main_page'));

        }

        // Settings Form
        function narrative_lite_main_page(){

            $base_url = home_url();

			$narrative_lite_panels_sections = array(

				'theme_general_settings' => array(

					'title' => esc_html__('General Settings','narrative-lite'),
					'sections' => array(

						array(
							'title' => esc_html__('Logo & Site Identity','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bcontrol%5D=custom_logo'),
							'icon'	=> 'dashicons-format-image',
						),
						array(
							'title' => esc_html__('Header Media','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=header_image'),
			                'icon'	=> 'dashicons-desktop',
						),
						array(
							'title' => esc_html__('Background Image','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=background_image'),
			                'icon'	=> 'dashicons-desktop',
						),
						array(
							'title' => esc_html__('Menu Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bpanel%5D=nav_menus'),
							'icon'	=> 'dashicons-menu',
						),

					),

				),

				'theme_theme_settings' => array(

					'title' => esc_html__('Theme Options','narrative-lite'),
					'sections' => array(

						array(
							'title' => esc_html__('Pagination Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=narrative_lite_pagination_section'),
							'icon'	=> 'dashicons-format-image',
						),
						array(
							'title' => esc_html__('Sidebar Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=sidebar_setting'),
			                'icon'	=> 'dashicons-desktop',
						),
						array(
							'title' => esc_html__('Header Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=header_setting'),
			                'icon'	=> 'dashicons-desktop',
						),
						array(
							'title' => esc_html__('Social Icon Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=social_icon'),
							'icon'	=> 'dashicons-menu',
						),
						array(
							'title' => esc_html__('Social Share Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=social_share'),
							'icon'	=> 'dashicons-menu',
						),
						array(
							'title' => esc_html__('Archive Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=archive_setting'),
							'icon'	=> 'dashicons-menu',
						),
						array(
							'title' => esc_html__('Single Post Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=single_post_setting'),
							'icon'	=> 'dashicons-menu',
						),
						array(
							'title' => esc_html__('Newsletter Subscription Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=subscribe_section'),
							'icon'	=> 'dashicons-menu',
						),
						array(
							'title' => esc_html__('404 Error Page Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=404_page_setting'),
							'icon'	=> 'dashicons-menu',
						),
						array(
							'title' => esc_html__('Footer Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=footer_settings'),
							'icon'	=> 'dashicons-menu',
						),

					),

				),

				'homepage_sections' => array(

					'title' => esc_html__('Homepage Sections','narrative-lite'),
					'sections' => array(

						array(
							'title' => esc_html__('Slider Banner Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=header_banner_setting'),
							'icon'	=> 'dashicons-format-image',
						),
						array(
							'title' => esc_html__('Featured Category Settings','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=header_featured_category_setting'),
			                'icon'	=> 'dashicons-desktop',
						),
						array(
							'title' => esc_html__('Section Reorder','narrative-lite'),
							'url'	=> esc_url( $base_url.'/wp-admin/customize.php?autofocus%5Bsection%5D=wedev_home_section_reorder'),
			                'icon'	=> 'dashicons-desktop',
						),

					),

				),

			);

			include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
			$rec_plugins = Narrative_Lite_Getting_started::narrative_lite_recommended_plugins();
			$theme_version = wp_get_theme()->get( 'Version' );
			?>
			<div class="wedev-about-main">

				<div class="about-page-header">
					<div class="about-wrapper">
			            <div class="about-wrapper-inner">
			                <div class="about-header-left">
			                    <h1 class="about-theme-title">
			                        <a href="<?php echo esc_url( 'https://www.wedevstudios.com/theme/narrative-lite' ); ?>">
			                            
			                            <?php
			                            $theme_info      = wp_get_theme();
            							$theme_name            = $theme_info->__get( 'Name' );
            							echo esc_html( $theme_name );
            							?>
			                            <span class="theme-version"><?php echo esc_html( $theme_version ); ?></span>
			                        </a>
			                    </h1>
			                </div>
			                <div class="about-header-right">
			                    <p><?php esc_html_e('Eye-catching, Lightweight, and Highly Customizable WordPress Theme','narrative-lite'); ?></p>
			                </div>
			            </div>
					</div>
				</div>

			    <div class="about-page-content">
				    <div class="about-wrapper">
			            <div class="about-wrapper-inner">

			                <div class="about-content-left">

			                    <?php
			                    foreach( $narrative_lite_panels_sections as $panels ){ ?>

			                        <div class="about-content-panel">

			                            <?php if( isset( $panels['title'] ) && $panels['title'] ){ ?>

			                                <h2 class="about-panel-title"><?php echo esc_html( $panels['title'] );  ?></h2>

			                            <?php } ?>
			                            <div class="about-panel-items about-panel-2-columns">
			                            <?php

			                            if( isset( $panels['sections'] ) && $panels['sections'] ){

			                                foreach( $panels['sections'] as $section ){ ?>


			                                    <div class="about-items-wrap">
			                                        <?php if( isset( $section['icon'] ) && $section['icon'] ){ ?>
			                                            <span class="about-items-icon dashicons <?php echo esc_attr( $section['icon'] ); ?>"></span>
			                                        <?php } ?>

			                                        <?php if( isset( $section['title'] ) && $section['title'] && isset( $section['url'] ) && $section['url'] ){ ?>
			                                            <span class="about-items-title">
			                                                <a href="<?php echo esc_url( $section['url'] ); ?>"><?php echo esc_html( $section['title'] ); ?></a>
			                                            </span>
			                                        <?php } ?>
			                                    </div>


			                            <?php }

			                            } ?>
			                            </div>
			                        </div>

			                    <?php } ?>

								<div class="about-content-panel">

									<h2 class="about-panel-title"><?php esc_html_e('Recommended Plugins','narrative-lite'); ?></h2>

									<div class="about-panel-items about-panel-1-columns">

										<?php foreach ($rec_plugins as $key => $plugin) {

				                            $plugin_info = plugins_api(
				                                'plugin_information',
				                                array(
				                                    'slug' => sanitize_key(wp_unslash($key)),
				                                    'fields' => array(
				                                        'sections' => false,
				                                    ),
				                                )
				                            );

				                            $plugin_status = Narrative_Lite_Getting_started::narrative_lite_plugin_status($plugin['class'], $key, $plugin['PluginFile']); ?>

				                            <div id="<?php echo 'narrative-lite-' . esc_attr($key); ?>" class="about-items-wrap">
			                                    <div class="theme-recommended-plugin <?php if ($plugin_status['status'] == 'active') { echo 'recommended-plugin-active'; } ?>">

			                                        <?php if (isset($plugin_info->name)) { ?>
			                                            <a href="javascript:void(0)"><?php echo esc_html($plugin_info->name); ?></a>
			                                        <?php } ?>

			                                        <?php if (isset($plugin_status['status']) && isset($plugin_status['string'])) { ?>

			                                            <a class="recommended-plugin-status <?php echo 'wedev-plugin-' . esc_attr($plugin_status['status']); ?>"
			                                               plugin-status="<?php echo esc_attr($plugin_status['status']); ?>"
			                                               plugin-file="<?php echo esc_attr($plugin['PluginFile']); ?>"
			                                               plugin-folder="<?php echo esc_attr($key); ?>"
			                                               plugin-slug="<?php echo esc_attr($key); ?>"
			                                               plugin-class="<?php echo esc_attr($plugin['class']); ?>"
			                                               href="javascript:void(0)"><?php echo esc_html($plugin_status['string']); ?></a>

			                                        <?php } ?>

			                                    </div>

				                            </div>

				                        <?php } ?>

									</div>

								</div>

			                </div>

			                <div class="about-content-right">

			                    <div class="about-content-panel">
			                        <h2 class="about-panel-title"><span class="dashicons dashicons-sos"></span> <?php esc_html_e('Looking for help?','narrative-lite'); ?></h2>
			                        <div class="about-content-info">
			                            <p><?php esc_html_e('We have some resources available to help you in the right direction.','narrative-lite'); ?></p>
			                            <ul>
			                                <li>
			                                    <a href="<?php echo esc_url( 'https://www.wedevstudios.com/help-center/' ); ?>" target="_blank" rel="noopener"><?php esc_html_e('Create a Ticket','narrative-lite'); ?> &#187;</a>
			                                </li>
			                                <li>
			                                    <a href="<?php echo esc_url( 'https://www.wedevstudios.com/knowledgebase/' ); ?>" target="_blank" rel="noopener"><?php esc_html_e('Knowledge Base','narrative-lite'); ?> &#187;</a>
			                                </li>
			                                <li>
			                                    <a href="<?php echo esc_url( 'https://documentation.wedevstudios.com/docs/narrative-wordpress-theme/' ); ?>" target="_blank" rel="noopener"><?php esc_html_e('Theme Documentation','narrative-lite'); ?> &#187;</a>
			                                </li>
			                            </ul>
			                            <p><?php esc_html_e('Behind every single customer support question stands a real person ready to fix the problem in real-time and guide you through.','narrative-lite'); ?></p>
			                        </div>
			                    </div>

			                </div>

			            </div>
			        </div>
			    </div>

			</div>

		<?php
        }

	}

	new Narrative_Lite_About_page();

endif;