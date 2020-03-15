<?php
/**
 * Home Page Options.
 *
 * @package Flex Business Pro
 */

$default = flex_business_pro_get_default_theme_options();

// Latest Blog Section
$wp_customize->add_section( 'section_counter',
	array(
		'title'      => __( 'Counter Section', 'flex-business-pro' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

// Disable Counter Section
$wp_customize->add_setting('theme_options[disable_counter_section]', 
	array(
	'default' 			=> $default['disable_counter_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_counter_section]', 
	array(		
	'label' 	=> __('Disable Counter section', 'flex-business-pro'),
	'section' 	=> 'section_counter',
	'settings'  => 'theme_options[disable_counter_section]',
	'type' 		=> 'checkbox',	
	)
);

$wp_customize->add_setting('theme_options[background_counter_section]', 
	array(
	'type'              => 'theme_mod',
	'default' 			=> $default['background_counter_section'],
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_image'
	)
);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'theme_options[background_counter_section]', 
	array(
	'label'       => __('Background Image', 'flex-business-pro'),
	'section'     => 'section_counter',   
	'settings'    => 'theme_options[background_counter_section]',	
	'active_callback' => 'flex_business_pro_counter_active',			
	'type'        => 'image',
	)
	)
);

// Number of counter
$wp_customize->add_setting('theme_options[number_of_counter]', 
	array(
	'default' 			=> $default['number_of_counter'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_counter]', 
	array(
	'label'       => __('Number Of Counter', 'flex-business-pro'),
	'description' => __('Save & Refresh the customizer to see its effect.', 'flex-business-pro'),
	'section'     => 'section_counter',   
	'settings'    => 'theme_options[number_of_counter]',	
	'active_callback' => 'flex_business_pro_counter_active',				
	'type'        => 'number',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);

$number_of_counter = flex_business_pro_get_option( 'number_of_counter' );

for( $i=1; $i<=$number_of_counter; $i++ ){
	
	// Counter Icon One
	$wp_customize->add_setting('theme_options[counter_icon_' . $i .']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[counter_icon_' . $i .']', 
		array(
		'label'       => sprintf( __('Counter Icon #%1$s', 'flex-business-pro'), $i ),
		'description' => sprintf( __('Please input icon as eg: fa fa-archive. Find Font-awesome icons %1$shere%2$s', 'flex-business-pro'), '<a href="' . esc_url( 'https://fontawesome.com/cheatsheet' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_counter',   
		'settings'    => 'theme_options[counter_icon_' . $i .']',	
		'active_callback' => 'flex_business_pro_counter_active',				
		'type'        => 'text'
		)
	);
	// Counter Value One
	$wp_customize->add_setting('theme_options[counter_number_' . $i .']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[counter_number_' . $i .']', 
		array(
		'label'       => sprintf( __('Counter Value #%1$s', 'flex-business-pro'), $i ),
		'section'     => 'section_counter',   
		'settings'    => 'theme_options[counter_number_' . $i .']',		
		'active_callback' => 'flex_business_pro_counter_active',			
		'type'        => 'text'
		)
	);

	// Counter Title One
	$wp_customize->add_setting('theme_options[counter_title_' . $i .']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[counter_title_' . $i .']', 
		array(
		'label'       => sprintf( __('Counter Title #%1$s', 'flex-business-pro'), $i ),
		'section'     => 'section_counter',   
		'settings'    => 'theme_options[counter_title_' . $i .']',		
		'active_callback' => 'flex_business_pro_counter_active',			
		'type'        => 'text'
		)
	);
}