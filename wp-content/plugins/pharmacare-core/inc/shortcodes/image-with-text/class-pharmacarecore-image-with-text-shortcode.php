<?php

if ( ! function_exists( 'pharmacare_core_add_image_with_text_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_image_with_text_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Image_With_Text_Shortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_image_with_text_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_Image_With_Text_Shortcode extends PharmaCareCore_Shortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'pharmacare_core_filter_image_with_text_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'pharmacare_core_filter_image_with_text_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/image-with-text' );
			$this->set_base( 'pharmacare_core_image_with_text' );
			$this->set_name( esc_html__( 'Image With Text', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds image with text element', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
				)
			);
			
			$options_map = pharmacare_core_get_variations_options_map( $this->get_layouts() );
			
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'layout',
				'title'         => esc_html__( 'Layout', 'pharmacare-core' ),
				'options'		=> $this->get_layouts(),
				'default_value' => $options_map['default_value'],
				'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] )
			) );
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'image',
				'title'      => esc_html__( 'Image', 'pharmacare-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'image_size',
				'title'      => esc_html__( 'Image Size', 'pharmacare-core' ),
				'description'=> esc_html__( 'For predefined image sizes input thumbnail, medium, large or full. If you wish to set a custom image size, type in the desired image dimensions in pixels (e.g. 400x400).', 'pharmacare-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'image_shadow',
				'title'         => esc_html__( 'Image Shadow', 'pharmacare-core' ),
				'options'       => pharmacare_core_get_select_type_options_pool( 'no_yes', false ),
				'default_value' => 'no',
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'text-below',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'image_action',
				'title'         => esc_html__( 'Image Action', 'pharmacare-core' ),
				'options'       => array(
					''            => esc_html__( 'No Action', 'pharmacare-core' ),
					'open-popup'  => esc_html__( 'Open Popup', 'pharmacare-core' ),
					'custom-link' => esc_html__( 'Custom Link', 'pharmacare-core' )
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link',
				'title'      => esc_html__( 'Custom Link', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'image_action' => array(
							'values'        => 'custom-link',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'target',
				'title'         => esc_html__( 'Custom Link Target', 'pharmacare-core' ),
				'options'       => pharmacare_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self',
				'dependency' => array(
					'show' => array(
						'image_action' => array(
							'values'        => 'custom-link',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option(
				array(
					'field_type' => 'select',
					'name'       => 'skin',
					'title'      => esc_html__( 'Skin', 'pharmacare-core' ),
					'options'    => array(
						''      => esc_html__( 'Default', 'pharmacare-core' ),
						'light' => esc_html__( 'Light', 'pharmacare-core' ),
					),
				)
			);
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'pharmacare-core' ),
				'group'      => esc_html__( 'Content', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'pharmacare-core' ),
				'options'       => pharmacare_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h4',
				'group'         => esc_html__( 'Content', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'pharmacare-core' ),
				'group'      => esc_html__( 'Content', 'pharmacare-core' )
			) );
            $this->set_option( array(
                'field_type' => 'select',
                'name'       => 'title_text_transform',
                'title'      => esc_html__( 'Title Text Transform', 'pharmacare-core' ),
                'options'    => pharmacare_core_get_select_type_options_pool( 'text_transform' ),
                'group'      => esc_html__( 'Content', 'pharmacare-core' )
            ) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'title_text_align',
				'title'      => esc_html__( 'Title Text Align', 'pharmacare-core' ),
				'options'    => pharmacare_core_get_select_type_options_pool( 'text_align' ),
				'group'      => esc_html__( 'Content', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title_margin_top',
				'title'      => esc_html__( 'Title Margin Top', 'pharmacare-core' ),
				'group'      => esc_html__( 'Content', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'text',
				'title'      => esc_html__( 'Text', 'pharmacare-core' ),
				'group'      => esc_html__( 'Content', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'more_text',
				'title'      => esc_html__( 'Additional Text', 'pharmacare-core' ),
				'group'      => esc_html__( 'Content', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'pharmacare-core' ),
				'group'      => esc_html__( 'Content', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_margin_top',
				'title'      => esc_html__( 'Text Margin Top', 'pharmacare-core' ),
				'group'      => esc_html__( 'Content', 'pharmacare-core' )
			) );
			$this->map_extra_options();
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'pharmacare_core_image_with_text', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			$atts['image_params']   = $this->generate_image_params( $atts );
			
			return pharmacare_core_get_template_part( 'shortcodes/image-with-text', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-image-with-text';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['skin'] ) ? 'qodef-skin--' . $atts['skin'] : '';
			$holder_classes[] = ! empty( $atts['image_shadow'] ) && 'yes' === $atts['image_shadow'] ? 'qodef-image-shadow--' . $atts['image_shadow'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( '' !== $atts['title_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

			if ( ! empty( $atts['title_text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['title_text_transform'];
			}

			if ( ! empty( $atts['title_text_align'] ) ) {
				$styles[] = 'text-align: ' . $atts['title_text_align'];
			}
			
			return $styles;
		}
		
		private function get_text_styles( $atts ) {
			$styles = array();
			
			if ( '' !== $atts['text_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['text_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['text_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['text_margin_top'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
		
		private function generate_image_params( $atts ) {
			$image = array();
			
			if ( ! empty( $atts['image'] ) ) {
				$id = $atts['image'];
				
				$image['image_id'] = intval( $id );
				$image_original    = wp_get_attachment_image_src( $id, 'full' );
				$image['url']      = $image_original[0];
				$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
				
				$image_size = trim( $atts['image_size'] );
				preg_match_all( '/\d+/', $image_size, $matches ); /* check if numeral width and height are entered */
				if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ), true ) ) {
					$image['image_size'] = $image_size;
				} elseif ( ! empty( $matches[0] ) ) {
					$image['image_size'] = array(
						$matches[0][0],
						$matches[0][1]
					);
				} else {
					$image['image_size'] = 'full';
				}
			}
			
			return $image;
		}
	}
}
