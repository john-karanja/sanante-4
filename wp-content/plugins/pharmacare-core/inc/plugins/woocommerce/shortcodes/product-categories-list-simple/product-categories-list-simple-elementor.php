<?php

class PharmaCareCore_Product_Categories_List_Simple_Shortcode_Elementor extends PharmaCareCore_Elementor_Widget_Base {
	
	function __construct( array $data = [], $args = null ) {
		$this->set_shortcode_slug( 'pharmacare_core_product_categories_list_simple' );
		
		parent::__construct( $data, $args );
	}
}

if ( qode_framework_is_installed( 'woocommerce' ) ) {
	pharmacare_core_get_elementor_widgets_manager()->register_widget_type( new PharmaCareCore_Product_Categories_List_Simple_Shortcode_Elementor() );
}