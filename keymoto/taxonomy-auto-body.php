<?php 
/* The taxonomy for displaying autos by body type. */
global $post, $PIXAD_Autos;
$Query = false;
$orderby_arr = array('date', 'title');
$data = array_map( 'esc_attr', $_REQUEST );
$args = array();
foreach($data as $key=>$val){
    if( property_exists('PIXAD_Autos', $key) && $key == 'order' ){
        $temp = explode('-', $val);

        if(isset($temp[0]) && in_array($temp[0], $orderby_arr)){
            $PIXAD_Autos->orderby = $temp[0];
            $PIXAD_Autos->order = strtoupper($temp[1]);
            $PIXAD_Autos->metakey = '';
        }
        elseif(isset($temp[0]) && !in_array($temp[0], $orderby_arr)){
            $PIXAD_Autos->orderby = !in_array($temp[0], array('_auto_price','_auto_year')) ? 'meta_value' : 'meta_value_num';
            $PIXAD_Autos->order = strtoupper($temp[1]);
            $PIXAD_Autos->metakey = $temp[0];
        }
    } elseif( property_exists('PIXAD_Autos', $key) && $key == 'per_page' ) {
        $args[$key] = $val;
    } elseif( $key != 'action' && $key != 'nonce'){
        $args[$key] = $val;
    }
}

$args['body'] = get_queried_object()->slug;

$Query = $args;

$custom = isset ($wp_query) ? get_post_custom($wp_query->get_queried_object_id()) : '';
$layout = isset ($custom['pix_page_layout']) ? $custom['pix_page_layout'][0] : '2';
$sidebar = isset ($custom['pix_selected_sidebar'][0]) ? $custom['pix_selected_sidebar'][0] : 'auto-sidebar-1';

if (!is_active_sidebar($sidebar)) $layout = '1';

if (class_exists('PIXAD_Settings')) {

	$Settings   = new PIXAD_Settings();
	$settings   = $Settings->getSettings( 'WP_OPTIONS', '_pixad_autos_settings', true );
	$list_style = $settings['autos_list_style'];

	$args = $PIXAD_Autos->Query_Args( $Query );


	$url = Pix_Autos::helping_form_server_url( '' );
}

$list_class = '';
if ( strstr( $url, '?view_type=list' ) ) {
	$list_class = 'list taxonomy-wrap-auto';
	$list_template = 'autos';
} elseif ( strstr( $url, '?view_type=grid' ) ) {
	$list_class = 'page-builder-resent-moto-item-wrap taxonomy-wrap-auto';
	$list_template = 'autosgrid';
} elseif ( $list_style == 'Grid' ) {
	$list_class = 'page-builder-resent-moto-item-wrap taxonomy-wrap-auto';
	$list_template = 'autosgrid';
} elseif ( $list_style == 'List' ) {
	$list_class = 'list taxonomy-wrap-auto';
	$list_template = 'autos';
} else{
	$list_class = 'page-builder-resent-moto-item-wrap taxonomy-wrap-auto';
	$list_template = 'autosgrid';
}

?>

<?php get_header();?>

<div class="container category-listing">
    <div class="row">

        <?php if(get_queried_object()->description != '') : ?>
        <div class="rtd"> <?php if(function_exists('pix_autodealer_output_info')){
                echo pix_autodealer_output_info(get_queried_object()->description);}?></div>
        <?php endif; ?>

        <?php keymoto_show_sidebar('left', $custom, 1, $sidebar) ?>

        <div class="<?php if ($layout == 1):?>col-md-12<?php else:?>col-md-9<?php endif;?>">


            <?php get_template_part( 'autos', 'sorting' ); ?>

            <div class="pix-dynamic-content">

                <?php get_template_part( 'autos', 'loader' ); ?>

                <div id="pixad-listing" class="<?php echo $list_class; ?>">

                    <?php
                    $wp_query = new WP_Query( $PIXAD_Autos->Query_Args( $Query ) );
                    get_template_part( 'loop', $list_template );

                    echo pixad_wp_pagenavi()
                    ?>

                </div>

            </div>
        </div><!-- end col -->

        <?php keymoto_show_sidebar('right', $custom, 1, $sidebar) ?>

    </div><!-- end row -->
</div>

<?php get_footer();?>
