<?php
KEYMOTO_Options::add_section('navigator_section', array(
    'title'         => esc_attr__('Navigation Setting', 'keymoto'),
    'priority'      => 8,
    'icon'          => 'fa fa-bars'
));


KEYMOTO_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'fixed_nav',
    'label'             => esc_attr__( 'Fixed Navigator', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 1,
    'choices'     => [
        'true'          => esc_html__( 'Enable', 'keymoto' ),
        'false'         => esc_html__( 'Disable', 'keymoto' ),
    ],
    'default'           => 'false',
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'auto_hide_nav',
    'label'             => esc_attr__( 'Auto Hide With Scrolling Navigator', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 1,
    'choices'     => [
        'true'          => esc_html__( 'Enable', 'keymoto' ),
        'false'         => esc_html__( 'Disable', 'keymoto' ),
    ],
    'default'           => 'false',
    'active_callback' => array(
        array(
            'setting'           => 'fixed_nav',
            'operator'          => '!==',
            'value'             => 'false',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'navigation_typography',
    'label'             => esc_attr__( 'Navigation Typography', 'keymoto' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Oswald',
        'font-size'                     => '13px',
        'variant'                       => '500',
        'text-transform'                => 'uppercase',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.fl--header .nav-menu li a',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'syb_megamenu_first_child_font',
    'label'             => esc_attr__('Mega Menu First Child Font Style', 'keymoto'),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Oswald',
        'variant'                           => '700',
        'color'                             => '#222222',
        'font-size'                         => '10px',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-mega-menu>ul>li .sub-nav>ul.sub-menu-wide>li>a'
        ),
    ),
));


KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'sub_menu_navigation_typography',
    'label'             => esc_attr__( 'Sub Menu Typography', 'keymoto' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Oswald',
        'variant'                       => '400',
        'font-size'                     => '14px',
        'text-transform'                => 'none',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.fl--header .nav-menu li .sub-menu li a,.fl--header .nav-menu li .sub-menu li .sub-sub-menu',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'mobile_menu_navigation_typography',
    'label'             => esc_attr__( 'Mobile Menu Typography', 'keymoto' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Montserrat',
        'variant'                       => '500',
        'font-size'                     => '11px',
        'text-transform'                => 'uppercase',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.fl--mobile-menu li a',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'mobile_sub_menu_navigation_typography',
    'label'             => esc_attr__( 'Mobile Sub Menu Typography', 'keymoto' ),
    'section'           => 'navigator_section',
    'default'     => array(
        'font-family'                   => 'Montserrat',
        'variant'                       => '500',
        'font-size'                     => '11px',
        'text-transform'                => 'none',
        'subsets'                       => array( 'latin-ext' ),
    ),
    'priority'          => 10,
    'output'            => array(
        array(
            'element'                   => '.fl--mobile-menu li .sub-menu li a',
        ),
    ),
) );




KEYMOTO_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'menu_search_icon',
    'label'             => esc_attr__( 'Search Icon', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'choices'     => [
        'enable'          => esc_html__( 'Enable', 'keymoto' ),
        'disable'         => esc_html__( 'Disable', 'keymoto' ),
    ],
    'default'           => 'disable',
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'menu_login_icon',
    'label'             => esc_attr__( 'Login Icon', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'choices'     => [
        'enable'          => esc_html__( 'Enable', 'keymoto' ),
        'disable'         => esc_html__( 'Disable', 'keymoto' ),
    ],
    'default'           => 'disable',
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'button_header',
    'label'             => esc_attr__( 'Header Button', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'choices'     => [
        'enable'          => esc_html__( 'Enable', 'keymoto' ),
        'disable'         => esc_html__( 'Disable', 'keymoto' ),
    ],
    'default'           => 'disable',
) );


KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'button_text',
    'label'             => esc_html__( 'Button Text', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'default'           => esc_attr__( 'Take a test drive', 'keymoto' ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'button_link',
    'label'             => esc_html__( 'Button Link', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'default'           => '#',
) );


KEYMOTO_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'contact_header',
    'label'             => esc_attr__( 'Contact', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'choices'     => [
        'enable'          => esc_html__( 'Enable', 'keymoto' ),
        'disable'         => esc_html__( 'Disable', 'keymoto' ),
    ],
    'default'           => 'disable',
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'image',
    'settings'          => 'contact_img',
    'label'             => esc_attr__( 'Contact Image', 'keymoto' ),
    'description'       => esc_attr__('Upload image.', 'keymoto' ),
    'section'           => 'navigator_section',
    'default'           => '',
    'priority'          => 10,
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'phone',
    'label'             => esc_html__( 'Phone', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'default'           => esc_attr__( '(265) 005 369', 'keymoto' ),
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'phone_text',
    'label'             => esc_html__( 'Text', 'keymoto' ),
    'section'           => 'navigator_section',
    'priority'          => 10,
    'default'           => esc_attr__( 'Call Us Today!', 'keymoto' ),
) );



KEYMOTO_Options::add_field( array(
    'type'              => 'toggle',
    'settings'          => 'lan_switch_nav',
    'label'             => esc_attr__( 'Languages Switcher', 'keymoto' ),
    'section'           => 'navigator_section',
    'choices'     => [
        'true'          => esc_html__( 'Enable', 'keymoto' ),
        'false'         => esc_html__( 'Disable', 'keymoto' ),
    ],
    'default'           => 'false',
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'text',
    'settings'          => 'lan_shortcode_text',
    'label'             => esc_html__( 'Custom Languages Shortcode', 'keymoto' ),
    'section'           => 'navigator_section',
) );

