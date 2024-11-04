<?php
/****************************************************************
 * DO NOT DELETE
 ****************************************************************/

// include system functions
if (!isset($content_width)) $content_width = 1140;


/**
 * Load Theme Variable Data
 * @param string $var
 * @return string
 */
function keymoto_theme_data_variable($var) {
    if (!is_file(STYLESHEETPATH . '/style.css')) {
        return '';
    }

    $theme_data = wp_get_theme();
    return $theme_data->{$var};
}



add_filter( 'register_post_type_args', 'rename_post_type_slug', 10, 2 );
function rename_post_type_slug( $args, $post_type ) {

    if ( 'pixad-autos' === $post_type ) {
        $args['rewrite']['slug'] = 'moto';  // <-- RENAME HERE
    }
    return $args;
}

function load_more_products() {
  $page = $_POST['page'];
  $posts_per_page = $_POST['posts_per_page'];

  $args = array(
    'post_type' => 'product',
    'posts_per_page' => $posts_per_page,
    'paged' => $page,
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
      wc_get_template_part('content', 'product');
    endwhile;
  endif;

  wp_die();
}

add_action('wp_ajax_load_more_products', 'load_more_products');
add_action('wp_ajax_nopriv_load_more_products', 'load_more_products');


/****************************************************************
 * Define Constants
 ****************************************************************/

define("KEYMOTO_THEME_URL", get_template_directory_uri());
define('KEYMOTO_THEME_VERSION', keymoto_theme_data_variable('Version'));

/****************************************************************
 * Require Needed Files & Libraries
 ****************************************************************/
/**
 * Admin References & CSS and JS files register
 */
require  get_template_directory() .'/admin/admin.php';
/**
 * General
 */
require get_template_directory() .'/admin/etc/general.php';
/**
 * Custom Css Option
 */
require get_template_directory() .'/admin/etc/custom_css_option.php';

/**
 * Register Sidebar
 */
require get_template_directory() .'/admin/option/sidebar.php';
/**
 * Woocommerce register plugin
 */
require get_template_directory() .'/admin/function/woocommerce.php';
/**
 * Load More
 */
require get_template_directory() .'/admin/etc/load_more_function.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() .'/admin/inc/extras.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() .'/admin/inc/jetpack.php';
/**
 * Comments walker
 */
require get_template_directory() .'/admin/inc/comments-walker.php';

/**
 * Mega Menu
 */
require get_template_directory() .'/admin/menu/menu.php';
/**
 * Autos Options
 */
require get_template_directory() .'/admin/autos_function.php';
/**
 * About Theme Option
 */
require get_template_directory() .'/admin/theme-dashboard/dashboard.php';