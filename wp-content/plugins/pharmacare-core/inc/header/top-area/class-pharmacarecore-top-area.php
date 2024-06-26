<?php

class PharmaCareCore_Top_Area {
	private static $instance;
	private $is_top_area_enabled;
	private $is_top_area_transparent;
	private $top_area_height;
	private $is_header_transparent;

	public function __construct() {
		add_action( 'wp', array( $this, 'set_variables' ), 11 ); //after header
		add_action( 'pharmacare_action_before_page_header', array( $this, 'load_template' ) );
		add_filter( 'pharmacare_filter_localize_main_js', array( $this, 'set_global_javascript_variables' ) );
		add_filter( 'pharmacare_core_filter_content_margin', array( $this, 'get_content_margin' ) );
		add_filter( 'pharmacare_core_filter_title_padding', array( $this, 'get_title_padding' ) );
		add_filter( 'pharmacare_filter_add_inline_style', array( $this, 'set_inline_top_area_styles' ) );
		add_filter( 'pharmacare_core_filter_top_area_inner_class', array( $this, 'set_grid_class' ) );
		
		add_action( 'pharmacare_action_before_page_header',  array( $this, 'pharmacare_core_enable_top_message' ), '5');
	}

	/**
	 * @return PharmaCareCore_Top_Area
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	function is_top_area_enabled() {
		$top_area_enabled = 'yes' === pharmacare_core_get_post_value_through_levels( 'qodef_top_area_header' );

		if ( is_404() ) {
			$top_area_enabled = false;
		}

		$this->is_top_area_enabled = $top_area_enabled;
	}

	public function set_top_area_height() {
		if ( $this->is_top_area_enabled ) {
			$height         = pharmacare_core_get_post_value_through_levels( 'qodef_top_area_header_height' );
			$top_bar_height = ! empty( $height ) ? $height : 43;

			$this->top_area_height = intval( $top_bar_height );
		} else {
			$this->top_area_height = 0;
		}
	}
	
	function pharmacare_core_enable_top_message() {
		$enable_top_message = 'yes' === pharmacare_core_get_post_value_through_levels( 'qodef_top_area_message_header' );
		$top_message = pharmacare_core_get_option_value( 'admin', 'qodef_top_area_message' );
		$top_message_link = pharmacare_core_get_option_value( 'admin', 'qodef_top_area_message_link' );
		if ( $enable_top_message ) {
			?>
			<div id="qodef-top-message-holder">
				<div class="qodef-top-message-inner">
					<a class="qodef-header-top-message" href="<?php echo esc_url( $top_message_link ); ?>" target="_blank">
						<?php echo wp_kses_post($top_message); ?>
					</a>
					<span class="qodef-close-message">
						<?php echo qode_framework_icons()->get_specific_icon_from_pack( 'close', 'fontkiko' ); ?>
                    </span>
				</div>
			</div>
		<?php }
	}

	public function is_top_area_transparent() {
		$background_color = pharmacare_core_get_post_value_through_levels( 'qodef_top_area_header_background_color' );

		if ( ! empty( $background_color ) ) {
			if ( preg_match( '/^#[a-f0-9]{6}$/i', $background_color ) ) { //hex color is valid
				$this->is_top_area_transparent = false;
			} else {
				$this->is_top_area_transparent = true;
			}
		} else {
			$this->is_top_area_transparent = false;
		}
	}

	public function set_variables() {
		$header_object = PharmaCareCore_Headers::get_instance()->get_header_object();

		$this->is_top_area_enabled();
		$this->is_top_area_transparent();
		$this->set_top_area_height();
		$this->is_header_transparent = ! empty( $header_object ) ? ( $header_object->get_header_transparency() || $header_object->content_behind_header() ) : false;
	}

	public function load_template() {
		$parameters = array(
			'show_header_area' => $this->is_top_area_enabled,
		);

		pharmacare_core_template_part( 'header/top-area/', 'templates/top-area', '', $parameters );
	}

	public function set_global_javascript_variables( $global_vars ) {
		$global_vars['topAreaHeight'] = $this->top_area_height;

		return $global_vars;
	}

	public function content_behind_header() {
		return 'yes' === pharmacare_core_get_post_value_through_levels( 'qodef_content_behind_header' );
	}

	public function get_content_margin( $margin ) {
		if ( ( $this->is_top_area_transparent && $this->is_header_transparent ) || $this->content_behind_header() ) {
			$margin += $this->top_area_height;
		}

		return $margin;
	}

	public function get_title_padding( $padding ) {
		if ( ( $this->is_top_area_transparent && $this->is_header_transparent ) || $this->content_behind_header() ) {
			$padding += $this->top_area_height;
		}

		return $padding;
	}

	public function set_inline_top_area_styles( $style ) {
		$styles = array();

		$background_color = pharmacare_core_get_post_value_through_levels( 'qodef_top_area_header_background_color' );

		if ( ! empty( $background_color ) ) {
			$styles['background-color'] = $background_color;
		}

		if ( ! empty( $styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-top-area', $styles );
		}

		$inner_styles = array();

		$height       = pharmacare_core_get_post_value_through_levels( 'qodef_top_area_header_height' );
		$side_padding = pharmacare_core_get_post_value_through_levels( 'qodef_top_area_header_side_padding' );

		if ( ! empty( $height ) ) {
			$inner_styles['height'] = intval( $height ) . 'px';
		}

		if ( '' !== $side_padding ) {
			if ( qode_framework_string_ends_with_space_units( $side_padding ) ) {
				$inner_styles['padding-left']  = $side_padding;
				$inner_styles['padding-right'] = $side_padding;
			} else {
				$inner_styles['padding-left']  = intval( $side_padding ) . 'px';
				$inner_styles['padding-right'] = intval( $side_padding ) . 'px';
			}
		}

		if ( ! empty( $inner_styles ) ) {
			$style .= qode_framework_dynamic_style( '#qodef-top-area-inner', $inner_styles );
		}

		return $style;
	}

	public function set_grid_class( $class ) {
		$class .= 'yes' === pharmacare_core_get_post_value_through_levels( 'qodef_top_area_header_in_grid' ) ? 'qodef-content-grid' : '';

		return $class;
	}
}

PharmaCareCore_Top_Area::get_instance();
