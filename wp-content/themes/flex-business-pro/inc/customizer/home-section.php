<?php
/**
 * Home Page Options.
 *
 * @package Flex Business Pro
 */

$default = flex_business_pro_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Front Page Sections', 'flex-business-pro' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/home-sections/slider.php';
require get_template_directory() . '/inc/customizer/home-sections/additional-info.php';
require get_template_directory() . '/inc/customizer/home-sections/cta.php';
require get_template_directory() . '/inc/customizer/home-sections/gallery.php';
require get_template_directory() . '/inc/customizer/home-sections/counter.php';
require get_template_directory() . '/inc/customizer/home-sections/services.php';
require get_template_directory() . '/inc/customizer/home-sections/team.php';
require get_template_directory() . '/inc/customizer/home-sections/testimonial.php';
require get_template_directory() . '/inc/customizer/home-sections/blog.php';