<?php
/**
 * append functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package append
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
function append_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on append, use a find and replace
		* to change 'append' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'append', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'append' ),
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
			'append_custom_background_args',
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
add_action( 'after_setup_theme', 'append_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function append_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'append_content_width', 640 );
}
add_action( 'after_setup_theme', 'append_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function append_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'append' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'append' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'append_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function append_scripts() {
	wp_enqueue_style( 'append-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'append-style', 'rtl', 'replace' );
// enqueue styles 
	//fonts
	wp_enqueue_style( 'append-fontgoogleinit', 'https://fonts.googleapis.com', array(), _S_VERSION, "all" );
	wp_enqueue_style( 'append-gstatic', 'https://fonts.gstatic.com', array(), _S_VERSION, "all" );
	
	wp_enqueue_style( 'append-googlefont', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', array(), _S_VERSION, "all" );
	// vendor css 
	wp_enqueue_style( 'append-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), _S_VERSION, "all" );

	wp_enqueue_style( 'append-bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array(), _S_VERSION, "all" );
	wp_enqueue_style( 'append-glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array(), _S_VERSION, "all" );
	wp_enqueue_style( 'append-swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), _S_VERSION, "all" );
	wp_enqueue_style( 'append-aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), _S_VERSION, "all" );
// Template Main CSS File
wp_enqueue_style( 'append-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION, "all" );

//js
	wp_enqueue_script( 'append-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'append-bootstrapjs', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true );

	wp_enqueue_script( 'append-glightboxjs', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array('jquery'), _S_VERSION, true );

	wp_enqueue_script( 'append-purecounter_vanilla', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array('jquery'), _S_VERSION, true );

	wp_enqueue_script( 'append-isotope', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array('jquery'), _S_VERSION, true );

	wp_enqueue_script( 'append-swiperjs', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'append-aosjs', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'append-mainjs', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'append_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

