<div <?php wc_product_class( $item_classes ); ?>>
    <div class="qodef-woo-product-inner">
        <?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/countdown' ); ?>
		<?php if ( has_post_thumbnail() ) { ?>
            <div class="qodef-woo-product-image">
				<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/mark' ); ?>
				<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
                <div class="qodef-woo-product-image-inner">
					<?php
					// Hook to include additional content inside product list item image
					do_action( 'pharmacare_core_action_product_list_item_additional_image_content' );
					?>
                </div>
            </div>
		<?php } ?>
	    <?php $content_styles = ( isset( $content_styles ) && ! empty( $content_styles ) ) ? $content_styles : ''; ?>
        <div class="qodef-woo-product-content" <?php qode_framework_inline_style( $content_styles ); ?>>
            <?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/rating', '', $params ); ?>
			<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
            <?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/excerpt', '', $params ); ?>
			<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
            <?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' ); ?>
			<?php
			// Hook to include additional content inside product list item content
			do_action( 'pharmacare_core_action_product_list_item_additional_content' );
			?>
        </div>
		<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
    </div>
</div>