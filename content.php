<?php
/**
 * Main content template for posts and pages
 *
 * @package WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wp_arch' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php wp_arch_posted_on(); ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if ( is_home() || is_search() || is_archive() ) : // Only display Excerpts for Blog (Home), Search and Archive pages ?>
        <div class="entry-summary">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            <?php the_excerpt(); ?>
        </div>

    <?php else : // Display full content on all other posts and pages ?>
        <div class="entry-content">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail('large');} ?>
            <?php the_content(); ?>
        </div>
    <?php endif; ?>

    <footer class="entry-footer">
    	<div class="entry-meta">
        	<?php wp_arch_footer_meta(); ?>
        </div>
    </footer>

</article>
