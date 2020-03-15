<?php
/**
 * Home Page Options.
 *
 * @package Flex Business Pro
 */

$default = flex_business_pro_get_default_theme_options();

// Latest Blog Section
$wp_customize->add_section( 'section_home_main',
	array(
		'title'      => __( 'Main Section', 'flex-business-pro' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Blog Section
$wp_customize->add_setting('theme_options[disable_main_section]', 
	array(
	'default' 			=> $default['disable_main_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_main_section]', 
	array(		
	'label' 	=> __('Disable Blog Section', 'flex-business-pro'),
	'section' 	=> 'section_home_main',
	'settings'  => 'theme_options[disable_main_section]',
	'type' 		=> 'checkbox',	
	)
);
//Service Blog title
$wp_customize->add_setting('theme_options[main_title]', 
	array(
	'default'           => $default['blog_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[main_title]', 
	array(
	'label'       => __('Section Title', 'flex-business-pro'),
	'section'     => 'section_home_main',   
	'settings'    => 'theme_options[main_title]',	
	'active_callback' => 'flex_business_pro_blog_active',		
	'type'        => 'text'
	)
);

// Setting  Blog Category.
$wp_customize->add_setting( 'theme_options[blog_category]',
	array(
	'default'           => $default['blog_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new flex_business_pro_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[blog_category]',
		array(
		'label'    => __( 'Select Category', 'flex-business-pro' ),
		'section'  => 'section_home_blog',
		'settings' => 'theme_options[blog_category]',	
		'active_callback' => 'flex_business_pro_blog_active',		
		'priority' => 100,
		)
	)
);

// Blog Number.
$wp_customize->add_setting( 'theme_options[blog_number]',
	array(
		'default'           => $default['blog_number'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'flex_business_pro_sanitize_number_range',
		)
);
$wp_customize->add_control( 'theme_options[blog_number]',
	array(
		'label'       => __( 'Number of Posts', 'flex-business-pro' ),
		'description' => __('Maximum number of post to show is 12.', 'flex-business-pro'),
		'section'     => 'section_home_blog',
		'active_callback' => 'flex_business_pro_blog_active',		
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 12, 'step' => 1, 'style' => 'width: 115px;' ),
		
	)
);