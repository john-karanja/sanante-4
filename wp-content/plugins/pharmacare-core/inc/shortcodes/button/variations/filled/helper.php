<?php

if ( ! function_exists( 'pharmacare_core_add_button_variation_filled' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_button_variation_filled( $variations ) {
		$variations['filled'] = esc_html__( 'Filled', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_button_layouts', 'pharmacare_core_add_button_variation_filled' );
}
