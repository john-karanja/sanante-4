<?php

if ( ! function_exists( 'pharmacare_core_add_icon_with_text_variation_before_title' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_icon_with_text_variation_before_title( $variations ) {
		$variations['before-title'] = esc_html__( 'Before Title', 'pharmacare-core' );
		
		return $variations;
	}
	
	add_filter( 'pharmacare_core_filter_icon_with_text_layouts', 'pharmacare_core_add_icon_with_text_variation_before_title' );
}
