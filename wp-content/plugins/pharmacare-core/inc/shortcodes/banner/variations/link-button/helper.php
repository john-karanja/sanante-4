<?php

if ( ! function_exists( 'pharmacare_core_add_banner_variation_link_button' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_banner_variation_link_button( $variations ) {
		$variations['link-button'] = esc_html__( 'Link Button', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_banner_layouts', 'pharmacare_core_add_banner_variation_link_button' );
}
