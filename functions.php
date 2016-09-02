<?php
/**
 * DubsPress functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DubsPress
 */

 /** Nav walker for foundation menus **/
require_once('inc/wp_bootstrap_navwalker.php');
 
if ( ! function_exists( 'dubspress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dubspress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on DubsPress, use a find and replace
	 * to change 'dubspress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dubspress', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'dubspress' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dubspress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/***************************************************************/
	/*                                                             */
	/*   Add support for Featured Image option                     */
	/*   add_image_size( '71-width-71-height', 71 , 71, true)      */
	/*   add_image_size('300-width-unlimited-height', 300, 9999)   */
	/*                                                             */
	/***************************************************************/
	add_image_size('single', 705, 9999, false);
	add_image_size('single-large', 1280, 720, true);
	add_image_size('single-small', 640, 360, true);
	add_image_size('grid', 360, 9999, false);	
	
}
endif;
add_action( 'after_setup_theme', 'dubspress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dubspress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dubspress_content_width', 640 );
}
add_action( 'after_setup_theme', 'dubspress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dubspress_widgets_init() {
	
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name'          => esc_html__( 'Archive/Default', 'dubspress' ),
			'id'            => 'archive-widget',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name'          => 'Search',
			'id'            => 'serch-widget',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	if (function_exists('register_sidebar')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Contact', 'dubspress' ),
			'id'            => 'contact-widget',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	if (function_exists('register_sidebar')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget 1', 'dubspress' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add widgets here.', 'dubspress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	if (function_exists('register_sidebar')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget 2', 'dubspress' ),
			'id'            => 'footer-widget-2',
			'description'   => esc_html__( 'Add widgets here.', 'dubspress' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'dubspress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dubspress_scripts() {
	//Styles
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'dubspress-style', get_stylesheet_uri() );//primary theme stylesheet
	//Scripts
	wp_enqueue_script( 'dubspress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'dubspress-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '3.3.6', false );
	wp_enqueue_script( 'dubspress-js', get_template_directory_uri() . '/js/dubspress.js', array('jquery'), false, false );
	wp_enqueue_script( 'header-js', get_template_directory_uri() . '/js/header.js', array('jquery', 'dubspress-js', 'bootstrap-js' ), false, false );
	wp_enqueue_script( 'footer-js', get_template_directory_uri() . '/js/footer.js', array('jquery', 'dubspress-js'), false, true );
	
	//register for conditionals
	wp_register_script( 'infinitescroll-js', get_template_directory_uri() . '/js/jquery.infinitescroll.js', array('jquery'), false, true );
	wp_register_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.js', array('jquery'), false, true );
	wp_register_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array('jquery'), false, true );
	wp_register_script( 'home-js', get_template_directory_uri() . '/js/home.js', array('jquery', 'dubspress-js', 'infinitescroll-js', 'isotope-js'), false, true );
	
	//setup ajax vars
	$ajax_var = array(
		'ajaxurl'		=>	get_template_directory_uri(),
		'posts_number'	=>	get_option( 'posts_per_page' ),
		'post_columns'	=>	absint( get_post_meta( get_option( 'page_for_posts' ), 'dubspress_post_columns_display', true ) ), //get cols as int
		'post_title_display' => get_post_meta( get_option( 'page_for_posts' ), 'dubspress_post_title_display', true )
	);
	wp_localize_script( 'home-js', 'ajax_var', $ajax_var );
	
	if ( is_home() ){
		wp_enqueue_script( 'infinitescroll-js' );
		wp_enqueue_script( 'isotope-js' );
		wp_enqueue_script( 'imagesloaded-js' );
		wp_enqueue_script( 'home-js' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dubspress_scripts' );


/* Add Infinite Scroll JS class to pagination links */
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_prev_attributes');
function posts_link_attributes() {
	return 'class="next border-effect"';
}

function posts_link_prev_attributes() {
	return 'class="previous border-effect"';
}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

