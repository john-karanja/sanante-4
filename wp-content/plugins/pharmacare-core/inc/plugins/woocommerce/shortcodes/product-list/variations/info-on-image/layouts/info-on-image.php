<div <?php wc_product_class( $item_classes ); ?>>
    <div class="qodef-woo-product-inner">
        <?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/countdown' ); ?>
		<?php if ( has_post_thumbnail() ) { ?>
            <div class="qodef-woo-product-image">
				<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/mark' ); ?>
				<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/image', '', $params ); ?>
	            <?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/title', '', $params ); ?>
                <?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/excerpt', '', $params ); ?>
	            <?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/price', '', $params ); ?>
	            <?php
	            // Hook to include additional content inside product list item image
	            do_action( 'pharmacare_core_action_product_list_item_additional_content' );
	            ?>
                <div class="qodef-woo-product-image-inner">
					<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/add-to-cart' ); ?>
                </div>
            </div>
		<?php } ?>
		<?php pharmacare_core_template_part( 'plugins/woocommerce/shortcodes/product-list', 'templates/post-info/link' ); ?>
    </div>
</div>