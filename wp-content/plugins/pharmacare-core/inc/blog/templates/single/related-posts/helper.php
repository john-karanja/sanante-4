<?php

if ( ! function_exists( 'pharmacare_core_include_blog_single_related_posts_template' ) ) {
	/**
	 * Function which includes additional module on single posts page
	 */
	function pharmacare_core_include_blog_single_related_posts_template() {
		if ( is_single() ) {
			include_once PHARMACARE_CORE_INC_PATH . '/blog/templates/single/related-posts/templates/related-posts.php';
		}
	}

	add_action( 'pharmacare_action_after_blog_post_item', 'pharmacare_core_include_blog_single_related_posts_template', 15 );  // permission 25 is set to define template position
}
