<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AgencjaWroclawska
 */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/page.twig', $context );

get_footer();
