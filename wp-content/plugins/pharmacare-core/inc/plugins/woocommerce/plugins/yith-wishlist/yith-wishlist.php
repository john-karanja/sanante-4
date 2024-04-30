<?php

if ( ! class_exists( 'PharmaCareCoreWooCommerceYITHWishlist' ) ) {
	class PharmaCareCoreWooCommerceYITHWishlist {
		private static $instance;
		
		public function __construct() {
			
			if ( qode_framework_is_installed( 'yith-wishlist' ) ) {
				// Init
				add_action( 'after_setup_theme', array( $this, 'init' ) );
			}
		}

		/**
		 * @return PharmaCareCoreWooCommerceYITHWishlist
		 */
		public static function get_instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		function init() {
			// Unset default templates modules
			$this->unset_templates_modules();
			
			// Change default templates position
			$this->change_templates_position();

            // Prevent YITH responsive list rendering
            add_filter( 'yith_wcwl_is_wishlist_responsive', array ( $this, 'is_responsive' ) );
		}
		
		function unset_templates_modules() {
			// Remove quick view button from wishlist
			remove_all_actions( 'yith_wcwl_table_after_product_name' );
		}
		
		function change_templates_position() {
			// Add button element for shop pages
			add_action( 'woocommerce_after_shop_loop_item', 'pharmacare_core_get_yith_wishlist_shortcode', 18 );

            // Add button element for product list info below
			add_action( 'pharmacare_core_action_product_list_item_additional_content', 'pharmacare_core_get_yith_wishlist_shortcode', 30 );

            //Add Wishlist to quick view modal
            //add_action( 'yith_wcqv_product_summary', 'pharmacare_core_get_yith_wishlist_shortcode', 35 );

            /* check plugin button position option */
            $position = get_option( 'yith_wcwl_button_position', 'add-to-cart' );

            if ( $position == 'shortcode' ) {
                add_action( 'woocommerce_after_add_to_cart_form', 'pharmacare_core_get_yith_wishlist_shortcode', 10 );
            }
		}

        function is_responsive() {
		    // Prevent from using wp_is_mobile and rendering responsive list instead of regular cart table
            return false;
        }
	}
	
	PharmaCareCoreWooCommerceYITHWishlist::get_instance();
}
