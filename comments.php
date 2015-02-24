<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to wp_arch_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 */
?>

<?php
    /*
     * If the current post is protected by a password and
     * the visitor has not yet entered the password we will
     * return early without loading the comments.
     */
    if ( post_password_required() )
        return;
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
                printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'wp_arch' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>

        <ol class="commentlist">
            <?php wp_list_comments(); ?>
        </ol>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
        <h1 class="assistive-text"><?php _e( 'Comment navigation', 'wp_arch' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wp_arch' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wp_arch' ) ); ?></div>
        </nav>
        <?php endif;?>

    <?php endif;?>

    <?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<p><?php _e( 'Comments are closed.', 'wp_arch' ); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div>
