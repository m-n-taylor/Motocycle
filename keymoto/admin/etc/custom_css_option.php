<?php
//Custom Styles Option
function keymoto_custom_style() {
    $custom_css =$theme_border_bg_gradient_start=$theme_border_bg_gradient_end= '';
    // Custom CSS

        $theme_border_color = keymoto_get_theme_mod('theme_border_color');
        $primary_color = keymoto_get_theme_mod('primary_color_setting');
        $secondary_color = keymoto_get_theme_mod('secondary_color_setting');
        $light_color = keymoto_get_theme_mod('light_color_setting');
        $dark_color = keymoto_get_theme_mod('dark_color_setting');

        // Theme Custom Color Setting
            // Primary
        $custom_css .='.fl-primary-color,.fl-primary-hv-color:hover{color:'.$primary_color.'!important;}';
        $custom_css .='.fl-primary-bg,.fl-primary-hv-bg:hover{background-color:'.$primary_color.'!important;}';
            // Secondary
        $custom_css .='.fl-secondary-color,.fl-secondary-hv-color:hover{color:'.$secondary_color.'!important;}';
        $custom_css .='.fl-secondary-bg,.fl-secondary-hv-bg:hover{background-color:'.$secondary_color.'!important;}';
            // Light
        $custom_css .='.fl-light-color,.fl-light-hv-color:hover{color:'.$light_color.';}';
        $custom_css .='.fl-light-bg,.fl-light-hv-bg:hover{background-color:'.$light_color.';}';
            // Dark
        $custom_css .='.fl-dark-color,.fl-dark-hv-color:hover{color:'.$dark_color.';}';
        $custom_css .='.fl-dark-bg,.fl-dark-hv-bg:hover{background-color:'.$dark_color.';}';
            // Border
        $custom_css .='.fl-theme-border-color,input,select,textarea,fieldset,table,th,td,.wp-block-table.is-style-stripes td, .wp-block-table.is-style-stripes th,pre, fieldset, input, textarea, table, table *, hr,.fl-default-pagination .page-numbers,.autos-pagination li,#pix-sorting .sorting__inner .sorting__item.view-by a{border-color:'.$theme_border_color.'!important;}';


        // Theme Style
            // Menu
        $custom_css .='.fl-mega-menu ul li:hover > a{color:'.$primary_color.';}';
        $custom_css .='.fl--header .header-content-wrap .header-content .fl--navigation-icon-container .fl-sidebar-header-icon-wrap, .fl--header .header-content-wrap .header-content .fl--navigation-icon-container .fl--hamburger-menu{background-color:'.$primary_color.';}';
            //Button style
        $custom_css .='.fl-default-button.primary-button-style{background-color:'.$primary_color.';}';
        $custom_css .='.fl-default-button.primary-button-style .button-decor{background-color:'.$secondary_color.';}';
        $custom_css .='.fl-default-button.primary-button-style:hover{background-color:'.$secondary_color.';}';
        $custom_css .='.fl-default-button.primary-button-style:hover .button-decor{background-color:'.$primary_color.';}';
        $custom_css .='.fl-default-button.secondary-button-style{background-color:'.$secondary_color.';}';
        $custom_css .='.fl-default-button.secondary-button-style .button-decor{background-color:'.$primary_color.';}';
        $custom_css .='.fl-default-button.secondary-button-style:hover{background-color:'.$primary_color.';}';
        $custom_css .='.fl-default-button.secondary-button-style:hover .button-decor{background-color:'.$secondary_color.';}';

        // Breadcrumbs
        $custom_css .='.fl-page-heading .breadcrumbs a{color:'.$primary_color.';}';

        // Vehicle Listings Page
        $custom_css .='#pix-sorting .sorting__inner .sorting__item.view-by a:hover, #pix-sorting .sorting__inner .sorting__item.view-by a.active{background-color:'.$secondary_color.';border-color:'.$secondary_color.'!important;}';
        $custom_css .='.jelect-option_state_active{background-color:'.$primary_color.'!important;}';
        $custom_css .='.jelect-option:hover{background-color:'.$secondary_color.';}';
        $custom_css .='.pix-auto-wrapper-loader.ajax-loading .templines-pixad-grid-item .middle-content:after{color:'.$primary_color.';}';

        // Blog Archive
        $custom_css .='.post-archive-wrapper .fl-post--item .post-bottom-content .post-info-wrap .post-info a:hover{color:'.$primary_color.';}';
        $custom_css .='.post-archive-wrapper .fl-post--item .post-bottom-content .post-btn-read-more .post-link .decor-button{background-color:'.$primary_color.';}';
        $custom_css .='.post-archive-wrapper .fl-post--item .post-bottom-content .post-btn-read-more .post-link:hover .decor-button{background-color:'.$secondary_color.';}';

        // Blog Single
        $custom_css .='.post-inner_content a:hover{color:'.$primary_color.'!important}';
        $custom_css .='.single-post-wrapper .post-tag-and-share-wrap .post-share-content .templines-share--icon:hover{background-color:'.$primary_color.';border-color:'.$primary_color.';}';
        $custom_css .='.single-post-wrapper .post-tag-and-share-wrap .post-tags-content .tags-content a:hover,.logged-in .comment-respond form.fl-comment-form .logged-in-as a:hover{color:'.$primary_color.';}';
        $custom_css .='.single-post-wrapper .post-info-wrap .post-info a:hover{color:'.$primary_color.';}';
        $custom_css .='.comments-container .comments-list .fl-comment .comment-container .comment-meta .comment--reply a:after{background-color:'.$primary_color.';}';

        // Comment Form
        $custom_css .='form.fl-comment-form .comment-form-cookies-consent input[type=checkbox]:checked:after{color:'.$primary_color.'}';
        $custom_css .='.comment-meta a:hover,.comment--reply a,.comment-respond .comment-reply-title #cancel-comment-reply-link:hover{color:'.$primary_color.'!important;}';
        $custom_css .='.comments-container .comment-title,.comment-respond .comment-reply-title{border-color:'.$primary_color.';}';
        // Pagination
        $custom_css .='.fl-default-pagination .page-numbers.current, .fl-default-pagination .page-numbers:hover{color:'.$primary_color.';}';
        $custom_css .='.fl-default-pagination .page-numbers.next, .fl-default-pagination .page-numbers.prev{background-color:'.$secondary_color.';}';
        $custom_css .='.fl-default-pagination .page-numbers.next:hover, .fl-default-pagination .page-numbers.prev:hover{background-color:'.$primary_color.';}';
        // Moto Single Page
        $custom_css .='';
        // Widget
        $custom_css .='.sidebar .widget_search form .searchsubmit i{color:'.$primary_color.';}';
        $custom_css .='.sidebar .widget_tag_cloud .tagcloud a:hover{background-color:'.$primary_color.';}';
        $custom_css .='.sidebar:not(.cars-sidebar) .widget ul li a:hover{color:'.$primary_color.';}';
        $custom_css .='.sidebar .widget_categories ul > li:hover:after{border-color: transparent transparent transparent '.$primary_color.';}';
            // Custom Widget
        $custom_css .='.widget_templines_theme_helper_blog_post_widget .blog-post-widget-wrap .blog-post-widget-item .post-content-wrap .post-widget-title a:hover{color:'.$primary_color.';}';
        $custom_css .='.widget_templines_theme_helper_wmpl_mailchimp_footer .footer-mailchimp-wrap .container-content .mailchimp-content-wrap .mailchimp-footer-form form .mc4wp-form-fields button:hover .button-decor{background-color:'.$primary_color.';}';
        // Footer
        $custom_css .='.footer-widget-area .widget_nav_menu ul li a:hover:before{background-color:'.$primary_color.';}';
        $custom_css .='.widget_templines_theme_helper_social_profiles .footer-social-profiles-ul .footer-social-profiles-li .footer-social-profiles-link:hover{color:'.$primary_color.';}';
        // Page Builder
        $custom_css .='.page-builder-icon-box-wrap:hover .icon-box-left-content .icon-wrap i{color:'.$primary_color.'!important;}';

            // Moto Slider
        $custom_css .='.templines-moto-slider-wrap .moto-slider-count-arrow-wrap .entry-slider-cont-arrow .moto-slider-arrow-prev:hover, .templines-moto-slider-wrap .moto-slider-count-arrow-wrap .entry-slider-cont-arrow .moto-slider-arrow-next:hover{background-color:'.$primary_color.'!important;}';
            // Video Box
        $custom_css .='.page-builder-video-box-wrap .entry-content-video-box .preview-box-content-wrap{border-color:'.$primary_color.'!important;}';

            // Body Type
        $custom_css .='.page-builder-moto-body-types-wrap .body-type-item-wrap{border-color:'.$primary_color.'!important;}';
        $custom_css .='.page-builder-moto-body-types-wrap .body-type-item-wrap .button-body-type .button-decor{background-color:'.$primary_color.'}';
        $custom_css .='.page-builder-moto-body-types-wrap .body-type-item-wrap .button-body-type{color:'.$primary_color.';}';
        $custom_css .='.page-builder-moto-body-types-wrap .body-type-item-wrap:hover{background-color:'.$primary_color.'!important;}';
        $custom_css .='.templines-testimonial-slider-wrap .templines-testimonial-slider .slick-dots li:hover button, .templines-testimonial-slider-wrap .templines-testimonial-slider .slick-dots li.slick-active button{border-color:'.$primary_color.'!important;}';
  
        // Header Sidebar
        $custom_css .='.header-sidebar-wrap .entry-content .header-sidebar-container .entry-sidebar .widget.widget_nav_menu li a:hover{color:'.$primary_color.'!important;}';

            // Search
        $custom_css .='.fl-vc-vehicle-search .vc-auto-search .select .home-search-label:before{color:'.$primary_color.'!important}';
        $custom_css .='.fl-vc-vehicle-search .vc-auto-search .select .jelect-current{border:1px solid '.$theme_border_color.'!important;}';
        // Icon Box About Us
        $custom_css .='.page-builder-about-us-icon-box-wrap .entry-content{background-color:'.$light_color.'!important}';
        // Quote
        $custom_css .='.page-builder-quote-box-wrap .entry-content .right-content{border-color:'.$primary_color.'!important}';
        // Header Sidebar
        $custom_css .='.header-sidebar-wrap .entry-content .header-sidebar-container .entry-sidebar .widget.widget_nav_menu li a:hover{color:'.$primary_color.'!important;}';

        // Blog Post Home Page
        $custom_css .='.page-builder-home-page-blog-posts-wrap .templines-home-page-blog-post-item .post-bottom-content .post-info-wrap .post-info a:hover{color:'.$primary_color.'!important;}';
        $custom_css .='.page-builder-home-page-blog-posts-wrap .templines-home-page-blog-post-item .post-bottom-content .post-btn-read-more .post-link .decor-button{background-color:'.$primary_color.';}';
        $custom_css .='.page-builder-home-page-blog-posts-wrap .templines-home-page-blog-post-item .post-bottom-content .post-btn-read-more .post-link:hover .decor-button{background-color:'.$secondary_color.'!important;}';
        
          // Other Style
        $custom_css .= '.fl-page-heading{background-color:'.$dark_color.';}';
        $custom_css .= 'footer{background-color:'.$dark_color.';}';
        $custom_css .='blockquote{border-color:'.$primary_color.'!important;}';
        $custom_css .='.keymoto-rev-slider-arrow:hover{background-color:'.$primary_color.'!important;}';

        // Other
        $custom_css .='.post-inner_content .wp-block-button__link:hover{color:#ffffff!important}';
        $custom_css .='.single-page-wrapper .wp-block-cover.has-background-dim a:hover{color:#ffffff!important}';
        $custom_css .='.post-inner_content .wp-block-pullquote.is-style-solid-color blockquote{border-color:transparent!important;}';
        $custom_css .='.wp-block-file a.wp-block-file__button:hover{background:'.$primary_color.'!important;color:#fff!important;}';
        $custom_css .='.post-inner-pagination .post-page-numbers.current, .page-inner-pagination .post-page-numbers.current{background:'.$primary_color.'!important;border-color:'.$primary_color.'!important;}';
        
        if ( class_exists('WooCommerce') ) {
        // Woo Style
        $custom_css .='.woocommerce div.product .price .woocommerce-Price-amount,.woocommerce div.product .price .woocommerce-Price-amount , html .shop-archive-item .fl-woo-item-inner-content .fl-woo-item-bottom-content .fl--woo-add-to-cart-wrap .fl--woo-price-wrap{color:'.$primary_color.'!important;}';
        $custom_css .= '.shop-archive-item .fl-woo-item-inner-content .fl-woo-item-bottom-content .fl--woo-add-to-cart-wrap .fl--add-to-cart-btn a:hover{background-color:'.$primary_color.';}';
        $custom_css .='.woocommerce div.product form.cart button:before{background-color:'.$primary_color.'}';
        $custom_css .='.woocommerce div.product .woocommerce-tabs ul.tabs li.active{background-color:'.$primary_color.'}';
        $custom_css .='.woocommerce div.product .product_meta .tagged_as a:hover{background-color:'.$primary_color.'!important;}';
        $custom_css .='.wc-tab#tab-reviews form.comment-form .submit-btn-container button{background-color:'.$primary_color.'!important}';
        $custom_css .='.single-product .woocommerce-message a.button:hover, .single-product .woocommerce-message a:hover, .woocommerce-info a.button:hover, .woocommerce-info a:hover, .woocommerce-message a.button, .woocommerce-message a:hover{background:'.$primary_color.'!important;}';
        $custom_css .='input[type=checkbox]:checked:after{color:'.$primary_color.'!important;}';
        $custom_css .='.woocommerce form.login .form-row button.button{background-color:'.$primary_color.'}';
        $custom_css .='.woocommerce table.shop_table tbody tr td.actions .coupon button,.woocommerce table.shop_table tbody tr td.actions .update--cart-content button.update_cart,.woocommerce .cart-collaterals .cart_totals a.checkout-button,.woocommerce .return-to-shop a.wc-backward,form.checkout #order_review #payment .place-order button,.woocommerce form.login .form-row button.button,.woocommerce form.lost_reset_password button.button,.woocommerce button.button{ background-color:'.$primary_color.'}';
        $custom_css .='.woocommerce table.shop_table tbody tr td.actions .coupon button:hover,.woocommerce table.shop_table tbody tr td.actions .update--cart-content button.update_cart:hover:enabled,.woocommerce .cart-collaterals .cart_totals a.checkout-button:hover,.woocommerce .return-to-shop a.wc-backward:hover,form.checkout #order_review #payment .place-order button:hover,.woocommerce form.login .form-row button.button:hover,.woocommerce form.lost_reset_password button.button:hover,.woocommerce button.button:hover{ background-color:'.$primary_color.'}';
        $custom_css .='.shop-archive-item .fl-woo-item-inner-content .fl-woo-item-bottom-content .fl--woo-add-to-cart-wrap .fl--add-to-cart-btn a{background-color:'.$secondary_color.';}';
        $custom_css .='.shop-archive-item .fl-woo-item-inner-content .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover:before{color:'.$primary_color.';}';
        $custom_css .='.hidden{display:none!important;}';
        $custom_css .='.woocommerce div.product form.cart button:hover:after{background-color:'.$secondary_color.';}';
        $custom_css .='.single-product .woocommerce-message a.button:hover, .single-product .woocommerce-message a:hover, .woocommerce-info a.button:hover, .woocommerce-info a:hover, .woocommerce-message a.button:hover, .woocommerce-message a:hover{background-color:'.$secondary_color.'!important;}';
        $custom_css .='.woocommerce table.shop_table tbody tr td.actions .coupon button:hover,.woocommerce table.shop_table tbody tr td.actions .update--cart-content button.update_cart:hover{background-color:'.$secondary_color.'!important;}';
        $custom_css .='.woocommerce .cart-collaterals .cart_totals a.checkout-button{background-color:'.$secondary_color.'!important;}';
        $custom_css .='.woocommerce .cart-collaterals .cart_totals a.checkout-button:hover{background-color:'.$primary_color.'!important;}';
        $custom_css .='.woocommerce-info .showcoupon{background-color:'.$primary_color.';}';
        $custom_css .='.woocommerce-info .showcoupon:hover{background-color:'.$secondary_color.';color:#ffffff!important;}';
        $custom_css .='.woocommerce form.checkout_coupon button:hover{background-color:'.$secondary_color.'!important}';
        $custom_css .='form.checkout #order_review #payment .place-order button:hover{background-color:'.$secondary_color.'!important;}';
        $custom_css .='.fl--woo-price-wrap{color:'.$primary_color.'}';
        $custom_css .='.shop-archive-item .fl-woo-item-inner-content .fl-woo-item-top-content .onsale{background-color:'.$primary_color.';}';
        }
        wp_add_inline_style( 'keymoto-general', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'keymoto_custom_style',99);

