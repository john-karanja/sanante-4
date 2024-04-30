<?php

include_once PHARMACARE_CORE_SHORTCODES_PATH . '/tabs/class-pharmacarecore-tab-shortcode.php';
include_once PHARMACARE_CORE_SHORTCODES_PATH . '/tabs/class-pharmacarecore-tab-child-shortcode.php';

foreach ( glob( PHARMACARE_CORE_SHORTCODES_PATH . '/tabs/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
