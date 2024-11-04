<?php
if ( function_exists('register_sidebar') ) {
   $sidebar_logo='';
   $logotype_sidebar = keymoto_get_theme_mod('site_sidebar_logo');

   if($logotype_sidebar !=''){
      $sidebar_logo = '<img src="'.keymoto_get_theme_mod('site_sidebar_logo').'" class="sidebar-logotype" alt="'.esc_attr__('Sidebar Logo','keymoto').'">';
   }

    register_sidebar(array(
        'name'              => 'Main Sidebar',
        'id'                => 'main-sidebar',
        'description'       => 'Appears as the left sidebar on Blog pages',
        'before_widget'     => '<div id="%1$s" class="widget %2$s">',
        'after_widget'      => '</div>',
        'before_title'      => '<h5 class="widget-title">'.$sidebar_logo.'',
        'after_title'       => '</h5>',
    ));

    if ( class_exists('Templines_Helper_Core_Addons')) {
        register_sidebar(array(
            'name'              => 'Vehicle Sidebar',
            'id'                => 'autos-sidebar',
            'description'       => 'Appears as the sidebar on vehicle listings page.',
            'before_widget'     => '<div id="%1$s" class="widget %2$s">',
            'after_widget'      => '</div>',
            'before_title'      => '<h5 class="widget-title">',
            'after_title'       => '</h5>',
        ));
        // Footer Sidebar
        register_sidebar(array(
            'name' => 'Footer Sidebar First Column',
            'id' => 'footer-sidebar-1',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Footer Sidebar Second Column',
            'id' => 'footer-sidebar-2',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Footer Sidebar Third Column',
            'id' => 'footer-sidebar-3',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget--title">',
            'after_title' => '</h5>',
        ));


        register_sidebar(array(
            'name' => 'Footer Sidebar Fourth Column',
            'id' => 'footer-sidebar-4',
            'description' => 'Appears as the sidebar on footer.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget--title">',
            'after_title' => '</h5>',
        ));

        register_sidebar(array(
            'name' => 'Mailchimp Widget Area',
            'id' => 'footer-mailchimp',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="widget--title">',
            'after_title' => '</h5>',
        ));
        // Header Sidebar
        register_sidebar(array(
            'name' => 'Header Sidebar Widget Area',
            'id' => 'header-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h5 class="header-widget--title">',
            'after_title' => '</h5>',
        ));

    }

}




function keymoto_categories_post_count_filter ($variable) {
    $variable = str_replace('(', '<span class="fl-categories-post-count"> ', $variable);
    $variable = str_replace(')', '</span>', $variable);
    return $variable;
}



function keymoto_archive_post_count_filter ($variable) {
    $variable = str_replace ('(', '<span class="fl-archive-post-count">', $variable);
    $variable = str_replace (')', '</span>', $variable);
    return $variable;
}



add_filter ('get_archives_link', 'keymoto_archive_post_count_filter');
add_filter('wp_list_categories','keymoto_categories_post_count_filter');





/**
 * Register Theme Widgets
 */
function keymoto_init_widgets() {

}

add_action('widgets_init', 'keymoto_init_widgets');
