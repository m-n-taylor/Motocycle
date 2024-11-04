<?php
KEYMOTO_Options::add_section('breadcrumbs_setting', array(
    'title'             => esc_attr__( 'Breadcrumbs', 'keymoto' ),
    'priority'          => 10,
    'panel'             => '',
    'icon'              => 'fa fa-angle-right'
));
KEYMOTO_Options::add_field( array(
        'type'              => 'radio-image',
        'settings'          => 'page_breadcrumbs_style',
        'label'             => esc_attr__('Breadcrumbs style', 'keymoto'),
        'section'           => 'breadcrumbs_setting',
        'default'           => 'style_one',
        'priority'          => 1,
        'multiple'          => 1,
        'choices' => array(
            'style_one'                 => get_template_directory_uri() . '/admin/assets/images/layouts/breadcrumbs_style_image/style_one.jpg',
            'style_two'                 => get_template_directory_uri() . '/admin/assets/images/layouts/breadcrumbs_style_image/style_two.jpg',
            'style_three'               => get_template_directory_uri() . '/admin/assets/images/layouts/breadcrumbs_style_image/style_three.jpg',
            'disable'                   => get_template_directory_uri() . '/admin/assets/images/layouts/breadcrumbs_style_image/disable.jpg',
        ),
    ) );