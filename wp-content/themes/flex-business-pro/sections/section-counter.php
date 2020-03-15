<?php 
/**
 * Template part for displaying Counter Section
 *
 *@package Flex Business Pro
 */
?>
    <?php         
        $number_of_counter = flex_business_pro_get_option( 'number_of_counter' );
    ?>

    <div class="section-content col-<?php echo esc_attr( $number_of_counter );?>">
        <?php for( $i=1; $i<=$number_of_counter; $i++ ) : 
            $counter_icon = flex_business_pro_get_option( 'counter_icon_'. $i );
            $counter_number = flex_business_pro_get_option( 'counter_number_'. $i );
            $counter_title = flex_business_pro_get_option( 'counter_title_'. $i );

            ?>
            <div class="counter-item">

                <?php if ( !empty($counter_icon ) )  :?>
                    <i class="<?php echo esc_html($counter_icon); ?>"></i>
                <?php endif;?>

                <?php if ( !empty($counter_number ) )  :?>
                    <span><?php echo esc_html($counter_number); ?></span>
                <?php endif;?>

                <?php if ( !empty($counter_title ) )  :?>
                    <h2><?php echo esc_html($counter_title); ?></h2>
                <?php endif;?>

            </div><!-- .counter-item -->
        <?php endfor; ?>
    </div><!-- .section-content -->
