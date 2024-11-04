<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package keymoto
 */

get_header();


$error_404_page_text = keymoto_get_theme_mod('404_text');

$error_404_page_title_text = keymoto_get_theme_mod('404_text_title');
?>

<div class="container page-404 cf">
    <div class="fl-page-padding"></div>

        <div class="fl--404-page-wrapper text-center cf">
            <div class="fl-404-text-wrapper cf">
                <div class="fl-404-text-left-content">
                    <i class="fl-custom-icon-broken"></i>
                </div>
                <div class="fl-404-text-right-content text-left">
                    <h5 class="fl--error-page-title"><?php echo esc_attr($error_404_page_title_text); ?></h5>
                    <p class="fl--errorp-text" ><?php echo esc_attr($error_404_page_text); ?></p>
                </div>
            </div>
            <div class="fl-404-page-search-form">
                <form class="search fl--search-form-404" role="search" method="get" id="searchform" action="<?php echo site_url()?>" >
                    <div class="fl--input-wrapper" data-text="">
                        <input type="text" placeholder="<?php echo esc_attr__('Search...', 'keymoto')?>"  class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="search-form" />
                    </div>
                    <div class="searchsubmit">
                        <button type="submit" id="searchsubmit-global" class="fl-default-button primary-button-style"><?php echo esc_attr__('Search', 'keymoto')?><div class="button-decor"></div></button>
                    </div>
                </form>
            </div>
            <div class="fl-secondary-bg fl-font-style-bolt-two btn-404-wrapper">
                <a href="<?php echo esc_url(home_url('/'));?>" class="fl-404-page-btn fl-default-button secondary-button-style"><?php echo esc_html__("Back To Homepage", 'keymoto'); ?></a>
            </div>


        </div>

    <div class="fl-page-padding"></div>
</div>

<?php get_footer(); ?>

