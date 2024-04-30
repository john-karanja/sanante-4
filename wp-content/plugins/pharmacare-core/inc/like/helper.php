<?php

if ( ! function_exists( 'pharmacare_core_action_like' ) ) {
	/**
	 * Returns MastrerdsClassLike instance
	 *
	 * @return PharmaCareCoreClassLike
	 */
	function pharmacare_core_action_like() {
		return PharmaCareCoreClassLike::get_instance();
	}
}

function pharmacare_core_get_like() {
	
	echo wp_kses( pharmacare_core_action_like()->add_like(), array(
		'span'  => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'     => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'     => array(
			'href'         => true,
			'class'        => true,
			'id'           => true,
			'title'        => true,
			'style'        => true,
			'data-post-id' => true
		),
		'input' => array(
			'type'  => true,
			'name'  => true,
			'id'    => true,
			'value' => true
		)
	) );
}

if ( ! function_exists( 'pharmacare_core_add_rest_api_like_global_variables' ) ) {
	function pharmacare_core_add_rest_api_like_global_variables( $global, $namespace ) {
		
		$global['qodefAjaxUrl'] = esc_url( admin_url( 'admin-ajax.php' ) );
		return $global;
	}
	
	add_filter( 'pharmacare_filter_rest_api_global_variables', 'pharmacare_core_add_rest_api_like_global_variables', 10, 2 );
}
