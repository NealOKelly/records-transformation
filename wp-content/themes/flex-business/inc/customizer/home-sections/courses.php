<?php
/**
 * Courses options.
 *
 * @package Flex Business
 */

$default = flex_business_get_default_theme_options();

// Featured Courses Section
$wp_customize->add_section( 'section_home_courses',
	array(
		'title'      => __( 'Featured Plans', 'flex-business' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Courses Section
$wp_customize->add_setting('theme_options[disable_courses_section]', 
	array(
	'default' 			=> $default['disable_courses_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_courses_section]', 
	array(		
	'label' 	=> __('Disable Courses Section', 'flex-business'),
	'section' 	=> 'section_home_courses',
	'settings'  => 'theme_options[disable_courses_section]',
	'type' 		=> 'checkbox',	
	)
);

// Number of Plans
$wp_customize->add_setting('theme_options[number_of_cs_column]', 
	array(
	'default' 			=> $default['number_of_cs_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_cs_column]', 
	array(
	'label'       => __('Column Per Row', 'flex-business'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4', 'flex-business'),
	'section'     => 'section_home_courses',   
	'settings'    => 'theme_options[number_of_cs_column]',		
	'type'        => 'number',
	'active_callback' => 'flex_business_courses_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);
// Number of items
$wp_customize->add_setting('theme_options[number_of_cs_items]', 
	array(
	'default' 			=> $default['number_of_cs_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_cs_items]', 
	array(
	'label'       => __('Number Of Plans', 'flex-business'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4.', 'flex-business'),
	'section'     => 'section_home_courses',   
	'settings'    => 'theme_options[number_of_cs_items]',		
	'type'        => 'number',
	'active_callback' => 'flex_business_courses_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[cs_content_type]', 
	array(
	'default' 			=> $default['cs_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[cs_content_type]', 
	array(
	'label'       => __('Content Type', 'flex-business'),
	'section'     => 'section_home_courses',   
	'settings'    => 'theme_options[cs_content_type]',		
	'type'        => 'select',
	'active_callback' => 'flex_business_courses_active',
	'choices'	  => array(
			'cs_page'	  => __('Page','flex-business'),
		),
	)
);

$number_of_cs_items = flex_business_get_option( 'number_of_cs_items' );

for( $i=1; $i<=$number_of_cs_items; $i++ ){

	// Courses First Page
	$wp_customize->add_setting('theme_options[courses_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[courses_page_'.$i.']', 
		array(
		'label'       => __('Select Page', 'flex-business'),
		'section'     => 'section_home_courses',   
		'settings'    => 'theme_options[courses_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'flex_business_courses_page',
		)
	);
}