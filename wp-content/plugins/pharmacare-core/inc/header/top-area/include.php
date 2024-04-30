<?php

include_once PHARMACARE_CORE_INC_PATH . '/header/top-area/class-pharmacarecore-top-area.php';
include_once PHARMACARE_CORE_INC_PATH . '/header/top-area/helper.php';

foreach ( glob( PHARMACARE_CORE_INC_PATH . '/header/top-area/dashboard/*/*.php' ) as $dashboard ) {
	include_once $dashboard;
}
