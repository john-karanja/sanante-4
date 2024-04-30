<?php

include_once PHARMACARE_CORE_SHORTCODES_PATH . '/single-image/class-pharmacarecore-single-image-shortcode.php';

foreach ( glob( PHARMACARE_CORE_SHORTCODES_PATH . '/single-image/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
