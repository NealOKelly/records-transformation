<?php
/**
 * Active callback functions.
 *
 * @package Flex Business Pro
 */

function flex_business_pro_additional_info_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_additional_info_section]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}

function flex_business_pro_additional_info_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[ad_content_type]' )->value();
    return ( flex_business_pro_additional_info_active( $control ) && ( 'ad_page' == $content_type ) );
}

function flex_business_pro_additional_info_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[ad_content_type]' )->value();
    return ( flex_business_pro_additional_info_active( $control ) && ( 'ad_custom' == $content_type ) );
}

function flex_business_pro_testimonial_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_testimonial_slider]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}

function flex_business_pro_testimonial_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[tl_content_type]' )->value();
    return ( flex_business_pro_testimonial_active( $control ) && ( 'tl_page' == $content_type ) );
}

function flex_business_pro_testimonial_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[tl_content_type]' )->value();
    return ( flex_business_pro_testimonial_active( $control ) && ( 'tl_custom' == $content_type ) );
}

function flex_business_pro_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_service_section]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}

function flex_business_pro_services_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[ss_content_type]' )->value();
    return ( flex_business_pro_services_active( $control ) && ( 'ss_page' == $content_type ) );
}

function flex_business_pro_services_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[ss_content_type]' )->value();
    return ( flex_business_pro_services_active( $control ) && ( 'ss_custom' == $content_type ) );
}

function flex_business_pro_teams_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_team_section]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}

function flex_business_pro_teams_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[ts_content_type]' )->value();
    return ( flex_business_pro_teams_active( $control ) && ( 'ts_page' == $content_type ) );
}

function flex_business_pro_teams_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[ts_content_type]' )->value();
    return ( flex_business_pro_teams_active( $control ) && ( 'ts_custom' == $content_type ) );
}

function flex_business_pro_gallery_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_gallery_section]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}

function flex_business_pro_gallery_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[gy_content_type]' )->value();
    return ( flex_business_pro_gallery_active( $control ) && ( 'gy_page' == $content_type ) );
}

function flex_business_pro_gallery_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[gy_content_type]' )->value();
    return ( flex_business_pro_gallery_active( $control ) && ( 'gy_custom' == $content_type ) );
}

function flex_business_pro_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured_slider]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}

function flex_business_pro_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( flex_business_pro_slider_active( $control ) && ( 'sr_page' == $content_type ) );
}

function flex_business_pro_slider_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( flex_business_pro_slider_active( $control ) && ( 'sr_custom' == $content_type ) );
}

function flex_business_pro_counter_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_counter_section]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}

function flex_business_pro_cta_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_cta_section]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}

function flex_business_pro_blog_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_blog_section]' )->value() == true ) {
        return false;
    }else{
        return true;
    }
}


/**
 * Active Callback for top bar section
 */
function flex_business_pro_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function flex_business_pro_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

/**
 * Active Callback for custom color
 */
function flex_business_pro_custom_color( $control ){

    $primary_color_type = $control->manager->get_setting( 'theme_options[primary_color]')->value();             
    return ( $primary_color_type == 'custom' );
}