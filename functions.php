<?php
/**
 * AgencjaWroclawska functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AgencjaWroclawska
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function aw_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on AgencjaWroclawska, use a find and replace
		* to change 'aw' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'aw', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu_top' => esc_html__( 'Menu Top', 'aw' ),
			'menu_footer_1' => esc_html__( 'Menu Footer 1', 'aw' ),
			'menu_footer_2' => esc_html__( 'Menu Footer 2', 'aw' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'aw_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'aw_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aw_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aw_content_width', 640 );
}
add_action( 'after_setup_theme', 'aw_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aw_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aw' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aw' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'aw_widgets_init' );


function mind_defer_scripts( $tag, $handle, $src ) {
  $defer = array( 
    'aw-partnerski',
    'aw-lazysizes',
    'aw-main',
    'aw-anime'
  );
  if ( in_array( $handle, $defer ) ) {
     return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
  }
    
    return $tag;
} 
add_filter( 'script_loader_tag', 'mind_defer_scripts', 10, 3 );

/**
 * Enqueue scripts and styles.
 */
function aw_scripts() {
    
    wp_enqueue_style( 'aw-style', get_template_directory_uri() . '/style.css', time() );
    wp_enqueue_style( 'aw-Barlow', 'https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,700;0,900;1,700;1,900&display=swap' );
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style( 'aw-main', get_template_directory_uri() . '/css/main.css' );
	wp_style_add_data( 'aw-style', 'rtl', 'replace' );
	

	//wp_enqueue_script( 'aw-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'aw-lazysizes', get_template_directory_uri() . '/js/lazysizes.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'aw-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, false );
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/js/bootstrap.min.js', array('jquery'), '5.0.2', true);
	wp_enqueue_script( 'aw-anime', get_template_directory_uri() . '/js/anime.min.js', array(), _S_VERSION, false );
    wp_enqueue_script( 'aw-partnerski', get_template_directory_uri() . '/js/partnerski.js', array(), _S_VERSION, true );

//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}
}
add_action( 'wp_enqueue_scripts', 'aw_scripts', 10 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//if ( defined( 'JETPACK__VERSION' ) ) {
//	require get_template_directory() . '/inc/jetpack.php';
//}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'AgencjaWrocławska',
        'menu_title'    => 'Ag. Wrocławska',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Slidery',
        'menu_title'    => 'Slidery',
        'parent_slug'   => 'theme-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Mapy',
        'menu_title'    => 'Mapy',
        'parent_slug'   => 'theme-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Formularze',
        'menu_title'    => 'Formularze',
        'parent_slug'   => 'theme-settings',
    ));
    
}

function admin_style() {
    wp_register_style('admin-style', get_template_directory_uri() . '/css/admin-style.css');
    wp_enqueue_style('admin-style');
}
add_action('admin_enqueue_scripts', 'admin_style');


function wp_change_author_base() {
    global $wp_rewrite;
    $author_slug = 'blog/autor';
    $wp_rewrite->author_base = $author_slug;
    
    //echo '<pre>'.print_r($wp_rewrite).'</pre>';
}
add_action('init', 'wp_change_author_base');

add_filter('wpcf7_autop_or_not', '__return_false');
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control wpcf7-radio(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-list-item first last(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-list-item-label(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

function set_post_type_slug( $args, $post_type ) {
  if ( $post_type == "post" ) {
    $args['rewrite'] = array(
      'slug' => 'blog'
    );
  }
  return $args;
}
add_filter( 'register_post_type_args', 'set_post_type_slug', 20, 2 );

function set_carrier_type_slug( $args, $post_type ) {
  if ( $post_type == "carrier" ) {
    $args['rewrite'] = array(
      'slug' => 'kariera'
    );
  }
  return $args;
}
add_filter( 'register_post_type_args', 'set_carrier_type_slug', 20, 2 );

function custom_post_link( $permalink, $post ) {
    $permalink = get_site_url().'/blog/'.$post->post_name.'/';
    return $permalink;
}
add_filter( 'post_link', 'custom_post_link', 10, 2 );

//function themes_dir_add_rewrites() {
//  $theme_name = next(explode('/themes/', get_stylesheet_directory()));
// 
//  global $wp_rewrite;
//  $new_non_wp_rules = array(
//    'css/(.*)'       => 'wp-content/themes/'. $theme_name . '/css/$1',
//    'js/(.*)'        => 'wp-content/themes/'. $theme_name . '/js/$1',
//    'images/wordpress-urls-rewrite/(.*)'    => 'wp-content/themes/'. $theme_name . '/images/wordpress-urls-rewrite/$1',
//  );
//  $wp_rewrite->non_wp_rules += $new_non_wp_rules;
//}
//add_action('generate_rewrite_rules', 'themes_dir_add_rewrites');

//function change_permalinks( $post_link, $post, $leavename ) {
//    if ( $post->post_type != 'post' ) { return $post_link; }
//    $post_link = str_replace( '/'.$post->post_type.'/', '/whatever/', $post_link );
//    return $post_link;
//}
//add_filter( 'post_type_link', 'change_permalinks', 10, 3 );

add_filter( 'wpseo_json_ld_output', '__return_false' );

add_filter('use_block_editor_for_post', '__return_false');

function acf_wysiwyg_remove_wpautop() {
	remove_filter('acf_the_content', 'wpautop' );
	add_filter( 'acf_the_content', 'nl2br' );
  }
  add_action('acf/init', 'acf_wysiwyg_remove_wpautop');