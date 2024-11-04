<?php

if(!class_exists('KEYMOTO_Admin')):
class KEYMOTO_Admin {
    /**
     * The single class instance.
     *
     * @since 1.0.0
     * @access private
     *
     * @var object
     */
    private static $_instance = null;

    /**
    * Main Instance
    * Ensures only one instance of this class exists in memory at any one time.
    *
    */
    public static function instance () {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
            self::$_instance->init_globals();
            self::$_instance->init_includes();
            self::$_instance->init_actions();
        }
        return self::$_instance;
    }

    private function __construct () {
        /* We do nothing here! */
        $this->admin_path = get_template_directory() . '/admin';

        // get theme data
        $theme_data = wp_get_theme();
        $theme_parent = $theme_data->parent();
        if(!empty($theme_parent)) {
            $theme_data = $theme_parent;
        }

        $this->theme_slug = $theme_data->get_stylesheet();
        $this->theme_name = $theme_data['Name'];
        $this->theme_version = $theme_data['Version'];
        $this->theme_uri = $theme_data->get('ThemeURI');
        $this->theme_is_child = !empty($theme_parent);
    }

    /**
     * Init Global variables
     */
    private function init_globals () {
        $extra_headers = get_file_data(get_template_directory() . '/style.css', array(
            'Theme ID' => 'Theme ID'
        ), 'fL_theme');
        $this->theme_id = $extra_headers['Theme ID'];
    }

    /**
     * Init Included Files
     */
    private function init_includes () {
        require $this->admin_path . '/option/options-setting.php';
        require $this->admin_path . '/option/kirki-options.php';
        require $this->admin_path . '/option/acf-metaboxes.php';
    }

    /**
     * Setup the hooks, actions and filters.
     */
    private function init_actions () {
        add_action('wp_enqueue_scripts', array($this, 'keymoto_enqueue_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'keymoto_enqueue_styles'));
        if(keymoto_get_theme_mod('custom_theme_font_style') != 'default'){
            add_action('wp_enqueue_scripts', array($this, 'keymoto_custom_font_styles_function'));
        }
        if (is_admin()) {
            add_action('admin_print_styles', array($this, 'admin_print_styles'));
        }
    }
    
    
    

    /**
     * Print Styles
     */
    public function admin_print_styles () {
        wp_enqueue_media();
        wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/libs/font-awesome.css', array(), '4.7');
        wp_enqueue_style('keymoto-theme-admin-style', get_template_directory_uri() . '/admin/assets/css/style.css', array(), '1.0');
        if(class_exists('Kirki')){
            wp_enqueue_style('keymoto-customize-icon-admin-style', get_template_directory_uri() . '/admin/assets/css/customize-icon-style.css', array(), '1.0');
        }
        wp_enqueue_script('keymoto-admin-script', get_template_directory_uri() . '/admin/assets/js/admin-scripts.js', '', '', true);
        //Icon Picker
        wp_enqueue_script('fonticonpicker', get_template_directory_uri() . '/admin/assets/js/libs/fonticonpicker.js', '', '', true);
        wp_enqueue_style('icon-piker', get_template_directory_uri() . '/admin/assets/css/libs/icon-piker.css', array(), '1.0');

        wp_register_script( 'keymoto-custom-wp-admin-script', get_template_directory_uri() . '/admin/assets/js/custom-admin.js', array( 'jquery' ) );
        wp_localize_script( 'keymoto-custom-wp-admin-script', 'meta_image',
            array(
                'title' => esc_html__( 'Choose or Upload an Image', 'keymoto' ),
                'button' => esc_html__( 'Use this image', 'keymoto' ),
            )
        );

        wp_enqueue_script( 'keymoto-custom-wp-admin-script' );

    }

    public function keymoto_enqueue_styles() {
        //CSS Libs
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/libs/bootstrap.css', array(), '4.0');
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/libs/font-awesome.css', array(), '4.7');
        wp_enqueue_style( 'keymoto-custom-icon-font', get_template_directory_uri() . '/assets/css/libs/fl-custom-font.css', array(), '1.0');
        wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/css/libs/simple-line-icons.css', array(), '1.0');
        wp_enqueue_style( 'modal-box', get_template_directory_uri() . '/assets/css/libs/modal-box.css', array(), '1.1.0');
        wp_enqueue_style( 'venobox', get_template_directory_uri() . '/assets/css/libs/venobox.css', array(), '1.8.6');
        // General css
        wp_enqueue_style( 'keymoto-general', get_template_directory_uri() . '/assets/css/general.css', array(), '1.0');
        wp_enqueue_style( 'keymoto-custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.0');
        wp_enqueue_style( 'keymoto-elementor-custom-page-builder-style', get_template_directory_uri() . '/assets/css/elementor-custom-page-builder-style.css', array(), '1.0');
        wp_enqueue_style( 'keymoto-general-new-style', get_template_directory_uri() . '/assets/css/general-new-style.css', array(), '1.0');

    }



    public function keymoto_enqueue_scripts() {

        $api_key = keymoto_get_theme_mod('google_api_key');

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

        wp_enqueue_script( 'imagesloaded' );
        wp_enqueue_script( 'jquery-ui-widget' );


        // Plugin Custom Js
        wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri() . '/assets/js/vendors-libs/bootstrap-bundle.js', array( 'jquery' ), '4.0', true );
        wp_enqueue_script( 'slick', get_template_directory_uri()  . '/assets/js/vendors-libs/slick.js', array( 'jquery' ), '1.8.0', true );
        wp_enqueue_script( 'custom-select', get_template_directory_uri() . '/assets/js/vendors-libs/jelect.js', array( 'jquery' ), '1.0', true );
         wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/vendors-libs/jquery-ui.min.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'form-validate', get_template_directory_uri()  . '/assets/js/vendors-libs/jquery.validate.min.js', array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/vendors-libs/isotope.js', array( 'jquery' ), '3.0.6', true );
        wp_enqueue_script( 'cookie', get_template_directory_uri() . '/assets/js/vendors-libs/cookie.js', array( 'jquery' ), '1.4.1', true );
        wp_enqueue_script( 'count-to', get_template_directory_uri() . '/assets/js/vendors-libs/count-to.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/vendors-libs/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
        wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/vendors-libs/waypoints.js', array( 'jquery' ), '4.0.1', true );
        wp_enqueue_script( 'mega-menu', get_template_directory_uri() . '/assets/js/vendors-libs/mega-menu.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/vendors-libs/theia-sticky-sidebar.js', array( 'jquery' ), '1.7.0', true );
        wp_enqueue_script( 'tween-max', get_template_directory_uri() . '/assets/js/vendors-libs/TweenMax.js', array( 'jquery' ), '2.0.2', true );
        wp_enqueue_script( 'velocity', get_template_directory_uri() . '/assets/js/vendors-libs/velocity.js', array( 'jquery' ), '1.5.0', true );
        wp_enqueue_script( 'velocity-pack', get_template_directory_uri() . '/assets/js/vendors-libs/velocity-ui-pack.js', array( 'jquery' ), '5.0.4', true );
        wp_enqueue_script( 'nouislider', get_template_directory_uri() . '/assets/js/vendors-libs/nouislider.js', array( 'jquery' ), '8.5.1', true );
        wp_enqueue_script( 'w-numb', get_template_directory_uri() . '/assets/js/vendors-libs/w-numb.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'venobox', get_template_directory_uri() . '/assets/js/vendors-libs/venobox.js', array( 'jquery' ), '1.0', true );


        //Mega Menu
        wp_enqueue_script( 'mega-menu-start', get_template_directory_uri() . '/assets/js/vendors-libs/mega-menu/mega-menu-start.js', array( 'jquery' ),'1.0', true );

        // Preloader
        if(keymoto_get_theme_mod('preloader_page_show') == 'true') {
            wp_enqueue_script( 'keymoto-page-loader', get_template_directory_uri() . '/assets/js/vendors-libs/keymoto-page-loader.js', array( 'jquery' ), '1.0', true );
        }

        // Google Maps
        // Google Api Key
        if ($api_key !=''){
            wp_enqueue_script( 'google-maps-api', '//maps.googleapis.com/maps/api/js?key='.esc_attr($api_key) );
            wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/assets/js/vendors-libs/gmap3.js', array( 'jquery' ), '', true );
        }

        wp_enqueue_script( 'hotspot', get_template_directory_uri() . '/assets/js/vendors-libs/hotspot.js', array( 'jquery' ), '1.0', true );

        // Theme Js Custom File
        wp_enqueue_script( 'keymoto-custom-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.0', true );




    }

    public function keymoto_custom_font_styles_function() {

        wp_enqueue_style( 'keymoto-save-google-fonts-title', '//fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap', false, '1.0' );
        wp_enqueue_style( 'keymoto-save-google-fonts-body', '//fonts.googleapis.com/css2?family=Oxygen:wght@400;700&display=swap', false, '1.0' );
        wp_enqueue_style( 'keymoto-save-google-fonts-mobile-menu', '//fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap', false, '1.0' );
        wp_enqueue_style( 'keymoto-custom-theme-font-style', get_template_directory_uri() . '/assets/css/custom-font-style.css', array(), '1.0');

    }

    /**
     * Returns the login form
     */

    public static function keymoto_login_form() {
    $args = array(
        'redirect'                      =>  esc_url( wp_login_url( get_permalink() ) ),
        'form_id'                       => 'loginform-custom',
        'label_username'                => '',
        'label_password'                => '',
    );

    if (class_exists('Fl_Login_Form_Widget')) {
        $args = array(
            'label_log_in'              => esc_html__('Sign in', 'keymoto'),
            'label_lost_password'       => esc_html__('Forgot password', 'keymoto').'?',
        );

        $keymoto_login_widget = new Fl_Login_Form_Widget();

        $keymoto_login_widget->wp_login_form($args);
    } else {
        wp_login_form($args);
    }

    }



}
endif;
if ( ! function_exists( 'keymoto_admin' ) ) :
function keymoto_admin() {
	return KEYMOTO_Admin::instance();
}
endif;

keymoto_admin();






add_action('after_setup_theme', 'keymoto_translate_theme_support_setup');
function keymoto_translate_theme_support_setup(){

    $keymoto_translate = array(
        'automatic' => esc_html__( 'Automatic', 'keymoto' ),
        'manual' => esc_html__( 'Manual', 'keymoto' ),
        'semi-automatic' => esc_html__( 'Semi-Automatic', 'keymoto' ),
        'diesel' => esc_html__( 'Diesel', 'keymoto' ),
        'electric' => esc_html__( 'Electric', 'keymoto' ),
        'petrol' => esc_html__( 'Petrol', 'keymoto' ),
        'hybrid' => esc_html__( 'Hybrid', 'keymoto' ),
        'plugin_electric' => esc_html__( 'Plugin electric', 'keymoto' ),
        'petrol+cng' => esc_html__( 'Petrol+CNG', 'keymoto'  ),
        'lpg' => esc_html__( 'LPG', 'keymoto'  ),
        'new' => esc_html__( 'New', 'keymoto' ),
        'used' => esc_html__( 'Used', 'keymoto' ),
        'driver' => esc_html__( 'Driver', 'keymoto' ),
        'non driver' => esc_html__( 'Non driver', 'keymoto' ),
        'barnfind' => esc_html__( 'Barnfind', 'keymoto' ),
        'projectcar' => esc_html__( 'Projectcar', 'keymoto' ),
        'in stock' => esc_html__( 'In stock', 'keymoto' ),
        'expected' => esc_html__( 'Expected', 'keymoto' ),
        'out of stock' => esc_html__( 'Out of stock', 'keymoto' ),
        'front' => esc_html__( 'Front', 'keymoto' ),
        'rear' => esc_html__( 'Rear', 'keymoto' ),
        'left' => esc_html__( 'Left', 'keymoto' ),
        'right' => esc_html__( 'Right', 'keymoto' ),
        'fixed' => esc_html__( 'Fixed', 'keymoto' ),
        'negotiable' => esc_html__( 'Negotiable', 'keymoto' ),
        'no' => esc_html__( 'No', 'keymoto' ),
        'yes' => esc_html__( 'Yes', 'keymoto' ),
        'Featured' => esc_html__( 'Featured', 'keymoto' ),
        'Sold' => esc_html__( 'Sold', 'keymoto' ),
        'Request' => esc_html__( 'Request', 'keymoto' ),
        'Reserved' => esc_html__( 'Reserved', 'keymoto' ),
        'POA' => esc_html__( 'POA', 'keymoto' ),
        'white' => esc_html__( 'white', 'keymoto' ),
        'silver' => esc_html__( 'silver', 'keymoto' ),
        'black' => esc_html__( 'black', 'keymoto' ),
        'grey' => esc_html__( 'grey', 'keymoto' ),
        'blue' => esc_html__( 'blue', 'keymoto' ),
        'red' => esc_html__( 'red', 'keymoto' ),
        'brown' => esc_html__( 'brown', 'keymoto' ),
        'beige' => esc_html__( 'beige', 'keymoto' ),
        'green' => esc_html__( 'green', 'keymoto' ),
        'yellow' => esc_html__( 'yellow', 'keymoto' ),
        'orange' => esc_html__( 'orange', 'keymoto' ),
        'purple' => esc_html__( 'purple', 'keymoto' ),
        'Year' => esc_html__( 'Year', 'keymoto' ),
        'Drive' => esc_html__( 'Drive', 'keymoto' ),
        'Auto Make' => esc_html__( 'Auto Make', 'keymoto' ),
        'Auto Model' => esc_html__( 'Auto Model', 'keymoto' ),
        'Auto Version' => esc_html__( 'Auto Version', 'keymoto' ),
        'Mileage' => esc_html__( 'Mileage', 'keymoto' ),
        'Fuel' => esc_html__( 'Fuel', 'keymoto' ),
        'Engine' => esc_html__( 'Engine', 'keymoto' ),
        'Horsepower' => esc_html__( 'Horsepower', 'keymoto' ),
        'Transmission' => esc_html__( 'Transmission', 'keymoto' ),
        'Doors' => esc_html__( 'Doors', 'keymoto' ),
        'Seats' => esc_html__( 'Seats', 'keymoto' ),
        'Color' => esc_html__( 'Color', 'keymoto' ),
        'Interior Color' => esc_html__( 'Interior Color', 'keymoto' ),
        'Condition' => esc_html__( 'Condition', 'keymoto' ),
        'Purpose' => esc_html__( 'Purpose', 'keymoto' ),
        'VIN' => esc_html__( 'VIN', 'keymoto' ),
        'Price' => esc_html__( 'Price', 'keymoto' ),
        'Sale Price' => esc_html__( 'Sale Price', 'keymoto' ),
        'Stock Status' => esc_html__( 'Stock Status', 'keymoto' ),
        'Price Type' => esc_html__( 'Price Type', 'keymoto' ),
        'Warranty' => esc_html__( 'Warranty', 'keymoto' ),
        'Currency' => esc_html__( 'Currency', 'keymoto' ),
        'Updated Date' => esc_html__( 'Updated Date', 'keymoto' ),
        "Seller Company"=> esc_html__( 'Seller Company', 'keymoto' ),
        "Seller Email"=> esc_html__( 'Seller Email', 'keymoto' ),
        "Seller Phone"=> esc_html__( 'Seller Phone', 'keymoto' ),
        "Seller Country"=> esc_html__( 'Seller Country', 'keymoto' ),
        "Seller State"=> esc_html__( 'Seller State', 'keymoto' ),
        "Seller Town"=> esc_html__( 'Seller Town', 'keymoto' ),
        "Seller Location"=> esc_html__( 'Seller Location', 'keymoto' ),
        "Seller Location Latitude"=> esc_html__( 'Seller Location Latitude', 'keymoto' ),
        "Seller Location Longitude"=> esc_html__( 'Seller Location Longitude', 'keymoto' ),


    );

    update_option( '_pixad_auto_translate', serialize( $keymoto_translate ) );

}
