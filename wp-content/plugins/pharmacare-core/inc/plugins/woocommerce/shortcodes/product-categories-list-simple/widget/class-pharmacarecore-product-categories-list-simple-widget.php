<?php

if ( ! function_exists( 'pharmacare_core_add_product_categories_list_simple_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function pharmacare_core_add_product_categories_list_simple_widget( $widgets ) {
		$widgets[] = 'PharmaCareCore_Product_Categories_List_Simple_Widget';

		return $widgets;
	}

	add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_product_categories_list_simple_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class PharmaCareCore_Product_Categories_List_Simple_Widget extends QodeFrameworkWidget {

		public function map_widget() {
            $this->set_widget_option(
                array(
                    'field_type' => 'text',
                    'name'       => 'widget_title',
                    'title'      => esc_html__( 'Title', 'pharmacare-core' ),
                )
            );
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'pharmacare_core_product_categories_list_simple',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'pharmacare_core_product_categories_list_simple' );
				$this->set_name( esc_html__( 'PharmaCare WooCommerce Product Categories List Simple Widget', 'pharmacare-core' ) );
				$this->set_description( esc_html__( 'Add a product categories list simple element into widget areas', 'pharmacare-core' ) );
			}
		}

		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );

			echo do_shortcode( "[pharmacare_core_product_categories_list_simple $params]" ); // XSS OK
		}
	}
}
