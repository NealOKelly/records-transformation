<?php
/**
 * Team options.
 *
 * @package Flex Business Pro
 */

$default = flex_business_pro_get_default_theme_options();

// Featured team Section
$wp_customize->add_section( 'section_home_team',
	array(
		'title'      => __( 'Featured Teams', 'flex-business-pro' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable Team Section
$wp_customize->add_setting('theme_options[disable_team_section]', 
	array(
	'default' 			=> $default['disable_team_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_team_section]', 
	array(		
	'label' 	=> __('Disable Team Section', 'flex-business-pro'),
	'section' 	=> 'section_home_team',
	'settings'  => 'theme_options[disable_team_section]',
	'type' 		=> 'checkbox',	
	)
);

//Team Section title
$wp_customize->add_setting('theme_options[team_title]', 
	array(
	'default'           => $default['team_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[team_title]', 
	array(
	'label'       => __('Section Title', 'flex-business-pro'),
	'section'     => 'section_home_team',   
	'settings'    => 'theme_options[team_title]',
	'active_callback' => 'flex_business_pro_teams_active',		
	'type'        => 'text'
	)
);

// Number of counter
$wp_customize->add_setting('theme_options[number_of_ts_column]', 
	array(
	'default' 			=> $default['number_of_ts_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ts_column]', 
	array(
	'label'       => __('Column Per Row', 'flex-business-pro'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4', 'flex-business-pro'),
	'section'     => 'section_home_team',   
	'settings'    => 'theme_options[number_of_ts_column]',		
	'type'        => 'number',
	'active_callback' => 'flex_business_pro_teams_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);
// Number of items
$wp_customize->add_setting('theme_options[number_of_ts_items]', 
	array(
	'default' 			=> $default['number_of_ts_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ts_items]', 
	array(
	'label'       => __('Number Of Teams', 'flex-business-pro'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 12.', 'flex-business-pro'),
	'section'     => 'section_home_team',   
	'settings'    => 'theme_options[number_of_ts_items]',		
	'type'        => 'number',
	'active_callback' => 'flex_business_pro_teams_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 12,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[ts_content_type]', 
	array(
	'default' 			=> $default['ts_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'flex_business_pro_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[ts_content_type]', 
	array(
	'label'       => __('Content Type', 'flex-business-pro'),
	'section'     => 'section_home_team',   
	'settings'    => 'theme_options[ts_content_type]',		
	'type'        => 'select',
	'active_callback' => 'flex_business_pro_teams_active',
	'choices'	  => array(
			'ts_page'	  => __('Page','flex-business-pro'),
			'ts_custom'	  => __('Custom','flex-business-pro'),
		),
	)
);

$number_of_ts_items = flex_business_pro_get_option( 'number_of_ts_items' );

for( $i=1; $i<=$number_of_ts_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[teams_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_pro_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[teams_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_home_team',   
		'settings'    => 'theme_options[teams_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'flex_business_pro_teams_page',
		)
	);

	$wp_customize->add_setting('theme_options[teams_customimage_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'flex_business_pro_sanitize_image'
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		'theme_options[teams_customimage_'.$i.']', 
		array(
		'label'       => sprintf( __('Member Image #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_home_team',   
		'settings'    => 'theme_options[teams_customimage_'.$i.']',		
		'type'        => 'image',
		'active_callback'	=> 'flex_business_pro_teams_custom'
		)
		)
	);

	$wp_customize->add_setting('theme_options[teams_customtitle_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[teams_customtitle_'.$i.']', 
		array(
		'label'       => sprintf( __('Member Name #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_home_team',   
		'settings'    => 'theme_options[teams_customtitle_'.$i.']',		
		'type'        => 'text',
		'active_callback'	=> 'flex_business_pro_teams_custom'
		)
	);

	$wp_customize->add_setting('theme_options[teams_custominfo_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[teams_custominfo_'.$i.']', 
		array(
		'label'       => sprintf( __('Member Position #%1$s', 'flex-business-pro'), $i),
		'section'     => 'section_home_team',   
		'settings'    => 'theme_options[teams_custominfo_'.$i.']',		
		'type'        => 'text',
		'active_callback'	=> 'flex_business_pro_teams_custom'
		)
	);
}