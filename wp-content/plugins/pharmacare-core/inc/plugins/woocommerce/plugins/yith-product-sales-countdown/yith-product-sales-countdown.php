<?php

if ( ! class_exists( 'PharmaCareCoreWooCommerceYITHProductSaleCountdown' ) ) {
    class PharmaCareCoreWooCommerceYITHProductSaleCountdown {
        private static $instance;

        public function __construct() {

            if ( qode_framework_is_installed( 'yith-woocommerce-product-countdown' ) ) {
                // Init
                add_action( 'after_setup_theme', array( $this, 'init' ) );
            }
        }

        /**
         * @return PharmaCareCoreWooCommerceYITHProductSaleCountdown
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
            // Remove all instances of product countdown injected by plugin on product single, we will add it as function where we need it...
            remove_action( 'woocommerce_before_single_product', array( YITH_WC_Product_Countdown::get_instance(), 'check_show_ywpc_product' ), 5 );

            // Remove all instances of product countdown injected by plugin on shop archive, we will add it as function where we need it...
            remove_action( 'woocommerce_before_shop_loop_item', array( YITH_WC_Product_Countdown::get_instance(), 'check_show_ywpc_category' ) );
        }

        function change_templates_position() {
            // add yith countdown on product list shortcodes
            add_action( 'pharmacare_core_action_woo_yith_countdown_on_list', 'pharmacare_core_woo_get_yith_countdown_on_list' );

            // yitch countdown on product single
            add_action( 'woocommerce_single_product_summary', 'pharmacare_core_woo_get_yith_countdown_on_single', 4 ); // priority 4 is set because pharmacare_core_woo_template_single_title hook is set on 5

            // add yith countdown on default product list
            add_action( 'woocommerce_before_shop_loop_item', 'pharmacare_core_woo_get_yith_countdown_on_list', 29 );
        }

        function override_templates() {

        }
    }

    PharmaCareCoreWooCommerceYITHProductSaleCountdown::get_instance();
}