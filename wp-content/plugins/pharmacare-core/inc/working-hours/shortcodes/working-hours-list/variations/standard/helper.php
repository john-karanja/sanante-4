<?php

if ( ! function_exists( 'pharmacare_core_add_whl_variation_link_standard' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_whl_variation_link_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_whl_layouts', 'pharmacare_core_add_whl_variation_link_standard' );
}
