<?php
$theme = wp_get_theme();
$this->get_tab_menu();

//


global $theme_name, $shortname, $options;


// Theme Recommendation
$php_min_requirements = array(
    'php_version' => '5.4.0',
    'memory_limit' => '256',
    'max_execution_time' => 180,
);


$php_memory_limit = preg_replace("/[^0-9]/", '', ini_get('memory_limit'));
$min_memory = $php_min_requirements['memory_limit'];
$req_memory_limit = $php_memory_limit >= $min_memory;

$req_php_version = true;

if(function_exists('phpversion')) {
    $php_ver = phpversion();
    $req_php_version = version_compare($php_ver, $php_min_requirements['php_version'], '>=');
}

$req_max_exec_time = true;

if(function_exists('ini_get')) {
    $time_limit = ini_get('max_execution_time');
    $req_max_exec_time = $time_limit >= $php_min_requirements['max_execution_time'];
}

$requirements_all_is_well = $req_memory_limit && $req_php_version && $req_max_exec_time;



// Activation
$envatoCode = get_theme_mod('keymoto_licence_settings_code') ? get_theme_mod('keymoto_licence_settings_code') : '' ;
$option_name = 'keymoto_licence_is_activated';
$option_name_code = 'keymoto_licence_code';
$flag_activate = keymoto_check_is_activated();



$class_not_activate = !$flag_activate ? 'theme-not-activated' : '';
$html_support = "<div class='pix_about_block_description desc_renew_support'>" . esc_html__("Your support has expired. ",'keymoto') . "</div>
  
  
   <p>" . esc_html__("Unfortunately, your support period is expired but you can renew your support period  ", "keymoto") . "</p>
   
  <a href='" . esc_url('https://help.market.envato.com/hc/en-us/articles/207886473-Extending-and-Renewing-Item-Support') . "' target='_blank' class='pix_about_block_link button button-primary'>" . esc_html__("Renew Support", "keymoto") . "</a>
  
  
  ";


if ($envatoCode){
    if ( get_option( $option_name ) != false ){
        if (get_option( $option_name_code ) == $envatoCode){
            $expiredTime = strtotime(get_option( $option_name ));
            if ($expiredTime > time()){
                $html_support = "<div class='pix_about_block_description'>" . esc_html__("This theme comes with 6 months of free support for every license you purchase. Support can be extended through subscriptions via ThemeForest. Envato Elements does not provide technical support for this theme.", "keymoto") . "</div>
          
          <a href='" . esc_url('http://support.templines.com/') . "' target='_blank' class='pix_about_block_link button button-primary'>" . esc_html__("Get Support", "keymoto") . "</a>
          
          ";
            }
        }
    }
}

