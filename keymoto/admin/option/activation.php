<?php

/** Envato API check **/

function keymoto_check_is_activated(){

	$envatoCode = get_theme_mod('keymoto_licence_settings_code', '');
	
	$option_name = 'keymoto_licence_is_activated';
	$option_name_code = 'keymoto_licence_code';
	// update_option($option_name_code, '');
	if ($envatoCode){
		if (!empty( get_option( $option_name )) ){

			if (!empty(get_option( $option_name_code )) && (get_option( $option_name_code ) == $envatoCode)){

				$expiredTime = strtotime(get_option( $option_name ));	
				if ($expiredTime < time()){
					activate_license($envatoCode, $option_name, $option_name_code);
				}
				return true;
			}
		}
	 return	activate_license($envatoCode, $option_name, $option_name_code);
	}
	return false;
}

function keymoto_theme_code_info()
{
	return ['theme_id' => '34110981', 'theme' => 'Theme Keymoto', 'envato_code' => get_theme_mod('keymoto_licence_settings_code', '') ];
}
function activate_license($envatoCode, $option_name, $option_name_code) {

	$theme_id = '34110981';
	$theme = 'Theme Keymoto';
	
	$api_params = array(
		'edd_action' => 'activate_license',
		'license_key'    => $envatoCode,
		'theme'  	 => $theme,
		'theme_id'  => $theme_id,
		'url'        => home_url()
	);

	$response = get_api_response( json_encode( $api_params ));

	if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

		if ( is_wp_error( $response ) ) {
			$message = $response->get_error_message();
		} else {
			$message = __( 'An error occurred, please try again.', 'keymoto' );
		}


	} else {

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		if (is_object($license_data) && false === $license_data->success ) {
			update_option( $option_name_code, '' );
			if(1 == $license_data->error_top){
				$desc = $license_data->desc ? $license_data->desc : '';
				set_theme_mod( 'activ_theme_desc',  $desc );
			}else
			{
				set_theme_mod( 'activ_theme_desc', '' );
			}
		}

	}

	if ( isset($license_data) && isset( $license_data->license ) ) {

		if ($license_data->license !== 'valid') {
			update_option( $option_name, '' );
			update_option( $option_name_code, $envatoCode );
			return false;
		}else{
			update_option( $option_name, $license_data->time );
			update_option( $option_name_code, $envatoCode );
			return true;
		}
	
	}


	return false;

}
 function get_api_response( $api_params ) {

 	$remote_api_url = 'http://support.templines.com/activate-key/';
	$response = wp_remote_post( $remote_api_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );

	return $response;
 }


if ( !function_exists( 'keymoto_admin_notice_activation' ) ) {
  function keymoto_admin_notice_activation() {
  	if(keymoto_check_is_activated())return;
  	$envatoCode = get_theme_mod('keymoto_licence_settings_code') ? get_theme_mod('keymoto_licence_settings_code') : '';
    $screen = get_current_screen();
    if ( $screen->id != 'appearance_page_adminpanel' ) {
        if ( 1 ) {
            echo "
                <div style='display:block' class='update-nag'>
                    <h3 class='pix_notice_title'>" . esc_html__("Theme activation", "keymoto") . "</h3>
                    <p>" . esc_html__("Your code", "keymoto") . "<input style='width:280px;margin:0 10px' type='text' name='pix_code' data-activationtheme='1' value='{$envatoCode}'><a data-activationtheme='1' class='button button-primary activation-theme'>" . esc_html__('Activation', 'keymoto') . "</a></p><p class='activated' style='display:none'>" . esc_html__("Theme activated", "keymoto") . "</p>
                </div>
            ";
        }
    }
  }
}
// add_action( 'init', 'keymoto_admin_notice_view' );
function keymoto_admin_notice_view() {
	if (current_user_can('switch_themes')) {
    add_action('admin_notices', 'keymoto_admin_notice_activation', 2);
	}
}

if( wp_doing_ajax() ){
	add_action('wp_ajax_theme_activation', 'keymoto_ajax_theme_activation');
	add_action('wp_ajax_delete_key_activation', 'keymoto_ajax_delete_key_activation');
}
function keymoto_ajax_theme_activation() {
	global $post;
	if( ! wp_verify_nonce( $_POST['nonce_code'], 'pix-admin-nonce' ) ) die( 'Stop!');
	$json = wp_unslash( $_POST['code']);
	set_theme_mod( 'keymoto_licence_settings_code', $json );

	if($rez = keymoto_check_is_activated()){
		echo ''.$rez;
	}else{
		echo ''.$rez;
	}

	wp_die();
}
function keymoto_ajax_delete_key_activation() {
	global $post;
	if( ! wp_verify_nonce( $_POST['nonce_code'], 'pix-admin-nonce' ) ) die( 'Stop!');

	$envatoCode = get_theme_mod('keymoto_licence_settings_code', '');
	$theme_id = '34110981';
	$theme = 'Theme keymoto';
	$api_params = array(
		'edd_action' => 'delete_key',
		'license_key'    => $envatoCode,
		'theme'  	 => $theme,
		'theme_id'  => $theme_id,
		'url'        => home_url()
	);

	$response = get_api_response( json_encode( $api_params ));
	if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

	} else {

		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		if (is_object($license_data) && true == $license_data->success ) {
			set_theme_mod( 'keymoto_licence_settings_code', '' );
			update_option( 'keymoto_licence_code', '' );
			echo  1 ;
		}else{
			echo  0;
		}

	}

 

	wp_die();
}

add_action( 'admin_enqueue_scripts', 'activete_theme_ajax_data');
function activete_theme_ajax_data(){
	wp_localize_script( 'jquery', 'pixAjax', 
		array(
			'url' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('pix-admin-nonce')
		)
	);
}
