<?php
$additional_info_enabled  = pharmacare_get_post_value_through_levels( 'qodef_blog_list_enable_additional_info' ) !== 'no';
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
				pharmacare_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h3' ) );

				// Include post excerpt
				pharmacare_template_part( 'blog', 'templates/parts/post-info/excerpt' );

				// Hook to include additional content after blog single content
				do_action( 'pharmacare_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
                    // Include post author info
                    pharmacare_template_part( 'blog', 'templates/parts/post-info/author' );
					?>
				</div>
				<div class="qodef-e-info-right">
					<?php

                    // Include post share
                    pharmacare_template_part('blog', 'templates/parts/post-info/social-share');
					?>
				</div>
			</div>
			<div class="qodef-e-info-additional">
				<?php

				if ( $additional_info_enabled ) { ?>
					<div class="qodef-e-info-additional-left">
						<?php
						// Include post read more
						pharmacare_template_part( 'blog', 'templates/parts/post-info/read-more' );
						?>
					</div>
					<div class="qodef-e-info-additional-right">
						<?php
						// Include post date
						pharmacare_template_part( 'blog', 'templates/parts/post-info/date' );
						// Include post comments info
						pharmacare_template_part('blog', 'templates/parts/post-info/comments');

						?>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</article>
