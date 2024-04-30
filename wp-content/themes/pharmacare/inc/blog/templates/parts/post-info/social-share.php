<?php if ( class_exists( 'PharmaCareCore_Social_Share_Shortcode' ) ) { ?>
	<div class="qodef-e-info-item qodef-e-info-social-share">
		<?php
		$params = array();
		$params['layout'] = 'list';
        $params['title'] = 'Share';

		echo PharmaCareCore_Social_Share_Shortcode::call_shortcode( $params ); ?>
	</div>
<?php } ?>
