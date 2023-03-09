<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package AgencjaWroclawska
 */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/404.twig', $context );

get_footer();
