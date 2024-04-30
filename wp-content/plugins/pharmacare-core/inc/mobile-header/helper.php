<?php

if ( ! function_exists( 'pharmacare_core_dependency_for_mobile_menu_typography_options' ) ) {
	/**
	 * Function that set dependency values for module global options
	 *
	 * @return array
	 */
	function pharmacare_core_dependency_for_mobile_menu_typography_options() {
		return apply_filters( 'pharmacare_core_filter_mobile_menu_typography_hide_option', array() );
	}
}
