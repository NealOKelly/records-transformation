<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Flex Business Pro
 */

/**
 *
 * @hooked flex_business_pro_footer_start
 */
do_action( 'flex_business_pro_action_before_footer' );

/**
 * Hooked - flex_business_pro_footer_top_section -10
 * Hooked - flex_business_pro_footer_section -20
 */
do_action( 'flex_business_pro_action_footer' );

/**
 * Hooked - flex_business_pro_footer_end. 
 */
do_action( 'flex_business_pro_action_after_footer' );

wp_footer(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148171136-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-148171136-1');
</script>


</body>  
</html>