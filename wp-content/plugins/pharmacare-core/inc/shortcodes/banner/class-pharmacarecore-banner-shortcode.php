<?php

if ( ! function_exists( 'pharmacare_core_add_banner_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_banner_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Banner_Shortcode';

		return $shortcodes;
	}

	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_banner_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_Banner_Shortcode extends PharmaCareCore_Shortcode {

		public function __construct() {
			$this->set_layouts( apply_filters( 'pharmacare_core_filter_banner_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'pharmacare_core_filter_banner_extra_options', array() ) );

			parent::__construct();
		}

		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/banner' );
			$this->set_base( 'pharmacare_core_banner' );
			$this->set_name( esc_html__( 'Banner', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds banner element', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
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
				)
			);

			$options_map = pharmacare_core_get_variations_options_map( $this->get_layouts() );

			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'layout',
					'title'         => esc_html__( 'Layout', 'pharmacare-core' ),
					'options'       => $this->get_layouts(),
					'default_value' => $options_map['default_value'],
					'visibility'    => array( 'map_for_page_builder' => $options_map['visibility'] ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'enable_min_height',
					'title'         => esc_html__( 'Enable Min Height', 'pharmacare-core' ),
					'description' => esc_html__( 'When set, min height will maintain banner height across devices and image object will be set to cover available space', 'pharmacare-core' ),
					'options'       => pharmacare_core_get_select_type_options_pool( 'no_yes', false ),
					'default_value' => 'no',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'min_height_value',
					'title'      => esc_html__( 'Min Height Value (px)', 'pharmacare-core' ),
					'dependency' => array(
						'show' => array(
							'enable_min_height' => array(
								'values'        => 'yes',
								'default_value' => 'no',
							),
						),
					),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'image',
					'name'       => 'image',
					'title'      => esc_html__( 'Image', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link_url',
					'title'      => esc_html__( 'Link', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'pharmacare-core' ),
					'options'       => pharmacare_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title',
					'title'      => esc_html__( 'Title', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'title_tag',
					'title'         => esc_html__( 'Title Tag', 'pharmacare-core' ),
					'options'       => pharmacare_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h3',
					'group'         => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'title_color',
					'title'      => esc_html__( 'Title Color', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_width',
					'title'      => esc_html__( 'Title Max Width (px)', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_margin_top',
					'title'      => esc_html__( 'Title Margin Top', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_margin_bottom',
					'title'      => esc_html__( 'Title Margin Bottom', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_margin_left',
					'title'      => esc_html__( 'Title Margin Left', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'title_margin_right',
					'title'      => esc_html__( 'Title Margin Right', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'subtitle',
					'title'      => esc_html__( 'Subtitle', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'subtitle_tag',
					'title'         => esc_html__( 'Subtitle Tag', 'pharmacare-core' ),
					'options'       => pharmacare_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'h5',
					'group'         => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'subtitle_color',
					'title'      => esc_html__( 'Subtitle Color', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'subtitle_margin_top',
					'title'      => esc_html__( 'Subtitle Margin Top', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_field',
					'title'      => esc_html__( 'Text', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'text_tag',
					'title'         => esc_html__( 'Text Tag', 'pharmacare-core' ),
					'options'       => pharmacare_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => 'p',
					'group'         => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'color',
					'name'       => 'text_color',
					'title'      => esc_html__( 'Text Color', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'text_margin_top',
					'title'      => esc_html__( 'Text Margin Top', 'pharmacare-core' ),
					'group'      => esc_html__( 'Content', 'pharmacare-core' ),
				)
			);
			$this->import_shortcode_options(
				array(
					'shortcode_base'    => 'pharmacare_core_button',
					'exclude'           => array( 'custom_class', 'link', 'target' ),
					'additional_params' => array(
						'group'      => esc_html__( 'Button', 'pharmacare-core' ),
						'dependency' => array(
							'show' => array(
								'layout' => array(
									'values'        => array ('link-button', 'link-button-top'),
									'default_value' => '',
								),
							),
						),
					),
				)
			);

			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes']  = $this->get_holder_classes( $atts );
			$atts['holder_styles']   = $this->get_holder_styles( $atts );
			$atts['title_styles']    = $this->get_title_styles( $atts );
			$atts['subtitle_styles'] = $this->get_subtitle_styles( $atts );
			$atts['text_styles']     = $this->get_text_styles( $atts );
			$atts['button_params']   = $this->generate_button_params( $atts );

			return pharmacare_core_get_template_part( 'shortcodes/banner', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-banner';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes[] = ! empty( $atts['skin'] ) ? 'qodef-banner--' . $atts['skin'] : '';
			$holder_classes[] = ! empty( $atts['enable_min_height'] ) && 'yes' === $atts['enable_min_height'] ? 'qodef-enable-min-height--' . $atts['enable_min_height'] : '';

			return implode( ' ', $holder_classes );
		}

		private function get_holder_styles( $atts ) {
			$styles = array();

			if ( ! empty( $atts['min_height_value'] ) ) {
				$styles[] = 'height: ' . $atts['min_height_value'];
			}

			return $styles;
		}

		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( '' !== $atts['title_margin_bottom'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_bottom'] ) ) {
					$styles[] = 'margin-bottom: ' . $atts['title_margin_bottom'];
				} else {
					$styles[] = 'margin-bottom: ' . intval( $atts['title_margin_bottom'] ) . 'px';
				}
			}
			
			if ( '' !== $atts['title_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['title_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['title_margin_top'] ) . 'px';
				}
			}
			
			if ( '' !== $atts['title_margin_left'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_left'] ) ) {
					$styles[] = 'margin-left: ' . $atts['title_margin_left'];
				} else {
					$styles[] = 'margin-left: ' . intval( $atts['title_margin_left'] ) . 'px';
				}
			}
			
			if ( '' !== $atts['title_margin_right'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['title_margin_right'] ) ) {
					$styles[] = 'margin-right: ' . $atts['title_margin_right'];
				} else {
					$styles[] = 'margin-right: ' . intval( $atts['title_margin_right'] ) . 'px';
				}
			}
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}
			
			if ( ! empty( $atts['title_width'] ) ) {
				$styles[] = 'max-width: ' . $atts['title_width'];
			}

			return $styles;
		}

		private function get_subtitle_styles( $atts ) {
			$styles = array();

			if ( '' !== $atts['subtitle_margin_top'] ) {
				if ( qode_framework_string_ends_with_space_units( $atts['subtitle_margin_top'] ) ) {
					$styles[] = 'margin-top: ' . $atts['subtitle_margin_top'];
				} else {
					$styles[] = 'margin-top: ' . intval( $atts['subtitle_margin_top'] ) . 'px';
				}
			}

			if ( ! empty( $atts['subtitle_color'] ) ) {
				$styles[] = 'color: ' . $atts['subtitle_color'];
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

		private function generate_button_params( $atts ) {
			$params = $this->populate_imported_shortcode_atts(
				array(
					'shortcode_base' => 'pharmacare_core_button',
					'exclude'        => array( 'custom_class', 'link', 'target' ),
					'atts'           => $atts,
				)
			);

			$params['link']   = ! empty( $atts['link_url'] ) ? $atts['link_url'] : '';
			$params['target'] = ! empty( $atts['link_target'] ) ? $atts['link_target'] : '';

			return $params;
		}
	}
}
