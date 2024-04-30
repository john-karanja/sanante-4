<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
    <div class="qodef-m-image-holder">
	    <?php pharmacare_core_template_part( 'shortcodes/image-with-text', 'templates/parts/image', '', $params ) ?>
    </div>
	<div class="qodef-m-content">
		<?php pharmacare_core_template_part( 'shortcodes/image-with-text', 'templates/parts/title', '', $params ) ?>
		<?php pharmacare_core_template_part( 'shortcodes/image-with-text', 'templates/parts/text', '', $params ) ?>
		<?php pharmacare_core_template_part( 'shortcodes/image-with-text', 'templates/parts/additional-text', '', $params ) ?>
	</div>
</div>
