<?php

if ( ! function_exists( 'pharmacare_core_add_image_with_text_variation_text_comment' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_image_with_text_variation_text_comment( $variations ) {
		$variations['text-comment'] = esc_html__( 'Text Comment', 'pharmacare-core' );
		
		return $variations;
	}
	
	add_filter( 'pharmacare_core_filter_image_with_text_layouts', 'pharmacare_core_add_image_with_text_variation_text_comment' );
}
