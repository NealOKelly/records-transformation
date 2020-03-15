<?php
/**
 * Default theme options.
 *
 * @package Flex Business Pro
 */

if ( ! function_exists( 'flex_business_pro_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function flex_business_pro_get_default_theme_options() {

	$defaults = array();

	$defaults['show_header_contact_info'] 	= true;
    $defaults['header_email']             	= __( 'info@creativthemes.com','flex-business-pro' );
    $defaults['header_phone' ]            	= __( '+1-541-754-3010','flex-business-pro' );
    $defaults['header_location' ]           = __( 'London, UK','flex-business-pro' );
    $defaults['show_header_social_links'] 	= true;
    $defaults['header_social_links']		= array();

	// Featured Slider Section
	$defaults['disable_featured_slider']	= true;
	$defaults['number_of_sr_items']			= 4;
	$defaults['sr_content_type']			= 'sr_page';

	// Our Service Section
	$defaults['disable_service_section']	= true;
	$defaults['service_title']	   	 		= esc_html__( 'Our Services', 'flex-business-pro' );
	$defaults['number_of_ss_column']		= 4;
	$defaults['number_of_ss_items']			= 4;
	$defaults['ss_content_type']			= 'ss_page';

	// Our Team Section
	$defaults['disable_team_section']		= true;
	$defaults['team_title']	   	 			= esc_html__( 'Team Members', 'flex-business-pro' );
	$defaults['number_of_ts_column']		= 4;
	$defaults['number_of_ts_items']			= 4;
	$defaults['ts_content_type']			= 'ts_page';

	// Why Choose Us Section
	$defaults['disable_additional_info_section']	= true;
	$defaults['additional_info_section_title']	   	= esc_html__( 'Our Features', 'flex-business-pro' );
	$defaults['number_of_column']					= 4;
	$defaults['number_of_items']					= 4;
	$defaults['ad_content_type']					= 'ad_page';

	//Counter Section	
	$defaults['disable_counter_section']	= true;
	$defaults['number_of_counter']			= 1;
	$defaults['background_counter_section']	= get_template_directory_uri() .'/assets/images/default-header.jpg';

	//Cta Section	
	$defaults['disable_cta_section']	   	= true;
	$defaults['background_cta_section']		= get_template_directory_uri() .'/assets/images/default-header.jpg';
	$defaults['cta_small_description']	   	= esc_html__( 'Need More features?', 'flex-business-pro' );
	$defaults['cta_description']	   	 	= esc_html__( 'Get Accesss To All Features of Flex', 'flex-business-pro' );
	$defaults['cta_button_label']	   	 	= esc_html__( 'Purchase Now', 'flex-business-pro' );
	$defaults['cta_button_url']	   	 		= '#';

	// Gallery Section
	$defaults['disable_gallery_section']	= true;
	$defaults['gallery_title']	   	 		= esc_html__( 'Amazing Projects', 'flex-business-pro' );
	$defaults['number_of_gy_column']		= 4;
	$defaults['number_of_gy_items']			= 4;
	$defaults['gy_content_type']			= 'gy_page';
	
	// Testimonial Slider Section
	$defaults['disable_testimonial_slider']		= true;
	$defaults['background_testimonial_section']	= get_template_directory_uri() .'/assets/images/default-header.jpg';
	$defaults['number_of_testi_items']			= 4;
	$defaults['tl_content_type']				= 'tl_page';
	$defaults['testimonial_slider_first']		= 0;
	$defaults['testimonial_slider_second']		= 0;
	$defaults['testimonial_slider_third']		= 0;

	// Blog Section
	$defaults['disable_blog_section']		= true;
	$defaults['blog_title']	   	 			= esc_html__( 'Latest News', 'flex-business-pro' );
	$defaults['blog_category']	   			= 0; 
	$defaults['blog_number']				= 3;

	//General Section
	$defaults['readmore_text']				= esc_html__('Read More','flex-business-pro');
	$defaults['your_latest_posts_title']	= esc_html__('Blog','flex-business-pro');
	$defaults['excerpt_length']				= 40;
	$defaults['layout_options']				= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Theme Flex Business Pro by Creativ Themes.', 'flex-business-pro' );

	//Typography
	$defaults['header_typography'] 			= 'header-font-1';
	$defaults['body_typography'] 			= 'default';

	//Theme colors
	$defaults['custom_site_title_color'] 	= '#000';
	$defaults['custom_site_tagline_color'] 	= '#333';
	$defaults['custom_blue_color'] 			= '#4782d3';
	$defaults['custom_topbar_bg_color'] 	= '#222';
	$defaults['custom_header_bg_color'] 	= '#fff';
	$defaults['custom_footer_bg_color'] 	= '#111';
	$defaults['topbar_color'] 				= 'default';
	$defaults['header_color'] 				= 'default';
	$defaults['footer_color'] 				= 'default';

	// Pass through filter.
	$defaults = apply_filters( 'flex_business_pro_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'flex_business_pro_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function flex_business_pro_get_option( $key ) {

		$default_options = flex_business_pro_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;