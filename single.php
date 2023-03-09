<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AgencjaWroclawska
 */

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

$context['author_id'] = get_post_field( 'post_author', $context['page']->post_id );
$context['author_name'] = get_the_author_meta( 'display_name', $context['author_id'] );
$context['author_picture'] = get_field('profil_picture', 'user_'.$context['author_id']);
$context['author_linkedin'] = get_field('linkedin', 'user_'.$context['author_id']);
$context['author_position'] = get_field('position', 'user_'.$context['author_id']);
$context['author_profile_link'] = get_author_posts_url($context['author_id']);

$context['posts'] = Timber::get_posts( array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'orderby' => array(
            'date' => 'DESC'
        ))
);


Timber::render('views/blog-single.twig', $context );

get_footer();

