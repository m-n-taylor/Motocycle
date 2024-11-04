<?php
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function keymoto_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'keymoto_pingback_header' );


add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
function logout_without_confirm($action, $result)
{
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : 'url-you-want-to-redirect';
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}


if (!function_exists('keymoto_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function keymoto_setup()
    {

        /*
              * Make theme available for translation.
              * Translations can be filed in the /languages/ directory.
              * If you're building a theme based on khaki, use a find and replace
              * to change 'keymoto' to the name of your theme in all the template files.
              */
        load_theme_textdomain('keymoto', get_template_directory() . '/languages');


        register_nav_menus	(array(
            'general-menu'	                => esc_html__('Main Menu', 'keymoto'),
            'mobile-menu'	                => esc_html__('Mobile Menu', 'keymoto'),
        ));
        // Disables the block editor from managing widgets in the Gutenberg plugin.
        add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

        // Disables the block editor from managing widgets.
        add_filter( 'use_widgets_block_editor', '__return_false' );

        add_editor_style();
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        add_theme_support( 'post-formats', array( 'video', 'gallery', 'audio', 'image', 'quote', 'link' ) );
        add_post_type_support( 'post', 'post-formats' );
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


        // Add default image sizes
        add_theme_support('post-thumbnails');
        add_image_size('keymoto_size_size_80x80_crop', 80, 80, true);
        //Newest works widget Size
        add_image_size('keymoto_size_size_90x90_crop', 90, 90, true);
        // Testimonial size
        add_image_size('keymoto_size_size_130x130_crop', 130, 130, true);
        //Last Post Widget size
        add_image_size('keymoto_size_size_291x255_crop', 291, 255, true);
        // Grid Post Image
        add_image_size('keymoto_size_600x360_crop', 600, 360, true);
        // Post Inner Image
        add_image_size('keymoto_size_945x450_crop', 945, 450, true);
        // Auto Images
        add_image_size('keymoto_size_750x430_crop', 750, 430, true);
        add_image_size('keymoto_size_480x360_crop', 480, 360, true);
        add_image_size('keymoto_size_480x360_crop', 480, 360, true);
        add_image_size('keymoto_size_180x100_crop', 180, 100, true);

        // Auto Images
        add_image_size('keymoto_size_520x440_crop', 520, 440, true);
        add_image_size('keymoto_size_600x440_crop', 600, 440, true);

        /// Gallery Size
        add_image_size('keymoto_size_425x320_crop', 425, 320, true);
        add_image_size('keymoto_size_450x320_crop', 450, 320, true);
        add_image_size('keymoto_size_350x320_crop', 350, 320, true);
        add_image_size('keymoto_size_625x320_crop', 625, 320, true);
        add_image_size('keymoto_size_600x320_crop', 600, 320, true);
        add_image_size('keymoto_size_475x320_crop', 475, 320, true);

        // Key Moto Page Builder Images Size
            // Default Post Image
        add_image_size('keymoto_size_1170x658_crop', 1170, 558, true);
            // Post Pagination
        add_image_size('keymoto_size_720x340_crop', 720, 340, true);
            //Author Ava
        add_image_size('keymoto_size_size_75x75_crop', 75, 75, true);
            // Slider
        add_image_size('keymoto_size_640x470_crop', 640, 470, true);
            // Widget
        add_image_size('keymoto_size_280x280_crop', 280, 280, true);
            // Moto Image
                // Grid
        add_image_size('keymoto_size_720x600_crop', 720, 600, true);

    }
endif;
add_action('after_setup_theme', 'keymoto_setup');



// Fixed Select2 conflict with Advanced Custom Fields
add_filter( 'acf/settings/select2_version', function( $version ) {
    return 4;
});




//Bulding Breadcrumbs
function keymoto_build_breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<div id="breadcrumbs" class="breadcrumbs">','</div>');
    } else {
        if(function_exists('is_woocommerce') and is_woocommerce()){
           woocommerce_breadcrumb();
        } else {
            if(class_exists('Templines_Helper_Core_Addons') and !is_singular('pixad-autos')){
                echo keymoto_breadcrumbs(esc_html__('Home','keymoto'));
            }elseif (is_singular('pixad-autos')){
                echo keymoto_auto_breadcrumbs();
            }
        }
    }
}


