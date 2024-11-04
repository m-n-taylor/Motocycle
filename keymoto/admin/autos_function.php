<?php
global $field_car;
$auto_description='';
$field_car = array(
    'auto-condition'    => array('name' => esc_html( 'Auto Condition', 'keymoto' ),    'field'   => 'auto-condition',      'slug' => '_auto_condition',    'type' => 'select',     'temp' => 'keymoto_temp_select_cond'),
    'auto-doors'        => array('name' => esc_html( 'Doors', 'keymoto' ),             'field'   => 'auto-doors',          'slug' => '_auto_doors',        'type' => 'select',     'temp' => 'keymoto_temp_select_doors'),
    'auto-drive'        => array('name' => esc_html( 'Auto Drive', 'keymoto' ),        'field'   => 'auto-drive',          'slug' => '_auto_drive',        'type' => 'select',     'temp' => 'keymoto_temp_select_drive'),
    'auto-purpose'      => array('name' => esc_html('Auto Purpose','keymoto' ),        'field'   => 'auto-purpose',        'slug' => '_auto_purpose',      'type' => 'select',     'temp' => 'keymoto_temp_select_purpose' ),
    'auto-color'        => array('name' => esc_html('Color','keymoto' ),               'field'   => 'auto-color',          'slug' => '_auto_color',        'type' => 'text' ,      'placeholder' => esc_attr('eg: red')   ),
    'auto-color-int'    => array('name' => esc_html('Interior Color','keymoto' ),      'field'   => 'auto-color-int',      'slug' => '_auto_color_int',    'type' => 'text',       'placeholder' => esc_attr('eg: black') ),
    'auto-warranty'     => array('name' => esc_html('Warranty','keymoto' ),            'field'   => 'auto-warranty',       'slug' => '_auto_warranty',     'type' => 'select',     'temp' => 'keymoto_temp_select_warranty' ),
    'auto-vin'          => array('name' => esc_html('VIN','keymoto' ),                 'field'   => 'auto-vin',            'slug' => '_auto_vin',          'type' => 'text',       'placeholder' => esc_attr('eg: 1VXBR12EXCP901213') ),
    'auto-horsepower'   => array('name' => esc_html('Horsepower, hp','keymoto' ),      'field'   => 'auto-horsepower',     'slug' => '_auto_horsepower',   'type' => 'text',       'placeholder' => esc_attr('eg: 200') ),
    'auto-seats'        => array('name' => esc_html('Seating Capacity','keymoto' ),    'field'   => 'auto-seats',          'slug' => '_auto_seats',        'type' => 'text',       'placeholder' => esc_attr('eg: 5') ),
    'auto-version'      => array('name' => esc_html('Auto Version','keymoto' ),        'field'   => 'auto-version',        'slug' => '_auto_version',      'type' => 'text' ,      'placeholder' => esc_attr('eg: 1.6 hdi') ),
);

function keymoto_show_sidebar($type, $custom, $is_autos = 0, $sidebar = 'sidebar-1'){
    global $wp_query;
    $layout = 2;
    $layouts = array(
        1 => 'full',
        2 => 'right',
        3 => 'left',
    );

    if (is_array($custom) && isset($custom['pix_selected_sidebar'])) {
        $sidebar = isset ($custom['pix_selected_sidebar'][0]) ? $custom['pix_selected_sidebar'][0] : $sidebar;
        $layout = isset ($custom['pix_page_layout']) ? $custom['pix_page_layout'][0] : '2';
    }

    if (!is_active_sidebar($sidebar)) $layout = '1';

    if (isset($layouts[$layout]) && $type === $layouts[$layout]) {
        echo (is_search() || $is_autos ? '<div class="sidebar-wrapper col-md-3 sticky-bar"><aside class="sidebar ">' : '<div class="sidebar-wrapper col-md-4"><aside class="sidebar">');
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar)) {
        }
        echo '</aside></div>';
    }else{
        echo '';
    }

}


