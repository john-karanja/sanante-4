<?php

if ( ! function_exists( 'pharmacare_core_add_whl_variation_link_classic' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_whl_variation_link_classic( $variations ) {
		$variations['classic'] = esc_html__( 'Classic', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_whl_layouts', 'pharmacare_core_add_whl_variation_link_classic' );
}
