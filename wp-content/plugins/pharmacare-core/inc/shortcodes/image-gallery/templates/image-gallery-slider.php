<?php
$i    = 0;
?>

<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $slider_attr, 'data-options' ); ?>>
	<div class="swiper-wrapper">
		<?php
		
		// Include items
		if ( ! empty( $images ) && ! empty($custom_links) ) {
			foreach ( $images as $image ) {
				$image['custom_links']       = $custom_links[$i++];
				pharmacare_core_template_part( 'shortcodes/image-gallery', 'templates/parts/image', '', array_merge( $params, $image ) );
			}
		} else if ( ! empty( $images ) ) {
			foreach ( $images as $image ) {
				pharmacare_core_template_part( 'shortcodes/image-gallery', 'templates/parts/image', '', array_merge( $params, $image ) );
			}
		}
		?>
	</div>
	<?php pharmacare_core_template_part( 'content', 'templates/swiper-nav', '', $params ); ?>
	<?php pharmacare_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
</div>