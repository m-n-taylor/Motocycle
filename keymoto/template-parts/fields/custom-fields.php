<?php 
global $auto_validate;
$field_car = [];
for ($i=1; $i <= 80; $i++) {
    if (isset($auto_validate['custom_'.$i.'_name'])){
        $field_car['custom_'.$i] = array('name' => $auto_validate['custom_'.$i.'_name'],  'field' => 'custom_'.$i,    'slug' => 'custom_'.$i, 'type' => 'text', 'placeholder' => esc_html('') );

    }
}
 ?>



    <?php 
    for ($i=1; $i <= 80; $i++) {
        if(isset($field_car['custom_'.$i])){
            keymoto_temp_field_update_car($field_car['custom_'.$i], $auto_validate);

        }
    }
     ?>
