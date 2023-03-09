<?php
include('wp-load.php');

$context = Timber::context();
$context['post']        =   new TimberPost();

//$context['languages']   =   language_attributes();
//$context['body_class']  =   body_class();
$context['site_url']        =   get_site_url();
$context['body_class']      =   get_field('body_class');
$context['site']            =   get_fields();
$context['option']          =   get_fields( 'option' );