<?php
global $post, $PIXAD_Autos;
$Settings = new PIXAD_Settings();
$settings = $Settings->getSettings('WP_OPTIONS', '_pixad_autos_settings', true);

$validate = $Settings->getSettings('WP_OPTIONS', '_pixad_autos_validation', true); // Get validation settings

$showInList = pixad::getlistviewfields($validate);

$validate = pixad::validation($validate); // Fix undefined index notice


$auto_translate = unserialize(get_option('_pixad_auto_translate'));
?>
<?php while (have_posts()) : the_post(); ?>

<?php
    $comment_args = array('status' => 'approve', 'post_id' => $post->ID,);
    $comments = get_comments($comment_args);
    $post_rating = [];
    foreach ($comments as $comment) {
        $post_rating[] = floatval(get_comment_meta($comment->comment_ID, 'rating', true));
    }
    ?>
<article class="templines-pixad-list-item">
    <div class="entry-content">
        <div class="top-content">
            <div class="left-top-content">
                <?php
                    if (keymoto_get_theme_mod('auto_featured_text',true)):
                        $label_bg = '';
                        if(keymoto_get_theme_mod('auto_featured_text_background',true)){
                            $label_bg = 'background-color:'.keymoto_get_theme_mod('auto_featured_text_background',true).';';
                        }
                        $label_style = ( $label_bg ) ? 'style=' . $label_bg . '' : '';
                        ?>
                <span class="car-label-list fl-font-style-regular" <?php echo esc_attr($label_style);?>><?php echo keymoto_get_theme_mod('auto_featured_text',true); ?></span>
                <?php endif; ?>
                <a href="<?php esc_url(the_permalink()); ?>" class="entry-post-link"></a>
                <?php
                        if (function_exists('compare_cars_settings_page')) {
                            echo '<div class="favorite-car-wrap">';
                            if(empty(get_option('compare_cars_templ')) || empty(get_option('compare_cars_templ')['no_favorite'])) :
                                echo  '<a class="car-favorite" data-id="'.get_the_ID().'" data-action="add-favorite">
                               <span class="add-fvrt"> 
                                  <i class="fa fa-star-o"></i>
                                </span>
                                <span class="rem-fvrt"> 
                                  <i class="fa fa-star-o"></i>
                                </span>
                            </a>';
                            endif;
                            echo '</div>';
                        }?>
                <div class="mask"></div>
                <div class="mask-cross"></div>
                <?php if( has_post_thumbnail() ):
                            echo get_the_post_thumbnail($post->ID, 'keymoto_size_720x600_crop', ["class" => "moto-grid-image"], ['loading' => 'lazy']);
                        else: ?>
                <img class="no-image" src="<?php echo PIXAD_AUTO_URI .'assets/img/no_image.jpg'; ?>" alt="<?php esc_attr_e('No Image','keymoto')?>">
                <?php endif; ?>
            </div>
            <div class="right-top-content">
                <div class="top-entry-right-content">
                    <h3 class="title-list fl-font-style-medium">
                        <?php if (function_exists('pix_autodealer_output_info')) {?>
                        <?php echo pix_autodealer_output_info(get_the_title()); ?>
                        <?php } ?>
                    </h3>
                    <?php if( $validate['auto-price_show'] && $PIXAD_Autos->get_meta('_auto_price') ): ?>
                    <div class="price-content fl-font-style-medium fl-primary-color">
                        <?php if (function_exists('pix_autodealer_output_info')) {?>
                        <span class="list-price"><?php echo pix_autodealer_output_info($PIXAD_Autos->get_price(false)); ?></span>
                        <?php } ?>
                    </div>
                    <?php endif; ?>
                    <div class="category-top-entry-entry-content">
                        <?php
                            $auto_body = get_the_terms( $post->ID , 'auto-body' );
                            if($auto_body !=""){?>
                        <div class="category-container fl-font-style-lighter-than">
                            <div class="category-title">
                                <?php echo esc_html__('Category:','keymoto');?>
                            </div>
                            <div class="category-info">
                                <?php
                                        foreach ( $auto_body as $term ) {
                                            echo esc_html($term->name);
                                        } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="bottom-entry-right-content">
                    <?php if($PIXAD_Autos->get_meta('_auto_year') !=''){?>
                    <div class="main-info-item-wrap">
                        <div class="main-info-item-title fl-font-style-medium">
                            <?php echo esc_html__('YEAR','keymoto');?>
                        </div>
                        <div class="main-bottom-info">
                            <?php echo keymoto_return_text($PIXAD_Autos->get_meta('_auto_year'))?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php
                        $auto_model = get_the_terms( $post->ID , 'auto-model' );
                        if($auto_model !=""){?>
                    <div class="main-info-item-wrap">
                        <div class="main-info-item-title fl-font-style-medium">
                            <?php echo esc_html__('MAKE','keymoto');?>
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
                            <?php echo esc_html__('TYPE','keymoto');?>
                        </div>
                        <div class="main-bottom-info">
                            <?php
                                    foreach ( $auto_body as $term ) {
                                        echo esc_html($term->name);
                                    } ?>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($PIXAD_Autos->get_meta('_auto_transmission') !=''){?>
                    <div class="main-info-item-wrap">
                        <div class="main-info-item-title fl-font-style-medium">
                            <?php echo esc_html__('Transmission','keymoto');?>
                        </div>
                        <div class="main-bottom-info">
                            <?php echo esc_attr($auto_translate[$PIXAD_Autos->get_meta('_auto_transmission')]) ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="bottom-content">
            <div class="list-wrap">
                <!-- Car Details -->


                <ul class="car-list-list">
                    <?php foreach ($showInList as $id => $sideAttribute):

                            $settingName = $showInList[$id]['title'];
                            $settingName = trim($settingName);
                            $id = '_' . $id;
                            $id = str_replace('-', '_', $id);
                            ?>
                    <?php if ($PIXAD_Autos->get_meta($id)): ?>
                    <li class="car-list-item">
                        <?php
                                $val_attr = $PIXAD_Autos->get_meta($id);
                                if (!empty($auto_translate[$val_attr])) {
                                    if ($sideAttribute['icon']) {?>
                        <div class="left-content">
                            <i class="<?php echo esc_html($sideAttribute['icon']) ?>"></i>
                        </div>
                        <?php } ?>
                        <div class="right-content">
                            <div class="title-info">
                                <?php
                                            if ($settingName) {
                                                echo esc_html($auto_translate[$settingName]).": ";
                                            } else {
                                                $customId = substr($id, 1);
                                                $сustomSettingName = $validate[$customId . '_name'];
                                                echo esc_attr($сustomSettingName);
                                            }

                                            ?>
                            </div>
                            <div class="bottom-text-info">
                                <?php
                                            echo esc_html($auto_translate[$val_attr]);
                                            ?>
                            </div>
                        </div>
                        <?php } else { ?>
                        <?php if($sideAttribute['icon']){?>
                        <div class="left-content">
                            <i class="<?php echo esc_html($sideAttribute['icon']) ?>"></i>
                        </div>
                        <?php }?>
                        <div class="right-content">
                            <div class="title-info">
                                <?php

                                            if ($settingName != '') {
                                                echo esc_html($auto_translate[$settingName]).": ";
                                            } else {
                                                $customId = substr($id, 1);
                                                $сustomSettingName = $validate[$customId . '_name'];
                                                echo esc_attr($сustomSettingName);
                                            }

                                            ?>
                            </div>
                            <div class="bottom-text-info">
                                <?php
                                            if ($id == '_auto_mileage') {
                                                echo number_format($PIXAD_Autos->get_meta('_auto_mileage'), 0, '', "{$settings['autos_thousand']}");
                                            } else {
                                                echo esc_html($PIXAD_Autos->get_meta($id));
                                            }
                                            if ($id == '_auto_horsepower') {
                                                echo " ";
                                                esc_html_e('hp', 'keymoto');
                                            } elseif ($id == '_auto_engine') {
                                                echo " ";
                                                esc_html_e('cm3', 'keymoto');
                                            } elseif ($id == '_auto_doors') {
                                                echo " ";
                                                esc_html_e('doors', 'keymoto');
                                            }

                                            ?>
                            </div>
                        </div>
                        <?php } ?>
                    </li>
                    <?php endif; ?>

                    <?php endforeach; ?>

                    <?php if (array_key_exists('auto-date', $showInList) && $validate['auto-date_show'] && get_the_date()): ?>
                    <li><span class="card-list__title"><?php esc_html_e('Updated :', 'keymoto'); ?></span>
                        <span><?php echo get_the_date(); ?></span></li>
                    <?php endif; ?>


                </ul>
                <!-- / Car Details -->
            </div>
        </div>
    </div>
</article>
<?php endwhile; ?>
