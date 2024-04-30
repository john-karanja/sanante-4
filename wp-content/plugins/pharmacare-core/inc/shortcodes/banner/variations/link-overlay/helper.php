<?php

if ( ! function_exists( 'pharmacare_core_add_banner_variation_link_overlay' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_banner_variation_link_overlay( $variations ) {
		$variations['link-overlay'] = esc_html__( 'Link Overlay', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_banner_layouts', 'pharmacare_core_add_banner_variation_link_overlay' );
}
