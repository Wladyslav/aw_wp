<?php /* Template Name: Kontakt */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

$context['employees'] = Timber::get_posts( array(
        'post_type' => 'employees',
        'posts_per_page' => -1,
));

Timber::render('views/kontakt.twig', $context );

get_footer();
