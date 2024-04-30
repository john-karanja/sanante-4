<?php

if ( ! function_exists( 'pharmacare_membership_add_social_login_twitter_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function pharmacare_membership_add_social_login_twitter_options( $page, $social_login_network_section ) {
		
		if ( $social_login_network_section ) {
			$social_login_network_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_twitter_social_login',
					'title'         => esc_html__( 'Enable Twitter Social Login', 'pharmacare-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login from twitter social network', 'pharmacare-membership' ),
					'default_value' => 'no'
				)
			);
		}
	}
	
	add_action( 'pharmacare_membership_action_after_social_login_options_map', 'pharmacare_membership_add_social_login_twitter_options', 10, 2 );
}