<?php

if ( ! function_exists( 'pharmacare_core_add_testimonials_meta_box' ) ) {
	/**
	 * Function that adds fields for testimonials
	 */
	function pharmacare_core_add_testimonials_meta_box() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'testimonials' ),
				'type'  => 'meta',
				'slug'  => 'testimonials',
				'title' => esc_html__( 'Testimonials Parameters', 'pharmacare-core' ),
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_testimonials_title',
					'title'      => esc_html__( 'Title', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'textarea',
					'name'       => 'qodef_testimonials_text',
					'title'      => esc_html__( 'Text', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_testimonials_author',
					'title'      => esc_html__( 'Author', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_testimonials_author_job',
					'title'      => esc_html__( 'Author Job Title', 'pharmacare-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_testimonials_rating',
					'title'         => esc_html__( 'Rating', 'pharmacare-core' ),
					'options'       => array(
						'0' => esc_html__( '0', 'pharmacare-core' ),
						'1' => esc_html__( '1', 'pharmacare-core' ),
						'2' => esc_html__( '2', 'pharmacare-core' ),
						'3'   => esc_html__( '3', 'pharmacare-core' ),
						'4'   => esc_html__( '4', 'pharmacare-core' ),
						'5'   => esc_html__( '5', 'pharmacare-core' ),
					),
					'default_value' => '0'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_testimonial_image_right',
					'title'         => esc_html__( 'Author Image On Right', 'pharmacare-core' ),
					'default_value' => 'no',
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'pharmacare_core_action_after_testimonials_meta_box_map', $page );
		}
	}

	add_action( 'pharmacare_core_action_default_meta_boxes_init', 'pharmacare_core_add_testimonials_meta_box' );
}
