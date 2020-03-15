<?php 
/**
 * Template part for displaying Blog Section
 *
 *@package Flex Business Pro
 */
?>
<?php 
	 $main_title    = flex_business_pro_get_option( 'main_title' );
?> 
    <?php if(!empty($main_title)):?>
	  <div class="section-header">
	    <h2 class="section-title"><?php echo esc_html($main_title);?></h2>
	  </div><!-- .section-header -->
  	<?php endif;?>
  <div class="section-content ">
	<div class="content-area">
		<main id="main" class="site-main" role="main">
			
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->