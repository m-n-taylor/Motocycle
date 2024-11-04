<?php 
global $auto_validate;

$field_car = array(
    'auto-condition'    => array('name' => esc_html__( 'Auto Condition', 'keymoto' ),  'field' => 'auto-condition',    'slug' => '_auto_condition', 'type' => 'select',  'temp' => 'autozone_temp_select_cond'),
    'auto-doors'    => array('name' => esc_html__( 'Doors', 'keymoto' ),  'field' => 'auto-doors',    'slug' => '_auto_doors', 'type' => 'select',  'temp' => 'autozone_temp_select_doors'),
    'auto-drive'    => array('name' => esc_html__( 'Auto Drive', 'keymoto' ),  'field' => 'auto-drive',    'slug' => '_auto_drive', 'type' => 'select',  'temp' => 'autozone_temp_select_drive'),
    'auto-purpose'      => array('name' => esc_html__('Auto Purpose','keymoto' ),      'field' => 'auto-purpose',    'slug' => '_auto_purpose', 'type' => 'select', 'temp' => 'autozone_temp_select_purpose' ),
    'auto-color'        => array('name' => esc_html__('Color','keymoto' ),             'field' => 'auto-color',    'slug' => '_auto_color',                                              'placeholder' => esc_html__('eg: red','keymoto'),   'type' => 'text' ),
    'auto-color-int'    => array('name' => esc_html__('Interior Color','keymoto' ),    'field' => 'auto-color-int',    'slug' => '_auto_color_int',                  'type' => 'text',                         'placeholder' => esc_html__('eg: black','keymoto') ),
    'auto-warranty'     => array('name' => esc_html__('Warranty','keymoto' ),          'field' => 'auto-warranty',    'slug' => '_auto_warranty', 'type' => 'select', 'temp' => 'autozone_temp_select_warranty' ),
    'auto-vin'          => array('name' => esc_html__('VIN','keymoto' ),               'field' => 'auto-vin',    'slug' => '_auto_vin', 'type' => 'text',  'placeholder' => esc_html__('eg: 1VXBR12EXCP901213','keymoto') ),
    'auto-horsepower'   => array('name' => esc_html__('Horsepower, hp','keymoto' ),    'field' => 'auto-horsepower',    'slug' => '_auto_horsepower', 'type' => 'text', 'placeholder' => esc_html__('eg: 200','keymoto') ),
    'auto-seats'        => array('name' => esc_html__('Seating Capacity','keymoto' ),  'field' => 'auto-seats',    'slug' => '_auto_seats', 'type' => 'text', 'placeholder' => esc_html__('eg: 5','keymoto') ),
    'auto-version'        => array('name' => esc_html__('Auto Version','keymoto' ),  'field' => 'auto-version',    'slug' => '_auto_version', 'type' => 'text' , 'placeholder' => esc_html__('eg: 1.6 hdi','keymoto') ),
 );

 ?>
