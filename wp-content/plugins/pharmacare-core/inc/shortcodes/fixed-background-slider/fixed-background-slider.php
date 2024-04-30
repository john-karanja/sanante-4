<?php

if ( ! function_exists( 'pharmacare_core_add_fixed_background_slider_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function pharmacare_core_add_fixed_background_slider_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_FixedBackgroundSlider_Shortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_fixed_background_slider_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_FixedBackgroundSlider_Shortcode extends PharmaCareCore_Shortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'pharmacare_core_filter_fixed_background_slider_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'pharmacare_core_filter_fixed_background_slider_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/fixed-background-slider' );
			$this->set_base( 'pharmacare_core_fixed_background_slider' );
			$this->set_name( esc_html__( 'Fixed Background Slider', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds fixed background slider element', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_scripts(
				array(
					'swiper' => array(
						'registered'	=> true
					),
					'pharmacare-main-js' => array(
						'registered'	=> true
					)
				)
			);
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'link_target',
				'title'         => esc_html__( 'Link Target', 'pharmacare-core' ),
				'options'       => pharmacare_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
			$this->set_option( array(
				'field_type' => 'repeater',
				'name'       => 'children',
				'title'      => esc_html__( 'Child elements', 'pharmacare-core' ),
				'items'      => array(
					array(
						'field_type'    => 'text',
						'name'          => 'item_link',
						'title'         => esc_html__( 'Link', 'pharmacare-core' ),
						'default_value' => ''
					),
					array(
						'field_type' => 'image',
						'name'       => 'item_image',
						'title'      => esc_html__( 'Image', 'pharmacare-core' )
					),
					array(
						'field_type'    => 'textarea',
						'name'          => 'title',
						'title'         => esc_html__( 'Title', 'pharmacare-core' ),
						'default_value' => ''
					),
					array(
						'field_type'    => 'text',
						'name'          => 'author',
						'title'         => esc_html__( 'Author', 'pharmacare-core' ),
						'default_value' => ''
					),
					array(
						'field_type'    => 'text',
						'name'          => 'author_position',
						'title'         => esc_html__( 'Author Position', 'pharmacare-core' ),
						'default_value' => ''
					),
					array(
						'field_type' => 'image',
						'name'       => 'author_image',
						'title'      => esc_html__( 'Author Image', 'pharmacare-core' )
					),
				)
			) );
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['this_shortcode'] = $this;
			
			return pharmacare_core_get_template_part( 'shortcodes/fixed-background-slider', 'templates/fixed-background-slider', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-fixed-background-slider';
			$holder_classes[] = 'swiper-container-horizontal'; // swiper holder class
			
			return implode( ' ', $holder_classes );
		}
	}
}