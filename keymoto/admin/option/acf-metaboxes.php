<?php
if (function_exists('acf_add_local_field_group')):
    add_action('init', 'keymoto_acf_init');
    if (!function_exists( 'keymoto_acf_init' )):
        function keymoto_acf_init()
        {
// Single Blog Option
            get_template_part('admin/option/acf_option/blog/blog_single_option');
// Blog Page Template
            get_template_part('admin/option/acf_option/page-blog-template/page_blog_template');
// Page Option
            get_template_part('admin/option/acf_option/page/page_option');
// Work Single Option
            get_template_part('admin/option/acf_option/work/work_single_option');
// Autos Option
            get_template_part('admin/option/acf_option/autos/autos-single-option');
            // Product Option
            if ( class_exists('WooCommerce') ) {
                get_template_part('admin/option/fl_acf/woo/woo_option');

            }
        }
    endif;
endif;