<div class="qodef-e-media">
	<?php
	switch ( get_post_format() ) {
		case 'gallery':
			pharmacare_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			pharmacare_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			pharmacare_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			pharmacare_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	}
	?>
</div>
