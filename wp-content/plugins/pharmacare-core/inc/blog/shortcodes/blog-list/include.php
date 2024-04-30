<?php

include_once PHARMACARE_CORE_INC_PATH . '/blog/shortcodes/blog-list/class-pharmacarecore-blog-list-shortcode.php';

foreach ( glob( PHARMACARE_CORE_INC_PATH . '/blog/shortcodes/blog-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
