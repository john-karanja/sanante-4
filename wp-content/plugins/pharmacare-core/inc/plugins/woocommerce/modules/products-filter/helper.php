<?php

if ( ! function_exists( 'pharmacare_core_add_product_filter_option' ) ) {
    /**
     * Loads HTML
     */
    function pharmacare_core_add_product_filter_option($list_tab) {

        $list_tab->add_field_element(
            array(
                'field_type'  => 'yesno',
                'name'        => 'qodef_woo_product_list_enable_products_filter',
                'title'       => esc_html__( 'Enable Products Filter', 'pharmacare-core' ),
                'default_value' => 'no'
            )
        );

	    $list_tab->add_field_element(
		    array(
			    'field_type'    => 'select',
			    'name'          => 'qodef_woo_product_list_filter_excerpt',
			    'title'         => esc_html__( 'Show product excerpt', 'pharmacare-core' ),
			    'description'   => esc_html__( 'Show product excerpt in list layout', 'pharmacare-core' ),
			    'options'       => pharmacare_core_get_select_type_options_pool( 'yes_no', false ),
			    'default_value' => 'no',
			    'dependency' => array(
				    'show' => array(
					    'qodef_woo_product_list_enable_products_filter' => array(
						    'values'        => 'yes',
						    'default_value' => '',
					    ),
				    ),
			    ),
		    )
	    );
    }

    add_action( 'pharmacare_core_action_after_woo_product_list_options_map', 'pharmacare_core_add_product_filter_option' );
}

if ( ! function_exists( 'pharmacare_core_get_products_filter_buttons' ) ) {
    /**
     * Loads HTML
     */
    function pharmacare_core_get_products_filter_buttons() {
        $filter_enabled = pharmacare_core_get_post_value_through_levels( 'qodef_woo_product_list_enable_products_filter' );

        if ( $filter_enabled === 'yes' ) {
            $parameters  = array();

            pharmacare_core_template_part( 'plugins/woocommerce/modules/products-filter', 'templates/products-filter-opener', '', $parameters );
        }
    }

    //Adds filter opener text HTML
    add_action( 'woocommerce_before_shop_loop', 'pharmacare_core_get_products_filter_buttons', 16 );
}

if (!function_exists('pharmacare_core_page_products_filter_class')) {
	/**
	 * Function that adds classes on body for quick shop
	 */
	function pharmacare_core_page_products_filter_class($classes) {
        $filter_enabled = pharmacare_core_get_post_value_through_levels( 'qodef_woo_product_list_enable_products_filter' );

		if ($filter_enabled === 'yes') {
			$classes[] = 'qodef-products-filter--yes';
		}

		return $classes;
	}

	add_filter('body_class', 'pharmacare_core_page_products_filter_class');
}