/************************ add update car [Pages] ********************/
function keymoto_auto_upload() {

    $cur_user_id = get_current_user_id();

    if (  isset($_REQUEST['submit']) && isset( $_REQUEST['seller_auto_upload_nonce'] ) && wp_verify_nonce( $_REQUEST['seller_auto_upload_nonce'], 'seller_auto_upload' ) && $cur_user_id ){

        $Settings   = new PIXAD_Settings();
        $options    = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );
        $status =   isset( $options['autos_status_publiс'] ) ? $options['autos_status_publiс'] : '';
        $status =   !empty( $status ) ? $status: 'pending';

        $auto_title = sanitize_text_field($_REQUEST['auto-post-title']);
        if(function_exists('pix_autodealer_output_info')){
            $auto_description = pix_autodealer_output_info($_REQUEST['content']);
        }


        $new_post = array(
            'ID'            => '',
            'post_type'     => 'pixad-autos',
            'post_title'    => $auto_title,
            'post_content'  => $auto_description,
            'post_status'   => $status,
            'post_author'   => $cur_user_id
        );

        $post_id = wp_insert_post($new_post);

        // This will redirect you to the newly created post
        $post = get_post($post_id);
        if ($post_id) {

            if($_REQUEST['auto-make'] != ''){
                wp_set_object_terms( $post_id, $_REQUEST['auto-make'], 'auto-model', false );
            }

            if(!empty($_REQUEST['auto-body'])){
                wp_set_object_terms( $post_id, $_REQUEST['auto-body'], 'auto-body', false );
            }

            if(!empty($_REQUEST['auto-equipment'])){
                wp_set_object_terms( $post_id, $_REQUEST['auto-equipment'], 'auto-equipment', false );
            }

            $encode_gallery = '';

            $encode_video = '';


            $options = array(
                '_auto_year'      => sanitize_text_field( $_REQUEST['auto-year'] ),
                '_auto_doors'      => sanitize_text_field( $_REQUEST['auto-doors'] ),
                '_auto_version'      => sanitize_text_field( $_REQUEST['auto-version'] ),
                '_auto_transmission'  => sanitize_text_field( $_REQUEST['auto-transmission'] ),
                '_auto_fuel'      => sanitize_text_field( $_REQUEST['auto-fuel'] ),
                '_auto_price'     => sanitize_text_field( $_REQUEST['auto-price'] ),
                '_auto_mileage'     => sanitize_text_field( $_REQUEST['auto-mileage'] ),
                '_auto_engine'      => sanitize_text_field( $_REQUEST['auto-engine'] ),
                '_auto_warranty'      => sanitize_text_field( $_REQUEST['auto-warranty'] ),
                '_auto_vin'      => sanitize_text_field( $_REQUEST['auto-vin'] ),
                '_auto_horsepower'      => sanitize_text_field( $_REQUEST['auto-horsepower'] ),
                '_auto_seats'      => sanitize_text_field( $_REQUEST['auto-seats'] ),
                '_auto_condition'      => sanitize_text_field( $_REQUEST['auto-condition'] ),
                '_auto_purpose'      => sanitize_text_field( $_REQUEST['auto-purpose'] ),
                '_auto_drive'      => sanitize_text_field( $_REQUEST['auto-drive'] ),
                '_auto_color'      => sanitize_text_field( $_REQUEST['auto-color'] ),
                '_auto-_color_int'      => sanitize_text_field( $_REQUEST['auto-color-int'] ),
                '_seller_first_name'  => sanitize_text_field( $_REQUEST['seller-first-name'] ),
                '_seller_last_name'  => sanitize_text_field( $_REQUEST['seller-last-name'] ),
                '_seller_state'  => sanitize_text_field( $_REQUEST['seller-state'] ),
                '_seller_company'  => sanitize_text_field( $_REQUEST['seller-company'] ),
                '_seller_town'  => sanitize_text_field( $_REQUEST['seller-town'] ),
                '_seller_country'  => sanitize_text_field( $_REQUEST['seller-country'] ),
                '_seller_email'     => sanitize_text_field( $_REQUEST['seller-email'] ),
                '_seller_phone'     => sanitize_text_field( $_REQUEST['seller-phone'] ),
                '_seller_location'      => sanitize_text_field( $_REQUEST['seller-location'] ),
                '_seller_location_lat'  => sanitize_text_field( $_REQUEST['seller-location-lat'] ),
                '_seller_location_long' => sanitize_text_field( $_REQUEST['seller-location-long'] ),
                '_auto_video_code'      => sanitize_text_field( $encode_video ),
                '_thumbnail_id'      => sanitize_text_field( $_REQUEST['_thumbnail_id']),
                'pixad_auto_gallery_video' => sanitize_text_field( $_REQUEST['pixad_auto_gallery_video'] ),
                'pixad_auto_gallery' => sanitize_text_field( $encode_gallery ),
            );

            foreach( $options as $key => $value ) {
                update_post_meta( $post_id, $key, $value );
            }

            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            require_once(ABSPATH . "wp-admin" . '/includes/file.php');
            require_once(ABSPATH . "wp-admin" . '/includes/media.php');

            $attachment_id = media_handle_upload('_thumbnail_id', $post_id);

            if ( is_wp_error( $attachment_id ) ) {
                esc_html_e('Error loading media file.', 'keymoto');
            } else {
                set_post_thumbnail( $post_id, $attachment_id );
            }
            $save_data = $_FILES;
            $gallery_attachments = array();
            if ( $_FILES['gallery_images'] ) {
                $files = $_FILES['gallery_images'];
                foreach ($files['name'] as $key => $value) {
                    if ($files['name'][$key]) {
                        $file = array(
                            'name' => $files['name'][$key],
                            'type' => $files['type'][$key],
                            'tmp_name' => $files['tmp_name'][$key],
                            'error' => $files['error'][$key],
                            'size' => $files['size'][$key]
                        );
                        $_FILES = array ('gallery_images' => $file);
                        foreach ($_FILES as $file => $array) {
                            $gallery_attachments[] = keymoto_handle_attachment($file, $post_id);
                        }
                    }
                }

            }
            if(!empty($gallery_attachments)) {
                $encode = json_encode($gallery_attachments);
                update_post_meta($post_id, 'pixad_auto_gallery', $encode);
            }

            $_FILES = $save_data;
            $id_video = '';
            if ( $_FILES['gallery_video'] ) {
                $files = $_FILES['gallery_video'];
                foreach ($files['name'] as $key => $value) {
                    if ($files['name'][$key]) {
                        $file = array(
                            'name' => $files['name'][$key],
                            'type' => $files['type'][$key],
                            'tmp_name' => $files['tmp_name'][$key],
                            'error' => $files['error'][$key],
                            'size' => $files['size'][$key]
                        );
                        $_FILES = array ('gallery_video' => $file);
                        foreach ($_FILES as $file => $array) {
                            $id = (int)keymoto_handle_attachment($file, $post_id);
                            $id_video .= $id . ',';
                        }
                    }
                }

            }
            if(!empty($id_video)) {
                update_post_meta($post_id, 'pixad_auto_gallery_video', $id_video);
            }
            $Settings   = new PIXAD_Settings();
            $options    = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );
            keymoto_add_car_notice_admin($post_id);
            $auto_listing_page = isset($options['autos_listing_car_page']) ? $options['autos_listing_car_page'] : false;
            if(!empty($auto_listing_page)){
                wp_redirect(get_permalink($auto_listing_page) . '?add=ok');
            }else{
                wp_redirect('car-waiting-for-review');
            }
        } else {
            wp_redirect($_REQUEST['_wp_http_referer']);
        }

    }
}
add_action( 'admin_post_auto_upload_form', 'keymoto_auto_upload' );

