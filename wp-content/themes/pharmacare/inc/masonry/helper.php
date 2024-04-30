<?php

if ( ! function_exists( 'pharmacare_register_masonry_scripts' ) ) {
	/**
	 * Function that include modules 3rd party scripts
	 */
	function pharmacare_register_masonry_scripts() {
		wp_register_script( 'isotope', PHARMACARE_INC_ROOT . '/masonry/assets/js/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'packery', PHARMACARE_INC_ROOT . '/masonry/assets/js/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
	}

	add_action( 'pharmacare_action_before_main_js', 'pharmacare_register_masonry_scripts' );
}

if ( ! function_exists( 'pharmacare_include_masonry_scripts' ) ) {
	/**
	 * Function that include modules 3rd party scripts
	 */
	function pharmacare_include_masonry_scripts() {
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'packery' );
	}
}

if ( ! function_exists( 'pharmacare_enqueue_masonry_scripts_for_templates' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts for templates
	 */
	function pharmacare_enqueue_masonry_scripts_for_templates() {
		$post_type = apply_filters( 'pharmacare_filter_allowed_post_type_to_enqueue_masonry_scripts', '' );

		if ( ! empty( $post_type ) && is_singular( $post_type ) ) {
			pharmacare_include_masonry_scripts();
		}
	}

	add_action( 'pharmacare_action_before_main_js', 'pharmacare_enqueue_masonry_scripts_for_templates' );
}

if ( ! function_exists( 'pharmacare_enqueue_masonry_scripts_for_shortcodes' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts for shortcodes
	 *
	 * @param array $atts
	 */
	function pharmacare_enqueue_masonry_scripts_for_shortcodes( $atts ) {

		if ( isset( $atts['behavior'] ) && 'masonry' === $atts['behavior'] ) {
			pharmacare_include_masonry_scripts();
		}
	}

	add_action( 'pharmacare_core_action_list_shortcodes_load_assets', 'pharmacare_enqueue_masonry_scripts_for_shortcodes' );
}

if ( ! function_exists( 'pharmacare_register_masonry_scripts_for_list_shortcodes' ) ) {
	/**
	 * Function that set module 3rd party scripts for list shortcodes
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function pharmacare_register_masonry_scripts_for_list_shortcodes( $scripts ) {

		$scripts['isotope'] = array(
			'registered' => true,
		);
		$scripts['packery'] = array(
			'registered' => true,
		);

		return $scripts;
	}

	add_filter( 'pharmacare_core_filter_register_list_shortcode_scripts', 'pharmacare_register_masonry_scripts_for_list_shortcodes' );
}
