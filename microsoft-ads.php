<?php /* Template Name: Microsoft Ads */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/microsoft-ads.twig', $context );

get_footer();