function keymoto_auto_update() {

    $cur_user_id = get_current_user_id();


    if (  isset($_REQUEST['submit']) && isset( $_REQUEST['seller_auto_upload_nonce'] ) && wp_verify_nonce( $_REQUEST['seller_auto_upload_nonce'], 'seller_auto_upload' ) && $cur_user_id ){

        if(function_exists('pix_autodealer_output_info')){
            $auto_description = pix_autodealer_output_info($_REQUEST['auto-description']);
        }


        $post_id = sanitize_text_field($_REQUEST['auto_id']);

        // This will redirect you to the newly created post
        $post = get_post($post_id);
        if ($post_id) {

            if($_REQUEST['auto-make'] != ''){
                wp_set_object_terms( $post_id, $_REQUEST['auto-make'], 'auto-model', false );
            }

            if(!empty($_REQUEST['auto-body'])){
                wp_set_object_terms( $post_id, $_REQUEST['auto-body'], 'auto-body', false );
            }

            if(!empty($_REQUEST['auto-equipment'])){
                wp_set_object_terms( $post_id, $_REQUEST['auto-equipment'], 'auto-equipment', false );
            }
            $encode_gallery = '';

            $encode_video = '';

            if ((isset($_REQUEST['content']) || isset($_REQUEST['auto-post-title'])) && $_REQUEST['auto-post-title'] !== '') {
                $new_post = array();
                $new_post['ID'] = $post_id;
                $new_post['post_title'] = sanitize_text_field($_REQUEST['auto-post-title']);
                $new_post['post_content'] = sanitize_text_field( $_REQUEST['content']);
                wp_update_post( wp_slash($new_post) );
            }



            $options = array(
                '_auto_year'      => sanitize_text_field( $_REQUEST['auto-year'] ),
                '_auto_doors'      => sanitize_text_field( $_REQUEST['auto-doors'] ),
                '_auto_version'      => sanitize_text_field( $_REQUEST['auto-version'] ),
                '_auto_transmission'  => sanitize_text_field( $_REQUEST['auto-transmission'] ),
                '_auto_fuel'      => sanitize_text_field( $_REQUEST['auto-fuel'] ),
                '_auto_price'     => sanitize_text_field( $_REQUEST['auto-price'] ),
                '_auto_mileage'     => sanitize_text_field( $_REQUEST['auto-mileage'] ),
                '_auto_engine'      => sanitize_text_field( $_REQUEST['auto-engine'] ),
                '_auto_warranty'      => sanitize_text_field( $_REQUEST['auto-warranty'] ),
                '_auto_vin'      => sanitize_text_field( $_REQUEST['auto-vin'] ),
                '_auto_horsepower'      => sanitize_text_field( $_REQUEST['auto-horsepower'] ),
                '_auto_seats'      => sanitize_text_field( $_REQUEST['auto-seats'] ),
                '_auto_condition'      => sanitize_text_field( $_REQUEST['auto-condition'] ),
                '_auto_purpose'      => sanitize_text_field( $_REQUEST['auto-purpose'] ),
                '_auto_drive'      => sanitize_text_field( $_REQUEST['auto-drive'] ),
                '_auto_color'      => sanitize_text_field( $_REQUEST['auto-color'] ),
                '_auto-_color_int'      => sanitize_text_field( $_REQUEST['auto-color-int'] ),
                '_seller_first_name'  => sanitize_text_field( $_REQUEST['seller-first-name'] ),
                '_seller_last_name'  => sanitize_text_field( $_REQUEST['seller-last-name'] ),
                '_seller_state'  => sanitize_text_field( $_REQUEST['seller-state'] ),
                '_seller_company'  => sanitize_text_field( $_REQUEST['seller-company'] ),
                '_seller_town'  => sanitize_text_field( $_REQUEST['seller-town'] ),
                '_seller_country'  => sanitize_text_field( $_REQUEST['seller-country'] ),
                '_seller_email'     => sanitize_text_field( $_REQUEST['seller-email'] ),
                '_seller_phone'     => sanitize_text_field( $_REQUEST['seller-phone'] ),
                '_seller_location'      => sanitize_text_field( $_REQUEST['seller-location'] ),
                '_seller_location_lat'  => sanitize_text_field( $_REQUEST['seller-location-lat'] ),
                '_seller_location_long' => sanitize_text_field( $_REQUEST['seller-location-long'] ),
                '_auto_video_code'      => sanitize_text_field( $encode_video ),
                '_thumbnail_id'      => sanitize_text_field( $_REQUEST['_thumbnail_id']),
                'pixad_auto_gallery_video' => sanitize_text_field( $_REQUEST['pixad_auto_gallery_video'] ),
                'pixad_auto_gallery' => sanitize_text_field( $encode_gallery ),
            );

            foreach( $options as $key => $value ) {
                update_post_meta( $post_id, $key, $value );
            }

            require_once(ABSPATH . "wp-admin" . '/includes/image.php');
            require_once(ABSPATH . "wp-admin" . '/includes/file.php');
            require_once(ABSPATH . "wp-admin" . '/includes/media.php');

            $attachment_id = media_handle_upload('auto-image', $post_id);

            if ( is_wp_error( $attachment_id ) ) {
                esc_html_e('Error loading media file.', 'keymoto');
            } else {
                set_post_thumbnail( $post_id, $attachment_id );
            }

            $gallery_attachments = array();
            if ( $_FILES['gallery_images'] ) {
                $files = $_FILES['gallery_images'];
                foreach ($files['name'] as $key => $value) {
                    if ($files['name'][$key]) {
                        $file = array(
                            'name' => $files['name'][$key],
                            'type' => $files['type'][$key],
                            'tmp_name' => $files['tmp_name'][$key],
                            'error' => $files['error'][$key],
                            'size' => $files['size'][$key]
                        );
                        $_FILES = array ('gallery_images' => $file);
                        foreach ($_FILES as $file => $array) {
                            $gallery_attachments[] = keymoto_handle_attachment($file, $post_id);
                        }
                    }
                }

            }

            if(!empty($gallery_attachments)) {
                $encode = json_encode($gallery_attachments);
                update_post_meta($post_id, 'pixad_auto_gallery', $encode);
            }

            wp_redirect($_REQUEST['_wp_http_referer']);
        } else {
            wp_redirect($_REQUEST['_wp_http_referer']);
        }

    }
}
add_action( 'admin_post_auto_update_form', 'keymoto_auto_update' );

