<?php /* Template Name: Pozycjonowanie stron */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/pozycjonowanie-stron.twig', $context );

get_footer();
