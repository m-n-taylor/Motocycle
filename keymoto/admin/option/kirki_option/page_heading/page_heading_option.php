<?php
KEYMOTO_Options::add_panel('header_option', array(
    'title'     => esc_attr__('Heading Setting', 'keymoto'),
    'priority'  => 9,
    'icon'      => 'fa fa-header',
));
// Page Header
KEYMOTO_Options::add_section('page_heading_setting', array(
    'title'             => esc_attr__( 'Page Heading', 'keymoto' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
KEYMOTO_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'page_background_img',
    'label'       => esc_attr__( 'Download the picture', 'keymoto' ),
    'section'     => 'page_heading_setting',
    'default'     => '',
    'priority'    => 1,

) );
// Single Blog
KEYMOTO_Options::add_section('single_page_heading_setting', array(
    'title'             => esc_attr__( 'Single Blog Page Heading', 'keymoto' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
KEYMOTO_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'single_blog_page_background_img',
    'label'       => esc_attr__( 'Download the picture', 'keymoto' ),
    'section'     => 'single_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );

// Blog Archive
KEYMOTO_Options::add_section('blog_archive_page_heading_setting', array(
    'title'             => esc_attr__( 'Blog Archive Heading', 'keymoto' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
KEYMOTO_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'blog_archive_page_background_img',
    'label'       => esc_attr__( 'Download the picture', 'keymoto' ),
    'section'     => 'blog_archive_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );
// Single Page Autos
KEYMOTO_Options::add_section('autos_single_page_heading_setting', array(
    'title'             => esc_attr__( 'Autos Single Heading', 'keymoto' ),
    'priority'          => 9,
    'panel'             => 'header_option',
));
KEYMOTO_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'autos_single_page_background_img',
    'label'       => esc_attr__( 'Download the picture', 'keymoto' ),
    'section'     => 'autos_single_page_heading_setting',
    'default'     => '',
    'priority'    => 1,
) );
