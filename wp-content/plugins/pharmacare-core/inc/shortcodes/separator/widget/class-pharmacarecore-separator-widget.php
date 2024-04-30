<?php

if ( ! function_exists( 'pharmacare_core_add_separator_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function pharmacare_core_add_separator_widget( $widgets ) {
		$widgets[] = 'PharmaCareCore_Separator_Widget';
		
		return $widgets;
	}
	
	add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_separator_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class PharmaCareCore_Separator_Widget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'pharmacare_core_separator'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'pharmacare_core_separator' );
				$this->set_name( esc_html__( 'PharmaCare Separator', 'pharmacare-core' ) );
				$this->set_description( esc_html__( 'Add a separator element into widget areas', 'pharmacare-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[pharmacare_core_separator $params]" ); // XSS OK
		}
	}
}