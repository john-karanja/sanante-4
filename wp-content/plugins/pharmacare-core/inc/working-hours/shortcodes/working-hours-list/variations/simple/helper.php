<?php

if ( ! function_exists( 'pharmacare_core_add_whl_variation_link_simple' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_whl_variation_link_simple( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_whl_layouts', 'pharmacare_core_add_whl_variation_link_simple' );
}
