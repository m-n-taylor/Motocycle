<?php

KEYMOTO_Options::add_section('404_setting', array(
    'title'           => esc_attr__( '404 Page', 'keymoto' ),
    'priority'        => 10,
    'icon'            => 'fa fa-bug'
));


 //404 Background
KEYMOTO_Options::add_field( array(
    'type'          => 'textarea',
    'settings'      => '404_text_title',
    'label'         => esc_attr__( 'Text Title', 'keymoto' ),
    'section'       => '404_setting',
    'default'       => esc_attr__( 'Nothing was found', 'keymoto' ),
) );

KEYMOTO_Options::add_field( array(
    'type'          => 'textarea',
    'settings'      => '404_text',
    'label'         => esc_attr__( '404 Text', 'keymoto' ),
    'section'       => '404_setting',
    'default'       => esc_attr__( 'Sorry, we can\'t find the page you are looking for.', 'keymoto' ),
) );
