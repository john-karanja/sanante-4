<?php

if ( ! function_exists( 'pharmacare_core_nav_menu_options' ) ) {
	/**
	 * Function that add general options for this module
	 *
	 * @param object $page
	 */
	function pharmacare_core_nav_menu_options( $page ) {

		if ( $page ) {
			$main_menu_tab = $page->add_tab_element(
				array(
					'name'  => 'tab-header-main-menu',
					'icon'  => 'fa fa-cog',
					'title' => esc_html__( 'Main Menu Settings', 'pharmacare-core' ),
				)
			);

			$section = $main_menu_tab->add_section_element(
				array(
					'name'  => 'qodef_nav_menu_section',
					'title' => esc_html__( 'Main Menu', 'pharmacare-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_dropdown_top_position',
					'title'       => esc_html__( 'Dropdown Position', 'pharmacare-core' ),
					'description' => esc_html__( 'Enter value in percentage of entire header height', 'pharmacare-core' ),
				)
			);

			$section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_wide_dropdown_full_width',
					'title'         => esc_html__( 'Wide Dropdown Full Width', 'pharmacare-core' ),
					'default_value' => 'yes',
				)
			);

			$section_dropdown_content = $section->add_section_element(
				array(
					'name'       => 'qodef_wide_dropdown_content_section',
					'title'      => esc_html__( 'Wide Dropdown Full Width', 'pharmacare-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_wide_dropdown_full_width' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$row_dropdown_content = $section_dropdown_content->add_row_element(
				array(
					'name'       => 'qodef_wide_dropdown_content_row',
					'title'      => '',
					'dependency' => array(
						'show' => array(
							'qodef_wide_dropdown_full_width' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$row_dropdown_content->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_wide_dropdown_content_grid',
					'title'         => esc_html__( 'Wide Dropdown Content In Grid', 'pharmacare-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'col_width' => 6,
					),
				)
			);

			$row_dropdown_content->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_dropdown_appearance',
					'title'         => esc_html__( 'Main Menu Dropdown Appearance', 'pharmacare-core' ),
					'default_value' => 'default',
					'options'       => array(
						'default'        => esc_html__( 'Default', 'pharmacare-core' ),
						'animate-height' => esc_html__( 'Animate Height', 'pharmacare-core' ),
					),
					'args'          => array(
						'col_width' => 6,
					),
				)
			);

			$nav_menu_typography_section = $main_menu_tab->add_section_element(
				array(
					'name'  => 'qodef_nav_menu_typography_section',
					'title' => esc_html__( 'Main Menu Typography', 'pharmacare-core' ),
				)
			);

			$first_level_typography_row = $nav_menu_typography_section->add_row_element(
				array(
					'name'  => 'qodef_first_level_typography_row',
					'title' => esc_html__( 'Menu First Level Typography', 'pharmacare-core' ),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_1st_lvl_color',
					'title'      => esc_html__( 'Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_1st_lvl_hover_color',
					'title'      => esc_html__( 'Hover Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_1st_lvl_active_color',
					'title'      => esc_html__( 'Active Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_nav_1st_lvl_font_family',
					'title'      => esc_html__( 'Font Family', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_1st_lvl_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_1st_lvl_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_1st_lvl_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_nav_1st_lvl_font_weight',
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
					'name'       => 'qodef_nav_1st_lvl_text_transform',
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
					'name'       => 'qodef_nav_1st_lvl_font_style',
					'title'      => esc_html__( 'Font Style', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_1st_lvl_margin',
					'title'      => esc_html__( 'Margin Left/Right', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
			$first_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_1st_lvl_padding',
					'title'      => esc_html__( 'Padding Left/Right', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row = $nav_menu_typography_section->add_row_element(
				array(
					'name'  => 'qodef_second_level_typography_row',
					'title' => esc_html__( 'Menu Second Level Typography', 'pharmacare-core' ),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_2nd_lvl_color',
					'title'      => esc_html__( 'Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_2nd_lvl_hover_color',
					'title'      => esc_html__( 'Hover Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_2nd_lvl_active_color',
					'title'      => esc_html__( 'Active Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_nav_2nd_lvl_font_family',
					'title'      => esc_html__( 'Font Family', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_2nd_lvl_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_2nd_lvl_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_2nd_lvl_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_nav_2nd_lvl_font_weight',
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
					'name'       => 'qodef_nav_2nd_lvl_text_transform',
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
					'name'       => 'qodef_nav_2nd_lvl_font_style',
					'title'      => esc_html__( 'Font Style', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_wide_typography_row = $nav_menu_typography_section->add_row_element(
				array(
					'name'  => 'qodef_second_level_wide_typography_row',
					'title' => esc_html__( 'Menu Second Level Wide Typography', 'pharmacare-core' ),
				)
			);

			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_2nd_lvl_wide_color',
					'title'      => esc_html__( 'Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_2nd_lvl_wide_hover_color',
					'title'      => esc_html__( 'Hover Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_2nd_lvl_wide_active_color',
					'title'      => esc_html__( 'Active Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_nav_2nd_lvl_wide_font_family',
					'title'      => esc_html__( 'Font Family', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_2nd_lvl_wide_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_2nd_lvl_wide_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_2nd_lvl_wide_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_nav_2nd_lvl_wide_font_weight',
					'title'      => esc_html__( 'Font Weight', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_nav_2nd_lvl_wide_text_transform',
					'title'      => esc_html__( 'Text Transform', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
			$second_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_nav_2nd_lvl_wide_font_style',
					'title'      => esc_html__( 'Font Style', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$third_level_wide_typography_row = $nav_menu_typography_section->add_row_element(
				array(
					'name'  => 'qodef_third_level_wide_typography_row',
					'title' => esc_html__( 'Menu Third Level Wide Typography', 'pharmacare-core' ),
				)
			);

			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_3rd_lvl_wide_color',
					'title'      => esc_html__( 'Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_3rd_lvl_wide_hover_color',
					'title'      => esc_html__( 'Hover Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_nav_3rd_lvl_wide_active_color',
					'title'      => esc_html__( 'Active Color', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'font',
					'name'       => 'qodef_nav_3rd_lvl_wide_font_family',
					'title'      => esc_html__( 'Font Family', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_3rd_lvl_wide_font_size',
					'title'      => esc_html__( 'Font Size', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_3rd_lvl_wide_line_height',
					'title'      => esc_html__( 'Line Height', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_nav_3rd_lvl_wide_letter_spacing',
					'title'      => esc_html__( 'Letter Spacing', 'pharmacare-core' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);

			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_nav_3rd_lvl_wide_font_weight',
					'title'      => esc_html__( 'Font Weight', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_weight' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_nav_3rd_lvl_wide_text_transform',
					'title'      => esc_html__( 'Text Transform', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'text_transform' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
			$third_level_wide_typography_row->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_nav_3rd_lvl_wide_font_style',
					'title'      => esc_html__( 'Font Style', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_select_type_options_pool( 'font_style' ),
					'args'       => array(
						'col_width' => 3,
					),
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_after_header_options_map', 'pharmacare_core_nav_menu_options' );
}
