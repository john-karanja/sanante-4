<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-working-hours-list-inner">
		<div class="qodef-e-item-location">
			<h5 class="qodef-e-location"><?php echo esc_html( $city ); ?> </h5>
		</div>
		<div class="qodef-e-working-hours">
			<?php foreach ( $items as $item ) { ?>
				<div class="qodef-hours-item">
						<?php if(!empty( $item['days'])) : ?>
							<p class="qodef-days"><?php echo esc_html( $item['days']); ?></p>
						<?php endif; ?>
						<?php if(!empty( $item['hours'])) : ?>
							<p class="qodef-hours"><?php echo esc_html( $item['hours']); ?></p>
						<?php endif; ?>
				</div>
			<?php } ?>
		</div>
		<div class="qodef-e-item-address">
			<a class="qodef-address-holder" itemprop="url" href="<?php echo esc_url( $link1 ); ?>" target="_blank"><p class="qodef-e-address1"><?php echo esc_html( $address1 ); ?> </p></a>
			<a class="qodef-address-holder" itemprop="url" href="<?php echo esc_url( $link2 ); ?>" target="_blank"><p class="qodef-e-address2"><?php echo esc_html( $address2 ); ?> </p></a>
		</div>
	</div>
</div>