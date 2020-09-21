<?php

// added function

function law_theme_option($name){
	if(defined("FW")) return fw_get_db_settings_option($name);
	else return $name;
}

function law_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return __( 'Please define default parameters in the form of an array.', 'law' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return __( 'Please define an SVG icon filename.', 'law' );
	}

	// Set defaults.
	$defaults = array(
		'icon'     => '',
		'title'    => '',
		'desc'     => '',
		'fallback' => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * Twenty Seventeen doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo law_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo law_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = law_unique_id();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}


if ( ! function_exists( 'law_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function law_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on law, use a find and replace
		 * to change 'law' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'law', get_template_directory() . '/languages' );

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
			'header-menu' => esc_html__( 'Header menu', 'law' ),
			'footer-menu' => esc_html__( 'Footer menu', 'law' ),
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
		add_theme_support( 'custom-background', apply_filters( 'law_custom_background_args', array(
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
add_action( 'after_setup_theme', 'law_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function law_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'law_content_width', 640 );
}
add_action( 'after_setup_theme', 'law_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function law_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'footer', 'law' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'law' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'law_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function law_scripts() {
	wp_enqueue_style( 'law-style', get_stylesheet_uri() );

	wp_enqueue_style( 'law-google-fonts1-fonts', "https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" );

	wp_enqueue_style( 'law-animate-style', get_template_directory_uri() . "/assets/css/animate.css" );

	wp_enqueue_style( 'law-icomoon-style', get_template_directory_uri() . "/assets/css/icomoon.css" );

	wp_enqueue_style( 'law-bootstrap-style', get_template_directory_uri() . "/assets/css/bootstrap.css" );

	wp_enqueue_style( 'law-magnific-popup-style', get_template_directory_uri() . "/assets/css/magnific-popup.css" );

	wp_enqueue_style( 'law-owl-style', get_template_directory_uri() . "/assets/css/owl.carousel.min.css" );

	wp_enqueue_style( 'law-owl-fix-style', get_template_directory_uri() . "/assets/css/owl.theme.default.min.css" );

	wp_enqueue_style( 'law-felxslider-style', get_template_directory_uri() . "/assets/css/flexslider.css" );
	
	wp_enqueue_style( 'law-style-style', get_template_directory_uri() . "/assets/css/style.css" );

	wp_enqueue_style( 'law-law-style', get_template_directory_uri() . "/assets/css/law.css" );

	
	// scripts

	wp_enqueue_script( 'law-modernizr-script', get_template_directory_uri() . "/assets/js/modernizr-2.6.2.min.js" );
	wp_script_add_data('law-modernizr-script', 'conditional', 'lt IE 9');

	// jquery
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js');
	wp_enqueue_script( 'jquery' );

	// easing
	wp_enqueue_script( 'law-jquery-easing-script', get_template_directory_uri() . "/assets/js/jquery.easing.1.3.js", array("jquery"), "", true);

	// bootstrap
	wp_enqueue_script( 'law-bootstrap-script', get_template_directory_uri() . "/assets/js/bootstrap.min.js", array("jquery"), "", true);

	// waypoints
	wp_enqueue_script( 'law-jquery-waypoints-script', get_template_directory_uri() . "/assets/js/jquery.waypoints.min.js", array("jquery"), "", true);

	// stellar
	wp_enqueue_script( 'law-jquery-stellar-script', get_template_directory_uri() . "/assets/js/jquery.stellar.min.js", array("jquery"), "", true);

	// owl-carousel
	wp_enqueue_script( 'law-owl-carousel-script', get_template_directory_uri() . "/assets/js/owl.carousel.min.js", array("jquery"), "", true);

	// jquery-flexslider
	wp_enqueue_script( 'law-jquery-flexslider-script', get_template_directory_uri() . "/assets/js/jquery.flexslider-min.js", array("jquery"), "", true);

	// jquery-countTo
	wp_enqueue_script( 'law-jquery-countTo-script', get_template_directory_uri() . "/assets/js/jquery.countTo.js", array("jquery"), "", true);

	// jquery-magnific-popup
	wp_enqueue_script( 'law-jquery-magnific-popup-script', get_template_directory_uri() . "/assets/js/jquery.magnific-popup.min.js", array("jquery"), "", true);

	// magnific-popup-options
	wp_enqueue_script( 'law-magnific-popup-options-script', get_template_directory_uri() . "/assets/js/magnific-popup-options.js", array("jquery"), "", true);

	// main
	wp_enqueue_script( 'law-main-script', get_template_directory_uri() . "/assets/js/main.js", array("jquery"), "", true);

	wp_localize_script("law-main-script", "law_data", array(
		"theme_path" => get_template_directory_uri()
	));



	// wp_enqueue_script( 'law-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'law-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'law_scripts' );

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

require_once get_template_directory() . '/inc/tgm/tgm.php';

require_once get_template_directory() . "/Law_header_menu.php";












