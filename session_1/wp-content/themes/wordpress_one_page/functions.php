<?php
/**
 * wordpress_one_page functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wordpress_one_page
 */

if ( ! function_exists( 'wordpress_one_page_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wordpress_one_page_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wordpress_one_page, use a find and replace
		 * to change 'wordpress_one_page' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wordpress_one_page', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'wordpress_one_page' ),
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
		add_theme_support( 'custom-background', apply_filters( 'wordpress_one_page_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wordpress_one_page_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordpress_one_page_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordpress_one_page_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpress_one_page_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordpress_one_page_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wordpress_one_page' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wordpress_one_page' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wordpress_one_page_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordpress_one_page_scripts() {
	wp_enqueue_style( 'wordpress_one_page-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wordpress_one_page-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wordpress_one_page-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordpress_one_page_scripts' );

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



function fullscreen_page_func( $atts ) {
	// $atts = shortcode_atts( array(
	// 	'foo' => 'no foo',
	// 	'baz' => 'default baz'
	// ), $atts, 'fullscreen_page' );
		$html = "";


		$html .= '<section class="background-section" style="background-image: url(' . $atts['background'] . ');">';
		$html .= '<div class="centered-vertically">';
		$html .= '<div class="container">';
		$html .= '<div class="col-6"></div>';
		$html .= '<div class="col-6">';
		$html .= '<h1>' . $atts['title'] . '</h1>';
		$html .= '<p>' . $atts['paragraph'] . '</p>';
		$html .= '<a href="' . $atts['link_url'] . '" class="btn-active">';
		$html .= $atts['link_text'];
		$html .= '</a>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</section>';



	return $html;
}
add_shortcode( 'fullscreen', 'fullscreen_page_func' );
