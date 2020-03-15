<?php
/**
 * Testimonial Slider options.
 *
 * @package Flex Business Pro
 */

$default = flex_business_pro_get_default_theme_options();

// Testimonial Slider Section
$wp_customize->add_section( 'section_testimonial_slider',
	array(
		'title'      => __( 'Testimonial Slider', 'flex-business-pro' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Disable Slider Section
$wp_customize->add_setting('theme_options[disable_testimonial_slider]', 
	array(
	'default' 			=> $default['disable_testimonial_slider'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_testimonial_slider]', 
	array(		
	'label' 	=> __('Disable Slider Section', 'flex-business-pro'),
	'section' 	=> 'section_testimonial_slider',
	'settings'  => 'theme_options[disable_testimonial_slider]',
	'type' 		=> 'checkbox',	
	)
);

// Testimonial Background Image
$wp_customize->add_setting('theme_options[background_testimonial_section]', 
	array(
	'type'              => 'theme_mod',
	'default' 			=> $default['background_testimonial_section'],
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_image'
	)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[background_testimonial_section]', 
	array(
	'label'       => __('Background Image', 'flex-business-pro'),
	'section'     => 'section_testimonial_slider',   
	'settings'    => 'theme_options[background_testimonial_section]',	
	'active_callback' => 'flex_business_pro_testimonial_active',			
	'type'        => 'image',
	)
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_testi_items]', 
	array(
	'default' 			=> $default['number_of_testi_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_testi_items]', 
	array(
	'label'       => __('Number Of Testimonial', 'flex-business-pro'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 8.', 'flex-business-pro'),
	'section'     => 'section_testimonial_slider',   
	'settings'    => 'theme_options[number_of_testi_items]',		
	'type'        => 'number',
	'active_callback'	=> 'flex_business_pro_testimonial_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 8,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[tl_content_type]', 
	array(
	'default' 			=> $default['tl_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[tl_content_type]', 
	array(
	'label'       => __('Testimonial Type', 'flex-business-pro'),
	'section'     => 'section_testimonial_slider',   
	'settings'    => 'theme_options[tl_content_type]',		
	'type'        => 'select',
	'active_callback'	=> 'flex_business_pro_testimonial_active',
	'choices'	  => array(
			'tl_page'	  => __('Page','flex-business-pro'),
			'tl_custom'	  => __('Custom','flex-business-pro'),
		),
	)
);

$number_of_testi_items = flex_business_pro_get_option( 'number_of_testi_items' );

for( $i=1; $i<=$number_of_testi_items; $i++ ){

	// Testimonial Slider First Page
	$wp_customize->add_setting('theme_options[testimonial_slider_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_pro_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[testimonial_slider_'.$i.']', 
		array(
		'label'       => sprintf( __('Testimonial Page #%1$s', 'flex-business-pro'), $i ),
		'section'     => 'section_testimonial_slider',   
		'settings'    => 'theme_options[testimonial_slider_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback'	=> 'flex_business_pro_testimonial_page'
		)
	);

	$wp_customize->add_setting('theme_options[testi_customtitle_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[testi_customtitle_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Title #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_testimonial_slider',   
		'settings'    => 'theme_options[testi_customtitle_'.$i.']',		
		'type'        => 'text',
		'active_callback'	=> 'flex_business_pro_testimonial_custom'
		)
	);

	$wp_customize->add_setting('theme_options[testi_customposition_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[testi_customposition_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Position #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_testimonial_slider',   
		'settings'    => 'theme_options[testi_customposition_'.$i.']',		
		'type'        => 'text',
		'active_callback'	=> 'flex_business_pro_testimonial_custom'
		)
	);

	$wp_customize->add_setting('theme_options[testi_customimage_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_pro_sanitize_image'
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'theme_options[testi_customimage_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Image #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_testimonial_slider',   
		'settings'    => 'theme_options[testi_customimage_'.$i.']',		
		'type'        => 'image',
		'active_callback'	=> 'flex_business_pro_testimonial_custom'
		)
		)
	);

	$wp_customize->add_setting('theme_options[testi_custominfo_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_textarea_field'
		)
	);

	$wp_customize->add_control('theme_options[testi_custominfo_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Content #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_testimonial_slider',   
		'settings'    => 'theme_options[testi_custominfo_'.$i.']',		
		'type'        => 'textarea',
		'active_callback'	=> 'flex_business_pro_testimonial_custom'
		)
	);
}