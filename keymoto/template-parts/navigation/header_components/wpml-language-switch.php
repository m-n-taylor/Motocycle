<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(keymoto_get_theme_mod('lan_switch_nav') == 'true'){?>
    <?php

    if(!function_exists('keymoto_language_selector')) {
        function keymoto_language_selector() {
            $result = $flag_html = $active_result = $active_item = $active_flag = '';
            if (function_exists('icl_get_languages')) {
                $languages = icl_get_languages('skip_missing=0&orderby=code');
                echo  '<div class="language-selector">';
                if (!empty($languages)) {
                    foreach ($languages as $lan) {
                        $li_class = '';
                        if(strcmp($lan['active'], '0') != 0) {
                            $active_item = $lan['translated_name'];
                            $active_flag = $lan['country_flag_url'];
                            $li_class = 'active-language';
                            $active_result = '<a href="'.esc_url($lan['url']).'"><span class="language-flag" style="background: transparent url('.esc_url($active_flag).') center center no-repeat; background-size: cover;"></span><span class="language-name">'.esc_html($active_item).'</span></a>';
                        }

                        $flag_html = '<span class="language-flag" style="background: transparent url('.$lan['country_flag_url'].') center center no-repeat;"></span>';

                        $result .= '<li class="'.esc_attr($li_class).'">';
                        $result .= '<a href="' . esc_url($lan['url']) . '">';
                        $result .= $flag_html;
                        $result .= '</a>';
                        $result .= '</li>';
                    }
                }
                echo (!empty($active_result)) ? $active_result : '';
                echo !empty($result) ? '<ul>'.$result.'</ul>' : '';
                echo '</div>';
            } else {

                $result .= '<li class="active-language">';
                $result .= '<a href="#" class="active-language">';
                $result .= '<span class="language-flag"></span>';
                $result .= '</a>';
                $result .= '</li>';
                $result .= '<li>';
                $result .= '<a href="#">';
                $result .= '<span class="language-flag"></span>';
                $result .= '</a>';
                $result .= '</li>';
                $result .= '<li>';
                $result .= '<a href="#">';
                $result .= '<span class="language-flag"></span>';
                $result .= '</a>';
                $result .= '</li>';
                echo '<div class="demo-language-selector">';
                echo !empty($result) ? '<ul>'.$result.'</ul>' : '';
                echo '</div>';
            }
        }
    }

    keymoto_language_selector();
    ?>

<?php } elseif(keymoto_get_theme_mod('lan_shortcode_text')) {
    echo do_shortcode(keymoto_get_theme_mod('lan_shortcode_text'));
}?>
