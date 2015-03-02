<?php
/**
 * Register and Enqueue Scripts.
 *
 * @package WordPress
 */
function wp_arch_scripts_and_styles() {
    // If is NOT admin area...
    if (!is_admin()) {

		/**
		* Enqueue jQuery script from WordPress (Recommended over Google CDN)
		*
		*/
        wp_enqueue_script('jquery');

		/**
		* Enqueue Modernizr Script
		*
		*/
		if ( WP_DEBUG === true ) {
        	wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/assets/js/modernizr.js', array(), null, false);
        } else {
        	wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/assets/js/min/modernizr.prod.min.js', array(), null, false);
        }

		/**
		* Enqueue Site Scripts
		*
		*/
        // Check to load development or production
        if ( WP_DEBUG === true ) {
        	wp_enqueue_script('common_scripts', get_stylesheet_directory_uri() . '/assets/js/common.js', array('jquery'), null, true);
        } else {
        	wp_enqueue_script('common_scripts', get_stylesheet_directory_uri() . '/assets/js/min/common.min.js', array('jquery'), null, true);
        }

		/**
		* Enqueue Style.css
		*
		*/
        wp_enqueue_style('wpstyles', get_stylesheet_uri(), array(), 'all');

		/**
		* Enqueue Site CSS
		*
		*/
        // Check to load development or production
        if ( WP_DEBUG === true ) {
        	wp_enqueue_style('common_styles', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), null, 'all');
        } else {
        	wp_enqueue_style('common_styles', get_stylesheet_directory_uri() . '/assets/css/global.min.css', array(), null, 'all');
        }

        /**
        * Enqueue Live Reload on local server
        *
        */
        if ( WP_DEBUG === true ) {
            wp_enqueue_script('wp_arch_livereload', '//192.168.50.4:35729/livereload.js?snipver=1', array(), true);
        }

    }
}

 ?>
