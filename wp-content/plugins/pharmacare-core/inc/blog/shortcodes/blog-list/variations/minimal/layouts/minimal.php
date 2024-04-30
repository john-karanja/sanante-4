<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php pharmacare_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params ); ?>
		<div class="qodef-e-info qodef-info--bottom">
			<?php
			// Include post date info
			pharmacare_core_theme_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/date' );
			?>
		</div>
	</div>
</article>