function keymoto_ASCSort($f1,$f2){
    if($f1->name < $f2->name) return -1;
    elseif($f1->name > $f2->name) return 1;
    else return 0;
}

function keymoto_handle_attachment($file_handler, $post_id, $set_thu=false) {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload( $file_handler, $post_id );

    return $attach_id;
}


function keymoto_get_image_id($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
    return isset($attachment[0]) ? $attachment[0] : '';
}


//filters pages
add_filter( 'display_post_states', 'keymoto_add_display_post_states', 15, 2 );
add_filter( 'theme_page_templates', 'keymoto_hide_cpt_archive_templates' , 15, 3 );
add_filter( 'template_include', 'keymoto_template_loader' );

function keymoto_add_display_post_states( $post_states, $post ) {
    if(class_exists('PIXAD_Settings')){
        $Settings   = new PIXAD_Settings();
        $options    = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );

        $auto_sell_page = isset($options['autos_sell_car_page']) ? $options['autos_sell_car_page'] : false;
        $auto_listing_page = isset($options['autos_listing_car_page']) ? $options['autos_listing_car_page'] : false;
        $auto_update_page = isset($options['autos_update_car_page']) ? $options['autos_update_car_page'] : false;
        $auto_my_page = isset($options['autos_my_cars_page']) ? $options['autos_my_cars_page'] : false;

        if ($post->ID == $auto_sell_page){
            $post_states['wc_page_for_shop'] = esc_attr__( 'Sell Your Car Page', 'keymoto' );
        }elseif($post->ID == $auto_listing_page){
            $post_states['wc_page_for_shop'] = esc_attr__( 'Listing Car Page', 'keymoto' );
        }elseif($post->ID == $auto_update_page){
            $post_states['wc_page_for_shop'] = esc_attr__( 'Car Update Page', 'keymoto' );
        }elseif($post->ID == $auto_my_page){
            $post_states['wc_page_for_shop'] = esc_attr__( 'My Cars Page', 'keymoto' );
        }
    }

    return $post_states;
}

