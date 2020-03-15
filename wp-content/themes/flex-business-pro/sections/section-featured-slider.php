<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package Flex Business Pro
 */
    $sr_content_type   = flex_business_pro_get_option( 'sr_content_type' );
    $number_of_sr_items = flex_business_pro_get_option( 'number_of_sr_items' );
    
    for( $i=1; $i<=$number_of_sr_items; $i++ ) :
        $featured_slider_posts[] = flex_business_pro_get_option( 'slider_page_'.$i );
    endfor;
    ?>
    <?php if( $sr_content_type == 'sr_page' ) : ?>
        <div class="featured-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":true, "autoplay": true, "fade": true }'>
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $featured_slider_posts ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
            );   

            $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=-1;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                        <article class="slick-item" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                            <div class="wrapper">
                                <div class="featured-content-wrapper">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><?php the_title();?></h2>
                                    </header>
                                    
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = flex_business_pro_the_excerpt( 20 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->

                                    <div class="read-more">
                                        <?php $readmore_text = flex_business_pro_get_option( 'readmore_text' );?>
                                        <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                                    </div><!-- .read-more -->
                                </div><!-- .featured-content-wrapper -->
                            </div><!-- .wrapper -->
                        </article><!-- .slick-item -->
                    <?php endwhile;?>
                    <?php wp_reset_postdata();
                endif;?>
        </div><!-- .featured-slider-wrapper -->
    <?php else : ?>
        <div class="featured-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":true, "autoplay": true, "fade": true }'>
            <?php for( $i=1; $i<=$number_of_sr_items; $i++ ) : 
            $slider_titles[$i]  = flex_business_pro_get_option( 'slider_customtitle_'.$i );
            $slider_urls[$i]    = flex_business_pro_get_option( 'slider_customurl_'.$i );     
            $slider_urls[$i]    = ( !empty( $slider_urls[$i] ) ) ? $slider_urls[$i] : '#';
            $slider_contents[$i] = flex_business_pro_get_option( 'slider_custominfo_'.$i );
            $slider_images[$i]  = flex_business_pro_get_option( 'slider_customimage_'.$i );
            $slider_btntext[$i]  = flex_business_pro_get_option( 'slider_custombtntext_'.$i );
            ?>
                <article class="slick-item" style="background-image: url('<?php echo esc_url( $slider_images[$i] ); ?>');">
                    <div class="wrapper">
                        <?php if( !empty( $slider_titles[$i] ) || !empty( $slider_contents[$i] ) ) : ?> 
                        <div class="featured-content-wrapper">
                            <?php if( !empty( $slider_titles[$i] ) ) : ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php echo esc_html( $slider_titles[$i] ); ?></h2>
                                </header>
                            <?php endif; ?>
                            <?php if( !empty( $slider_contents[$i] ) ) : ?>
                                <div class="entry-content">
                                    <?php echo esc_html( $slider_contents[$i] ); ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>

                            <?php if( !empty( $slider_btntext[$i] ) ) : ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $slider_urls[$i] ); ?>" class="btn btn-primary"><?php echo esc_html( $slider_btntext[$i] ); ?></a>
                                </div><!-- .read-more -->
                            <?php endif; ?>
                            
                        </div><!-- .featured-content-wrapper -->
                        <?php endif; ?>
                    </div><!-- .wrapper -->
                </article><!-- .slick-item -->
            <?php endfor; ?>
        </div><!-- .featured-slider-wrapper -->
    <?php endif;