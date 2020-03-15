<?php
/**
 * Flex Business Pro Theme Customizer
 *
 * @package Flex Business Pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flex_business_pro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/active-callback.php';

	// Load topbar sections option.
	include get_template_directory() . '/inc/customizer/topbar.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-section.php';

	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';
	
}
add_action( 'customize_register', 'flex_business_pro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function flex_business_pro_customize_preview_js() {
	wp_enqueue_script( 'flex_business_pro_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'flex_business_pro_customize_preview_js' );
/**
 *
 */
function flex_business_pro_customize_backend_scripts() {

	wp_enqueue_style( 'flex-business-pro-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'flex-business-pro-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-scipt.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'flex_business_pro_customize_backend_scripts', 10 );

if ( ! function_exists( 'flex_business_pro_inline_css' ) ) :
	// Add Custom Css
	function flex_business_pro_inline_css() {
		
		$custom_blue_color = flex_business_pro_get_option( 'custom_blue_color' );
		$custom_topbar_bg_color = flex_business_pro_get_option( 'custom_topbar_bg_color' );
		$custom_header_bg_color = flex_business_pro_get_option( 'custom_header_bg_color' );
		$custom_footer_bg_color = flex_business_pro_get_option( 'custom_footer_bg_color' );
		$custom_site_title_color = flex_business_pro_get_option( 'custom_site_title_color' );
		$custom_site_tagline_color = flex_business_pro_get_option( 'custom_site_tagline_color' );

		$custom_blue_color_css = '';
		if ( ( '#033d75' == $custom_blue_color ) ) {
			$custom_blue_color = '';
		}

		$custom_topbar_bg_color_css = '';
		if ( ( '#222' == $custom_topbar_bg_color ) ) {
			$custom_topbar_bg_color = '';
		}

		$custom_header_bg_color_css = '';
		if ( ( '#222' == $custom_header_bg_color ) ) {
			$custom_header_bg_color = '';
		}

		$custom_footer_bg_color_css = '';
		if ( ( '#222' == $custom_footer_bg_color ) ) {
			$custom_footer_bg_color = '';
		}

		$custom_site_title_color_css = '';
		if ( ( '#000' == $custom_site_title_color ) ) {
			$custom_site_title_color = '';
		}

		$custom_site_tagline_color_css = '';
		if ( ( '#000' == $custom_site_tagline_color ) ) {
			$custom_site_tagline_color = '';
		}

		if ( ! empty( $custom_blue_color ) ) {
			$custom_blue_color_css = '

			/*--------------------------------------------------------------
			# Blue Color
			--------------------------------------------------------------*/
			#respond input[type="submit"],
			.widget_search form.search-form button.search-submit,
			input[type="submit"],
			.wpcf7 input[type="submit"],
			.tags-links a:hover,
			.tags-links a:focus,
			.reply a,
			.btn,
			.slick-prev:hover,
			.slick-next:hover,
			.slick-prev:focus,
			.slick-next:focus,
			.slick-dots li.slick-active button:before,
			#additional-info article .fa,
			#testimonial .slick-dots li.slick-active button:before,
			#colophon .widget_search form.search-form button.search-submit {
			    background-color: '.esc_attr( $custom_blue_color ).';
			}

			a,
			.site-title a:hover,
			.site-title a:focus,
			.main-navigation ul.nav-menu > li:hover > a,
			.main-navigation ul.nav-menu .current_page_item > a,
			.main-navigation ul.nav-menu .current-menu-item > a,
			.main-navigation ul.nav-menu .current_page_ancestor > a,
			.main-navigation ul.nav-menu .current-menu-ancestor > a,
			#secondary a:hover,
			#secondary a:focus,
			.blog-posts-wrapper .entry-title a:hover,
			.blog-posts-wrapper .entry-title a:focus,
			.entry-meta a:hover,
			.entry-meta a:focus,
			.entry-meta a:hover:before,
			.entry-meta a:focus:before,
			#additional-info .entry-title a:hover,
			#additional-info .entry-title a:focus,
			#services .entry-title a:hover,
			#services .entry-title a:focus,
			.white-topbar #top-bar .widget_address_block ul li a:hover,
			.white-topbar #top-bar .widget_address_block ul li a:focus {
			    color: '.esc_attr( $custom_blue_color ).';
			}

			#secondary .widget > ul li:first-child,
			#secondary .widget > ul li:hover,
			#secondary .widget_nav_menu ul li:first-child,
			#secondary .widget_nav_menu ul li:hover {
			    border-left-color: '.esc_attr( $custom_blue_color ).';
			}

			.tags-links a:hover,
			.tags-links a:focus {
			    border-color: '.esc_attr( $custom_blue_color ).';
			}

			#additional-info article .fa:hover:after {
    			box-shadow: 0 0 0 2px '.esc_attr( $custom_blue_color ).';
			}

			@media screen and (min-width: 1024px) {
				.main-navigation ul ul li:hover > a {
			        background-color: '.esc_attr( $custom_blue_color ).';
			        color: #fff;
			    }
			}';
		}

		if ( ! empty( $custom_site_title_color ) ) {
			$custom_site_title_color_css = '
			.site-title a {
				color: '.esc_attr( $custom_site_title_color ).';
			}';
		}

		if ( ! empty( $custom_site_tagline_color ) ) {
			$custom_site_tagline_color_css = '
			.site-description {
				color: '.esc_attr( $custom_site_tagline_color ).';
			}';
		}

		if ( ! empty( $custom_topbar_bg_color ) ) {
			$custom_topbar_bg_color_css = '
			#top-bar {
				background-color: '.esc_attr( $custom_topbar_bg_color ).';
			}';
		}

		if ( ! empty( $custom_header_bg_color ) ) {
			$custom_header_bg_color_css = '
			#masthead {
				background-color: '.esc_attr( $custom_header_bg_color ).';
			}';
		}

		if ( ! empty( $custom_footer_bg_color ) ) {
			$custom_footer_bg_color_css = '
			#colophon {
				background-color: '.esc_attr( $custom_footer_bg_color ).';
			}';
		}

		$css = $custom_blue_color_css;	
		$site_title_css = $custom_site_title_color_css;
		$site_tagline_css = $custom_site_tagline_color_css;
		$topbar_css = $custom_topbar_bg_color_css;
		$header_css = $custom_header_bg_color_css;	
		$footer_css = $custom_footer_bg_color_css;			

		wp_add_inline_style( 'flex-business-pro-style', $css );
		wp_add_inline_style( 'flex-business-pro-style', $site_title_css );
		wp_add_inline_style( 'flex-business-pro-style', $site_tagline_css );
		wp_add_inline_style( 'flex-business-pro-style', $topbar_css );
		wp_add_inline_style( 'flex-business-pro-style', $header_css );
		wp_add_inline_style( 'flex-business-pro-style', $footer_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'flex_business_pro_inline_css', 10 );

