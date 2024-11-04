<?php
global $post, $PIXAD_Autos;
$Settings = new PIXAD_Settings();
$settings = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );

$validate = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_validation', true ); // Get validation settings

$showInSidebar = pixad::getsideviewfields($validate);
$validate = pixad::validation( $validate ); // Fix undefined index notice

$auto_translate = unserialize( get_option( '_pixad_auto_translate' ) );
$related = get_posts( array( 'status' => 'approve', 'numberposts' => 3,'post_type' => 'pixad-autos', 'post__not_in' => array($post->ID) ) );

if( $related ){?>
<div class="related-item-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>You May Also Like...</h3>
            </div>
            <?php
             foreach( $related as $post ) {
                setup_postdata($post); ?>
                <div class="col-md-4">
                    <article class="templines-pixad-grid-item">
                        <div class="entry-content">
                            <div class="top-content">
                                <div class="title-content">
                                    <h3 class="title-grid fl-font-style-medium">
                                        <?php if (function_exists('pix_autodealer_output_info')) {?>
                                            <?php echo pix_autodealer_output_info(get_the_title()); ?>
                                        <?php } ?>
                                    </h3>
                                    <?php if(keymoto_get_theme_mod('grid_title_slogan',true)){?>
                                        <div class="fl-font-style-lighter-than title-grid-slogan">
                                            <?php echo esc_html(keymoto_get_theme_mod('grid_title_slogan',true));?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <?php if( $validate['auto-price_show'] && $PIXAD_Autos->get_meta('_auto_price') ): ?>
                                    <div class="price-content fl-font-style-medium fl-primary-color">
                                        <?php if (function_exists('pix_autodealer_output_info')) {?>
                                            <span class="grid-price "><?php echo pix_autodealer_output_info($PIXAD_Autos->get_price(false)); ?></span>
                                        <?php } ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="middle-content">
                                <a href="<?php esc_url(the_permalink()); ?>">
                                    <div class="mask"></div>
                                    <div class="mask-cross"></div>
                                    <?php if( has_post_thumbnail() ):
                                        echo get_the_post_thumbnail($post->ID, 'keymoto_size_720x600_crop', ["class" => "moto-grid-image"], ['loading' => 'lazy']);
                                    else: ?>
                                        <img class="no-image" src="<?php echo PIXAD_AUTO_URI .'assets/img/no_image.jpg'; ?>" alt="<?php esc_attr_e('No Image','keymoto')?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="bottom-content">
                                <div class="bottom-info-top-content">
                                    <?php if($PIXAD_Autos->get_meta('_auto_year') !=''){?>
                                        <div class="main-info-item-wrap">
                                            <div class="main-info-item-title fl-font-style-medium">
                                                <?php echo esc_html__('YEAR','keymoto');?>
                                            </div>
                                            <div class="main-bottom-info"> 
                                                <?php echo keymoto_return_text($PIXAD_Autos->get_meta('_auto_year'));?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    $auto_model = get_the_terms( $post->ID , 'auto-model' );
                                    if($auto_model !=""){?>
                                        <div class="main-info-item-wrap">
                                            <div class="main-info-item-title fl-font-style-medium">
                                                <?php echo esc_html__('TYPE','keymoto');?>
                                            </div>
                                            <div class="main-bottom-info">
                                                <?php
                                                foreach ( $auto_model as $term ) {
                                                    echo esc_html($term->name);
                                                } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    $auto_body = get_the_terms( $post->ID , 'auto-body' );
                                    if($auto_body !=""){?>
                                        <div class="main-info-item-wrap">
                                            <div class="main-info-item-title fl-font-style-medium">
                                                <?php echo esc_html__('MAKE','keymoto');?>
                                            </div>
                                            <div class="main-bottom-info">
                                                <?php
                                                foreach ( $auto_body as $term ) {
                                                    echo esc_html($term->name);
                                                } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="bottom-info-bottom-content">
                                    <ul class="list-grid--info">
                                        <?php foreach ($showInSidebar as $id => $sideAttribute):
                                            $settingName = $showInSidebar[$id]['title'];
                                            $settingName = trim($settingName);
                                            $id='_'.$id; $id = str_replace('-', '_', $id);
                                            if( $PIXAD_Autos->get_meta($id) ): ?>
                                                <li class="list-grid-item">
                                                    <?php if($sideAttribute['icon'] !='autofont-cars'){?>
                                                        <div class="icon-content">
                                                            <i class="<?php echo esc_html($sideAttribute['icon'])?>"></i>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="text-content-wrap">
                                                        <div class="fl-font-style-lighter-than text-content-title">
                                                            <?php
                                                            if ($settingName) {
                                                                echo esc_html($auto_translate[$settingName]).": ";
                                                            } else {
                                                                $customId = substr($id, 1);
                                                                $сustomSettingName = $validate[$customId . '_name'];
                                                                echo esc_attr($сustomSettingName);

                                                            }?>
                                                        </div>
                                                        <div class="text-content">
                                                            <?php $val_attr =  $PIXAD_Autos->get_meta($id);
                                                            if(!empty($auto_translate[$val_attr])  ){
                                                                echo esc_html($auto_translate[$val_attr]);
                                                            }else{
                                                                echo esc_html($PIXAD_Autos->get_meta($id));
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endif;
                                        endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php }
            wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php } ?>
