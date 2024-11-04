<?php
global $post;
//Save
$header_bg = $pre_title = $breadcrumbs = $custom_html_title_class = '';

// Heading Background Image
$bg_img = keymoto_get_theme_mod('page_background_img');

// Blog page Title
$title = keymoto_get_theme_mod('archive_blog_title');

// Blog page
if (keymoto_is_blog_checker()) {
    if(! empty(keymoto_get_theme_mod('blog_archive_page_background_img'))){
        $bg_img = keymoto_get_theme_mod('blog_archive_page_background_img');
    }
    // Blog page Pre Title
    $pre_title = keymoto_get_theme_mod('archive_blog_pre_title');
}

if( keymoto_get_theme_mod('page_breadcrumbs_style') ){
	$breadcrumbs = keymoto_get_theme_mod('page_breadcrumbs_style');
}

if (is_page()) {
    $title = get_the_title();
    if(keymoto_get_theme_mod('page_breadcrumbs',true) == 'custom'){
        $breadcrumbs = keymoto_get_theme_mod('page_breadcrumb',true);
    }
    if(keymoto_get_theme_mod('page_header_custom_style',true) == 'custom'){
        // Pre Title
        if(!empty(keymoto_get_theme_mod('page_header_pre_title',true))){
            $pre_title = keymoto_get_theme_mod('page_header_pre_title',true);
        }

        if(keymoto_get_theme_mod('page_header_title_enable_function',true) != 'disable'){
            if(!empty(keymoto_get_theme_mod('page_custom_title',true))){
                $title = keymoto_get_theme_mod('page_custom_title',true);
            }
        } else {
            $title = '';
        }

        if(!empty(keymoto_get_theme_mod('page_header_img',true))){
            $bg_img = keymoto_get_theme_mod('page_header_img',true);
        }
    }
}

// Single post
if(is_single()){
    $custom_html_title_class = 'post-inner-header';
    $title = get_the_title();
    if(keymoto_get_theme_mod('post_single_breadcrumbs',true) == 'custom'){
        $breadcrumbs = keymoto_get_theme_mod('post_single_breadcrumb',true);
    }
    if(keymoto_get_theme_mod('post_single_header_custom_style',true) == 'custom'){
        // Pre Title
        if(!empty(keymoto_get_theme_mod('post_single_header_pre_title',true))){
            $pre_title = keymoto_get_theme_mod('post_single_header_pre_title',true);
        }

        if(keymoto_get_theme_mod('post_single_header_title_enable_function',true) != 'disable'){
            if(!empty(keymoto_get_theme_mod('post_single_custom_title',true))){
                $title = keymoto_get_theme_mod('post_single_custom_title',true);
            }
        } else {
            $title = '';
        }

        if(!empty(keymoto_get_theme_mod('post_single_header_img',true))){
            $bg_img = keymoto_get_theme_mod('post_single_header_img',true);
        }
    }

}
// Single Autos
if(is_singular('pixad-autos')){
    if(! empty(keymoto_get_theme_mod('autos_single_page_background_img'))){
        $bg_img = keymoto_get_theme_mod('autos_single_page_background_img');
    }
    $title = get_the_title();
}


if (is_category()) { // Category page
    $title = single_cat_title("", false);
    $pre_title = esc_html__('All posts from:', 'keymoto');
} else if (is_author()) { // Author page
    $title = get_the_author();
    $pre_title = esc_html__('All posts from author:', 'keymoto');
} else if (is_tag()) { // Tag page
    $title = single_tag_title("", false);
    $pre_title = esc_html__('Tagged to:', 'keymoto');
} else if (is_search()) {//search page
    $title = get_search_query();
    $pre_title = esc_html__('Search results for:', 'keymoto');
} else if (is_archive()) {
    if (is_day()) :
        $title = sprintf(esc_html__('Daily Archive: %s', 'keymoto'), get_the_date());
    elseif (is_month()) :
        $title = sprintf(esc_html__('Monthly Archive: %s', 'keymoto'), get_the_date(_x('F Y', 'monthly archives date format', 'keymoto')));
    elseif (is_year()) :
        $title = sprintf(esc_html__('Yearly Archive: %s', 'keymoto'), get_the_date(_x('Y', 'yearly archives date format', 'keymoto')));
    else :
        $title = esc_html__('Archive', 'keymoto');
    endif;
}
if(is_404()){
    $title = esc_html__('ERROR 404', 'keymoto');
    $pre_title = esc_html__('PAGE NOT FOUND', 'keymoto');
}
// Header background image css
if (isset($bg_img) && $bg_img != '') {
    $header_bg = 'background-image:url(' . $bg_img . ');';
}


$css_style = ($header_bg) ? 'style=' . $header_bg . '' : '';
?>


<div class="fl-page-heading <?php echo esc_attr($custom_html_title_class)?>" <?php echo esc_attr($css_style); ?>>
        <div class="container">
            <div class="row">
                <div class="fl--page-header-content col">
                    <div class="header-entry-container">
                        <?php if (isset($pre_title) && $pre_title != '') { ?>
                            <div class="fl-pre--title-wrapper">
                                <span class="fl--sub-title fl-font-style-semi-bolt fl-primary-color"><?php echo esc_html($pre_title); ?></span>
                            </div>
                        <?php } ?>
                        <?php if (isset($title) && $title != '') { ?>
                            <h1 class="header-title fl-font-style-bolt">
                                <?php echo keymoto_return_text($title); ?>
                            </h1>
                        <?php } ?>
                        <?php if( class_exists('Templines_Helper_Core_Addons') && $breadcrumbs != 'disable'){
                            keymoto_build_breadcrumbs();
                        }?>
                    </div>
                </div>
            </div>
        </div>
</div>


