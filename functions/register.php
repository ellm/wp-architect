<?php
/**
 * Register Functions
 *
 * @package WordPress
 */

/**
 * Register Menus
 */
function wp_arch_menus_init() {
	register_nav_menus( array (
	        'main-nav' => __( 'The Main Menu', 'wp_arch' ),   // main nav in header
	        'footer-links' => __( 'Footer Links', 'wp_arch' ) // secondary nav in footer
	    )
	);
}

/**
 * Register Sidebar
 */
function wp_arch_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'wp_arch_A' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
