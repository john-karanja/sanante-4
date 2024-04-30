<?php

if ( ! function_exists( 'pharmacare_core_add_twitter_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function pharmacare_core_add_twitter_list_widget( $widgets ) {
		if ( qode_framework_is_installed( 'twitter' ) ) {
			$widgets[] = 'PharmaCareCoreTwitterListWidget';
		}
		
		return $widgets;
	}
	
	add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_twitter_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class PharmaCareCoreTwitterListWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_widget_option(
				array(
					'name'       => 'widget_title',
					'field_type' => 'text',
					'title'      => esc_html__( 'Title', 'pharmacare-core' )
				)
			);
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'pharmacare_core_twitter_list'
			) );
			if( $widget_mapped ) {
				$this->set_base( 'pharmacare_core_twitter_list' );
				$this->set_name( esc_html__( 'PharmaCare Twitter List', 'pharmacare-core' ) );
				$this->set_description( esc_html__( 'Add a twitter list element into widget areas', 'pharmacare-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[pharmacare_core_twitter_list $params]" ); // XSS OK
		}
	}
}
