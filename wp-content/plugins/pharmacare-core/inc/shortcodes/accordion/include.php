<?php

include_once PHARMACARE_CORE_SHORTCODES_PATH . '/accordion/class-pharmacarecore-accordion-shortcode.php';
include_once PHARMACARE_CORE_SHORTCODES_PATH . '/accordion/class-pharmacarecore-accordion-child-shortcode.php';

foreach ( glob( PHARMACARE_CORE_SHORTCODES_PATH . '/accordion/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
