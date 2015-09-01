<?php
/**
 * The template for displaying all pages.
 *
 * @package WordPress
 */

get_header(); ?>
<section class="primary" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		/* Include the Post-Type-specific template for the content.
		 * If you want to overload this in a child theme then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'content', get_post_type() );
		?>
	<?php endwhile; ?>

</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
