<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package autlines
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
if( !class_exists('Fl_Helping_Addons')){
    $comment_html_class = 'comment-without-back';
} else {
    $comment_html_class = '';
}


?>

<div class="comments-container <?php echo esc_attr($comment_html_class);?>" id="comments" data-coment-content="<?php esc_attr(bloginfo('title'));?>">
    <?php
    // You can start editing here -- including this comment!

    if (have_comments()) : ?>
        <h3 class="comment-title">
                    <?php

                    $num_comments = get_comments_number();
                    $text_comments = '';
                    if ( comments_open() ) {
                        if ( $num_comments == 1 ){
                            $text_comments = esc_html__(' Comment', 'keymoto').'<span class="comment-count fl-primary-color">('.$num_comments.')</span>';
                        }elseif ( $num_comments >= 2 ) {
                            $text_comments = esc_html__(' Comments', 'keymoto').'<span class="comment-count fl-primary-color">('.$num_comments.')</span>';
                        }
                    } else {
                        $text_comments =  esc_html__('Comments are off for this post.', 'keymoto');
                    }
                    echo fl_return_title_text($text_comments);
                    ?>
        </h3>

        <div class="cf"></div>
        <div class="comments-list">
            <?php
            wp_list_comments(array(
                'walker' => new keymoto_walker_comment(),
                'short_ping' => true,
                'avatar_size' => 100
            ));
            ?>
         </div>
        <!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>

            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="sr-only"><?php esc_html_e('Comment navigation', 'keymoto'); ?></h2>
                <?php
                $page = get_query_var('cpage');
                ?>
                <?php if (isset($page)): ?>
                    <div class="fl-comment-pagination cf">
                        <?php previous_comments_link('<i class="fa fa-angle-left"></i>'.esc_html__('Older Comments', 'keymoto'));?>
                        <?php next_comments_link(esc_html__('Newer Comments', 'keymoto').'<i class="fa fa-angle-right"></i>');?>
                    </div><!-- .nav-links -->
                <?php endif; ?>
            </nav><!-- #comment-nav-below -->
            <?php
        endif; // Check for comment navigation.

    endif; // Check for have_comments().


    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>

        <p class="no-comments"><?php esc_html_e('Comments are closed', 'keymoto'); ?></p>
        <?php
    endif;
    $commenter = wp_get_current_commenter();
    ?> <div class="fl-form-comment-reply">
        <?php
        comment_form(array(
            'title_reply' => esc_html__('Leave a Comment', 'keymoto'),
            'comment_notes_before' => '',

            'fields' => array('<div class="comment-field-wrapper">',
                'author' => '<div class="author-name"> 
                                <input type="text" class="required" placeholder="'.esc_attr__('Your Name *', 'keymoto').'" name="author" value="' . esc_attr($commenter['comment_author']) .'">
				             </div>',
                'email' => '<div class="author-email">
                                <input type="email" class="required" placeholder="'.esc_attr__('Email Address *', 'keymoto').'" name="email" value="' . esc_attr($commenter['comment_author_email']) .'">
                            </div>',
                '</div>'),
            'class_submit'  => 'hidden button',
            'class_form'    => 'fl-comment-form',
            'comment_field' => '<div class="author-comment">         
                                    <textarea class="form-control required" placeholder="'.esc_attr__('Enter your comment *', 'keymoto').'" name="comment" rows="5" aria-required="true"></textarea>
                                </div>',
            'comment_notes_after' => '<div class="submit-btn-container">
                                            <button type="submit" class="fl-default-button primary-button-style large-size">' . esc_html__('Post Comment', 'keymoto') . '<span class="button-decor"></span></button>
                                      </div>'
        ));

        ?>
    </div>
</div><!-- #comments -->

