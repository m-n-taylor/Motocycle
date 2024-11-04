<?php
$sidebar_position = $sticky_sidebar = $page_sidebar_sticky =$style_sidebar ="";
$css_classes[] ='sidebar-container';
if(keymoto_get_theme_mod('car_sidebar_position')!= 'disable'){
    $sidebar_position   = keymoto_get_theme_mod('car_sidebar_position');
    $sticky_sidebar     = keymoto_get_theme_mod('car_sticky_sidebar');
}
$style_sidebar = keymoto_get_theme_mod('car_sidebar_title_style');
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



<?php if ( is_active_sidebar( 'autos-sidebar' ) ) { ?>
 <div class="<?php echo esc_attr(trim($css_class)); ?>">
     <?php if($style_sidebar == 'with_title' and keymoto_get_theme_mod('car_sidebar_title') !=''){?>
         <div class="sidebar-title fl-primary-bg">
             <div class="title-wrap-content">
                 <div class="sidebar-title-content fl-font-style-medium"><?php echo esc_attr(keymoto_get_theme_mod('car_sidebar_title')) ;?></div>
                 <?php if(keymoto_get_theme_mod('car_sidebar_sub_title')){?>
                     <div class="sidebar-subtitle-content fl-font-style-lighter-than"><?php echo esc_attr(keymoto_get_theme_mod('car_sidebar_sub_title')) ;?></div>
                 <?php } ?>
             </div>
             <?php if(keymoto_get_theme_mod('sidebar_logotype')){?>
                 <div class="logo-sidebar-content">
                     <img src="<?php echo keymoto_get_theme_mod('sidebar_logotype')?>" alt="Twitter">

                 </div>
             <?php } ?>
         </div>
     <?php } ?>
    <aside class="sidebar cars-sidebar cf">
        <div class="sidebar_container">
            <?php dynamic_sidebar( 'autos-sidebar' ); ?>
        </div>
    </aside>
 </div>
<?php } ?>


