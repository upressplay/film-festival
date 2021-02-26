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
					 'order'				=> 'ASC',
					 'orderby'			=> 'meta_value',
					 'meta_key'			=> 'start_date',
					 'meta_type'			=> 'DATETIME',
					 'meta_value' 		=> date('Y-m'),
					   'meta_compare' 		=> '>',
					 'paged'				=> $paged
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

<div class="section-header">
		<h2 class="title">
			Featurettes
		</h2><!-- title -->
		<a href="/featurettes">
			<div class="more-btn">
				More
			</div><!-- more-btn -->
		</a>
	</div><!-- section-header -->
	<div class="schedule-thumbs">
		<?php 
			$args = array(
				'category_name'		=>'featurettes',
				'posts_per_page'	=> 4,
				'order' 			=> 'ASC',
			);
			$query = new WP_Query( $args );
			while ( $query->have_posts() ) : $query->the_post(); 
				
				get_template_part( 'thumb-featurette' );	

			endwhile; ?>
	</div>

	<div class="section-header">
		<h2 class="title">
			Twitch
		</h2><!-- title -->
	</div><!-- section-header -->
	<div class="twitch-holder">
		<iframe id="twitch_feed" src="https://player.twitch.tv/?channel=kapowiff&amp;parent=kapowiff.com" frameborder="0" allowfullscreen="true" scrolling="no"></iframe>
		<iframe id="chat_embed" src="https://www.twitch.tv/embed/kapowiff/chat?parent=kapowiff.com"></iframe>
	</div>
	<?php 
		$page_placement = 'Home Page Mid Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
	<div class="section-header">
		<h2 class="title">
			Official-Selections
		</h2><!-- title -->
		<a href="/official-selection">
			<div class="more-btn">
				More
			</div><!-- more-btn -->
		</a>
	</div><!-- section-header -->
	<div class="schedule-thumbs">
		<?php 
			$args = array(
				'category_name'		=>'official-selection',
				'posts_per_page'	=> 7,
				'order' 			=> 'ASC',
			);
			$query = new WP_Query( $args );
			while ( $query->have_posts() ) : $query->the_post(); 
				
				get_template_part( 'thumb-official-selection' );	

			endwhile; ?>
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
	<?php 
		$page_placement = 'Home Page Mid2 Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
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