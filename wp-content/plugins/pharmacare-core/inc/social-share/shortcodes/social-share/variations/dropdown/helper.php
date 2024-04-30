<?php

if ( ! function_exists( 'pharmacare_core_add_social_share_variation_dropdown' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_social_share_variation_dropdown( $variations ) {
		$variations['dropdown'] = esc_html__( 'Dropdown', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_social_share_layouts', 'pharmacare_core_add_social_share_variation_dropdown' );
}
