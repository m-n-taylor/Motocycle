<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package keymoto
 */

?>


    <div class="page-content cbp-item">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

        <p class="text-center"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'keymoto' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

        <?php elseif ( is_search() ) : ?>
            <div class="empty-search-wrapper">
                <div class="empty-search-wrapper-text">
                    <div class="left-content">
                        <i class="fl-custom-icon-broken"></i>
                    </div>
                    <div class="right-content">
                        <h5 class="empty-title"><?php esc_html_e( 'Nothing was found', 'keymoto' ); ?></h5>
                        <p class="empty-text"><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'keymoto' ); ?></p>
                    </div>
                </div>
                <div class="empty-search-wrapper-search-form">
                    <form class="search empty-search-form" role="search" method="get" id="searchform" action="<?php echo site_url()?>" >
                        <div class="fl--input-wrapper" data-text="">
                            <input type="text" placeholder="<?php echo esc_attr__('Search...', 'keymoto')?>"  class="searchinput" value="<?php echo get_search_query(); ?>" name="s" id="search-form" />
                        </div>
                        <div class="searchsubmit fl-secondary-bg">
                            <button type="submit" id="searchsubmit-global" class="fl-default-button primary-button-style"><?php echo esc_attr__('Search', 'keymoto')?><div class="button-decor"></div></button>
                        </div>
                    </form>
                    <div class="fl-font-style-bolt-two btn-seaech-wrapper text-center">
                        <a href="<?php echo esc_url(home_url('/'));?>" class="fl-404-page-btn fl-default-button secondary-button-style"><?php echo esc_html__("Back To Homepage", 'keymoto'); ?></a>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div><!-- .page-content -->
