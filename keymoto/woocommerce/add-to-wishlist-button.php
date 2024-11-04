<?php
/**
 * Add to wishlist button template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.0
 */
if ( ! defined( 'YITH_WCWL' ) ) {
    exit;
} // Exit if accessed directly

global $product;
$product_id = get_the_ID();
?>

<a href="<?php echo esc_url( add_query_arg( 'add_to_wishlist',  esc_attr($product_id) ) )?>" rel="nofollow" data-product-id="<?php echo  esc_attr($product_id) ?>" data-product-type="<?php echo  esc_attr($product->get_type()) ?>" class="add_to_wishlist" >
    <i class="fl-custom-icon-heart-outline-1"></i>
    <span><?php esc_html_e('Add to wishlist','keymoto') ?></span>
</a>
<?php
