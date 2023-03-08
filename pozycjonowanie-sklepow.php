<?php /* Template Name: Pozycjonowanie sklepów */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

$context['posts'] = Timber::get_posts( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => array(
            'date' => 'DESC'
        ))
);

Timber::render('views/pozycjonowanie-sklepow.twig', $context );

get_footer();
