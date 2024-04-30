<?php

if ( ! function_exists( 'pharmacare_core_add_testimonials_list_options_testimonials_carousel_vertical' ) ) {
	/**
	 * Function that add additional options for variation layout
	 *
	 * @param array $options
	 *
	 * @return array
	 */
	function pharmacare_core_add_testimonials_list_options_testimonials_carousel_vertical( $options ) {

		$testimonials_carousel_vertical_options   = array();

		$loop_option = array(
			'field_type' => 'select',
			'name'       => 'vertical_slider_loop',
			'title'      => esc_html__( 'Enable Slider Loop', 'pharmacare-core' ),
			'options'    => pharmacare_core_get_select_type_options_pool( 'yes_no' ),
			'dependency' => array(
				'show' => array(
					'behavior' => array(
						'values'        => 'carousel-vertical',
						'default_value' => 'default',
					),
				),
			)
		);
		$testimonials_carousel_vertical_options[] = $loop_option;

		$autoplay_option = array(
			'field_type' => 'select',
			'name'       => 'vertical_slider_autoplay',
			'title'      => esc_html__( 'Enable Slider Autoplay', 'pharmacare-core' ),
			'options'    => pharmacare_core_get_select_type_options_pool( 'yes_no' ),
			'dependency' => array(
				'show' => array(
					'behavior' => array(
						'values'        => 'carousel-vertical',
						'default_value' => 'default',
					),
				),
			)
		);
		$testimonials_carousel_vertical_options[] = $autoplay_option;

		$speed_option = array(
			'field_type'  => 'text',
			'name'        => 'vertical_slider_speed',
			'title'       => esc_html__( 'Slide Duration', 'pharmacare-core' ),
			'description' => esc_html__( 'Default value is 5000 (ms)', 'pharmacare-core' ),
			'dependency'  => array(
				'show' => array(
					'behavior' => array(
						'values'        => 'carousel-vertical',
						'default_value' => 'default',
					),
				),
			)
		);
		$testimonials_carousel_vertical_options[] = $speed_option;

		$animation_option = array(
			'field_type'  => 'text',
			'name'        => 'vertical_slider_speed_animation',
			'title'       => esc_html__( 'Slide Animation Duration', 'pharmacare-core' ),
			'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 800.', 'pharmacare-core' ),
			'dependency'  => array(
				'show' => array(
					'behavior' => array(
						'values'        => 'carousel-vertical',
						'default_value' => 'default',
					),
				),
			)
		);
		$testimonials_carousel_vertical_options[] = $animation_option;

		return array_merge( $options, $testimonials_carousel_vertical_options );
	}

	add_filter( 'pharmacare_core_filter_testimonials_list_extra_options', 'pharmacare_core_add_testimonials_list_options_testimonials_carousel_vertical' );
}
