<?php /* Template Name: Case Study */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();



Timber::render('views/case-study.twig', $context );

get_footer();
