<?php
//Navigator class
$css_classes[] = 'fl-header--navigation';

// Search icon
$search_icon = keymoto_get_theme_mod('menu_search_icon');
// Hamburger menu
$cart_icon  = keymoto_get_theme_mod('cart_menu_icon');
// menu_login_icon
$menu_login_icon  = keymoto_get_theme_mod('menu_login_icon');

// Fixed Nav Bar
if(keymoto_get_theme_mod('fixed_nav') == 'true'){
    $css_classes[] = 'fixed-navbar fixed-disable';
}
// Auto Hide
if(keymoto_get_theme_mod('auto_hide_nav') == 'true'){
    $css_classes[] = 'auto-hide-navbar';
}

$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );


?>
<!--Header Start-->
<header class="fl--header <?php echo esc_attr($css_class) ; ?> cf" id="fl-header">
    <div class="header-content-wrap">
        <div class="header-content">
            <!-- Start Logo-->
            <div class="fl--logo-container">
                <a href="<?php echo esc_url(home_url("/")); ?>">
                    <?php if (keymoto_get_theme_mod( 'site_logo')){ ?>
                    <img src="<?php echo esc_url(keymoto_get_theme_mod( 'site_logo')); ?>" alt="<?php esc_attr_e('Site Logotype','keymoto')?>" class="img-logotype" />
                    <?php } else { ?>
                    <h3 class="logotype-text"><?php esc_attr(bloginfo('title')); ?></h3>
                    <?php } ?>
                </a>
            </div>
            <!--Logo End-->
            <!-- Nav Menu Start-->
            <nav class="fl-mega-menu nav-menu">
                <?php if ( has_nav_menu( 'general-menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location'    => 'general-menu',
                        'class'             => 'header-menu nav-menu',
                        'container'         => false,
                        'id'                => 'general-menu',
                        'depth'             => 8,
                        'fallback_cb'       => 'keymoto_menu_fallback'
                    ));
                }
                ?>

            </nav>
            <!-- Nav Menu End-->
            <!-- Header Icon Start-->
            <div class="fl--navigation-icon-container">



                <?php
                $contact_header  = keymoto_get_theme_mod('contact_header');
                $contact_img  = keymoto_get_theme_mod('contact_img');
                $phone  = keymoto_get_theme_mod('phone');
                $phone_text  = keymoto_get_theme_mod('phone_text');
                ?>

                <?php if($contact_header == 'enable'){?>
                <?php if(isset($phone) && $phone != ''){?>
                <div class="page-header__support">
                    <div class="support">
                        <a class="support__link" href="<?php echo esc_url($phone);?>">
                            <?php if(isset($contact_img) && $contact_img != ''){?>
                            <div class="support__icon">
                                <img src="<?php echo esc_url($contact_img);?>" alt="phone">
                            </div>
                            <?php } ?>
                            <div class="support__desc">
                                <?php if(isset($phone_text) && $phone_text != ''){?>
                                <div class="support__label"><?php echo esc_html($phone_text);?></div>
                                <?php } ?>
                                <div class="support__phone"><?php echo esc_html($phone);?></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>

                <?php

                $button_header  = keymoto_get_theme_mod('button_header');
                $button_text  = keymoto_get_theme_mod('button_text');
                $button_link  = keymoto_get_theme_mod('button_link');
                ?>


                <?php if($button_header == true){?>
                <!--Search Icon-->
                <div class="fl-search-header-btn-wrap">
                    <a class="header_btn" href="<?php echo esc_url($button_link);?>"><?php echo esc_html($button_text);?></a>
                </div>
                <!--/Search Icon-->
                <?php } ?>


                <?php if($menu_login_icon == true){?>
                <?php if(class_exists('Youzify')){ ?>

                <?php if(is_user_logged_in()){?>

                <div class="youzify_profile_link">
                    <?php   $author_ID =  get_current_user_id();
                                $current_user = get_user_by('ID', $author_ID);
                                $ad_link = get_site_url().'/members/'.$current_user->user_login;
                                ?>
                    <a class="youzify_add_link_button fl-header-btn fl-custom-btn" href="<?php echo esc_url($ad_link); ?>">
                        <?php echo get_avatar(get_current_user_id());?>
                    </a>


                    <div class="members-info_top <?php echo esc_attr($class_member)?>">
                        <ul>

                            <li><a href="<?php echo esc_url($ad_link);?>"><?php echo esc_attr__('Your Acccount', 'keymoto')?></a></li>
                            <li><a href="<?php echo esc_url($ad_link);?>/profile/edit/"><?php echo esc_attr__('Acccount Settings', 'keymoto')?></a></li>
                            <li><a href="<?php echo esc_url(get_site_url() . '/wp-login.php?action=logout')?>"><?php echo __('Log Out', 'keymoto');?></a></li>


                        </ul>

                    </div>


                </div>

                <?php } else {?>
                <div class="youzify_profile_link">
                    <?php   $author_ID =  get_current_user_id();
                                $current_user = get_user_by('ID', $author_ID);
                                $ad_link = get_site_url().'/login/';
                                ?>
                    <a class="youzify_add_link_button fl-header-btn fl-custom-btn" href="<?php echo esc_url($ad_link); ?>"><i class="fa fa-user-circle"></i> </a>
                </div>
                <?php } ?>

                <?php } ?>
                <?php } ?>

                <?php if($search_icon == true){?>
                <!--Search Icon-->
                <div class="fl-search-header-icon-wrap closed"><i class="fl-custom-icon-search-header"></i></div>
                <!--/Search Icon-->
                <?php } ?>
                <?php if ( is_active_sidebar( 'header-sidebar' ) ) {?>
                <!--Nav Sidebar Icon-->
                <div class="fl-sidebar-header-icon-wrap"><span></span></div>
                <!--/Nav Sidebar Icon-->
                <?php } ?>
                <!--Mobile menu bars-->
                <div class="fl--hamburger-menu">
                    <span></span>
                </div>
                <!--Mobile menu bars end-->
            </div>
            <!-- Header Icon End-->
        </div>
    </div>
</header>
<!--Header End-->
