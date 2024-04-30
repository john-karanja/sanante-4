<?php

if ( ! function_exists( 'pharmacare_core_get_subscribe_popup' ) ) {
	/**
	 * Loads subscribe popup HTML
	 */
	function pharmacare_core_get_subscribe_popup() {
		if ( pharmacare_core_get_option_value( 'admin', 'qodef_enable_subscribe_popup' ) === 'yes' && pharmacare_core_get_option_value( 'admin', 'qodef_subscribe_popup_contact_form' ) !== '' ) {
			pharmacare_core_load_subscribe_popup_template();
		}
	}

	// Get subscribe popup HTML
	add_action( 'pharmacare_action_before_wrapper_close_tag', 'pharmacare_core_get_subscribe_popup' );
}

if ( ! function_exists( 'pharmacare_core_load_subscribe_popup_template' ) ) {
	/**
	 * Loads HTML template with params
	 */
	function pharmacare_core_load_subscribe_popup_template() {
		$params                     = array();
		$params['title']            = pharmacare_core_get_option_value( 'admin', 'qodef_subscribe_popup_title' );
		$params['subtitle']         = pharmacare_core_get_option_value( 'admin', 'qodef_subscribe_popup_subtitle' );
		$background_image           = pharmacare_core_get_option_value( 'admin', 'qodef_subscribe_popup_background_image' );
		$params['content_style']    = ! empty( $background_image ) ? 'background-image: url(' . esc_url( wp_get_attachment_url( $background_image ) ) . ')' : '';
		$params['contact_form']     = pharmacare_core_get_option_value( 'admin', 'qodef_subscribe_popup_contact_form' );
		$params['enable_prevent']   = pharmacare_core_get_option_value( 'admin', 'qodef_enable_subscribe_popup_prevent' );
		$params['prevent_behavior'] = pharmacare_core_get_option_value( 'admin', 'qodef_subscribe_popup_prevent_behavior' );

		$holder_classes           = array();
		$holder_classes[]         = ! empty( $params['prevent_behavior'] ) ? 'qodef-sp-prevent-' . $params['prevent_behavior'] : 'qodef-sp-prevent-session';
		$params['holder_classes'] = implode( ' ', $holder_classes );

		echo pharmacare_core_get_template_part( 'subscribe-popup', 'templates/subscribe-popup', '', $params );
	}
}
