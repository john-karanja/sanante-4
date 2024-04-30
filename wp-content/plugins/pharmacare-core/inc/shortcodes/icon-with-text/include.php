<?php

include_once PHARMACARE_CORE_SHORTCODES_PATH . '/icon-with-text/class-pharmacarecore-icon-with-text-shortcode.php';

foreach ( glob( PHARMACARE_CORE_SHORTCODES_PATH . '/icon-with-text/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
