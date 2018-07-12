<?php
/**
 * labase functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package labase
 */

// require_once dirname( __FILE__ ) . '/inc/plugins.php';

if ( ! function_exists( 'labase_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function labase_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on labase, use a find and replace
		 * to change 'labase' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'labase', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Menu principal', 'labase' ),
			'menu-2' => esc_html__( 'Menu social', 'labase' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			//'search-form',
			//'comment-form',
			//'comment-list',
			'gallery',
			'caption',
		) );

		//support social image format to improve shares
		add_image_size( 'social', 1200, 627, true );

	}
endif;
add_action( 'after_setup_theme', 'labase_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function labase_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'labase' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'labase' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'labase_widgets_init' );

/**
* SUPRESSION DES TAGS
* suppression de la metabox des tags et des formats sur la page d'ajout/edition de posts
*/
function theme_remove_tags_metabox() {
  remove_meta_box('tagsdiv-post_tag', 'post', 'side');
  remove_meta_box('tagsdiv-post_tag', 'slider', 'side');
}
add_action('admin_menu', 'theme_remove_tags_metabox');

// DELETE WORDPRESS BAR
function theme_remove_admin_bar(){
  return false;
}
add_filter( 'show_admin_bar' , 'theme_remove_admin_bar');

// ADMIN COPYRIGHT
function theme_remove_footer_admin(){
  echo 'R&eacute;alisation : <a href="http://giboo.fr/" title="Giboo" target="_blank">Giboo</a> - Propulsion Wordpress';
}
add_filter('admin_footer_text','theme_remove_footer_admin');

// SVG upload
function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes' );

// GENERATE Hamburger menu
function get_hamburger() {
	$html='
	<div class="bars">
		<span class="bar top fat"></span>
		<span class="bar top thin"></span>
		<span class="bar bottom thin"></span>
		<span class="bar bottom fat"></span>
	</div>
';
	return $html;
}

/**
 * Enqueue scripts and styles.
 */
function labase_scripts() {
	//wp_enqueue_style( 'labase-base-style', get_stylesheet_uri() );
	wp_enqueue_style( 'labase-style', get_template_directory_uri().'/css/main.less' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'responsive', get_template_directory_uri() . '/js/responsive.js');
	wp_enqueue_script( 'theme', get_template_directory_uri() . '/js/theme.js');
}
add_action( 'wp_enqueue_scripts', 'labase_scripts' );



function get_categories_list_shortcode( $params, $content = null ) {
  extract( shortcode_atts( array(
    'id'     => '',
  ), $params, 'categories_list' ) );
	$categories =  get_categories('child_of='.$id);
	$html='';
	include(locate_template('template-parts/content-categories.php', false, false));
	return $html;
}
add_shortcode( 'categories_list', 'get_categories_list_shortcode' );


/**
 * Implement responsive images.
 */
require get_template_directory() . '/inc/responsive-images.php';
