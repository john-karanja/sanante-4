<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php pharmacare_core_template_part( 'shortcodes/image-with-text', 'templates/parts/image', '', $params ) ?>
	<div class="qodef-m-content">
		<?php pharmacare_core_template_part( 'shortcodes/image-with-text', 'templates/parts/title', '', $params ) ?>
		<?php pharmacare_core_template_part( 'shortcodes/image-with-text', 'templates/parts/text', '', $params ) ?>
		<?php pharmacare_core_template_part( 'shortcodes/image-with-text', 'templates/parts/additional-text', '', $params ) ?>
	</div>
</div>