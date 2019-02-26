<?php get_header(); ?>


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
			$args = array(
			   'category_name'=>'schedule',
			    'posts_per_page'=> 3,
			);
			$query = new WP_Query( $args );
			while ( $query->have_posts() ) : $query->the_post();
			    //Post data
			    $selections = get_field('selections');
			    //echo get_the_post_thumbnail(get_the_ID());
			endwhile;
		?>
	</div>
	<div class="banner">
		<a href="https://bang-energy.com" target="_blank">
			<img src="http://new.kapowiff.com/wp-content/uploads/2019/02/bang_720x90.jpg"/>
		</a>
	</div>
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

<?php get_footer(); ?>