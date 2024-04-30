<?php

if ( ! function_exists( 'pharmacare_core_add_single_image_variation_default' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_single_image_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_single_image_layouts', 'pharmacare_core_add_single_image_variation_default' );
}
