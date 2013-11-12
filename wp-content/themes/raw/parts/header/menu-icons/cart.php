<?php
global $woocommerce;
?>
<li class="menu-item menu-item-cart">
	<a href="#">
        <i class="icon icon-shopping-cart"></i>
        <span class="total"></span>
    </a>
	<div id="panel-cart">
		<div id="panel-cart-content">
			<div class="cart-summary">
				<a class="button-view-cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
					<span class="items"></span><span class="label label-items"> items</span>
					<span class="total"></span>
				</a>
			</div>
			<div class="cart-buttons">
				<a class="button plain button-view-cart" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">View Cart</a>
				<a class="button plain button-checkout" href="<?php echo $woocommerce->cart->get_checkout_url(); ?>">Checkout</a>
			</div>
			<div class="clearboth"></div>
		</div>
	</div>
</li>