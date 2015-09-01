<?php
/**
 * Theme Support
 *
 * @package WordPress
 */
function wp_arch_theme_support() {

	/**
	 * Thumbnails & Custom Image Sizes.
	 */
	add_theme_support( 'post-thumbnails' );
	// Set default thumb size
	set_post_thumbnail_size( 125, 125, true );
	// Set custom thumb size
	add_image_size( 'big-thumb', 300, 300, true );

	/**
	 * Enable html5
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
	) );

	/**
	 * Enable Title Tag
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable post and comment RSS feed links in the head.
	 */
	add_theme_support( 'automatic-feed-links' );

}
