<?php

if ( ! function_exists( 'pharmacare_core_add_icon_list_item_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_icon_list_item_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Icon_List_Item_Shortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_icon_list_item_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_Icon_List_Item_Shortcode extends PharmaCareCore_Shortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/icon-list-item' );
			$this->set_base( 'pharmacare_core_icon_list_item' );
			$this->set_name( esc_html__( 'Icon List Item', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds icon list item element', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'item_margin_bottom',
				'title'      => esc_html__( 'Item Margin Bottom', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'text',
				'name'          => 'link',
				'title'         => esc_html__( 'Link', 'pharmacare-core' ),
				'default_value' => ''
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'target',
				'title'         => esc_html__( 'Link Target', 'pharmacare-core' ),
				'options'       => pharmacare_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'icon_type',
				'title'         => esc_html__( 'Icon Type', 'pharmacare-core' ),
				'options'       => array(
					'icon-pack'   => esc_html__( 'Icon Pack', 'pharmacare-core' ),
					'custom-icon' => esc_html__( 'Custom Icon', 'pharmacare-core' )
				),
				'default_value' => 'icon-pack'
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'custom_icon',
				'title'      => esc_html__( 'Custom Icon', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'icon_type' => array(
							'values'        => 'custom-icon',
							'default_value' => 'icon-pack'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'custom_icon_margin',
				'title'       => esc_html__( 'Custom Icon Margin', 'pharmacare-core' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left', 'pharmacare-core' ),
				'dependency'  => array(
					'show' => array(
						'icon_type' => array(
							'values'        => 'custom-icon',
							'default_value' => 'icon-pack'
						)
					)
				)
			) );
			$this->import_shortcode_options( array(
				'shortcode_base'    => 'pharmacare_core_icon',
				'exclude'           => array( 'custom_class', 'link', 'target', 'margin', 'size' ),
				'additional_params' => array(
					'group'      => esc_html__( 'Icon', 'pharmacare-core' ),
					'dependency' => array(
						'show' => array(
							'icon_type' => array(
								'values'        => 'icon-pack',
								'default_value' => 'icon-pack'
							)
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'pharmacare-core' ),
				'group'      => esc_html__( 'Title', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'pharmacare-core' ),
				'options'       => pharmacare_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'p',
				'group'         => esc_html__( 'Title', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'pharmacare-core' ),
				'group'      => esc_html__( 'Title', 'pharmacare-core' )
			) );
            $this->set_option( array(
                'field_type' => 'select',
                'name'       => 'title_text_transform',
                'title'      => esc_html__( 'Title Text Transform', 'pharmacare-core' ),
                'options'    => pharmacare_core_get_select_type_options_pool( 'text_transform' ),
                'group'      => esc_html__( 'Title', 'pharmacare-core' )
            ) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']     = $this->get_holder_classes( $atts );
			$atts['holder_styles']      = $this->get_holder_styles( $atts );
			$atts['title_styles']       = $this->get_title_styles( $atts );
			$atts['custom_icon_styles'] = $this->get_custom_icon_styles( $atts );
			$atts['icon_params']        = $this->generate_icon_params( $atts );
			
			return pharmacare_core_get_template_part( 'shortcodes/icon-list-item', 'templates/icon-list-item', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = array();
			
			$holder_classes[] = 'qodef-icon-list-item';
			$holder_classes[] = ! empty( $atts['icon_type'] ) ? 'qodef-icon--' . $atts['icon_type'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_holder_styles( $atts ) {
			$styles = array();
			
			if ( '' !== $atts['item_margin_bottom'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['item_margin_bottom'] ) ) {
					$styles[] = 'margin-bottom: ' . $atts['item_margin_bottom'];
				} else {
					$styles[] = 'margin-bottom: ' . intval( $atts['item_margin_bottom'] ) . 'px';
				}
			}
			
			return $styles;
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			if ( ! empty( $atts['title_text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['title_text_transform'];
			}
			
			return $styles;
		}

		private function get_custom_icon_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['custom_icon_margin'] ) ) {
				$styles[] = 'margin: ' . $atts['custom_icon_margin'];
			}

			return $styles;
		}
		
		private function generate_icon_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts( array(
				'shortcode_base' => 'pharmacare_core_icon',
				'exclude'        => array( 'custom_class', 'link', 'target', 'margin', 'size' ),
				'atts'           => $atts,
			) );
			
			return $params;
		}
	}
}
