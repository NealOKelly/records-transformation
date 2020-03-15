<?php 
/**
 * Template part for displaying Gallery Section
 *
 *@package Flex Business Pro
 */
    $gallery_title       = flex_business_pro_get_option( 'gallery_title' );
    $gy_content_type     = flex_business_pro_get_option( 'gy_content_type' );
    $number_of_gy_column = flex_business_pro_get_option( 'number_of_gy_column' );
    $number_of_gy_items  = flex_business_pro_get_option( 'number_of_gy_items' );
    for( $i=1; $i<=$number_of_gy_items; $i++ ) :
        $gallery_page_posts[] = absint(flex_business_pro_get_option( 'gallery_page_'.$i ) );
    endfor;
    ?>

    <?php if(!empty($gallery_title)):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($gallery_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if( $gy_content_type == 'gy_page' ) : ?>
        <div class="section-content col-<?php echo esc_attr( $number_of_gy_column ); ?>">
            <?php $args = array (
                'post_type'     => 'page',
                'post_per_page' => count( $gallery_page_posts ),
                'post__in'      => $gallery_page_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                <article>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="featured-image">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <img src="<?php the_post_thumbnail_url(); ?>"/>
                            </a>
                        </div><!-- .featured-image -->
                    <?php endif; ?>

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        </header>
                    </div><!-- .entry-container -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>
    <?php else : ?>
        <div class="section-content col-<?php echo esc_attr( $number_of_gy_column ); ?>">
            <?php for( $i=1; $i<=$number_of_gy_items; $i++ ) : 
            $gallery_titles[$i] = flex_business_pro_get_option( 'gallery_customtitle_'.$i );
            $gallery_images[$i] = flex_business_pro_get_option( 'gallery_customimage_'.$i );?>
            <?php if( !empty( $gallery_titles[$i] ) || !empty( $gallery_contents[$i] ) || !empty( $gallery_images[$i] ) ) : ?>  
                
                <article>
                    <?php if( !empty( $gallery_images[$i] ) ) : ?>
                    <div class="featured-image">
                        <img src="<?php echo esc_url( $gallery_images[$i] ); ?>"/>
                    </div><!-- .featured-image -->
                    <?php endif; ?>
                    <?php if( !empty( $gallery_titles[$i] ) || !empty( $gallery_contents[$i] ) ) : ?>
                        <div class="entry-container">
                            <?php if( !empty( $gallery_titles[$i] ) ) : ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php echo esc_html( $gallery_titles[$i] ); ?></h2>
                                </header>
                            <?php endif; ?>
                        </div><!-- .entry-container -->
                    <?php endif; ?>
                </article>
            <?php endif; endfor;?>
        </div>
    <?php endif;