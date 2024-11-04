<?php
KEYMOTO_Options::add_section('load_more_section', array(
    'title'         => esc_attr__('Load More Setting', 'keymoto'),
    'priority'      => 8,
    'icon'          => 'fa fa-spinner'
));

KEYMOTO_Options::add_field( array(
        'type'     => 'text',
        'settings' => 'load_more_text',
        'label'    => esc_html__( 'Load More Text', 'keymoto' ),
        'section'  => 'load_more_section',
        'default'  => esc_html__( 'LOAD MORE', 'keymoto' ),
        'priority' => 10,
    )
);


KEYMOTO_Options::add_field( array(
        'type'     => 'text',
        'settings' => 'load_more_loading_text',
        'label'    => esc_html__( 'Load More Loading Text', 'keymoto' ),
        'section'  => 'load_more_section',
        'default'  => 'LOADING...',
        'priority' => 10,
    )
);

KEYMOTO_Options::add_field( array(
        'type'     => 'text',
        'settings' => 'load_more_text_blog',
        'label'    => esc_html__( 'Blog Last Page Text', 'keymoto' ),
        'section'  => 'load_more_section',
        'default'  => esc_html__( 'NO MORE POST', 'keymoto' ),
        'priority' => 10,
    )
);

