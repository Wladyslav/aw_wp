<?php /* Template Name: Konsultacje SEO */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/konsultacje-seo.twig', $context );

get_footer();
