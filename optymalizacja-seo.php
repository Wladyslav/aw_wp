<?php /* Template Name: Optymalizacja SEO */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/optymalizacja-seo.twig', $context );

get_footer();
