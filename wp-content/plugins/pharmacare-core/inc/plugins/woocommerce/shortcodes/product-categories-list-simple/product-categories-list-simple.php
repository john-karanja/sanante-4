<?php

if ( ! function_exists( 'pharmacare_core_add_product_categories_list_simple_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_product_categories_list_simple_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Product_Categories_List_Simple_Shortcode';

		return $shortcodes;
	}

	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_product_categories_list_simple_shortcode' );
}

if ( class_exists( 'PharmaCareCore_List_Shortcode' ) ) {
	class PharmaCareCore_Product_Categories_List_Simple_Shortcode extends PharmaCareCore_List_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'pharmacare_core_filter_product_categories_list_simple_layouts', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_PLUGINS_URL_PATH . '/woocommerce/shortcodes/product-categories-list-simple' );
			$this->set_base( 'pharmacare_core_product_categories_list_simple' );
			$this->set_name( esc_html__( 'Product Categories List Simple', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of product categories', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
				)
			);
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'padding',
				'title'      => esc_html__( 'Widget Padding', 'pharmacare-core' ),
                'description' => esc_html__( 'Insert padding in format: top right bottom left', 'pharmacare-core' )
			) );
            $this->set_option( array(
                'field_type' => 'text',
                'name'       => 'slugs',
                'title'      => esc_html__( 'Categories Slugs', 'pharmacare-core' ),
                'description' => esc_html__( 'Add category slugs separated with comma', 'cyberstore' )
            ) );
            $this->set_option( array(
                'field_type'    => 'select',
                'name'          => 'border',
                'title'         => esc_html__( 'Enable Border', 'pharmacare-core' ),
                'description'   => esc_html__( 'Add category slugs separated with comma', 'cyberstore' ),
                'options'       => pharmacare_core_get_select_type_options_pool( 'yes_no', false ),
                'default_value' => 'yes'
            ) );
		}

		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'pharmacare_core_product_categories_list_simple', $params );
			$html = str_replace( "\n", '', $html );

			return $html;
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
            $atts['styles']         = $this->get_styles( $atts );
			
			$atts['this_shortcode'] = $this;

			return pharmacare_core_get_template_part( 'plugins/woocommerce/shortcodes/product-categories-list-simple', 'templates/product-categories-list-simple', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-categories-list-simple';

			if ( ! empty( $atts['border'] ) && ( $atts['border'] === 'yes' )  ) {
                $holder_classes[] = 'qodef-border--enabled';
            }

            return implode( ' ', $holder_classes );
		}

        private function get_styles( $atts ) {
            $styles = array();

            if ( '' !== $atts['padding'] ) {
                $styles[] = 'padding: ' . $atts['padding'];
            }

            return $styles;
        }
	}
}