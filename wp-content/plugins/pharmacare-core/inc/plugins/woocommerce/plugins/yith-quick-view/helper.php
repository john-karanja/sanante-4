<?php

if ( ! function_exists( 'pharmacare_core_include_yith_quick_view_plugin_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function pharmacare_core_include_yith_quick_view_plugin_is_installed( $installed, $plugin ) {
		if ( 'yith-quick-view' === $plugin ) {
			return defined( 'YITH_WCQV' );
		}
		
		return $installed;
	}
	
	add_filter( 'qode_framework_filter_is_plugin_installed', 'pharmacare_core_include_yith_quick_view_plugin_is_installed', 10, 2 );
}

if ( ! function_exists( 'pharmacare_core_get_yith_buttons_holder' ) ) {
    /**
     * Function that print module shortcode
     *
     * @return string that contains html content
     */
    function pharmacare_core_get_yith_buttons_holder() {
        if ( qode_framework_is_installed( 'yith-quick-view' ) ) {
            echo '<div class="qodef-woo-yith-buttons-inner">';
        }
    }
}

if ( ! function_exists( 'pharmacare_core_get_yith_buttons_holder_end' ) ) {
    /**
     * Function that print module shortcode
     *
     * @return string that contains html content
     */
    function pharmacare_core_get_yith_buttons_holder_end() {
        if ( qode_framework_is_installed( 'yith-quick-view' ) ) {
            echo '</div>';
        }
    }
}