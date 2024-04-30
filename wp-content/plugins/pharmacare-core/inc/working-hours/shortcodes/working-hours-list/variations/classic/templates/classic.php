<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php if ( ! empty( $image_logo ) ) { ?>
		<div class="qodef-working-hours-logo">
			<?php echo wp_get_attachment_image( $image_logo, 'full' ); ?>
		</div>
	<?php } ?>
	<div class="qodef-working-hours-list-inner">
		<div class="qodef-e-item-title">
			<h3 class="qodef-e-title"><?php echo esc_html( $title ); ?> </h3>
		</div>
		<div class="qodef-e-working-hours">
			<?php foreach ( $classic_items as $item ) { ?>
				<div class="qodef-e-item-location">
					<?php if(!empty( $item['classic_location'])) : ?>
						<p class="qodef-location"><?php echo esc_html( $item['classic_location']); ?></p>
					<?php endif; ?>
				</div>
				<div class="qodef-hours-item">
					<?php if(!empty( $item['weekly_hours'])) : ?>
						<p class="qodef-weekly-hours"><span class="qodef-label"><?php echo esc_html( 'Mon - Fri'); ?></span><span class="qodef-hours"><?php echo esc_html( $item['weekly_hours']); ?></span></p>
					<?php endif; ?>
					<?php if(!empty( $item['saturday_hours'])) : ?>
						<p class="qodef-saturday-hours"><span class="qodef-label"><?php echo esc_html( 'Saturday'); ?></span><span class="qodef-hours"><?php echo esc_html( $item['saturday_hours']); ?></span></p>
					<?php endif; ?>
					<?php if(!empty( $item['sunday_hours'])) : ?>
						<p class="qodef-sunday-hours"><span class="qodef-label"><?php echo esc_html( 'Sunday'); ?></span><span class="qodef-hours"><?php echo esc_html( $item['sunday_hours']); ?></span></p>
					<?php endif; ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>