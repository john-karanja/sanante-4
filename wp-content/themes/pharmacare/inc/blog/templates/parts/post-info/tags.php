<?php
$tags = get_the_tags();

if ( $tags ) { ?>
	<div class="qodef-e-info-item qodef-e-info-tags">
        <h5 class="qodef-tags-label">
		<?php esc_html_e('Tags', 'pharmacare'); ?>
    </h5>
		<?php the_tags( '', '', '' ); ?>
	</div>
<?php } ?>
