<div class="<?php echo esc_attr( $item_classes ); ?>">
	<div class="qodef-item-inner">
		<?php if ( $image_action === 'open-popup' ) { ?>
		<div class="qodef-popup-item" itemprop="image" href="<?php echo esc_url( $url ); ?>" data-type="image" title="<?php echo esc_attr( $alt ); ?>">
			<?php } else if ( $image_action === 'custom-link' && ! empty( $custom_links ) ) { ?>
			<a itemprop="url" class="qodef-ig-custom-link" href="<?php echo esc_url( $custom_links ); ?>" target="<?php echo esc_attr( $target ); ?>">
				<?php } ?>
				<?php if ( is_array( $image_size ) && count( $image_size ) ) {
					echo qode_framework_generate_thumbnail( $image_id, $image_size[0], $image_size[1] );
				} else {
					echo wp_get_attachment_image( $image_id, $image_size );
				} ?>
				<?php if ( $image_action === 'custom-link' && ! empty( $custom_links ) ) { ?>
			</a>
		<?php } ?>
		</div>
	</div>