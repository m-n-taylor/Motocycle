<?php
KEYMOTO_Options::add_section('woo_setting', array(
    'title'                 => esc_attr__( 'Wooccomerce Archive Setting', 'keymoto' ),
    'description'           => esc_attr__( 'Setting Wooccomerce Archive Page', 'keymoto' ),
    'priority'              => 10,
    'icon'                  => 'fa fa-cart-plus'
));

KEYMOTO_Options::add_field(array(
    'type'                  => 'text',
    'settings'              => 'woo_header_pre_title',
    'label'                 => esc_attr__('WooCommerce Pre Title', 'keymoto'),
    'description'           => esc_attr__('Specify the pre title for WooCommerce Pages', 'keymoto'),
    'section'               => 'woo_setting',
    'default'               => '',
    'priority'              => 1,
));

KEYMOTO_Options::add_field(array(
    'type'                  => 'text',
    'settings'              => 'woo_header_title',
    'label'                 => esc_attr__('WooCommerce Page Title', 'keymoto'),
    'description'           => esc_attr__('Specify the title for WooCommerce pages', 'keymoto'),
    'section'               => 'woo_setting',
    'default'               => 'Shop',
    'priority'              => 1,
));

KEYMOTO_Options::add_field( array(
    'type'              => 'select',
    'settings'          => 'woo_animation',
    'label'             => esc_attr__( 'Product Animation', 'keymoto' ),
    'section'           => 'woo_setting',
    'default'           => 'disable',
    'priority'          => 1,
    'multiple'          => 1,
    'choices' => array(
        'disable'                =>         esc_attr__('Disable','keymoto'),
        'fadeIn'                 =>         esc_attr__('fadeIn','keymoto'),
        'flipXIn'                =>         esc_attr__('flipXIn','keymoto'),
        'flipYIn'                =>         esc_attr__('flipYIn','keymoto'),
        'flipBounceXIn'          =>         esc_attr__('flipBounceXIn','keymoto'),
        'flipBounceYIn'          =>         esc_attr__('flipBounceYIn','keymoto'),
        'swoopIn'                =>         esc_attr__('swoopIn','keymoto'),
        'raise'                  =>         esc_attr__('raise','keymoto'),
        'whirlIn'                =>         esc_attr__('whirlIn','keymoto'),
        'shrinkIn'               =>         esc_attr__('shrinkIn','keymoto'),
        'expandIn'               =>         esc_attr__('expandIn','keymoto'),
        'bounceIn'               =>         esc_attr__('bounceIn','keymoto'),
        'bounceUpIn'             =>         esc_attr__('bounceUpIn','keymoto'),
        'bounceDownIn'           =>         esc_attr__('bounceDownIn','keymoto'),
        'bounceLeftIn'           =>         esc_attr__('bounceLeftIn','keymoto'),
        'bounceRightIn'          =>         esc_attr__('bounceRightIn','keymoto'),
        'slideUpIn'              =>         esc_attr__('slideUpIn','keymoto'),
        'slideDownIn'            =>         esc_attr__('slideDownIn','keymoto'),
        'slideLeftIn'            =>         esc_attr__('slideLeftIn','keymoto'),
        'slideRightIn'           =>         esc_attr__('slideRightIn','keymoto'),
        'slideUpBigIn'           =>         esc_attr__('slideUpBigIn','keymoto'),
        'slideDownBigIn'         =>         esc_attr__('slideDownBigIn','keymoto'),
        'slideLeftBigIn'         =>         esc_attr__('slideLeftBigIn','keymoto'),
        'slideRightBigIn'        =>         esc_attr__('slideRightBigIn','keymoto'),
        'perspectiveUpIn'        =>         esc_attr__('perspectiveUpIn','keymoto'),
        'perspectiveDownIn'      =>         esc_attr__('perspectiveDownIn','keymoto'),
        'perspectiveLeftIn'      =>         esc_attr__('perspectiveLeftIn','keymoto'),
        'perspectiveRightIn'     =>         esc_attr__('perspectiveRightIn','keymoto'),
        'zoomIn'                 =>         esc_attr__('zoomIn','keymoto'),
        'slideInRightVeryBig'    =>         esc_attr__('slideInRightVeryBig','keymoto'),
        'slideInLeftVeryBig'     =>         esc_attr__('slideInLeftVeryBig','keymoto'),
    ),

) );



KEYMOTO_Options::add_field(array(
    'type'                  => 'text',
    'settings'              => 'products_per_page',
    'label'                 => esc_attr__('Products per page', 'keymoto'),
    'description'           => esc_attr__('Specify the products per page count. by default it is 9', 'keymoto'),
    'section'               => 'woo_setting',
    'default'               => '9',
    'priority'              => 1,
));




KEYMOTO_Options::add_field( array(
    'type'                  => 'select',
    'settings'              => 'woo_archive_padding_top',
    'label'                 => esc_attr__( 'Padding top', 'keymoto' ),
    'section'               => 'woo_setting',
    'default'               => 'enable',
    'priority'              => 1,
    'multiple'              => 1,
    'choices'  => array(
        'enable'                                => esc_attr__('Enable','keymoto'),
        'disable'                               => esc_attr__('Disable','keymoto'),
    ),
) );
KEYMOTO_Options::add_field( array(
    'type'                  => 'select',
    'settings'              => 'woo_archive_padding_bottom',
    'label'                 => esc_attr__( 'Padding bottom', 'keymoto' ),
    'section'               => 'woo_setting',
    'default'               => 'enable',
    'priority'              => 1,
    'multiple'              => 1,
    'choices'   => array(
        'enable'                                => esc_attr__('Enable','keymoto'),
        'disable'                               => esc_attr__('Disable','keymoto'),
    ),
) );