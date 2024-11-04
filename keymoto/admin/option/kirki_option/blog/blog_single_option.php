<?php

KEYMOTO_Options::add_section('blog_single', array(
    'title'             => esc_attr__( 'Blog Single Setting', 'keymoto' ),
    'priority'          => 10,
    'icon'              => 'fa fa-file-archive-o'
));
KEYMOTO_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'blog_single_post_link',
    'label'             => esc_attr__( 'Post Link', 'keymoto' ),
    'section'           => 'blog_single',
    'default'           => 'disable',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'enable'                => esc_attr__('Enable','keymoto'),
        'disable'               => esc_attr__('Disable','keymoto'),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'blog_single_sidebar_position',
    'label'             => esc_attr__( 'Sidebar Settings', 'keymoto' ),
    'description'       => esc_attr__( 'Select a sidebar position for Blog pages', 'keymoto' ),
    'section'           => 'blog_single',
    'default'           => 'right',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'no'                => esc_attr__('No Sidebar','keymoto'),
        'left'              => esc_attr__('Left Sidebar','keymoto'),
        'right'             => esc_attr__('Right Sidebar','keymoto'),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'blog_single_sticky',
    'label'             => esc_attr__( 'Sticky sidebar', 'keymoto' ),
    'section'           => 'blog_single',
    'default'           => 'default',
    'priority'          => 1,
    'multiple'          => 1,
    'choices'     => array(
        'default'           => esc_attr__('Default Sidebar','keymoto'),
        'sticky'            => esc_attr__('Sticky Sidebar','keymoto'),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'blog_single_sidebar_position',
            'operator'          => '!==',
            'value'             => 'no',
        ),
    ),
) );