<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Template Name: Sell your car page
 */

global  $field_car;
$Settings = new PIXAD_Settings();
$validate = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_validation', true ); // Get validation settings
$options = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );
$auto_validate = $validate;
$strict_auth = !(is_user_logged_in() || !empty($options['autos_reg_user']));
$form_url = admin_url('admin-post.php');
$form_action = 'auto_upload_form';
$autos_demo_mode =   isset( $options['autos_demo_mode'] ) ? $options['autos_demo_mode'] : '';

if($strict_auth){
    auth_redirect();
}else{
    if(!is_user_logged_in()){
        $form_url = get_permalink();
        $form_action = 'auto_upload_form_front';

    }
}

$custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
$layout = isset ($custom['pix_page_layout']) ? $custom['pix_page_layout'][0] : '2';
$sidebar = isset ($custom['pix_selected_sidebar'][0]) ? $custom['pix_selected_sidebar'][0] : 'sidebar-1'; //<?php echo esc_url( admin_url('admin-post.php') );
if ( !is_active_sidebar($sidebar) ) $layout = '1';
if(empty($autos_demo_mode)){
    add_action( 'wp_enqueue_scripts', 'keymoto_enqueue_media' );
}

?>

<?php get_header();?>
    <section class="page-content" id="pageContent">
        <div class="container">
            <div class="row">
                	<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 sidebar-sticky">
						<aside class="b-submit__aside">
							<div class="b-submit__aside-step step01 m-active">
								<h3><?php esc_html_e( 'Step 1', 'keymoto' ); ?></h3>
								<div class="b-submit__aside-step-inner m-active clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-car"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4><?php esc_html_e( 'Add your Vehicle', 'keymoto' ); ?></h4>
										<p><?php esc_html_e( 'Select your vehicle and add info', 'keymoto' ); ?></p>
										<div class="b-submit__aside-step-inner-info-triangle"></div>
									</div> 
								</div>
                               
							</div>
							<div class="b-submit__aside-step step02">
								<h3><?php esc_html_e( 'Step 2', 'keymoto' ); ?></h3>
                             
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-list-ul"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4><?php esc_html_e( 'select details', 'keymoto' ); ?></h4>
										<p><?php esc_html_e( 'Choose vehicle specifications', 'keymoto' ); ?></p>
                                        <div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
                                 
							</div>
							<div class="b-submit__aside-step step03">
								<h3><?php esc_html_e( 'Step 3', 'keymoto' ); ?></h3>
                  
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-photo"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4><?php esc_html_e( 'Photos and videos', 'keymoto' ); ?></h4>
										<p><?php esc_html_e( 'Add images / videos of vehicle', 'keymoto' ); ?></p>
                                        <div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
                      
							</div>
							<div class="b-submit__aside-step step04">
								<h3><?php esc_html_e( 'Step 4', 'keymoto' ); ?></h3>
                     
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-user"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4><?php esc_html_e( 'Contact details', 'keymoto' ); ?></h4>
										<p><?php esc_html_e( 'Vehicle Owner Details', 'keymoto' ); ?></p>
                                        <div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
                  
							</div>
							<div class="b-submit__aside-step step05">
								<h3><?php esc_html_e( 'Step 5', 'keymoto' ); ?></h3>
                          
								<div class="b-submit__aside-step-inner clearfix">
									<div class="b-submit__aside-step-inner-icon">
										<span class="fa fa-globe"></span>
									</div>
									<div class="b-submit__aside-step-inner-info">
										<h4><?php esc_html_e( 'SUBMIT / PUBLISH', 'keymoto' ); ?></h4>
										<p><?php esc_html_e( 'Submit Vehicle Info', 'keymoto' ); ?></p>
                                        <div class="b-submit__aside-step-inner-info-triangle"></div>
									</div>
								</div>
                         
							</div>
						</aside>
					</div>
                

    
           <div class="pixad-control-input col-md-8 col-sm-12 col-xs-12">

                    <form enctype="multipart/form-data" method="post" action="<?php echo esc_url( $form_url );?>">

                        <input type="hidden" name="action" value="<?php echo esc_attr($form_action) ?>">
                        
                        
                       <?php  get_template_part( 'template-parts/fields/auto-fields'); ?>
                       
                        <section class="step-section" id="step02">
                         <div class="col-md-12 col-xs-12" >

                        <div class="pixad-form-group">
                            <label class="pixad-control-label">
                                <?php esc_html_e( 'Body Style', 'keymoto' ); ?>
                            </label>
                            <div class="pixad-control-input">
                            <?php
                                $args_body = array( 'taxonomy' => 'auto-body', 'hide_empty' => '0');
                                $auto_body_cat = get_categories($args_body);
                                $body_out = '';
                                foreach ($auto_body_cat as $category) {
                                    $figure = $body_class = '';
                                    if (is_object($category)) {
                                        $t_id = $category->term_id;
                                        $auto_cat_meta = get_option("auto_body_$t_id");
                                        $auto_cat_thumb_url = get_option("pixad_body_thumb$t_id");


                    if(isset($auto_t_id) && $auto_t_id != ''){
                        $auto_cat_thumb_filter_url = get_option("pixad_body_thumb_filter$auto_t_id");

                    }
                    if(isset($auto_cat_thumb_filter_url) && $auto_cat_thumb_filter_url != '') {
                        if($auto_cat_thumb_filter_url){
                            $img_src = wp_get_attachment_image_src( attachment_url_to_postid( $auto_cat_thumb_filter_url ), 'keymoto-body-thumb' );
                            $figure = '<img  src="'.esc_url($img_src[0]).'" alt="'.esc_attr($auto_body->name).'">';

                        }
                    }


                                        elseif($auto_cat_thumb_url){
                                            $img_src = wp_get_attachment_image_src( attachment_url_to_postid( $auto_cat_thumb_url ), 'medium' );
                                            $figure = '<img  src="'.esc_url($img_src[0]).'" alt="'.esc_attr($category->name).'">';
                                            $body_class = 'pixad-body-image';
                                        } elseif(isset($auto_cat_meta['pixad_body_icon'])){
                                            $figure = '<i class="icon '. esc_attr($auto_cat_meta['pixad_body_icon']) .'"></i>';
                                            $body_class = 'pixad-body-icon';
                                        }
                                        $body_out .= '<li class="pixad-exist pixad-body-upload '.esc_attr($body_class).'"> <input type="checkbox" name="auto-body[]" id="'.esc_attr($category->slug).'" value="'.esc_attr($category->slug).'"><label for="'.esc_attr($category->slug).'">' .wp_kses_post($figure) .' <span>'. wp_kses_post($category->name) . '</span></label> </li>';
                                    }
                                }
                                if( $body_out != '')
                                    echo '<ul class="pixad-form-control pixad-features-list pixad-features-upload pixad-body-styles">'.($body_out).'</ul>';
                            ?>
                            </div>
                        </div>

                        <div class="pixad-form-group">
                            <label class="pixad-control-label">
                                <?php esc_html_e( 'Car Equipment', 'keymoto' ); ?>
                            </label>
                            <div class="pixad-control-input">
                            <?php
                                $args_eq = array( 'taxonomy' => 'auto-equipment', 'hide_empty' => '0');
                                $auto_equipment_cat = get_categories($args_eq);
                                $equip_out = '';
                                foreach ($auto_equipment_cat as $category) {
                                    if (is_object($category)) {
                                        $t_id = $category->term_id;
                                        $equipment_icon = get_option("auto_equipment_icon_$t_id");
                                        $class_icon_set = $equipment_icon != '' ? 'equipment-icon-set' : '';
                                        $feature_icon = $equipment_icon != '' ? '<i class="icon '.esc_attr($equipment_icon).'"></i>' : '';
                                        $equip_out .= '<li class="pixad-exist '.esc_attr($class_icon_set).'"> <input type="checkbox" name="auto-equipment[]" id="'.esc_attr($category->slug).'" value="'.esc_attr($category->slug).'"><label for="'.esc_attr($category->slug).'">' . wp_kses_post($feature_icon.$category->name) . '</label> </li>';
                                    }
                                }
                                if( $equip_out != '')
                                    echo '<ul class="pixad-form-control pixad-features-list pixad-features-upload">'.($equip_out).'</ul>';
                            ?>
                            </div>
                        </div>

                </div>
                            
                            
                            
                        </section>
                        
                        

                    <section class="step-section" id="step03">
                      <div class="col-md-12 col-xs-12" >
                        <div class="pixad-form-group">
                            <label class="pixad-control-label">
                                <?php esc_html_e( 'Main photo', 'keymoto' ); ?>
                            </label>
                            <?php 
                            $manage_gallery = __('Manage gallery', 'keymoto');
                            $clear_gallery  = __('Clear gallery', 'keymoto');
                            if(is_user_logged_in()){
                                $html = '<input id="_thumbnail_id" type="hidden" name="_thumbnail_id" value="-1" />';
                                $html .= '<input id="manage_thumbnail_id" title="'.esc_html($manage_gallery).'" type="button" value="'.esc_html($manage_gallery).'" />';
                                $html .= '<input id="clear_thumbnail_id" title="'.esc_html($clear_gallery).'" type="button" value="'.esc_html($clear_gallery).'" />';
                                echo wp_specialchars_decode($html);
                            }else{
                                $html = '<label style="-webkit-appearance: button;cursor: pointer;border: 1px solid #ddd;background: #ddd;padding: 10px 20px;margin: 0 10px 15px 0;text-transform: uppercase;font-size: 11px;" class="custom-file-upload">
                                    <input style="display:none" name="_thumbnail_id" id="_thumbnail_id" type="file"  accept="image/*" />
                                                 '.esc_html($manage_gallery).'
                                            </label>';
                                echo wp_specialchars_decode($html);
                            }

                             ?>
                             <?php if (!empty($autos_demo_mode)): ?>
                                    <div class="pixad-autos">
                                        <span class="pixad-text-warning"><?php esc_attr_e('Uploading images is disabled in demo mode', 'keymoto'); ?></span>
                                    </div>
                            <?php endif ?>
                        </div>

                        <div class="pixad-form-group">
                            <label class="pixad-control-label"><?php esc_html_e( 'Gallery photos', 'keymoto' ); ?></label>
                            <div class="pixad-control-input">

                            <?php 
                            if (is_user_logged_in()) {
                                if(isset($values['pixad_auto_gallery'])) {
                                    $ids = json_decode($values['pixad_auto_gallery'][0]);
                                }
                                else {
                                    $ids = array();
                                }
                                $cs_ids = is_array($ids) ? implode(",", $ids) : '';
                                $html  = do_shortcode('[gallery ids="'.$cs_ids.'"]');
                                $html .= '<input id="pixad_auto_gallery_ids" type="hidden" name="pixad_auto_gallery_ids" value="-1" />';
                                $html .= '<input id="manage_gallery" title="'.esc_html($manage_gallery).'" type="button" value="'.esc_html($manage_gallery).'" />';
                                $html .= '<input id="clear_gallery" title="'.esc_html($clear_gallery).'" type="button" value="'.esc_html($clear_gallery).'" />';
                                echo wp_specialchars_decode($html);

                            } else {
                                    
                                $html  = '<label style="-webkit-appearance: button;cursor: pointer;border: 1px solid #ddd;background: #ddd;padding: 10px 20px;margin: 0 10px 15px 0;text-transform: uppercase;font-size: 11px;" class="custom-file-upload">
                                            <input style="display:none" name="files-image[]" type="file" multiple accept="image/*">
                                             '.esc_html($manage_gallery).'
                                        </label>';
                               echo wp_specialchars_decode($html);
                            }
                             ?>
                            <?php if (!empty($autos_demo_mode)): ?>
                                    <div class="pixad-autos">
                                        <span class="pixad-text-warning"><?php esc_attr_e('Uploading images is disabled in demo mode', 'keymoto'); ?></span>
                                    </div>
                            <?php endif ?>


                            </div>
                        </div>
                        <div class="pixad-form-group">
                            <?php $video = wp_unslash( json_decode(pixad_get_meta('_auto_video_code')));?>
                            <label class="pixad-control-label">
                                <?php esc_html_e( 'YouTube Video URL', 'keymoto' ); ?>
                            </label>
                            <div class="pixad-control-input">
                                <input type="text" class="regular-text pixad-form-control" placeholder="<?php esc_html_e( 'Please Enter A Hosted Video URL Of Your Vehicle', 'keymoto' ); ?>" name="auto_video_code" id="auto_video_code" value="<?php echo esc_attr( $video); ?>">
                            </div>
                        </div>
                        <?php wp_nonce_field( 'seller_auto_upload', 'seller_auto_upload_nonce' ); ?>
                      </div>
                    </section>
                        
                        
                    <?php  get_template_part( 'template-parts/fields/seller-fields'); ?>
                    
                        
                        
                        
                    <section class="step-section" id="step05">
                        
                        
                    <div class="col-md-12 col-xs-12">

                        <div class="pixad-form-group">
                            <label class="pixad-control-label">
                                <?php esc_html_e( 'Description', 'keymoto' ); ?>
                            </label>
                            <div class="pixad-control-input">
                                <textarea name="content" placeholder="<?php esc_html_e( 'Car Info', 'keymoto' ); ?>" class="pixad-form-control"></textarea>
                            </div>
                            
                            <div class="pixad-control-input">
                                <input type="submit" name="submit" value="<?php esc_html_e( 'Submit', 'keymoto' ); ?>">
                            </div>
                            
                            
                        </div>
                              
                        
                         </div>
                              
                        </section>
                        

                    </div>

                    </form>

    
                </div>

               
          
            </div>
        </div>
    </section>



<?php get_footer(); ?>