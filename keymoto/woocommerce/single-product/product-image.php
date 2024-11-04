<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

global $post, $product;

$unique_id = uniqid('woo-single-image-');


$attachment_ids = array();
if(method_exists($product, 'get_gallery_image_ids')) {
    $attachment_ids = $product->get_gallery_image_ids();
} elseif(method_exists($product, 'get_gallery_attachment_ids')) {
    $attachment_ids = $product->get_gallery_attachment_ids();
}


$style = keymoto_get_theme_mod('shop_inner_style',true);


?>

<div class="images">
            <div class="product-slider fl-magic-popup cf <?php echo esc_attr($unique_id) ;?>" data-custom-class="<?php echo esc_attr($unique_id) ;?>">
                <?php
                if ( has_post_thumbnail() ) {
                    $image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
                    $image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
                    $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
                    if(function_exists('wc_get_image_size')) {
                        $image_size = wc_get_image_size('shop_single');
                        $img_url = '';
                        if(!$img_url) {
                            $img_url = $image_link;
                        }
                        $image = '<img src="'.esc_url($img_url).'" class="wp-post-image" alt="'.esc_attr($image_title).'" />';
                    } else {
                        $image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
                    }

                    echo apply_filters( 'woocommerce_single_product_image_html',
                        sprintf(
                            '<div itemprop="image" class="woocommerce-main-image %s"><a href="'.esc_url($image_link).'" class=" ">%s</a></div>',
                            $image_title,
                            $image,
                            $image_link
                        ),
                        $post->ID );
                } else {
                    if(function_exists('wc_placeholder_img_src')) {
                        echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="'.esc_attr__('Placeholder','keymoto').'" />', wc_placeholder_img_src() ), $post->ID );
                    } else {
                        echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="'.esc_attr__('Placeholder','keymoto').'" />', woocommerce_placeholder_img_src() ), $post->ID );
                    }
                }

                // Product Thumbnails
                if ( count($attachment_ids) > 1 ) {

                    foreach ( $attachment_ids as $attachment_id ) {

                        $classes = array( 'single-product-thumbnail' );

                        $image_url   = wp_get_attachment_url($attachment_id);
                        $image_class = esc_attr( implode( ' ', $classes ) );
                        $image_title = esc_attr( get_the_title( $attachment_id ) );

                        $image_size = wc_get_image_size('shop_single');

                        $img_url = '';

                        if(!$img_url) {
                            $img_url = $image_url;
                        }

                        $image = '<img src ="'.esc_url($img_url).'" alt="'.esc_url($img_url).' " />';

                        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html',
                            sprintf(
                                '<div class="%s"><a href="'.$image_url.'">'.$image.'</a></div>',
                                $image_class,
                                $image_title,
                                $image_url,
                                $image
                            ),
                            $attachment_id,
                            $post->ID,
                            $image_class
                        );
                    }
                }?>

        </div>


        <?php if ($style == 'style_one' or $style == ''){?>
            <div class="product-carousel cf">
                <?php do_action( 'woocommerce_product_thumbnails' ); ?>
            </div>
        <?php } ?>

</div>