/**
 *  Breadcrumbs
 * */
if (!function_exists('keymoto_breadcrumbs')) {
    function keymoto_breadcrumbs($home_title = false)
    {
        /* === OPTIONS === */
        $text['home'] = $home_title;
        $text['blog'] = esc_html__('Blog', 'keymoto');
        $text['category'] = esc_html__('Archive by Category "%s"', 'keymoto');
        $text['tax'] = esc_html__('Archive for "%s"', 'keymoto');
        $text['search'] = esc_html__('Search Results for "%s" Query', 'keymoto');
        $text['tag'] = esc_html__('Posts Tagged "%s"', 'keymoto');
        $text['author'] = esc_html__('Articles Posted by %s', 'keymoto');
        $text['404'] = esc_html__('Error 404', 'keymoto');
        $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
        $showOnHome = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '<span class="breadcrumbs-delimiter"></span>'; // delimiter between crumbs
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        /* === END OF OPTIONS === */
        global $post;
        $result='';
        $homeLink       = esc_url( home_url('/') );
        $blog_link      = get_permalink( get_option( 'page_for_posts' ) );
        $linkBefore     = '<span>';
        $linkAfter      = '</span>';
        $linkAttr = ' rel="v:url" property="v:title"';
        $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
        if (is_home() || is_front_page()) {
            if(get_option( 'page_for_posts' )){
                $result.='<div class="breadcrumbs">
                            <a href="' . $homeLink . '">' . esc_attr($text['home']) . '</a>'.$delimiter.' ' . esc_attr($text['blog']) . '
                         </div>';
            }else{
                if ($showOnHome == 1 and $text['home']) $result .= '<div class="breadcrumbs"><span><a href="' . $homeLink . '">' . $text['home'] . '</a></span></div>';
            }
        } else {
            $result .= '<!-- .breadcrumbs --><div class="breadcrumbs">';
            if (function_exists('is_bbpress') && is_bbpress()) { //supported bbpres breadcrumbs
                $result .= bbp_get_breadcrumb(array('home_text' => $text['home']));
            } else {
                if ($text['home']) {
                    $result .= sprintf($link, $homeLink, $text['home']) . $delimiter;
                }

                if (is_category()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) {
                        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                    }
                    $result .= $before . sprintf($text['category'], single_cat_title('', false)) . $after;
                } elseif (is_tax()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $thisCat = get_category(get_query_var('cat'), false);
                    if ($thisCat->parent != 0) {
                        $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                    }
                    $result .= $before . sprintf($text['tax'], single_cat_title('', false)) . $after;

                } elseif (is_search()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= $before . sprintf($text['search'], get_search_query()) . $after;
                } elseif (is_day()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                    $result .= sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F')) . $delimiter;
                    $result .= $before . get_the_time('d') . $after;
                } elseif (is_month()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
                    $result .= $before . get_the_time('F') . $after;
                } elseif (is_year()) {
                    if(get_option( 'page_for_posts' )){
                        $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    }
                    $result .= $before . get_the_time('Y') . $after;
                } elseif (is_single()&& !is_attachment()) {
                    if (get_post_type() != 'post') {
                        $post_type = get_post_type_object(get_post_type());
                        $slug = $post_type->rewrite;
                        $result .= sprintf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                        if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                    } else {
                        if(get_option( 'page_for_posts' )){
                            $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                        }
                        $cat = get_the_category();
                        $cat = $cat[0];
                        $cats = get_category_parents($cat, TRUE, $delimiter);
                        if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                        $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                        $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                        $result .= $cats;
                        if ($showCurrent == 1) $result .= $before . get_the_title() . $after;
                    }
                } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                    $post_type = get_post_type_object(get_post_type());
                    if(is_object($post_type)){
                        $result .= $before . $post_type->labels->singular_name . $after;
                    }
                } elseif (is_attachment()) {
                    $parent = get_post($post->post_parent);
                    $cat = get_the_category($parent->ID);
                    $cat = $cat[0];
                    $cats = get_category_parents($cat, TRUE, $delimiter);
                    $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                    $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                    $result .= $cats;
                    $result .= sprintf($link, get_permalink($parent), $parent->post_title);
                    if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                } elseif (is_page() && !$post->post_parent) {
                    if ($showCurrent == 1) $result .= $before . get_the_title() . $after;
                } elseif (is_page() && $post->post_parent) {
                    $parent_id = $post->post_parent;
                    $breadcrumbs = array();
                    while ($parent_id) {
                        $page = get_page($parent_id);
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                        $parent_id = $page->post_parent;
                    }
                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        $result .= $breadcrumbs[$i];
                        if ($i != count($breadcrumbs) - 1) $result .= $delimiter;
                    }
                    if ($showCurrent == 1) $result .= $delimiter . $before . get_the_title() . $after;
                } elseif (is_tag()) {
                    $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    $result .= $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
                } elseif (is_author()) {
                    $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    global $author;
                    $userdata = get_userdata($author);
                    $result .= $before . sprintf($text['author'], $userdata->display_name) . $after;
                } elseif (is_archive()) {
                    $result.= '<a href='.$blog_link.'>'.$linkBefore.$text['blog'].$linkAfter.'</a>'.$delimiter;
                    $result .= $before . the_archive_title() . $after;
                } elseif (is_404()) {
                    $result .= $before . $text['404'] . $after;
                }

                if ( get_query_var('paged') ) {
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
                    echo esc_html__('Page','keymoto') . ' ' . get_query_var('paged');
                    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
                }
            }
            $result .= '</div><!-- .breadcrumbs -->';

        }
            return $result;
    }
}

