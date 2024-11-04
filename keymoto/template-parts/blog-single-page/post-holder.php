<?php if (has_post_thumbnail()) { ?>
    <div class="post-top-content">
            <!--Standard Post Format -->
            <div class="post--holder">
                <?php echo get_the_post_thumbnail(get_the_ID(), 'keymoto_size_1170x658_crop', ["class" => "post-standard-image"], ['loading' => 'lazy']); ?>
                <div class="post-author-ava"><?php echo get_avatar( get_the_author_meta('ID'), 'keymoto_size_size_75x75_crop' );?></div>
            </div>
            <!--Standard Post Format End-->
    </div>
<?php } ?>