function keymoto_hide_cpt_archive_templates( $page_templates, $theme, $post ) {
    if(class_exists('PIXAD_Settings')){
        $Settings   = new PIXAD_Settings();
        $options    = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );

        $auto_sell_page = isset($options['autos_sell_car_page']) ? $options['autos_sell_car_page'] : false;
        $auto_listing_page = isset($options['autos_listing_car_page']) ? $options['autos_listing_car_page'] : false;
        $auto_update_page = isset($options['autos_update_car_page']) ? $options['autos_update_car_page'] : false;
        $auto_my_page = isset($options['autos_my_cars_page']) ? $options['autos_my_cars_page'] : false;

        if ( $post && (int)$auto_sell_page === absint( $post->ID ) ) {
            $page_templates = array();
        }elseif($post && (int)$auto_listing_page === absint( $post->ID )){
            $page_templates = array();
        }elseif($post && (int)$auto_update_page === absint( $post->ID )){
            $page_templates = array();
        }elseif($post && (int)$auto_my_page === absint( $post->ID )){
            $page_templates = array();
        }
    }
    return $page_templates;
}


function keymoto_template_loader( $template ) {
    if(class_exists('PIXAD_Settings')){
        $Settings   = new PIXAD_Settings();
        $options    = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );

        $auto_sell_page = isset($options['autos_sell_car_page']) ? $options['autos_sell_car_page'] : false;
        $auto_listing_page = isset($options['autos_listing_car_page']) ? $options['autos_listing_car_page'] : false;
        $auto_update_page = isset($options['autos_update_car_page']) ? $options['autos_update_car_page'] : false;
        $auto_my_page = isset($options['autos_my_cars_page']) ? $options['autos_my_cars_page'] : false;

        $object = get_queried_object();

        if ( is_embed() ) {
            return $template;
        }

        if(!empty($object) && !empty($object->ID) ){
            if ($object->ID == (int)$auto_sell_page){
                $template = locate_template('auto-load.php');
            }elseif($object->ID == (int)$auto_update_page){
                $template = locate_template('auto-update.php');
            }elseif($object->ID == (int)$auto_listing_page){
                $template = locate_template('autos.php');
            }elseif($object->ID == (int)$auto_my_page){
                $template = locate_template('autos-user.php');
            }
        }

    }
    return $template;
}
// добавить поле, инфо добавления авто
function keymoto_add_car_notice_admin($auto_id){
    $id = (int)$auto_id;
    if(!empty($id)){
        $str = '';
        if(!empty(get_option('notice_admin_auto'))){
            $str = get_option('notice_admin_auto');
        }
        $str .= $id . ',';
        update_option('notice_admin_auto', $str);
    }
}
// предупредить админа о создании нового авто
add_action('admin_notices', function(){

    $str_ids = get_option('notice_admin_auto');
    $html = '';
    $url  = [];
    $new_ids = [];
    $str_new_ids = '';
    if(!empty($str_ids)){
        $ids = explode(',', $str_ids);
        if(!empty($ids)){
            foreach( $ids as $id ){
                $cur_id = (int) $id;
                if(!empty($cur_id)){
                    $post = get_post($cur_id);
                    if($post->post_status === 'pending'){
                        $new_ids[] = $cur_id;
                        $html .= '<li class="notice-admin-pending"><a href="'.get_permalink($cur_id).'">'.$post->post_title.'</li></a>';
                    }
                }
            }
        }
    }
    if(!empty($new_ids)){
        foreach ($new_ids as  $id) {
            $str_new_ids .=  $id . ',';
        }
    }
    update_option('notice_admin_auto', $str_new_ids);
    if(!empty($html)){
        echo '<div class="update-nag"><p>'.esc_attr__('The post waiting for the approval of the administrator', 'keymoto').'.</p><ul>'.$html.'</ul></div>';
    }

});



