<?php
$additional_info_enabled  = pharmacare_get_post_value_through_levels( 'qodef_blog_list_enable_additional_info' ) !== 'no';
$override_default_date_format = pharmacare_get_post_value_through_levels( 'qodef_blog_single_override_date_format' );
?>
<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		pharmacare_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', '', $params );
		if ( $override_default_date_format === 'yes' ) {
			// Include post media
			pharmacare_template_part('blog', 'templates/parts/post-info/custom-date');
		}
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-text">
				<?php
				// Include post title
				pharmacare_core_theme_template_part( 'blog', 'templates/parts/post-info/title', '', $params );

				// Include post excerpt
				pharmacare_core_theme_template_part( 'blog', 'templates/parts/post-info/excerpt', '', $params );

				// Hook to include additional content after blog single content
				do_action( 'pharmacare_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post author info
					pharmacare_core_theme_template_part( 'blog', 'templates/parts/post-info/author' );
					?>
					
				</div>
					<?php
					if ( $additional_info_enabled && 'no' === $override_default_date_format ) {
					?>
					<div class="qodef-e-info-right">
						<?php
						// Include post date info
						pharmacare_core_theme_template_part( 'blog', 'templates/parts/post-info/date' );
						?>
					</div>
					<?php
					}
					?>
			</div>
		</div>
	</div>
</article>
