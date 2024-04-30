<?php

if ( ! function_exists( 'pharmacare_core_add_h4_typography_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function pharmacare_core_add_h4_typography_options( $page ) {

		if ( $page ) {
			$h4_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-h4',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'H4 Typography', 'pharmacare-core' ),
					'description' => esc_html__( 'Set values for Heading 4 HTML element', 'pharmacare-core' ),
				)
			);

			$h4_typography_section = $h4_tab->add_section_element(
				array(
					'name'  => 'qodef_h4_typography_section',
					'title' => esc_html__( 'General Typography', 'pharmacare-core' ),
				)
			);

			$h4_typography_row = $h4_typography_section->add_row_element(
				array(
					'name' => 'qodef_h4_typography_row',
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_h4_color',
					'title'      => esc_html__( 'Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_h4_font_family',
					'title'      => esc_html__( 'Font Family', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h4_font_weight',
					'title'      => esc_html__( 'Font Weight', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h4_text_transform',
					'title'      => esc_html__( 'Text Transform', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_h4_font_style',
					'title'      => esc_html__( 'Font Style', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_margin_top',
					'title'      => esc_html__( 'Margin Top', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$h4_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_margin_bottom',
					'title'      => esc_html__( 'Margin Bottom', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			/* 1366 styles */
			$h4_1366_typography_section = $h4_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1366_typography_h4',
					'title' => esc_html__( 'Responsive 1366 Typography', 'pharmacare-core' ),
				)
			);

			$responsive_1366_typography_h4_row = $h4_1366_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1366_h4_typography_row',
				)
			);

			$responsive_1366_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_1366_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1366_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_1366_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1366_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_1366_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 1024 styles */
			$h4_1024_typography_section = $h4_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_1024_typography_h4',
					'title' => esc_html__( 'Responsive 1024 Typography', 'pharmacare-core' ),
				)
			);

			$responsive_1024_typography_h4_row = $h4_1024_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_1024_h4_typography_row',
				)
			);

			$responsive_1024_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_1024_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_1024_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_1024_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_1024_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 768 styles */
			$h4_768_typography_section = $h4_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_768_typography_h4',
					'title' => esc_html__( 'Responsive 768 Typography', 'pharmacare-core' ),
				)
			);

			$responsive_768_typography_h4_row = $h4_768_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_768_h4_typography_row',
				)
			);

			$responsive_768_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_768_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_768_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_768_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_768_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_768_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			/* 680 styles */
			$h4_680_typography_section = $h4_tab->add_section_element(
				array(
					'name'  => 'qodef_responsive_680_typography_h4',
					'title' => esc_html__( 'Responsive 680 Typography', 'pharmacare-core' ),
				)
			);

			$responsive_680_typography_h4_row = $h4_680_typography_section->add_row_element(
				array(
					'name' => 'qodef_responsive_680_h4_typography_row',
				)
			);

			$responsive_680_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_680_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_680_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);

			$responsive_680_typography_h4_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_h4_responsive_680_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 4,
					),
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_after_typography_options_map', 'pharmacare_core_add_h4_typography_options' );
}
