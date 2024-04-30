<a itemprop="url" class="qodef-m-opener" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
	<span class="qodef-cart-icon-count-holder">
		<span class="qodef-m-opener-icon"><?php echo qode_framework_icons()->get_specific_icon_from_pack( 'dropdown-cart', 'fontkiko' ); ?></span>
		<span class="qodef-m-opener-count"><?php echo WC()->cart->cart_contents_count; ?></span>
	</span>
	
	<span class="qodef-cart-text-holder">
		<span class="qodef-cart-title">Cart</span>
		<span class="qodef-m-order-amount"><?php wc_cart_totals_subtotal_html(); ?></span>
	</span>
</a>
