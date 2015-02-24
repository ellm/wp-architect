<h1 class="page-title">
<?php
	if ( is_category() ) :
		printf( __( 'Category Archives: %s', 'wp_arch' ), '<span>' . single_cat_title( '', false ) . '</span>' );
	elseif( is_archive() ) :
		if ( is_day() ) : // is Day...
			printf( __( 'Daily Archives: %s', 'wp_arch' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) : // is Month...
			printf( __( 'Monthly Archives: %s', 'wp_arch' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif ( is_year() ) : // is Year...
			printf( __( 'Yearly Archives: %s', 'wp_arch' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
		elseif ( is_search() ) : // is Search...
			printf( __( 'Search Results for: %s', 'wp_arch' ), '<span>' . get_search_query() . '</span>' );
		elseif ( is_post_type_archive() ) : // is Post Type Archive
			wp_arch_get_post_type_name();
		elseif ( is_tag() ) : // is Tag
			echo 'Tag Archives: '; echo('<span>' . single_tag_title() . '</span>' );
		else :
		_e( 'Archives', 'wp_arch' );
		endif;
	endif;
?>
</h1>
