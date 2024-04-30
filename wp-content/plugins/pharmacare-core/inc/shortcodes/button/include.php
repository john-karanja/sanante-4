<?php

include_once PHARMACARE_CORE_SHORTCODES_PATH . '/button/class-pharmacarecore-button-shortcode.php';

foreach ( glob( PHARMACARE_CORE_SHORTCODES_PATH . '/button/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
