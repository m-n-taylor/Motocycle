<?php
KEYMOTO_Options::add_section('cars_setting', array(
    'title'             => esc_attr__( 'Vehicle Setting', 'keymoto' ),
    'priority'          => 10,
    'panel'             => '',
    'icon'              => 'fa fa-tachometer'
));
// Sidebar Setting
KEYMOTO_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'car_sidebar_position',
    'label'             => esc_attr__( 'Sidebar Settings', 'keymoto' ),
    'description'       => esc_attr__( 'Select a sidebar position for Blog pages', 'keymoto' ),
    'section'           => 'cars_setting',
    'default'           => 'right',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'disable'                => esc_attr__('No Sidebar','keymoto'),
        'left'                   => esc_attr__('Left Sidebar','keymoto'),
        'right'                  => esc_attr__('Right Sidebar','keymoto'),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'car_sticky_sidebar',
    'label'             => esc_attr__( 'Sticky sidebar', 'keymoto' ),
    'section'           => 'cars_setting',
    'default'           => 'default',
    'priority'          => 1,
    'multiple'          => 1,
    'choices'     => array(
        'default'           => esc_attr__('Default Sidebar','keymoto'),
        'sticky'            => esc_attr__('Sticky Sidebar','keymoto'),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'car_sidebar_position',
            'operator'          => '!==',
            'value'             => 'disable',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'radio-buttonset',
    'settings'          => 'car_sidebar_title_style',
    'label'             => esc_attr__( 'Style Sidebar', 'keymoto' ),
    'section'           => 'cars_setting',
    'default'           => 'with_title',
    'priority'          => 1,
    'multiple'          => 1,
    'choices'     => array(
        ''                      => esc_attr__('Title Disable','keymoto'),
        'with_title'            => esc_attr__('Sidebar With Title','keymoto'),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'car_sidebar_position',
            'operator'          => '!==',
            'value'             => 'disable',
        ),
    ),
) );

//404 Background
KEYMOTO_Options::add_field( array(
    'type'          => 'textarea',
    'settings'      => 'car_sidebar_title',
    'label'         => esc_attr__( 'Sidebar Title', 'keymoto' ),
    'section'       => 'cars_setting',
    'default'       => esc_attr__( 'Search options', 'keymoto' ),
    'active_callback' => array(
        array(
            'setting'           => 'car_sidebar_title_style',
            'operator'          => '!==',
            'value'             => '',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'          => 'textarea',
    'settings'      => 'car_sidebar_sub_title',
    'label'         => esc_attr__( 'Sidebar Sub Title', 'keymoto' ),
    'section'       => 'cars_setting',
    'default'       => esc_attr__( 'find your motorcycle', 'keymoto' ),
    'active_callback' => array(
        array(
            'setting'           => 'car_sidebar_title_style',
            'operator'          => '!==',
            'value'             => '',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'        => 'image',
    'settings'    => 'sidebar_logotype',
    'label'       => esc_html__( 'Sidebar Title Logotype', 'keymoto' ),
    'section'     => 'cars_setting',
    'default'     => '',
) );
KEYMOTO_Options::add_field(array(
    'type'                  => 'text',
    'settings'              => 'after_payment_text',
    'label'                 => esc_attr__('After Payment Text', 'keymoto'),
    'section'               => 'cars_setting',
    'default'               => esc_attr__('Included Taxes & Checkup*', 'keymoto'),
));
//404 Background
KEYMOTO_Options::add_field( array(
    'type'          => 'image',
    'settings'      => 'car_promo_image',
    'label'         => esc_attr__( 'Promo Image Single Page', 'keymoto' ),
    'section'       => 'cars_setting',
    'default'       => '',
) );
