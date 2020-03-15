<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flex Business Pro
 */
/**
* Hook - flex_business_pro_action_doctype.
*
* @hooked flex_business_pro_doctype -  10
*/
do_action( 'flex_business_pro_action_doctype' );
?>
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155080865-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155080865-1');
</script>
<?php
/**
* Hook - flex_business_pro_action_head.
*
* @hooked flex_business_pro_head -  10
*/
do_action( 'flex_business_pro_action_head' );
?>

<?php wp_head(); ?>

<!-- START - Add favicons -->
<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php bloginfo('template_directory'); ?>/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php bloginfo('template_directory'); ?>/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/favicon-16x16.png">
<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">	
<!-- END - Add favicons -->
	
</head>

<body <?php body_class(); ?>>
<?php

/**
* Hook - flex_business_pro_action_before.
*
* @hooked flex_business_pro_page_start - 10
*/
do_action( 'flex_business_pro_action_before' );

/**
*
* @hooked flex_business_pro_header_start - 10
*/
do_action( 'flex_business_pro_action_before_header' );

/**
*
*@hooked flex_business_pro_site_branding - 10
*@hooked flex_business_pro_header_end - 15 
*/
do_action('flex_business_pro_action_header');

/**
*
* @hooked flex_business_pro_content_start - 10
*/
do_action( 'flex_business_pro_action_before_content' );

/**
 * Banner start
 * 
 * @hooked flex_business_pro_banner_header - 10
*/
do_action( 'flex_business_pro_banner_header' );  
