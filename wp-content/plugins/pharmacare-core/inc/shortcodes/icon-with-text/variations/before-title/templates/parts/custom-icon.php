<?php if ( 'custom-icon' === $icon_type && ! empty( $custom_icon ) ) { ?>
	<?php echo wp_get_attachment_image( $custom_icon, 'full' ); ?>
<?php }