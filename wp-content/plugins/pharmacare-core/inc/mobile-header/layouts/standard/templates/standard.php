<?php
// Include mobile logo
pharmacare_core_get_mobile_header_logo_image();

// Include mobile widget area one
if ( is_active_sidebar( 'qodef-mobile-header-widget-area' ) ) { ?>
	<div class="qodef-widget-holder qodef--one">
		<?php dynamic_sidebar( 'qodef-mobile-header-widget-area' ); ?>
	</div>
	<?php
}

// Include mobile navigation opener
pharmacare_core_template_part( 'mobile-header', 'templates/parts/mobile-navigation-opener' );

// Include mobile navigation
pharmacare_core_template_part( 'mobile-header', 'templates/parts/mobile-navigation' );
