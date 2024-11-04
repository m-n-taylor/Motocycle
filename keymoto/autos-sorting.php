<?php
/***
 * The template for displaying sorting autos fields.
 ***/
$data = array_map('esc_attr', $_REQUEST);
$per_page_arr = $order_arr = array();

if (class_exists('PIXAD_Settings')) {

    $Settings = new PIXAD_Settings();
    $options = $Settings->getSettings('WP_OPTIONS', '_pixad_autos_settings', true);
    $per_page = $options['autos_per_page'];
    $order = isset($options['autos_order']) ? $options['autos_order'] : 'date-desc';
    $autos_purpose = (get_post_meta(get_the_ID(), 'pix_page_purpose', true) == "") ? '' : get_post_meta(get_the_ID(), 'pix_page_purpose', true);
    foreach ($data as $key => $val) {
        if (property_exists('PIXAD_Autos', $key) && $key == 'order') {
            $order = $val;
        } elseif (property_exists('PIXAD_Autos', $key) && $key == 'per_page') {
            $per_page = $val;
        }
    }

    $per_page_arr = array(
        9 => esc_html__( '9 items', 'keymoto' ),
        12 => esc_html__( '12 items', 'keymoto' ),
        15 => esc_html__( '15 items', 'keymoto' ),
        18 => esc_html__( '18 items', 'keymoto' ),
        21 => esc_html__( '21 items', 'keymoto' ),
        24 => esc_html__( '24 items', 'keymoto' ),
        27 => esc_html__( '27 items', 'keymoto' ),
        30 => esc_html__( '30 items', 'keymoto' ),
        33 => esc_html__( '33 items', 'keymoto' ),
        36 => esc_html__( '36 items', 'keymoto' ),
        39 => esc_html__( '39 items', 'keymoto' ),
        42 => esc_html__( '42 items', 'keymoto' ),
        45 => esc_html__( '45 items', 'keymoto' ),
        48 => esc_html__( '48 items', 'keymoto' ),
        51 => esc_html__( '51 items', 'keymoto' ),
        -1 => esc_html__( 'All items', 'keymoto' ),
    );
    $order_arr = array(
        'date-desc' => esc_html__('Sort by Last Added', 'keymoto'),
        'date-asc' => esc_html__('Sort by First Added', 'keymoto'),
        '_auto_price-asc' => esc_html__('Sort by Cheap First', 'keymoto'),
        '_auto_price-desc' => esc_html__('Sort by Expensive First', 'keymoto'),
        '_auto_make-asc' => esc_html__('Sort by Make A-Z', 'keymoto'),
        '_auto_make-desc' => esc_html__('Sort by Make Z-A', 'keymoto'),
        '_auto_year-asc' => esc_html__('Sort by Old First', 'keymoto'),
        '_auto_year-desc' => esc_html__('Sort by New First', 'keymoto'),
    );

    ?>



<div class="sorting" id="pix-sorting">

    <div class="sorting__inner">
        <div class="sorting__item">
            <span class="sorting__title"><?php  esc_html_e( 'Show on page', 'keymoto' ); ?></span>
            <div class="select jelect">
                <input id="jelect-page" name="page" value="0" data-text="imagemin" type="text" class="jelect-input">
                <div tabindex="0" role="button" class="jelect-current"><?php echo esc_attr( $per_page_arr[$per_page] ); ?></div>
                <ul class="jelect-options">
                    <li data-val="9" class="jelect-option <?php echo (9 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[9] ); ?></li>
                    <li data-val="12" class="jelect-option <?php echo (12 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[12] ); ?></li>
                    <li data-val="15" class="jelect-option <?php echo (15 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[15] ); ?></li>
                    <li data-val="18" class="jelect-option <?php echo (18 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[18] ); ?></li>
                    <li data-val="21" class="jelect-option <?php echo (21 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[21] ); ?></li>
                    <li data-val="24" class="jelect-option <?php echo (24 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[24] ); ?></li>
                    <li data-val="27" class="jelect-option <?php echo (27 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[27] ); ?></li>
                    <li data-val="30" class="jelect-option <?php echo (30 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[30] ); ?></li>
                    <li data-val="33" class="jelect-option <?php echo (33 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[33] ); ?></li>
                    <li data-val="36" class="jelect-option <?php echo (36 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[36] ); ?></li>
                    <li data-val="39" class="jelect-option <?php echo (39 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[39] ); ?></li>
                    <li data-val="42" class="jelect-option <?php echo (42 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[42] ); ?></li>
                    <li data-val="45" class="jelect-option <?php echo (45 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[45] ); ?></li>
                    <li data-val="48" class="jelect-option <?php echo (48 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[48] ); ?></li>
                    <li data-val="51" class="jelect-option <?php echo (51 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[51] ); ?></li>
                    <li data-val="-1" class="jelect-option <?php echo (-1 == $per_page ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr( $per_page_arr[-1] ); ?></li>
                </ul>
            </div>
        </div>
        <div class="sorting__item">
            <span class="sorting__title"><?php esc_html_e('Sort by', 'keymoto'); ?></span>
            <div class="select jelect">
                <input id="jelect-sort" name="sort" value="0" data-text="imagemin" type="text" class="jelect-input">
                <div tabindex="0" role="button" class="jelect-current"><?php echo esc_attr($order_arr[$order]); ?></div>
                <ul class="jelect-options">
                    <li data-val="date-desc" class="jelect-option <?php echo('date-desc' == $order ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr($order_arr['date-desc']); ?></li>
                    <li data-val="date-asc" class="jelect-option <?php echo('date-asc' == $order ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr($order_arr['date-asc']); ?></li>
                    <li data-val="_auto_price-asc" class="jelect-option <?php echo('_auto_price-asc' == $order ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr($order_arr['_auto_price-asc']); ?></li>
                    <li data-val="_auto_price-desc" class="jelect-option <?php echo('_auto_price-desc' == $order ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr($order_arr['_auto_price-desc']); ?></li>
                    <li data-val="_auto_make-asc" class="jelect-option <?php echo('_auto_make-asc' == $order ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr($order_arr['_auto_make-asc']); ?></li>
                    <li data-val="_auto_make-desc" class="jelect-option <?php echo('_auto_make-desc' == $order ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr($order_arr['_auto_make-desc']); ?></li>
                    <li data-val="_auto_year-asc" class="jelect-option <?php echo('_auto_year-asc' == $order ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr($order_arr['_auto_year-asc']); ?></li>
                    <li data-val="_auto_year-desc" class="jelect-option <?php echo('_auto_year-desc' == $order ? 'jelect-option_state_active' : ''); ?>"><?php echo esc_attr($order_arr['_auto_year-desc']); ?></li>
                </ul>
            </div>
        </div>
        <div class="sorting__item">
            <input type="hidden" id="sort-purpose" name="purpose" value="<?php echo esc_attr($autos_purpose) ?>">
        </div>
        <div class="sorting__item view-by">
            <a href="?view_type=list" class="list"><i class="fl-custom-icon-menu-list-style" aria-hidden="true"></i></a>
            <a href="?view_type=grid" class="grid"><i class="fl-custom-icon-menu-grid-style" aria-hidden="true"></i></a>
        </div>
    </div>
</div><!-- end sorting -->


<?php } ?>
