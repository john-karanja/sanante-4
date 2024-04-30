<?php

include_once PHARMACARE_MEMBERSHIP_LOGIN_MODAL_PATH . '/helper.php';

foreach ( glob( PHARMACARE_MEMBERSHIP_LOGIN_MODAL_PATH . '/*/include.php' ) as $module ) {
	include_once $module;
}