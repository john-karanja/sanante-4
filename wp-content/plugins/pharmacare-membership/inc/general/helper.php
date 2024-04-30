<?php

if ( ! function_exists( 'pharmacare_membership_get_dashboard_navigation_pages' ) ) {
	/**
	 * Function that return main dashboard page navigation items
	 *
	 * @return array
	 */
	function pharmacare_membership_get_dashboard_navigation_pages() {
		$dashboard_url = pharmacare_membership_get_dashboard_page_url();
		
		$items = array(
			'profile'      => array(
				'url'         => esc_url( add_query_arg( array( 'user-action' => 'profile' ), $dashboard_url ) ),
				'text'        => esc_html__( 'Profile', 'pharmacare-membership' ),
				'user_action' => 'profile',
				'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g id="bas107"><g id="Regular-10" data-name="Regular"><path d="M16,32C0,32,0,29.506,0,28.566V26.947a6.5,6.5,0,0,1,3.805-5.909l5.263-2.392a3.415,3.415,0,0,0,1.376-1.141,1.367,1.367,0,0,0,.063-1.477A13.559,13.559,0,0,1,8.7,9.233C8.7,4.638,10.957,0,16,0s7.3,4.638,7.3,9.233a13.566,13.566,0,0,1-1.807,6.8,1.365,1.365,0,0,0,.064,1.477,3.41,3.41,0,0,0,1.375,1.14L28.2,21.038A6.5,6.5,0,0,1,32,26.947v1.619C32,29.506,32,32,16,32ZM3,27.866C4.4,28.333,8.865,29,16,29s11.6-.667,13-1.134v-.919a3.5,3.5,0,0,0-2.047-3.178l-5.264-2.393A6.41,6.41,0,0,1,19.1,19.231h0a4.346,4.346,0,0,1-.169-4.764A10.6,10.6,0,0,0,20.3,9.233C20.3,8.192,20.093,3,16,3s-4.3,5.192-4.3,6.233a10.6,10.6,0,0,0,1.367,5.232A4.347,4.347,0,0,1,12.9,19.23a6.414,6.414,0,0,1-2.587,2.146L5.047,23.769A3.5,3.5,0,0,0,3,26.947Z"/></g></g></svg>'
			),
			'edit-profile' => array(
				'url'         => esc_url( add_query_arg( array( 'user-action' => 'edit-profile' ), $dashboard_url ) ),
				'text'        => esc_html__( 'Edit Profile', 'pharmacare-membership' ),
				'user_action' => 'edit-profile',
				'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g id="bas120"><g id="Regular-3" data-name="Regular"><path d="M30.064,12.94,27.7,12.787A12.415,12.415,0,0,0,26.036,8.8l1.573-1.79a1,1,0,0,0-.044-1.367l-2.21-2.21a1,1,0,0,0-1.367-.044L22.2,4.964a12.415,12.415,0,0,0-3.985-1.659L18.06.936a1,1,0,0,0-1-.936H13.938a1,1,0,0,0-1,.936l-.153,2.369A12.415,12.415,0,0,0,8.8,4.964L7.012,3.391a1,1,0,0,0-1.367.044l-2.21,2.21a1,1,0,0,0-.044,1.367L4.964,8.8a12.415,12.415,0,0,0-1.659,3.985L.936,12.94a1,1,0,0,0-.936,1v3.124a1,1,0,0,0,.936,1l2.369.153A12.415,12.415,0,0,0,4.964,22.2l-1.573,1.79a1,1,0,0,0,.044,1.367l2.21,2.21a1,1,0,0,0,1.367.044L8.8,26.036A12.415,12.415,0,0,0,12.787,27.7l.153,2.369a1,1,0,0,0,1,.936h3.124a1,1,0,0,0,1-.936l.153-2.369A12.415,12.415,0,0,0,22.2,26.036l1.79,1.573a1,1,0,0,0,1.367-.044l2.21-2.21a1,1,0,0,0,.044-1.367L26.036,22.2A12.415,12.415,0,0,0,27.7,18.213l2.369-.153a1,1,0,0,0,.936-1V13.938A1,1,0,0,0,30.064,12.94ZM6,15.5A9.5,9.5,0,1,1,15.5,25,9.511,9.511,0,0,1,6,15.5ZM15.5,9A6.5,6.5,0,1,0,22,15.5,6.508,6.508,0,0,0,15.5,9Zm0,10A3.5,3.5,0,1,1,19,15.5,3.5,3.5,0,0,1,15.5,19Z"/></g></g></svg>'
			),
			'log-out' => array(
				'url'         => wp_logout_url( pharmacare_membership_get_membership_redirect_url() ),
				'text'        => esc_html__( 'Log Out', 'pharmacare-membership' ),
				'user_action' => 'log-out',
				'icon'        => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g id="bas006"><g id="Light-6" data-name="Light"><path d="M31,16A15,15,0,1,1,16,1,15.017,15.017,0,0,1,31,16ZM3,16A13,13,0,1,0,16,3,13.015,13.015,0,0,0,3,16Zm19.707-.707-5-5a1,1,0,0,0-1.414,1.414L19.586,15H10a1,1,0,0,0,0,2h9.586l-3.293,3.293a1,1,0,0,0,1.414,1.414l5-5a1,1,0,0,0,0-1.414Z"/></g></g></svg>'
			)
		);
		
		$items = apply_filters( 'pharmacare_membership_filter_dashboard_navigation_pages', $items, $dashboard_url );

		return $items;
	}
}

