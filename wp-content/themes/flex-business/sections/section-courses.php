<?php 
/**
 * Template part for displaying About Section
 *
 *@package Flex Business
 */
    $cs_content_type    = flex_business_get_option( 'cs_content_type' );
    $number_of_cs_column= flex_business_get_option( 'number_of_cs_column' );
    $number_of_cs_items = flex_business_get_option( 'number_of_cs_items' );
    for( $i=1; $i<=$number_of_cs_items; $i++ ) :
        $courses_page_posts[] = absint(flex_business_get_option( 'courses_page_'.$i ) );
    endfor;
    ?>

    <?php if( $cs_content_type == 'cs_page' ) : ?>
        <div class="section-content clear col-<?php echo esc_attr( $number_of_cs_column ); ?>">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $courses_page_posts ),
                'post__in'      => $courses_page_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                <article style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                    <div class="overlay"></div>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                    </header>

                    <div class="entry-content">
                        <?php
                            $excerpt = flex_business_the_excerpt( 20 );
                            echo wp_kses_post( wpautop( $excerpt ) );
                        ?>
                    </div><!-- .entry-content -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>
    <?php endif;