/**
 *  Breadcrumbs
 * */
if (!function_exists('keymoto_auto_breadcrumbs')) {
    function keymoto_auto_breadcrumbs($home_title = false)
    {
        $Settings   = new PIXAD_Settings();
        $settings   = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );

        $home_link        = home_url('/');
        $home_text        = esc_html__('Home','keymoto');
        $vehicle_listings_text = get_the_title($settings['autos_listing_car_page']);
        $vehicle_listings_link = get_permalink($settings['autos_listing_car_page']);
        $delimiter          = '<span class="breadcrumbs-delimiter"></span>'; // delimiter between crumbs
        $before             = '<span class="current">'; // tag before the current crumb
        $after              = '</span>'; // tag after the current crumb

        $wp_the_query   = $GLOBALS['wp_the_query'];
        $queried_object = $wp_the_query->get_queried_object();

        if ( is_singular() )
        {
            $post_object = sanitize_post( $queried_object );
            $title          = apply_filters( 'the_title', $post_object->post_title );
            $post_id        = $post_object->ID;
            $post_link      = $before . $title . $after;

            $make_term_name = '';
            $make_term_link = '';
            $make_terms = get_the_terms( $post_id, 'auto-model' );
            if (!empty($make_terms)) {
                foreach( $make_terms as $make_term) {
                    if($make_term->parent == 0){
                        $make_term_name = $make_term->name;
                        $make_term_link = $vehicle_listings_link.'?make='.$make_term->slug;
                        $make_term_id = $make_term->term_id;
                    }
                }
            }
            $model_term_name = '';
            $model_term_link = '';
            $model_terms = get_the_terms( $post_id, 'auto-model' );
            if (!empty($model_terms)) {
                foreach( $model_terms as $model_term) {
                    if($model_term->parent == $make_term_id){
                        $model_term_name = $model_term->name;
                        $model_term_link = $make_term_link.'&model='.$model_term->slug;
                    }
                }
            }
        }
        $result  = '';
        $result .= '<!-- .breadcrumbs --><div class="breadcrumbs">';

        $result .= '<a href="' . $home_link . '">' . $home_text . '</a>';
        $result .= $delimiter;
        $result .= '<a href="' . $vehicle_listings_link . '">' . $vehicle_listings_text . '</a>';
        $result .= $delimiter;
        if( $make_term_name != ''){
            $result .= '<a href="' . $make_term_link . '">' . $make_term_name . '</a>';
            $result .= $delimiter;
        }
        if( $model_term_name != ''){
            $result .= '<a href="' . $model_term_link . '">' . $model_term_name . '</a>';
            $result .= $delimiter;
        }

        $result .= $post_link;

        $result .= '</div><!-- .breadcrumbs -->';
        return $result;
    }
}