// шаблон вывода select полей
function keymoto_temp_select_cond($field, $validate){
    $show = isset($field['show']) ? $field['show'] : $field['field'].'_show';
    $req = isset($field['show']) ? $field['show'] : $field['field'].'_req';
    $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';
    ?>
    <select name="<?php echo esc_attr($field['field']); ?>" <?php echo isset($validate[$req]) ? 'required' : ''; ?> class="pixad-form-control">
        <option value=""><?php esc_attr_e( '-- Please Select --', 'keymoto' ); ?></option>
        <option value="new" <?php if(pixad_get_meta('_auto_condition')=='new') echo 'selected'; ?>><?php esc_attr__e( 'New', 'keymoto' ); ?></option>
        <option value="used" <?php if(pixad_get_meta('_auto_condition')=='used') echo 'selected'; ?>><?php esc_attr__e( 'Used', 'keymoto' ); ?></option>
        <option value="driver" <?php if(pixad_get_meta('_auto_condition')=='driver') echo 'selected'; ?>><?php esc_attr__e( 'Driver', 'keymoto' ); ?></option>
        <option value="non driver" <?php if(pixad_get_meta('_auto_condition')=='non driver') echo 'selected'; ?>><?php esc_attr__e( 'Non driver', 'keymoto' ); ?></option>
        <option value="projectcar" <?php if(pixad_get_meta('_auto_condition')=='projectcar') echo 'selected'; ?>><?php esc_attr__e( 'Projectcar', 'keymoto' ); ?></option>
        <option value="barnfind" <?php if(pixad_get_meta('_auto_condition')=='barnfind') echo 'selected'; ?>><?php esc_attr__e( 'Barnfind', 'keymoto' ); ?></option>
    </select>
    <?php
}
function keymoto_temp_select_purpose($field, $validate){
    $show = isset($field['show']) ? $field['show'] : $field['field'].'_show';
    $req = isset($field['show']) ? $field['show'] : $field['field'].'_req';
    $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';
    ?>
    <select name="<?php echo esc_attr($field['field']); ?>" <?php echo isset($validate[$req]) ? 'required' : ''; ?> class="pixad-form-control">
        <option value=""><?php  esc_attr__e( '-- Please Select --', 'keymoto' ); ?></option>
        <option value="rent" <?php if(pixad_get_meta('_auto_purpose')=='rent') echo 'selected'; ?>><?php  esc_attr__e( 'Rent', 'keymoto' ); ?></option>
        <option value="experience" <?php if(pixad_get_meta('_auto_purpose')=='experience') echo 'selected'; ?>><?php  esc_attr__e( 'Experience', 'keymoto' ); ?></option>
    </select>
    <?php
}
function keymoto_temp_select_warranty($field, $validate){
    $show = isset($field['show']) ? $field['show'] : $field['field'].'_show';
    $req = isset($field['show']) ? $field['show'] : $field['field'].'_req';
    $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';
    ?>
    <select  name="<?php echo esc_attr($field['field']); ?>" <?php echo isset($validate[$req]) ? 'required' : ''; ?> class="pixad-form-control">
        <option value="no" <?php selected( 'no', pixad_get_meta('_auto_warranty'), true ); ?>><?php  esc_attr__e( 'No', 'keymoto' ); ?></option>
        <option value="yes" <?php selected( 'yes', pixad_get_meta('_auto_warranty'), true ); ?>><?php  esc_attr__e( 'Yes', 'keymoto' ); ?></option>
    </select>
    <?php
}
function keymoto_temp_select_drive($field, $validate){
    $show = isset($field['show']) ? $field['show'] : $field['field'].'_show';
    $req = isset($field['show']) ? $field['show'] : $field['field'].'_req';
    $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';
    ?>
    <select  name="<?php echo esc_attr($field['field']); ?>" <?php echo isset($validate[$req]) ? 'required' : ''; ?> class="pixad-form-control">
        <option value=""><?php  esc_attr__e( '-- Please Select --', 'keymoto' ); ?></option>
        <option value="front" <?php if(pixad_get_meta('_auto_drive')=='front') echo 'selected'; ?>><?php  esc_attr__e( 'Front', 'keymoto' ); ?></option>
        <option value="rear" <?php if(pixad_get_meta('_auto_drive')=='rear') echo 'selected'; ?>><?php  esc_attr__e( 'Rear', 'keymoto' ); ?></option>
        <option value="4x4" <?php if(pixad_get_meta('_auto_drive')=='4x4') echo 'selected'; ?>><?php  esc_attr__e( '4x4', 'keymoto' ); ?></option>
    </select>
    <?php
}
function keymoto_temp_select_doors($field, $validate){
    $show = isset($field['show']) ? $field['show'] : $field['field'].'_show';
    $req = isset($field['show']) ? $field['show'] : $field['field'].'_req';
    $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';
    ?>
    <select  name="<?php echo esc_attr($field['field']); ?>" <?php echo isset($validate[$req]) ? 'required' : ''; ?> class="pixad-form-control">
        <option value=""><?php  esc_attr__e( '-- Please Select --', 'keymoto' ); ?></option>
        <?php pixad_get_options_range( 2, 5, pixad_get_meta('_auto_doors') ); ?>
    </select>
    <?php
}



