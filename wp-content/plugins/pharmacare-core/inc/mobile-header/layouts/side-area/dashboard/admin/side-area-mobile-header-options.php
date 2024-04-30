<?php

if ( ! function_exists( 'pharmacare_core_add_side_area_mobile_header_options' ) ) {
	/**
	 * Function that add additional header layout options
	 *
	 * @param object $page
	 * @param array $general_tab
	 */
	function pharmacare_core_add_side_area_mobile_header_options( $page, $general_tab ) {

		$section = $general_tab->add_section_element(
			array(
				'name'       => 'qodef_side_area_mobile_header_section',
				'title'      => esc_html__( 'Side Area Mobile Header', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_mobile_header_layout' => array(
							'values'        => 'side-area',
							'default_value' => '',
						),
					),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_side_area_mobile_header_height',
				'title'       => esc_html__( 'Header Height', 'pharmacare-core' ),
				'description' => esc_html__( 'Enter header height', 'pharmacare-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'pharmacare-core' ),
				),
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_side_area_mobile_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'pharmacare-core' ),
				'description' => esc_html__( 'Enter header background color', 'pharmacare-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'pharmacare-core' ),
				),
			)
		);
	}

	add_action( 'pharmacare_core_action_after_mobile_header_options_map', 'pharmacare_core_add_side_area_mobile_header_options', 10, 2 );
}
