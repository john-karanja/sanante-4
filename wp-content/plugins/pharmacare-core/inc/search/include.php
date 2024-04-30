<?php

include_once PHARMACARE_CORE_INC_PATH . '/search/class-pharmacarecore-search.php';
include_once PHARMACARE_CORE_INC_PATH . '/search/helper.php';
include_once PHARMACARE_CORE_INC_PATH . '/search/dashboard/admin/search-options.php';

foreach ( glob( PHARMACARE_CORE_INC_PATH . '/search/layouts/*/include.php' ) as $layout ) {
	include_once $layout;
}
