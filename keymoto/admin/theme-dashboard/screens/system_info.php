<?php
$this->get_tab_menu('system_info');
?>


<div class="col-md-8 tvk-dashboard-page-parent">
<div class="tvk-dashboard-page-wrap">
    <div class="dashboard-page-top-title-wrap">
        <div class="title-page"><i class="tvk-theme-dashboard-icon-font-custom-font-shield"></i><h2 class="main-page-title"><?php echo esc_html__("System Info", "keymoto");?></h2></div>
        <div class="dashboard-info-top-link-wrap"><a class="theme-link-btn" href="<?php echo Keymoto_Dashboard::getInstance()->strings['theme_link']; ?>"><?php echo Keymoto_Dashboard::getInstance()->strings['theme_link_text']; ?></a> <a class="portfolio-link-btn" href="<?php echo Keymoto_Dashboard::getInstance()->strings['portfolio_text_link']; ?>"><?php echo Keymoto_Dashboard::getInstance()->strings['portfolio_text']; ?></a></div>
    </div>

    <div class="title-with-slogan-wrap text-center big-title">
        <div class="title-slogan"><?php echo Keymoto_Dashboard::getInstance()->strings['main_text_title_slogan']; ?></div>
        <h2 class="info-title"><?php echo Keymoto_Dashboard::getInstance()->strings['widget_theme_system_title']; ?></h2>
    </div>

    <div class="system-info-dashboard-content">
        <div class="info-image-content">
            <div class="info-img-wrap">
                <img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/system-info/system-info-image.svg' ) ); ?>"
                     alt="<?php esc_attr_e('System Info Dashboard Image','keymoto')?>">
            </div>
        </div>
        <div class="info-content-wrap">
            <div class="info-content">
                <table class="widefat" cellspacing="0">
                    <tbody>
                    <tr>
                        <td><?php echo esc_html__('WordPress Version','keymoto'); ?></td>
                        <td><?php echo get_bloginfo('version'); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Theme Name','keymoto'); ?></td>
                        <td><?php echo Keymoto_Dashboard::getInstance()->theme_name; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Theme Version','keymoto'); ?></td>
                        <td><?php echo Keymoto_Dashboard::getInstance()->theme_version; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Theme Slug','keymoto'); ?></td>
                        <td><?php echo Keymoto_Dashboard::getInstance()->theme_slug; ?></td>
                    </tr>


                    <tr>
                        <td><?php echo esc_html__('PHP Version','keymoto'); ?></td>
                        <td><?php echo phpversion(); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('MySQL server version','keymoto'); ?></td>
                        <td><?php echo mysqli_get_client_version(); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html__('Max Upload File','keymoto'); ?></td>
                        <td><?php echo size_format( wp_max_upload_size() ) ?></td>
                    </tr>
                    <tr><?php $multisite = is_multisite();?>
                        <td><?php esc_html_e( 'WP Multisite:', 'keymoto' ); ?></td>
                        <td><?php if ( $multisite['is_multisite'] ) { esc_html_e( 'Yes', 'keymoto' ); } else { esc_html_e( 'No', 'keymoto' ); } ?></td>
                    </tr>

                    <tr>
                        <td><?php echo esc_html__( 'Language:', 'keymoto' ); ?></td>
                        <td><?php echo get_locale() ; ?></td>
                    </tr>

                    <tr>
                        <td><?php echo esc_html__('Debug mode','keymoto'); ?></td>
                        <td><?php if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) { esc_html_e( 'Yes', 'keymoto' );} else { esc_html_e( 'No', 'keymoto' ); } ?></td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?php
$this->get_tab_footer();
?>