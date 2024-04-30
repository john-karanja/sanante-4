<?php

if ( ! function_exists( 'pharmacare_core_add_cards_gallery_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes
	 *
	 * @return array
	 */
	function pharmacare_core_add_cards_gallery_shortcode( $shortcodes ) {
		$shortcodes[] = 'PharmaCareCore_Cards_Gallery_Shortcode';

		return $shortcodes;
	}

	add_filter( 'pharmacare_core_filter_register_shortcodes', 'pharmacare_core_add_cards_gallery_shortcode' );
}

if ( class_exists( 'PharmaCareCore_Shortcode' ) ) {
	class PharmaCareCore_Cards_Gallery_Shortcode extends PharmaCareCore_Shortcode {

		public function map_shortcode() {
			$this->set_shortcode_path( PHARMACARE_CORE_SHORTCODES_URL_PATH . '/cards-gallery' );
			$this->set_base( 'pharmacare_core_cards_gallery' );
			$this->set_name( esc_html__( 'Cards Gallery', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds cards gallery holder', 'pharmacare-core' ) );
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
					'field_type'    => 'select',
					'name'          => 'link_target',
					'title'         => esc_html__( 'Link Target', 'pharmacare-core' ),
					'options'       => pharmacare_core_get_select_type_options_pool( 'link_target' ),
					'default_value' => '_self',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'orientation',
					'title'         => esc_html__( 'Info Position', 'pharmacare-core' ),
					'options'       => array(
						''      => esc_html__( 'Default', 'pharmacare-core' ),
						'right' => esc_html__( 'Shuffled Right', 'pharmacare-core' ),
						'left'  => esc_html__( 'Shuffled Left', 'pharmacare-core' ),
					),
					'default_value' => 'right',
				)
			);
			$this->set_option(
				array(
					'field_type'    => 'select',
					'name'          => 'bundle_animation',
					'title'         => esc_html__( 'Bundle Animation', 'pharmacare-core' ),
					'options'       => pharmacare_core_get_select_type_options_pool( 'no_yes' ),
					'default_value' => 'no',
				)
			);
			$this->set_option(
				array(
					'field_type' => 'repeater',
					'name'       => 'children',
					'title'      => esc_html__( 'Image Items', 'pharmacare-core' ),
					'items'      => array(
						array(
							'field_type'    => 'text',
							'name'          => 'item_link',
							'title'         => esc_html__( 'Link', 'pharmacare-core' ),
							'default_value' => '',
						),
						array(
							'field_type' => 'image',
							'name'       => 'item_image',
							'title'      => esc_html__( 'Item Image', 'pharmacare-core' ),
						),
					),
				)
			);
			$this->map_extra_options();
		}

		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();

			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );

			return pharmacare_core_get_template_part( 'shortcodes/cards-gallery', 'templates/cards-gallery', '', $atts );
		}

		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();

			$holder_classes[] = 'qodef-cards-gallery';
			$holder_classes[] = ! empty( $atts['orientation'] ) ? 'qodef-orientation--' . $atts['orientation'] : 'qodef-orientation--right';
			$holder_classes[] = isset( $atts['bundle_animation'] ) && 'yes' === $atts['bundle_animation'] ? 'qodef-animation--bundle' : 'qodef-animation--no';

			return implode( ' ', $holder_classes );
		}
	}
}
