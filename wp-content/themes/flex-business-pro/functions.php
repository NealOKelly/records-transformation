<?php
/**
 * Flex Business Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Flex Business Pro
 */

if ( ! function_exists( 'flex_business_pro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function flex_business_pro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Flex Business Pro, use a find and replace
	 * to change 'flex-business-pro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'flex-business-pro', get_template_directory() . '/languages' );

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
	add_image_size( 'flex-business-pro-blog', 360, 270, true);
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'flex-business-pro' ),
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo' , array(
		'height'		=>45,	
		'width'			=>45,	
		'flex-height'	=>true,	
		'flex-width'	=>true,
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'flex_business_pro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add WooCommerce support
	add_theme_support( 'woocommerce' );
	
	if ( class_exists( 'WooCommerce' ) ) {
    	global $woocommerce;

    	if( version_compare( $woocommerce->version, '3.0.0', ">=" ) ) {
      		add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
  	}

  	if( is_admin() ) {
        require get_template_directory() . '/updater/theme-updater.php';
    }
}
endif;
add_action( 'after_setup_theme', 'flex_business_pro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flex_business_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'flex_business_pro_content_width', 640 );
}
add_action( 'after_setup_theme', 'flex_business_pro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function flex_business_pro_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'flex-business-pro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'flex-business-pro' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'flex-business-pro' ), 1 ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'flex-business-pro' ), 2 ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'flex-business-pro' ), 3 ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => sprintf( esc_html__( 'Footer %d', 'flex-business-pro' ), 4 ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'flex_business_pro_widgets_init' );

/**
 * Register custom fonts.
 */
function flex_business_pro_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Montserrat:300,400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Roboto Slab, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto Slab font: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Roboto Slab:400,700';
	}

	if ( 'off' !== _x( 'on', 'Oxygen: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Oxygen:400,700';
	}
	
	if ( 'off' !== _x( 'on', 'Raleway: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Raleway:300,400,500,600,700';
	}

	if ( 'off' !== _x( 'on', 'Poppins: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Poppins:300,400,500,600';
	}

	if ( 'off' !== _x( 'on', 'Open Sans: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Open Sans:300,400,500,600,700';
	}

	if ( 'off' !== _x( 'on', 'Lato: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Lato:300,400,700';
	}

	if ( 'off' !== _x( 'on', 'Ubuntu: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Ubuntu:300,400,700';
	}

	if ( 'off' !== _x( 'on', 'Playfair Display: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Playfair Display:400,700';
	}

	if ( 'off' !== _x( 'on', 'Lora: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Lora:400,700';
	}

	if ( 'off' !== _x( 'on', 'Titillium Web: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Titillium Web:300,400,600,700';
	}

	if ( 'off' !== _x( 'on', 'Muli: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Muli:300,400,600,700';
	}

	if ( 'off' !== _x( 'on', 'Oxygen: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Oxygen:300,400,700';
	}

	if ( 'off' !== _x( 'on', 'Nunito Sans: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Nunito Sans:300,400,600,700';
	}

	if ( 'off' !== _x( 'on', 'Maven Pro: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Maven Pro:400,500,700';
	}

	if ( 'off' !== _x( 'on', 'Cairo: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Cairo:300,400,700';
	}

	if ( 'off' !== _x( 'on', 'Philosopher: on or off', 'flex-business-pro' ) ) {
		$fonts[] = 'Philosopher:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function flex_business_pro_scripts() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$fonts_url = flex_business_pro_fonts_url();
	$primary_color = flex_business_pro_get_option( 'primary_color' );
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'flex-business-pro-google-fonts', $fonts_url, array(), null );
	}	

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome' . $min . '.css', '', '4.7.0' );

	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() .'/assets/css/slick-theme' . $min . '.css', '', 'v2.2.0');

	wp_enqueue_style( 'slick-css', get_template_directory_uri() .'/assets/css/slick' . $min . '.css', '', 'v1.8.0');

	wp_enqueue_style( 'flex-business-pro-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . $min . '.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/assets/js/jquery.matchHeight' . $min . '.js', array('jquery'), '2017417', true );

	wp_enqueue_script( 'flex-business-pro-navigation', get_template_directory_uri() . '/assets/js/navigation' . $min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'flex-business-pro-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'flex-business-pro-custom-js', get_template_directory_uri() . '/assets/js/custom' . $min . '.js', array('jquery'), '20151215', true );  

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'flex_business_pro_scripts' );

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

/**
 * OCDI plugin demo importer compatibility.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
    require get_template_directory() . '/inc/demo-import.php';
}
