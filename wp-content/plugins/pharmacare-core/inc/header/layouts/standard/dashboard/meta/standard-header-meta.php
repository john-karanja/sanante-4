<?php

if ( ! function_exists( 'pharmacare_core_add_standard_header_meta' ) ) {
	function pharmacare_core_add_standard_header_meta( $page ) {
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_standard_header_section',
				'title'      => esc_html__( 'Standard Header', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'standard',
							'default_value' => ''
						)
					)
				)
			)
		);

        $section->add_field_element(
            array(
                'field_type'    => 'select',
                'name'          => 'show_extended_dropdown',
                'title'         => esc_html__( 'Show Extended Dropdown', 'pharmacare-core' ),
                'options'     => pharmacare_core_get_select_type_options_pool( 'yes_no' )
            )
        );
        $section->add_field_element(
            array(
                'field_type'    => 'text',
                'name'          => 'extended_dropdown_opener_label',
                'default_value' => '',
                'title'         => esc_html__('Extended Dropdown Opener Label', 'pharmacare-core'),
                'description'   => esc_html__('Set Extended Dropdown Opener Label, or leave empty for default value.', 'pharmacare-core'),
            )
        );

        $section->add_field_element(
            array(
                'field_type'   => 'select',
                'name'          => 'extended_dropdown_always_opened',
                'default_value' => '',
                'title'         => esc_html__('Extended Dropdown - Always Opened', 'pharmacare-core'),
                'options'     => pharmacare_core_get_select_type_options_pool( 'yes_no' )
            )
        );

		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_standard_header_top_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'pharmacare-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'pharmacare-core' ),
				'default_value' => '',
				'options'       => pharmacare_core_get_select_type_options_pool( 'no_yes' ),
				'dependency'  => array(
					'show'    => array(
						'qodef_header_layout' => array(
							'values' => 'standard',
							'default_value' => ''
						)
					)
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_height',
				'title'       => esc_html__( 'Header Height', 'pharmacare-core' ),
				'description' => esc_html__( 'Enter header height', 'pharmacare-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'pharmacare-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_standard_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'pharmacare-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'pharmacare-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'pharmacare-core' )
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_standard_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'pharmacare-core' ),
				'description' => esc_html__( 'Enter header background color', 'pharmacare-core' )
			)
		);

	}
	
	add_action( 'pharmacare_core_action_after_page_header_meta_map', 'pharmacare_core_add_standard_header_meta' );
}