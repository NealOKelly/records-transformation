<?php

$default = flex_business_pro_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'flex-business-pro' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header contact info section */
$wp_customize->add_section(
    'header_contact_info_section',
    array(
        'title'    => __( 'Contact Info', 'flex-business-pro' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
    )
);

/** Header contact info control */
$wp_customize->add_setting( 
    'theme_options[show_header_contact_info]', 
    array(
        'default'           => $default['show_header_contact_info'],
        'sanitize_callback' => 'flex_business_pro_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_contact_info]',
    array(
        'label'       => __( 'Show Contact Info', 'flex-business-pro' ),
        'section'     => 'header_contact_info_section',
        'type'        => 'checkbox',
    )
);

/** Location */
$wp_customize->add_setting( 'theme_options[header_location]', array(
    'default'           => $default['header_location'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_location]',
    array(
        'label'           => __( 'Location', 'flex-business-pro' ),
        'description'     => __( 'Enter Location.', 'flex-business-pro' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'flex_business_pro_contact_info_ac',
    )
);

/** Phone */
$wp_customize->add_setting( 'theme_options[header_phone]', array(
    'default'           => $default['header_phone'],
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_phone]',
    array(
        'label'           => __( 'Phone', 'flex-business-pro' ),
        'description'     => __( 'Enter phone number.', 'flex-business-pro' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'flex_business_pro_contact_info_ac',
    )
);

/** Email */
$wp_customize->add_setting( 
    'theme_options[header_email]', 
    array(
        'default'           => $default['header_email'],
        'sanitize_callback' => 'sanitize_email',
    ) 
);

$wp_customize->add_control(
    'theme_options[header_email]',
    array(
        'label'           => __( 'Email', 'flex-business-pro' ),
        'description'     => __( 'Enter valid email address.', 'flex-business-pro' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'flex_business_pro_contact_info_ac',
    )
);

/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'flex-business-pro' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 
    'theme_options[show_header_social_links]', 
    array(
        'default'           => $default['show_header_social_links'],
        'sanitize_callback' => 'flex_business_pro_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_social_links]',
    array(
        'label'       => __( 'Show Social Links', 'flex-business-pro' ),
        'section'     => 'header_social_links_section',
        'type'        => 'checkbox',
    )
);

// Setting social_links.
$wp_customize->add_setting( 'theme_options[header_social_links]', array(
    'default'           => $default['header_social_links'],
    'sanitize_callback' => 'flex_business_pro_sanitize_social_links',
) );

$wp_customize->add_control( 
    new flex_business_pro_Repeater_Text_Control( 
        $wp_customize, 'theme_options[header_social_links]', 
        array(
            'label'       => esc_html__( 'Social Links', 'flex-business-pro' ),
            'description' => esc_html__( 'Enter full URL.', 'flex-business-pro' ),
            'section'     => 'header_social_links_section',
            'active_callback' => 'flex_business_pro_social_links_active',
        ) 
    )
);