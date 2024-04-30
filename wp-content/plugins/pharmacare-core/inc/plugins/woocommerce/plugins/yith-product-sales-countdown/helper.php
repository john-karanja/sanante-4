<?php

if ( ! function_exists( 'pharmacare_core_include_yith_product_sales_countdown_installed' ) ) {
    /**
     * Function that set case is installed element for framework functionality
     *
     * @param bool $installed
     * @param string $plugin - plugin name
     *
     * @return bool
     */
    function pharmacare_core_include_yith_product_sales_countdown_installed( $installed, $plugin ) {
        if ( 'yith-woocommerce-product-countdown' === $plugin ) {
            return defined( 'YWPC_INIT' );
        }

        return $installed;
    }

    add_filter( 'qode_framework_filter_is_plugin_installed', 'pharmacare_core_include_yith_product_sales_countdown_installed', 10, 2 );
}

if ( ! function_exists( 'pharmacare_core_woo_get_yith_countdown_on_list' ) ) {
    /**
     * Function that add countdown on list
     */
    function pharmacare_core_woo_get_yith_countdown_on_list() {
        if ( qode_framework_is_installed( 'yith-woocommerce-product-countdown' ) ) {
            echo YITH_WPC()->add_ywpc_category();
        }
    }
}

if ( ! function_exists( 'pharmacare_core_woo_get_yith_countdown_on_single' ) ) {
    /**
     * Function that add countdown on single
     */
    function pharmacare_core_woo_get_yith_countdown_on_single() {
        if ( qode_framework_is_installed( 'yith-woocommerce-product-countdown' ) ) {
            echo YITH_WPC()->add_ywpc_product();
        }
    }
}