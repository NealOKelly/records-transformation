<?php 
/**
 * Template part for displaying Testimonial Section
 *
 *@package Flex Business Pro
 */
    $tl_content_type   = flex_business_pro_get_option( 'tl_content_type' );
    $number_of_testi_items = flex_business_pro_get_option( 'number_of_testi_items' );
    
    for( $i=1; $i<=$number_of_testi_items; $i++ ) :
        $testimonial_slider_posts[] = flex_business_pro_get_option( 'testimonial_slider_'.$i );
    endfor;
    ?>

    <?php if( $tl_content_type == 'tl_page' ) : ?>
        <div class="testimonial-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":false, "autoplay": true, "fade": false }'>
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $testimonial_slider_posts ),
                'post__in'      => $testimonial_slider_posts,
                'orderby'       =>'post__in',
            );   

            $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                        <article class="slick-item">
                            <div class="featured-image">
                                <?php if ( has_post_thumbnail() ) { ?>
                                    <img src="<?php the_post_thumbnail_url( 'large' ); ?>">
                                <?php } ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                </header>
                            </div><!-- .featured-image -->

                            <div class="entry-content">
                                <?php
                                    $excerpt = flex_business_pro_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                        </article><!-- .slick-item -->
                    <?php endwhile;?>
                    <?php wp_reset_postdata();
                endif;?>
        </div><!-- .testimonial-slider-wrapper -->
    <?php else: ?>
        <div class="testimonial-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":false, "autoplay": true, "fade": false }'>
            <?php for( $i=1; $i<=$number_of_testi_items; $i++ ) : 
            $testimonial_titles[$i] = flex_business_pro_get_option( 'testi_customtitle_'.$i );
            $testimonial_contents[$i] = flex_business_pro_get_option( 'testi_custominfo_'.$i );
            $testimonial_images[$i] = flex_business_pro_get_option( 'testi_customimage_'.$i );
            $testimonial_positions[$i] = flex_business_pro_get_option( 'testi_customposition_'.$i );
            ?>
            <?php if( !empty( $testimonial_images[$i] ) ) : ?>  
            <article class="slick-item">
                <div class="featured-image">
                    <?php if( !empty( $testimonial_images[$i] ) ) : ?>
                        <img src="<?php echo esc_url( $testimonial_images[$i] )?>">
                    <?php endif; ?>

                    <?php if( !empty( $testimonial_titles[$i] )  ) : ?>
                        <header class="entry-header">
                            <h2 class="entry-title"><?php echo esc_html( $testimonial_titles[$i] ); ?></h2>
                            <?php if( !empty( $testimonial_positions[$i] )  ) : ?>
                                <span class="position"><?php echo esc_html( $testimonial_positions[$i] ); ?></span>
                            <?php endif; ?>
                        </header>
                    <?php endif; ?>
                </div><!-- .featured-image -->
                
                <?php if( !empty( $testimonial_contents[$i] ) ) : ?>
                    <div class="entry-content">
                        <?php echo esc_html( $testimonial_contents[$i] ); ?>
                    </div><!-- .entry-content -->
                <?php endif; ?>
            </article><!-- .slick-item -->
            <?php endif; endfor; ?>
        </div><!-- .testimonial-slider-wrapper -->
    <?php endif;