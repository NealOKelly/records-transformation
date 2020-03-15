<?php
/**
 * Slider options.
 *
 * @package Flex Business Pro
 */

$default = flex_business_pro_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider', 'flex-business-pro' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Disable Slider Section
$wp_customize->add_setting('theme_options[disable_featured_slider]', 
	array(
	'default' 			=> $default['disable_featured_slider'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_featured_slider]', 
	array(		
	'label' 	=> __('Disable Slider Section', 'flex-business-pro'),
	'section' 	=> 'section_featured_slider',
	'settings'  => 'theme_options[disable_featured_slider]',
	'type' 		=> 'checkbox',	
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_sr_items]', 
	array(
	'default' 			=> $default['number_of_sr_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_sr_items]', 
	array(
	'label'       => __('Number Of Slides', 'flex-business-pro'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 12.', 'flex-business-pro'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[number_of_sr_items]',		
	'type'        => 'number',
	'active_callback' => 'flex_business_pro_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 12,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[sr_content_type]', 
	array(
	'default' 			=> $default['sr_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[sr_content_type]', 
	array(
	'label'       => __('Content Type', 'flex-business-pro'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[sr_content_type]',		
	'type'        => 'select',
	'active_callback' => 'flex_business_pro_slider_active',
	'choices'	  => array(
			'sr_page'	  => __('Page','flex-business-pro'),
			'sr_custom'	  => __('Custom','flex-business-pro'),
		),
	)
);

$number_of_sr_items = flex_business_pro_get_option( 'number_of_sr_items' );

for( $i=1; $i<=$number_of_sr_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[slider_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_pro_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[slider_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'flex_business_pro_slider_page',
		)
	);

	$wp_customize->add_setting('theme_options[slider_customtitle_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_customtitle_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Title #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_customtitle_'.$i.']',		
		'type'        => 'text',
		'active_callback'	=> 'flex_business_pro_slider_custom'
		)
	);

	$wp_customize->add_setting('theme_options[slider_customimage_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_pro_sanitize_image'
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'theme_options[slider_customimage_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Image #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_customimage_'.$i.']',		
		'type'        => 'image',
		'active_callback'	=> 'flex_business_pro_slider_custom'
		)
		)
	);

	$wp_customize->add_setting('theme_options[slider_custominfo_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_textarea_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custominfo_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Content #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custominfo_'.$i.']',		
		'type'        => 'textarea',
		'active_callback'	=> 'flex_business_pro_slider_custom'
		)
	);

	$wp_customize->add_setting('theme_options[slider_custombtntext_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custombtntext_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Button Text #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custombtntext_'.$i.']',		
		'type'        => 'url',
		'active_callback'	=> 'flex_business_pro_slider_custom'
		)
	);

	$wp_customize->add_setting('theme_options[slider_customurl_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control('theme_options[slider_customurl_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Url #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_customurl_'.$i.']',		
		'type'        => 'url',
		'active_callback'	=> 'flex_business_pro_slider_custom'
		)
	);
}

