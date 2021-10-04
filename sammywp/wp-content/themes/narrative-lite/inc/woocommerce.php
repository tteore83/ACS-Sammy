<?php
/**
 * Woocommerce Compatibility.
 *
 * @link https://woocommerce.com/
 *
 * @package Narrative Lite
 */

remove_action('wp_footer', 'woocommerce_demo_store', 10);
remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );

if ( ! function_exists( 'narrative_lite_woocommerce_support' ) ):

	/**
	 * Woocommerce support.
	 */
	function narrative_lite_woocommerce_support() {

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'woocommerce', array(
			'gallery_thumbnail_image_width' => 300,
		) );

	}

endif;

add_action( 'after_setup_theme', 'narrative_lite_woocommerce_support' );

if ( ! function_exists( 'narrative_lite_cart_link_fragment' ) ):

	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function narrative_lite_cart_link_fragment( $fragments ) {

		ob_start();
		narrative_lite_cart_link();
		$fragments['.cart-total-item'] = ob_get_clean();

		return $fragments;
	}

endif;

add_filter( 'woocommerce_add_to_cart_fragments', 'narrative_lite_cart_link_fragment' );

if ( ! function_exists( 'narrative_lite_cart_link' ) ):
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function narrative_lite_cart_link() { ?>

		<div <?php if( WC()->cart->get_cart_contents_count() <= 0 ){ ?>style="opacity: 0" <?php } ?> class="cart-total-item">
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'narrative-lite' ); ?>">
				<?php
				$item_count_text = sprintf(
					/* translators: number of items in the mini cart. */
					_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'narrative-lite' ),
					WC()->cart->get_cart_contents_count()
				);
				?>
				<span class="amount"><?php echo narrative_lite_cart_subtotal_escape( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
			</a>
			<span class="item-count"><?php echo absint( WC()->cart->get_cart_contents_count() ); ?></span>
		</div>
	<?php
	}
endif;

if ( ! function_exists( 'ecommerce_prime_woocommerce_header_cart()' ) ):
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function ecommerce_prime_woocommerce_header_cart() {
		
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		} ?>


		<div class="minicart-title-handle">
			<a href="javascript:void(0)" class="skip-minicart-start"></a>
            <button class="toggle minicart-toggle">
                <?php narrative_lite_get_theme_svg('cart'); ?>
            </button>
			<?php narrative_lite_cart_link() ?>
		</div>

        <div class="minicart-content">
            <div class="site-header-cart">
            	
                <div class="header-wedevs-minicart-content">
                    <?php
                    $instance = array(
                        'title' => '',
                    );

                    the_widget( 'WC_Widget_Cart', $instance );
                    ?>
                </div>
            </div>
            <a href="javascript:void(0)" class="skip-minicart-end"></a>
        </div>
	
	<?php
	}

endif;


if( ! function_exists('narrative_lite_scripts_woocommerce_gallery') ):

	// Product Gallery Support Home
	function narrative_lite_scripts_woocommerce_gallery(){

		if( version_compare( WC()->version, '3.0.0', '>=' ) ) {

	      	if( current_theme_supports('wc-product-gallery-zoom') ) {
		        wp_enqueue_script('zoom');
		    }

		    if( current_theme_supports('wc-product-gallery-lightbox') ) {

		        wp_enqueue_script('photoswipe-ui-default');
		        wp_enqueue_style('photoswipe-default-skin');

		        if( has_action('wp_footer', 'woocommerce_photoswipe') === FALSE ) {
		            add_action('wp_footer', 'woocommerce_photoswipe', 15);
		        }

		    }

	    	wp_enqueue_script('wc-single-product');

		}

	}

endif;

add_action('wp_enqueue_scripts', 'narrative_lite_scripts_woocommerce_gallery');
 

if ( ! function_exists( 'narrative_lite_cart_subtotal_escape' ) ) :
    
    /**
    * Sanitise Cart Subtotal
    */
    function narrative_lite_cart_subtotal_escape($input){

        $all_tags = array(
            'span'=>array(
                'class'=>array()
            )
         );
        return wp_kses($input,$all_tags);
        
    }

endif;
