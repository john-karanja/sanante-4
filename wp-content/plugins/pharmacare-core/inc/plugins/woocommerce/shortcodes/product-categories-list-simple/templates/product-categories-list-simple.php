<?php
$wc_image_attr = array(
    'class' => 'woocommerce-placeholder wp-post-image',
    'alt'   => __( 'Placeholder', 'woocommerce' ),
);

if ( $slugs !== '' ) {
    $slugs = explode( ',', $slugs );
} else {
    $slugs = array();
}

$product_categories = get_terms( array(
    'taxonomy' => 'product_cat',
    'slug'     => $slugs
) );

if ( ! empty( $product_categories ) ) { ?>
    <div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_style( $styles ); ?>>
        <div class="qodef-product-categories-holder-inner clearfix">
            <ul class="qodef-product-categories-list">
            <?php
            foreach ( $product_categories as $product_category ) {
                $id           = $product_category->term_id;
                $cat_thumb_id = get_term_meta( $id, 'thumbnail_id', true );
                $cat_thumb    = wp_get_attachment_image( $cat_thumb_id );
                $cat_name     = $product_category->name;
                $cat_image_hover_id = get_term_meta($id, 'qodef_product_category_list_simple_image_hover', true);

                $parent_cat = get_ancestors($id, 'product_cat');
                /* children cats */
                $children_cats = get_term_children($id, 'product_cat');

                if ( ! empty( $cat_thumb_id ) && ! empty( $cat_image_hover_id ) ) {
                    $hover_image_class = 'qodef-image-hover';
                } else {
                    $hover_image_class = '';
                }
                ?>
                <?php if (empty ($parent_cat)) { // printing categories that doesn't have parent category ?>
                    <li class="qodef-product-category qodef-cat-id-<?php echo esc_attr( $id ); ?>">
                        <a class="qodef-cat-link <?php echo esc_attr( $hover_image_class ); ?>" itemprop="url" href="<?php echo get_category_link( $id ); ?>" title="<?php echo esc_attr( $cat_name ); ?>">
                            <span class="qodef-cat-image">
                            <?php
                            if ( ! empty( $cat_thumb_id ) ) {
                                echo wp_get_attachment_image( $cat_thumb_id, 'woocommerce_thumbnail' );
                                if ( ! empty( $cat_image_hover_id ) ) {
                                    echo wp_get_attachment_image( $cat_image_hover_id, 'woocommerce_thumbnail', '', array(
                                        'class' => 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail qodef-hover-img'
                                    ) );
                                }
                            } else {
                                echo wc_placeholder_img( 'woocommerce_thumbnail', $wc_image_attr );

                            } ?>
                            </span>
                            <span class="qodef-product-cat-name">
                                <?php echo esc_html( $cat_name ); ?>
                            </span>
                            <?php
                            if ( ! empty( $children_cats ) ) { ?>
                                <span class="qodef-cat-opener">
                                    <?php echo qode_framework_icons()->render_icon( 'kiko-plus-line', 'fontkiko', array( 'icon_attributes' => array( 'class' => 'qodef-e-icon' ) ) ); ?>
                                </span>
                            <?php } ?>
                        </a>
                        <?php
                        /* printing children categories if exist sta rt*/
                        if ( ! empty( $children_cats ) ) { ?>
                            <ul class="children">
                                <?php foreach ( $children_cats as $children_cat_id ) { ?>
                                    <?php
                                    $cat_thumb_id = get_term_meta( $children_cat_id, 'thumbnail_id', true );
                                    $cat_name     = get_term($children_cat_id)->name;
                                    $cat_image_hover_id = get_term_meta($children_cat_id, 'qodef_product_category_list_simple_image_hover', true);

                                    if ( ! empty( $cat_thumb_id ) && ! empty( $cat_image_hover_id ) ) {
                                        $hover_image_class = 'qodef-image-hover';
                                    } else {
                                        $hover_image_class = '';
                                    }
                                    ?>
                                    <li class="qodef-product-category mkd-cat-id-<?php echo esc_attr( $children_cat_id ); ?>">
                                        <a class="qodef-cat-link <?php echo esc_attr( $hover_image_class ); ?>" itemprop="url" href="<?php echo get_category_link( $children_cat_id ); ?>" title="<?php echo esc_attr( $cat_name ); ?>">
                                            <span class="qodef-cat-image">
                                            <?php
                                            if ( ! empty( $cat_thumb_id ) ) {
                                                echo wp_get_attachment_image( $cat_thumb_id, 'woocommerce_thumbnail' );
                                                if ( ! empty( $cat_image_hover_id ) ) {
                                                    echo wp_get_attachment_image( $cat_image_hover_id, 'woocommerce_thumbnail', '', array(
                                                        'class' => 'attachment-woocommerce_thumbnail size-woocommerce_thumbnail qodef-hover-img'
                                                    ) );
                                                }
                                            } else {
                                                echo wc_placeholder_img( 'woocommerce_thumbnail', $wc_image_attr );

                                            } ?>
                                            </span>
                                            <span class="qodef-product-cat-name">
                                                <?php echo esc_html( $cat_name ); ?>
                                            </span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php }
                        /* printing children categories if exist end */
                        ?>
                    </li>
                <?php } ?>
                <?php
            }
            ?>
            </ul>
        </div>
    </div>
<?php } ?>