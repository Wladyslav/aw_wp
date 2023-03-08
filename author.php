<?php

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

$context['author'] = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
$context['author_picture'] = get_field('profil_picture', 'user_'.$context['author']->ID);
$context['author_linkedin'] = get_field('linkedin', 'user_'.$context['author']->ID);

$context['posts'] = Timber::get_posts( array(
        'post_type' => 'post',
        'author' => $context['author']->ID,
        'posts_per_page' => 4,
        'orderby' => array(
            'date' => 'DESC'
        ))
);

Timber::render('views/author.twig', $context );

get_footer();

