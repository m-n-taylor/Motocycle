<?php
KEYMOTO_Options::add_section('typography_setting', array(
    'title'             => esc_attr__( 'Typography', 'keymoto' ),
    'priority'          => 8,
    'panel'             => '',
    'icon'              => 'fa fa-font'
));
KEYMOTO_Options::add_field( array(
    'type'                  => 'radio',
    'settings'              => 'custom_theme_font_style',
    'label'                 => esc_html__( 'Custom Font Theme Setting', 'keymoto' ),
    'section'               => 'typography_setting',
    'default'               => 'default',
    'priority'              => 1,
    'choices'     => [
        'custom'        => esc_html__( 'Custom', 'keymoto' ),
        'default'       => esc_html__( 'Default', 'keymoto' ),
    ],
) );
KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'body_typography',
    'label'             => esc_attr__( 'Body', 'keymoto' ),
    'section'           => 'typography_setting',
    'default'     => array(
        'font-family'                       => 'Oxygen',
        'variant'                           => 'regular',
        'letter-spacing'                    => '',
        'color'                             => '#777777',
        'text-transform'                    => 'none',
        'text-align'                        => 'left',
        'font-size'                         => '',
        'line-height'                       => '',
    ),
    'priority'    => 1,
    'output'      => array(
        array(
            'element'                           => 'body',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'header_typography',
    'label'             => esc_attr__( 'Header Titles', 'keymoto' ),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'default' => array(
        'font-family'                       => 'Oswald',
        'variant'                           => '700',
        'color'                             => '#222222',
        'text-transform'                    => 'none',
        'subsets'                           => false,
    ),
    'output'    => array(
        array(
            'element' => 'h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6,.fl-text-title-style',
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_regular',
    'label'             => esc_attr__('Font Style Regular Style One', 'keymoto'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Oswald',
        'variant'                           => 'regular',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-regular,.sidebar:not(.cars-sidebar) .widget ul li,blockquote'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
));

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_regular_two',
    'label'             => esc_attr__('Font Style Regular Style Two', 'keymoto'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Oxygen',
        'variant'                           => 'regular',
    ),
    'output' => array(
        array(
            'element'                       => '.fl-font-style-regular-two'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
));

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_bolt',
    'label'             => esc_attr__('Font Style Bolt Style One', 'keymoto'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Oswald',
        'variant'                           => '700',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-bolt,[data-decor-text="bottom-center"]:before,[data-decor-text="left-top"]:before'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
));


KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_bolt_three',
    'label'             => esc_attr__('Font Style Bolt Style Two', 'keymoto'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Oxygen',
        'variant'                           => '700',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-bolt-two'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
));

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_medium',
    'label'             => esc_attr__('Font Style Medium', 'keymoto'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Oswald',
        'variant'                           => '500',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-medium,.fl-default-button,.sidebar .widget .widget-title,.sidebar .widget_tag_cloud .tagcloud a,.header-sidebar-wrap .entry-content .header-sidebar-container .entry-sidebar .widget.widget_nav_menu li a'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
));

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_lighter_than_two',
    'label'             => esc_attr__('Font Style Lighter Than', 'keymoto'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Oswald',
        'variant'                           => '300',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-lighter-than'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
));

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'typography_font_semi_bolt',
    'label'             => esc_attr__('Font Style Semi Bolt Than', 'keymoto'),
    'section'           => 'typography_setting',
    'priority'          => 10,
    'transport'         => 'auto',
    'default' => array(
        'font-family'                       => 'Oswald',
        'variant'                           => '600',
    ),
    'output' => array(
        array(
            'element'                           => '.fl-font-style-semi-bolt,.car-details .content-wrap > h2'
        ),
    ),
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
));

// Nav Typography
KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'navigation_typography',
    'label'             => esc_attr__( 'Navigation Typography', 'keymoto' ),
    'section'           => 'typography_setting',
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
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'syb_megamenu_first_child_font',
    'label'             => esc_attr__('Mega Menu First Child Font Style', 'keymoto'),
    'section'           => 'typography_setting',
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
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
));


KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'sub_menu_navigation_typography',
    'label'             => esc_attr__( 'Sub Menu Typography', 'keymoto' ),
    'section'           => 'typography_setting',
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
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'mobile_menu_navigation_typography',
    'label'             => esc_attr__( 'Mobile Menu Typography', 'keymoto' ),
    'section'           => 'typography_setting',
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
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
) );

KEYMOTO_Options::add_field( array(
    'type'              => 'typography',
    'settings'          => 'mobile_sub_menu_navigation_typography',
    'label'             => esc_attr__( 'Mobile Sub Menu Typography', 'keymoto' ),
    'section'           => 'typography_setting',
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
    'active_callback' => array(
        array(
            'setting'           => 'custom_theme_font_style',
            'operator'          => '!==',
            'value'             => 'default',
        ),
    ),
) );