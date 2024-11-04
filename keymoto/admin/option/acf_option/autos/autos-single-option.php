<?php
if( function_exists('acf_add_local_field_group') ):
    // Gallery Function
    acf_add_local_field_group(array(
        'key' => 'group_5d0e22dc791d8',
        'title' => esc_attr__('Gallery','keymoto'),
        'fields' => array(
            array(
                'key' => 'field_5d0e22f0435c2',
                'label' => esc_attr__('Gallery','keymoto'),
                'name' => 'gallery_autos',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'full',
                'insert' => 'append',
                'library' => 'all',
                'min' => '',
                'max' => '',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5d0e23aa79f12',
                'label' => esc_attr__('Gallery "Promo Images"','keymoto'),
                'name' => 'gallery_promo_images',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'full',
                'insert' => 'append',
                'library' => 'all',
                'min' => '',
                'max' => '',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'pixad-autos',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));




    acf_add_local_field_group(array(
        'key'                           => 'group_page_PmRJguT2xa4u',
        'title'                         => esc_attr__('Key Moto Options','keymoto'),
        'fields' => array(

            /*-------------------------------------------------------------------
            ==  Breadcrumbs
            -------------------------------------------------------------------*/
            array(
                'key'                   => 'field_sSR3vRYJitCE',
                'label'                 => esc_attr__('Text Content','keymoto'),
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
                'key'                   => 'field_qGGPwDm7cJNe5',
                'label'                 => esc_attr__('Grid After Title Slogan','keymoto'),
                'name'                  => 'grid_title_slogan',
                'type'                  => 'text',
                'instructions'          => '',
                'required'              => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width'                 => '',
                    'class'                 => '',
                    'id'                    => '',
                ),
                'default_value'         => '',
                'placeholder'           => '',
                'prepend'               => '',
                'append'                => '',
                'maxlength'             => '',
            ),
            array(
                'key' => 'field_57f7a6123039be07',
                'label' => esc_attr__('After Price Text Content','keymoto'),
                'name' => 'after_payment_text',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_57f7a1236039be07',
                'label' => esc_attr__('Sub Title','keymoto'),
                'name' => 'sub_title_auto',
                'type' => 'text',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'pixad-autos',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

if (class_exists('Pixad_Booking_AUTO')){
    acf_add_local_field_group(array(
        'key' => 'group_5de169d858057',
        'title' => esc_attr__('Booking Car','keymoto'),
        'fields' => array(
            array(
                'key' => 'field_5de169e31b2d5',
                'label' => esc_attr__('Booking Car','keymoto'),
                'name' => 'booking_car',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'show' => 'Show',
                    'hide' => 'Hide',
                ),
                'default_value' => array(
                    0 => 'hide',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_IfbnOeVoienqK',
                'label' => esc_attr__('Booking Car Preview Booked Calendar','keymoto'),
                'name' => 'booking_car_review_calendar',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'show' => 'Show',
                    'hide' => 'Hide',
                ),
                'default_value' => array(
                    0 => 'hide',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_pmHMO0R2DEnbg',
                'label' => esc_attr__('Preview Mod Calendar','keymoto'),
                'instructions' => esc_attr__('A familiarization calendar, if none of the reserved dates is selected, a false calendar with false dates is displayed','keymoto'),
                'name' => 'calendar_preview_mode',
                'type' => 'select',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'show' => 'Show',
                    'hide' => 'Hide',
                ),
                'default_value' => array(
                    0 => 'hide',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'pixad-autos',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}



    acf_add_local_field_group(array(
        'key' => 'group_5de428ad1d802',
        'title' => esc_attr__('Auto Label','keymoto'),
        'fields' => array(
            array(
                'key' => 'field_5de428b96858f',
                'label' => esc_attr__('Label Auto','keymoto'),
                'name' => 'auto_featured_text',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5de428f763883',
                'label' => esc_attr__('Label Background','keymoto'),
                'name' => 'auto_featured_text_background',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'pixad-autos',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));





    acf_add_local_field_group(array(
        'key' => 'group_5detwerd1d802',
        'title' => esc_attr__('Custom Link','keymoto'),
        'fields' => array(
            array(
                'key' => 'field_5de42dasdd58f',
                'label' => esc_attr__('Link','keymoto'),
                'name' => 'custom_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_626a396002cb9',
                'label' => 'Open in new Window',
                'name' => 'target',
                'type' => 'checkbox',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'vertical',
                'choices' => array(
                    'open_in_new' => 'on',
                ),
                'default_value' => '',
                'other_choice' => 0,
                'save_other_choice' => 0,
                'allow_null' => 0,
                'return_format' => 'value',
            ),

            array(
                'key' => 'field_5de4dasddwwd58f',
                'label' => esc_attr__('Link Text','keymoto'),
                'name' => 'custom_link_text',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5fff32523d58f',
                'label' => esc_attr__('Description','keymoto'),
                'name' => 'custom_link_desc',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),



        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'pixad-autos',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));


endif;