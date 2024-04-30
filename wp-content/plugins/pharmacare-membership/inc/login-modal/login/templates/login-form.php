<form id="qodef-membership-login-modal-part" class="qodef-m" method="GET">
	<div class="qodef-m-fields">
		<label for="user_name"><?php esc_html_e( 'Username', 'pharmacare-membership' ) ?> <span class="qodef-required">*</span></label>
		<input type="text" class="qodef-m-user-name" id="user_name" name="user_name" value="" required pattern=".{3,}" autocomplete="username"/>

		<label for="user_password"><?php esc_html_e( 'Password', 'pharmacare-membership' ) ?> <span class="qodef-required">*</span></label>
		<input type="password" class="qodef-m-user-password" id="user_password" name="user_password" required autocomplete="current-password" />
	</div>
	<div class="qodef-m-links">
		<div class="qodef-m-links-remember-me">
			<input type="checkbox" id="qodef-m-links-remember" class="qodef-m-links-remember" name="remember" value="forever" />
			<label for="qodef-m-links-remember" class="qodef-m-links-remember-label"><?php esc_html_e( 'Remember me', 'pharmacare-membership' ) ?></label>
		</div>
		<?php
		$reset_button_params = array(
			'custom_class'  => 'qodef-m-links-reset-password',
			'button_layout' => 'textual',
			'link'          => '#',
			'text'          => esc_html__( 'Lost your password?', 'pharmacare-membership' )
		);
		
		echo PharmaCareCore_Button_Shortcode::call_shortcode( $reset_button_params ); ?>
	</div>
	<div class="qodef-m-action">
		<?php
		$login_button_params = array(
			'custom_class' => 'qodef-m-action-button',
			'html_type'    => 'submit',
			'text'         => esc_html__( 'Login', 'pharmacare-membership' )
		);
		
		echo PharmaCareCore_Button_Shortcode::call_shortcode( $login_button_params );
		
		pharmacare_membership_template_part( 'login-modal', 'templates/parts/spinner' ); ?>
	</div>
	<?php
	/**
	 * Hook to include additional form content
	 */
	do_action( 'pharmacare_membership_action_login_form_template' );
	
	pharmacare_membership_template_part( 'login-modal', 'templates/parts/response' );
	pharmacare_membership_template_part( 'login-modal', 'templates/parts/hidden-fields', '', array( 'response_type' => 'login' ) ); ?>
</form>
