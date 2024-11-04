<?php
KEYMOTO_Options::add_section('style_setting', array(
    'title'         => esc_attr__('Theme Style', 'keymoto'),
    'priority'      => 8,
    'icon'          => 'fa fa-paint-brush'
));

KEYMOTO_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'theme_border_color',
    'label'         => esc_attr__( 'Theme Border Color', 'keymoto' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#dddddd',
    'choices'     => array(
        'alpha' => true,
    ),
) );


KEYMOTO_Options::add_field( 
    
    
    array(
    'type'          => 'color',
    'settings'      => 'primary_color_setting',
    'label'         => esc_attr__( 'Primary Color Setting', 'keymoto' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#e63619',
    'choices'     => array(
        'alpha' => true,
    ),
        
        
        
        
        
        
        

    'output'      => array(
        
        array(
            'element'               => ' {
    background-color: #4817b9;
}',
            'property'              => 'color',
            'suffix'                => '!important',
        ),
        
        
         array(
            'element'               => 'html .fl-custom-btn.five-style span,html .sales_container *',
            'property'              => 'color',
            'suffix'                => '',
        ),
        
        
            array(
            'element'               => '.fl-places-categories .fl-cat-row .fl-category-single .fl-icon-contain svg path',
            'property'              => 'fill',
            'suffix'                => '!important',
        ),
        
        
        
        
        
        
        
          array(
            'element'               => 'html .active.icon-box-style-six  .icon-box-inner-wrap .icon-box-icon-wrap,html .fl-icon-box-vc.icon-box-style-six .icon-box-no-link:hover .icon-box-icon-wrap,html .fl--header .fl-header-content .fl-navigation-container-four .right-content .fl--navigation-icon-container .fl--hamburger-menu .fl-flipper-icon .fl-front-content span,#fl-page--preloader .fl-top-progress .fl-loader_left, #fl-page--preloader .fl-top-progress .fl-loader_right, #fl-page--preloader .fl--preloader-progress-bar span, html .fl-places-cat-contain .fl-places-cat .fl-places-meta .fl-places-results:hover , html .fl-home-page-posts-content-vc .home-page-post-container article.fl-post--item-two .right-content a.fl-blog-read-more:hover, .comments-container .comments-list .fl-comment .comment-container .comment-meta .comment-moderation .comment--reply-wrap a:before,html .fl-places-categories-header .fl-places-categories-header-meta .fl-places-header-right form button.inlineSubmit, .next.action-button ,.single-post-wrapper .post .post--holder .video-btn-wrap .video-btn:after,html .fl-places-content .fl-places-reviews-contain .comments-list .comment .comment .comment--reply-wrap a:before,html  .fl-places-content .fl-places-reviews-contain .comments-list .comment .comment--reply-wrap a:before , html .docspress-archive .docspress-archive-list > .docspress-archive-list-item .docspress-archive-list-item-title:after , html .docspress-archive .docspress-archive-list > .docspress-archive-list-item .docspress-archive-list-item-title:before, html .fl-places-categories .fl-cat-row .fl-category-single:hover .fl-icon-contain , html .docspress-btn.hover, html .docspress-btn:hover , html .fl--header .fl-header-content .fl-navigation-container-four .right-content .fl-header-phone-contain , html .fl--hamburger-sidebar-navigation-wrapper .sidebar_container .widget_fl_theme_helper_social_profiles .sidebar-social-links .social-links:hover ,  html body .fl-icon-box-vc.icon-box-style-six.active .icon-box-inner-wrap .icon-box-icon-wrap ,html  .fl-icon-box-vc.icon-box-style-eight .icon-box-wrap .icon-right-content .icon-box-title:after, 
            .fl-icon-box-vc.icon-box-style-nine:hover .icon-box-inner-wrap .icon-box-icon-wrap,html #wp-submit:hover, .pmpro_btn-submit:hover, html .pmpro_btn.pmpro_btn-cancel , #pmpro_levels_table .pmpro_btn.disabled, #pmpro_levels_table .pmpro_btn[disabled], #pmpro_levels_table fieldset[disabled] .pmpro_btn,html body .fl-icon-box-vc.icon-box-style-nine.active .icon-box-inner-wrap .icon-box-icon-wrap,html .youzify-user-balance-box .youzify-box-head, .prevbutton',
            'property'              => 'background-color',
            'suffix'                => '!important',
        ),
        
        
        array(
            'element'               => 'html .active.icon-box-style-six .icon-box-inner-wrap .icon-box-icon-wrap, html .fl-icon-box-vc.icon-box-style-six .icon-box-no-link:hover .icon-box-icon-wrap , .fl-home-page-posts-content-vc .home-page-post-container article.fl-post--item-two .right-content a.fl-blog-read-more:hover ,  html body .sidebar .widget_tag_cloud .tagcloud a:hover,html .fl-category-container .pagination .page-numbers.current, html .fl-category-container .pagination .page-numbers:hover,html .fl-places-content .fl-places-reviews-contain .comments-list .comment .comment-container .comment-meta .comment-moderation .cld-like-dislike-wrap .cld-dislike-wrap,html .fl-places-content .fl-places-reviews-contain .comments-list .comment .comment-container .comment-meta .comment-moderation .fl-share-contain .fl-post-share-contain a.fl-share:hover , html .fl-places-categories .fl-cat-row .fl-category-single:hover .fl-icon-contain , html .docspress-btn.hover, html .docspress-btn:hover , html .fl--header .fl-header-content .fl-navigation-container-four .right-content .fl-header-phone-contain , html .fl--hamburger-sidebar-navigation-wrapper .sidebar_container .widget_fl_theme_helper_social_profiles .sidebar-social-links .social-links:hover',
            'property'              => 'border-color',
            'suffix'                => '!important',
        ),
        
        
        
        
        
        array(
            'element'               => 'html .youzify-membership-form .youzify-membership-form-actions button,html .buttonWrapper-steps .nextbutton',
            'property'              => 'background',
            'suffix'                => '!important',
        )
    ),
) );



KEYMOTO_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'secondary_color_setting',
    'label'         => esc_attr__( 'Secondary Color Setting', 'keymoto' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#222222',
    'choices'     => array(
        'alpha' => true,
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'light_color_setting',
    'label'         => esc_attr__( 'Light Color Setting', 'keymoto' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#f8f8f8',
    'choices'     => array(
        'alpha' => true,
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'          => 'color',
    'settings'      => 'dark_color_setting',
    'label'         => esc_attr__( 'Dark Color Setting', 'keymoto' ),
    'section'       => 'style_setting',
    'priority'      => 1,
    'default'       => '#0f0f0f',
    'choices'     => array(
        'alpha' => true,
    ),
) );
