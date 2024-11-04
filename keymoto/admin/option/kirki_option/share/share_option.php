<?php

KEYMOTO_Options::add_section('share_setting', array(
    'title'           => esc_attr__( 'Share Option', 'keymoto'),
    'priority'        => 10,
    'icon'            => 'fa fa-pinterest'
));

KEYMOTO_Options::add_field( array(
    'type'        => 'select',
    'settings'    => 'share_post_setting',
    'label'       => esc_attr__( 'Share icons from blog pages', 'keymoto' ),
    'description' => esc_attr__( 'Choose to show or hide share icon on blog pages', 'keymoto' ),
    'section'     => 'share_setting',
    'default'     => 'hide',
    'priority'    => 1,
    'multiple'    => 1,
    'choices'     => array(
        'hide' => esc_attr__('Hide Share Icon','keymoto'),
        'show' => esc_attr__('Show Share Icon','keymoto'),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'        => 'radio',
    'settings'    => 'tw_share_btn',
    'label'       => esc_html__( 'Twitter Share Button', 'keymoto' ),
    'section'     => 'share_setting',
    'default'     => 'true',
    'priority'    => 1,
    'choices'     => [
        'false'   => esc_html__( 'Disable', 'keymoto' ),
        'true'   => esc_html__( 'Enable', 'keymoto' ),
    ],
    'active_callback' => array(
        array(
            'setting' => 'share_post_setting',
            'operator' => '==',
            'value' => 'show',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'        => 'radio',
    'settings'    => 'fb_share_btn',
    'label'       => esc_html__( 'Facebook Share Button', 'keymoto' ),
    'section'     => 'share_setting',
    'default'     => 'true',
    'priority'    => 1,
    'choices'     => [
        'false'   => esc_html__( 'Disable', 'keymoto' ),
        'true'   => esc_html__( 'Enable', 'keymoto' ),
    ],
    'active_callback' => array(
        array(
            'setting' => 'share_post_setting',
            'operator' => '==',
            'value' => 'show',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'        => 'radio',
    'settings'    => 'lk_share_btn',
    'label'       => esc_html__( 'LinkedIn Share Button', 'keymoto' ),
    'section'     => 'share_setting',
    'default'     => 'true',
    'priority'    => 1,
    'choices'     => [
        'false'   => esc_html__( 'Disable', 'keymoto' ),
        'true'   => esc_html__( 'Enable', 'keymoto' ),
    ],
    'active_callback' => array(
        array(
            'setting' => 'share_post_setting',
            'operator' => '==',
            'value' => 'show',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'        => 'radio',
    'settings'    => 'pin_share_btn',
    'label'       => esc_html__( 'Pinterest Share Button', 'keymoto' ),
    'section'     => 'share_setting',
    'default'     => 'true',
    'priority'    => 1,
    'choices'     => [
        'false'   => esc_html__( 'Disable', 'keymoto' ),
        'true'   => esc_html__( 'Enable', 'keymoto' ),
    ],
    'active_callback' => array(
        array(
            'setting' => 'share_post_setting',
            'operator' => '==',
            'value' => 'show',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'        => 'radio',
    'settings'    => 'rd_share_btn',
    'label'       => esc_html__( 'Reddit Share Button', 'keymoto' ),
    'section'     => 'share_setting',
    'default'     => 'false',
    'priority'    => 1,
    'choices'     => [
        'false'   => esc_html__( 'Disable', 'keymoto' ),
        'true'   => esc_html__( 'Enable', 'keymoto' ),
    ],
    'active_callback' => array(
        array(
            'setting' => 'share_post_setting',
            'operator' => '==',
            'value' => 'show',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'        => 'radio',
    'settings'    => 'vk_share_btn',
    'label'       => esc_html__( 'VK Share Button', 'keymoto' ),
    'section'     => 'share_setting',
    'default'     => 'false',
    'priority'    => 1,
    'choices'     => [
        'false'   => esc_html__( 'Disable', 'keymoto' ),
        'true'   => esc_html__( 'Enable', 'keymoto' ),
    ],
    'active_callback' => array(
        array(
            'setting' => 'share_post_setting',
            'operator' => '==',
            'value' => 'show',
        ),
    ),
) );
