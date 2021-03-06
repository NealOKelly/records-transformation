<?php
/**
 * The template for displaying home page.
 * @package Flex Business Pro
 */


if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = flex_business_pro_get_sections();

    if( is_array( $enabled_sections ) ) {
		
		foreach($enabled_sections['id'] as $section) {
			echo $sections['id'], '<br>';
			}
		
		
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = flex_business_pro_get_option( 'disable_featured_slider' );
                if( false ==$disable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'services' ) { ?>
                <?php $disable_service_section = flex_business_pro_get_option( 'disable_service_section' );
                if( false ==$disable_service_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'team' ) { ?>
                <?php $disable_team_section = flex_business_pro_get_option( 'disable_team_section' );
                if( false ==$disable_team_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'courses' ) { ?>
                <?php $disable_courses_section = flex_business_pro_get_option( 'disable_courses_section' );
                if(false ==$disable_courses_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">                        
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'additional-info' ) { ?>
				<?php $disable_additional_info_section = flex_business_pro_get_option( 'disable_additional_info_section' );
                if( false ==$disable_additional_info_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
							<?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'counter' ) { ?>
                <?php $disable_counter_section = flex_business_pro_get_option( 'disable_counter_section' );
                $background_counter_section = flex_business_pro_get_option( 'background_counter_section' );
                if( false ==$disable_counter_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_counter_section );?>');">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'cta' ) { ?>
                <?php $disable_cta_section = flex_business_pro_get_option( 'disable_cta_section' );
                $background_cta_section = flex_business_pro_get_option( 'background_cta_section' );
                if( false ==$disable_cta_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_cta_section );?>');">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>
			<?php echo "Hello World";?>
			<?php } elseif( $section['id'] == 'main' ) { ?>
                <?php $disable_blog_section = flex_business_pro_get_option( 'disable_main_section' );
                if(false ==$disable_main_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
			<?php endif; ?>

            <?php } elseif( $section['id'] == 'gallery' ) { ?>
                <?php $disable_gallery_section = flex_business_pro_get_option( 'disable_gallery_section' );
                if( false ==$disable_gallery_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section clear">
                        <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
                <?php endif; ?>

            <?php } elseif( $section['id'] == 'testimonial' ) { ?>
                <?php $disable_testimonial_slider = flex_business_pro_get_option( 'disable_testimonial_slider' );
                $background_testimonial_section = flex_business_pro_get_option( 'background_testimonial_section' );
                if( false ==$disable_testimonial_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section" style="background-image: url('<?php echo esc_url( $background_testimonial_section );?>');">
                        <div class="overlay"></div>
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif;

            }
            elseif( ( $section['id'] == 'blog' ) ){ ?>
                <?php $disable_blog_section = flex_business_pro_get_option( 'disable_blog_section' );
                if(false ==$disable_blog_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif;
            }
        }
    }
    get_footer();
} 
elseif('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 
else{
    include( get_page_template() );
}