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
</div>

<h2 class="post--title">
        <?php esc_attr(the_title()); ?>
</h2>
