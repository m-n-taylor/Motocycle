<?php

/**
 * keymoto Plugins Activation
 *
 * @package keymoto
 */
require get_template_directory() .'/admin/tgm/class-tgm-plugin-activation.php';



class Keymoto_Dashboard{


    public static $instance;
    private       $include_screens_path;
    private       $plugins_required = [];
    private       $plugins          = [];
    private       $tabs_menu        = [];

    const DASHBOARD_DIRECTORY_URI = '/dashboard/';
    const DASHBOARD_DIRECTORY = '/dashboard/';


    public function __construct(){
        $this->dashboard_init_data();
        $this->dashboard_init_menu_action();
        $this->dashboard_activation_init();
        $this->custom_menu_import();
        if (current_user_can('switch_themes')) {

          $this->register_required_plugins();

        }
        $this->include_screens_path = trailingslashit( get_template_directory() ) . 'admin/theme-dashboard/screens/';

        add_action( 'admin_enqueue_scripts', array( $this, 'dashboard_scrips' ) );
        add_action( 'admin_menu', array( $this, 'edit_admin_menus' ), 999 );


        add_filter( 'pt-ocdi/plugin_page_title', array( $this, 'render_page_demos' ), 1 );

        add_filter( 'pt-ocdi/plugin_page_title', array( $this, 'render_page_demos_wrap' ), 2 );

        add_filter( 'pt-ocdi/lugin_page_footer', array( $this, 'render_page_demos_footer' ), 1 );



        // TGM Plugins
        add_filter( 'tgmpa_admin_menu_args', array( $this, 'edit_menu_title_plugin' ) );
    }



    public $plugin_path;
    public $plugin_url;
    public $plugin_name;

    public function dashboard_init_data(){

        $this->plugin_path      = plugin_dir_path(__FILE__);
        $this->plugin_url       = plugin_dir_url(__FILE__);
        $this->dashboard_dir    = (dirname(__FILE__)) . self::DASHBOARD_DIRECTORY;
        $theme_info             = wp_get_theme();
        $theme_parent           = $theme_info->parent();
        if(!empty($theme_parent)) {
            $theme_info         = $theme_parent;
        }

        $this->theme_name       = $theme_info['Name'];
        $this->theme_version    = $theme_info['Version'];
        $this->theme_slug       = $theme_info['Slug'];
        $this->theme_is_child   = !empty($theme_parent);
        $this->theme_slug       = $theme_info->get_stylesheet();



        $this->strings = array(
            'dashboard_title'                       => esc_html__('%1$s %2$s', 'keymoto'),
            'theme_doc_text'                        => esc_html__('Online Documentation', 'keymoto'),
            'theme_doc_link'                        => esc_url('https://templines.com/keymoto-documentation/'),
            'theme_support_link'                    => esc_url('https://support.templines.com/'),
            'plugin_link'                           => esc_url('admin.php?page=tvk-tgm-plugin-install'),
            'theme_support_title'                   => esc_html__('Theme Support', 'keymoto'),
            'theme_support_title_slogan'            => esc_html__('Help?', 'keymoto'),
            'support_message'                       => esc_html__('If you did not find the question interest in our documentation, found an error, or if you want to suggest something, you can contact technical support.','keymoto'),
            'support_btn_text'                      => esc_html__('Visit Support Center','keymoto'),
            'theme_documentation_title'             => esc_html__('Theme Documentation','keymoto'),
            'theme_documentation_title_slogan'      => esc_html__('Tutorial','keymoto'),
            'theme_documentation_text'              => esc_html__('If you have any problems, you can look at the online documentation of this theme, if you have not found a question that interests you, visit our support forum and ask us a question that interests you, we will be happy to help you.','keymoto'),
            'main_text_title'                       => esc_html__('Main Theme Info','keymoto'),
            'main_text_title_slogan'                => esc_html__('Info','keymoto'),
            'changelog_link'                        => esc_url('https://keymoto.templines.org/theme-custom-files/release_log.html'),
            'theme_link'                            => esc_url('https://keymoto.templines.info/promo'),
            'theme_link_text'                       => esc_html__('Theme Link', 'keymoto'),
            'portfolio_text_link'                   => esc_url('https://themeforest.net/user/templines'),
            'portfolio_text'                        => esc_html__('Our Portfolio', 'keymoto'),
            'widget_more_info_text'                 => esc_html__('More Info', 'keymoto'),
            'widget_theme_system_title'             => esc_html__('System Information', 'keymoto'),
            'widget_requirements_title'             => esc_html__('Requirements', 'keymoto'),
            'widget_requirements_problems'          => esc_html__('Some Problems', 'keymoto'),
            'widget_requirements_noproblems'        => esc_html__('No Problems', 'keymoto'),
            'changelog_title'                       => esc_html__('Themes Changelog', 'keymoto'),

            'theme_activation_title'                => esc_html__('Theme activation', 'keymoto'),
            'theme_activated'                       => esc_html__('Theme activated', 'keymoto'),
            'theme_not_activated'                   => esc_html__('Theme not activated', 'keymoto'),



            'remember_code_text'                    => esc_html__('Reminder ! One registration per Website. If registered elsewhere please remove purchased code that registration first.', 'keymoto'),
            'code_text'                             => esc_html__('Your code is:', 'keymoto'),

            'activation_doc_link'                   => esc_url('http://support.templines.com/knowledge-base/where-can-i-find-my-purchase-code/'),
            'activation_text_left'                  => esc_html__('You can learn how to find your purchase code', 'keymoto'),
            'activation_text_right'                 => esc_html__('You  will can later deactivate this code if you use dev site and using again on live version.', 'keymoto'),


            'thx_for_buying'                        => esc_html__('Thank you for purchasing our theme. If you liked the our theme please put 5 stars rating to it.', 'keymoto'),

        );


    } 

