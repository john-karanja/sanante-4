<form id="qodef-membership-register-modal-part" class="qodef-m" method="POST">
	<div class="qodef-m-fields">
		<label for="user_name_register"><?php esc_html_e( 'Username', 'pharmacare-membership' ) ?> <span class="qodef-required">*</span></label>
		<input type="text" class="qodef-m-user-name" id="user_name_register" name="user_name" value="" required pattern=".{3,}" autocomplete="username"/>

		<label for="user_email_register"><?php esc_html_e( 'Email', 'pharmacare-membership' ) ?> <span class="qodef-required">*</span></label>
		<input type="email" class="qodef-m-user-email" id="user_email_register" name="user_email" value="" required autocomplete="email"/>

		<label for="user_password_register"><?php esc_html_e( 'Password', 'pharmacare-membership' ) ?> <span class="qodef-required">*</span></label>
		<input type="password" class="qodef-m-user-password" id="user_password_register" name="user_password" required pattern=".{5,}" autocomplete="new-password"/>

		<label for="user_confirm_password_register"><?php esc_html_e( 'Repeat Password', 'pharmacare-membership' ) ?> <span class="qodef-required">*</span></label>
		<input type="password" class="qodef-m-user-confirm-password" id="user_confirm_password_register" name="user_confirm_password" required pattern=".{5,}" autocomplete="new-password"/>
	</div>
	
	<div class="qodef-m-action">
		<?php
		$register_button_params = array(
			'custom_class' => 'qodef-m-action-button',
			'html_type'    => 'submit',
			'text'         => esc_html__( 'Register', 'pharmacare-membership' )
		);
		
		echo PharmaCareCore_Button_Shortcode::call_shortcode( $register_button_params );
		
		pharmacare_membership_template_part( 'login-modal', 'templates/parts/spinner' ); ?>
	</div>
	<?php pharmacare_membership_template_part( 'login-modal', 'templates/parts/response' ); ?>
	<?php pharmacare_membership_template_part( 'login-modal', 'templates/parts/hidden-fields', '', array( 'response_type' => 'register' ) ); ?>
</form>