<section class="step-section" id="step01">

    <div class="pixad-form-horizontal">

        <div class="col-md-12 col-xs-12">

        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php esc_html_e( 'Title', 'keymoto' ); ?> <span class="required-field">*</span>
            </label>
            <div class="pixad-control-input">
                <input name="auto-post-title" type="text" required placeholder="<?php esc_html_e( 'eg: Mercedes-Benz E220', 'keymoto' ); ?>" value="" class="pixad-form-control">
            </div>
        </div>

        <?php
        $args = array(
            'taxonomy'      => 'auto-model',
            'parent'      => '0',
            'hide_empty'    => false,
        );
        $autos_categories = get_terms( $args );

        //uasort($autos_categories,"autozone_ASCSort");
        $out_makes = '';

        ?>
        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php esc_html_e( 'Make', 'keymoto' ); ?> <span class="required-field">*</span>
            </label>
            <div class="pixad-control-input">
                <select name="auto-make" required class="pixad-form-control">
                    <option value=""><?php esc_html_e( '-- Please Select --', 'keymoto' ); ?></option>
                    <?php  foreach ($autos_categories as $key => $auto_cat) {
                        if($auto_cat->parent == 0)

                          $termchildren = get_term_children( $auto_cat->term_id, 'auto-model' );
                          echo '<optgroup label="'.$auto_cat->name.'">';
                           echo '<option value="' . esc_attr($auto_cat->slug) . '">' . wp_kses_post($auto_cat->name) . '</option>';
                           if(!empty($termchildren)){
                              foreach ($termchildren as $key_child => $child_term_id) {
                                $child_term = get_term_by( 'id', $child_term_id, 'auto-model' );
                                echo '<option value="' . esc_attr($child_term->slug) . '">' . wp_kses_post($child_term->name) . '</option>';
                              }
                           }
                          echo ' </optgroup>';
                        } ?>
                </select>
            </div>
        </div>

        <?php if( isset($auto_validate['auto-year_show']) || isset($auto_validate['auto-year_req']) ): ?>
        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php esc_html_e( 'Made Year', 'keymoto' ); ?> <?php echo isset($auto_validate['auto-year_req']) ? '<span class="required-field">*</span>' : ''; ?>
            </label>
            <div class="pixad-control-input">
                <select name="auto-year" required class="pixad-form-control">
                    <option value=""><?php esc_html_e( '-- Please Select --', 'keymoto' ); ?></option>
                    <?php pixad_get_options_range( date('Y'), 1930, '' ); ?>
                </select>
            </div>
        </div>
        <?php endif; ?>

        <?php if( isset($auto_validate['auto-transmission_show']) || isset($auto_validate['auto-transmission_req']) ): ?>
        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php esc_html_e( 'Transmission', 'keymoto' ); ?> <?php echo isset($auto_validate['auto-transmission_req']) ? '<span class="required-field">*</span>' : ''; ?>
            </label>
            <div class="pixad-control-input">
                <select name="auto-transmission" <?php echo isset($auto_validate['auto-transmission_req']) ? 'required' : ''; ?> class="pixad-form-control">
                    <option value=""><?php esc_html_e( '-- Please Select --', 'keymoto' ); ?></option>
                    <option value="automatic" <?php if(pixad_get_meta('_auto_transmission')=='automatic') echo 'selected'; ?>><?php esc_html_e( 'Automatic', 'keymoto' ); ?></option>
                    <option value="manual" <?php if(pixad_get_meta('_auto_transmission')=='manual') echo 'selected'; ?>><?php esc_html_e( 'Manual', 'keymoto' ); ?></option>
                    <option value="semi-automatic" <?php if(pixad_get_meta('_auto_transmission')=='semi-automatic') echo 'selected'; ?>><?php esc_html_e( 'Semi-Automatic', 'keymoto' ); ?></option>
                </select>
            </div>
        </div>
        <?php endif; ?>
        <?php keymoto_temp_field_update_car($field_car['auto-condition'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-purpose'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-drive'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-color'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-color-int'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-doors'], $auto_validate); ?>
            
        <?php if( isset($auto_validate['auto-fuel_show']) || isset($auto_validate['auto-fuel_req']) ): ?>
        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php esc_html_e( 'Fuel Type', 'keymoto' ); ?> <?php echo isset($auto_validate['auto-fuel_req']) ? '<span class="required-field">*</span>' : ''; ?>
            </label>
            <div class="pixad-control-input">
                <select name="auto-fuel" <?php echo isset($auto_validate['auto-fuel_req']) ? 'required' : ''; ?> class="pixad-form-control">
                    <option value=""><?php esc_html_e( '-- Please Select --', 'keymoto' ); ?></option>
                    <option value="diesel" <?php if(pixad_get_meta('_auto_fuel')=='diesel') echo 'selected'; ?>><?php esc_html_e( 'Diesel', 'keymoto' ); ?></option>
                    <option value="electric" <?php if(pixad_get_meta('_auto_fuel')=='electric') echo 'selected'; ?>><?php esc_html_e( 'Electric', 'keymoto' ); ?></option>
                    <option value="petrol" <?php selected( 'petrol', pixad_get_meta('_auto_fuel'), true ); ?>><?php esc_html_e( 'Petrol', 'keymoto' ); ?></option>
                    <option value="hybrid" <?php if(pixad_get_meta('_auto_fuel')=='hybrid') echo 'selected'; ?>><?php esc_html_e( 'Hybrid', 'keymoto' ); ?></option>
                    <option value="plugin_electric" <?php if(pixad_get_meta('_auto_fuel')=='plugin_electric') echo 'selected'; ?>><?php esc_html_e( 'Plugin electric', 'keymoto' ); ?></option>
                </select>
            </div>
        </div>
        <?php endif; ?>
        
        
        


        <?php if( isset($auto_validate['auto-mileage_show']) || isset($auto_validate['auto-mileage_req']) ): ?>
        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php esc_html_e( 'Mileage', 'keymoto' ); ?> <?php echo isset($auto_validate['auto-mileage_req']) ? '<span class="required-field">*</span>' : ''; ?>
            </label>
            <div class="pixad-control-input">
                <input name="auto-mileage" type="text" <?php echo isset($auto_validate['auto-mileage_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'eg: 100000', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_auto_mileage'); ?>" class="pixad-form-control">
                <span class="errmileage"></span>
            </div>
        </div>
        <?php endif; ?>

        <?php if( isset($auto_validate['auto-engine_show']) || isset($auto_validate['auto-engine_req']) ): ?>
        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php esc_html_e( 'Engine, cm3', 'keymoto' ); ?> <?php echo isset($auto_validate['auto-engine_req']) ? '<span class="required-field">*</span>' : ''; ?>
            </label>
            <div class="pixad-control-input">
                <input name="auto-engine" type="text" <?php echo isset($auto_validate['auto-engine_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'eg: 1900', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_auto_engine'); ?>" class="pixad-form-control">
                <span class="errengine"></span>
            </div>
        </div>
        <?php endif; ?>
        
        
        
    <?php if( isset($auto_validate['auto-price_show']) || isset($auto_validate['auto-price_req']) ): ?>
        <div class="pixad-form-group">
            <label class="pixad-control-label">
                <?php esc_html_e( 'Price', 'keymoto' ); ?> <?php echo isset($auto_validate['auto-price_req']) ? '<span class="required-field">*</span>' : ''; ?>
            </label>
            <div class="pixad-control-input">
                <input name="auto-price" type="text" <?php echo isset($auto_validate['auto-price_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'eg: 10000', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_auto_price'); ?>" list="price_option" class="pixad-form-control">
              
                <span class="errprice"></span>
            </div>
        </div>
        <?php endif; ?>
        
        <?php keymoto_temp_field_update_car($field_car['auto-warranty'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-vin'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-horsepower'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-seats'], $auto_validate); ?>
        <?php keymoto_temp_field_update_car($field_car['auto-version'], $auto_validate); ?>

        
        <?php  get_template_part( 'templates/fields/custom-fields'); ?>
        </div>
        
        
</section>