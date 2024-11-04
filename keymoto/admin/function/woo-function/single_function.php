<?php

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
// Woo Comments Form filter
add_filter( 'woocommerce_product_review_comment_form_args', 'keymoto_filter_function_comments_form' );
function keymoto_filter_function_comments_form( $comment_form ){
    // filter...
    $commenter = wp_get_current_commenter();

    $comment_form = array(
        /* translators: %s is product title */
        'title_reply'         => have_comments() ? esc_html__( 'Add New Review:', 'keymoto' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'keymoto' ), get_the_title() ),
        /* translators: %s is product title */
        'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'keymoto' ),
        'title_reply_before'  => '<h4 id="reply-title" class="comment-reply-title">',
        'title_reply_after'   => '</h4>',

        'fields'              => array(
            'author' => '<div class="input-fields-wrapper"><div class="author-name comment-form-author">
                            <label>' . esc_attr__( 'Name *', 'keymoto' ) . '</label>
                            <input id="author" name="author" type="text"  value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></div>',
            'email'  => '<div class="author-email comment-form-email">
                                <label>' . esc_attr__( 'Email *', 'keymoto' ) . '</label>
                                <input id="email" name="email"  type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></div></div>',
        ),
        'label_submit'        => esc_html__( 'Submit', 'keymoto' ),
        'logged_in_as'        => '',
        'comment_field'       => '',
        'class_submit'        => 'hidden button',
        'comment_notes_after' => '<div class="submit-btn-container">
                                            <button type="submit" class="fl-button secondary-button submit-comment">' . esc_attr__('Submit', 'keymoto') . '</button>
                                  </div>',
    );

    $account_page_url = wc_get_page_permalink( 'myaccount' );
    if ( $account_page_url ) {
        /* translators: %s opening and closing link tags respectively */
        $comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'keymoto' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
    }

    if ( wc_review_ratings_enabled() ) {
        $comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'keymoto' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_attr__( 'Rate&hellip;', 'keymoto' ) . '</option>
						<option value="5">' . esc_attr__( 'Perfect', 'keymoto' ) . '</option>
						<option value="4">' . esc_attr__( 'Good', 'keymoto' ) . '</option>
						<option value="3">' . esc_attr__( 'Average', 'keymoto' ) . '</option>
						<option value="2">' . esc_attr__( 'Not that bad', 'keymoto' ) . '</option>
						<option value="1">' . esc_attr__( 'Very poor', 'keymoto' ) . '</option>
					</select></div>';
    }

    $comment_form['comment_field'] .= '<div class="author-comment comment-form-comment">
                        <label>' . esc_attr__( 'Your review *', 'keymoto' ) . '</label>
                        <textarea id="comment"  name="comment" cols="45" rows="8" required></textarea>
                        </div>';

    return $comment_form;
}




// Remove RElated Product In Single Page Shop
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


if(!class_exists('Fl_Helping_Addons')){
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
}
