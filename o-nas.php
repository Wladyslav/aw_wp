<?php /* Template Name: O Agencji */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

$context['employees'] = Timber::get_posts( array(
        'post_type' => 'employees',
        'posts_per_page' => -1,
//        'orderby' => array(
//            'date' => 'DESC'
//        )
)
);

Timber::render('views/o-nas.twig', $context );

get_footer();
