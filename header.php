<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 */
 ?>
<!doctype html>
<html class="no-js" <?php language_attributes() ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
		<!--[if IE 8]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body <?php body_class(); ?>>
	   <!--[if lt IE 8]>
	    <p class="alert">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	   <![endif]-->
	    <div class="hfeed page">

	        <header role="banner">
	            <h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	            <h2><?php bloginfo( 'description' ); ?></h2>
	            <nav role="navigation">
	                <h1 class="screen-reader-text"><?php _e( 'Main menu', 'wp_arch' ); ?></h1>
	                <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'wp_arch' ); ?>"><?php _e( 'Skip to content', 'wp_arch' ); ?></a></div>
	                <?php wp_nav_menu( array(
	                'theme_location' => 'main-nav',
	                'depth' => 2,
	                'items_wrap' => '<ul class="%1$s">%3$s</ul>') ); ?>
	            </nav>
	        </header>

	        <div id="content" class="main-wrapper">
