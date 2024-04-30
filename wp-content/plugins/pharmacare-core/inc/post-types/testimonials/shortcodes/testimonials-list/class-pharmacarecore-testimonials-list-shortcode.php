<?php

if ( ! function_exists( 'pharmacare_core_add_testimonials_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_testimonials_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Testimonials_List_Shortcode';

		return $shortcodes;
	}

	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_testimonials_list_shortcode' );
}

if ( class_exists( 'PharmaCareCore_List_Shortcode' ) ) {
	class PharmaCareCore_Testimonials_List_Shortcode extends PharmaCareCore_List_Shortcode {

		public function __construct() {
			$this->set_post_type( 'testimonials' );
			$this->set_post_type_additional_taxonomies( array( 'testimonials-category' ) );
			$this->set_layouts( apply_filters( 'pharmacare_core_filter_testimonials_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'pharmacare_core_filter_testimonials_list_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_CPT_URL_PATH . '/testimonials/shortcodes/testimonials-list' );
			$this->set_base( 'pharmacare_core_testimonials_list' );
			$this->set_name( esc_html__( 'Testimonials List', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of testimonials', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
				)
			);
			$this->map_list_options(
				array(
					'exclude_behavior' => array( 'masonry', 'justified-gallery' ),
					'include_behavior' => array( 'carousel-vertical' => esc_html__( 'Carousel Vertical', 'pharmacare-core' ) ),
					'exclude_option'   => array( 'images_proportion' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'skin',
					'title'      => esc_html__( 'Skin', 'pharmacare-core' ),
					'options'    => array(
						''      => esc_html__( 'Default', 'pharmacare-core' ),
						'light' => esc_html__( 'Light', 'pharmacare-core' ),
					),
					'dependency' => array(
						'hide' => array(
							'behavior' => array(
								'values'        => 'carousel-vertical',
								'default_value' => '',
							),
						),
					)
				)
			);
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );

			$atts = $this->get_atts();

			$atts['post_type'] = $this->get_post_type();

			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );

			$atts['unique'] = rand( 0, 1000 );

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['slider_attr']    = $this->get_slider_data( $atts, array( 'unique' => $atts['unique'] ) );
			$atts['query_result']   = new \WP_Query( pharmacare_core_get_query_params( $atts ) );
			$atts['carousel_attr']  = $this->get_carousel_vertical_data( $atts );

			$atts['this_shortcode'] = $this;

			return pharmacare_core_get_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'templates/content', $atts['behavior'], $atts );
		}

		private function get_carousel_vertical_data( $atts ) {
			$data = array();

			$data['slidesPerView']  = isset( $atts['columns'] ) ? $atts['columns'] : 1;
			$data['spaceBetween']   = 0;
			$data['loop']           = isset( $atts['vertical_slider_loop'] ) ? 'no' != $atts['vertical_slider_loop'] : true;
			$data['autoplay']       = isset( $atts['vertical_slider_autoplay'] ) ? 'no' != $atts['vertical_slider_autoplay'] : true;
			$data['speed']          = isset( $atts['vertical_slider_speed'] ) ? $atts['vertical_slider_speed'] : '';
			$data['speedAnimation'] = isset( $atts['vertical_slider_speed_animation'] ) ? $atts['vertical_slider_speed_animation'] : '';

			if ( isset( $atts['unique'] ) && ! empty( $atts['unique'] ) ) {
				$atts['outsideNavigation'] = 'yes';
			}

			if ( ! empty( $include ) ) {
				foreach ( $include as $key => $value ) {
					if ( ! array_key_exists( $key, $data ) ) {
						$data[ $key ] = $value;
					}
				}
			}

			return json_encode( $data );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-testimonials-list';
			$holder_classes[] = isset( $atts['skin'] ) && ! empty( $atts['skin'] ) ? 'qodef-skin--' . $atts['skin'] : '';

			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );

			return implode( ' ', $holder_classes );
		}

		private function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();

			$list_item_classes = $this->get_list_item_classes( $atts );

			$item_classes = array_merge( $item_classes, $list_item_classes );

			return implode( ' ', $item_classes );
		}

		public function get_title_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}

			return $styles;
		}
	}
}
