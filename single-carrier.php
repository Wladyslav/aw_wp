<?php

include(get_template_directory().'/global.php');

$context['page'] = new Timber\Post();

Timber::render('views/single-carrier.twig', $context );

get_footer();
