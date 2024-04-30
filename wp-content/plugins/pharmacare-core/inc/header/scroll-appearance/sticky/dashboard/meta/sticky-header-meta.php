<?php

if ( ! function_exists( 'pharmacare_core_add_sticky_header_meta_options' ) ) {
	/**
	 * Function that add additional meta box options for current module
	 *
	 * @param object $section
	 * @param array $custom_sidebars
	 */
	function pharmacare_core_add_sticky_header_meta_options( $section, $custom_sidebars ) {

		if ( $section ) {

			$sticky_section = $section->add_section_element(
				array(
					'name'       => 'qodef_sticky_header_section',
					'dependency' => array(
						'show' => array(
							'qodef_header_scroll_appearance' => array(
								'values'        => 'sticky',
								'default_value' => '',
							),
						),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_appearance',
					'title'       => esc_html__( 'Sticky Header Appearance', 'pharmacare-core' ),
					'description' => esc_html__( 'Select the appearance of sticky header when you scrolling the page', 'pharmacare-core' ),
					'options'     => array(
						''     => esc_html__( 'Default', 'pharmacare-core' ),
						'down' => esc_html__( 'Show Sticky on Scroll Down/Up', 'pharmacare-core' ),
						'up'   => esc_html__( 'Show Sticky on Scroll Up', 'pharmacare-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_skin',
					'title'       => esc_html__( 'Sticky Header Skin', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose a predefined sticky header style for header elements', 'pharmacare-core' ),
					'options'     => array(
						''      => esc_html__( 'Default', 'pharmacare-core' ),
						'none'  => esc_html__( 'None', 'pharmacare-core' ),
						'light' => esc_html__( 'Light', 'pharmacare-core' ),
						'dark'  => esc_html__( 'Dark', 'pharmacare-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_scroll_amount',
					'title'       => esc_html__( 'Sticky Scroll Amount', 'pharmacare-core' ),
					'description' => esc_html__( 'Enter scroll amount for sticky header to appear', 'pharmacare-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'pharmacare-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_sticky_header_side_padding',
					'title'       => esc_html__( 'Sticky Header Side Padding', 'pharmacare-core' ),
					'description' => esc_html__( 'Enter side padding for sticky header area', 'pharmacare-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px or %', 'pharmacare-core' ),
					),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_sticky_header_background_color',
					'title'       => esc_html__( 'Sticky Header Background Color', 'pharmacare-core' ),
					'description' => esc_html__( 'Enter sticky header background color', 'pharmacare-core' ),
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_custom_widget_area_one',
					'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area One', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area one', 'pharmacare-core' ),
					'options'     => $custom_sidebars,
				)
			);

			$sticky_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_sticky_header_custom_widget_area_two',
					'title'       => esc_html__( 'Choose Custom Sticky Header Widget Area Two', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header widget area two', 'pharmacare-core' ),
					'options'     => $custom_sidebars,
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_after_header_scroll_appearance_meta_options_map', 'pharmacare_core_add_sticky_header_meta_options', 10, 2 );
}

if ( ! function_exists( 'pharmacare_core_add_sticky_header_logo_meta_options' ) ) {
	/**
	 * Function that add additional header logo meta box options
	 *
	 * @param object $logo_tab
	 * @param array $header_logo_section
	 */
	function pharmacare_core_add_sticky_header_logo_meta_options( $logo_tab, $header_logo_section ) {

		if ( $header_logo_section ) {

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_sticky',
					'title'       => esc_html__( 'Logo - Sticky', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose sticky logo image', 'pharmacare-core' ),
					'multiple'    => 'no',
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_after_page_logo_meta_map', 'pharmacare_core_add_sticky_header_logo_meta_options', 10, 2 );
}
