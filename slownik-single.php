<?php /* Template Name: Słownik (Co to?) */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/slownik-single.twig', $context );

get_footer();
