<?php

if ( ! function_exists( 'pharmacare_core_include_icons' ) ) {
	/**
	 * Function that includes icons
	 */
	function pharmacare_core_include_icons() {

		foreach ( glob( PHARMACARE_CORE_INC_PATH . '/icons/*/include.php' ) as $icon_pack ) {
			$is_disabled = pharmacare_core_performance_get_option_value( dirname( $icon_pack ), 'pharmacare_core_performance_icon_pack_' );

			if ( empty( $is_disabled ) ) {
				include_once $icon_pack;
			}
		}
	}

	add_action( 'qode_framework_action_before_icons_register', 'pharmacare_core_include_icons' );
}
