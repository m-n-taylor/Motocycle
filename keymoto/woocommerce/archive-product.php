<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

$shop_style = keymoto_get_theme_mod('shop_style');

$filter_style_option = keymoto_get_theme_mod('filter_style');

// Get Style Shop and Filter
if (isset($_GET["filter_style"]) && $_GET["filter_style"] == "style_two") {
    $filter_style_option = 'style_two';
}

if (isset($_GET["shop_style"]) && $_GET["shop_style"] == "style_one") {
    $shop_style= 'style_one';
}
if (isset($_GET["shop_style"]) && $_GET["shop_style"] == "style_two") {
    $shop_style= 'style_two';
}
if (isset($_GET["shop_style"]) && $_GET["shop_style"] == "style_three") {
    $shop_style= 'style_three';
}

//Container
$container_class = 'container';

//Container custom
if($shop_style== 'style_three'){
    $container_class = 'container-fluid';
}



//Sidebar position
$fl_sidebar ='no';
$fl_sidebar_position = '';
if ( is_active_sidebar( 'woocommerce-sidebar' ) and $shop_style != 'style_two' ) {
    $fl_sidebar_position = 'position_sidebar_left col-md-9 woo-sidebar-position';
} else {
    $fl_sidebar_position = 'col-md-12';
}

// Filter Style
$filter_style = $filter_style_option == 'style_two' ? 'fl-filter-style-two cf' : 'fl-filter-style-one cf';
?>


<div class="fl_main">
    <!--Padding Top Start-->
    <?php if (keymoto_get_theme_mod('woo_archive_padding_top') !== 'disable') { ?>
        <div class="fl-page-padding top"></div>
    <?php } ?>



    <!--Padding Top End-->
    <div class="fl_content_story <?php echo esc_attr($container_class ); ?> cf">

        <div class="col-12 fl-woo-filter cf">
            <?php
                /**
                 * woocommerce_before_shop_loop hook.
                 *
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                    do_action( 'woocommerce_before_shop_loop' );
            ?>
        </div>
        <?php if(is_active_sidebar( 'woocommerce-filter-sidebar' ) and $shop_style == 'style_two'){
            ?>
            <div class="fl-woocommerce-filter-sidebar woo-sidebar disable">
                <div class="sidebar-container col-md-12">
                    <aside class="sidebar">
                        <div class="sidebar_container cf">
                            <?php dynamic_sidebar( 'woocommerce-filter-sidebar' ); ?>
                        </div>
                    </aside>
                </div>
            </div>
        <?php } ?>

        <?php if(is_active_sidebar( 'woocommerce-sidebar' ) and $shop_style != 'style_two'){
            $sticky_sidebar = keymoto_get_theme_mod('woo_archive_sidebar_sticky') != 'sticky' ? '' : ' sidebar-sticky';
            ?>
            <div class="sidebar-container sidebar_left woo-sidebar col-md-3 <?php echo esc_attr($sticky_sidebar); ?>" >
                <aside class="sidebar cf">
                    <div class="sidebar_container">
                        <?php dynamic_sidebar( 'woocommerce-sidebar' ); ?>
                    </div>
                </aside>
            </div>
        <?php } ?>


        <div class="fl_content <?php echo esc_attr($fl_sidebar_position); ?> cf">

            <?php
            /**
             * woocommerce_archive_description hook.
             *
             * @hooked woocommerce_taxonomy_archive_description - 10
             * @hooked woocommerce_product_archive_description - 10
             */
            do_action( 'woocommerce_archive_description' );
            ?>

            <?php
                /**
                 * woocommerce_before_main_content hook.
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action( 'woocommerce_before_main_content' );

            ?>

            <?php if ( have_posts() ) : ?>

                <?php woocommerce_product_loop_start(); ?>

                    <?php woocommerce_product_subcategories(); ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php wc_get_template_part( 'content', 'product' ); ?>

                    <?php endwhile; // end of the loop. ?>

                <?php woocommerce_product_loop_end(); ?>

                <?php
                    /**
                     * woocommerce_after_shop_loop hook.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                ?>

            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                <?php wc_get_template( 'loop/no-products-found.php' ); ?>

            <?php endif; ?>

        <?php
            /**
             * woocommerce_after_main_content hook.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
        ?>
        </div>
    </div>
    <!--Padding Bottom Start-->
    <?php if (keymoto_get_theme_mod('woo_archive_padding_bottom') !== 'disable') { ?>
        <div class="fl-page-padding bottom"></div>
    <?php } ?>
    <!--Padding Bottom End-->
</div>
<?php get_footer( 'shop' ); ?>
