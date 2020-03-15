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