    public function edit_menu_title_plugin( $args ) {
        $count = $this->get_plugins_count();
        if ( $count > 0 ) {
            $args['menu_title'] = __( 'Install Plugins', 'keymoto' ) . ' <span class="update-plugins"><span class="update-count">' . $count . '</span></span>';
        }

        return $args;
    }


    public function register_required_plugins() {
        if(is_admin()) {
            require get_template_directory() . '/admin/option/plugins-activation.php';
        }
    }

    public function dashboard_activation_init() {
        if (current_user_can('switch_themes')) {
            include_once(get_template_directory() . '/admin/option/activation.php');
        }
    }

    public function dashboard_admin_init () {
        $this->theme_s = get_locale();
        $this->updater();
    }



    public function dashboard_init_menu_action(){
        add_action( 'admin_menu', array( $this, 'create_admin_menus' ), 9 );
    }



    public function welcome_screen() {
        require_once $this->include_screens_path . 'welcome.php';
    }

    public function system_info_screen() {
        require_once $this->include_screens_path . 'system_info.php';
    }



    public function dashboard_scrips( ) {
        $listPage = [
            'toplevel_page_'.'tvk-theme-dashboard',
            'keymoto_page_tvk-system-info',
            'keymoto_page_pt-one-click-demo-import',
            'keymoto_page_tvk-tgm-plugin-install',
        ];
        if ( in_array( get_current_screen()->base, $listPage ) ) {
            remove_all_actions( 'admin_notices' );
            wp_enqueue_style('tvk-dashboard-css', get_template_directory_uri() . '/admin/theme-dashboard/css/style.css', array(), '1.0');
        }

    }




