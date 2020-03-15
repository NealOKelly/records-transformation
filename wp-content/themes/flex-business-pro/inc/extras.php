<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Flex Business Pro
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function flex_business_pro_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class for global layout.
	$sidebar_layout = flex_business_pro_get_option('layout_options'); 
	$classes[] = esc_attr( $sidebar_layout );

	return $classes;
}
add_filter( 'body_class', 'flex_business_pro_body_classes' );

/**
 * Adds custom body class
 */
function Flex_custom_body_class( $input ) {

	// Add a class for header typography
	$header_typography = ( ( flex_business_pro_get_option( 'header_typography' ) ) == 'default' ) ? '' :  ( flex_business_pro_get_option( 'header_typography' ) );
	$input[] = esc_attr( $header_typography );

	$body_typography = ( ( flex_business_pro_get_option( 'body_typography' ) ) == 'default' ) ? '' :  ( flex_business_pro_get_option( 'body_typography' ) );
	$input[] = esc_attr( $body_typography );

	$topbar_color = ( ( flex_business_pro_get_option( 'topbar_color' ) ) == 'default' ) ? '' :  ( flex_business_pro_get_option( 'topbar_color' ) );
	$input[] = esc_attr( $topbar_color );

	$header_color = ( ( flex_business_pro_get_option( 'header_color' ) ) == 'default' ) ? '' :  ( flex_business_pro_get_option( 'header_color' ) );
	$input[] = esc_attr( $header_color );

	$footer_color = ( ( flex_business_pro_get_option( 'footer_color' ) ) == 'default' ) ? '' :  ( flex_business_pro_get_option( 'footer_color' ) );
	$input[] = esc_attr( $footer_color );

	return $input;
}
add_filter( 'body_class', 'Flex_custom_body_class' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function flex_business_pro_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'flex_business_pro_pingback_header' );

/**
 * Function to get Sections 
 */
function flex_business_pro_get_sections() {
    $sections = array( 'featured-slider', 'additional-info', 'cta', 'gallery', 'counter',  'services', 'team', 'testimonial', 'blog' );
    $enabled_section = array();
    foreach ( $sections as $section ){
    	
        if (false == flex_business_pro_get_option('disable_'.$section.'_section')){
            $enabled_section[] = array(
                'id' => $section,
                'menu_text' => esc_html( flex_business_pro_get_option('' . $section . '_menu_title','') ),
            );
        }
    }
    return $enabled_section;
}

if ( ! function_exists( 'flex_business_pro_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function flex_business_pro_the_excerpt( $length = 0, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
		return $trimmed_content;

	}

endif;

//  Customizer Control
if (class_exists('WP_Customize_Control') && ! class_exists( 'flex_business_pro_Image_Radio_Control' ) ) {
	/**
 	* Customize sidebar layout control.
 	*/
	class flex_business_pro_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {

			if (empty($this->choices))
				return;

			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<ul class="controls" id='flex-business-pro-img-container'>
				<?php
				foreach ($this->choices as $value => $label) :
					$class = ($this->value() == $value) ? 'flex-business-pro-radio-img-selected flex-business-pro-radio-img-img' : 'flex-business-pro-radio-img-img';
					?>
					<li style="display: inline;">
						<label>
							<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
														  $this->link();
														  checked($this->value(), $value);
														  ?> />
							<img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
						</label>
					</li>
					<?php
				endforeach;
				?>
			</ul>
			<?php
		}

	}
}	

