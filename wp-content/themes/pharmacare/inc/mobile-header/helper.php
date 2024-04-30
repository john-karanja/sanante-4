<?php

if ( ! function_exists( 'pharmacare_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function pharmacare_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'pharmacare_filter_mobile_header_template', pharmacare_get_template_part( 'mobile-header', 'templates/mobile-header' ) );
	}

	add_action( 'pharmacare_action_page_header_template', 'pharmacare_load_page_mobile_header' );
}

if ( ! function_exists( 'pharmacare_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function pharmacare_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'pharmacare_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'pharmacare' ) ) );

		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}

	add_action( 'pharmacare_action_after_include_modules', 'pharmacare_register_mobile_navigation_menus' );
}
