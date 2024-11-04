<!--Post Start-->
<article <?php post_class('fl-post--item fl-post-item-standard') ?> id="post-<?php the_ID() ?>" data-post-id="<?php the_ID() ?>">
    <?php if (has_post_thumbnail()) { ?>
        <div class="post-top-content">
            <div class="post--holder">
                <a class="image-post-link" href="<?php esc_url(the_permalink()); ?>">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'keymoto_size_1170x658_crop', ["class" => "post-standard-image"], ['loading' => 'lazy']); ?>
                </a>
                <div class="post-author-ava"><?php echo get_avatar( get_the_author_meta('ID'), 'keymoto_size_size_75x75_crop' );?></div>
            </div>
        </div>
        <?php } ?>
    <div class="post-bottom-content">
        <div class="post-info-wrap">
            <div class="post-author-info post-info">
                <i class="ic icon-user"></i>
                <span class="author-link fl-primary-hv-color"><?php echo keymoto_return_text(get_the_author_posts_link());?></span>
            </div>
            <div class="post-date-info post-info">
                <i class="icon-calendar"></i>
                <a class="date-post fl-secondary-color-hv" href="<?php echo esc_url(get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>"><?php echo get_the_date();?></a>
            </div>
            <div class="post-category-info post-info">
                    <i class="ic icon-folder-alt"></i>
                    <?php the_category(', ', ''); ?>
            </div>
            <div class="post-comment-info post-info">
                <a class="fl--comment-icon-info" href="<?php echo get_comments_link(); ?>" title="Comments">
                    <i class="ic icon-speech"></i>
                    <span class="comment-count"><?php echo comments_number('0', '1', '%'); ?></span>
                </a>
            </div>
        </div>

        <h5 class="post--title">
            <a class="title-link fl-secondary-color fl-primary-hv-color"
               href="<?php esc_url(the_permalink()); ?>">
                <?php esc_attr(the_title()); ?>
            </a>
        </h5>
        <div class="post-text--content">
            <?php echo keymoto_limit_excerpt(keymoto_get_theme_mod('custom_blog_excerpt_count')); ?>
        </div>

        <div class="post-btn-read-more">
            <a class="post-link fl-secondary-color fl-font-style-semi-bolt fl-primary-hv-color" href="<?php the_permalink(); ?>">
                <span class="decor-button"></span><?php echo esc_html__('Read More', 'keymoto') ?>
            </a>
            <div class="decor-line"></div>
        </div>
    </div>
</article>
<!--Post End-->



