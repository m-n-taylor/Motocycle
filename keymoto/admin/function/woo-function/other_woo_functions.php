<?php
/**
 * ------------------------------------------------------------------------------------------------
 *  WOO Breadcrumbs
 * ------------------------------------------------------------------------------------------------
 */

    add_filter('woocommerce_breadcrumb_defaults', 'keymoto_woocommerce_breadcrumb');
    if(!function_exists('woocommerce_breadcrumb_defaults') and !function_exists(' keymoto_woocommerce_breadcrumb')) {
        function keymoto_woocommerce_breadcrumb($args) {
            $args['delimiter']          = '<span class="breadcrumbs-delimiter fl-primary-color"></span>';
            $args['wrap_before']        = '<div class="breadcrumbs">';
            $args['wrap_after']         = '</div>';
            $args['home']               = esc_attr__( 'Home', 'keymoto' );
            return $args;
        }
    }

/**
 * ------------------------------------------------------------------------------------------------
 *  Override WooCommerce default function
 * ------------------------------------------------------------------------------------------------
 */
    add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );
    function woocommerce_header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;

        $fragments['a.fl-woo-cart-contents'] = keymoto_a_woo_cart_contents();

        return $fragments;

    }
/**
 * ------------------------------------------------------------------------------------------------
 *  WooCommerce header cart button
 * ------------------------------------------------------------------------------------------------
 */
    if(!function_exists('keymoto_a_woo_cart_contents')) {

        function keymoto_a_woo_cart_contents() {
            global $woocommerce;
            if(function_exists('wc_get_cart_url')) {
                $href = wc_get_cart_url();
            } else {
                $href = $woocommerce->cart->get_cart_url();
            }

            $html = $title = '';

            $items_count = $woocommerce->cart->cart_contents_count;



            if($items_count != 0){
                $count = '<span class="fl--woo-cart-details">'.$items_count.'</span>';
            } else{
                $count = '';
            }

            $html .= '<a class="fl-woo-cart-contents" href="'. esc_url($href) .'" title="'. esc_attr($title) .'">';
            $html .= '<span class="fl--woo-cart-items">';
            $html .= '<i class="fl-custom-icon-shopping-cart"></i>';
            $html .= '</span>';
            $html .= $count;
            $html .= '</a>';

            return $html;
        }
    }
/**
 * ------------------------------------------------------------------------------------------------
 *  WooCommerce cart content in header
 * ------------------------------------------------------------------------------------------------
 */
    if(!function_exists('keymoto_woocommerce_total_cart')) {

        function keymoto_woocommerce_total_cart($simple = false) {
            if (!class_exists('WooCommerce')) {
                return;
            }

            $html = '';

            $html .= '<div class="fl-cart--header header-icon">';
            $html .= keymoto_a_woo_cart_contents();
            if(!$simple) {
                $html .= '<div class="fl-shopping-cart-content">';
                $html .= '<div class="widget_shopping_cart_content"></div>';
                $html .= '</div>';
            }
            $html .= '</div>';

            return $html;
        }
    }

/**
 * ------------------------------------------------------------------------------------------------
 *  WooCommerce Wishlist
 * ------------------------------------------------------------------------------------------------
 */
    if(!function_exists('keymoto_wishlist_button')) {

        function keymoto_wishlist_button() {
            if (!defined('YITH_WCWL')) {
                return;
            }


            global $yith_wcwl;

            $items_in_wishlist = $yith_wcwl->count_products();

            $html = '';

            $href = $yith_wcwl->get_wishlist_url();
            $title = esc_html__('View your wishlist', 'keymoto');

            $html .= '<a class="fl--wishlist-button" href="'. esc_url($href) .'" title="'. esc_attr($title) .'">';

            $html .= '<i class="fl-custom-icon-heart-outline"></i>';

            $html .= '<span class="detail-text">'.esc_html__( 'My Favorites', 'keymoto' ).'</span>';
            $html .= '<span class="fl--wishlist-details fl-detail">'. esc_html($items_in_wishlist) .'</span>';


            $html .= '</a>';

            return $html;
        }
    }

    add_action( 'wp_ajax_keymoto_update_wishlist_count', 'keymoto_update_wishlist_count' );
    add_action( 'wp_ajax_nopriv_keymoto_update_wishlist_count', 'keymoto_update_wishlist_count' );
    //Update wishlist counter
    if(!function_exists('keymoto_update_wishlist_count')) {
        function keymoto_update_wishlist_count(){
            if( function_exists( 'YITH_WCWL' ) ){
                wp_send_json( YITH_WCWL()->count_products() );
            }
        }
    }



remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );


