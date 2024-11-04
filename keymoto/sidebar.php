<?php

$sidebar_position = $sticky_sidebar = "";

$css_classes[] ='sidebar-container';
if(keymoto_get_theme_mod('blog_archive_sidebar')!= 'disable'){
    $sidebar_position= keymoto_get_theme_mod('blog_archive_sidebar_position');
    $sticky_sidebar = keymoto_get_theme_mod('blog_archive_sidebar_sticky');
}



if(is_singular('post')) {
    $sidebar_position= keymoto_get_theme_mod('blog_single_sidebar_position');
    $sticky_sidebar = keymoto_get_theme_mod('blog_single_sticky');
    if (keymoto_get_theme_mod('post_sidebar_custom',true) =='custom'){
        $sidebar_position= keymoto_get_theme_mod('post_sidebar_position',true);
        $sticky_sidebar = keymoto_get_theme_mod('post_sidebar_sticky',true);
    }
}

if(is_page()) {
    if (keymoto_get_theme_mod('page_sidebar_custom',true) =='custom'){
        $sidebar_position= keymoto_get_theme_mod('page_sidebar_position',true);
        $sticky_sidebar = keymoto_get_theme_mod('page_sidebar_sticky',true);
    }
}

// Template Blog Navigation Style
if(is_page_template( 'template-blog.php' )){
    if(keymoto_get_theme_mod('blog_template_sidebar_custom',true) == 'custom'){
        $sidebar_position= keymoto_get_theme_mod('blog_template_sidebar_position',true);
        $sticky_sidebar = keymoto_get_theme_mod('blog_template_sidebar_sticky',true);
    }
}

if($sidebar_position == 'left'){
    $css_classes[] = 'sidebar_left col-md-4';
}else if($sidebar_position == 'right') {
    $css_classes[] = 'sidebar_right col-md-4';
}

if($sticky_sidebar == 'sticky'){
    $css_classes[] = 'sidebar-sticky';
}
$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );
?>



<?php if ( is_active_sidebar( 'main-sidebar' ) ) { ?>
 <div class="<?php echo esc_attr(trim($css_class)); ?>" >
    <aside class="sidebar cf">
        <div class="sidebar_container">
            <?php dynamic_sidebar( 'main-sidebar' ); ?>
        </div>
    </aside>
 </div>
<?php } ?>


