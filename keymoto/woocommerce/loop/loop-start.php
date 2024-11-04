<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.3.0
 */

$css_classes[] = $wrapper_attributes[] = '';

$animation_enable = keymoto_get_theme_mod('woo_animation');
if (!empty($animation_enable) and ($animation_enable != 'disable')) {
    $css_classes[] .= 'fl-animated-item-velocity';
    $wrapper_attributes[] = 'data-animate-type="'.$animation_enable.'"';
    $wrapper_attributes[] = 'data-item-for-animated=".shop-archive-item"';
}



$css_class = preg_replace('/\s+/', ' ', implode(' ', array_filter(array_unique($css_classes))));
?>


<div class="products fl-archive--page cf <?php echo esc_attr(trim($css_class)); ?>" <?php echo implode(' ', $wrapper_attributes); ?> >
