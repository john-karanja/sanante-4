<?php

if ( ! function_exists( 'pharmacare_core_add_button_variation_outlined' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_button_variation_outlined( $variations ) {
		$variations['outlined'] = esc_html__( 'Outlined', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_button_layouts', 'pharmacare_core_add_button_variation_outlined' );
}
