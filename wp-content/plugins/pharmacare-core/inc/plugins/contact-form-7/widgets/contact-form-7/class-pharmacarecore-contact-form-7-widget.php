<?php

if ( ! function_exists( 'pharmacare_core_add_contact_form_7_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param array $widgets
	 *
	 * @return array
	 */
	function pharmacare_core_add_contact_form_7_widget( $widgets ) {
		$widgets[] = 'PharmaCareCore_Contact_Form_7_Widget';

		return $widgets;
	}

	add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_contact_form_7_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class PharmaCareCore_Contact_Form_7_Widget extends QodeFrameworkWidget {

		public function map_widget() {
			$this->set_base( 'pharmacare_core_contact_form_7' );
			$this->set_name( esc_html__( 'PharmaCare Contact Form 7', 'pharmacare-core' ) );
			$this->set_description( esc_html__( 'Add contact form 7 to widget areas', 'pharmacare-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Widget Title', 'pharmacare-core' ),
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'contact_form_id',
					'title'      => esc_html__( 'Select Contact Form 7', 'pharmacare-core' ),
					'options'    => pharmacare_core_get_contact_form_7_forms(),
				)
			);
		}

		public function render( $atts ) { ?>
			<div class="qodef-contact-form-7">
				<?php
				if ( ! empty( $atts['contact_form_id'] ) ) {
					echo do_shortcode( '[contact-form-7 id="' . esc_attr( $atts['contact_form_id'] ) . '"]' ); // XSS OK
				}
				?>
			</div>
			<?php
		}
	}
}
