<?php /* The Template for displaying all single autos. */
global $post, $PIXAD_Autos, $PIXAD_Country;
$Settings = new PIXAD_Settings();
$settings = $Settings->getSettings('WP_OPTIONS', '_pixad_autos_settings', true);
$validate = $Settings->getSettings('WP_OPTIONS', '_pixad_autos_validation', true); // Get validation settings
$validate = pixad::validation($validate);
$PIXAD_Autos->Query_Args(array('auto_id' => $post->ID));

$custom = get_post_custom(get_queried_object()->ID);
$layout = get_post_meta($post->ID, 'pixad_auto_sidebar_layout', true) != '' ? get_post_meta($post->ID, 'pixad_auto_sidebar_layout', true) : 'right';

$pix_options = get_option('pix_general_settings');
$auto_translate = unserialize(get_option('_pixad_auto_translate'));
 

$Auto = new PIXAD_Autos();
$Auto->Query_Args(array('auto_id' => $post->ID));

$pix_show_description_tab = get_post_meta(get_the_ID(), 'pixad_auto_description_tab', true) != '' ? get_post_meta(get_the_ID(), 'pixad_auto_description_tab', true) : 1;
$pix_show_features_tab = get_post_meta(get_the_ID(), 'pixad_auto_features_tab', true) != '' ? get_post_meta(get_the_ID(), 'pixad_auto_features_tab', true) : 1;
$title_1 = get_post_meta(get_the_ID(), 'pixad_auto_custom_title_1', true);
$title_2 = get_post_meta(get_the_ID(), 'pixad_auto_custom_title_2', true);
$title_3 = get_post_meta(get_the_ID(), 'pixad_auto_custom_title_3', true);
$pix_show_contacts_tab = get_post_meta(get_the_ID(), 'pixad_auto_contacts_tab', true) != '' ? get_post_meta(get_the_ID(), 'pixad_auto_contacts_tab', true) : 1;

$pix_show_specifications = get_post_meta(get_the_ID(), 'pixad_auto_specifications', true) != '' ? get_post_meta(get_the_ID(), 'pixad_auto_specifications', true) : 1;



$has_video = false;
$YoutubeCode = '';

$video_attachments = array();
$videos = pixad_get_attach_video($post->ID);
//$videos = explode(',', $videos[0]);
if (isset($videos[0]) && $videos[0] != '') {
    $video_attachments = get_posts(array(
        'post_type' => 'attachment',
        'include' => $videos[0]
    ));
}

if (count($video_attachments) > 0 || pixad_get_external_video($post->ID) != '') {
    $has_video = true;
}


$pix_active_description_tab = $pix_active_features_tab = $pix_active_title_1 = $pix_active_title_2 = $pix_active_title_3 = $pix_active_contacts_tab = '';
if ($pix_show_description_tab) {
    $pix_active_description_tab = 'active';
} elseif ($pix_show_features_tab) {
    $pix_show_features_tab = 'active';
} elseif ($title_1) {
    $pix_active_title_1 = 'active';
} elseif ($title_2) {
    $pix_active_title_2 = 'active';
} elseif ($title_3) {
    $pix_active_title_3 = 'active';
} elseif ($pix_show_contacts_tab) {
    $pix_active_contacts_tab = 'active';
}

/// Gallery
$gallery_images = keymoto_get_theme_mod('gallery_autos', true);
// Sub Title
$sub_title_content = keymoto_get_theme_mod('sub_title_auto',true);
// Custom Class Popup
$custom_class_popup = uniqid('popup').'-'.rand(100,9999);
// Sub Title
$sub_title_content = keymoto_get_theme_mod('sub_title_auto',true);
get_header();




$autoBody = wp_get_post_terms($post->ID, 'auto-body', array('fields' => 'names'));
?>
<!--Padding Top Start-->
<?php if (keymoto_get_theme_mod('page_padding_top', true) != 'disable') { ?>
<div class="fl-page-padding top"></div>
<?php } ?>
<!--Padding Top End-->

