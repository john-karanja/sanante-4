<?php

if ( ! function_exists( 'pharmacare_core_add_fonts_options' ) ) {
	/**
	 * Function that add options for this module
	 */
	function pharmacare_core_add_fonts_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => PHARMACARE_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'fonts',
				'title'       => esc_html__( 'Fonts', 'pharmacare-core' ),
				'description' => esc_html__( 'Global Fonts Options', 'pharmacare-core' ),
				'icon'        => 'fa fa-cog',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_google_fonts',
					'title'         => esc_html__( 'Enable Google Fonts', 'pharmacare-core' ),
					'default_value' => 'yes',
					'args'          => array(
						'custom_class' => 'qodef-enable-google-fonts',
					),
				)
			);

			$google_fonts_section = $page->add_section_element(
				array(
					'name'       => 'qodef_google_fonts_section',
					'title'      => esc_html__( 'Google Fonts Options', 'pharmacare-core' ),
					'dependency' => array(
						'show' => array(
							'qodef_enable_google_fonts' => array(
								'values'        => 'yes',
								'default_value' => '',
							),
						),
					),
				)
			);

			$page_repeater = $google_fonts_section->add_repeater_element(
				array(
					'name'        => 'qodef_choose_google_fonts',
					'title'       => esc_html__( 'Google Fonts to Include', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose Google Fonts which you want to use on your website', 'pharmacare-core' ),
					'button_text' => esc_html__( 'Add New Google Font', 'pharmacare-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type'  => 'googlefont',
					'name'        => 'qodef_choose_google_font',
					'title'       => esc_html__( 'Google Font', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose Google Font', 'pharmacare-core' ),
					'args'        => array(
						'include' => 'google-fonts',
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_weight',
					'title'       => esc_html__( 'Google Fonts Weight', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts weights for your website. Impact on page load time', 'pharmacare-core' ),
					'options'     => array(
						'100'  => esc_html__( '100 Thin', 'pharmacare-core' ),
						'100i' => esc_html__( '100 Thin Italic', 'pharmacare-core' ),
						'200'  => esc_html__( '200 Extra-Light', 'pharmacare-core' ),
						'200i' => esc_html__( '200 Extra-Light Italic', 'pharmacare-core' ),
						'300'  => esc_html__( '300 Light', 'pharmacare-core' ),
						'300i' => esc_html__( '300 Light Italic', 'pharmacare-core' ),
						'400'  => esc_html__( '400 Regular', 'pharmacare-core' ),
						'400i' => esc_html__( '400 Regular Italic', 'pharmacare-core' ),
						'500'  => esc_html__( '500 Medium', 'pharmacare-core' ),
						'500i' => esc_html__( '500 Medium Italic', 'pharmacare-core' ),
						'600'  => esc_html__( '600 Semi-Bold', 'pharmacare-core' ),
						'600i' => esc_html__( '600 Semi-Bold Italic', 'pharmacare-core' ),
						'700'  => esc_html__( '700 Bold', 'pharmacare-core' ),
						'700i' => esc_html__( '700 Bold Italic', 'pharmacare-core' ),
						'800'  => esc_html__( '800 Extra-Bold', 'pharmacare-core' ),
						'800i' => esc_html__( '800 Extra-Bold Italic', 'pharmacare-core' ),
						'900'  => esc_html__( '900 Ultra-Bold', 'pharmacare-core' ),
						'900i' => esc_html__( '900 Ultra-Bold Italic', 'pharmacare-core' ),
					),
				)
			);

			$google_fonts_section->add_field_element(
				array(
					'field_type'  => 'checkbox',
					'name'        => 'qodef_google_fonts_subset',
					'title'       => esc_html__( 'Google Fonts Style', 'pharmacare-core' ),
					'description' => esc_html__( 'Choose a default Google Fonts style for your website. Impact on page load time', 'pharmacare-core' ),
					'options'     => array(
						'latin'        => esc_html__( 'Latin', 'pharmacare-core' ),
						'latin-ext'    => esc_html__( 'Latin Extended', 'pharmacare-core' ),
						'cyrillic'     => esc_html__( 'Cyrillic', 'pharmacare-core' ),
						'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'pharmacare-core' ),
						'greek'        => esc_html__( 'Greek', 'pharmacare-core' ),
						'greek-ext'    => esc_html__( 'Greek Extended', 'pharmacare-core' ),
						'vietnamese'   => esc_html__( 'Vietnamese', 'pharmacare-core' ),
					),
				)
			);

			$page_repeater = $page->add_repeater_element(
				array(
					'name'        => 'qodef_custom_fonts',
					'title'       => esc_html__( 'Custom Fonts', 'pharmacare-core' ),
					'description' => esc_html__( 'Add custom fonts', 'pharmacare-core' ),
					'button_text' => esc_html__( 'Add New Custom Font', 'pharmacare-core' ),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_ttf',
					'title'      => esc_html__( 'Custom Font TTF', 'pharmacare-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_otf',
					'title'      => esc_html__( 'Custom Font OTF', 'pharmacare-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff',
					'title'      => esc_html__( 'Custom Font WOFF', 'pharmacare-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'file',
					'name'       => 'qodef_custom_font_woff2',
					'title'      => esc_html__( 'Custom Font WOFF2', 'pharmacare-core' ),
					'args'       => array(
						'allowed_type' => 'application/octet-stream',
					),
				)
			);

			$page_repeater->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_custom_font_name',
					'title'      => esc_html__( 'Custom Font Name', 'pharmacare-core' ),
				)
			);

			// Hook to include additional options after module options
			do_action( 'pharmacare_core_action_after_page_fonts_options_map', $page );
		}
	}

	add_action( 'pharmacare_core_action_default_options_init', 'pharmacare_core_add_fonts_options', pharmacare_core_get_admin_options_map_position( 'fonts' ) );
}
