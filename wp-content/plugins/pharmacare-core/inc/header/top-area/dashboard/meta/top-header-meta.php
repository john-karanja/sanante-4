<?php
if ( ! function_exists( 'pharmacare_core_add_top_area_meta_options' ) ) {
	/**
	 * Function that add additional header layout meta box options
	 *
	 * @param object $page
	 */
	function pharmacare_core_add_top_area_meta_options( $page ) {
		$top_area_section = $page->add_section_element(
			array(
				'name'       => 'qodef_top_area_section',
				'title'      => esc_html__( 'Top Area', 'pharmacare-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => pharmacare_core_dependency_for_top_area_options(),
							'default_value' => '',
						),
					),
				),
			)
		);
		
		$top_area_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_message_header',
				'title'       => esc_html__( 'Top Area Message', 'pharmacare-core' ),
				'description' => esc_html__( 'Enable top area message', 'pharmacare-core' ),
				'options'     => pharmacare_core_get_select_type_options_pool( 'yes_no' ),
			)
		);
		
		$top_area_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header',
				'title'       => esc_html__( 'Top Area', 'pharmacare-core' ),
				'description' => esc_html__( 'Enable top area', 'pharmacare-core' ),
				'options'     => pharmacare_core_get_select_type_options_pool( 'yes_no' ),
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'pharmacare-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'pharmacare-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no',
						),
					),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'    => 'yesno',
				'name'          => 'qodef_top_area_header_in_grid',
				'title'         => esc_html__( 'Content in Grid', 'pharmacare-core' ),
				'description'   => esc_html__( 'Set content to be in grid', 'pharmacare-core' ),
				'default_value' => 'no',
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'pharmacare-core' ),
				'description' => esc_html__( 'Choose top area background color', 'pharmacare-core' ),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'pharmacare-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'pharmacare-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'pharmacare-core' ),
				),
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'pharmacare-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'pharmacare-core' ),
				),
			)
		);
	}

	add_action( 'pharmacare_core_action_after_page_header_meta_map', 'pharmacare_core_add_top_area_meta_options', 20 );
}
