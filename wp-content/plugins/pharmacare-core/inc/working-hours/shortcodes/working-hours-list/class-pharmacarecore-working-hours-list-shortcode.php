<?php

if ( ! function_exists( 'pharmacare_core_add_working_hours_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_working_hours_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Working_Hours_List_Shortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_working_hours_list_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_Working_Hours_List_Shortcode extends PharmaCareCore_Shortcode {
		
		public function __construct() {
			$this->set_layouts( apply_filters( 'pharmacare_core_filter_whl_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'pharmacare_core_filter_whl_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_INC_URL_PATH . '/working-hours/shortcodes/working-hours-list' );
			$this->set_base( 'pharmacare_core_working_hours_list' );
			$this->set_name( esc_html__( 'Working Hours List', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays working hours list', 'pharmacare-core' ) );
			$this->set_category( esc_html__( 'PharmaCare Core', 'pharmacare-core' ) );
			
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'custom_class',
					'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
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
				)
			);
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'city',
				'title'      => esc_html__( 'City', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'simple',
							'default_value' => 'standard'
						)
					)
				)
			) );
			
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Working Hours', 'pharmacare-core' ),
					'items'      => array(
						array(
							'field_type'    => 'text',
							'name'          => 'days',
							'title'         => esc_html__( 'Days', 'pharmacare-core' ),
							'default_value' => '',
						),
						array(
							'field_type' => 'text',
							'name'       => 'hours',
							'title'      => esc_html__( 'Working Hours', 'pharmacare-core' ),
						),
					),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        =>  'simple',
								'default_value' => 'standard'
							)
						)
					)
				)
			);
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'address1',
				'title'      => esc_html__( 'Address Line 1', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        =>'simple',
							'default_value' => 'standard'
						)
					)
				)
			) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link1',
					'title'      => esc_html__( 'Address 1 Link', 'pharmacare-core' ),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        =>'simple',
								'default_value' => 'standard'
							)
						)
					)
				)
			);
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'address2',
				'title'      => esc_html__( 'Address Line 2', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        =>'simple',
							'default_value' => 'standard'
						)
					)
				)
			) );
			$this->set_option(
				array(
					'field_type' => 'text',
					'name'       => 'link2',
					'title'      => esc_html__( 'Address 2 Link', 'pharmacare-core' ),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        =>'simple',
								'default_value' => 'standard'
							)
						)
					)
				)
			);
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'title',
				'title'      => esc_html__( 'Title', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'classic',
							'default_value' => 'standard'
						)
					)
				)
			) );
			
			$this->set_option( array(
				'field_type' => 'image',
				'name'       => 'image_logo',
				'title'      => esc_html__( 'Image', 'pharmacare-core' ),
				'dependency' => array(
					'show' => array(
						'layout' => array(
							'values'        => 'classic',
							'default_value' => 'standard'
						)
					)
				)
			) );
			
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'classic_children',
					'title'      => esc_html__( 'Working Hours', 'pharmacare-core' ),
					
					'items'      => array(
						array(
							'field_type'    => 'text',
							'name'          => 'classic_location',
							'title'         => esc_html__( 'Location', 'pharmacare-core' ),
							'default_value' => '',
							'visibility'    => array(
								'map_for_page_builder' => $options_map['visibility'],
								'map_for_widget'       => $options_map['visibility'],
							),
						),
						array(
							'field_type' => 'text',
							'name'       => 'weekly_hours',
							'title'      => esc_html__( 'Monday - Friday', 'pharmacare-core' ),
						),
						array(
							'field_type' => 'text',
							'name'       => 'saturday_hours',
							'title'      => esc_html__( 'Saturday', 'pharmacare-core' ),
						),
						array(
							'field_type' => 'text',
							'name'       => 'sunday_hours',
							'title'      => esc_html__( 'Sunday', 'pharmacare-core' ),
						),
					),
					'dependency' => array(
						'show' => array(
							'layout' => array(
								'values'        =>  'classic',
								'default_value' => 'standard'
							)
						)
					)
				)
			);
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['holder_classes']               = $this->get_holder_classes($atts);
			$atts['items']                        = $this->parse_repeater_items( $atts['children'] );
			$atts['classic_items']                = $this->parse_repeater_items( $atts['classic_children'] );
			$atts['working_hours_params']         = $this->get_working_hours_params();
			$atts['working_hours_special_params'] = $this->get_working_hours_special_params();
			
			return pharmacare_core_get_template_part( 'working-hours/shortcodes/working-hours-list', 'variations/' . $atts['layout'] . '/templates/' . $atts['layout'], '', $atts );
		}
		
		private function get_holder_classes($atts) {
			
			$holder_classes   = $this->init_holder_classes();
			$holder_classes[] = 'qodef-working-hours-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-layout--' . $atts['layout'] : '';
			$holder_classes   = array_merge( $holder_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_working_hours_params() {
			$params = array();
			
			return apply_filters( 'pharmacare_core_filter_working_hours_template_params', $params );
		}
		
		private function get_working_hours_special_params() {
			$params = array();
			
			return apply_filters( 'pharmacare_core_filter_working_hours_special_template_params', $params );
		}
	}
}
