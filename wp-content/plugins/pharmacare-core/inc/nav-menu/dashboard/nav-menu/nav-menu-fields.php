<?php

if ( ! function_exists( 'pharmacare_core_add_nav_menu_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function pharmacare_core_add_nav_menu_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'nav_menu_item' ),
				'type'  => 'nav-menu',
			)
		);

		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef-enable-mega-menu',
					'title'      => esc_html__( 'Enable Mega Menu', 'pharmacare-core' ),
					'options'    => array(
						'enable' => esc_html__( 'Enable', 'pharmacare-core' ),
					),
					'args'       => array(
						'depth' => 0,
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef-enable-mega-menu-5-col',
					'title'      => esc_html__( 'Enable 5 Columns in Mega Menu', 'pharmacare-core' ),
					'options'    => array(
						'enable' => esc_html__( 'Enable', 'pharmacare-core' ),
					),
					'args'       => array(
						'depth' => 0,
					),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef-enable-mega-menu-6-col',
					'title'      => esc_html__( 'Enable 6 Columns in Mega Menu', 'pharmacare-core' ),
					'options'    => array(
						'enable' => esc_html__( 'Enable', 'pharmacare-core' ),
					),
					'args'       => array(
						'depth' => 0,
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef-enable-mega-menu-wide-last-column',
					'title'      => esc_html__( 'Enable Last Column Wide', 'pharmacare-core' ),
					'options'    => array(
						'enable' => esc_html__( 'Enable', 'pharmacare-core' ),
					),
					'args'       => array(
						'depth' => 0,
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'checkbox',
					'name'       => 'qodef-enable-anchor-link',
					'title'      => esc_html__( 'Enable Anchor Link', 'pharmacare-core' ),
					'options'    => array(
						'enable' => esc_html__( 'Enable', 'pharmacare-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef-wide-custom-class',
					'title'      => esc_html__( 'Custom Class', 'pharmacare-core' ),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef-menu-item-appearance',
					'title'      => esc_html__( 'Menu Item Appearance', 'pharmacare-core' ),
					'options'    => array(
						'none'       => esc_html__( 'None', 'pharmacare-core' ),
						'hide-item'  => esc_html__( 'Hide Item', 'pharmacare-core' ),
						'hide-link'  => esc_html__( 'Hide Link', 'pharmacare-core' ),
						'hide-label' => esc_html__( 'Hide Label', 'pharmacare-core' ),
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'iconpack',
					'name'       => 'qodef-menu-item-icon-pack',
					'title'      => esc_html__( 'Icon Pack', 'pharmacare-core' ),
					'args'       => array(
						'width' => 'thin',
					),
				)
			);

			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef-menu-item-background-image',
					'title'      => esc_html__( 'Background Image', 'pharmacare-core' ),
					'args'       => array(
						'width' => 'thin',
						'depth' => 0,
					),
				)
			);

			$custom_sidebars = pharmacare_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$page->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef-enable-mega-menu-widget',
						'title'       => esc_html__( 'Custom Sidebar', 'pharmacare-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on wide menu', 'pharmacare-core' ),
						'options'     => $custom_sidebars,
						'args'        => array(
							'depth' => 1,
						),
					)
				);
			}
		}
	}

	add_action( 'qode_framework_action_custom_nav_menu_fields', 'pharmacare_core_add_nav_menu_options' );
}
