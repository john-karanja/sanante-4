<?php

if ( ! function_exists( 'pharmacare_core_add_blog_list_variation_minimal' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_blog_list_variation_minimal( $variations ) {
		$variations['minimal'] = esc_html__( 'Minimal', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_blog_list_layouts', 'pharmacare_core_add_blog_list_variation_minimal' );
}
