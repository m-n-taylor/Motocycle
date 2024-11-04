<?php
get_header();
$sidebar_float = 'disable';
$css_classes[] = $wrapper_attributes[] = $post_wrapper_css_classes[]='';

$blog_html_div = $animation_type = $animation_delay = '';

$blog_style = keymoto_get_theme_mod('blog_style');


if ( is_active_sidebar( 'main-sidebar' ) and keymoto_get_theme_mod('blog_archive_sidebar_position') !='disable' ) {
    $sidebar_float = keymoto_get_theme_mod('blog_archive_sidebar_position');
}

if($sidebar_float !='disable'){
    $sidebar_float =='right' ? $css_classes[] = 'col-md-8 right-sidebar' : $css_classes[] = 'col-md-8 left-sidebar';
} else {
    $css_classes[] = 'col-md-12';
}
if($blog_style =='standard'){
    $post_wrapper_css_classes[] = 'fl-blog-archive-standard-style';
} else {
    $post_wrapper_css_classes[] = 'fl-blog-archive-grid-style';
}
// Animation
$post_animation = keymoto_get_theme_mod('blog_animation');
if (!empty($post_animation) and ($post_animation != 'disable')) {
    $post_wrapper_css_classes[] = 'fl-animated-item-velocity';
    $wrapper_attributes[]       = 'data-animate-type="' . $post_animation . '"';
    $wrapper_attributes[]       = 'data-item-for-animated=".fl-post--item"';
}

$css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $css_classes ) ) ) );

$post_wrapper_css_class = preg_replace( '/\s+/', ' ', implode( ' ', array_filter( array_unique( $post_wrapper_css_classes ) ) ) );

?>
<!--Padding Top Start-->
<?php if (keymoto_get_theme_mod('blog_archive_padding_top', true) != 'disable') { ?>
    <div class="fl-page-padding top"></div>
<?php } ?>
<!--Padding Top End-->
<!-- Content -->
<div class="container">
    <div class="fl-blog-post-div row">
        <!--Left sidebar -->
        <?php if($sidebar_float == 'left'){
            get_template_part( 'sidebar');
        } ?>
        <!--Left sidebar End-->

        <div class="<?php echo esc_attr(trim($css_class)); ?>">
            <div class="post-archive-wrapper <?php echo esc_attr(trim($post_wrapper_css_class)); ?>" <?php echo implode(' ', $wrapper_attributes); ?>>
                <?php if (have_posts()) : while (have_posts()) : the_post();
                    get_template_part('template-parts/blog-style/content-blog-style', $blog_style);
                endwhile;
                // If no content, include the "No posts found" template.
                else : get_template_part('template-parts/content', 'none'); endif; ?>
            </div>
            <?php get_template_part( 'template-parts/content','pagination'); ?>
        </div>
        <!--Right sidebar -->
        <?php if($sidebar_float == 'right'){
            get_template_part( 'sidebar');
        } ?>
        <!--Right sidebar End-->
    </div>
</div>
<!-- Content End-->
<!--Padding Bottom Start-->
<?php if (keymoto_get_theme_mod('blog_archive_padding_bottom', true) != 'disable') { ?>
    <div class="fl-page-padding bottom"></div>
<?php } ?>
<!--Padding Bottom End-->

<?php get_footer(); ?>
