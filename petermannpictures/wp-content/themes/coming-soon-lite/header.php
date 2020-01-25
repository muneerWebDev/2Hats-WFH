<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage coming-soon-lite
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'coming-soon-lite' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="logo">
			        <?php if( has_custom_logo() ){ coming_soon_lite_the_custom_logo();
			           	}else{ ?>
			          	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			          	<?php $description = get_bloginfo( 'description', 'display' );
			          	if ( $description || is_customize_preview() ) : ?> 
			            <p class="site-description"><?php echo esc_html($description); ?></p>
			        <?php endif; }?>
			    </div>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="contact-info">
					<?php if( get_theme_mod( 'coming_soon_lite_phone_number') != '') { ?>
						<span class="info"><?php esc_html_e('call','coming-soon-lite'); ?></span><span><?php echo esc_html( get_theme_mod( 'coming_soon_lite_phone_number','' ) ); ?></span>
					<?php }?>
					<?php if( get_theme_mod( 'coming_soon_lite_email_address') != '') { ?>
						<span class="info"><?php esc_html_e('Email','coming-soon-lite'); ?></span><span><?php echo esc_html( get_theme_mod( 'coming_soon_lite_email_address','' ) ); ?></span>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</header>