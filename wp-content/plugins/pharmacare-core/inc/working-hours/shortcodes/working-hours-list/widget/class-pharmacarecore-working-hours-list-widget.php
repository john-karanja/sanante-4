<?php

if ( ! function_exists( 'pharmacare_core_add_working_hours_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function pharmacare_core_add_working_hours_list_widget( $widgets ) {
		$widgets[] = 'PharmaCareCore_Working_Hours_List_Widget';

		return $widgets;
	}

	add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_working_hours_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class PharmaCareCore_Working_Hours_List_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'pharmacare-core' ),
				)
			);
			$this->set_widget_option(
			array(
				'field_type'    => 'select',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'pharmacare-core' ),
				'default_value' => 'standard',
			)
			);
			$widget_mapped = $this->import_shortcode_options(
				array(
					'shortcode_base' => 'pharmacare_core_working_hours_list',
					'exclude'   => array(
						'layout',
					)
				)
			);
			if ( $widget_mapped ) {
				$this->set_base( 'pharmacare_core_working_hours_list' );
				$this->set_name( esc_html__( 'PharmaCare Working Hours List', 'pharmacare-core' ) );
				$this->set_description( esc_html__( 'Add a working hours list element into widget areas', 'pharmacare-core' ) );
			}
		}

		public function render( $atts ) {
			
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[pharmacare_core_working_hours_list $params]" ); // XSS OK
		}
	}
}
