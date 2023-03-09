<?php /* Template Name: Cennik pozycjonowania */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/cennik-pozycjonowania.twig', $context );

get_footer();
