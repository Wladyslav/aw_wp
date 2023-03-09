<?php /* Template Name: Słownik SEO */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/slownik.twig', $context );

get_footer();
