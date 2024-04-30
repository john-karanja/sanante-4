<?php

if ( ! function_exists( 'pharmacare_core_add_custom_font_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function pharmacare_core_add_custom_font_widget( $widgets ) {
		$widgets[] = 'PharmaCareCore_Custom_Font_Widget';

		return $widgets;
	}

	add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_custom_font_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class PharmaCareCore_Custom_Font_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'pharmacare_core_custom_font',
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'pharmacare_core_custom_font' );
				$this->set_name( esc_html__( 'PharmaCare Custom Font', 'pharmacare-core' ) );
				$this->set_description( esc_html__( 'Add a custom font element into widget areas', 'pharmacare-core' ) );
			}
		}

		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );

			echo do_shortcode( "[pharmacare_core_custom_font $params]" ); // XSS OK
		}
	}
}
