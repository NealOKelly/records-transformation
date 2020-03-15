<?php 
/**
 * Template part for displaying additional_infos Section
 *
 *@package Flex Business Pro
 */

$ad_content_type   = flex_business_pro_get_option( 'ad_content_type' );
$number_of_column  = flex_business_pro_get_option( 'number_of_column' );
$number_of_items = flex_business_pro_get_option( 'number_of_items' );
$additional_info_section_title      = flex_business_pro_get_option( 'additional_info_section_title' );


for( $i=1; $i<=$number_of_items; $i++ ) :
    $additional_info_posts[] = absint(flex_business_pro_get_option( 'additional_info_'.$i ) );
endfor;
?>

    <?php if(!empty($additional_info_section_title)):?>
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html($additional_info_section_title);?></h2>
        </div><!-- .section-header -->
    <?php endif;?>
    <?php if( $ad_content_type == 'ad_page' ) : ?>
        <div class="section-content clear col-<?php echo esc_attr( $number_of_column ); ?>">
            <?php $args = array (
                'post_type' => 'page',
                'post_per_page'  => count( $additional_info_posts ),
                'post__in'       => $additional_info_posts,
                'orderby'        =>'post__in',
            );
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1; $j=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++; $j++;
                $additional_info_icons[$j] = flex_business_pro_get_option( 'additional_info_icon_'.$j ); ?>        
                
                <article>
                    <?php if( !empty( $additional_info_icons[$j] ) ) : ?>
                        <div class="icon-container">
                            <i class="<?php echo esc_attr( $additional_info_icons[$j] )?>"></i>
                        </div><!-- .icon-container -->
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
                        <a href="<?php the_permalink();?>"><?php echo esc_html($readmore_text);?></a>
                    </div><!-- .read-more -->
                </article>

              <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
        </div>
    <?php else: ?>
        <div class="section-content clear col-<?php echo esc_attr( $number_of_column ); ?>">
            <?php for( $i=1; $i<=$number_of_items; $i++ ) : 
            $additional_info_icons[$i] = flex_business_pro_get_option( 'additional_info_icon_'.$i );
            $additional_info_titles[$i] = flex_business_pro_get_option( 'additional_customtitle_'.$i );
            $additional_info_btntext[$i] = flex_business_pro_get_option( 'additional_custombtntext_'.$i );
            $additional_info_urls[$i] = flex_business_pro_get_option( 'additional_customurl_'.$i );     
            $additional_info_urls[$i] = ( !empty( $additional_info_urls[$i] ) ) ? $additional_info_urls[$i] : '#';
            $additional_info_contents[$i] = flex_business_pro_get_option( 'additional_custominfo_'.$i );?>
            <?php if( !empty( $additional_info_icons[$i] ) || !empty( $additional_info_titles[$i] ) || !empty( $additional_info_contents[$i] ) ) : ?>     
            <article>
                <?php if( !empty( $additional_info_icons[$i] ) ) : ?>
                    <div class="icon-container">
                        <i class="<?php echo esc_attr( $additional_info_icons[$i] )?>"></i>
                    </div><!-- .icon-container -->
                <?php endif; ?>
                <?php if( !empty( $additional_info_titles[$i] ) ) : ?>
                <header class="entry-header">
                    <h2 class="entry-title"><?php echo esc_html( $additional_info_titles[$i] )?></h2>
                </header>
                <?php endif; ?>
                <?php if( !empty( $additional_info_contents[$i] ) ) : ?>
                <div class="entry-content">
                    <?php echo esc_html( $additional_info_contents[$i] )?>
                </div><!-- .entry-content -->
                <?php endif; ?>
                <?php if( !empty( $additional_info_btntext[$i] ) ) : ?>
                <div class="read-more">
                    <a href="<?php echo esc_url( $additional_info_urls[$i] )?>"><?php echo esc_html( $additional_info_btntext[$i] )?></a>
                </div><!-- .read-more -->
                <?php endif; ?>
            </article>
        <?php endif; endfor; ?>
        </div>
    <?php endif;