<?php

if ( ! function_exists( 'pharmacare_core_add_page_spinner_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function pharmacare_core_add_page_spinner_options( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_page_spinner',
					'title'         => esc_html__( 'Enable Page Spinner', 'pharmacare-core' ),
					'description'   => esc_html__( 'Enable Page Spinner Effect', 'pharmacare-core' ),
					'default_value' => 'no',
				)
			);

			$spinner_section = $page->add_section_element(
				array(
					'name'       => 'qodef_page_spinner_section',
					'title'      => esc_html__( 'Page Spinner Section', 'pharmacare-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_page_spinner' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_spinner_type',
					'title'         => esc_html__( 'Select Page Spinner Type', 'pharmacare-core' ),
					'description'   => esc_html__( 'Choose a page spinner animation style', 'pharmacare-core' ),
					'options'       => apply_filters( 'pharmacare_core_filter_page_spinner_layout_options', array() ),
					'default_value' => apply_filters( 'pharmacare_core_filter_page_spinner_default_layout_option', '' ),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_background_color',
					'title'       => esc_html__( 'Spinner Background Color', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose the spinner background color', 'pharmacare-core' ),
				)
			);

			$spinner_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_spinner_color',
					'title'       => esc_html__( 'Spinner Color', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose the spinner color', 'pharmacare-core' ),
				)
			);

            $spinner_section->add_field_element(
                array(
                    'field_type'    => 'text',
                    'name'          => 'qodef_page_spinner_text',
                    'title'         => esc_html__( 'Spinner Text', 'pharmacare-core' ),
                    'description'   => esc_html__( 'Enter spinner text', 'pharmacare-core' ),
                    'dependency'    => array(
                        'show' => array(
                            'qodef_page_spinner_type' => array(
                                'values'        => 'pharmacare',
                                'default_value' => ''
                            )
                        )
                    )
                )
            );

			$spinner_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_page_spinner_fade_out_animation',
					'title'         => esc_html__( 'Enable Fade Out Animation', 'pharmacare-core' ),
					'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'pharmacare-core' ),
					'default_value' => 'no',
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_after_general_options_map', 'pharmacare_core_add_page_spinner_options' );
}
