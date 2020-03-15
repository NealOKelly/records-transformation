<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Flex Business Pro
 */

    $service_title       = flex_business_pro_get_option( 'service_title' );
    $ss_content_type     = flex_business_pro_get_option( 'ss_content_type' );
    $number_of_ss_column = flex_business_pro_get_option( 'number_of_ss_column' );
    $number_of_ss_items  = flex_business_pro_get_option( 'number_of_ss_items' );
    for( $i=1; $i<=$number_of_ss_items; $i++ ) :
        $services_page_posts[] = absint(flex_business_pro_get_option( 'services_page_'.$i ) );
    endfor;
    ?>

    <?php if(!empty($service_title)):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($service_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>
    <?php if( $ss_content_type == 'ss_page' ) : ?>
    <div class="section-content col-<?php echo esc_attr( $number_of_ss_column ); ?>">
        <?php $args = array (
            'post_type'     => 'page',
            'post_per_page' => count( $services_page_posts ),
            'post__in'      => $services_page_posts,
            'orderby'       =>'post__in',
        );        
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
        $i=-1;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>
            
            <article>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="featured-image">
                        <img src="<?php the_post_thumbnail_url(); ?>"/>
                    </div><!-- .featured-image -->
                <?php endif; ?>
                
                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
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
            </article>

          <?php endwhile;?>
          <?php wp_reset_postdata(); ?>
        <?php endif;?>
    </div>
    <?php else: ?>
        <div class="section-content col-<?php echo esc_attr( $number_of_ss_column ); ?>">
            <?php for( $i=1; $i<=$number_of_ss_items; $i++ ) : 
            $services_titles[$i] = flex_business_pro_get_option( 'services_customtitle_'.$i );
            $services_urls[$i] = flex_business_pro_get_option( 'services_customurl_'.$i );     
            $services_urls[$i] = ( !empty( $services_urls[$i] ) ) ? $services_urls[$i] : '#';
            $services_contents[$i] = flex_business_pro_get_option( 'services_custominfo_'.$i );
            $services_images[$i] = flex_business_pro_get_option( 'services_customimage_'.$i );?>
            <?php if( !empty( $services_titles[$i] ) || !empty( $services_contents[$i] ) || !empty( $services_images[$i] ) ) : ?>  
                
                <article>
                    <?php if( !empty( $services_images[$i] ) ) : ?> 
                    <div class="featured-image">                        
                        <img src="<?php echo esc_url( $services_images[$i] ); ?>"/>                       
                    </div><!-- .featured-image -->
                    <?php endif; ?>
                    <?php if( !empty( $services_titles[$i] ) ) : ?>
                    <header class="entry-header">
                        <h2 class="entry-title"><?php echo esc_html( $services_titles[$i] ); ?></h2>
                    </header>
                    <?php endif; ?>
                    <?php if( !empty( $services_contents[$i] ) ) : ?>
                    <div class="entry-content">
                        <?php echo esc_html( $services_contents[$i] ); ?>
                    </div><!-- .entry-content -->
                    <?php endif; ?>
                </article>
            <?php endif; endfor;?>
        </div>
    <?php endif;