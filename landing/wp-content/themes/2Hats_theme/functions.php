<?php

//loading basic styles and scripts
function get_basic_assets()
{
    wp_enqueue_style("basic_styles", get_template_directory_uri() . "/css/style.css");
    wp_enqueue_script('jqueryJs', get_template_directory_uri() . "/js/jquery.min.js", array(), false, true);
    wp_enqueue_script('popper', get_template_directory_uri() . "/js/popper.min.js", array(), false, true);
    wp_enqueue_script('slick', get_template_directory_uri() . "/js/slick.min.js", array(), false, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . "/js/bootstrap.min.js", array(), false, true);
    wp_enqueue_script('wowJs', get_template_directory_uri() . "/js/wow.min.js", array(), false, true);
    wp_enqueue_script('customJs', get_template_directory_uri() . "/js/custom.js", array(), false, true);
}

add_action('wp_enqueue_scripts', 'get_basic_assets');


//allow nav menu
add_theme_support('menus');


/********Main  Navigation***********/
//Nav Item
function atg_menu_classes($classes, $item, $args)
{
    if ($args->theme_location == 'header-menu') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

//Nav Link
function add_link_atts($atts) {
    $atts['class'] = "nav-link";
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_link_atts');

//Registering locations for menu to show
function register_theme_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu'),
            'footer-menu' => __('Footer Menu')
        )
    );
}
add_action('init', 'register_theme_menus');

/********Main  Navigation Ends***********/



