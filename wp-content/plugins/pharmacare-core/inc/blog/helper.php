<?php

if ( ! function_exists( 'pharmacare_core_include_blog_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function pharmacare_core_include_blog_shortcodes() {
		foreach ( glob( PHARMACARE_CORE_INC_PATH . '/blog/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}

	add_action( 'qode_framework_action_before_shortcodes_register', 'pharmacare_core_include_blog_shortcodes' );
}

if ( ! function_exists( 'pharmacare_core_include_blog_shortcodes_widget' ) ) {
	/**
	 * Function that includes widgets
	 */
	function pharmacare_core_include_blog_shortcodes_widget() {
		foreach ( glob( PHARMACARE_CORE_INC_PATH . '/blog/shortcodes/*/widget/include.php' ) as $widget ) {
			include_once $widget;
		}
	}

	add_action( 'qode_framework_action_before_widgets_register', 'pharmacare_core_include_blog_shortcodes_widget' );
}

if ( ! function_exists( 'pharmacare_core_set_blog_single_page_title' ) ) {
	/**
	 * Function that enable/disable page title area for custom post type page
	 *
	 * @param bool $enable_page_title
	 *
	 * @return bool
	 */
	function pharmacare_core_set_blog_single_page_title( $enable_page_title ) {

		if ( is_singular( 'post' ) ) {
			$option = 'no' !== pharmacare_core_get_post_value_through_levels( 'qodef_blog_single_enable_page_title' );

			if ( isset( $option ) ) {
				$enable_page_title = $option;
			}

			$meta_option = get_post_meta( get_the_ID(), 'qodef_enable_page_title', true );

			if ( ! empty( $meta_option ) ) {
				$enable_page_title = $meta_option;
			}
		}

		return $enable_page_title;
	}

	add_filter( 'pharmacare_filter_enable_page_title', 'pharmacare_core_set_blog_single_page_title' );
}

if ( ! function_exists( 'pharmacare_core_set_blog_single_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param string $layout
	 *
	 * @return string
	 */
	function pharmacare_core_set_blog_single_sidebar_layout( $layout ) {

		if ( is_singular( 'post' ) ) {
			$option = pharmacare_core_get_post_value_through_levels( 'qodef_blog_single_sidebar_layout' );

			if ( ! empty( $option ) ) {
				$layout = $option;
			}

			$meta_option = get_post_meta( get_the_ID(), 'qodef_page_sidebar_layout', true );

			if ( ! empty( $meta_option ) ) {
				$layout = $meta_option;
			}
		}

		return $layout;
	}

	add_filter( 'pharmacare_filter_sidebar_layout', 'pharmacare_core_set_blog_single_sidebar_layout' );
}

if ( ! function_exists( 'pharmacare_core_set_blog_single_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param string $sidebar_name
	 *
	 * @return string
	 */
	function pharmacare_core_set_blog_single_custom_sidebar_name( $sidebar_name ) {

		if ( is_singular( 'post' ) ) {
			$option = pharmacare_core_get_post_value_through_levels( 'qodef_blog_single_custom_sidebar' );

			if ( ! empty( $option ) ) {
				$sidebar_name = $option;
			}

			$meta_option = get_post_meta( get_the_ID(), 'qodef_page_custom_sidebar', true );

			if ( ! empty( $meta_option ) ) {
				$sidebar_name = $meta_option;
			}
		}

		return $sidebar_name;
	}

	add_filter( 'pharmacare_filter_sidebar_name', 'pharmacare_core_set_blog_single_custom_sidebar_name' );
}

if ( ! function_exists( 'pharmacare_core_set_blog_single_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function pharmacare_core_set_blog_single_sidebar_grid_gutter_classes( $classes ) {

		if ( is_singular( 'post' ) ) {
			$option = pharmacare_core_get_post_value_through_levels( 'qodef_blog_single_sidebar_grid_gutter' );

			if ( ! empty( $option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $option );
			}

			$meta_option = get_post_meta( get_the_ID(), 'qodef_page_sidebar_grid_gutter', true );

			if ( ! empty( $meta_option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $meta_option );
			}
		}

		return $classes;
	}

	add_filter( 'pharmacare_filter_grid_gutter_classes', 'pharmacare_core_set_blog_single_sidebar_grid_gutter_classes' );
}

if ( ! function_exists( 'pharmacare_core_enable_posts_order' ) ) {
	/**
	 * Function that enable page attributes options for blog single page
	 */
	function pharmacare_core_enable_posts_order() {
		add_post_type_support( 'post', 'page-attributes' );
	}

	add_action( 'admin_init', 'pharmacare_core_enable_posts_order' );
}

if ( ! function_exists( 'pharmacare_core_set_blog_list_excerpt_length' ) ) {
	/**
	 * Function that set number of characters for excerpt on blog list page
	 *
	 * @param int $excerpt_length
	 *
	 * @return int
	 */
	function pharmacare_core_set_blog_list_excerpt_length( $excerpt_length ) {
		$option = pharmacare_core_get_post_value_through_levels( 'qodef_blog_list_excerpt_number_of_characters' );

		if ( '' !== $option ) {
			$excerpt_length = $option;
		}

		return $excerpt_length;
	}

	add_filter( 'pharmacare_filter_post_excerpt_length', 'pharmacare_core_set_blog_list_excerpt_length' );
}

if ( ! function_exists( 'pharmacare_core_get_allowed_pages_for_blog_sidebar_layout' ) ) {
	/**
	 * Function that return pages where blog sidebar is allowed
	 *
	 * @return bool
	 */
	function pharmacare_core_get_allowed_pages_for_blog_sidebar_layout() {
		return ( is_archive() || ( is_home() && is_front_page() ) ) && 'post' === get_post_type();
	}
}

if ( ! function_exists( 'pharmacare_core_set_blog_archive_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param string $layout
	 *
	 * @return string
	 */
	function pharmacare_core_set_blog_archive_sidebar_layout( $layout ) {

		if ( pharmacare_core_get_allowed_pages_for_blog_sidebar_layout() ) {
			$option = pharmacare_core_get_post_value_through_levels( 'qodef_blog_archive_sidebar_layout' );

			if ( ! empty( $option ) ) {
				$layout = $option;
			}
		}

		return $layout;
	}

	add_filter( 'pharmacare_filter_sidebar_layout', 'pharmacare_core_set_blog_archive_sidebar_layout' );
}

if ( ! function_exists( 'pharmacare_core_set_blog_archive_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param string $sidebar_name
	 *
	 * @return string
	 */
	function pharmacare_core_set_blog_archive_custom_sidebar_name( $sidebar_name ) {

		if ( pharmacare_core_get_allowed_pages_for_blog_sidebar_layout() ) {
			$option = pharmacare_core_get_post_value_through_levels( 'qodef_blog_archive_custom_sidebar' );

			if ( ! empty( $option ) ) {
				$sidebar_name = $option;
			}
		}

		return $sidebar_name;
	}

	add_filter( 'pharmacare_filter_sidebar_name', 'pharmacare_core_set_blog_archive_custom_sidebar_name' );
}

if ( ! function_exists( 'pharmacare_core_set_blog_archive_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function pharmacare_core_set_blog_archive_sidebar_grid_gutter_classes( $classes ) {

		if ( pharmacare_core_get_allowed_pages_for_blog_sidebar_layout() ) {
			$option = pharmacare_core_get_post_value_through_levels( 'qodef_blog_single_archive_grid_gutter' );

			if ( ! empty( $option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $option );
			}
		}

		return $classes;
	}

	add_filter( 'pharmacare_filter_grid_gutter_classes', 'pharmacare_core_set_blog_archive_sidebar_grid_gutter_classes' );
}

if ( ! function_exists( 'pharmacare_core_blog_single_set_post_title_instead_of_page_title_text' ) ) {
	/**
	 * Function that set current post title text for single posts
	 *
	 * @param string $title
	 *
	 * @return string
	 */
	function pharmacare_core_blog_single_set_post_title_instead_of_page_title_text( $title ) {
		$option = pharmacare_core_get_option_value( 'admin', 'qodef_blog_single_set_post_title_in_title_area' );

		if ( is_singular( 'post' ) && 'yes' === $option ) {
			$title = get_the_title( qode_framework_get_page_id() );
		}

		return $title;
	}

	add_filter( 'pharmacare_filter_page_title_text', 'pharmacare_core_blog_single_set_post_title_instead_of_page_title_text' );
}

if ( ! function_exists( 'pharmacare_core_get_blog_single_post_taxonomies' ) ) {
	/**
	 * Function that return single post taxonomies list
	 *
	 * @param int $post_id
	 *
	 * @return array
	 */
	function pharmacare_core_get_blog_single_post_taxonomies( $post_id ) {
		$options = array();

		if ( ! empty( $post_id ) ) {
			$options['tag']      = get_the_tags( $post_id );
			$options['category'] = get_the_category( $post_id );
		}

		return $options;
	}
}

if ( ! function_exists( 'pharmacare_core_comments_time_ago_function' ) ) {
    /**
     * Function that set change comments date format to time ago
     *
     * @return string
     */
    function pharmacare_core_comments_time_ago_function($date, $format, $comment) {
        $option = pharmacare_core_get_option_value( 'admin', 'qodef_blog_single_comments_time_ago' );

        $date = esc_html( get_comment_time( wc_date_format() ) );

        if ( $option === 'yes' ) {
            $date = sprintf( esc_html__( '%s ago', 'pharmacare-core' ), human_time_diff(get_comment_time ( 'U' ), current_time( 'timestamp' ) ) );
        }

        return $date;
    }

    add_filter( 'get_comment_date', 'pharmacare_core_comments_time_ago_function', 10, 3 );
}