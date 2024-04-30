<?php

if ( ! function_exists( 'pharmacare_core_add_mobile_logo_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 * @param object $header_tab
	 */
	function pharmacare_core_add_mobile_logo_options( $page, $header_tab ) {

		if ( $page ) {

			$mobile_header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-mobile-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Mobile Header Logo Options', 'pharmacare-core' ),
					'description' => esc_html__( 'Set options for mobile headers', 'pharmacare-core' ),
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_height',
					'title'       => esc_html__( 'Mobile Logo Height', 'pharmacare-core' ),
					'description' => esc_html__( 'Enter mobile logo height', 'pharmacare-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'pharmacare-core' ),
					),
				)
			);

			$mobile_header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_mobile_logo_main',
					'title'         => esc_html__( 'Mobile Logo - Main', 'pharmacare-core' ),
					'description'   => esc_html__( 'Choose main mobile logo image', 'pharmacare-core' ),
					'default_value' => defined( 'PHARMACARE_ASSETS_ROOT' ) ? PHARMACARE_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'      => 'no',
				)
			);

			do_action( 'pharmacare_core_action_after_mobile_logo_options_map', $page );
		}
	}

	add_action( 'pharmacare_core_action_after_header_logo_options_map', 'pharmacare_core_add_mobile_logo_options', 10, 2 );
}
