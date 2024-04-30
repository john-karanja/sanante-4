<?php

if ( ! function_exists( 'pharmacare_core_add_masonry_elements_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function pharmacare_core_add_masonry_elements_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCoreMasonryElementsShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_masonry_elements_shortcode' );
}

if ( class_exists( 'PharmaCareCore_List_Shortcode' ) ) {
	class PharmaCareCoreMasonryElementsShortcode extends PharmaCareCore_List_Shortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/masonry-elements' );
			$this->set_base( 'pharmacare_core_masonry_elements_gallery' );
			$this->set_name( esc_html__( 'Masonry Elements', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds Masonry Elements holder', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCareCore Core', 'pharmacare-core' ) );
			$this->map_list_options( array(
             'exclude_behavior' => array( 'columns', 'slider', 'justified-gallery' ),
			 'exclude_option'   => array( 'images_proportion', 'masonry_images_proportion' ),
             'include_columns'   => array('7' => esc_attr__( 'Seven', 'pharmacare-core' ), '8' => esc_attr__( 'Eight', 'pharmacare-core' )),
			) );
            $this->set_option( array(
                'field_type'  => 'image',
                'name'        => 'logo',
                'title'       => esc_html__( 'Logo', 'pharmacare-core' ),
                'description' => esc_html__( 'Absolutely positioned logo image over elements list', 'pharmacare-core' ),
            ) );
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'images_overlay',
					'title'         => esc_html__( 'Enable Images Overlay', 'pharmacare-core' ),
					'options'       => pharmacare_core_get_select_type_options_pool( 'yes_no' ),
					'default_value' => 'yes',
				)
			);
			$this->set_option( array(
				'field_type' => 'repeater',
				'name'       => 'children',
				'title'      => esc_html__( 'Masonry Elements Items', 'pharmacare-core' ),
				'items'      => array(
					array(
					   'field_type' => 'image',
					   'name'       => 'image',
					   'title'      => esc_html__( 'Image', 'pharmacare-core' )
					),
                    array(
                        'field_type'  => 'select',
                        'name'        => 'masonry_image_dimension',
                        'title'       => esc_html__( 'Image Dimension', 'pharmacare-core' ),
                        'description' => esc_html__( 'Choose an image layout for the list. If you are using fixed image proportions on the list, choose an option other than default', 'pharmacare-core' ),
                        'options'     => pharmacare_core_get_select_type_options_pool( 'masonry_image_dimension' )
                    ),
				)
			) );
            $this->set_option( array(
                'field_type'    => 'select',
                'name'          => 'appear_animation',
                'title'         => esc_html__( 'Enable Appear Animation', 'pharmacare-core' ),
                'options'       => pharmacare_core_get_select_type_options_pool( 'yes_no', false ),
                'default_value' => 'no',
                'group'         => esc_html__( 'Animation Options', 'pharmacare-core' )
            ) );
            $this->set_option( array(
                'field_type'    => 'select',
                'name'          => 'wait_for_spinner',
                'title'         => esc_html__( 'Wait For Spinner', 'pharmacare-core' ),
                'options'       => pharmacare_core_get_select_type_options_pool( 'yes_no', false ),
                'default_value' => 'no',
                'dependency' => array(
                    'show' => array(
                        'appear_animation' => array(
                            'values'        => 'yes',
                            'default_value' => ''
                        )
                    )
                ),
                'group'         => esc_html__( 'Animation Options', 'pharmacare-core' )
            ) );
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts                   = $this->get_atts();
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['item_classes']   = $this->get_item_classes( $atts );
			$atts['this_object']    = $this;
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			
			return pharmacare_core_get_template_part( 'shortcodes/masonry-elements', 'templates/masonry-elements', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-masonry-elements';
			$holder_classes[] = ! empty( $atts['images_overlay'] ) && 'yes' === $atts['images_overlay']  ? 'qodef-images-overlay--' . $atts['images_overlay'] : '';
            $holder_classes[] = ! empty( $atts['appear_animation'] ) && 'yes' === $atts['appear_animation'] ? 'qodef-appear-animation--enabled' : '';
            $holder_classes[] = ! empty( $atts['wait_for_spinner'] ) && 'yes' === $atts['wait_for_spinner'] ? 'qodef-wait-for-spinner--enabled' : '';
			$list_classes     = $this->get_list_classes( $atts );
			
			$holder_classes          = array_merge( $holder_classes, $list_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		public function get_item_classes( $atts ) {
			$item_classes = $this->init_item_classes();
			$item_holder_classe[] = 'qodef-e-masonry-elements-item';
			
			$list_item_classes = $this->get_list_item_classes( $atts );
			
			$item_classes = array_merge( $item_classes, $list_item_classes, $item_holder_classe );
			
			return implode( ' ', $item_classes );
		}

		public function getItemAdditional( $items_atts ) {
			$additional = array();
			
			$additional['classes']       = 'qodef-m-masonry-elements-image';
			$additional['circle_styles'] = '';
			$additional['image_styles']  = '';
			
			$additional['classes'] .= isset( $items_atts['image_background_color'] ) ? 'qodef-has-background' : '';
			
			if ( ! empty( $items_atts['circle_background_color'] ) ) {
				$additional['circle_styles'] = 'background-color: ' . $items_atts['circle_background_color'];
			}
			
			if ( ! empty( $items_atts['image_background_color'] ) ) {
				$additional['image_styles'] = 'background-color: ' . $items_atts['image_background_color'];
			}
			
			return $additional;
		}
	}
}
