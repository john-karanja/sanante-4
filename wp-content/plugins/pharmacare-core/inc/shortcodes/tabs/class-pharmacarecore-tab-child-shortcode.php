<?php

if ( ! function_exists( 'pharmacare_core_add_tabs_child_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_tabs_child_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Tabs_Child_Shortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_tabs_child_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_Tabs_Child_Shortcode extends PharmaCareCore_Shortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/tabs' );
			$this->set_base( 'pharmacare_core_tabs_child' );
			$this->set_name( esc_html__( 'Tabs Child', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds tab child to tabs holder', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_is_child_shortcode( true );
			$this->set_parent_elements( array(
				'pharmacare_core_tabs'
			) );
			$this->set_is_parent_shortcode( true );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'tab_title',
				'title'      => esc_html__( 'Title', 'pharmacare-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'text',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'pharmacare-core' ),
				'default_value' => '',
				'visibility'    => array('map_for_page_builder' => false)
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['tab_title'] = $atts['tab_title'] . '-' . rand( 0, 1000 );
			$atts['content']   = $content;

			return pharmacare_core_get_template_part( 'shortcodes/tabs', 'variations/'.$atts['layout'].'/templates/child', '', $atts );
		}
	}
}