<!doctype html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php 
  $header_text_color = get_header_textcolor(); 
?>
<?php
$background_color = get_background_color();


?>
    <style>
        :root {
            --bg-color: <?php echo get_option($header_text_color ); ?>;
            --font-color: #cc584b;
            }

    </style>

   
    <style>
        
    </style>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <a class="skip-link sr-only sr-only-focusable" href="#main">
        <?php _e( 'Skip to content', 'simple-bootstrap' ); ?>
    </a>

    <div id="content-wrapper">

        <header>
            <nav class="navbar navbar-expand">
                <div class="container">

                    <?php if (has_nav_menu("main_nav")): ?>
                    <button class="navbar-toggler d-block collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="<?php _e('Toggle Navigation', 'simple-bootstrap'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php endif ?>

                    <?php if (has_nav_menu("main_nav")): ?>
                    <div id="navbarSupportedContent" class="collapse navbar-collapse d-block">

                    <div class="navbrand-wrapper d-flex">
                    <a class="navbar-brand"
                        href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?><span>PETERMANN PICTURES</span></a>
                        <button class="navbar-toggler d-block collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="<?php _e('Toggle Navigation', 'simple-bootstrap'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    </div>

                        <?php
						    simple_bootstrap_display_main_menu_updated();
                        ?>
                        <div class="footer-contents inner-footer">
                        <?php dynamic_sidebar('footer1'); ?>
                        </div>
                    </div>
                    <?php endif ?>

                </div>
            </nav>
        </header>

        <?php if (has_header_image()): ?>
        <div class="header-image-container">
            <div class="header-image" style="background-image: url(<?php echo get_header_image(); ?>)">
                <div class="container pt-5">
                    <?php if (display_header_text()): ?>
                    <div class="site-title mb-4" style="color: #<?php header_textcolor(); ?>;"><?php bloginfo('name') ?>
                    </div>
                    <div class="site-description" style="color: #<?php header_textcolor(); ?>;">
                        <?php bloginfo('description') ?></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <?php endif ?>

        <div id="page-content">