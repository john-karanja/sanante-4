<?php

if ( ! function_exists( 'pharmacare_core_fullscreen_menu_typography_options' ) ) {
	/**
	 * Function that add additional header menu layout global options
	 *
	 * @param object $page
	 */
	function pharmacare_core_fullscreen_menu_typography_options( $page ) {

		if ( $page ) {

			$typography_section = $page->add_section_element(
				array(
					'name'  => 'qodef_fullscreen_typography_section',
					'title' => esc_html__( 'Fullscreen Menu Typography', 'pharmacare-core' ),
				)
			);

			$first_level_typography_row = $typography_section->add_row_element(
				array(
					'name'  => 'qodef_first_level_typography_row',
					'title' => esc_html__( 'Menu First Level Typography', 'pharmacare-core' ),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_fullscreen_1st_lvl_color',
					'title'      => esc_html__( 'Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_fullscreen_1st_lvl_hover_color',
					'title'      => esc_html__( 'Hover Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_fullscreen_1st_lvl_active_color',
					'title'      => esc_html__( 'Active Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_fullscreen_1st_lvl_font_family',
					'title'      => esc_html__( 'Font Family', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_fullscreen_1st_lvl_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_fullscreen_1st_lvl_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_fullscreen_1st_lvl_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_fullscreen_1st_lvl_font_weight',
					'title'      => esc_html__( 'Font Weight', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_fullscreen_1st_lvl_text_transform',
					'title'      => esc_html__( 'Text Transform', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_fullscreen_1st_lvl_font_style',
					'title'      => esc_html__( 'Font Style', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row = $typography_section->add_row_element(
				array(
					'name'  => 'qodef_second_level_typography_row',
					'title' => esc_html__( 'Menu Second Level Typography', 'pharmacare-core' ),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_fullscreen_2nd_lvl_color',
					'title'      => esc_html__( 'Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_fullscreen_2nd_lvl_hover_color',
					'title'      => esc_html__( 'Hover Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_fullscreen_2nd_lvl_active_color',
					'title'      => esc_html__( 'Active Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_fullscreen_2nd_lvl_font_family',
					'title'      => esc_html__( 'Font Family', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_fullscreen_2nd_lvl_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_fullscreen_2nd_lvl_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_fullscreen_2nd_lvl_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_fullscreen_2nd_lvl_font_weight',
					'title'      => esc_html__( 'Font Weight', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_fullscreen_2nd_lvl_text_transform',
					'title'      => esc_html__( 'Text Transform', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_fullscreen_2nd_lvl_font_style',
					'title'      => esc_html__( 'Font Style', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_after_fullscreen_menu_options_map', 'pharmacare_core_fullscreen_menu_typography_options', 15 );
}