/*
 * Check if exist next page to show the pagination
 * */
function keymoto_show_posts_nav() {
    global $wp_query;
    return ($wp_query->max_num_pages > 1);
}

/*
 * Custom Trim Excerpt
 */
function keymoto_trim_excerpt( $text = '' ) {
    $keymoto_excerpt = $text;
    if ( '' == $text ) {
        $text = get_the_content('');

        $text = apply_filters( 'the_content', $text );

        $excerpt_length = apply_filters( 'excerpt_length', 55 );
        $text = wp_trim_words( $text, $excerpt_length, ' ' );
    }
    return apply_filters( 'keymoto_trim_excerpt', $text, $keymoto_excerpt );
}
add_filter('get_the_excerpt', 'keymoto_trim_excerpt');

/*
 * Custom Excerpt length
 */
function keymoto_limit_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).' ...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";

    $excerpt = preg_replace( $patterns, $replacements, $excerpt);
    return $excerpt;
}

/*
 * Custom Excerpt length Title
 */
function keymoto_limit_excerpt_title($content,$count='20') {

    $s = mb_strimwidth($content, 0, $count, '...');

    return $s;
}


//Unreal construction to passed/hide "Theme Checker Plugin" recommendation about Header nad Background
if('Theme Checke' == 'Hide') {
    add_theme_support( 'custom-header');
    add_theme_support( 'custom-background');
}


/**
 * Check if it's a blog page
 * @global object $post
 * @return boolean
 */
function keymoto_is_blog () {
    global  $post;
    $posttype = get_post_type($post);
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ($posttype == 'post')) ? true : false ;
}


function keymoto_page_links() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $pagination = array(
        'base'                  => '%_%',
        'format'                => '?paged=%#%',
        'total'                 => $wp_query->max_num_pages,
        'current'               => $current,
        'show_all'              => false,
        'type'                  => 's',
        'prev_next'             => true,
    );

    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links($pagination).'';
}

/**
* Parse first post category
*/
function keymoto_get_first_category() {
    $cats = get_the_category();
    return isset($cats[0]) ? $cats[0] : null;
}

/**
 * Get page by name, id or slug.
 * @global object $wpdb
 * @param mixed $name
 * @return object
 */
function keymoto_get_page($slug) {
    global $wpdb;

    if (is_numeric($slug)) {
        $page = get_page($slug);
    } else {
        $page = $wpdb->get_row($wpdb->prepare("SELECT DISTINCT * FROM $wpdb->posts WHERE post_name=%s AND post_status=%s", $slug, 'publish'));
    }

    return $page;
}

/**
 * Find all subpages for page
 * @param int $id
 * @return array
 */
function keymoto_get_subpages($id) {
    $query = new WP_Query(array(
        'post_type'         => 'page',
        'orderby'           => 'menu_order',
        'order'             => 'ASC',
        'posts_per_page'    => -1,
        'post_parent'       => (int) $id,
    ));

    $entries = array();
    while ($query->have_posts()) : $query->the_post();
        $entry = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'link' => get_permalink(),
            'content' => get_the_content(),
        );
        $entries[] = $entry;
    endwhile;

    return $entries;
}

/**
 * Display permalink
 *
 * @param int|string $system
 * @param int $isCat
 */
function keymoto_permalink($system, $isCat = false) {
    echo keymoto_get_permalink($system, $isCat);
}
/**
 * Get permalink for page, post or category
 *
 * @param int|string $system
 * @param bool $isCat
 * @return string
 */
