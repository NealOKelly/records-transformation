<?php
/**
 * Services options.
 *
 * @package Flex Business Pro
 */

$default = flex_business_pro_get_default_theme_options();

// Featured Services Section
$wp_customize->add_section( 'section_home_service',
	array(
		'title'      => __( 'Featured Services', 'flex-business-pro' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Service Section
$wp_customize->add_setting('theme_options[disable_service_section]', 
	array(
	'default' 			=> $default['disable_service_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_service_section]', 
	array(		
	'label' 	=> __('Disable Services Section', 'flex-business-pro'),
	'section' 	=> 'section_home_service',
	'settings'  => 'theme_options[disable_service_section]',
	'type' 		=> 'checkbox',	
	)
);

//Services Section title
$wp_customize->add_setting('theme_options[service_title]', 
	array(
	'default'           => $default['service_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[service_title]', 
	array(
	'label'       => __('Section Title', 'flex-business-pro'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_title]',
	'active_callback' => 'flex_business_pro_services_active',		
	'type'        => 'text'
	)
);

// Number of counter
$wp_customize->add_setting('theme_options[number_of_ss_column]', 
	array(
	'default' 			=> $default['number_of_ss_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ss_column]', 
	array(
	'label'       => __('Column Per Row', 'flex-business-pro'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4', 'flex-business-pro'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[number_of_ss_column]',		
	'type'        => 'number',
	'active_callback' => 'flex_business_pro_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);
// Number of items
$wp_customize->add_setting('theme_options[number_of_ss_items]', 
	array(
	'default' 			=> $default['number_of_ss_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ss_items]', 
	array(
	'label'       => __('Number Of Services', 'flex-business-pro'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 12.', 'flex-business-pro'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[number_of_ss_items]',		
	'type'        => 'number',
	'active_callback' => 'flex_business_pro_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 12,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[ss_content_type]', 
	array(
	'default' 			=> $default['ss_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[ss_content_type]', 
	array(
	'label'       => __('Content Type', 'flex-business-pro'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[ss_content_type]',		
	'type'        => 'select',
	'active_callback' => 'flex_business_pro_services_active',
	'choices'	  => array(
			'ss_page'	  => __('Page','flex-business-pro'),
			'ss_custom'	  => __('Custom','flex-business-pro'),
		),
	)
);

$number_of_ss_items = flex_business_pro_get_option( 'number_of_ss_items' );

for( $i=1; $i<=$number_of_ss_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[services_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_pro_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[services_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[services_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'flex_business_pro_services_page',
		)
	);

	$wp_customize->add_setting('theme_options[services_customtitle_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[services_customtitle_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Title #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[services_customtitle_'.$i.']',		
		'type'        => 'text',
		'active_callback'	=> 'flex_business_pro_services_custom'
		)
	);

	$wp_customize->add_setting('theme_options[services_customimage_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_pro_sanitize_image'
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'theme_options[services_customimage_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Image #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[services_customimage_'.$i.']',		
		'type'        => 'image',
		'active_callback'	=> 'flex_business_pro_services_custom'
		)
		)
	);

	$wp_customize->add_setting('theme_options[services_custominfo_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_textarea_field'
		)
	);

	$wp_customize->add_control('theme_options[services_custominfo_'.$i.']', 
		array(
		'label'       => sprintf( __('Custom Content #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[services_custominfo_'.$i.']',		
		'type'        => 'textarea',
		'active_callback'	=> 'flex_business_pro_services_custom'
		)
	);
}