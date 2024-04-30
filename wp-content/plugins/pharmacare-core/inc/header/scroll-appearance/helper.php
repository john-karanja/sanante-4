<?php

if ( ! function_exists( 'pharmacare_core_dependency_for_scroll_appearance_options' ) ) {
	/**
	 * Function which return dependency values for global module options
	 *
	 * @return array
	 */
	function pharmacare_core_dependency_for_scroll_appearance_options() {
		return apply_filters( 'pharmacare_core_filter_header_scroll_appearance_hide_option', $hide_dep_options = array() );
	}
}
