<?php



/**
 * Register Required Plugins
 */
add_action( 'tgmpa_register', 'keymoto_register_required_plugins' );
if ( ! function_exists( 'keymoto_register_required_plugins' ) ) :



function keymoto_register_required_plugins() {
    
    
    $str_plugin_url = 'http://support.templines.com/plugins-load/';
    

    
    if(function_exists('keymoto_theme_code_info')){
        $theme_code = keymoto_theme_code_info();
        $get_params = array(
            'edd_action' => 'plugins_activation',
            'license_key'    => $theme_code['envato_code'],
            'theme'      => $theme_code['theme'],
            'theme_id'  => $theme_code['theme_id'],
            'url'        => home_url()
        );
        $str_get_params = '';
        if(!empty($theme_code['envato_code']) && !empty($theme_code['theme_id']) && !empty($theme_code['theme']) ){
          $str_get_params = '?' . http_build_query($get_params);
        }
        $str_plugin_url .= $str_get_params;
    }
     
    
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    
    
    $plugins = array(
        // Kirki
        array(
            'name'                  => 'Kirki',
            'slug'                  => 'kirki',
            'required'              => true,
        ),
        // Elementor
        array(
            'name'                  => 'Elementor',
            'slug'                  => 'elementor',
            'required'              => true,
        ),
        // Demo Import
        array(
            'name'                  => 'One Click Demo Import',
            'slug'                  => 'one-click-demo-import',
            'required'              => false,
        ),

        // Mail Chimp
        array(
            'name'                  => 'Mailchimp for Wordpress',
            'slug'                  => 'mailchimp-for-wp',
            'required'              => false,
        ),

		// Contact Form 7
        array(
            'name'                  => 'Contact Form 7',
            'slug'                  => 'contact-form-7',
            'required'              => false,
        ),

       
        

        array(
            'name'                  => 'AnWP Post Grid and Post Carousel Slider for Elementor',
            'slug'                  => 'anwp-post-grid-for-elementor',
            'required'              => false,
        ),
        
        
        array(
            'name'                  => 'Premium Addons for Elementor',
            'slug'                  => 'premium-addons-for-elementor',
            'required'              => false,
        ),
        
        

        
        
           array(
            'name'                  => 'BuddyPress',
            'slug'                  => 'BuddyPress',
            'required'              => false,
        ),
        
        
        
            array(
            'name'                  => 'WooCommerce',
            'slug'                  => 'woocommerce',
            'required'              => false,
        ),
        
        
          array(
            'name'                  => 'Classic Editor and Classic Widgets',
            'slug'                  => 'classic-editor-and-classic-widgets',
            'required'              => false,
        ),  
        

        // Theme plugin from our library
        // ACF PRO Plugin
        array(
            'name'                  => 'Advanced Custom Fields PRO',
            'slug'                  => 'advanced-custom-fields-pro',
            'required'              => true,
            'source'                => 'http://assets.templines.com/plugins/advanced-custom-fields-pro.zip',
        ),
        // Rev Slider Plugin
        array(
            'name'                  => 'Slider Revolution',
            'slug'                  => 'revslider',
            'required'              => false,
            'source'                => 'http://assets.templines.com/plugins/revslider.zip',
        ),
        
         // Youzify
        array(
            'name'                  => 'Youzify',
            'slug'                  => 'youzify', 
            'required'              => false,
            'source'                => 'http://assets.templines.com/plugins/youzify.zip',
        ), 
        
      
        // Auto Plugin PixAutoDeal
        array(
            'name'                  => 'PixAutoDeal',
            'slug'                  => 'pix-auto-deal',
            'required'              => true,
            'external_url'          => '',
            'source'                => 'https://assets.templines.com/plugins/theme/keymoto/c%23YrJ2S%2AvWA%23%241Dp2%23%5ErMra96nTy%23%2Aaf/pix-auto-deal.zip',
         ),
         // Auto Plugin PixAutoDeal
        array(
            'name'                  => 'Booking Plugin',
            'slug'                  => 'pix-booking-auto',
            'required'              => true,
            'external_url'          => '', 
            'source'                => 'http://assets.templines.com/plugins/pix-booking-auto.zip',
         ),
        
        
        // FL Helper Plugin
        array(
            'name'                  => 'Templines Helper Core',
            'slug'                  => 'templines-helper-core',
            'required'              => true,
            'external_url'          => '',
            'source'                => 'https://assets.templines.com/plugins/theme/keymoto/c%23YrJ2S%2AvWA%23%241Dp2%23%5ErMra96nTy%23%2Aaf/templines-helper-core.zip',
        ),


    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa( $plugins, $config );
}
endif;


// Visual Composer as theme
add_action( 'vc_before_init', 'keymoto_vc_setastheme' );
function keymoto_vc_setastheme() {
    vc_set_as_theme();
}

// Revolution Slider as theme
if(function_exists( 'set_revslider_as_theme' )) {
    add_action( 'init', 'keymoto_rev_setastheme' );
    function keymoto_rev_setastheme() {
        set_revslider_as_theme();
    }
}
