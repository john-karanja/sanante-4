<?php

include_once PHARMACARE_CORE_SHORTCODES_PATH . '/custom-font/class-pharmacarecore-custom-font-shortcode.php';

foreach ( glob( PHARMACARE_CORE_SHORTCODES_PATH . '/custom-font/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
