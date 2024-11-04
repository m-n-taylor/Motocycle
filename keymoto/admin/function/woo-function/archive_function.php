<?php

// Item Inner
add_action( 'woocommerce_before_shop_loop_item',  'keymoto_item_woo_inner_wrapper_start', 1);
function keymoto_item_woo_inner_wrapper_start() {
    echo '<div class="fl-woo-item-inner-content">';
    //Wishlist Btn

    echo keymoto_wishlist_btn();
}
add_action( 'woocommerce_after_shop_loop_item',  'keymoto_item_woo_inner_wrapper_end', 99);

function keymoto_item_woo_inner_wrapper_end() {
    echo '</div>';
}




// Top Content
add_action( 'woocommerce_before_shop_loop_item_title',  'keymoto_item_top_item_wrapper_start', 1);
function keymoto_item_top_item_wrapper_start() {

    echo '<div class="fl-woo-item-top-content">';
}

add_action( 'woocommerce_before_shop_loop_item_title',  'keymoto_item_top_item_wrapper_end', 12);
function keymoto_item_top_item_wrapper_end() {

    echo '</div>';
}




function keymoto_display_archive_new_item() {
    global $product;
    if ( get_post_meta( $product->get_id(), 'new_item', true ) ) {
        echo '<span class="new_item fl-primary-bg">'.esc_html__( 'New', 'keymoto' ).'</span>';
    }
}


/**
 * ------------------------------------------------------------------------------------------------
 * WishList button
 * ------------------------------------------------------------------------------------------------
 */

if( ! function_exists( 'woodmart_wishlist_btn' ) ) {
    function keymoto_wishlist_btn() {

        if( class_exists('YITH_WCWL_Shortcode')) echo YITH_WCWL_Shortcode::add_to_wishlist(array());

    }
}



// Top Content
add_action( 'woocommerce_before_shop_loop_item_title',  'keymoto_item_bottom_item_wrapper_start', 99);
function keymoto_item_bottom_item_wrapper_start() {
    echo '<div class="fl-woo-item-bottom-content">';

}

add_action( 'woocommerce_after_shop_loop_item',  'keymoto_item_bottom_item_wrapper_end', 99);
function keymoto_item_bottom_item_wrapper_end() {
    echo '</div>';
}

/**
 * ------------------------------------------------------------------------------------------------
 *  Woo Category
 * ------------------------------------------------------------------------------------------------
 */
function woocommerce_template_loop_product_title() {

    $title = get_the_title();

    echo '<div class="entry-content">';

    echo '<div class="left-content">';

    echo  '<a class="fl--woo-title-link" href="' . esc_url(get_permalink()) . '" title="' . esc_attr($title) . '">';

    echo '<h4 class="fl--woo-shop-loop-title">'. $title . '</h4>';

    echo '</a>';

    echo '<div class="fl--woo-category-wrapper fl-font-style-lighter-than">' . wc_get_product_category_list('', ', ', '<span class="fl--woo-category">', '</span>') . '</div>';

    echo '</div>';

    echo '<div class="right-content">';

    if(function_exists('woocommerce_template_loop_price')) {
        echo '<div class="fl--woo-price-wrap fl-font-style-medium">';
        woocommerce_template_loop_price();
        echo '</div>';
    }

    echo '</div>';

    echo '</div>';
}


/**
 * ------------------------------------------------------------------------------------------------
 *  Price
 * ------------------------------------------------------------------------------------------------
 */
if(!function_exists('keymoto_woocommerce_template_loop_price')) {
    function keymoto_woocommerce_template_loop_price() {

    }
}




/**
 * ------------------------------------------------------------------------------------------------
 * Add to Card Button List
 * ------------------------------------------------------------------------------------------------
 */
    if(!function_exists('keymoto_add_to_cart_button')) {
        function keymoto_add_to_cart_button() {

            echo '<div class="fl--woo-add-to-cart-wrap">';
            if(function_exists('woocommerce_template_loop_add_to_cart')) {
                echo '<div class="fl--add-to-cart-btn fl-font-style-medium">';
                    woocommerce_template_loop_add_to_cart();
                echo '</div>';
            }



            echo '</div>';
        }
    }






if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

    /**
     * Get the product thumbnail for the loop.
     */
    function woocommerce_template_loop_product_thumbnail() {

        $css_class = 'fl-woo-image-cover';

        $title = get_the_title();


        echo '<div class="'.$css_class.'">';

        echo '<a class="fl-woo-image-product-link" href="' . esc_url(get_permalink()) . '" title="' . esc_attr($title) . '">';

        echo  woocommerce_get_product_thumbnail();

        echo  '</a>';

        echo '</div>';
    }
}

//Archive Function







    remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
    remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    add_action( 'woocommerce_before_shop_loop_item_title',  'keymoto_display_archive_new_item', 1);
    add_action( 'woocommerce_after_shop_loop_item',  'keymoto_add_to_cart_button', 1);