if ( ! function_exists( 'pharmacare_membership_get_dashboard_pages' ) ) {
	/**
	 * Function that return content for main dashboard page item
	 *
	 * @return string that contains html of content
	 */
	function pharmacare_membership_get_dashboard_pages() {
		$action = isset( $_GET['user-action'] ) && ! empty( $_GET['user-action'] ) ? sanitize_text_field( $_GET['user-action'] ) : 'profile';
		
		$params = array();
		if ( $action == 'profile' || $action == 'edit-profile' ) {
			$params = pharmacare_membership_get_user_params( $action );
		}
		
		switch ( $action ) {
			case 'profile':
				$html = pharmacare_membership_get_template_part( 'general', 'page-templates/parts/profile', '', $params );
				break;
			case 'edit-profile':
				$html = pharmacare_membership_get_template_part( 'general', 'page-templates/parts/edit-profile', '', $params );
				break;
			default:
				$html = pharmacare_membership_get_template_part( 'general', 'page-templates/parts/profile', '', $params );
				break;
		}
		
		return apply_filters( 'pharmacare_membership_filter_dashboard_page', $html, $action );
	}
}

if ( ! function_exists( 'pharmacare_membership_get_user_params' ) ) {
	/**
	 * Function that return user attributes for main dashboard page
	 *
	 * @param string $action
	 *
	 * @return array
	 */
	function pharmacare_membership_get_user_params( $action ) {
		$params = array();

		$user = wp_get_current_user();
		$user_id                 = $user->data->ID;

		$params['user']    		 = $user;
		$params['first_name']    = get_the_author_meta( 'first_name', $user_id );
		$params['last_name']     = get_the_author_meta( 'last_name', $user_id );
		$params['email']         = get_the_author_meta( 'user_email', $user_id );
		$params['website']       = get_the_author_meta( 'user_url', $user_id );
		$params['description']   = get_the_author_meta( 'description', $user_id );
		$params['profile_image'] = get_avatar( $user_id, 96 );
		$params['action']        = $action;

		return apply_filters( 'pharmacare_membership_filter_user_params', $params );
	}
}

if ( ! function_exists( 'pharmacare_membership_add_rest_api_update_user_meta_global_variables' ) ) {
	/**
	 * Extend main rest api variables with new case
	 *
	 * @param array $global - list of variables
	 * @param string $namespace - rest namespace url
	 *
	 * @return array
	 */
	function pharmacare_membership_add_rest_api_update_user_meta_global_variables( $global, $namespace ) {
		$global['updateUserRestRoute'] = $namespace . '/edit-profile';

		return $global;
	}

	add_filter( 'qode_framework_filter_rest_api_global_variables', 'pharmacare_membership_add_rest_api_update_user_meta_global_variables', 10, 2 );
}

