<?php

if ( ! function_exists( 'pharmacare_core_add_product_category_options' ) ) {
	/**
	 * Function that add global taxonomy options for current module
	 */
	function pharmacare_core_add_product_category_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'product_cat' ),
				'type'  => 'taxonomy',
				'slug'  => 'product_cat',
			)
		);

		if ( $page ) {
            $page->add_field_element(
                array(
                    'field_type'  => 'image',
                    'name'        => 'qodef_product_category_list_simple_image_hover',
                    'title'       => esc_html__( 'Thumbnail Hover', 'pharmacare-core' ),
                    'description' => esc_html__( 'Hover image for the product list simple shortcode', 'pharmacare-core' ),
                )
            );
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_product_category_masonry_size',
					'title'       => esc_html__( 'Image Size', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose image size for list shortcode item if masonry layout > fixed image size is selected in product categories list shortcode', 'pharmacare-core' ),
					'options'     => pharmacare_core_get_select_type_options_pool( 'masonry_image_dimension' )
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_register_cpt_tax_fields', 'pharmacare_core_add_product_category_options' );
}