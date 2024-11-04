<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}?>

<!-- Main holder -->
<div id="fl-main-holder">
	<div class="top-bar">
		<div class="container">
			<div class="first-row">
				<h5 class="koptekst">
				Inkoop, verkoop en onderhoud van o.a. de volgende merken
			    </h5>
			</div>
			<ul class="brand-logos">
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/Benelli_2016_logo.png"></a>
			    <li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/Yamaha-logo.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/suzuki-logo-car-brands-6686.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/Harley-Davidson-logo.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/Kawasaki-logo.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/honda-png-logo-32847.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/MotoGuzzi-logo.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/bmw-logo-2.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/09/triumph.png"></a>
			    <li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/11/ducati-logo-4A395CFB95-seeklogo.com_.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2023/11/KTM-Logo.svg.png"></a>
				<li class="logo-item"><a href="#"><img src="/wp-content/uploads/2024/01/royal-enfield-logo.png"></a>
			</ul>
		</div>
	</div>
<?php get_template_part('template-parts/preloader/preloader');
      get_template_part('template-parts/navigation/navigator_content');
      // Header
$header_enable = 'enable';
if(keymoto_get_theme_mod('page_header_custom_style',true ) == 'custom' ) {
    $header_enable = keymoto_get_theme_mod('page_header', true);
}
if (keymoto_get_theme_mod('post_single_header_custom_style', true) == 'custom') {
    $header = keymoto_get_theme_mod('post_single_header', true);
}
if(keymoto_get_theme_mod('page_header_custom_style',true ) == 'custom' ) {
    $header_enable = keymoto_get_theme_mod('page_header', true);
}
if(is_page_template('group-home')){
	$header_enable = 'disable';
}

if($header_enable !='disable' ) {
    get_template_part('template-parts/header/header_content');
}
?>

