<?php

if ( ! function_exists( 'pharmacare_core_add_icon_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function pharmacare_core_add_icon_widget( $widgets ) {
		$widgets[] = 'PharmaCareCore_Icon_Widget';
		
		return $widgets;
	}
	
	add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_icon_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class PharmaCareCore_Icon_Widget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'pharmacare_core_icon'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'pharmacare_core_icon' );
				$this->set_name( esc_html__( 'PharmaCare Icon', 'pharmacare-core' ) );
				$this->set_description( esc_html__( 'Add a icon element into widget areas', 'pharmacare-core' ) );
			}
		}
		
		public function render( $atts ) {
			
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[pharmacare_core_icon $params]" ); // XSS OK
		}
	}
}
