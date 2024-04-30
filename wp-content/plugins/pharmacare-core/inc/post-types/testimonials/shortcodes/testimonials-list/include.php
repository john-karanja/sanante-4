<?php

include_once PHARMACARE_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/class-pharmacarecore-testimonials-list-shortcode.php';

foreach ( glob( PHARMACARE_CORE_CPT_PATH . '/testimonials/shortcodes/testimonials-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