if ( ! function_exists( 'flex_business_pro_header_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function flex_business_pro_header_typography_options() {

        $choices = array(
            'default'         => esc_html__( 'Roboto, sans-serif', 'flex-business-pro' ),
            'header-font-1'   => esc_html__( 'Raleway, sans-serif', 'flex-business-pro' ),
            'header-font-2'   => esc_html__( 'Poppins, sans-serif', 'flex-business-pro' ),
            'header-font-3'   => esc_html__( 'Montserrat, sans-serif', 'flex-business-pro' ),
            'header-font-4'   => esc_html__( 'Open Sans, sans-serif', 'flex-business-pro' ),
            'header-font-5'   => esc_html__( 'Lato, sans-serif', 'flex-business-pro' ),
            'header-font-6'   => esc_html__( 'Ubuntu, sans-serif', 'flex-business-pro' ),
            'header-font-7'   => esc_html__( 'Playfair Display, serif', 'flex-business-pro' ),
            'header-font-8'   => esc_html__( 'Lora, serif', 'flex-business-pro' ),
            'header-font-9'   => esc_html__( 'Titillium Web, sans-serif', 'flex-business-pro' ),
            'header-font-10'   => esc_html__( 'Muli, sans-serif', 'flex-business-pro' ),
            'header-font-11'   => esc_html__( 'Oxygen, sans-serif', 'flex-business-pro' ),
            'header-font-12'   => esc_html__( 'Nunito Sans, sans-serif', 'flex-business-pro' ),
            'header-font-13'   => esc_html__( 'Maven Pro, sans-serif', 'flex-business-pro' ),
            'header-font-14'   => esc_html__( 'Cairo, serif', 'flex-business-pro' ),
            'header-font-15'   => esc_html__( 'Philosopher, sans-serif', 'flex-business-pro' ),
        );
        $output = apply_filters( 'flex_business_pro_header_typography_options', $choices );
        return $output;

    }
endif;

if ( ! function_exists( 'flex_business_pro_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function flex_business_pro_body_typography_options() {

        $choices = array(
            'default'         => esc_html__( 'Montserrat, sans-serif', 'flex-business-pro' ),
            'body-font-1'   => esc_html__( 'Raleway, sans-serif', 'flex-business-pro' ),
            'body-font-2'   => esc_html__( 'Poppins, sans-serif', 'flex-business-pro' ),
            'body-font-3'   => esc_html__( 'Roboto, sans-serif', 'flex-business-pro' ),
            'body-font-4'   => esc_html__( 'Open Sans, sans-serif', 'flex-business-pro' ),
            'body-font-5'   => esc_html__( 'Lato, sans-serif', 'flex-business-pro' ),
            'body-font-6'   => esc_html__( 'Ubuntu, sans-serif', 'flex-business-pro' ),
            'body-font-7'   => esc_html__( 'Playfair Display, serif', 'flex-business-pro' ),
            'body-font-8'   => esc_html__( 'Lora, serif', 'flex-business-pro' ),
            'body-font-9'   => esc_html__( 'Titillium Web, sans-serif', 'flex-business-pro' ),
            'body-font-10'   => esc_html__( 'Muli, sans-serif', 'flex-business-pro' ),
            'body-font-11'   => esc_html__( 'Oxygen, sans-serif', 'flex-business-pro' ),
            'body-font-12'   => esc_html__( 'Nunito Sans, sans-serif', 'flex-business-pro' ),
            'body-font-13'   => esc_html__( 'Maven Pro, sans-serif', 'flex-business-pro' ),
            'body-font-14'   => esc_html__( 'Cairo, serif', 'flex-business-pro' ),
            'body-font-15'   => esc_html__( 'Philosopher, sans-serif', 'flex-business-pro' ),
        );
        $output = apply_filters( 'flex_business_pro_body_typography_options', $choices );
        return $output;

    }
endif;

if ( ! function_exists( 'flex_business_pro_topbar_color_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function flex_business_pro_topbar_color_options() {

        $choices = array(
            'default'       => esc_html__( 'White', 'flex-business-pro' ),
            'white-topbar'  => esc_html__( 'Black', 'flex-business-pro' ),
        );
        $output = apply_filters( 'flex_business_pro_topbar_color_options', $choices );
        return $output;

    }
endif;

if ( ! function_exists( 'flex_business_pro_header_color_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function flex_business_pro_header_color_options() {

        $choices = array(
            'default'       => esc_html__( 'Black', 'flex-business-pro' ),
            'black-header'  => esc_html__( 'White', 'flex-business-pro' ),
        );
        $output = apply_filters( 'flex_business_pro_header_color_options', $choices );
        return $output;

    }
endif;

if ( ! function_exists( 'flex_business_pro_footer_color_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function flex_business_pro_footer_color_options() {

        $choices = array(
            'default'       => esc_html__( 'White', 'flex-business-pro' ),
            'white-footer'  => esc_html__( 'Black', 'flex-business-pro' ),
        );
        $output = apply_filters( 'flex_business_pro_footer_color_options', $choices );
        return $output;

    }
endif;

