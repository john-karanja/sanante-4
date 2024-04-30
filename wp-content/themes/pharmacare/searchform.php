<?php
// Unique ID for search form fields
$qodef_unique_id = uniqid( 'qodef-search-form-' );
?>
<form role="search" method="get" class="qodef-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $qodef_unique_id ); ?>" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'pharmacare' ); ?></label>
	<div class="qodef-search-form-inner clear">
		<input type="search" id="<?php echo esc_attr( $qodef_unique_id ); ?>" class="qodef-search-form-field" value="" name="s" placeholder="<?php esc_attr_e( 'Search', 'pharmacare' ); ?>" />
		<button type="submit" class="qodef-search-form-button">
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g><g><path d="M31.707,30.293l-8.846-8.846a13.039,13.039,0,1,0-1.414,1.414l8.846,8.846a1,1,0,0,0,1.414-1.414ZM2,13A11,11,0,1,1,13,24,11.013,11.013,0,0,1,2,13Zm4,1a1,1,0,0,1-1-1,8.008,8.008,0,0,1,.185-1.715,1,1,0,1,1,1.953.426A6.108,6.108,0,0,0,7,13,1,1,0,0,1,6,14ZM8.3,8.813a1,1,0,0,1-.672-1.742A7.983,7.983,0,0,1,13,5a1,1,0,0,1,0,2A5.982,5.982,0,0,0,8.972,8.554,1,1,0,0,1,8.3,8.813Z"/></g></g></svg>
		</button>
	</div>
</form>