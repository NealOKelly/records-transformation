<?php
/**
 * Theme Options.
 *
 * @package Flex Business Pro
 */

$default = flex_business_pro_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'flex-business-pro' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

//For General Option
$wp_customize->add_section('section_general', array(    
'title'       => __('General Option', 'flex-business-pro'),
'panel'       => 'theme_option_panel'    
));

//Layout Options
$wp_customize->add_setting('theme_options[layout_options]', 
	array(
	'default' 			=> $default['layout_options'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_select'
	)
);

$wp_customize->add_control(new flex_business_pro_Image_Radio_Control($wp_customize, 'theme_options[layout_options]', 
	array(		
	'label' 	=> __('Layout Options', 'flex-business-pro'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Setting Read More Text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
	'default'           => $default['readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
	'label'    => __( 'Read More Text', 'flex-business-pro' ),
	'section'  => 'section_general',
	'type'     => 'text',
	'priority' => 100,
	)
);

$wp_customize->add_setting( 'theme_options[your_latest_posts_title]',
	array(
	'default'           => $default['your_latest_posts_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[your_latest_posts_title]',
	array(
	'label'    => __( 'Your Latest Posts Title', 'flex-business-pro' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'flex-business-pro' ),
	'section'  => 'section_general',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $default['excerpt_length'],
	'sanitize_callback' => 'flex_business_pro_sanitize_positive_integer',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => esc_html__( 'Excerpt Length', 'flex-business-pro' ),
	'description' => esc_html__( 'in words', 'flex-business-pro' ),
	'section'     => 'section_general',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
) );

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Setting', 'flex-business-pro'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'flex_business_pro_sanitize_textarea_content',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'flex-business-pro' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);


/** Header Image Settings */
$wp_customize->add_section( 
    'custom_header_image_settings',
    array(
        'capability'  => 'edit_theme_options',
        'title'       => esc_html__( 'Header Image For Inner Pages', 'flex-business-pro' ),
        'panel'       => 'theme_option_panel',
    ) 
);

/** Header Image */
$wp_customize->add_setting( 'theme_options[archive_header_image]',
    array(
        'default'           => get_template_directory_uri() . '/assets/images/default-header.jpg',
        'sanitize_callback' => 'flex_business_pro_sanitize_image',
    )
);

$wp_customize->add_control( 
    new WP_Customize_Image_Control( $wp_customize, 'theme_options[archive_header_image]',
        array(
            'label'         => esc_html__( 'Header Image For Archive Page', 'flex-business-pro' ),
            'description'   => esc_html__( 'Choose Header Image of your choice for Archive Pages. Recommended size for this image is 1920px by 500px.', 'flex-business-pro' ),
            'section'       => 'custom_header_image_settings',
            'type'          => 'image',
        )
    )
);

/** Search Header Image */
$wp_customize->add_setting( 'theme_options[search_header_image]',
    array(
        'default'           => get_template_directory_uri() . '/assets/images/default-header.jpg',
        'sanitize_callback' => 'flex_business_pro_sanitize_image',
    )
);

$wp_customize->add_control( 
    new WP_Customize_Image_Control( $wp_customize, 'theme_options[search_header_image]',
        array(
            'label'         => esc_html__( 'Header Image For Search Page', 'flex-business-pro' ),
            'description'   => esc_html__( 'Choose Header Image of your choice for Search Page. Recommended size for this image is 1920px by 500px', 'flex-business-pro' ),
            'section'       => 'custom_header_image_settings',
            'type'          => 'image',
        )
    )
);

/** 404 Header Image */
$wp_customize->add_setting( 'theme_options[404_header_image]',
    array(
        'default'           => get_template_directory_uri() . '/assets/images/default-header.jpg',
        'sanitize_callback' => 'flex_business_pro_sanitize_image',
    )
);

$wp_customize->add_control( 
    new WP_Customize_Image_Control( $wp_customize, 'theme_options[404_header_image]',
        array(
            'label'         => esc_html__( 'Header Image For 404 Page', 'flex-business-pro' ),
            'description'   => esc_html__( 'Choose Header Image of your choice for 404 Page. Recommended size for this image is 1920px by 500px', 'flex-business-pro' ),
            'section'       => 'custom_header_image_settings',
            'type'          => 'image',
        )
    )
);

// Typography Section
$wp_customize->add_section('section_typography', 
	array(  
    'capability'  => 'edit_theme_options',  
	'title'       => __('Typography', 'flex-business-pro'),
	'panel'       => 'theme_option_panel'    
	)
);

// Header Typography
$wp_customize->add_setting( 'theme_options[header_typography]',
	array(
		'default'    		=> $default['header_typography'],
		'sanitize_callback'	=> 'flex_business_pro_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[header_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Heading Font Family', 'flex-business-pro' ),
		'section'     		=> 'section_typography',
		'settings'    		=> 'theme_options[header_typography]',
		'type'		  		=> 'select',
		'choices'			=> flex_business_pro_header_typography_options(),
    )
);

// Body Typography
$wp_customize->add_setting( 'theme_options[body_typography]',
	array(
		'default'    		=> $default['body_typography'],
		'sanitize_callback'	=> 'flex_business_pro_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[body_typography]',
    array(
		'label'       		=> esc_html__( 'Choose Body Font Family', 'flex-business-pro' ),
		'section'     		=> 'section_typography',
		'settings'    		=> 'theme_options[body_typography]',
		'type'		  		=> 'select',
		'choices'			=> flex_business_pro_body_typography_options(),
    )
);

// Custom Site Title Color Option
$wp_customize->add_setting( 'theme_options[custom_site_title_color]', array(
	'default'           => $default['custom_site_title_color'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[custom_site_title_color]', array(
	'label'             => esc_html__( 'Site Title Text Color', 'flex-business-pro' ),
	'section'           => 'colors',
) ) );

// Custom Site Tagline Color Option
$wp_customize->add_setting( 'theme_options[custom_site_tagline_color]', array(
	'default'           => $default['custom_site_tagline_color'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[custom_site_tagline_color]', array(
	'label'             => esc_html__( 'Site Tagline Text Color', 'flex-business-pro' ),
	'section'           => 'colors',
) ) );

// Custom Blue Color Option
$wp_customize->add_setting( 'theme_options[custom_blue_color]', array(
	'default'           => $default['custom_blue_color'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[custom_blue_color]', array(
	'label'             => esc_html__( 'Custom Theme Color for Blue', 'flex-business-pro' ),
	'section'           => 'colors',
) ) );

// Topbar Background Color Option
$wp_customize->add_setting( 'theme_options[custom_topbar_bg_color]', array(
	'default'           => $default['custom_topbar_bg_color'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[custom_topbar_bg_color]', array(
	'label'             => esc_html__( 'Top Bar Background Color', 'flex-business-pro' ),
	'section'           => 'colors',
) ) );

// Top Bar Color Option
$wp_customize->add_setting( 'theme_options[topbar_color]',
	array(
		'default'    		=> $default['topbar_color'],
		'sanitize_callback'	=> 'flex_business_pro_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[topbar_color]',
    array(
		'label'       		=> esc_html__( 'Select Top Bar Text Color', 'flex-business-pro' ),
		'section'     		=> 'colors',
		'settings'    		=> 'theme_options[topbar_color]',
		'type'		  		=> 'select',
		'choices'			=> flex_business_pro_topbar_color_options(),
    )
);

// Custom Header Background Color Option
$wp_customize->add_setting( 'theme_options[custom_header_bg_color]', array(
	'default'           => $default['custom_header_bg_color'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[custom_header_bg_color]', array(
	'label'             => esc_html__( 'Header Menu Background Color', 'flex-business-pro' ),
	'section'           => 'colors',
) ) );

// Header Color Option
$wp_customize->add_setting( 'theme_options[header_color]',
	array(
		'default'    		=> $default['header_color'],
		'sanitize_callback'	=> 'flex_business_pro_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[header_color]',
    array(
		'label'       		=> esc_html__( 'Select Header Menu Text Color', 'flex-business-pro' ),
		'section'     		=> 'colors',
		'settings'    		=> 'theme_options[header_color]',
		'type'		  		=> 'select',
		'choices'			=> flex_business_pro_header_color_options(),
    )
); 

// Custom Footer Background Color Option
$wp_customize->add_setting( 'theme_options[custom_footer_bg_color]', array(
	'default'           => $default['custom_footer_bg_color'],
	'sanitize_callback' => 'sanitize_hex_color',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_options[custom_footer_bg_color]', array(
	'label'             => esc_html__( 'Footer Background Color', 'flex-business-pro' ),
	'section'           => 'colors',
) ) );

// Footer Color Option
$wp_customize->add_setting( 'theme_options[footer_color]',
	array(
		'default'    		=> $default['footer_color'],
		'sanitize_callback'	=> 'flex_business_pro_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[footer_color]',
    array(
		'label'       		=> esc_html__( 'Select Footer Text Color', 'flex-business-pro' ),
		'section'     		=> 'colors',
		'settings'    		=> 'theme_options[footer_color]',
		'type'		  		=> 'select',
		'choices'			=> flex_business_pro_footer_color_options(),
    )
); 