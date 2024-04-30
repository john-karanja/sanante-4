<?php
$override_default_date_format = pharmacare_get_post_value_through_levels( 'qodef_blog_single_override_date_format' );
?>

<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner-left">
		<?php
		// Include post media
		pharmacare_template_part( 'blog', 'templates/parts/post-info/tags' );
		?>
	</div>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		pharmacare_template_part( 'blog', 'templates/parts/post-info/media' );
		if ( $override_default_date_format === 'yes' ) {
			// Include post media
			pharmacare_template_part('blog', 'templates/parts/post-info/custom-date');
		}
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-text">
				<?php
				// Include post title
				pharmacare_template_part( 'blog', 'templates/parts/post-info/title' );

				// Include post content
				the_content();

				// Hook to include additional content after blog single content
				do_action( 'pharmacare_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post comments info
					pharmacare_template_part( 'blog', 'templates/parts/post-info/comments' );
					
					// Include post likes
					pharmacare_template_part( 'blog', 'templates/parts/post-info/like' );
					?>
				</div>
				<div class="qodef-e-info-right">
					<?php
					// Include post likes
					pharmacare_template_part( 'blog', 'templates/parts/post-info/social-share' );

					if( !pharmacare_is_installed( 'core' )) {
						pharmacare_template_part('blog', 'templates/parts/post-info/category');
					}
					?>
				</div>
			</div>
		</div>
	</div>
</article>
