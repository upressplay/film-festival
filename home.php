<?php 
	get_header(); 

?>
	<div class="desktop">
		<div class="section-header">
			<h2 class="title">
				Schedule
			</h2><!-- title -->
			<a href="/schedule">
				<div class="more-btn">
					More
				</div><!-- more-btn -->
			</a>
		</div><!-- section-header -->
		<div class="schedule-thumbs">
			<?php 
				$today = date('Y-m-d H:i:s');
				$args = array(
				   	'category_name'		=>'schedule',
				    'posts_per_page'	=> 3,
				    'meta_key' 			=> 'start_date',
					'orderby' 			=> 'meta_value',
					'order' 			=> 'ASC',
					'meta_query' 		=> array(
	                    array(
	                        'key' 		=> 'start_date',
	                        'value' 	=> $today,
	                        'compare' 	=> '>'
	                    ),
	                ),  
				);
				$query = new WP_Query( $args );
				while ( $query->have_posts() ) : $query->the_post(); 
				    
				    get_template_part( 'thumb-schedule' );	


			 endwhile; ?>
		</div>
	</div>
	<?php 
		$page_placement = 'Home Page Top Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
	<div class="section-header gray">
		<h2 class="title">
			News
		</h2><!-- title -->
		<a href="/news">
			<div class="more-btn">
				More
			</div><!-- more-btn -->
		</a>
	</div><!-- section-header -->
	<div class="news-thumbs">
		<?php 
			$args = array(
			   'category_name'=>'news',
			    'posts_per_page'=> 3,
			);
			$query = new WP_Query( $args );
			while ( $query->have_posts() ) : $query->the_post();
			    //Post data
			    get_template_part( 'thumb-news' );
			    //echo get_the_post_thumbnail(get_the_ID());
			endwhile;
		?>
	</div>

	<div class="section-header blue">
		<h2 class="title">
			Photos
		</h2><!-- title -->
		<a href="/photos">
			<div class="more-btn">
				More
			</div><!-- more-btn -->
		</a>
	</div><!-- section-header -->
	<div class="photos-thumbs">
		<?php 
			$args = array(
			   'category_name'=>'photos',
			    'posts_per_page'=> 20,
			);
			$query = new WP_Query( $args );
			while ( $query->have_posts() ) : $query->the_post();
			    //Post data
			    get_template_part( 'thumb-photos' );
			    //echo get_the_post_thumbnail(get_the_ID());
			endwhile;
		?>
	</div>
	<?php 
		$page_placement = 'Home Page Bottom Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
<?php get_footer(); ?>