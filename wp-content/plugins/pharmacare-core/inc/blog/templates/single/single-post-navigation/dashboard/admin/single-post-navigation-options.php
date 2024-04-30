<?php

if ( ! function_exists( 'pharmacare_core_add_blog_single_post_navigation_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function pharmacare_core_add_blog_single_post_navigation_options( $page ) {

		if ( $page ) {

//			$page->add_field_element(
//				array(
//					'field_type'    => 'yesno',
//					'name'          => 'qodef_blog_single_override_date_format',
//					'title'         => esc_html__( 'Override Default WordPress date format on Single posts, and default Blog list', 'pharmacare-core' ),
//					'description'   => esc_html__( 'Enabling this option will show day and month', 'pharmacare-core' ),
//					'default_value' => 'no'
//				)
//			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_blog_single_enable_single_post_navigation',
					'title'         => esc_html__( 'Enable Single Post Navigation', 'pharmacare-core' ),
					'description'   => esc_html__( 'Enabling this option will show single post navigation section below post content on blog single', 'pharmacare-core' ),
					'default_value' => 'yes',
				)
			);

			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_blog_single_post_navigation_through_same_category',
					'title'         => esc_html__( 'Set Navigation Through Current Category', 'pharmacare-core' ),
					'description'   => esc_html__( 'Enabling this option will set your post navigation only through current category', 'pharmacare-core' ),
					'default_value' => 'yes',
					'dependency'    => array(
						'show' => array(
							'qodef_blog_single_enable_single_post_navigation' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_after_blog_single_options_map', 'pharmacare_core_add_blog_single_post_navigation_options' );
}
