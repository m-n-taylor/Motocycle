<?php

    $fl_pagination_style = keymoto_get_theme_mod('blog_pagination');

    if($fl_pagination_style == 'loadmore' or keymoto_get_theme_mod('blog_style') == 'grid') {
        $test_align = 'text-center';
    } else {
        $test_align = 'text-left';
    }

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    if(keymoto_show_posts_nav()) { ?>
        <div class="fl-blog-post-pagination <?php echo esc_attr($test_align);?>">
            <?php  if($fl_pagination_style == 'loadmore') {
                echo keymoto_ajax_pagination();
            } else { ?>
                <div class="pagination fl-default-pagination fl-font-style-medium">
                    <?php keymoto_page_links(); ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