if ( ! function_exists( 'pharmacare_membership_add_rest_api_update_user_meta_route' ) ) {
	/**
	 * Extend main rest api routes with new case
	 *
	 * @param array $routes - list of rest routes
	 *
	 * @return array
	 */
	function pharmacare_membership_add_rest_api_update_user_meta_route( $routes ) {
		$routes['edit-profile'] = array(
			'route'               => 'edit-profile',
			'methods'             => WP_REST_Server::CREATABLE,
			'callback'            => 'pharmacare_membership_update_user_profile',
			'permission_callback' => function () {
				return is_user_logged_in();
			},
			'args'                => array(
				'options' => array(
					'required'          => true,
					'validate_callback' => function ( $param, $request, $key ) {
						// Simple solution for validation can be 'is_array' value instead of callback function
						return is_array( $param ) ? $param : (array) $param;
					},
					'description'       => esc_html__( 'Options data is array with reaction and id values', 'pharmacare-membership' ),
				),
			),
		);

		return $routes;
	}

	add_filter( 'qode_framework_filter_rest_api_routes', 'pharmacare_membership_add_rest_api_update_user_meta_route' );
}

if ( ! function_exists( 'pharmacare_membership_update_user_profile' ) ) {
	/**
	 * Function that update user profile
	 */
	function pharmacare_membership_update_user_profile() {
		
		if ( ! isset( $_POST['options'] ) || empty( $_POST['options'] ) || ! is_user_logged_in() ) {
			qode_framework_get_ajax_status( 'error', esc_html__( 'You are not authorized.', 'pharmacare-core' ) );
		} else {
			$options = isset( $_POST['options'] ) ? $_POST['options'] : array();

			if ( ! empty( $options ) ) {
				parse_str( $options, $options );
	
				$user_id = get_current_user_id();
				
				if ( ! empty( $user_id ) ) {
					$user_fields = array();
					
					if ( isset( $options['user_password'] ) && ! empty( $options['user_password'] ) ) {
						if ( $options['user_password'] === $options['user_confirm_password'] ) {
							$user_fields['user_pass'] = esc_attr( $options['user_password'] );
						} else {
							qode_framework_get_ajax_status( 'error', esc_html__( 'Password and confirm password doesn\'t match.', 'pharmacare-membership' ) );
						}
					}
					
					if ( isset( $options['user_email'] ) && ! empty( $options['user_email'] ) ) {
						
						if ( ! is_email( $options['user_email'] ) ) {
							qode_framework_get_ajax_status( 'error', esc_html__( 'Please provide a valid email address.', 'pharmacare-membership' ) );
						}
						
						$current_user_object = get_user_by( 'email', $options['user_email'] );
						if ( ! empty( $current_user_object ) && $current_user_object->ID !== $user_id && email_exists( $options['user_email'] ) ) {
							qode_framework_get_ajax_status( 'error', esc_html__( 'An account is already registered with this email address. Please fill another one.', 'pharmacare-membership' ) );
						} else {
							$user_fields['user_email'] = sanitize_email( $options['user_email'] );
						}
					}
					
					$simple_fields = array(
						'first_name'  => array(
							'escape' => 'attr'
						),
						'last_name'   => array(
							'escape' => 'attr'
						),
						'user_url'    => array(
							'escape' => 'url'
						),
						'description' => array(
							'escape' => 'attr'
						)
					);
					
					foreach ( $simple_fields as $key => $value ) {
						if ( isset( $options[ $key ] ) && ! empty( $options[ $key ] ) ) {
							$escape = 'esc_' . $value['escape'];
							
							$user_fields[ $key ] = $escape( $options[ $key ] );
						}
					}

					do_action( 'pharmacare_membership_action_update_user_profile', $options, $user_id );
					
					if ( ! empty( $user_fields ) ) {
						wp_update_user( array_merge(
							array( 'ID' => $user_id ),
							$user_fields
						) );
						
						qode_framework_get_ajax_status( 'success', esc_html__( 'Your profile is successfully updated.', 'pharmacare-membership' ), null, pharmacare_membership_get_membership_redirect_url() );
					} else {
						qode_framework_get_ajax_status( 'error', esc_html__( 'Change your information in order to update your profile.', 'pharmacare-membership' ) );
					}
				} else {
					qode_framework_get_ajax_status( 'error', esc_html__( 'You are unauthorized to perform this action.', 'pharmacare-membership' ) );
				}
			} else {
				qode_framework_get_ajax_status( 'error', esc_html__( 'Data are invalid.', 'pharmacare-membership' ) );
			}
		}
	}
}