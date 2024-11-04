<?php if ( is_active_sidebar( 'footer-mailchimp' ) ) {
    dynamic_sidebar( 'footer-mailchimp' );
} ?>
<footer class="fl--footer style-four-column">
    <?php if( class_exists('Templines_Helper_Core_Addons')){ ?>
        <div class="top-content-footer">
            <?php if(is_active_sidebar( 'footer-sidebar-1' ) ||  is_active_sidebar( 'footer-sidebar-2' ) ||  is_active_sidebar( 'footer-sidebar-3' ) || is_active_sidebar( 'footer-sidebar-4' )) { ?>
                <div class="container">
                    <div class="row footer-sidebar-wrapper">
                        <div class="footer-widget-area col-md-6">
                            <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
                                dynamic_sidebar( 'footer-sidebar-1' );
                            } ?>
                        </div>
                        <div class="footer-widget-area col-md-6">
                            <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
                                dynamic_sidebar( 'footer-sidebar-2' );
                            } ?>
                        </div>
                        <div class="footer-widget-area col-md-6">
                            <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
                                dynamic_sidebar( 'footer-sidebar-3' );
                            } ?>
                        </div>
                        <div class="footer-widget-area col-md-6">
                            <?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
                                dynamic_sidebar( 'footer-sidebar-4' );
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
                        //echo esc_html(keymoto_get_theme_mod('footer_copyrights'));
                        echo keymoto_get_theme_mod('footer_copyrights');
                    }?>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Mobile menu start -->
<?php get_template_part('template-parts/footer/footer-component/content','mobile-menu'); ?>
<!-- Mobile menu end -->
<!-- Search -->
<?php get_template_part('template-parts/footer/footer-component/content','search'); ?>
<!-- Search end -->
<!-- Footer Sidebar -->
<?php get_template_part('template-parts/footer/footer-component/content','sidebar--footer'); ?>
<!-- Footer Sidebar end -->
</div>
<!-- Main holder End-->
<?php wp_footer(); ?>
</body>
</html>