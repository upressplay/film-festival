<?php 
	get_header(); 
	if(is_front_page()) {
		echo "front";
	} else {
		echo "not front";
	}

	if ( have_posts() ) {
		while ( have_posts() ) {

			the_post(); 
			echo "page posts";
			
		}
	}
	get_footer();
?>