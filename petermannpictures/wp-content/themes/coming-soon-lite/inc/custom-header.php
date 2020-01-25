<?php
/**
 * Custom header implementation
 */

function coming_soon_lite_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'coming_soon_lite_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'coming_soon_lite_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'coming_soon_lite_custom_header_setup' );

if ( ! function_exists( 'coming_soon_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see coming_soon_lite_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'coming_soon_lite_header_style' );
function coming_soon_lite_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .header-box {
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'coming-soon-lite-basic-style', $custom_css );
	endif;
}
endif; // coming_soon_lite_header_style