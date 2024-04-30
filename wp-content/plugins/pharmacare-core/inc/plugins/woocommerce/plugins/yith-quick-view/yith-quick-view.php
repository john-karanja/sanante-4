<?php

if ( ! class_exists( 'PharmaCareCoreWooCommerceYITHQuickView' ) ) {
	class PharmaCareCoreWooCommerceYITHQuickView {
		private static $instance;
		
		public function __construct() {
			
			if ( qode_framework_is_installed( 'yith-quick-view' ) ) {
				// Init
				add_action( 'after_setup_theme', array( $this, 'init' ) );
			}
		}

		/**
		 * @return PharmaCareCoreWooCommerceYITHQuickView
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
			
			// Override default templates
			$this->override_templates();
		}
		
		function unset_templates_modules() {
			// Remove button element on shop pages
			remove_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
			// new hook
			remove_action( 'init', array( YITH_WCQV_Frontend(), 'add_button' ) );

			// remove quick view modal rating
			remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 10 );
		}
		
		function change_templates_position() {
			// Add button element for shop pages
			add_action( 'woocommerce_after_shop_loop_item', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 18 );

			// add quick view modal rating
			add_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_rating', 4 );

            // default shop list buttons wrapper
            add_action( 'woocommerce_after_shop_loop_item', 'pharmacare_core_get_yith_buttons_holder', 17 );
            add_action( 'woocommerce_after_shop_loop_item', 'pharmacare_core_get_yith_buttons_holder_end', 19 );

            // product list sc info below buttons wrapper
            add_action( 'pharmacare_core_action_product_list_item_additional_content', 'pharmacare_core_get_yith_buttons_holder', 29 );
            add_action( 'pharmacare_core_action_product_list_item_additional_content', 'pharmacare_core_get_yith_buttons_holder_end', 31 );

            // product list sc info below
            add_action( 'pharmacare_core_action_product_list_item_additional_content', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 30 );
         
		}
		
		function override_templates() {
		
		}
	}
	
	PharmaCareCoreWooCommerceYITHQuickView::get_instance();
}
