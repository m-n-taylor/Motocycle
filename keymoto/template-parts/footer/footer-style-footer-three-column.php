<footer class="fl--footer style-three-column">
    <?php if( class_exists('Fl_Helping_Addons')){ ?>
        <div class="top-content-footer">
            <div class="container footer-logotype-social-section text-center">
                <?php if(keymoto_get_theme_mod('footer_logo_image')){?>
                    <div class="footer-logotype">
                        <a href="<?php echo esc_url(home_url("/")); ?>">
                            <img src="<?php echo esc_url(keymoto_get_theme_mod( 'footer_logo_image')); ?>" alt="<?php esc_attr_e('Footer Logotype','')?>" class="img-footer-logotype"/>
                        </a>
                    </div>
                <?php } ?>
                <?php get_template_part('template-parts/social_profile/social', 'footer')?>
            </div>
            <?php if(is_active_sidebar( 'footer-sidebar-1' ) ||  is_active_sidebar( 'footer-sidebar-2' ) ||  is_active_sidebar( 'footer-sidebar-3' ) || is_active_sidebar( 'footer-sidebar-4' )) { ?>
                <div class="container">
                    <div class="row footer-sidebar-wrapper">
                        <div class="footer-widget-area col-lg-4 col-md-6">
                            <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
                                dynamic_sidebar( 'footer-sidebar-1' );
                            } ?>
                        </div>
                        <div class="footer-widget-area col-lg-4 col-md-6">
                            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
                                dynamic_sidebar( 'footer-sidebar-2' );
                            } ?>
                        </div>
                        <div class="footer-widget-area col-lg-4 col-md-6">
                            <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
                                dynamic_sidebar( 'footer-sidebar-3' );
                            } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="bottom-content-footer">
        <div class="container">
            <div class="row">
                <div class="fl-copyright--inner col-12 text-center">
                    <?php if(keymoto_get_theme_mod('footer_copyrights')){
                        echo esc_html(keymoto_get_theme_mod('footer_copyrights'));
                    }?>
                </div>
            </div>
        </div>
    </div>
</footer>