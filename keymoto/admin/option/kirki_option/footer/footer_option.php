<?php
KEYMOTO_Options::add_section('footer_setting', array(
    'title'             => esc_attr__( 'Footer', 'keymoto' ),
    'priority'          => 11,
    'panel'             => '',
    'icon'              => 'fa fa-copyright'
));
KEYMOTO_Options::add_field( array(
    'type'              => 'textarea',
    'settings'          => 'footer_copyrights',
    'label'             => esc_attr__( 'Copyrights', 'keymoto' ),
    'description'       => esc_attr__( 'Insert the Copyrights text.', 'keymoto' ),
    'section'           => 'footer_setting',
    'default'           => esc_html__( '(c) 2021 KEYMOTO - Motorcycles Dealer Template. All rights reserved.', 'keymoto' ),
    'priority'          => 10,
) );