function keymoto_get_permalink($system, $isCat = 0)  {
    if ($isCat) {
        if (!is_numeric($system)) {
            $system = get_cat_ID($system);
        }
        return get_category_link($system);
    } else {
        $page = keymoto_get_page($system);

        return null === $page ? '' : get_permalink($page->ID);
    }
}

/**
 * Display custom excerpt
 */
function keymoto_excerpt() {
    echo keymoto_get_excerpt();
}
/**
 * Get only excerpt, without content.
 *
 * @global object $post
 * @return string
 */
function keymoto_get_excerpt() {
    global $post;
    $excerpt = trim($post->post_excerpt);
    $excerpt = $excerpt ? apply_filters('the_content', $excerpt) : '';
    return $excerpt;
}

/**
 * Display first category link
 */
function keymoto_first_category() {
    $cat = keymoto_get_first_category();
    if (!$cat) {
        echo '';
        return;
    }
    echo '<a href="' . keymoto_get_permalink($cat->cat_ID, true) . '">' . esc_attr($cat->name) . '</a>';
}

/**
 * keymoto_menu_fallback
 */

if (!function_exists('keymoto_menu_fallback')) {
    function keymoto_menu_fallback(){

        if(current_user_can( 'administrator' )) {
            echo '<span class="no-menu">' . esc_html__('Please register navigation from', 'keymoto') . ' ' .
                '<a class="select-mobile-menu" href="'. esc_url(admin_url()) . '"nav-menus.php?action=locations" target="_blank">'. esc_html__( 'Appearance > Menus', 'keymoto' ) .'</a></span>';
        }
    }
}


/**
 * Get Save Web Fonts
 * @return array
 */
function keymoto_get_safe_webfonts() {
    return array(
        'Arial'				=> 'Arial',
        'Verdana'			=> 'Verdana, Geneva',
        'Trebuchet'			=> 'Trebuchet',
        'Georgia'			=> 'Georgia',
        'Times New Roman'   => 'Times New Roman',
        'Tahoma'			=> 'Tahoma, Geneva',
        'Palatino'			=> 'Palatino',
        'Helvetica'			=> 'Helvetica',
        'Gill Sans'			=> 'Gill Sans',
    );
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5 );

function remove_thumbnail_width_height( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}




/**
 * Custom Pagination
 */
function keymoto_custom_pagination($pages = '', $range = 2)
{

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {


        if($paged > 2 && $paged > $range+1 && $range < $pages) echo "<a href='".get_pagenum_link(1)."' class='page-numbers'>1</a>";
        if($paged > 2 && $paged > $range+2 && $range < $pages) echo "<span class='page-numbers dots'>…</span>";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $range ))
            {
                echo (esc_attr($paged == $i))? "<span class=\"page-numbers current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"page-numbers\">".$i."</a>";
            }
        }
        if ($paged < $pages-1 &&  $paged+$range+1 < $pages && $range+1 < $pages ) echo "<span class='page-numbers dots'>…</span>";
        if ($paged < $pages-1 &&  $paged+$range < $pages && $range+1 < $pages ) echo "<a href='".get_pagenum_link($pages)."' class=\"page-numbers\">".$pages."</a>";

    }
}


/**====================================================================
==  Return Title
====================================================================*/
if (!function_exists('fl_js_delete_wpautop')) {
    function fl_return_title_text($content, $wpautop = false)
    {
        if ($wpautop == 'true') {
            $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content) . "\n");
        }
        return $content;
    }
}

/**====================================================================
==  Return Text
====================================================================*/
if (!function_exists('keymoto_return_text')) {
    function keymoto_return_text($content, $wpautop = false)
    {
        if ($wpautop == 'true') {
            $content = wpautop(preg_replace('/<\/?p\>/', "\n", $content) . "\n");
        }
        return $content;
    }
}

/**====================================================================
==  Blog Checker Function
====================================================================*/
function keymoto_is_blog_checker () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}



