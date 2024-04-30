<?php

if ( ! function_exists( 'pharmacare_core_add_standard_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function pharmacare_core_add_standard_header_global_option( $header_layout_options ) {
		$header_layout_options['standard'] = array(
			'image' => PHARMACARE_CORE_HEADER_LAYOUTS_URL_PATH . '/standard/assets/img/standard-header.png',
			'label' => esc_html__( 'Standard', 'pharmacare-core' )
		);

		return $header_layout_options;
	}

	add_filter( 'pharmacare_core_filter_header_layout_option', 'pharmacare_core_add_standard_header_global_option' );
}

if ( ! function_exists( 'pharmacare_core_set_standard_header_as_default_global_option' ) ) {
	/**
	 * This function set header type as default option value for global header option map
	 */
	function pharmacare_core_set_standard_header_as_default_global_option( $default_value ) {
		return 'standard';
	}
	
	add_filter( 'pharmacare_core_filter_header_layout_default_option_value', 'pharmacare_core_set_standard_header_as_default_global_option' );
}

if ( ! function_exists( 'pharmacare_core_register_standard_header_layout' ) ) {
	function pharmacare_core_register_standard_header_layout( $header_layouts ) {
		$header_layout = array(
			'standard' => 'PharmaCareCore_Standard_Header'
		);

		$header_layouts = array_merge( $header_layouts, $header_layout );

		return $header_layouts;
	}

	add_filter( 'pharmacare_core_filter_register_header_layouts', 'pharmacare_core_register_standard_header_layout');
}

if ( ! function_exists( 'pharmacare_core_register_extended_dd_menus' ) ) {
    /**
     * Function which registers navigation menus
     */
    function pharmacare_core_register_extended_dd_menus() {
        $navigation_menus = array( 'extended-dropdown-menu' => esc_html__( 'Extended Dropdown', 'pharmacare-core' ) );

        if ( ! empty( $navigation_menus ) ) {
            register_nav_menus( $navigation_menus );
        }
    }

    add_action( 'pharmacare_core_action_after_include_modules', 'pharmacare_core_register_extended_dd_menus' );
}

if (!function_exists('pharmacare_core_get_extended_dropdown_menu')) {
    /**
     * This function is used to wait header-function.php file to init header object and then to init hook registration function above
     */
    function pharmacare_core_get_extended_dropdown_menu() {
        $params = array();

        $id = qode_framework_get_page_id();

        $show_extended_dropdown = pharmacare_core_get_post_value_through_levels('show_extended_dropdown', $id);

        if ($show_extended_dropdown == 'yes') {

            $extended_dd_always_opened = pharmacare_core_get_post_value_through_levels('extended_dropdown_always_opened', $id);

            //classes param
            $classes = array();
            $classes['qodef-extended-dropdown-menu'] = array('qodef-extended-dropdown-menu');

            if ($extended_dd_always_opened == 'yes') {
                $classes['qodef-extended-dropdown-menu'][] = 'qodef-dropdown-always-opened';
            }

            //background color

            $styles = array();

            $extended_dropdown_background_color = pharmacare_core_get_post_value_through_levels('extended_dropdown_background_color', $id);
            $extended_dropdown_text_color = pharmacare_core_get_post_value_through_levels('extended_dropdown_text_color', $id);

            if (!empty($extended_dropdown_background_color)) {
                $styles[] = 'background-color: ' . $extended_dropdown_background_color;
                $styles[] = 'color: ' . $extended_dropdown_text_color;
            }

            $params['styles'] = $styles;

            //opener title param
            $opener_title = pharmacare_core_get_post_value_through_levels('extended_dropdown_opener_label', $id);


            $params['opener_title'] = $opener_title !== '' ? $opener_title : esc_html__('Browse Categories', 'pharmacare-core');
            $params['classes'] = implode(' ', $classes['qodef-extended-dropdown-menu']);
            pharmacare_core_template_part('header/layouts/standard', 'templates/extended-dropdown', '', $params);
        }
    }
}