// вывести поля страницы обновления авто
function keymoto_temp_field_update_car($field, $validate){

    $show = isset($field['show']) ? $field['show'] : $field['field'].'_show';
    $req = isset($field['show']) ? $field['show'] : $field['field'].'_req';
    $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';

    if( isset($validate[$show]) || isset($validate[$req]) ): ?>
        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php echo esc_attr($field['name']) ?> <?php echo isset($validate[$req]) ? '<span class="required-field">*</span>' : ''; ?>
            </label>
            <div class="pixad-control-input">
                <?php if($field['type'] === 'select') : ?>
                    <?php if(!empty($field['temp']) && function_exists($field['temp'])){
                        $field['temp']($field, $validate);
                    } ?>
                <?php endif; ?>
                <?php if($field['type'] === 'text') : ?>
                    <input name="<?php echo esc_attr($field['field']); ?>" type="text" <?php echo isset($validate[$req]) ? 'required' : ''; ?> placeholder="<?php echo esc_attr( $placeholder); ?>" value="<?php echo pixad_get_meta($field['slug']); ?>" class="pixad-form-control">
                    <span class="errengine"></span>
                <?php endif; ?>
            </div>
        </div>
    <?php endif;
}



// фильтр, показывает только свои медиа в wp.media
add_filter( 'ajax_query_attachments_args', 'show_current_user_attachments', 10, 1 );
function show_current_user_attachments( $query = array() ) {
    $user_id = get_current_user_id();
    if(!current_user_can('edit_pages')){
        if( $user_id ) {
            $query['author'] = $user_id;
        }
    }

    return $query;
}


// подгрузить медиа в фронтенд
function keymoto_enqueue_media() {
    wp_enqueue_media();
    wp_enqueue_script('keymoto-upload', get_template_directory_uri() . '/assets/js/custom-upload.js', array() , '1.1', true);
}


