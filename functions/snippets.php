<?php
/**
 * Various Customizations and Options.
 *
 * @package WordPress
 */


/**
 * Display navigation to next/previous pagination
 */
if ( ! function_exists( 'wp_arch_content_nav' ) ) :

    function wp_arch_content_nav( $nav_id ) {

        // Access the global variables from within function
        global $wp_query, $post;

        // Don't print empty markup on single pages if there's nowhere to navigate.
        if ( is_single() ) {
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
        }

        // Don't print empty markup in archives if there's only one page.
        if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
            return;

        $nav_class = 'site-navigation paging-navigation';
        if ( is_single() )
            $nav_class = 'site-navigation post-navigation';

        ?>
        <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
            <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'wp_arch' ); ?></h1>

        <?php if ( is_single() ) : // navigation links for single posts ?>

            <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'wp_arch' ) . '</span> Older posts' ); ?>
            <?php next_post_link( '<div class="nav-next">%link</div>', 'Newer posts <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'wp_arch' ) . '</span>' ); ?>

        <?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

            <?php if ( get_next_posts_link() ) : ?>
            <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'wp_arch' ) ); ?></div>
            <?php endif; ?>

            <?php if ( get_previous_posts_link() ) : ?>
            <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'wp_arch' ) ); ?></div>
            <?php endif; ?>

        <?php endif; ?>

        </nav>
        <?php
    }
endif;


/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'wp_arch_posted_on' ) ) :

    function wp_arch_posted_on() {
        printf( __( '<p>Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span></p>', 'wp_arch' ),
        esc_url( get_permalink() ),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() ),
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'wp_arch' ), get_the_author() ) ),
        esc_html( get_the_author() )
        );
    }

endif;

/**
 * Prints HTML with meta information for the footer of post
 */
if ( !function_exists('wp_arch_footer_meta') ) :

	function wp_arch_footer_meta() {
		echo "<p>";
		// Categories
		$categories_list = get_the_category_list( __( ', ', 'wp_arch' ) );
		if ( $categories_list ) :
			printf( __( '<span class="cat-links">Posted in %1$s</span>', 'wp_arch' ), $categories_list );
		endif;
		// Tags
		$tags_list = get_the_tag_list( '', __( ', ', 'wp_arch' ) );
		if ( $tags_list ) :
			printf( __( '<span class="sep"> | </span><span class="tags-links">Tagged %1$s</span>', 'wp_arch' ), $tags_list );
		endif;
		// Comments Link on Blog Index Only
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) && !is_page() ) {
			echo '<span class="sep"> | </span><span class="comments-link">';
			comments_popup_link( __( 'Leave a comment', 'wp_arch' ), __( '1 Comment', 'wp_arch' ), __( '% Comments', 'twentyfifteen' ) );
			echo '</span>';
		}
		echo "</p>";
		// Comment Form Template on Single Post
		if ( is_single() ) {
			comments_template();
		}
	}

endif;


/**
 * Set the post excerpt length to 40 words.
 */
add_filter( 'excerpt_length', 'wp_arch_excerpt_length' );
function wp_arch_excerpt_length( $length ) {
    return 40;
}

/**
 * Debug Mode
 */
add_action('wp_footer', 'wp_arch_debugStat', 999 );
function wp_arch_debugStat() {
	if ( WP_DEBUG === true ) { print '<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~DEBUG ACTIVE ~~~~~~~~~~~~~~~~~~~~~~~~~~-->';}
}

