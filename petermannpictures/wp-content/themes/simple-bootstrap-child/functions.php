<?php

//Linking Child theme with Main Theme

function my_theme_enqueue_styles() {

    $parent_style = 'wpbs-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );


    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );


}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

//My Custom theme

function my_custom_theme(){

    wp_enqueue_style('my-custom-style', get_stylesheet_directory_uri() ."/custom-style/style.css");
    wp_enqueue_script('my-custom-js', get_stylesheet_directory_uri() ."/js/custom.js");
}


add_action( 'wp_enqueue_scripts', 'my_custom_theme', 99 );


//Altering Main theme functions

function simple_bootstrap_display_main_menu_updated() {
    wp_nav_menu(
        array( 
            'theme_location' => 'main_nav', /* where in the theme it's assigned */
            'menu_class' => 'navbar-nav',
            'container' => false, /* container class */
            'depth' => 2,
            'walker' => new simple_bootstrap_Bootstrap_walker(),
        )
    );
}

function simple_boostrap_main_classes_updated() {
    if (! is_active_sidebar('sidebar-left') && ! is_active_sidebar('sidebar-right')) { // no columns
        echo "col-md-12";
    } else if (! is_active_sidebar('sidebar-right')) { // only left
        echo "col-md-8";
    } else if (! is_active_sidebar('sidebar-left')) { // only right
        echo "col-md-8";
    } else { // both columns
        echo "col-md-6";
    }
}