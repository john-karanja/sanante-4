<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-grid-inner clear">
	<?php

    if ( isset( $logo ) && ! empty( $logo ) ) { ?>
        <div class="qodef-e-logo-image">
            <?php echo wp_get_attachment_image( $logo, 'full' ) ?>
        </div>
    <?php }


	// Include global masonry template from theme
	pharmacare_core_theme_template_part( 'masonry', 'templates/sizer-gutter', '', $params['behavior'] );
	?>
	
	<?php foreach ( $items as $key => $item ) : ?>

    <?php
        if ( isset( $item['masonry_image_dimension'] ) && $item['masonry_image_dimension'] !== '' ) {
            $image_dimension_class = pharmacare_core_get_custom_image_size_class_name_masonry_elements( $item['masonry_image_dimension'] );
        } else {
	        $image_dimension_class = 'qodef-item--square';
        }
		$item_classes .= ' ';
		$item_classes .= $image_dimension_class;
    ?>
		<div <?php qode_framework_class_attribute( $item_classes ); ?>>
			<div class="qodef-e-masonry-elements-item-inner">
				<?php if ( isset( $item['image'] ) && ! empty( $item['image'] ) ) { ?>
					<div class="qodef-e-media-image">
						<?php echo wp_get_attachment_image( $item['image'], 'full' ) ?>
					</div>
				<?php } ?>
			</div>
		</div>

    <?php
    /* removing classes with leading space if exist in order not to duplicate */
        $item_classes = str_replace(array(" qodef-item--square", " qodef-item--portrait", " qodef-item--landscape", " qodef-item--huge-square"), "", $item_classes);
    ?>
	<?php endforeach; ?>
	
	</div>
</div>
