<?php /* Template Name: Social Media */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/social-media.twig', $context );

get_footer();
