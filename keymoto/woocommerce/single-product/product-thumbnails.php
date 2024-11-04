<?php
    /**
     * Single Product Thumbnails
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
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
     * @version     3.5.1
     */

    defined( 'ABSPATH' ) || exit;

    global $post, $product, $woocommerce;


    $style = keymoto_get_theme_mod('shop_inner_style',true);
    $attachment_ids = array();
    if(method_exists($product, 'get_gallery_image_ids')) {
        $attachment_ids = $product->get_gallery_image_ids();
    } elseif(method_exists($product, 'get_gallery_attachment_ids')) {
        $attachment_ids = $product->get_gallery_attachment_ids();
    }

    if(has_post_thumbnail()) {
        $thumbnail_id = get_post_thumbnail_id( $post->ID );
        array_unshift($attachment_ids, $thumbnail_id);
        array_unique($attachment_ids);
    }

    if ( count($attachment_ids) > 1 ) { ?>
        <?php

        $loop = 0;
        $columns = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );

        foreach ( $attachment_ids as $attachment_id ) {

            $classes = array( 'single-product-thumbnail' );

            $image_class = esc_attr( implode( ' ', $classes ) );
            $image_title = esc_attr( get_the_title( $attachment_id ) );

            // Image size Style


            $image_size_style = 'full';

            $size_image  = wp_get_attachment_image_src( $attachment_id, $image_size_style );

            $image = '<img src ="'.esc_url($size_image[0]).'" title="'.$image_title.'"  alt=" '.$image_title.' " />';



                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html',
                    sprintf(
                        '<div class="%s">%s</div>',
                        $image_class,
                        $image,
                        $image_title
                    ),
                    $attachment_id,
                    $post->ID,
                    $image_class
                );



            $loop++;
        }

        ?>
        <?php
    }

    ?>

