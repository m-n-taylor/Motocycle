<?php
KEYMOTO_Options::add_section('header_social_profiles', array(
    'title'             => esc_attr__( 'Header Social Profile', 'keymoto' ),
    'priority'          => 8,
    'panel'             => '',
    'icon'              => 'fa fa-facebook'
));



KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_linkedin',
    'label'             => esc_attr__( 'Linkedin', 'keymoto' ),
    'description'       => esc_attr__( 'Your Linkedin profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_vime',
    'label'             => esc_attr__( 'Vimeo', 'keymoto' ),
    'description'       => esc_attr__( 'Your Vimeo profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_yt',
    'label'             => esc_attr__( 'YouTube', 'keymoto' ),
    'description'       => esc_attr__( 'Your YouTube profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_twi',
    'label'             => esc_attr__( 'Twitter', 'keymoto' ),
    'description'       => esc_attr__( 'Your twitter profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_fb',
    'label'             => esc_attr__( 'Facebook', 'keymoto' ),
    'description'       => esc_attr__( 'Your Facebook profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_pin',
    'label'             => esc_attr__( 'Pinterest', 'keymoto' ),
    'description'       => esc_attr__( 'Your Pinterest profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_gpl',
    'label'             => esc_attr__( 'Google Plus+', 'keymoto' ),
    'description'       => esc_attr__( 'Your Google Plus+ profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_insta',
    'label'             => esc_attr__( 'Instagram', 'keymoto' ),
    'description'       => esc_attr__( 'Your Instagram profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'header_beh',
    'label'             => esc_attr__( 'Behance', 'keymoto' ),
    'description'       => esc_attr__( 'Your Behance profile URL.', 'keymoto' ),
    'section'           => 'header_social_profiles',
    'default'           => '',
    'priority'          => 10,
) );