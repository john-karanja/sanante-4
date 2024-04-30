<?php

include_once PHARMACARE_CORE_INC_PATH . '/working-hours/shortcodes/working-hours-list/class-pharmacarecore-working-hours-list-shortcode.php';


foreach ( glob( PHARMACARE_CORE_INC_PATH . '/working-hours/shortcodes/working-hours-list/variations/*/include.php' ) as $variation ) {
	include_once $variation;
}
