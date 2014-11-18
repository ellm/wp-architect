<?php
/**
 * Register and Enqueue Scripts.
 *
 * http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 *
 * @since       1.0.0
 *
 * @package     WordPress
 * @subpackage  Functions (functions.php)
 */

/**
 * Registers and Enqueues scripts and styles.
 * @return various
 * @author ellm
 * @since  1.0.0
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
        wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/assets/js/vendor/modernizr.min.js', array(), null, false);

		/**
		* Enqueue Site Scripts
		*
		*/
        // Check to load development or production
        if ( WP_DEBUG === true ) {
        	wp_enqueue_script('common_scripts', get_stylesheet_directory_uri() . '/assets/js/common.js', array('jquery'), null, true);
        } else {
        	wp_enqueue_script('common_scripts', get_stylesheet_directory_uri() . '/assets/js/common.min.js', array('jquery'), null, true);
        }

		/**
		* Enqueue Style.css
		*
		*/
        wp_enqueue_style('wpstyles', get_stylesheet_uri(), array(), 'all');

		/**
		* Enqueue Site Styles
		*
		*/
        // Check to load development or production
        if ( WP_DEBUG === true ) {
        	wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), 'all');
        } else {
        	wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/assets/css/global.min.css', array(), 'all');
        }

        /**
        * Enqueue Live Reload on local server
        *
        */
        if ( $_SERVER["SERVER_ADDR"] == '192.168.50.4' ) {
            wp_enqueue_script('wp_arch_livereload', '//192.168.50.4:35729/livereload.js?snipver=1', array(), true);
        }

    }
}

 ?>
