<?php

include_once PHARMACARE_CORE_INC_PATH . '/social-share/shortcodes/social-share/class-pharmacarecore-social-share-shortcode.php';

foreach ( glob( PHARMACARE_CORE_INC_PATH . '/social-share/shortcodes/social-share/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
