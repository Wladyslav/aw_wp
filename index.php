<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AgencjaWroclawska
 */

global $wp_query;

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

$context['max_pages']   = $wp_query->max_num_pages;
$context['paged']       = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

if($context['paged'] > $context['max_pages']) {
    wp_redirect('/blog/page/'.$context['max_pages'].'/');
    exit;
}

$context['posts'] = Timber::get_posts( array(
        'post_type' => 'post',
        'posts_per_page' => get_query_var('posts_per_page'),
        'orderby' => array(
            'date' => 'DESC'
        ),
        'paged' => $context['paged']
    )
);


Timber::render('views/blog.twig', $context );

get_footer();
