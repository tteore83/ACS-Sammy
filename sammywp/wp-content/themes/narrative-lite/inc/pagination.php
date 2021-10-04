<?php
/**
 *
 * Pagination Functions
 *
 * @package Narrative Lite
 */

if( !function_exists('narrative_lite_archive_pagination_x') ):

	// Archive Page Navigation
	function narrative_lite_archive_pagination_x(){

		// Global Query
	    if( is_front_page() ){

	    	$posts_per_page = absint( get_option('posts_per_page') );
	        $paged_c = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
	        $posts_args = array(
	            'posts_per_page'        => $posts_per_page,
	            'paged'                 => $paged_c,
	        );
	        $posts_qry = new WP_Query( $posts_args );
	        $max = $posts_qry->max_num_pages;

	    }else{
	        global $wp_query;
	        $max = $wp_query->max_num_pages;
	        $paged_c = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
	    }

		$narrative_lite_default = narrative_lite_get_default_theme_options();
		$narrative_lite_pagination_layout = esc_html( get_theme_mod( 'narrative_lite_pagination_layout',$narrative_lite_default['narrative_lite_pagination_layout'] ) );
		$narrative_lite_pagination_load_more = esc_html__('Load More Posts','narrative-lite');
		$narrative_lite_pagination_no_more_posts = esc_html__('No More Posts','narrative-lite');

		if( $narrative_lite_pagination_layout == 'next-prev' ){

			if( is_front_page() && is_page() ){

	            $paged_c = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
	            $latest_post_query = new WP_Query( array( 'post_type'=>'post', 'paged'=> $paged_c ) );

	            the_posts_navigation();

	        }else{

	            the_posts_navigation();

	        }

		}elseif( $narrative_lite_pagination_layout == 'load-more' || $narrative_lite_pagination_layout == 'auto-load' ){ ?>

			<div class="site-ajax-pagination">

				<div  style="display: none;" class="theme-loaded-content"></div>
				

				<?php if( $max > 1 ){ ?>

					<button class="wedevs-btn wedevs-btn-primary wedevs-loading-btn">
						<span style="display: none;" class="theme-loading-status"></span>
						<span class="loading-text"><?php echo esc_html( $narrative_lite_pagination_load_more ); ?></span>
					</button>

				<?php }else{ ?>

					<button class="wedevs-btn wedevs-btn-primary wedevs-loading-btn theme-no-posts">
						<span style="display: none;" class="theme-loading-status"></span>
						<span class="loading-text"><?php echo esc_html( $narrative_lite_pagination_load_more ); ?></span>
					</button>

				<?php } ?>

			</div>

		<?php }else{

			the_posts_pagination();

		}
			
	}

endif;
add_action('narrative_lite_archive_pagination','narrative_lite_archive_pagination_x',20);
