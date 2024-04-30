<?php

include_once PHARMACARE_CORE_SHORTCODES_PATH . '/image-with-text/class-pharmacarecore-image-with-text-shortcode.php';

foreach ( glob( PHARMACARE_CORE_SHORTCODES_PATH . '/image-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
