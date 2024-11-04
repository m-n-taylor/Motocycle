<?php

KEYMOTO_Options::add_field( array(
    'type'              => 'image',
    'settings'          => 'site_logo',
    'label'             => esc_attr__( 'Site Logo', 'keymoto' ),
    'description'       => esc_attr__('Upload site logo.', 'keymoto' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 2,
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'logo_wth',
    'label'             => esc_attr__('Max width Logotype', 'keymoto' ),
    'description'       => esc_attr__('Site logo width in px.', 'keymoto' ),
    'section'           => 'title_tagline',
    'default'           => '190',
    'priority'          => 2,
    'output'      => array(
        array(
            'element'               => '.fl--logo-container img',
            'property'              => 'max-width',
            'units'                 => 'px',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'logo_wth_lg',
    'label'             => esc_attr__('Max width Large Devices Logotype', 'keymoto' ),
    'description'       => esc_attr__('Site logo width in px. Large Devices ≥992px', 'keymoto' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 2,
    'output'      => array(
        array(
            'element'               => '.fl--logo-container img',
            'property'              => 'max-width',
            'units'                 => 'px',
            'media_query' => '@media screen and (max-width: 992px)',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'logo_wth_md',
    'label'             => esc_attr__('Max width Medium Devices Logotype', 'keymoto' ),
    'description'       => esc_attr__('Site logo width in px. Medium Devices ≥768px', 'keymoto' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 2,
    'output'      => array(
        array(
            'element'               => '.fl--logo-container img',
            'property'              => 'max-width',
            'units'                 => 'px',
            'media_query' => '@media screen and (max-width: 768px)',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'logo_wth_sm',
    'label'             => esc_attr__('Max width Small Devices Logotype', 'keymoto' ),
    'description'       => esc_attr__('Site logo width in px. Small Devices ≥576px', 'keymoto' ),
    'section'           => 'title_tagline',
    'default'           => '',
    'priority'          => 2,
    'output'      => array(
        array(
            'element'               => '.fl--logo-container img',
            'property'              => 'max-width',
            'units'                 => 'px',
            'media_query' => '@media screen and (max-width: 576px)',
        ),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'google_api_key',
    'label'             => esc_attr__( 'Apikey', 'keymoto' ),
    'description'       => esc_attr__( 'Insert Google Maps Apikey.', 'keymoto' ),
    'section'           => 'title_tagline',
    'default'           => 'AIzaSyDBuVQgQSnzG2ngl4hzn-A00IIhYVk8RaE',
    'priority'          => 3,
) );


