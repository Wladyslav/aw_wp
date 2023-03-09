<?php /* Template Name: Pozycjonowanie stron Toruń */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/pozycjonowanie-stron-torun.twig', $context );

get_footer();