/**====================================================================
==  Demo Install Setting
====================================================================*/
if(!function_exists('keymoto_demo_import')) {
    function keymoto_demo_import()
    {
        return array(
            array(
                'import_file_name'              => esc_html__('Motorbikes Demo', 'keymoto'),
           
                'import_file_url'               => 'http://assets.templines.com/plugins/theme/keymoto/keymoto.xml',
                'import_widget_file_url'        => 'http://assets.templines.com/plugins/theme/keymoto/keymoto.wie',
                'import_customizer_file_url'    => 'http://assets.templines.com/plugins/theme/keymoto/keymoto.dat',
                'import_preview_image_url'      => 'http://assets.templines.com/plugins/theme/keymoto/moto.jpg',
                'import_notice'                 =>  esc_html__('Click on the Import Demo Data button and wait a bit. Installing demo content may take more than 10 minutes in some cases.', 'keymoto'),
                'preview_url'                   => 'http://keymoto.templines.info/moto'
            ),
            
             array(
                'import_file_name'              => esc_html__('Snowrider Demo', 'keymoto'),
              
                'import_file_url'               => 'http://assets.templines.com/plugins/theme/keymoto/snowrider.xml',
                'import_widget_file_url'        => 'http://assets.templines.com/plugins/theme/keymoto/snowrider.wie',
                'import_customizer_file_url'    => 'http://assets.templines.com/plugins/theme/keymoto/snowrider.dat',
                'import_preview_image_url'      => 'http://assets.templines.com/plugins/theme/keymoto/snowrider.jpg',
                'import_notice'                 =>  esc_html__('Click on the Import Demo Data button and wait a bit. Installing demo content may take more than 10 minutes in some cases.', 'keymoto'),
                'preview_url'                   => 'http://keymoto.templines.info/snowrider'
            ),
            
            
            
        );
    }
}
add_filter('pt-ocdi/import_files', 'keymoto_demo_import');

