<?php if ( 'custom-icon' === $icon_type && ! empty( $custom_icon ) ) { ?>
	<span class="qodef-custom-image-wrapper" <?php qode_framework_inline_style( $custom_icon_styles ); ?>>
		<?php echo wp_get_attachment_image( $custom_icon, 'full' ); ?>
	</span>
<?php }
