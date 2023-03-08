<?php /* Template Name: Polityka prywatności */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

Timber::render('views/polityka-prywatnosci.twig', $context );

get_footer();
