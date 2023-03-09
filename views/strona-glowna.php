<?php /* Template Name: Home */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

$context['posts'] = Timber::get_posts( array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'orderby' => array(
            'date' => 'DESC'
        ))
);

$context['home-title'] = get_field('home-title');

Timber::render('views/page-home.twig', $context );

get_footer();
