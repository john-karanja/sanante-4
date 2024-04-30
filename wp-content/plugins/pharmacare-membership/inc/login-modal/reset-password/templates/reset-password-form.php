<form id="qodef-membership-reset-password-modal-part" class="qodef-m" method="POST">
	<div class="qodef-m-fields">
		<label for="user_login_reset"><?php esc_html_e( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'pharmacare-membership' ); ?> <span class="qodef-required">*</span></label>
		<input type="text" class="qodef-m-user-login" id="user_login_reset" name="user_login" value="" required />
	</div>
	<div class="qodef-m-action">
		<?php
		$reset_button_params = array(
			'custom_class' => 'qodef-m-action-button',
			'html_type'    => 'submit',
			'text'         => esc_html__( 'Reset Password', 'pharmacare-membership' )
		);
		
		echo PharmaCareCore_Button_Shortcode::call_shortcode( $reset_button_params );
		
		pharmacare_membership_template_part( 'login-modal', 'templates/parts/spinner' ); ?>
	</div>
	<?php pharmacare_membership_template_part( 'login-modal', 'templates/parts/response' ); ?>
	<?php pharmacare_membership_template_part( 'login-modal', 'templates/parts/hidden-fields', '', array( 'response_type' => 'reset-password' ) ); ?>
</form>
