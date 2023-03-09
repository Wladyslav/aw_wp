<?php /* Template Name: Google Adwords */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/google-adwords.twig', $context );

get_footer();