?>
<div class="col-md-8 tvk-dashboard-page-parent">
    <div class="tvk-dashboard-page-wrap">
        <div class="dashboard-page-top-title-wrap">
            <div class="title-page"><i class="tvk-theme-dashboard-icon-font-custom-font-home"></i><h2 class="main-page-title"><?php echo esc_html__("Theme Dashboard", "keymoto");?></h2></div>
            <div class="dashboard-info-top-link-wrap"><a class="theme-link-btn" href="<?php echo Keymoto_Dashboard::getInstance()->strings['theme_link']; ?>"><?php echo Keymoto_Dashboard::getInstance()->strings['theme_link_text']; ?></a> <a class="portfolio-link-btn" href="<?php echo Keymoto_Dashboard::getInstance()->strings['portfolio_text_link']; ?>"><?php echo Keymoto_Dashboard::getInstance()->strings['portfolio_text']; ?></a></div>
         </div>
        <div class="main-theme-info-wrap">
            <div class="title-with-slogan-wrap text-center big-title">
                <div class="title-slogan"><?php echo Keymoto_Dashboard::getInstance()->strings['main_text_title_slogan']; ?></div>
                <h2 class="info-title"><?php echo Keymoto_Dashboard::getInstance()->strings['main_text_title']; ?></h2>
            </div>
            <div class="dashboard-page-theme-activation-wrap">
                <div class="notice-activation-wrap">
                <?php if (function_exists( 'keymoto_check_is_activated' )  ) {
                    if(keymoto_check_is_activated() ){
                        if (!class_exists('Templines_Helper_Core_Addons') && !class_exists('OCDI_Plugin') ) {
                            echo '<div class="tvk-plugin-activation-note"><p class="install-plugin-note-text">'.esc_html__('Thank for activation theme now install theme plugins and you can install the demo content','keymoto').'</p> <a class="install-plugin-link" href="'.esc_html($this->strings['plugin_link']).'">'.esc_html__('Install Theme Plugin','keymoto').'</a></div>';
                        }
                    } else {
                        echo '<div class="tvk-theme-activation-note">'.esc_html__('Please register your theme for install all demo content and plugins.','keymoto').'</div>';
                    }
                }?>
                </div>
                <div class="activation-themes-form-wrap">
                    <div class="top-content-activate-form">
                    <?php if (function_exists( 'keymoto_check_is_activated' )  ) {
                        if(keymoto_check_is_activated()){?>
                            <div class="title activation true"><?php echo esc_html(Keymoto_Dashboard::getInstance()->strings['theme_activation_title']); ?></div>
                            <div class="dashboard-badge activation true"><?php echo esc_html(Keymoto_Dashboard::getInstance()->strings['theme_activated']); ?></div>
                        <?php } else{?>
                            <div class="title activation false"><?php echo esc_html(Keymoto_Dashboard::getInstance()->strings['theme_activation_title']); ?></div>
                            <div class="dashboard-badge activation false"><?php echo esc_html(Keymoto_Dashboard::getInstance()->strings['theme_not_activated']); ?></div>
                        <?php  }
                    }?>
                    </div>
                    <div class="bottom-content-activate-form">
                        <?php if (function_exists( 'keymoto_check_is_activated' )  ) {
                            if(keymoto_check_is_activated() ){

                                echo '<div class="deactivated-wrap">';

                                echo  '<p class="remember-text">'.esc_html(Keymoto_Dashboard::getInstance()->strings['remember_code_text']).'</p>';

                                echo  '<div class="code-title">'.esc_html(Keymoto_Dashboard::getInstance()->strings['code_text']).'</div>'.'<code class="envanto-code">'.esc_html($envatoCode).'</code>';

                                echo "<div class='deactivate-btn-wrap'>
                                        <a class='deactivate-btn delete_key' data-key_activate='true'>" . esc_html__('Deactivate Theme', 'keymoto') . "</a>
                                      </div>";

                                echo  "</div>";

                            } else {
                                // Activation Wrap
                                echo "<div class='activated-wrap'>";

                                echo '<div class="activated-text-wrap">'.esc_html(Keymoto_Dashboard::getInstance()->strings['activation_text_left']).' <a href="'.esc_url(Keymoto_Dashboard::getInstance()->strings['activation_doc_link']).'" target=\'_blank\'>'.esc_html__("here", "keymoto").'</a> '.esc_html(Keymoto_Dashboard::getInstance()->strings['activation_text_right']).'</div>';

                                echo "<div class=\"activation-wrap-input-btn\"><input class='activation-input' type='text' name='pix_code' data-activationtheme='1' value='{$envatoCode}'><a data-activationtheme='1' class='activated-btn activation-theme'>" . esc_html__('Register Code', 'keymoto') . "</a></div>";

                                echo  "</div>";

                            }
                        }else{
                            echo esc_html__('Add Plugins', 'keymoto');
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="main-info-theme-dashboard-page-wrap">
                <div class="left-content">
                    <!-- Theme REQUIREMENTS-->
                    <div class="requirement-box">
                        <div class="box-title">
                            <?php if($requirements_all_is_well) { ?>
                                <div class="title true"><h3><?php echo Keymoto_Dashboard::getInstance()->strings['widget_requirements_title']; ?></h3></div>
                                <div class="dashboard-badge true"><?php echo Keymoto_Dashboard::getInstance()->strings['widget_requirements_noproblems']; ?></div>
                            <?php } else { ?>
                                <div class="title false"><h3><?php echo Keymoto_Dashboard::getInstance()->strings['widget_requirements_title']; ?></h3></div>
                                <div class="dashboard-badge false"><?php echo Keymoto_Dashboard::getInstance()->strings['widget_requirements_problems']; ?></div>
                            <?php } ?>
                        </div>
                        <div class="box-content">
                            <table class="widefat" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td><?php esc_html_e('PHP Version:', 'keymoto'); ?></td>
                                    <td>
                                        <?php
                                        if(function_exists('phpversion')) {
                                            if($req_php_version) {
                                                echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($php_ver) . '</mark>';
                                            } else {
                                                echo '<mark class="false tvk-drop-parent">';
                                                echo '<i class="fa fa-times"></i> ' . esc_attr($php_ver);
                                                echo ' <small>[' . esc_html($this->strings['widget_more_info_text']) . ']</small>';
                                                echo '<div class="tvk-drop-content">';
                                                echo sprintf(esc_html__('We recommend upgrade php version to at least %s.', 'keymoto'), $php_min_requirements['php_version']);
                                                echo '</div>';
                                                echo '</mark>';
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php esc_html_e('WP Memory Limit:', 'keymoto'); ?></td>
                                    <td>
                                        <?php

                                        if ($req_memory_limit) {
                                            echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($php_memory_limit . 'M') . '</mark>';
                                        } else {
                                            echo '<mark class="false tvk-drop-parent"><i class="fa fa-times"></i> ' . esc_attr($php_memory_limit . 'M') . ' ';
                                            echo '<small>[' . esc_html($this->strings['widget_more_info_text']) . ']</small>';
                                            echo '<div class="tvk-drop-content">';
                                            echo sprintf(esc_html__('For normal usage will be enough 128M, but for importing demo we recommend setting memory to at least %s.', 'keymoto'),
                                                '<strong>' . esc_attr($php_min_requirements['memory_limit'] . 'M') . '</strong><br>'
                                            );
                                            echo sprintf(esc_html__('Read more: %s', 'keymoto'), sprintf('<a href="http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">%s</a>', esc_html__('Increasing memory allocated to PHP.', 'keymoto'))
                                            );
                                            echo '</div>';
                                            echo '</mark>';
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td><?php esc_html_e('PHP Time Limit:', 'keymoto'); ?></td>
                                    <td>
                                        <?php if(function_exists('ini_get')):
                                            if($req_max_exec_time) {
                                                echo '<mark class="true"><i class="fa fa-check"></i> ' . esc_attr($time_limit) . '</mark>';
                                            } else {
                                                echo '<mark class="false tvk-drop-parent">';
                                                echo '<i class="fa fa-times"></i> ' . esc_attr($time_limit);
                                                echo ' <small>[' . esc_html($this->strings['widget_more_info_text']) . ']</small>';
                                                echo '<div class="tvk-drop-content">';
                                                echo sprintf(esc_html__('We recommend setting max execution time to at least %s.', 'keymoto'), esc_attr($php_min_requirements['max_execution_time']));
                                                echo ' <br> ';
                                                echo sprintf(esc_html__('See more: %s', 'keymoto'), sprintf('<a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank">%s</a>', esc_html__('Increasing max execution to PHP', 'keymoto'))
                                                );
                                                echo '</div>';
                                                echo '</mark>';
                                            }
                                        endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php esc_html_e('Child Theme:', 'keymoto'); ?></td>
                                    <td>
                                        <?php
                                        if(Keymoto_Dashboard::getInstance()->theme_is_child) {
                                            echo '<mark class="true"><i class="fa fa-check"></i></mark>';
                                        } else {
                                            echo '<mark class="tvk-drop-parent"><i class="fa fa-times"></i> ';
                                            echo '<small>[' . esc_html($this->strings['widget_more_info_text']) . ']</small>';
                                            echo '<div class="tvk-drop-content">'.esc_html__('We recommend use child theme to prevent loosing your customizations after theme update.', 'keymoto')
                                                .'</div>';
                                            echo '</mark>';
                                        }?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Theme REQUIREMENTS end-->
                </div>
                <div class="right-content">
                    <div class="box-title"><h3><?php echo Keymoto_Dashboard::getInstance()->strings['changelog_title'];?></h3></div>
                    <?php echo wp_remote_fopen(Keymoto_Dashboard::getInstance()->strings['changelog_link']);?>
                </div>
            </div>
        </div>
        <div class="documentation-info-wrap info-box">
            <div class="left-content-wrap"><img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/welcome-img/Documentation-image.svg' ) ); ?>" alt="<?php esc_attr_e('Welcome-banner','keymoto')?>"></div>
            <div class="right-content-wrap">
                <div class="title-with-slogan-wrap">
                    <div class="title-slogan"><?php echo Keymoto_Dashboard::getInstance()->strings['theme_documentation_title_slogan']; ?></div>
                    <h2 class="info-title"><?php echo Keymoto_Dashboard::getInstance()->strings['theme_documentation_title']; ?></h2>
                </div>
                <div class="info-text">
                    <p><?php echo Keymoto_Dashboard::getInstance()->strings['theme_documentation_text']; ?></p>
                </div>
                <div class="button-wrap">
                    <a href="<?php echo esc_url(Keymoto_Dashboard::getInstance()->strings['theme_doc_link']);?>" class="button-info" target="_blank">
                        <?php echo Keymoto_Dashboard::getInstance()->strings['theme_doc_text'];?>
                    </a>
                </div>
            </div>
        </div>
        <div class="support-info-wrap info-box">
            <div class="left-content-wrap">
                <div class="title-with-slogan-wrap">
                    <div class="title-slogan"><?php echo Keymoto_Dashboard::getInstance()->strings['theme_support_title_slogan']; ?></div>
                    <h2 class="info-title"><?php echo Keymoto_Dashboard::getInstance()->strings['theme_support_title']; ?></h2>
                </div>
                <div class="info-text">
                    <p><?php echo Keymoto_Dashboard::getInstance()->strings['support_message']; ?></p>
                </div>
                <div class="button-wrap">
                    <a href="<?php echo esc_url(Keymoto_Dashboard::getInstance()->strings['theme_support_link']);?>" class="button-info" target="_blank">
                        <?php echo Keymoto_Dashboard::getInstance()->strings['support_btn_text'];?>
                    </a>
                </div>
            </div>
            <div class="right-content-wrap"><img src="<?php echo esc_url( get_theme_file_uri( '/admin/theme-dashboard/img/welcome-img/support-image.svg' ) ); ?>" alt="<?php esc_attr_e('Welcome-banner','keymoto')?>"></div>
        </div>
    </div>
</div>

<?php
$this->get_tab_footer();
?>