<?php
include(get_template_directory().'/global.php');


$context['menu_footer_1']     = new Timber\Menu('Menu Footer 1');
$context['menu_footer_2']     = new Timber\Menu('Menu Footer 2');
Timber::render('views/footer.twig', $context );

?>
