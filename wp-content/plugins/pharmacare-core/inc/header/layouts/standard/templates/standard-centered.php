<div class="qodef-header-wrapper">
	<div class="qodef-header-logo">
		<?php
		// Include logo
		pharmacare_core_get_header_logo_image();
		?>
	</div>

    <?php pharmacare_core_get_extended_dropdown_menu(); ?>

	<?php
	// Include main navigation
	pharmacare_core_template_part( 'header', 'templates/parts/navigation' );

	// Include widget area one
	pharmacare_core_get_header_widget_area();
	?>
</div>
