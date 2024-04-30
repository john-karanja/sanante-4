<?php

if ( ! function_exists( 'pharmacare_membership_include_membership_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param bool $installed
	 * @param string $plugin - plugin name
	 *
	 * @return bool
	 */
	function pharmacare_membership_include_membership_is_installed( $installed, $plugin ) {
		
		if ( $plugin === 'membership' ) {
			return class_exists( 'PharmaCareMembership' );
		}
		
		return $installed;
	}
	
	add_filter( 'qode_framework_filter_is_plugin_installed', 'pharmacare_membership_include_membership_is_installed', 10, 2 );
}

if ( ! function_exists( 'pharmacare_membership_get_membership_redirect_url' ) ) {
	/**
	 * Function that return url for login redirection
	 *
	 * @param string $redirect_url
	 *
	 * @return string
	 */
	function pharmacare_membership_get_membership_redirect_url( $redirect_url = '' ) {
		$page_id       = qode_framework_get_page_id();
		$redirect_uri  = esc_url( home_url( '/' ) );
		$dashboard_url = pharmacare_membership_get_dashboard_page_url();
		
		if ( isset( $redirect_url ) && ! empty( $redirect_url ) ) {
			$redirect_uri = wp_unslash( $redirect_url );
		} elseif ( ! empty( $dashboard_url ) ) {
			$redirect_uri = $dashboard_url;
		} elseif ( $page_id > 0 ) {
			$redirect_uri = get_permalink( $page_id );
		}
		
		return apply_filters( 'pharmacare_membership_filter_redirect_url', esc_url( $redirect_uri ) );
	}
}

if ( ! function_exists( 'pharmacare_membership_get_dashboard_page_url' ) ) {
	/**
	 * Function that return main dashboard page url
	 *
	 * @return string
	 */
	function pharmacare_membership_get_dashboard_page_url() {
		$url                = '';
		$pages              = get_all_page_ids();
		$dashboard_template = apply_filters( 'pharmacare_membership_filter_dashboard_template_name', '' );
		
		if ( ! empty( $dashboard_template ) && ! empty( $pages ) ) {
			foreach ( $pages as $page ) {
				if ( get_post_status( $page ) == 'publish' && get_page_template_slug( $page ) == $dashboard_template ) {
					$url = esc_url( get_the_permalink( $page ) );
					break;
				}
			}
		}
		
		return $url;
	}
}

if ( ! function_exists( 'pharmacare_membership_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 */
	function pharmacare_membership_template_part( $module, $template, $slug = '', $params = array() ) {
		echo pharmacare_membership_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'pharmacare_membership_get_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function pharmacare_membership_get_template_part( $module, $template, $slug = '', $params = array() ) {
		$root = PHARMACARE_MEMBERSHIP_INC_PATH;
		
		return qode_framework_get_template_part( $root, $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'pharmacare_membership_get_grid_gutter_classes' ) ) {
	/**
	 * Function that returns classes for the gutter when sidebar is enabled
	 *
	 * @return string
	 */
	function pharmacare_membership_get_grid_gutter_classes() {
		return qode_framework_is_installed( 'theme' ) ? pharmacare_get_grid_gutter_classes() : '';
	}
}

if ( ! function_exists( 'pharmacare_membership_get_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position
	 *
	 * @param string $map
	 *
	 * @return int
	 */
	function pharmacare_membership_get_admin_options_map_position( $map ) {
		return qode_framework_is_installed( 'core' ) ? pharmacare_core_get_admin_options_map_position( $map ) : 10;
	}
}

if ( ! function_exists( 'pharmacare_membership_get_my_account_page_url' ) ) {
	/**
	 * Function that returns my account page url if woo is installed and set properly
	 *
	 * @param array $items
	 * @param string $dashboard_url
	 *
	 * @return array
	 */
	function pharmacare_membership_get_my_account_page_url( $items, $dashboard_url ) {

		if ( qode_framework_is_installed( 'woocommerce' ) ) {
			$my_account_page_id = get_option( 'woocommerce_myaccount_page_id' );
			
			if ( isset( $my_account_page_id ) && ! empty( $my_account_page_id ) ) {
				$url = esc_url( get_permalink( $my_account_page_id ) );
				
				if ( ! empty( $url ) ) {
					$items['profile']['url'] = $url;
					
					$edit_account_url = wc_customer_edit_account_url();
					if ( isset( $edit_account_url ) && ! empty( $edit_account_url ) ) {
						$items['edit-profile']['url'] = $edit_account_url;
					}
				}
			}
		}

		return $items;
	}

	add_filter( 'pharmacare_membership_filter_dashboard_navigation_pages', 'pharmacare_membership_get_my_account_page_url', 10, 2 );
}

//Added function because of the WP User Avatar interfering with upload
if ( ! function_exists( 'pharmacare_membership_media_settings' ) ) {
	function pharmacare_membership_media_settings( $settings ) {
		$dashboard_template = apply_filters( 'pharmacare_membership_filter_dashboard_template_name', '' );
		
		//only change on 0 if on dashboard
		if ( class_exists( 'WP_User_Avatar_Setup' ) && ! empty( $dashboard_template ) && is_page_template( $dashboard_template ) ) {
			if ( is_user_logged_in() && current_user_can('upload_files') ) {
				$settings['post']['id'] = 0;
			}
		}
		return $settings;
	}
	add_filter('media_view_settings', 'pharmacare_membership_media_settings', 15, 1);
}