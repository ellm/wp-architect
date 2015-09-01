<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 */
?>
</div><!-- .main-wrapper -->

<footer class="page-footer" role="contentinfo">
	<div class="site-info">
		<p>Copyright &copy; <?php echo date( "Y" ) ?> </p>
		<nav>
			<?php wp_nav_menu( array( 'theme_location' => 'footer-links' ) ); ?>
		</nav>
	</div>
</footer>

</div><!-- .page -->
<?php wp_footer(); ?>
</body>
</html>
