<?php
$current_image = get_post_meta( get_the_ID(), 'qodef_testimonial_image_right', true );
$class_right =  ($current_image === 'yes') ? 'qodef-right-position' : '';

?>

<div <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner <?php esc_html_e($class_right)?> ">
		<?php
		if ($current_image === 'no')
				pharmacare_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/image', '', $params );
		?>
		<div class="qodef-e-content">
			<?php pharmacare_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/rating', '', $params ); ?>
			<?php pharmacare_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/title', '', $params ); ?>
			<?php pharmacare_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/text', '', $params ); ?>
			<?php pharmacare_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/author', '', $params ); ?>
		</div>
		
		<?php
		if ($current_image === 'yes')
			pharmacare_core_list_sc_template_part( 'post-types/testimonials/shortcodes/testimonials-list', 'post-info/image', '', $params );
		?>
	</div>
</div>
