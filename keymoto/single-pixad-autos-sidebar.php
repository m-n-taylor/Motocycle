 <?php /* The Template for displaying all single autos. */
global $post, $PIXAD_Autos;

$Settings = new PIXAD_Settings();
$settings	= $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );
$validate = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_validation', true ); // Get validation settings
$validate = pixad::validation( $validate );
$Auto = new PIXAD_Autos();
$Auto->Query_Args( array('auto_id' => $post->ID) );

$auto_translate = unserialize( get_option( '_pixad_auto_translate' ) );

$has_video = false;

$video_attachments = array();
$videos = pixad_get_attach_video($post->ID);
//$videos = explode(',', $videos[0]);
if(isset($videos[0]) && $videos[0] != '') {
	$video_attachments = get_posts( array(
		'post_type' => 'attachment',
		'include' => $videos[0]
	) );
}

if(count($video_attachments)>0 || pixad_get_external_video($post->ID) != '') {
	$has_video = true;
}

$custom =  get_post_custom($post->ID);
$pix_options = get_option('pix_general_settings');
$pix_dealer_info = get_post_meta( get_the_ID(), 'pixad_auto_dealer_info', true ) != '' ? get_post_meta( get_the_ID(), 'pixad_auto_dealer_info', true ) : 1;
$pix_contact_form = get_post_meta( get_the_ID(), 'pixad_auto_contacts_form', true ) != '' ? get_post_meta( get_the_ID(), 'pixad_auto_contacts_form', true ) : 1;
$pix_auto_form_id = get_post_meta(get_the_ID(), 'pixad_auto_form', true);
$pix_show_calc = get_post_meta( get_the_ID(), 'pixad_auto_calc', true ) != '' ? get_post_meta( get_the_ID(), 'pixad_auto_calc', true ) : 0;
?>
 <div class="col-md-4">
     <aside class="sidebar-auto">


         <?php
         $custom_link = keymoto_get_theme_mod('custom_link',true);
         $custom_link_text = keymoto_get_theme_mod('custom_link_text',true);
         $custom_link_desc = keymoto_get_theme_mod('custom_link_desc',true);
         $target = keymoto_get_theme_mod('target',true);

         $custom_price_car_page = get_post_meta( $post->ID, 'custom_price_car_page', 1 );
         $price_car_page = $custom_price_car_page ? $custom_price_car_page : $Auto->get_price();
         $price_to_check =  $custom_price_car_page ? $custom_price_car_page : $Auto->get_meta('_auto_price');
         if(isset($price_to_check) && $price_to_check == ''){
             $price_car_page_css = 'no_price';
         } else {
             $price_car_page_css = '';
         }


         $Settings = new PIXAD_Settings();
         $options = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );
         $currency = pixad_get_currencies($options['autos_site_currency']);
         $currentTime = new DateTime();
         $pixad_auto_price_season = get_post_meta($post->ID, 'pixad_auto_price_season', []);
         foreach ($pixad_auto_price_season as $key => $price){
             foreach ($price as $p){

                 $date_start = DateTime::createFromFormat('Y-m-d', $p['pixad_auto_price_season_start']);
                 $date_end = DateTime::createFromFormat('Y-m-d', $p['pixad_auto_price_season_end']);
                 $date_start->getTimestamp();
                 $date_end->getTimestamp();
                 $currentTime->getTimestamp();

                 if (($date_start <= $currentTime) && ($currentTime <= $date_end)) {
                     $price_car_page = $currency['symbol'].$p['pixad_auto_price_season_price'] . __('/per day', 'keymoto');
                     $price_car_page .= '<span class="price_description">'. __('Price from ', 'keymoto') . $date_start->format('d F') . __(' to ', 'keymoto') . $date_end->format('d F') . '</span>';
                 }
             }
         }


         ?>
         <?php if(isset($custom_link) && $custom_link != '' && isset($custom_link_text) && $custom_link_text != ''){?>
         <section class="widget widget-custom-link">

             <span class="car-details__price-inner"><?php echo wp_kses_post($price_car_page); ?></span>


             <?php if(isset($custom_link_desc) && $custom_link_desc != ''){?>
             <div class="keymoto-custom-link-desc">
                 <?php echo wp_kses_post($custom_link_desc);?>
             </div>
             <?php } ?>
             <?php
                 if(in_array('open_in_new', $target)){
                    // echo 'opne';
                     $target = 'target="_blank"';
                 } else {
                     $target = '';
                 }
                 ?>
             <a class="keymoto-custom-link" href="<?php echo esc_url($custom_link)?>" <?php echo esc_attr($target);?>>
                 <?php echo esc_html($custom_link_text);?>
             </a>
         </section>
         <?php } ?>



         <?php do_action('keymoto_booking_auto_table', $post->ID);?>
         <?php if (class_exists('Pixad_Booking_AUTO') and keymoto_get_theme_mod('booking_car',true) == 'show'){?>
         <section class="booking-widget-wrap">
             <div id="booking_car_info" class="booking_car_info">
                 <?php do_action('keymoto_end_auto', $post); ?>
             </div>
         </section>
         <?php } else { ?>
         <div class="auto-price-info">
             <?php if( $validate['auto-price_show'] && $PIXAD_Autos->get_meta('_auto_price') ): ?>
             <?php $price = is_numeric($PIXAD_Autos->get_meta('_auto_price')) || $PIXAD_Autos->get_meta('_auto_price') == '' ? $PIXAD_Autos->get_price() : $auto_translate[$PIXAD_Autos->get_price()]; ?>
             <div class="car-price">
                 <span class="price-detail fl-font-style-semi-bolt fl-primary-color"><?php
                            if(function_exists('pix_autodealer_output_info')){
                                echo pix_autodealer_output_info($price);
                            }?></span>

                 <?php
                 $payment_text = keymoto_get_theme_mod('after_payment_text');
                 if(keymoto_get_theme_mod('after_payment_text',true)){
                     $payment_text = keymoto_get_theme_mod('after_payment_text',true);
                 }
                 ?>
                 <?php if(!empty($payment_text)){?>
                 <div class="bottom-price-text"><?php echo esc_html($payment_text); ?></div>
                 <?php } ?>
             </div>
             <?php endif; ?>
         </div>
         <?php } ?>


         <?php if(keymoto_get_theme_mod('booking_car_review_calendar',true) =='show'){
                                do_action('keymoto_preview_calendar', $post->ID);}
                           ?>

         <?php if ($pix_dealer_info !=0) :
            $author_id = get_the_author_meta( 'ID' );
            $udata = get_userdata( get_the_author_meta( 'ID' ) );
            $author_registration = $udata->user_registered;
            $message =   esc_html__('Member since: ','keymoto') . date( "F Y", strtotime( $author_registration ) );
            ?>
         <div class="dealer-info">
             <?php if(keymoto_get_theme_mod('car_promo_image')){?>
             <div class="promo-images-wrap">
                 <?php echo '<div class="payment-image-wrap"><img src="'.keymoto_get_theme_mod('car_promo_image').'" alt="'.esc_attr__('Promo image', 'keymoto').'"></div>';?>
             </div>
             <?php } ?>

             <div class="dealer-top-info">
                 <div class="left"><?php echo get_avatar( esc_attr($author_id), '110'); ?>

                 </div>
                 <div class="right">
                     <div class="top fl-font-style-semi-bolt dealer-name">
                         <?php
                            if($Auto->get_meta('_seller_first_name') or $Auto->get_meta('_seller_last_name')){
                                echo '<span class="author-first-name">'.$Auto->get_meta('_seller_first_name').'</span>';
                                echo '<span class="author-last-name">'.$Auto->get_meta('_seller_last_name').'</span>';
                            }else{
                                echo get_the_author();
                            }?></div>





                     <div class="bottom"><?php echo esc_attr($message);?></div>


                     <div class="social-info">
                         <ul>
                             <?php if(get_the_author_meta('twitter')){ ?>
                             <li>
                                 <a target="_blank" class="fl-secondary-color-hv" href="<?php the_author_meta('twitter'); ?>">
                                     <i class="fa fa-twitter"></i>
                                 </a>
                             </li>
                             <?php } ?>
                             <?php if(get_the_author_meta('facebook')){ ?>
                             <li>
                                 <a target="_blank" class="fl-secondary-color-hv" href="<?php the_author_meta('facebook'); ?>">
                                     <i class="fa fa-facebook"></i>
                                 </a>
                             </li>
                             <?php } ?>
                             <?php if(get_the_author_meta('linked')){ ?>
                             <li>
                                 <a target="_blank" class="fl-secondary-color-hv" href="<?php the_author_meta('linked'); ?>">
                                     <i class="fa fa-linkedin"></i>
                                 </a>
                             </li>
                             <?php } ?>

                             <?php if(get_the_author_meta('instagram')){ ?>
                             <li>
                                 <a target="_blank" class="fl-secondary-color-hv" href="<?php the_author_meta('instagram'); ?>">
                                     <i class="fa fa-instagram"></i>
                                 </a>
                             </li>
                             <?php } ?>

                             <?php if(get_the_author_meta('pinterest')){ ?>
                             <li>
                                 <a target="_blank" class="fl-secondary-color-hv" href="<?php the_author_meta('pinterest'); ?>">
                                     <i class="fa fa-pinterest-p"></i>
                                 </a>
                             </li>
                             <?php } ?>

                             <?php if(get_the_author_meta('behance')){ ?>
                             <li>
                                 <a target="_blank" class="fl-secondary-color-hv" href="<?php the_author_meta('behance'); ?>">
                                     <i class="fa fa-behance"></i>
                                 </a>
                             </li>
                             <?php } ?>
                         </ul>
                     </div>


                     <?php if(class_exists('Youzify')){ ?>
                     <div class="youzify_profile_link">
                         <?php
                        $user =  get_the_author_meta('login');
                        ?>
                         <a class="youzify_profile_link_button fl-header-btn fl-custom-btn" href="<?php echo esc_url(get_site_url().'/members/'.$user); ?>"><?php echo __('Profile', 'keymoto');?></a>
                     </div>
                     <?php } ?>




                 </div>
             </div>
             <div class="dealer-bottom-info">
                 <div class="email-info">
                     <div class="left-content fl-font-style-regular-two">
                         <i class="fl-custom-icon-chat fl-primary-color"></i>
                     </div>
                     <div class="right-content">
                         <div class="title"><?php echo esc_html__('Contact Via Email','keymoto') ?></div>
                         <?php if(get_the_author_meta('contact-email-address')){ ?>
                         <a class="fl-font-style-medium author-email-address fl-primary-color-hv" href="mailto:<?php the_author_meta('contact-email-address'); ?>">
                             <?php the_author_meta('contact-email-address'); ?>
                         </a>
                         <?php } ?>
                     </div>
                 </div>

                 <div class="phone-info">
                     <div class="left-content fl-font-style-regular-two">
                         <i class="fl-custom-icon-call fl-primary-color"></i>
                     </div>
                     <div class="right-content">
                         <div class="title"><?php echo esc_html__('Contact Via Mobile','keymoto') ?></div>
                         <?php if(get_the_author_meta('phone')){ ?>
                         <span class="fl-font-style-medium author-phone-number fl-primary-color-hv" style="color:#222222;">
                             <?php the_author_meta('phone'); ?>
                         </span>
                         <?php } ?>

                     </div>
                 </div>
             </div>
         </div>
         <?php endif; ?>




         <?php if ( $pix_auto_form_id !=0 && $pix_contact_form) : ?>

         <section class="widget widget-contact-form">
             <h3 class="widget-title fl-font-style-medium">
                 <?php echo esc_html__('Send a message','keymoto')?>
                 <span class="widget--subtitle fl-font-style-lighter-than">
                     <?php echo esc_html__('get in touch via message','keymoto')?>
                 </span>
             </h3>
             <?php echo do_shortcode("[contact-form-7 id=\"$pix_auto_form_id\"]") ?>
         </section>
         <?php endif; ?>


         <?php if($pix_show_calc): ?>
         <?php
     $price_auto = '100000';
     if(is_singular('pixad-autos')){
         $auto_price = $PIXAD_Autos->get_meta('_auto_price');
     }
    $currencies = unserialize( get_option( '_pixad_autos_currencies' ) ); 

		$currency = $currencies[$settings['autos_site_currency']];
		if( !$currency['symbol'] ) $currency['symbol'] = '';
		$price_auto = $auto_price;
    ?>

         <section class="widget widget-calculator">
             <h3 class="widget-title"><i class="theme-fonts-icon_calculator_alt"></i><?php echo esc_html__('Financing Calculator','keymoto')?></h3>

             <div class="widget-content">
                 <div class="keymoto_calculator">
                     <div class="row">
                         <input type="hidden" id="pix-thousand" value="<?php echo esc_attr($settings['autos_thousand']) ?>">
                         <input type="hidden" id="pix-decimal" value="<?php echo esc_attr($settings['autos_decimal']) ?>">
                         <input type="hidden" id="pix-decimal_number" value="<?php echo esc_attr($settings['autos_decimal_number']) ?>">

                         <div class="col-md-12">
                             <div class="form-group">
                                 <div class="labeled fl-font-style-bolt-two"><?php echo esc_html__('Vehicle price','keymoto')?> <span class="orange currency">(<?php echo esc_attr($currency['symbol']); ?>)</span></div>
                                 <input type="text" class="numbersOnly vehicle_price" value="<?php echo esc_attr($price_auto)?>">
                             </div>

                             <div class="row">
                                 <div class="col-md-6 col-sm-6">
                                     <div class="form-group md-mg-rt">
                                         <div class="labeled fl-font-style-bolt-two"><?php echo esc_html__('Interest rate','keymoto')?> <span class="orange">(%)</span></div>
                                         <input type="text" class="numbersOnly interest_rate" value="5">
                                     </div>
                                 </div>
                                 <div class="col-md-6 col-sm-6">
                                     <div class="form-group md-mg-lt">
                                         <div class="labeled fl-font-style-bolt-two"><?php echo esc_html__('Period','keymoto')?> <span class="orange">(<?php echo esc_html__('month','keymoto')?>)</span></div>
                                         <input type="text" class="numbersOnly period_month" value="36">
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="labeled fl-font-style-bolt-two"><?php echo esc_html__('Down Payment','keymoto')?> <span class="orange">(<?php echo esc_attr($currency['symbol']); ?>)</span></div>
                                 <input type="text" class="numbersOnly down_payment" value="10000">
                             </div>

                             <div class="submit-btn-container">
                                 <a href="javascript:void(0)" class="fl-button secondary-button submit-comment keymoto_calculate_btn"><?php echo esc_html__('Calculate Finance','keymoto')?></a>

                             </div>


                             <div class="calculator-alert alert alert-danger">

                             </div>

                         </div>

                         <div class="col-md-12">
                             <div class="keymoto_calculator_results" style="display: block;">
                                 <div class="keymoto_calculator_report">
                                     <dl class="list-descriptions list-unstyled">
                                         <dt class="fl-font-style-semi-bolt"><?php echo esc_html__('Monthly Payment','keymoto')?></dt>
                                         <dd class="monthly_payment fl-font-style-semi-bolt"><span class="currency"></span><span class="val"></span></dd>

                                         <dt class="fl-font-style-semi-bolt"><?php echo esc_html__('Total Interest Payment','keymoto')?></dt>
                                         <dd class="total_interest_payment fl-font-style-semi-bolt"><span class="currency"></span><span class="val"></span></dd>

                                         <dt class="fl-font-style-semi-bolt"><?php echo esc_html__('Total Amount to Pay','keymoto')?></dt>
                                         <dd class="total_amount_to_pay fl-font-style-semi-bolt"><span class="currency"></span><span class="val"></span></dd>
                                     </dl>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <?php endif; ?>
     </aside>
 </div>
