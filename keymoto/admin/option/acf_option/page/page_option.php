<?php
acf_add_local_field_group(array(
    'key'                           => 'group_page_upvGGSaL4ghCx',
    'title'                         => esc_attr__('Page Options','keymoto'),
    'fields' => array(

        /*-------------------------------------------------------------------
        ==  Breadcrumbs
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_0kSx6vcW8rvaI',
            'label'                 => '<span class="dashicons dashicons-arrow-right-alt2"></span>'.esc_attr__('Breadcrumbs','keymoto'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_4x8Gg0Youluudcpage',
            'label'                 => esc_attr__('Breadcrumbs','keymoto'),
            'name'                  => 'page_breadcrumbs',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'standard'                              => esc_attr__('Default','keymoto'),
                'custom'                                => esc_attr__('Custom','keymoto'),
            ),
            'default_value'         => 'standard',
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_VjDHznPl71m7vpage',
            'label'                 => esc_attr__('Breadcrumbs','keymoto'),
            'name'                  => 'page_breadcrumb',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                             => 'field_4x8Gg0Youluudcpage',
                        'operator'                          => '==',
                        'value'                             => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                             => '',
                'class'                             => '',
                'id'                                => '',
            ),
            'choices' => array(
                'enable'                            => esc_attr__('Enable','keymoto'),
                'disable'                           => esc_attr__('Disable','keymoto'),
            ),
            'default_value' => array(
                0                                   => 'enable',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

        /*-------------------------------------------------------------------
        ==  Header
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_ksJukLyKEZuUz',
            'label'                 => '<i class="fa fa-header" aria-hidden="true"></i> '.esc_attr__('Header','keymoto'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'         => '',
                'class'         => '',
                'id'            => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),

        array(
            'key'                   => 'field_vvPA09dYwcmHM',
            'label'                 => esc_attr__('Custom','keymoto'),
            'name'                  => 'page_header_custom_style',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'standard'                                 => esc_attr__('Default Header','keymoto'),
                'custom'                                   => esc_attr__('Custom Header','keymoto'),
            ),
            'default_value' => array(
                0                                       => 'false',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),


        array(
            'key'                   => 'field_YepuwtJZo8j7Gcpage',
            'label'                 => esc_attr__('Custom Header','keymoto'),
            'name'                  => 'page_header',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_vvPA09dYwcmHM',
                        'operator'                              => '==',
                        'value'                                 => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'custom'                                => esc_attr__('Enable Header','keymoto'),
                'disable'                               => esc_attr__('Disable Header','keymoto'),
            ),
            'default_value'         => array(),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

        array(
            'key'                   => 'field_2VkpPZKnyztLF',
            'label'                 => esc_attr__('Pre title','keymoto'),
            'name'                  => 'page_header_pre_title',
            'type'                  => 'text',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices'               => array(),
            'default_value'         => '',
            'layout'                => 'vertical',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

        array(
            'key'                   => 'field_wtUSajd9AIV0v',
            'label'                 => esc_attr__('Title Header Enable Disable Function','keymoto'),
            'name'                  => 'page_header_title_enable_function',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'disable'                                 => esc_attr__('Disable','keymoto'),
                'enable'                                  => esc_attr__('Enable','keymoto'),
            ),
            'default_value' => array(
                0                                       => 'enable',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

        array(
            'key'                   => 'field_JzIMUeRq6lN2b',
            'label'                 => esc_attr__('Custom Title','keymoto'),
            'name'                  => 'page_custom_title',
            'type'                  => 'textarea',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_wtUSajd9AIV0v',
                        'operator'                               => '==',
                        'value'                                  => 'enable',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices'               => array(),
            'default_value'         => '',
            'layout'                => 'vertical',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

        array(
            'key'                   => 'field_Zukae6WF0AoBjpage',
            'label'                 => esc_attr__('Background Image','keymoto'),
            'name'                  => 'page_header_img',
            'type'                  => 'image',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                  => 'field_vvPA09dYwcmHM',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                    array (
                        'field'                                  => 'field_YepuwtJZo8j7Gcpage',
                        'operator'                               => '==',
                        'value'                                  => 'custom',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'return_format'         => 'url',
            'preview_size'          => 'full',
            'library'               => 'all',
            'min_width'             => '',
            'min_height'            => '',
            'min_size'              => '',
            'max_width'             => '',
            'max_height'            => '',
            'max_size'              => '',
            'mime_types'            => '',
        ),

        /*-------------------------------------------------------------------
        ==  Content
        -------------------------------------------------------------------*/
        array(
            'key'                   => 'field_z4kBpI17d6NE5',
            'label'                 => '<span class="dashicons dashicons-align-center"></span> '.esc_attr__('Content','keymoto'),
            'name'                  => '',
            'type'                  => 'tab',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'placement'             => 'left',
            'endpoint'              => 0,
        ),
        array(
            'key'                   => 'field_OZCyA9okaxJjPcpage',
            'label'                 => esc_attr__('Custom Content','keymoto'),
            'name'                  => 'page_container_custom',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic'     => 0,
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'false'                                 => esc_attr__('Default Content','keymoto'),
                'true'                                  => esc_attr__('Custom Content','keymoto'),
            ),
            'default_value' => array(
                0                                       => 'false',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),

        array(
            'key'                   => 'field_fluQVq4jLlo8Icpage',
            'label'                 => esc_attr__('Padding Top','keymoto'),
            'name'                  => 'page_padding_top',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_OZCyA9okaxJjPcpage',
                        'operator'                              => '==',
                        'value'                                 => 'true',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'true'                                  => esc_attr__('Enable','keymoto'),
                'false'                                 => esc_attr__('Disable','keymoto'),
            ),
            'default_value' => array(
                1                                       => 'text_center',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
        array(
            'key'                   => 'field_g4eDLjEvFEImLcpage',
            'label'                 => esc_attr__('Padding bottom','keymoto'),
            'name'                  => 'page_padding_bottom',
            'type'                  => 'button_group',
            'instructions'          => '',
            'required'              => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field'                                 => 'field_OZCyA9okaxJjPcpage',
                        'operator'                              => '==',
                        'value'                                 => 'true',
                    ),
                ),
            ),
            'wrapper' => array(
                'width'                                 => '',
                'class'                                 => '',
                'id'                                    => '',
            ),
            'choices' => array(
                'true'                                  => esc_attr__('Enable','keymoto'),
                'false'                                 => esc_attr__('Disable','keymoto'),
            ),
            'default_value' => array(
                0                                       => 'true',
            ),
            'layout'                => 'horizontal',
            'toggle'                => 0,
            'return_format'         => 'value',
        ),
    ),

    'location' => array(
        array(
            array(
                'param'                 => 'page_template',
                'operator'              => '==',
                'value'                 => 'default',
            ),
        ),
        array(
            array(
                'param'                 => 'post_template',
                'operator'              => '==',
                'value'                 => 'template-blog.php',
            ),
        ),
    ),
    'menu_order'                    => 0,
    'position'                      => 'normal',
    'style'                         => 'default',
    'label_placement'               => 'top',
    'instruction_placement'         => 'label',
    'hide_on_screen'                => '',
    'active'                        => true,
    'description'                   => '',
));