    public function create_admin_menus() {
        global $pagenow;
        $this->setup_tab_menus();
        add_menu_page(
            esc_html__('General ', 'keymoto'),
            $this->theme_name,
            'import',
            'tvk-theme-dashboard',
            array( $this, 'welcome_screen' ),
            'dashicons-dashboard-icon',
            2
        );

        add_submenu_page( 'tvk-theme-dashboard',
            esc_html__('System Info', 'keymoto'),
            esc_html__('System Info', 'keymoto'),
            'manage_options',
            'tvk-system-info',
            array($this, 'system_info_screen')
        );


        add_submenu_page( 'tvk-theme-dashboard',
            esc_html__('Customize ', 'keymoto'),
            esc_html__('Customize', 'keymoto'),
            'manage_options',
            '',
            array($this, 'dashboard_print_customize')
        );


        // Redirect to Opal welcome page after activating theme.
        if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && $_GET['activated'] == 'true' ) {
            // Redirect
            wp_redirect( admin_url( 'admin.php?page=tvk-theme-dashboard' ) );
        }
    }


    private function setup_tab_menus() {
        $this->tabs_menu['welcome']   = [
            'name'          => esc_html__( 'Dashboard', 'keymoto' ),
            'slogan'        => esc_html__( 'Main Info', 'keymoto' ),
            'icon'          => 'tvk-theme-dashboard-icon-font-custom-font-home',
            'path'          => 'admin.php?page=tvk-theme-dashboard',
        ];

        $this->tabs_menu['system_info'] = [
            'name'          => esc_html__( 'System Info', 'keymoto' ),
            'slogan'        => esc_html__( 'Information from your theme', 'keymoto' ),
            'icon'          => 'tvk-theme-dashboard-icon-font-custom-font-shield',
            'path'          => 'admin.php?page=tvk-system-info',
        ];

        if ( TGM_Plugin_Activation::$instance->is_tgmpa_complete() !== true ) {
            $this->tabs_menu['plugins'] = [
                'name'      => __( 'Plugin Install', 'keymoto' ),
                'slogan'    => esc_html__( 'Install recommended or update your plugin', 'keymoto' ),
                'icon'          => 'tvk-theme-dashboard-icon-font-custom-font-monitor',
                'path'      => 'admin.php?page=tvk-tgm-plugin-install',
            ];
        }

        if ( class_exists('OCDI_Plugin') ) {
            $this->tabs_menu['demos'] = [
                'name'      => esc_html__( 'Demo Install', 'keymoto' ),
                'slogan'    => esc_html__( 'Install demo content', 'keymoto' ),
                'icon'          => 'tvk-theme-dashboard-icon-font-custom-font-favorites',
                'path'      => 'admin.php?page=pt-one-click-demo-import',
            ];
        }


        $this->tabs_menu['customize'] = [
            'name'      => esc_html__( 'Customize', 'keymoto' ),
            'slogan'    => esc_html__( 'Customize your theme', 'keymoto' ),
            'icon'          => 'tvk-theme-dashboard-icon-font-custom-font-settings-1',
            'path'      => 'customize.php',
        ];



    }



    public function dashboard_print_customize(){
        wp_redirect("customize.php");
    }


    public function edit_admin_menus() {
        global $submenu;

        if ( current_user_can( 'edit_theme_options' ) ) {
            $submenu['tvk-theme-dashboard'][0][0] = esc_attr__( 'Welcome', 'keymoto' );
        }
    }


    public function custom_menu_import() {
        if ( ! defined( 'ABSPATH' ) ) {
            exit; // Exit if accessed directly
        }

        if (class_exists('OCDI_Plugin')){
            function keymoto_plugin_page_setup( $default_settings ) {
                $default_settings['parent_slug'] = 'tvk-theme-dashboard';
                $default_settings['page_title']  = esc_html__( 'Demo Import' , 'keymoto' );
                $default_settings['menu_title']  = esc_html__( 'Demo Install' , 'keymoto' );
                $default_settings['capability']  = 'import';
                $default_settings['menu_slug']   = 'pt-one-click-demo-import';

                return $default_settings;
            }
            add_filter( 'pt-ocdi/plugin_page_setup', 'keymoto_plugin_page_setup' );
        }


    }






    /**
     * Renders the admin screens header with title, logo and tabs.
     *
     * @since   5.0.0
     *
     * @access  public
     *
     * @param string $screen The current screen.
     *
     * @return void
     */
    public function get_tab_menu( $screen = 'welcome' ) {?>
<div class="tvk-dashboard-screen-wrap">
    <div class="col-md-4 dashboard-menu-parent">
        <div class="dashboard-menu-wrap">
            <div class="not-active-menu-item-preview">
                <h2 class="tvk-dashboard-title"><?php printf($this->strings['dashboard_title'], $this->theme_name ,'<span class="tvk-theme-version">V'.$this->theme_version).'</span>'; ?> </h2>
            </div>

            <div class="bottom-info">
                <ul class="tvk-dashboard-menu-tabs">
                    <?php foreach ($this->tabs_menu as $key => $tab){?>
                    <li class="<?php echo esc_html(( $key === $screen ) )? 'active-item' : ''; ?> tvk-dashboard-nav-item">
                        <i class="<?php echo esc_html( $tab['icon'] ); ?>"></i>
                        <div class="menu-item-inner-wrap">
                            <a href="<?php echo esc_url_raw( ( $key === $screen ) ? '#' : admin_url( $tab['path'] ) ); ?>" class="<?php echo esc_html(( $key === $screen ) )? 'active' : ''; ?> tvk-dashboard-nav-link">
                                <div class="nav-item-title"><?php echo esc_html( $tab['name'] ); ?></div>
                                <div class="slogan-wrap"><?php echo esc_html( $tab['slogan'] ); ?></div>
                            </a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <?php
    }

    public function get_tab_footer() {?>

</div>

<?php
    }

    public function get_plugins_require_count() {
        return count( $this->plugins_required );
    }




    public function render_page_demos( $content ) {
        ob_start();
        $this->get_tab_menu( 'demos' );
        $content .= ob_get_clean();

        return $content;
    }

    public function render_page_demos_wrap( $content ) {
        ob_start();
        echo '<div class="col-md-8 tvk-dashboard-page-parent"><div class="tvk-dashboard-page-wrap"><div class="dashboard-page-top-title-wrap">
            <div class="title-page"><i class="tvk-theme-dashboard-icon-font-custom-font-favorites"></i><h2 class="main-page-title">'.esc_html__("Demo Install", "keymoto").'</h2></div>
            <div class="dashboard-info-top-link-wrap"><a class="theme-link-btn" href="'.Keymoto_Dashboard::getInstance()->strings['theme_link'].'">'.Keymoto_Dashboard::getInstance()->strings['theme_link_text'].'</a> <a class="portfolio-link-btn" href="'.Keymoto_Dashboard::getInstance()->strings['portfolio_text_link'].'">'.Keymoto_Dashboard::getInstance()->strings['portfolio_text'].'</a></div>
         </div>';
        $content .= ob_get_clean();

        return $content;
    }

    public function render_page_demos_footer( $content ) {
        ob_start();
        echo '</div>';
        $content .= ob_get_clean();

        return $content;
    }

    public function get_plugins_count() {
        return count( $this->plugins );
    }


    public static function getInstance() {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Keymoto_Dashboard ) ) {
            self::$instance = new Keymoto_Dashboard();
        }

        return self::$instance;
    }
}

Keymoto_Dashboard::getInstance();
