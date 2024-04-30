<?php

include_once PHARMACARE_CORE_SHORTCODES_PATH . '/banner/class-pharmacarecore-banner-shortcode.php';

foreach ( glob( PHARMACARE_CORE_INC_PATH . '/shortcodes/banner/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
