<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AgencjaWroclawska
 */

include(get_template_directory().'/global.php');
$category = get_category( wp_get_post_categories($context['post']->ID)[0] );

$context['menu_top']        = new Timber\Menu('Menu Top');

if(is_single() || is_author()) {
    $context['body_class']      .= 'single';
}
if($context['post']->post_name == 'blog') {
    $context['body_class']      .= 'list default';
}
if($category->slug == 'slownik') {
    $context['body_class']      .= 'list default';
}

if(is_admin_bar_showing()) {
    $context['is_admin'] = 1;
}


//echo '<pre>';
//var_dump( $context );
//echo '</pre>';
Timber::render('views/header.twig', $context );

?>
