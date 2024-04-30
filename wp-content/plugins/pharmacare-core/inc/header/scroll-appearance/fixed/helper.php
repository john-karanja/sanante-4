<?php

if ( ! function_exists( 'pharmacare_core_add_fixed_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function pharmacare_core_add_fixed_header_option( $options ) {
		$options['fixed'] = esc_html__( 'Fixed', 'pharmacare-core' );

		return $options;
	}

	add_filter( 'pharmacare_core_filter_header_scroll_appearance_option', 'pharmacare_core_add_fixed_header_option' );
}