if(!function_exists('keymoto_after_demo_import')) {

    function keymoto_after_demo_import() {

        $general_menu           = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $mobile_menu            = get_term_by( 'name', 'Mobile Menu', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', array(
                'general-menu'      => $general_menu->term_id,
                'mobile-menu'    => $mobile_menu->term_id,
            )
        );


        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Bike reviews & News' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );




        $Settings   = new PIXAD_Settings();
        $args = array(
            'autos_listing_car_page'        => '18629',
            'autos_list_style'              => 'Grid',
            'autos_max_price'               => '9999',
            'autos_site_currency'           => 'USD',
            'autos_thousand'                => ',',
            'autos_decimal'                 => '.',
            'autos_decimal_number'          => '0',
            'autos_price_text'              => '',
            'autos_per_page'                => '9',
            'autos_equipment'               => 'No',
        );

        $args_validation = array(
            'auto-price_show'               => 'on',
            'auto-fuel_show'                => 'on',
            'auto-fuel_list'                => 'on',
            'auto-engine_show'              => 'on',
            'auto-engine_list'              => 'on',
            'auto-horsepower_show'          => 'on',
            'auto-horsepower_list'          => 'on',
            'auto-condition_show'           => 'on',
            'auto-condition_list'           => 'on',
            'auto-year_show'                => 'on',
            'auto-year_side'                => 'on',
            'auto-year_list'                => 'on',
            'auto-year_icon'                => ' ',
            'auto-mileage_show'             => 'on',
            'auto-mileage_side'             => 'on',
            'auto-mileage_list'             => 'on',
            'auto-mileage_icon'             => '',
            'auto-horsepower_side'          => 'on',
            'auto-horsepower_icon'          => '',
        );


        //Import Revolution Slider
        if ( class_exists( 'RevSlider' ) ) {
            $slider_array = array(
                get_template_directory() . '/admin/assets/rev_slider/home-slider-1.zip',
            );

            $slider = new RevSlider();

            foreach($slider_array as $filepath){
                $slider->importSliderFromPost(true,true,$filepath);
            }

        }
        
        
           //Import Revolution Slider
        if ( class_exists( 'Elementor' ) ) {
            $slider_array = array(
                get_template_directory() . '/admin/assets/rev_slider/home-slider-1.zip',
            );

            $slider = new RevSlider();

            foreach($slider_array as $filepath){
                $slider->importSliderFromPost(true,true,$filepath);
            }

        }



        $Settings->update( 'WP_OPTIONS', '_pixad_autos_settings', serialize( $args ) );
        $Settings->update( 'WP_OPTIONS', '_pixad_autos_validation', serialize( $args_validation ) );

        if (get_option('permalink_structure') !== '/%postname%/') {
            update_option('permalink_structure', '/%postname%/');
        }


    
    
    
    
    


    if ( class_exists( 'Youzify' ) ) {
        
           $youzify_enable_profile_custom_scheme = 'on';
            update_option('youzify_enable_profile_custom_scheme', $youzify_enable_profile_custom_scheme);
        
          
  
           $youzify_profile_custom_scheme_color = 'a:1:{s:5:"color";s:7:"#dc2d13";}';
            update_option('youzify_profile_custom_scheme_color', unserialize($youzify_profile_custom_scheme_color));
        

            
             $youzify_profile_custom_scheme_text_color = 'a:1:{s:5:"color";s:7:"#ffffff";}';
            update_option('youzify_profile_custom_scheme_text_color', unserialize($youzify_profile_custom_scheme_text_color));


            $youzify_plugin_background = 'a:1:{s:5:"color";s:7:"#F8F8F8";}';
            update_option('youzify_plugin_background', unserialize($youzify_plugin_background));


            $youzify_profile_tabs   = 'a:10:{s:8:"overview";a:1:{s:10:"visibility";s:3:"off";}s:4:"info";a:1:{s:10:"visibility";s:3:"off";}s:5:"media";a:1:{s:10:"visibility";s:3:"off";}s:8:"activity";a:1:{s:10:"visibility";s:3:"off";}s:5:"posts";a:1:{s:10:"visibility";s:3:"off";}s:8:"comments";a:1:{s:10:"visibility";s:3:"off";}s:7:"reviews";a:1:{s:10:"visibility";s:3:"off";}s:6:"groups";a:1:{s:10:"visibility";s:3:"off";}s:6:"forums";a:1:{s:10:"visibility";s:3:"off";}s:9:"bookmarks";a:1:{s:10:"visibility";s:3:"off";}}';
            update_option('youzify_profile_tabs', unserialize($youzify_profile_tabs));
        
        
        $youzify_profile_default_tab = 'autos';
            update_option('youzify_profile_default_tab', $youzify_profile_default_tab);
        
          $youzify_buttons_border_style = 'Flat';
            update_option('youzify_buttons_border_style', youzify_buttons_border_style);
        
          $youzify_tabs_list_icons_style = 'Colorful';
            update_option('youzify_tabs_list_icons_style', youzify_tabs_list_icons_style);
        
        
        $youzify_group_header_layout = 'youzify_group_header_layout-hdr-v1';
            update_option('youzify_group_header_layout', youzify_group_header_layout);
        
        
        


        }

        if ( class_exists( 'BuddyPress' ) ) {



           $bp_active_components = 'a:6:{s:8:"xprofile";s:1:"1";s:8:"settings";s:1:"1";s:8:"activity";s:1:"1";s:13:"notifications";s:1:"1";s:6:"groups";s:1:"1";s:7:"members";s:1:"1";}';
            update_option('bp-active-components', unserialize($bp_active_components));



        }

    
    
    
    }
}
add_action( 'pt-ocdi/after_import', 'keymoto_after_demo_import' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//Adding svg/pdf/doc/docx extension
function tmtransport_myme_types($mime_types){
$mime_types['svg'] = 'image/svg+xml';
$mime_types['pdf'] = 'application/pdf';
$mime_types['doc'] = 'application/msword';
$mime_types['docx'] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
return $mime_types;
}
add_filter('upload_mimes', 'tmtransport_myme_types', 1, 1);
