<?php
$excerpt = pharmacare_core_get_custom_post_type_excerpt( isset( $excerpt_length ) ? $excerpt_length : 0 );

if ( ! empty( $excerpt ) && $enable_excerpt === 'yes' ) { ?>
	<p itemprop="description" class="qodef-woo-product-excerpt"><?php echo esc_html( $excerpt ); ?></p>
<?php } ?>