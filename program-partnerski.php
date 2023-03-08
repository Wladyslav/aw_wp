<?php /* Template Name: Program partnerski */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/program-partnerski.twig', $context );

get_footer();
