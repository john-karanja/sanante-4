<?php

if ( ! function_exists( 'pharmacare_core_add_section_title_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_section_title_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Section_Title_Shortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_section_title_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_Section_Title_Shortcode extends PharmaCareCore_Shortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/section-title' );
			$this->set_base( 'pharmacare_core_section_title' );
			$this->set_name( esc_html__( 'Section Title', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds section title element', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
				)
			);
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'line_break_positions',
				'title'       => esc_html__( 'Positions of Line Break', 'pharmacare-core' ),
				'description' => esc_html__( 'Enter the positions of the words after which you would like to create a line break. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a line break, you would enter "1,3,4")', 'pharmacare-core' ),
				'group'       => esc_html__( 'Title Style', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'disable_title_break_words',
				'title'         => esc_html__( 'Disable Title Line Break', 'pharmacare-core' ),
				'description'   => esc_html__( 'Enabling this option will disable title line breaks for screen size 1024 and lower', 'pharmacare-core' ),
				'options'       => pharmacare_core_get_select_type_options_pool( 'no_yes', false ),
				'default_value' => 'no',
				'group'         => esc_html__( 'Title Style', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'pharmacare-core' ),
				'options'       => pharmacare_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h2',
				'group'         => esc_html__( 'Title Style', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'title_color',
				'title'      => esc_html__( 'Title Color', 'pharmacare-core' ),
				'group'      => esc_html__( 'Title Style', 'pharmacare-core' )
			) );
            $this->set_option( array(
                'field_type' => 'text',
                'name'       => 'margin',
                'title'      => esc_html__( 'Margin', 'pharmacare-core' ),
                'group'      => esc_html__( 'Title Style', 'pharmacare-core' )
            ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'link',
				'title'      => esc_html__( 'Title Custom Link', 'pharmacare-core' ),
				'group'      => esc_html__( 'Title Style', 'pharmacare-core' )
			) );
            $this->set_option(
                array(
                    'field_type' => 'select',
                    'name'       => 'title_decoration',
                    'title'      => esc_html__( 'Enable Title Decoration', 'pharmacare-core' ),
                    'options'    => pharmacare_core_get_select_type_options_pool( 'yes_no' ),
                    'group'      => esc_html__( 'Title Style', 'pharmacare-core' )
                )
            );
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
				),
				'group'      => esc_html__( 'Title Style', 'pharmacare-core' )
			) );
            $this->set_option(
                array(
                    'field_type' => 'select',
                    'name'       => 'text_transform',
                    'title'      => esc_html__( 'Text Transform', 'pharmacare-core' ),
                    'options'    => pharmacare_core_get_select_type_options_pool( 'text_transform' ),
                    'group'      => esc_html__( 'Title Style', 'pharmacare-core' )
                )
            );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'text',
				'title'      => esc_html__( 'Text', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'pharmacare-core' ),
				'group'      => esc_html__( 'Text Style', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_margin_top',
				'title'      => esc_html__( 'Text Margin Top', 'pharmacare-core' ),
				'group'      => esc_html__( 'Text Style', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'text_padding',
				'title'      => esc_html__( 'Text Padding (10px 20px)', 'pharmacare-core' ),
				'group'      => esc_html__( 'Text Style', 'pharmacare-core' )
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'content_alignment',
				'title'      => esc_html__( 'Content Alignment', 'pharmacare-core' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'pharmacare-core' ),
					'left'   => esc_html__( 'Left', 'pharmacare-core' ),
					'center' => esc_html__( 'Center', 'pharmacare-core' ),
					'right'  => esc_html__( 'Right', 'pharmacare-core' )
				),
			) );
			$this->set_option( array(
                'field_type'    => 'select',
                'name'          => 'appear_animation',
                'title'         => esc_html__( 'Enable Appear Animation', 'pharmacare-core' ),
                'options'       => pharmacare_core_get_select_type_options_pool( 'yes_no', false ),
                'default_value' => 'yes',
                'group'         => esc_html__( 'Animation Options', 'pharmacare-core' )
            ) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['title']          = $this->get_modified_title( $atts );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			
			return pharmacare_core_get_template_part( 'shortcodes/section-title', 'templates/section-title', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-section-title';
            $holder_classes[] = 'yes' ===  $atts['title_decoration'] ?  'qodef-title-decoration' : '';
			$holder_classes[] = ! empty( $atts['content_alignment'] ) ?  'qodef-alignment--' . $atts['content_alignment'] : 'qodef-alignment--left';
			$holder_classes[]  = 'yes' === $atts['disable_title_break_words'] ? 'qodef-title-break--disabled' : '';
			$holder_classes[] = ! empty( $atts['appear_animation'] ) && 'yes' === $atts['appear_animation'] ? 'qodef-appear-animation--enabled' : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_modified_title( $atts ) {
			$title = $atts['title'];
			
			if ( ! empty( $title ) && ! empty( $atts['line_break_positions'] ) ) {
				$split_title          = explode( ' ', $title );
				$line_break_positions = explode( ',', str_replace( ' ', '', $atts['line_break_positions'] ) );
				
				foreach ( $line_break_positions as $position ) {
					$position = intval($position);

					if ( isset( $split_title[ $position - 1 ] ) && ! empty( $split_title[ $position - 1 ] ) ) {
						$split_title[ $position - 1 ] = $split_title[ $position - 1 ] . '<br />';
					}
				}
				
				$title = implode( ' ', $split_title );
			}
			
			return $title;
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['title_color'] ) ) {
				$styles[] = 'color: ' . $atts['title_color'];
			}

            if ( '' !== $atts['margin'] ) {
                $styles[] = 'margin: ' . $atts['margin'];
            }

            if ( ! empty( $atts['text_transform'] ) ) {
                $styles[] = 'text-transform: ' . $atts['text_transform'];
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

			if ( ! empty( $atts['text_padding'] ) ) {
				$styles[] = 'padding: ' . $atts['text_padding'];
			}
			
			return $styles;
		}
	}
}
