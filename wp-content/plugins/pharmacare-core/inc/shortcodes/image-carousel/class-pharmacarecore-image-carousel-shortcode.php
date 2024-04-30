<?php

if ( ! function_exists( 'pharmacare_core_add_image_carousel_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function pharmacare_core_add_image_carousel_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Image_Carousel_Shortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_image_carousel_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_Image_Carousel_Shortcode extends PharmaCareCore_Shortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'pharmacare_core_filter_interactive_link_showcase_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'pharmacare_core_filter_interactive_link_showcase_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/image-carousel' );
			$this->set_base( 'pharmacare_core_image_carousel' );
			$this->set_name( esc_html__( 'Image Carousel', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds image carousel holder', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_scripts(
				array(
					'image-carousel' => array(
						'registered'	=> false,
						'url'			=> PHARMACARE_CORE_INC_URL_PATH . '/shortcodes/image-carousel/assets/js/plugins/swipe-detect.js',
						'dependency'	=> array( 'jquery' )
					)
				)
			);
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
			) );
		
			$this->set_option( array(
				'field_type' => 'repeater',
				'name'       => 'children',
				'title'      => esc_html__( 'Child elements', 'pharmacare-core' ),
				'items'   => array(
					array(
						'field_type' => 'text',
						'name'       => 'title',
						'title'      => esc_html__( 'Title', 'pharmacare-core' ),
					),
					array(
						'field_type' => 'image',
						'name'       => 'image',
						'title'      => esc_html__( 'Image', 'pharmacare-core' ),
					),
					array(
						'field_type' => 'text',
						'name'       => 'link',
						'title'      => esc_html__( 'Link', 'pharmacare-core' ),
					) ,
					array(
						'field_type'    => 'select',
						'name'          => 'target',
						'title'         => esc_html__( 'Link Target', 'pharmacare-core' ),
						'options'       => pharmacare_core_get_select_type_options_pool( 'link_target' ),
						'default_value' => '_self'
					)
				)
			) );
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['holder_styles']  = $this->get_holder_styles( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['this_shortcode'] = $this;
			$atts['carousel_data']  = $this->getSliderData( $atts );
			
			$atts['content']        = $content;
			
			// Extract tab titles
			preg_match_all('/image="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE);
			$items_images = array();
			
			/**
			 * get tab titles array
			 *
			 */
			if (isset($matches[0])) {
				$items_images = $matches[0];
			}
			
			$items_images_array = array();
			
			foreach($items_images as $item_image) {
				preg_match('/image="([^\"]+)"/i', $item_image[0], $tab_matches, PREG_OFFSET_CAPTURE);
				$items_images_array[] = $tab_matches[1][0];
			}
			
			$atts['items_images_array'] = $items_images_array;
			
			return pharmacare_core_get_template_part( 'shortcodes/image-carousel', 'templates/image-carousel-holder', '', $atts );
		}
		private function getSliderData( $params ) {
			$slider_data = array();
			
			$slider_data['data-number-of-items']        = ! empty( $params['number_of_visible_items'] ) ? $params['number_of_visible_items'] : '8';
			$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
			$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
			$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
			$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
			$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
			$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';
			
			return $slider_data;
		}
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-interactive-link-showcase';
			$holder_classes[] = ! empty( $atts['skin'] ) ? 'qodef-skin--' . $atts['skin'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_holder_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['background_color'];
			}
			
			return $styles;
		}
		
		public function get_image_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['item_image'] ) ) {
				$styles[] = 'background-image: url(' . esc_url( wp_get_attachment_url( $atts['item_image'] ) ) . ')';
			}
			
			return $styles;
		}
	}
}