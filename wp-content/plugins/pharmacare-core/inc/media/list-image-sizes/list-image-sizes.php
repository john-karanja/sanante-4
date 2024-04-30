<?php

if ( ! function_exists( 'pharmacare_core_add_list_image_sizes' ) ) {
	/**
	 * Function that extended global image size options
	 *
	 * @param array $image_sizes
	 *
	 * @return array
	 */
	function pharmacare_core_add_list_image_sizes( $image_sizes ) {
		$image_sizes[] = array(
			'slug'           => 'pharmacare_image_size_square',
			'label'          => esc_html__( 'Square Size', 'pharmacare-core' ),
			'label_simple'   => esc_html__( 'Square', 'pharmacare-core' ),
			'default_crop'   => true,
			'default_width'  => 650,
			'default_height' => 650,
		);

		$image_sizes[] = array(
			'slug'           => 'pharmacare_image_size_landscape',
			'label'          => esc_html__( 'Landscape Size', 'pharmacare-core' ),
			'label_simple'   => esc_html__( 'Landscape', 'pharmacare-core' ),
			'default_crop'   => true,
			'default_width'  => 1300,
			'default_height' => 650,
		);

		$image_sizes[] = array(
			'slug'           => 'pharmacare_image_size_portrait',
			'label'          => esc_html__( 'Portrait Size', 'pharmacare-core' ),
			'label_simple'   => esc_html__( 'Portrait', 'pharmacare-core' ),
			'default_crop'   => true,
			'default_width'  => 650,
			'default_height' => 1300,
		);

		$image_sizes[] = array(
			'slug'           => 'pharmacare_image_size_huge-square',
			'label'          => esc_html__( 'Huge Square Size', 'pharmacare-core' ),
			'label_simple'   => esc_html__( 'Huge Square', 'pharmacare-core' ),
			'default_crop'   => true,
			'default_width'  => 1300,
			'default_height' => 1300,
		);

		return $image_sizes;
	}

	add_filter( 'qode_framework_filter_populate_image_sizes', 'pharmacare_core_add_list_image_sizes' );
}

if ( ! function_exists( 'pharmacare_core_add_pool_masonry_list_image_sizes' ) ) {
	/**
	 * Function that add global masonry image size options
	 *
	 * @param array $options
	 * @param string $type
	 *
	 * @return array
	 */
	function pharmacare_core_add_pool_masonry_list_image_sizes( $options, $type ) {
		if ( 'masonry_image_dimension' === $type ) {
			$options['pharmacare_image_size_square']      = esc_html__( 'Square', 'pharmacare-core' );
			$options['pharmacare_image_size_landscape']   = esc_html__( 'Landscape', 'pharmacare-core' );
			$options['pharmacare_image_size_portrait']    = esc_html__( 'Portrait', 'pharmacare-core' );
			$options['pharmacare_image_size_huge-square'] = esc_html__( 'Huge Square', 'pharmacare-core' );
		}

		return $options;
	}

	add_filter( 'pharmacare_core_filter_select_type_option', 'pharmacare_core_add_pool_masonry_list_image_sizes', 10, 2 );
}

if ( ! function_exists( 'pharmacare_core_get_custom_image_size_class_name' ) ) {
	/**
	 * Function that return custom image size class name
	 *
	 * @param string $image_size
	 *
	 * @return string
	 */
	function pharmacare_core_get_custom_image_size_class_name( $image_size ) {
		return ! empty( $image_size ) ? 'qodef-item--' . str_replace( 'pharmacare_image_size_', '', $image_size ) : '';
	}
}

if ( ! function_exists( 'pharmacare_core_get_custom_image_size_class_name_masonry_elements' ) ) {
	/**
	 * Function that return custom image size class name
	 *
	 * @param string $image_size
	 *
	 * @return string
	 */
	function pharmacare_core_get_custom_image_size_class_name_masonry_elements( $image_size ) {
		return ! empty( $image_size ) ? 'qodef-item--' . str_replace( 'pharmacare_image_size_', '', $image_size ) : '';
	}
}

if ( ! function_exists( 'pharmacare_core_get_custom_image_size_meta' ) ) {
	/**
	 * Function that return custom image size meta value
	 *
	 * @param string $type
	 * @param string $name
	 * @param int $post_id
	 *
	 * @return array
	 */
	function pharmacare_core_get_custom_image_size_meta( $type, $name, $post_id ) {
		$image_size_meta = qode_framework_get_option_value( '', $type, $name, '', $post_id );
		$image_size      = ! empty( $image_size_meta ) ? esc_attr( $image_size_meta ) : 'full';

		return array(
			'size'  => $image_size,
			'class' => pharmacare_core_get_custom_image_size_class_name( $image_size ),
		);
	}
}
