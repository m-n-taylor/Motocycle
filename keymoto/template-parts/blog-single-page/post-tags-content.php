<?php if(get_the_tags() || keymoto_get_theme_mod('share_post_setting') !='hide'){?>
    <div class="post-tag-and-share-wrap">
        <?php if(get_the_tags()){ ?>
            <div class="post-tags-content">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <span class="tags-content-text fl-font-style-medium fl-secondary-color">
                        <?php echo esc_html__('Tags: ','keymoto') ?>
                    </span>
                    <?php the_tags('<span class="tags-content">', ', ', '</span>') ;?>
            </div>
        <?php } ?>
        <?php if( keymoto_get_theme_mod('share_post_setting') !='hide') {?>
            <div class="post-share-content">
                <i class="fa fa-share-alt" aria-hidden="true"></i>
                <span class="share-content-text fl-font-style-medium fl-secondary-color">
                        <?php echo esc_html__('Share: ','keymoto') ?>
                </span>
                <?php echo templines_share_buttons(keymoto_get_theme_mod('tw_share_btn'),keymoto_get_theme_mod('fb_share_btn'),keymoto_get_theme_mod('lk_share_btn'),keymoto_get_theme_mod('pin_share_btn'),keymoto_get_theme_mod('rd_share_btn'),keymoto_get_theme_mod('vk_share_btn'));?>
            </div>
        <?php } ?>
    </div>
<?php } ?>

