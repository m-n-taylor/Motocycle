<?php
/**
 * Create a woo img container hover style
 */
if ( class_exists('WooCommerce') ) {

    // Other Functions
    get_template_part('admin/function/woo-function/other_woo_functions');
    // Single Product Function
    get_template_part('admin/function/woo-function/archive_function');
    // Archive Product Function
    get_template_part('admin/function/woo-function/single_function');


    //Declare WooCommerce support
    add_action( 'after_setup_theme', 'keymoto_woocommerce_support' );
    function keymoto_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }


    //Up sells Products columns based on options columns
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

    if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
        function woocommerce_output_upsells() {
            $keymoto_column = 3;

            switch ( $keymoto_column ) {
                case 'one' :
                    woocommerce_upsell_display( 1, 1 );
                    break;
                case 'two' :
                    woocommerce_upsell_display( 2, 2 );
                    break;
                case 'three' :
                    woocommerce_upsell_display( 3, 3 );
                    break;
                case 'four' :
                    woocommerce_upsell_display( 4, 4 );
                    break;
                case 'five' :
                    woocommerce_upsell_display( 5, 5 );
                    break;
            }
        }
    }


    add_action( 'init', 'keymoto_remove_wc_breadcrumbs' );
    function keymoto_remove_wc_breadcrumbs() {
        remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    }

    //Load Custom Select JS and CSS
    function keymoto_woo_enqueue_styles() {
        wp_enqueue_style( 'keymoto-woo-style', get_template_directory_uri() .'/woocommerce/css/scss/woocommerce.css', array(), '1.0');
        wp_enqueue_script( 'keymoto-woo-script', get_template_directory_uri() . '/assets/js/woo-scripts.js', array( 'jquery' ), '4.0', true );
   }

    add_action( 'wp_enqueue_scripts', 'keymoto_woo_enqueue_styles',45 );



    /**
     * ------------------------------------------------------------------------------------------------
     *  Products per page based on theme options
     * ------------------------------------------------------------------------------------------------
     */
    if(keymoto_get_theme_mod('products_per_page')){
        function keymoto_loop_shop_per_page( $cols ) {
            $cols = keymoto_get_theme_mod('products_per_page');
            return $cols;
        }
        add_filter( 'loop_shop_per_page', 'keymoto_loop_shop_per_page', 20 );
    }


    remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
    if(!function_exists('keymoto_woocommerce_custom_sales_price')) {
        /*
         * WooCommerce products Sale price filter
         */
        function keymoto_woocommerce_custom_sales_price($text, $post, $product ) {
            $percentage = '';
            if(!is_null($product->get_regular_price()) && $product->get_regular_price() != 0) {
                $percentage = '-'.round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 ) . '%';
            }
            return sprintf( '<span class="onsale fl-font-style-medium">' . esc_html__( 'Sale %s', 'keymoto' ) . '</span>', $percentage );
        }
    }
    add_filter( 'woocommerce_sale_flash', 'keymoto_woocommerce_custom_sales_price', 10, 3 );

}