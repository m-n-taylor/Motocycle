<?php
if ( class_exists('WooCommerce') ) {
    global $woocommerce;  ?>
    <a class="cart-links" href="<?php echo wc_get_cart_url() ; ?>" title="<?php esc_html__( 'View your shopping cart' , 'keymoto' ); ?>"><i class="fl-custom-icon-shopping-cart"></i><span class="fl-cart-count"><?php echo sprintf ( WC()->cart->cart_contents_count ); ?></span></a>
    <?php
} ?>