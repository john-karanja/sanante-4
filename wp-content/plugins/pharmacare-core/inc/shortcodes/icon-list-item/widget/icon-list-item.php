<?php

if ( ! function_exists( 'pharmacare_core_add_icon_list_item_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function pharmacare_core_add_icon_list_item_widget( $widgets ) {
		$widgets[] = 'PharmaCareCore_Icon_List_Item_Widget';
		
		return $widgets;
	}
	
	add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_icon_list_item_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class PharmaCareCore_Icon_List_Item_Widget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'pharmacare_core_icon_list_item',
				'exclude'   => array(
					'icon_type', 'custom_icon'
				)
			) );
			if( $widget_mapped ) {
				$this->set_base( 'pharmacare_core_icon_list_item' );
				$this->set_name( esc_html__( 'PharmaCare Icon List Item', 'pharmacare-core' ) );
				$this->set_description( esc_html__( 'Add a icon list item element into widget areas', 'pharmacare-core' ) );
			}
		}
		
		public function render( $atts ) {
			
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[pharmacare_core_icon_list_item $params]" ); // XSS OK
		}
	}
}
