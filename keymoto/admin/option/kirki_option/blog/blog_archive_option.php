<?php
KEYMOTO_Options::add_panel('blog_panel_archive', array(
    'title'     => esc_attr__('Blog Archive Setting', 'keymoto'),
    'priority'  => 10,
    'icon'      => 'fa fa-newspaper-o'
));


//Blog Archive Animation
KEYMOTO_Options::add_section('blog_archive_animation', array(
    'title'             => esc_attr__( 'Blog Animation', 'keymoto' ),
    'priority'          => 10,
    'panel'             => 'blog_panel_archive',
));

KEYMOTO_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_animation',
    'label'             => esc_attr__( 'Blog Animation', 'keymoto' ),
    'section'           => 'blog_archive_animation',
    'default'           => 'disable',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'disable'                =>         esc_attr__('Disable','keymoto'),
        'fadeIn'                 =>         esc_attr__('fadeIn','keymoto'),
        'flipXIn'                =>         esc_attr__('flipXIn','keymoto'),
        'flipYIn'                =>         esc_attr__('flipYIn','keymoto'),
        'flipBounceXIn'          =>         esc_attr__('flipBounceXIn','keymoto'),
        'flipBounceYIn'          =>         esc_attr__('flipBounceYIn','keymoto'),
        'swoopIn'                =>         esc_attr__('swoopIn','keymoto'),
        'raise'                  =>         esc_attr__('raise','keymoto'),
        'whirlIn'                =>         esc_attr__('whirlIn','keymoto'),
        'shrinkIn'               =>         esc_attr__('shrinkIn','keymoto'),
        'expandIn'               =>         esc_attr__('expandIn','keymoto'),
        'bounceIn'               =>         esc_attr__('bounceIn','keymoto'),
        'bounceUpIn'             =>         esc_attr__('bounceUpIn','keymoto'),
        'bounceDownIn'           =>         esc_attr__('bounceDownIn','keymoto'),
        'bounceLeftIn'           =>         esc_attr__('bounceLeftIn','keymoto'),
        'bounceRightIn'          =>         esc_attr__('bounceRightIn','keymoto'),
        'slideUpIn'              =>         esc_attr__('slideUpIn','keymoto'),
        'slideDownIn'            =>         esc_attr__('slideDownIn','keymoto'),
        'slideLeftIn'            =>         esc_attr__('slideLeftIn','keymoto'),
        'slideRightIn'           =>         esc_attr__('slideRightIn','keymoto'),
        'slideUpBigIn'           =>         esc_attr__('slideUpBigIn','keymoto'),
        'slideDownBigIn'         =>         esc_attr__('slideDownBigIn','keymoto'),
        'slideLeftBigIn'         =>         esc_attr__('slideLeftBigIn','keymoto'),
        'slideRightBigIn'        =>         esc_attr__('slideRightBigIn','keymoto'),
        'perspectiveUpIn'        =>         esc_attr__('perspectiveUpIn','keymoto'),
        'perspectiveDownIn'      =>         esc_attr__('perspectiveDownIn','keymoto'),
        'perspectiveLeftIn'      =>         esc_attr__('perspectiveLeftIn','keymoto'),
        'perspectiveRightIn'     =>         esc_attr__('perspectiveRightIn','keymoto'),
        'zoomIn'                 =>         esc_attr__('zoomIn','keymoto'),
        'slideInRightVeryBig'    =>         esc_attr__('slideInRightVeryBig','keymoto'),
        'slideInLeftVeryBig'     =>         esc_attr__('slideInLeftVeryBig','keymoto'),
    ),

) );
//Blog Archive Post Setting
KEYMOTO_Options::add_section('blog_archive_post_setting', array(
    'title'             => esc_attr__( 'Blog Post Setting', 'keymoto' ),
    'priority'          => 10,
    'panel'             => 'blog_panel_archive',
));
KEYMOTO_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_style',
    'label'             => esc_attr__( 'Blog Style', 'keymoto' ),
    'description'       => esc_attr__( 'Select the Blog archives style', 'keymoto' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => 'standard',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'standard'          => esc_attr__('Standard','keymoto'),
        'grid'              => esc_attr__('Grid','keymoto'),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'archive_blog_pre_title',
    'label'             => esc_attr__( 'Blog Archive Page Pre Title', 'keymoto' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => '',
    'priority'          => 1,
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'archive_blog_title',
    'label'             => esc_attr__( 'Blog Archive Page Title', 'keymoto' ),
    'description'       => esc_attr__( 'Specify the title for Blog archive page', 'keymoto' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => esc_attr__( 'Latest News', 'keymoto' ),
    'priority'          => 1,
) );


KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'custom_blog_excerpt_count',
    'label'             => esc_attr__( 'Number of Words in Description', 'keymoto' ),
    'description'       => esc_attr__( 'Specify the Number of Words for Description blog per post.', 'keymoto' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => '40',
    'priority'          => 1,
) );

KEYMOTO_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_archive_padding_top',
    'label'       => esc_attr__( 'Padding top', 'keymoto' ),
    'section'     => 'blog_archive_post_setting',
    'default'     => 'enable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices' => array(
        'enable'                => esc_attr__('Enable','keymoto'),
        'disable'               => esc_attr__('Disable','keymoto'),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'blog_archive_padding_bottom',
    'label'       => esc_attr__( 'Padding bottom', 'keymoto' ),
    'section'     => 'blog_archive_post_setting',
    'default'     => 'enable',
    'priority'    => 1,
    'multiple'    => 1,
    'choices'  => array(
        'enable'                => esc_attr__('Enable','keymoto'),
        'disable'               => esc_attr__('Disable','keymoto'),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_pagination',
    'label'             => esc_attr__( 'Pagination Settings', 'keymoto' ),
    'description'       => esc_attr__( 'Select the Pagination Type for Blog Archives', 'keymoto' ),
    'section'           => 'blog_archive_post_setting',
    'default'           => 'pagination',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'pagination'        => esc_attr__('Pagination','keymoto'),
        'loadmore'          => esc_attr__('Load More Button','keymoto'),
    ),
) );
//Blog Archive Sidebar Setting
KEYMOTO_Options::add_section('blog_archive_post_sidebar_setting', array(
    'title'             => esc_attr__( 'Blog Archive Sidebar Setting', 'keymoto' ),
    'priority'          => 10,
    'panel'             => 'blog_panel_archive',
));
KEYMOTO_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_archive_sidebar_position',
    'label'             => esc_attr__( 'Sidebar position', 'keymoto' ),
    'section'           => 'blog_archive_post_sidebar_setting',
    'default'           => 'right',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'left'              => esc_attr__('Left','keymoto'),
        'right'             => esc_attr__('Right','keymoto'),
        'disable'           => esc_attr__('Disable','keymoto'),
    ),

) );
KEYMOTO_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'blog_archive_sidebar_sticky',
    'label'             => esc_attr__( 'Sidebar sticky', 'keymoto' ),
    'section'           => 'blog_archive_post_sidebar_setting',
    'default'           => 'default',
    'priority'          => 1,
    'multiple'          => 1,
    'choices'  => array(
        'sticky'            => esc_attr__('Sticky sidebar','keymoto'),
        'default'           => esc_attr__('Default Sidebar','keymoto'),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'blog_archive_sidebar_position',
            'operator'          => '!=',
            'value'             => 'disable',
        ),
    ),
) );