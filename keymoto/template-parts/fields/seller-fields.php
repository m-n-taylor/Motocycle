<?php 
global $auto_validate;
 ?>


<section class="step-section" id="step04">

    
    <div class="col-md-12 col-xs-12" >

    <?php if( isset($auto_validate['first-name_show']) || isset($auto_validate['first-name_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller first name', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-first-name_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-first-name" type="text" <?php echo isset($auto_validate['seller-first-name_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'eg: John', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_seller_first_name'); ?>" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>

     <?php if( isset($auto_validate['last-name_show']) || isset($auto_validate['last-name_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller last name', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-last-name_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-last-name" placeholder="<?php esc_html_e( 'eg: Doe', 'keymoto' ); ?>" type="text" <?php echo isset($auto_validate['seller-last-name_req']) ? 'required' : ''; ?> value="" class="pixad-form-control">
        </div>
    </div>
     <?php endif; ?>

    <?php if( isset($auto_validate['seller-phone_show']) || isset($auto_validate['seller-phone_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller phone', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-phone_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-phone" type="text" <?php echo isset($auto_validate['seller-phone_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'eg: +38160656545', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_seller_phone'); ?>" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>
    <?php if( isset($auto_validate['seller-email_show']) || isset($auto_validate['seller-email_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller Email', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-email_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-email" type="text" <?php echo isset($auto_validate['seller-email_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'email', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_seller_email'); ?>" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>




    <?php if( isset($auto_validate['seller-country_show']) || isset($auto_validate['seller-country_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller country', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-country_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
         <select name="seller-country" class="pixad-form-control">
            <option value=""><?php _e( '-- Please Select --', 'keymoto' ); ?></option>
            <?php $country = new PIXAD_Country(); $country->option_output( pixad_get_meta('_seller_country') ); ?>
        </select>
        </div>
    </div>
    <?php endif; ?>

    <?php if( isset($auto_validate['seller-state_show']) || isset($auto_validate['seller-state_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller state', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-state_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-state" placeholder="<?php esc_html_e( 'eg: Texas', 'keymoto' ); ?>" type="text" <?php echo isset($auto_validate['seller-state_req']) ? 'required' : ''; ?> value="<?php echo pixad_get_meta('_seller_state'); ?>" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>
        
    <?php if( isset($auto_validate['seller-location_show']) || isset($auto_validate['seller-location_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller location', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-location_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-location" type="text" <?php echo isset($auto_validate['seller-location_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'eg: 1410 W Cheltenham Ave, Philadelphia, PA 19126, United States', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_seller_location'); ?>" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>

    <?php if( isset($auto_validate['seller-location-lat_show']) || isset($auto_validate['seller-location-lat_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller location latitude', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-location-lat_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-location-lat" type="text" <?php echo isset($auto_validate['seller-location-lat_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'eg: 40.0632723', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_seller_location_lat'); ?>" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>

    <?php if( isset($auto_validate['seller-location-long_show']) || isset($auto_validate['seller-location-long_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller location longitude', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-location-long_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-location-long" type="text" <?php echo isset($auto_validate['seller-location-long_req']) ? 'required' : ''; ?> placeholder="<?php esc_html_e( 'eg: -75.1411223', 'keymoto' ); ?>" value="<?php echo pixad_get_meta('_seller_location_long'); ?>" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>

                            <?php if( isset($auto_validate['seller-company_show']) || isset($auto_validate['seller-company_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller company', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-company_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-company" placeholder="<?php esc_html_e( 'eg: General Motors', 'keymoto' ); ?>" type="text" <?php echo isset($auto_validate['seller-company_req']) ? 'required' : ''; ?> value="" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>

    <?php if( isset($auto_validate['seller-town_show']) || isset($auto_validate['seller-town_req']) ): ?>
    <div class="pixad-form-group">
        <label class="pixad-control-label">
            <?php esc_html_e( 'Seller town', 'keymoto' ); ?> <?php echo isset($auto_validate['seller-town_req']) ? '<span class="required-field">*</span>' : ''; ?>
        </label>
        <div class="pixad-control-input">
            <input name="seller-town" placeholder="<?php esc_html_e( 'eg: Atlanta', 'keymoto' ); ?>" type="text" <?php echo isset($auto_validate['seller-town_req']) ? 'required' : ''; ?> value="" class="pixad-form-control">
        </div>
    </div>
    <?php endif; ?>
        
    </div>
</section>