<?php /* Template Name: Pozycjonowanie lokalne */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

$context['posts'] = Timber::get_posts( array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'orderby' => array(
            'date' => 'DESC'
        ))
);
$context['home_hero_title'] = get_field('home_hero_title');
Timber::render('views/pozycjonowanie-lokalne.twig', $context );

get_footer();
