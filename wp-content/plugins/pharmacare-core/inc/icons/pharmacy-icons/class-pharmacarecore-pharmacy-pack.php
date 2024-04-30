<?php

if ( ! function_exists( 'pharmacare_core_add_pharmacy_icons_to_collection' ) ) {
	/**
	 * Function that add icon font pack into the global list
	 *
	 * @param array $icons
	 *
	 * @return array
	 */
	function pharmacare_core_add_pharmacy_icons_to_collection( $icons ) {
		$icons[] = 'PharmaCareCore_Pharmacy_Icons_Pack';

		return $icons;
	}

	add_filter( 'qode_framework_filter_add_icon', 'pharmacare_core_add_pharmacy_icons_to_collection' );
}

if ( class_exists( 'QodeFrameworkIconPack' ) ) {
	class PharmaCareCore_Pharmacy_Icons_Pack extends QodeFrameworkIconPack {

		public function __construct() {
			parent::__construct();
		}

		public function add_icon_pack() {
			$this->set_base( 'pharmacy-icons' );
			$this->set_name( 'Pharmacy Icons' );
			$this->set_icons( $this->icons_array() );
			$this->set_specific_icons( $this->specific_icons() );
		}

		public function get_style_url() {
			return PHARMACARE_CORE_INC_URL_PATH . '/icons/' . $this->get_base() . '/assets/css/' . $this->get_base() . '.min.css';
		}

		private function icons_array() {
			$icons = array(
				''                                          => '',
				'pharmacy-antibacterial-soap'               => '\e900',
				'pharmacy-dental-hygiene'                   => '\e901',
                'pharmacy-drops'                            => '\e902',
                'pharmacy-drugs-pills'                      => '\e903',
                'pharmacy-eye-drops'                        => '\e904',
                'pharmacy-homeopathy-alternative-medicine'  => '\e905',
                'pharmacy-lotions'                          => '\e906',
                'pharmacy-medical-herbs-formulation'        => '\e907',
                'pharmacy-nasal-inhaler'                    => '\e908',
                'pharmacy-pills'                            => '\e909',
                'pharmacy-rx-prescription'                  => '\e90a',
                'pharmacy-surgical-mask'                    => '\e90b',
			);

			$formated_icons = array();
			foreach ( $icons as $icon_key => $icon_value ) {
				$formated_icons[ $icon_key ] = $icon_key;
			}

			return $formated_icons;

		}

		function specific_icons() {
			return array(
			);
		}
	}
}
