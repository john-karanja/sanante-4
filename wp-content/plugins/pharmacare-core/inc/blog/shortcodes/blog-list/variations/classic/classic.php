<?php

if ( ! function_exists( 'pharmacare_core_add_blog_list_variation_classic' ) ) {
	/**
	 * Function that add variation layout for this module
	 *
	 * @param array $variations
	 *
	 * @return array
	 */
	function pharmacare_core_add_blog_list_variation_classic( $variations ) {
		$variations['classic'] = esc_html__( 'Classic', 'pharmacare-core' );

		return $variations;
	}

	add_filter( 'pharmacare_core_filter_blog_list_layouts', 'pharmacare_core_add_blog_list_variation_classic' );
}

if ( ! function_exists( 'pharmacare_core_load_blog_list_variation_classic_assets' ) ) {
	/**
	 * Function that return is global blog asses allowed for variation layout
	 *
	 * @param bool $is_enabled
	 * @param array $params
	 *
	 * @return bool
	 */
	function pharmacare_core_load_blog_list_variation_classic_assets( $is_enabled, $params ) {

		if ( 'classic' === $params['layout'] ) {
			$is_enabled = true;
		}

		return $is_enabled;
	}

	add_filter( 'pharmacare_core_filter_load_blog_list_assets', 'pharmacare_core_load_blog_list_variation_classic_assets', 10, 2 );
}

if ( ! function_exists( 'pharmacare_core_register_blog_list_classic_scripts' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function pharmacare_core_register_blog_list_classic_scripts( $scripts ) {

		$scripts['wp-mediaelement']    = array(
			'registered' => true,
		);
		$scripts['mediaelement-vimeo'] = array(
			'registered' => true,
		);

		return $scripts;
	}

	add_filter( 'pharmacare_core_filter_blog_list_register_scripts', 'pharmacare_core_register_blog_list_classic_scripts' );
}

if ( ! function_exists( 'pharmacare_core_register_blog_list_classic_styles' ) ) {
	/**
	 * Function that register modules 3rd party scripts
	 *
	 * @param array $styles
	 *
	 * @return array
	 */
	function pharmacare_core_register_blog_list_classic_styles( $styles ) {

		$styles['wp-mediaelement'] = array(
			'registered' => true,
		);

		return $styles;
	}

	add_filter( 'pharmacare_core_filter_blog_list_register_styles', 'pharmacare_core_register_blog_list_classic_styles' );
}
