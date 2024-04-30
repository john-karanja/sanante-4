<?php

if ( ! function_exists( 'pharmacare_core_add_working_hours_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function pharmacare_core_add_working_hours_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => PHARMACARE_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'working-hours',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Working Hours', 'pharmacare-core' ),
				'description' => esc_html__( 'Global Working Hours Options', 'pharmacare-core' ),
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_monday',
					'title'      => esc_html__( 'Working Hours For Monday', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_tuesday',
					'title'      => esc_html__( 'Working Hours For Tuesday', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_wednesday',
					'title'      => esc_html__( 'Working Hours For Wednesday', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_thursday',
					'title'      => esc_html__( 'Working Hours For Thursday', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_friday',
					'title'      => esc_html__( 'Working Hours For Friday', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_saturday',
					'title'      => esc_html__( 'Working Hours For Saturday', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_sunday',
					'title'      => esc_html__( 'Working Hours For Sunday', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef_working_hours_special_days',
					'title'      => esc_html__( 'Special Days', 'pharmacare-core' ),
					'options'    => array(
						'monday'    => esc_html__( 'Monday', 'pharmacare-core' ),
						'tuesday'   => esc_html__( 'Tuesday', 'pharmacare-core' ),
						'wednesday' => esc_html__( 'Wednesday', 'pharmacare-core' ),
						'thursday'  => esc_html__( 'Thursday', 'pharmacare-core' ),
						'friday'    => esc_html__( 'Friday', 'pharmacare-core' ),
						'saturday'  => esc_html__( 'Saturday', 'pharmacare-core' ),
						'sunday'    => esc_html__( 'Sunday', 'pharmacare-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_working_hours_special_text',
					'title'      => esc_html__( 'Featured Text For Special Days', 'pharmacare-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'pharmacare_core_action_after_working_hours_options_map', $page );
		}
	}

	add_action( 'pharmacare_core_action_default_options_init', 'pharmacare_core_add_working_hours_options', pharmacare_core_get_admin_options_map_position( 'working-hours' ) );
}
