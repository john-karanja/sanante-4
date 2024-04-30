<?php

if ( is_user_logged_in() ) {
	pharmacare_membership_template_part( 'widgets/login-opener', 'templates/logged-in-content' );
} else {
	pharmacare_membership_template_part( 'widgets/login-opener', 'templates/logged-out-content' );
}