<div class="container">
    <div class="row">
        <?php if ($layout == 'left'):
            get_template_part('single', 'pixad-autos-sidebar');
        endif; ?>

        <?php if ($layout == 'none'){ ?>
        <div class="col-md-8 col-md-offset-2">
            <?php } else { ?>
            <div class="col-md-8">
                <?php } ?>
                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                    ?>
                <main class="main-content">
                    <article class="car-details">
                        <div class="car-details__wrap-title clearfix">
                            <h2 class="car-details__title"><?php esc_attr(the_title()) ?></h2>
                            <?php //if ($sub_title_content){
                                   // echo '<div class="car-details-sub-title-content fl-font-style-regular">'.esc_attr($sub_title_content).'</div>';
                                //}?>
                        </div>
                        <div id="slider-auto" class="auto-slider flexslider slider-product">
                            <?php
                                if ( function_exists('compare_cars_list_footer')){
                                    do_action('keymoto_autos_single_auto_img', $post);
                                } ?>
                            <ul class="slides fl-magic-popup fl-gallery-popup <?php echo esc_attr($custom_class_popup)?>" data-custom-class="<?php echo esc_attr($custom_class_popup)?>">
                                <?php

                                    if (has_post_thumbnail()) {

                                        $image_title = esc_attr(get_the_title(get_post_thumbnail_id()));
                                        $image_link = wp_get_attachment_url(get_post_thumbnail_id());
                                        $image = get_the_post_thumbnail($post->ID, 'keymoto_size_750x430_crop', array('title' => $image_title));

                                        $values = get_post_custom($post->ID);

                                        echo sprintf('<li><a href="%s">%s</a></li>', $image_link, $image);

                                        if ($has_video) {

                                            $auto_video_code = isset($values['_auto_video_code']) ? $values['_auto_video_code'] : false;
                                            if ($auto_video_code) {
                                                $YoutubeCode = reset($auto_video_code);
                                                preg_match('#(\.be/|/embed/|/v/|/watch\?v=)([A-Za-z0-9_-]{5,11})#', $YoutubeCode, $matches);
                                                if (isset($matches[2]) && $matches[2] != '') {
                                                    $YoutubeCode = $matches[2];
                                                }
                                                $you_t = '<iframe src="//www.youtube.com/embed/' . $YoutubeCode . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                                                echo sprintf('<li>%s</li>', $you_t);
                                            }
                                        }


                                        if ($gallery_images):
                                            foreach ($gallery_images as $image) {
                                                $image_holder = wp_get_attachment_image($image['ID'], 'keymoto_size_750x430_crop');
                                                $image_link_gallery = $image['url'];
                                                $image_title = esc_attr($image['title']);
                                                echo sprintf('<li><a href="%s" title="%s" >%s</a></li>', $image_link_gallery, $image_title, $image_holder);
                                            }
                                        endif;
                                    } else {
                                        ?>
                                <img class="no-image" src="<?php echo get_template_directory_uri() . '/admin/assets/images/no_image.jpg'; ?>" alt="<?php esc_attr_e('No image','keymoto')?>">
                                <?php
                                    }
                                    ?>
                            </ul>
                        </div>
                        <?php
                            if (!empty($gallery_images) && $gallery_images != '' or $has_video != false) {
                                ?>
                        <div id="carousel-auto" class="auto-carousel">
                            <ul class="slides">
                                <?php

                                        $image_title = esc_attr(get_the_title(get_post_thumbnail_id()));
                                        $image_link = wp_get_attachment_url(get_post_thumbnail_id());
                                        $image = get_the_post_thumbnail($post->ID, 'keymoto_size_480x360_crop', array('title' => $image_title));

                                        echo sprintf('<li>%s</li>', $image);


                                        if ($has_video) {

                                            $auto_video_code = isset($values['_auto_video_code']) ? $values['_auto_video_code'] : false;

                                            if ($auto_video_code) {
                                                $image_title = 'Video';
                                                // $image = get_the_post_thumbnail( $post->ID, 'keymoto-auto-thumb', array('title' => $image_title) );
                                                $image = '<i class="fa fa-play" aria-hidden="true"></i><img src="//img.youtube.com/vi/' . $YoutubeCode . '/0.jpg" alt="'.esc_attr__('Video Youtube slider Image', 'keymoto').'"/>';
                                                echo sprintf('<li class="auto-thumb-video">%s</li>', $image);
                                            }
                                        }
                                        // gallery
                                        if ($gallery_images):
                                            foreach ($gallery_images as $image) {

                                                $image = wp_get_attachment_image($image['ID'], 'keymoto_size_480x360_crop');
                                                $image_class = '';
                                                $image_title = esc_attr(get_the_title($image));

                                                echo sprintf('<li>%s</li>', $image);

                                            }
                                        endif;
                                        ?>
                            </ul>
                        </div>
                        <?php } ?>

                        <div class="top-info-wrap">
                            <?php if ($validate['auto-year_show'] && $Auto->get_meta('_auto_year')): ?>
                            <!-- Made Year -->
                            <div class="top-info-item">
                                <div class="entry-content">
                                    <?php if ($Auto->get_meta('_auto_year_icon') !=''): ?>
                                    <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_year_icon')) ?>"></i></div>
                                    <?php endif; ?>
                                    <div class="title fl-font-style-semi-bolt"><?php esc_html_e('Model Year', 'keymoto'); ?></div>
                                    <div class="content"><?php echo esc_attr($Auto->get_meta('_auto_year')) ?></div>
                                </div>
                            </div>
                            <!-- / Made Year -->
                            <?php endif; ?>
                            <?php if ($autoBody[0] !=''): ?>
                            <!-- Category -->
                            <div class="top-info-item">
                                <div class="entry-content">
                                    <?php if ($Auto->get_meta('_auto_category_icon') !=''): ?>
                                    <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_category_icon')) ?>"></i></div>
                                    <?php endif; ?>
                                    <div class="title fl-font-style-semi-bolt"><?php esc_html_e('Category', 'keymoto'); ?></div>
                                    <div class="content"><?php echo esc_attr($autoBody[0]) ?></div>
                                </div>
                            </div>
                            <!-- /Category -->
                            <?php endif; ?>

                            <?php if ($Auto->get_make()): ?>
                            <!-- Make -->
                            <div class="top-info-item">
                                <div class="entry-content">
                                    <?php if ($Auto->get_meta('_auto_make_icon') !=''): ?>
                                    <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_make_icon')) ?>"></i></div>
                                    <?php endif; ?>
                                    <div class="title fl-font-style-semi-bolt"><?php esc_html_e('Make', 'keymoto'); ?></div>
                                    <div class="content"><?php echo esc_attr($Auto->get_make()) ?></div>
                                </div>
                            </div>
                            <!--/ Make -->
                            <?php endif; ?>


                            <?php if ($validate['auto-engine_show'] && $Auto->get_meta('_auto_engine')): ?>
                            <!-- Engine -->
                            <div class="top-info-item">
                                <div class="entry-content">
                                    <?php if ($Auto->get_meta('_auto_engine_icon') !=''): ?>
                                    <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_engine_icon')) ?>"></i></div>
                                    <?php endif; ?>
                                    <div class="title fl-font-style-semi-bolt"><?php esc_html_e('Engine, cm3', 'keymoto'); ?></div>
                                    <div class="content"><?php echo esc_attr($Auto->get_meta('_auto_engine')) ?></div>
                                </div>
                            </div>
                            <!-- / Engine -->
                            <?php endif; ?>

                            <?php if ($validate['auto-transmission_show'] && $Auto->get_meta('_auto_transmission')) : ?>
                            <!-- Transmission -->
                            <div class="top-info-item">
                                <div class="entry-content">
                                    <?php if ($Auto->get_meta('_auto_transmission_icon') !=''): ?>
                                    <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_transmission_icon')) ?>"></i></div>
                                    <?php endif; ?>
                                    <div class="title fl-font-style-semi-bolt"><?php esc_html_e('Transmission', 'keymoto'); ?></div>
                                    <div class="content"><?php echo esc_attr($auto_translate[$Auto->get_meta('_auto_transmission')]) ?></div>
                                </div>
                            </div>
                            <!-- / Transmission -->
                            <?php endif; ?>
                        </div>

                        <!-- Content !-->
                        <div class="content-wrap">
                            <?php the_content() ?>
                        </div>
                        <!-- /Content !-->
                        <!--  Vehicle Specifications Start-->
                        <div class="technical-specifications-container">
                            <h2 class="technical-specifications-title fl-font-style-semi-bolt"><?php esc_html_e('Technical Specifications', 'keymoto') ?></h2>
                            <div class="technical-specifications-item-list-wrap">
                                <?php if ($validate['auto-stock-status_show'] && $Auto->get_meta('_auto_stock_status')): ?>
                                <!-- Stock -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_stock_status_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_stock_status_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Stock status:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($auto_translate[$Auto->get_meta('_auto_stock_status')]) ?></div>
                                    </div>
                                </div>
                                <!-- / Stock -->
                                <?php endif; ?>

                                <?php if ($validate['auto-mileage_show'] && $Auto->get_meta('_auto_mileage')): ?>
                                <!-- Mileage -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_mileage_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_mileage_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Mileage:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo number_format($Auto->get_meta('_auto_mileage'), 0, '', "{$settings['autos_thousand']}"); ?></div>
                                    </div>
                                </div>
                                <!-- / Mileage -->
                                <?php endif; ?>

                                <?php if ($validate['auto-vin_show'] && $Auto->get_meta('_auto_vin')): ?>
                                <!-- VIN -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_vin_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_vin_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('VIN:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($Auto->get_meta('_auto_vin')) ?></div>
                                    </div>
                                </div>
                                <!-- / VIN -->
                                <?php endif; ?>

                                <?php if ($validate['auto-version_show'] && $Auto->get_meta('_auto_version')): ?>
                                <!-- Version -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_version_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_version_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Version:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($Auto->get_meta('_auto_version')) ?></div>
                                    </div>
                                </div>
                                <!-- / Version -->
                                <?php endif; ?>

                                <?php if ($validate['auto-fuel_show'] && $Auto->get_meta('_auto_fuel')): ?>
                                <!-- Fuel -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_fuel_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_fuel_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Fuel:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_html_e(esc_attr($auto_translate[$Auto->get_meta('_auto_fuel')]), 'keymoto'); ?></div>
                                    </div>
                                </div>
                                <!-- / Fuel -->
                                <?php endif; ?>



                                <?php if ($validate['auto-horsepower_show'] && $Auto->get_meta('_auto_horsepower')): ?>
                                <!-- Horsepower -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_horsepower_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_horsepower_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Horsepower (hp):', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($Auto->get_meta('_auto_horsepower')) ?></div>
                                    </div>
                                </div>
                                <!-- / Horsepower -->
                                <?php endif; ?>

                                <?php if ($validate['auto-doors_show'] && $Auto->get_meta('_auto_doors')): ?>
                                <!-- Doors -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_doors_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_doors_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Doors:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($Auto->get_meta('_auto_doors')) ?></div>
                                    </div>
                                </div>
                                <!-- / Doors -->
                                <?php endif; ?>


                                <?php if ($validate['auto-color_show'] && $Auto->get_meta('_auto_color')): ?>
                                <?php $color = isset($auto_translate[$Auto->get_meta('_auto_color')]) ? $auto_translate[$Auto->get_meta('_auto_color')] : $Auto->get_meta('_auto_color'); ?>
                                <!-- Color -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_color_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_color_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Color:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($color) ?></div>
                                    </div>
                                </div>
                                <!-- / Color -->
                                <?php endif; ?>

                                <?php if ($validate['auto-condition_show'] && $Auto->get_meta('_auto_condition')): ?>
                                <!-- Condition -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_condition_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_condition_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Condition:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_html_e(keymoto_return_text($auto_translate[$Auto->get_meta('_auto_condition')]), 'keymoto'); ?></div>
                                    </div>
                                </div>
                                <!-- / Condition -->
                                <?php endif; ?>
                                <?php if ($validate['auto-drive_show'] && $Auto->get_meta('_auto_drive')): ?>
                                <?php $drive = isset($auto_translate[$Auto->get_meta('_auto_drive')]) ? $auto_translate[$Auto->get_meta('_auto_drive')] : $Auto->get_meta('_auto_drive'); ?>
                                <!-- Drive -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_drive_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_drive_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Drive:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($drive) ?></div>
                                    </div>
                                </div>
                                <!-- / Drive -->
                                <?php endif; ?>

                                <?php if ($validate['auto-seats_show'] && $Auto->get_meta('_auto_seats')): ?>
                                <!-- Seats -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_seats_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_seats_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Seats:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($Auto->get_meta('_auto_seats')) ?></div>
                                    </div>
                                </div>
                                <!-- / Seats -->
                                <?php endif; ?>

                                <?php if ($validate['auto-color-int_show'] && $Auto->get_meta('_auto_color_int')): ?>
                                <?php $color_int = isset($auto_translate[$Auto->get_meta('_auto_color_int')]) ? $auto_translate[$Auto->get_meta('_auto_color_int')] : $Auto->get_meta('_auto_color_int'); ?>
                                <!-- Color Int -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_color_int_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_color_int_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Interior Color:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($color_int) ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>



                                <?php if ($validate['auto-price-type_show'] && $Auto->get_meta('_auto_price_type')): ?>
                                <!-- Price Type -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_price_type_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_price_type_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Price Type:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($auto_translate[$Auto->get_meta('_auto_price_type')]); ?></div>
                                    </div>
                                </div>
                                <!-- / Price Type -->
                                <?php endif; ?>

                                <?php if ($validate['auto-warranty_show'] && $Auto->get_meta('_auto_warranty')): ?>
                                <!-- Warranty -->
                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($Auto->get_meta('_auto_warranty_icon') !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($Auto->get_meta('_auto_warranty_icon')) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php esc_html_e('Warranty:', 'keymoto'); ?></div>
                                        <div class="content"><?php echo esc_attr($auto_translate[$Auto->get_meta('_auto_warranty')]); ?></div>
                                    </div>
                                </div>
                                <!-- / Warranty -->
                                <?php endif; ?>



                                <?php

                                        $custom_settings_quantity = 1;
                                        $max_custom_settings_quantity = 7;
                                        $group_custom_settings_quantity = 1;

                                        while ($group_custom_settings_quantity <= 5): ?>

                                <?php if ($validate['group_' . $group_custom_settings_quantity . '_show'] != 'on') : ?>

                                <?php
                                                while ($custom_settings_quantity <= $max_custom_settings_quantity): ?>
                                <?php if ($validate['custom_' . $custom_settings_quantity . '_show'] && $Auto->get_meta('_custom_' . $custom_settings_quantity . '')): ?>

                                <div class="bottom-info-item-list">
                                    <div class="left-content">
                                        <?php if ($validate['custom_'. $custom_settings_quantity . '_icon'] !=''): ?>
                                        <div class="icon-container"><i class="<?php echo esc_attr($validate['custom_'. $custom_settings_quantity . '_icon']) ?>"></i></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="right-content">
                                        <div class="title fl-font-style-medium"><?php echo esc_attr($validate['custom_' . $custom_settings_quantity . '_name']); ?></div>
                                        <div class="content"><?php echo esc_attr($Auto->get_meta('_custom_' . $custom_settings_quantity . '')) ?></div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php $custom_settings_quantity++; ?>
                                <?php endwhile; ?>
                                <?php else: ?>
                                <?php $custom_settings_quantity = $custom_settings_quantity + 6; ?>
                                <?php endif; ?>

                                <?php $group_custom_settings_quantity++;
                                            $max_custom_settings_quantity = $max_custom_settings_quantity + 7;

                                        endwhile; ?>


                            </div>

                        </div>
                        <!--  Vehicle Specifications End -->
                        <!--  Additional Options & Features Start-->
                        <div class="additional-options-container">
                            <?php if($title_1 !=''){?>

                            <h3 class="additional-options-title fl-font-style-semi-bolt"><?php echo esc_attr($title_1) ?></h3>
                            <?php } ?>
                            <?php
                                $terms = wp_get_post_terms(get_the_ID(), 'auto-equipment', array('fields' => 'ids'));
                                $args_eq = array('taxonomy' => 'auto-equipment', 'hide_empty' => '0');
                                $auto_equipment_cat = get_categories($args_eq);
                                $equip_out = '';
                                foreach ($auto_equipment_cat as $category) {
                                    if (is_object($category)) {
                                        $t_id = $category->term_id;
                                        $equipment_icon = get_option("auto_equipment_icon_$t_id");
                                        $class_icon_set = $equipment_icon != '' ? 'equipment-icon-set' : '';
                                        if (in_array($category->term_id, $terms)) {
                                            $feature_icon_true = $equipment_icon != '' ? '<i class="icon ' . esc_attr($equipment_icon) . '"></i>' : '<i class="fa fa-check-square-o fl-primary-color"></i>';
                                            if(function_exists('pix_autodealer_output_info')){
                                                $equip_out .= '<li class="pixad-exist ' . esc_attr($class_icon_set) . '">' . pix_autodealer_output_info($feature_icon_true . $category->name) . '</li>';
                                            }

                                        } elseif ($settings['autos_equipment']) {
                                            $feature_icon_false = $equipment_icon != '' ? '<i class="icon ' . esc_attr($equipment_icon) . '"></i>' : '<i class="features-icon"></i>';
                                            if(function_exists('pix_autodealer_output_info')){
                                                $equip_out .= '<li class="pixad-none ' . esc_attr($class_icon_set) . '"> ' . pix_autodealer_output_info($feature_icon_false . $category->name) . '</li>';
                                            }
                                        }
                                    }
                                }

                                if ($equip_out != '')
                                    if(function_exists('pix_autodealer_output_info')){
                                        echo '<ul class="pixad-features-list">' . pix_autodealer_output_info($equip_out) . '</ul>';
                                    }

                                ?>

                            <?php echo '<div class="additional-options-text-content">'.do_shortcode(get_post_meta(get_the_ID(), 'pixad_auto_custom_content_1', true)).'</div>' ?>
                        </div>
                        <!--  /Additional Options & Features Start-->

                    </article>

                </main>
                <?php
                    // End the loop.
                endwhile;
                ?>
            </div>
            <?php if ($layout == 'right'):
                get_template_part('single', 'pixad-autos-sidebar');
            endif; ?>
        </div>
    </div>

    <!--Related Start-->
    <?php  get_template_part('single', 'pixad-related');?>
    <!--/ Related End-->
    <!--Padding Bottom Start-->
    <?php if (keymoto_get_theme_mod('page_padding_bottom', true) != 'disable') { ?>
    <div class="fl-page-padding bottom"></div>
    <?php } ?>
    <!--Padding Bottom End-->
    <?php get_footer(); ?>
