<?php

if ( ! function_exists( 'pharmacare_core_add_yith_wishlist_widget' ) ) {
    /**
     * Function that add widget into widgets list for registration
     *
     * @param array $widgets
     *
     * @return array
     */
    function pharmacare_core_add_yith_wishlist_widget( $widgets ) {
        $widgets[] = 'PharmaCareCoreYithWishlistWidget';

        return $widgets;
    }

    add_filter( 'pharmacare_core_filter_register_widgets', 'pharmacare_core_add_yith_wishlist_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
    class PharmaCareCoreYithWishlistWidget extends QodeFrameworkWidget {

        public function map_widget() {
            $this->set_base( 'pharmacare_core_yith_wishlist' );
            $this->set_name( esc_html__( 'PharmaCare Yith Wishlist', 'pharmacare-core' ) );
            $this->set_description( esc_html__( 'Add Yith Wishlist to widget areas', 'pharmacare-core' ) );
            $this->set_widget_option(
                array(
                    'field_type'  => 'text',
                    'name'        => 'widget_margin',
                    'title'       => esc_html__( 'Margin', 'pharmacare-core' ),
                    'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'pharmacare-core' )
                )
            );
            $this->set_widget_option(
                array(
                    'field_type'  => 'color',
                    'name'        => 'icon_color',
                    'title'       => esc_html__( 'Icon Color', 'pharmacare-core' )
                )
            );
        }

        public function render( $atts ) {

            $styles = array();
            $icon_styles = array();

            if ( $atts['widget_margin'] !== '' ) {
                $styles[] = 'margin: ' . $atts['widget_margin'];
            }
            if ( $atts['icon_color'] !== '' ) {
                $icon_styles[] = 'color: ' . $atts['icon_color'];
            }
            global $yith_wcwl;

            $wishlist_url = $yith_wcwl->get_wishlist_url();
            $number_of_items = yith_wcwl_count_all_products();

            if ( $number_of_items === 0 ) {
                $number_of_items = 0;
            }
            ?>

            <div class="widget qodef-wishlist-widget-holder">
                <div class="qodef-wishlist-inner" <?php qode_framework_inline_style( $styles ); ?>>
                    <a href="<?php echo esc_url($wishlist_url); ?>" class="qodef-wishlist-widget-link" title="<?php echo esc_attr__('View Wishlist', 'pharmacare-core'); ?>">
                        <span class="qodef-wishlist-icon-count-holder" <?php qode_framework_inline_style( $icon_styles ); ?>>
                            <span class="qodef-wishlist-widget-icon"></span>
                            <span class="qodef-wishlist-count"><?php echo esc_html( $number_of_items ) ?></span>
                        </span>
                        <span class="qodef-wishlist-text-holder">
                            <span class="qodef-wishlist-title"><?php esc_html_e('Wishlist', 'pharmacare-core') ?></span>
                            <span class="qodef-wishlist-subtitle"><?php esc_html_e('Edit Your Wishlist', 'pharmacare-core') ?></span>
                        </span>
                    </a>
                </div>
            </div>
            <?php
        }
    }
}
