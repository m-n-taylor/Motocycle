<?php
if(keymoto_get_theme_mod('blog_single_post_link') !='disable'){
$prev_html_class =$next_html_class = 'dont-has-thumbnail';
global $post;
$next_post = get_next_post($post->id);
$previous_post = get_previous_post($post->id);
?>
<div class="post-inner-pagination-wrapper">
    <div class="container">
        <div class="row">
            <div class="inner-pagination-content">
                <div class="prev-post-nav-content post-inner-pagination-content <?php echo esc_html($prev_html_class);?>">
                    <?php if (!empty($previous_post)):
                        if(has_post_thumbnail($previous_post->ID)){
                            $prev_html_class= 'has-thumbnail';
                        }?>
                        <a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" class="post-pagination-link post-inner-prev-link">
                            <div class="entry-content <?php echo esc_html($prev_html_class);?>">
                                <div class="relative-content-post-link">
                                    <div class="mask"></div>
                                    <h4 class="pagination-title fl-font-style-medium"><?php echo keymoto_limit_excerpt_title(esc_html( $previous_post->post_title ),'30'); ?></h4>
                                    <div class="pagination-text-content fl-font-style-lighter-than"><?php echo esc_attr__('Read the previous post','keymoto');?></div>
                                    <div class="decor-wrap">
                                        <span class="decor"></span>
                                    </div>
                                </div>
                                <?php
                                if(has_post_thumbnail($previous_post->ID)){?>
                                    <div class="absolute-content-post-link">
                                        <div class="mask"></div>
                                        <?php echo get_the_post_thumbnail($previous_post->ID, 'keymoto_size_720x340_crop', ["class" => "post-pagination-image"], ['loading' => 'lazy']);?>
                                    </div>
                                <?php } ?>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="next-post-nav-content post-inner-pagination-content">
                    <?php if (!empty($next_post)):
                        if(has_post_thumbnail($next_post->ID)){
                            $next_html_class = 'has-thumbnail';
                        }?>
                        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="post-pagination-link post-inner-next-link">
                            <div class="entry-content <?php echo esc_html($next_html_class);?>">
                                <div class="relative-content-post-link">
                                    <div class="mask"></div>
                                    <h4 class="pagination-title fl-font-style-medium"><?php echo keymoto_limit_excerpt_title(esc_html( $next_post->post_title ),'30'); ?></h4>
                                    <div class="pagination-text-content fl-font-style-lighter-than"><?php echo esc_attr__('Read the next post','keymoto');?></div>
                                    <div class="decor-wrap">
                                        <span class="decor"></span>
                                    </div>
                                </div>
                                <?php
                                if(has_post_thumbnail($next_post->ID)){?>
                                    <div class="absolute-content-post-link">
                                        <div class="mask"></div>
                                        <?php echo get_the_post_thumbnail($next_post->ID, 'keymoto_size_720x340_crop', ["class" => "post-pagination-image"], ['loading' => 'lazy']);?>
                                    </div>
                                <?php } ?>
                             </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>