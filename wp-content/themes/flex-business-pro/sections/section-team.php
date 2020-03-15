<?php 
/**
 * Template part for displaying team Section
 *
 *@package Flex Business Pro
 */

    $team_title             = flex_business_pro_get_option( 'team_title' );
    $ts_content_type        = flex_business_pro_get_option( 'ts_content_type' );
    $number_of_ts_column    = flex_business_pro_get_option( 'number_of_ts_column' );
    $number_of_ts_items     = flex_business_pro_get_option( 'number_of_ts_items' );

    for( $i=1; $i<=$number_of_ts_items; $i++ ) :
        $teams_page_posts[] = absint(flex_business_pro_get_option( 'teams_page_'.$i ) );
    endfor;
    ?>

    <?php if(!empty($team_title)):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($team_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>
    <?php if( $ts_content_type == 'ts_page' ) : ?>
    <div class="section-content col-<?php echo esc_attr( $number_of_ts_column ); ?>">
        <?php $args = array (
            'post_type'     => 'page',
            'post_per_page' => count( $teams_page_posts ),
            'post__in'      => $teams_page_posts,
            'orderby'       =>'post__in',
        );        
        $loop = new WP_Query($args);                        
        if ( $loop->have_posts() ) :
        $i=-1;  
            while ($loop->have_posts()) : $loop->the_post(); $i++;?>
            
            <article>
                <div class="team-wrapper">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="featured-image">
                            <img src="<?php the_post_thumbnail_url(); ?>"/>
                        </div><!-- .featured-image -->
                    <?php endif; ?>

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><?php the_title();?></h2>
                        </header>

                        <div class="entry-content">
                            <?php
                                $excerpt = flex_business_pro_the_excerpt( 20 );
                                echo wp_kses_post( wpautop( $excerpt ) );
                            ?>
                        </div><!-- .entry-content -->
                    </div><!-- .entry-container -->
                </div><!-- .team-wrapper -->
            </article>

          <?php endwhile;?>
          <?php wp_reset_postdata(); ?>
        <?php endif;?>
    </div>
    <?php else: ?>
        <div class="section-content col-<?php echo esc_attr( $number_of_ts_column ); ?>">
            <?php for( $i=1; $i<=$number_of_ts_items; $i++ ) : 
            $teams_titles[$i] = flex_business_pro_get_option( 'teams_customtitle_'.$i );
            $teams_urls[$i] = ( !empty( $teams_urls[$i] ) ) ? $teams_urls[$i] : '#';
            $teams_contents[$i] = flex_business_pro_get_option( 'teams_custominfo_'.$i );
            $teams_images[$i] = flex_business_pro_get_option( 'teams_customimage_'.$i );?>
            <?php if( !empty( $teams_titles[$i] ) || !empty( $teams_contents[$i] ) || !empty( $teams_images[$i] ) ) : ?>  
                
                <article>
                    <div class="team-wrapper">
                        <?php if( !empty( $teams_images[$i] ) ) : ?> 
                            <div class="featured-image">                        
                                <img src="<?php echo esc_url( $teams_images[$i] ); ?>"/>                       
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <?php if( !empty( $teams_titles[$i] ) ) : ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php echo esc_html( $teams_titles[$i] ); ?></h2>
                                </header>
                            <?php endif; ?>

                            <?php if( !empty( $teams_contents[$i] ) ) : ?>
                                <div class="entry-content">
                                    <?php echo esc_html( $teams_contents[$i] ); ?>
                                </div><!-- .entry-content -->
                            <?php endif; ?>
                        </div><!-- .entry-container -->
                    </div><!-- .team-wrapper -->
                </article>
            <?php endif; endfor;?>
        </div>
    <?php endif;