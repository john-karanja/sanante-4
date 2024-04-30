<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attr( $carousel_attr, 'data-options' ); ?>>
	<div class="swiper-wrapper">
		<?php
		// Include items
		pharmacare_core_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'templates/loop', '', $params );
		?>
	</div>
	<?php pharmacare_core_template_part( 'content', 'templates/swiper-pag', '', $params ); ?>
</div>
