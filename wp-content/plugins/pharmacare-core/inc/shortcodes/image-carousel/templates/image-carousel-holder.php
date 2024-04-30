		<div class="qodef-image-carousel-holder">
			<div class="qodef-pc-carousel-inner qodef-owl-slider" <?php echo qode_framework_get_inline_attrs($carousel_data); ?> >
				<?php foreach ( $items as $item ) { ?>
					<div class="qodef-ic-item">
						<a href="<?php echo esc_url($item['link']) ?>">
							<div class="qodef-pc-item-image">
								<div class="qodef-pc-item-actual-image">
									<?php echo wp_get_attachment_image($item['image'], 'full'); ?>
								</div>
							</div>
							<div class="qodef-pc-item-content-holder">
								<?php if(!empty( $item['title'])) : ?>
									<h6 class="qodef-pc-item-title"><?php echo esc_html( $item['title']); ?></h6>
								<?php endif; ?>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
			<div class="qodef-pc-navigation clearfix"></div>
		</div>
