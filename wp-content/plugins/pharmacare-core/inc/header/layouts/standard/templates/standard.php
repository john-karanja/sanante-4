<?php
$class = 'yes' === pharmacare_core_get_post_value_through_levels( 'qodef_standard_header_top_in_grid') ? 'qodef-content-grid' : '';
?>
<div class="qodef-standard-header-top-wrapper <?php esc_attr_e($class)?> ">
<?php
// Include logo
pharmacare_core_get_header_logo_image();
// Include widget area one
if ( is_active_sidebar( 'qodef-header-widget-area-one' ) ) { ?>
	<div class="qodef-widget-holder">
		<?php pharmacare_core_get_header_widget_area(); ?>
	</div>
<?php } ?>
</div>
<div class="qodef-standard-header-bottom-wrapper">
	<div class="qodef-standard-header-bottom-inner <?php esc_attr_e($class)?> ">
        <?php pharmacare_core_get_extended_dropdown_menu(); ?>

		<?php
		// Include main navigation
		pharmacare_core_template_part( 'header', 'templates/parts/navigation' );
		if ( is_active_sidebar( 'qodef-header-widget-area-two' ) ) { ?>
			<div class="qodef-widget-holder">
				<?php pharmacare_core_get_header_widget_area( '', 'two' ); ?>
			</div>
		<?php }
		?>
	</div>
</div>