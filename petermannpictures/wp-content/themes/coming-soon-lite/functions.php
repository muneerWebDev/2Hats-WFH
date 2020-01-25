<?php
/**
 * coming-soon-lite functions and definitions
 *
 * @package WordPress
 * @subpackage coming-soon-lite
 * @since 1.0
 */

function coming_soon_lite_setup() {
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
    'default-color'          => '',
    'default-image'          => '',
    'default-repeat'         => '',
    'default-position-x'     => '',
    'default-attachment'     => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
	));

	add_image_size( 'coming-soon-lite-featured-image', 2000, 1200, true );

	add_image_size( 'coming-soon-lite-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'coming-soon-lite' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', coming_soon_lite_fonts_url() ) );

}
add_action( 'after_setup_theme', 'coming_soon_lite_setup' );

function coming_soon_lite_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'coming-soon-lite' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'coming-soon-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'coming-soon-lite' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'coming-soon-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'coming-soon-lite' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'coming-soon-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'coming_soon_lite_widgets_init' );

function coming_soon_lite_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function coming_soon_lite_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'coming-soon-lite-fonts', coming_soon_lite_fonts_url(), array(), null );
	
	//Bootstarp 
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'coming-soon-lite-basic-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'coming-soon-lite-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'coming-soon-lite-style' ), '1.0' );
		wp_style_add_data( 'coming-soon-lite-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'coming-soon-lite-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'coming-soon-lite-style' ), '1.0' );
	wp_style_add_data( 'coming-soon-lite-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'coming-soon-lite-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$coming_soon_lite_l10n=array();
	
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'coming-soon-lite-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$coming_soon_lite_l10n['expand']         = __( 'Expand child menu', 'coming-soon-lite' );
		$coming_soon_lite_l10n['collapse']       = __( 'Collapse child menu', 'coming-soon-lite' );
	}

	wp_enqueue_script( 'coming-soon-lite-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'coming-soon-lite-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array('jquery') );

	wp_localize_script( 'coming-soon-lite-skip-link-focus-fix', 'coming_soon_liteScreenReaderText', $coming_soon_lite_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coming_soon_lite_scripts' );

function coming_soon_lite_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'coming_soon_lite_front_page_template' );

function coming_soon_lite_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function coming_soon_lite_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//footer Link
define('COMING_SOON_LITE_CREDIT','https://www.luzuk.com/','coming-soon-lite');

if ( ! function_exists( 'coming_soon_lite_credit' ) ) {
	function coming_soon_lite_credit(){
		echo "<a href=".esc_url(COMING_SOON_LITE_CREDIT)." target='_blank'>".esc_html__('Luzuk','coming-soon-lite')."</a>";
	}
}

/* Excerpt Limit Begin */
function coming_soon_lite_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'coming_soon_lite_loop_columns');
	if (!function_exists('coming_soon_lite_loop_columns')) {
		function coming_soon_lite_loop_columns() {
	return 3; // 3 products per row
	}
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );