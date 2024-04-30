<?php

if ( ! function_exists( 'pharmacare_core_add_page_spinner_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function pharmacare_core_add_page_spinner_meta_box( $page ) {

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_page_spinner',
					'title'       => esc_html__( 'Enable Page Spinner', 'pharmacare-core' ),
					'description' => esc_html__( 'Enable Page Spinner Effect', 'pharmacare-core' ),
					'options'     => pharmacare_core_get_select_type_options_pool( 'yes_no' ),
				)
			);
		}
	}

	add_action( 'pharmacare_core_action_after_general_page_meta_box_map', 'pharmacare_core_add_page_spinner_meta_box', 9 );
}
