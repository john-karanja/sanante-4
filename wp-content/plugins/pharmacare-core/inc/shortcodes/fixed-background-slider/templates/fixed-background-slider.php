<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
    <div class="qodef-m-items clear">
        <div class="qodef-m-swiper">
            <div class="swiper-wrapper">
				<?php foreach ( $items as $item ) :
					$image_alt = get_post_meta( $item['item_image'], '_wp_attachment_image_alt', true ); ?>

                    <div class="qodef-m-item swiper-slide">

						<?php echo wp_get_attachment_image( $item['item_image'], 'full' ); ?>
	
	                    <?php if ( ! empty( $item['item_link'] ) ) : ?>
		                    <a class="qodef-m-item-link" href="<?php echo esc_url( $item['item_link'] ) ?>" target="<?php echo esc_attr( $link_target ); ?>"></a>
	                    <?php endif; ?>
	                       
                        <div class="qodef-e-content">
	                        
                            <?php if ( isset( $item['title'] ) && ! empty( $item['title'] ) ) { ?>
	                            <h1 class="qodef-e-title entry-title" itemprop="name"><?php echo esc_html( $item['title'] ); ?></h1>
                            <?php } ?>
	                        
	                        <div class="qodef-m-author">
		                        <div class="qodef-m-author-image">
			                        <?php echo wp_get_attachment_image( $item['author_image'], '50' ); ?>
		                        </div>
		                        <div class="qodef-m-author-text">
			                        <?php if ( isset( $item['author'] ) && ! empty( $item['author'] ) ) { ?>
				                        <p class="qodef-e-author" itemprop="description"><?php echo wp_kses_post( $item['author'] ); ?></p>
			                        <?php } ?>
			
			                        <?php if ( isset( $item['author_position'] ) && ! empty( $item['author_position'] ) ) { ?>
				                        <p class="qodef-e-author-position" itemprop="description"><?php echo wp_kses_post( $item['author_position'] ); ?></p>
			                        <?php } ?>
		                        </div>
	                        </div>
                        </div>
	                    
                    </div>
				<?php endforeach; ?>
            </div><!-- .swiper-wrapper -->
        </div><!-- .qodef-m-swiper -->
    </div><!-- .qodef-m-items -->
	<div class="swiper-navigation">
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div>
</div>