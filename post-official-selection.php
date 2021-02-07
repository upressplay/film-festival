<?php
	
	$videos = get_field('videos');
	$photos = get_field('photos');
	$poster = get_field('poster');
?>

<div class="selection">
	<?php if ( has_post_thumbnail() ) : ?>
	<header> 
		<?php the_post_thumbnail('header'); ?>
	</header> 
	<?php endif; ?>
	<?php 
		$page_placement = 'Official Selection Top Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
	<div class="info">
		<div class="poster-social">
			<div class="poster-thumb photos" data-hires="<?php echo $poster['url']; ?>" data-hires-w="<?php echo $poster['width']; ?>" data-hires-h="<?php echo $poster['height']; ?>"> 
				<img src="<?php echo $poster['sizes']['tall']; ?>" alt="<?php echo get_the_title($post->ID); ?> Poster"/>
			</div>
			<div class="social"> 
				<div class="page-social-btn share-btn" data-type="facebook" data-title="<?php echo get_the_title($post->ID) ?>" data-url="<?php echo get_permalink($post->ID) ?>" data-desc="<?php echo strip_tags(get_field('synopsis')); ?>">
					<span class="fab fa-facebook-square" aria-hidden="true" ></span>
					<span class="screen-reader-text">Facebook</span>
				</div>
				<div class="page-social-btn share-btn" data-type="twitter" data-title="<?php echo get_the_title($post->ID) ?>"  data-url="<?php echo get_permalink($post->ID) ?>" data-desc="<?php echo strip_tags(get_field('synopsis')); ?>">
					<span class="fab fa-twitter-square" aria-hidden="true" ></span>
					<span class="screen-reader-text">Twitter</span>
				</div>
			</div><!-- social -->

		</div>
		<div class="info-txt">
			<h1 class="title">
				<?php echo get_the_title($post->ID); ?>
			</h1><!-- title -->
			<?php if(get_field('tagline') != "") : ?>
			<h2 class="tagline">
				<?php echo get_field('tagline'); ?>
			</h2><!-- tagline -->
			<?php endif; ?>

			<div class="date-tickets">
				<?php 

				$args = array(
				   'category_name'		=>'schedule',
				    'order'				=> 'ASC',
				    'meta_query' => array(
						array(
							'key' => 'selections', // name of custom field
							'value' => '"' . $post->ID . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
							'compare' => 'LIKE'
						)
					)
				);
				$schedules = get_posts( $args );
				if( $schedules ): ?>
					<?php foreach( $schedules as $schedule ): ?>
						<?php 

						$start_date = get_field('start_date', $schedule->ID);

						$weekday = date("D", strtotime($start_date));
						$time = date("g:i a", strtotime($start_date));
						$month = date("M", strtotime($start_date));
						$day = date("j", strtotime($start_date));
						?>

						<div class="schedule-date">
							<div class="day-holder">
								<div class="day"><?php echo $weekday; ?></div>
							</div> 
							<div class="time-date">
								<div class="time"><?php echo $time; ?> </div>
								<div class="date"><?php echo $month; ?> <?php echo $day; ?> </div>
							</div><!-- date-time -->
						</div><!-- schedule-date -->

						<?php 
							$cta_btn = get_field('cta_btn', $schedule->ID);
						?>
						<?php if ($cta_btn['url'] != '') : ?>
						<a href="<?php echo $cta_btn['url']; ?>" target="blank">
							<div class="tickets-btn">
								<?php echo $cta_btn['text']; ?>
							</div>
						</a>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
				
			</div><!-- date-tickets -->
			
			<?php if( get_field('runtime') ): ?>
				<div class="aspects">
					<h4>Runtime:</h4>
					<?php echo the_field('runtime'); ?>
				</div>
			<?php endif; ?>
			
			
			<?php if( get_field('festival-year') ): ?>
				<div class="aspects">
					<h4>Festival:</h4>
				<?php $festivalYear = get_field('festival-year'); ?>
				<a href="/official-selection/?festival=<?php echo $festivalYear; ?>">
					<?php echo $festivalYear; ?>
				</a>
				</div>
			<?php endif; ?>
			
			
			<?php if( get_field('genre') ): ?>
				<div class="aspects">
				<h4>Genre:</h4>
				<?php 
					$genreField = get_field_object('genre');
					$genres = get_field('genre');
					foreach( $genres as $genre ) : ?>
						<a href="/official-selection/?genre=<?php echo $genre['value']; ?>">
							<?php echo $genre['label']; ?>
						</a>
					<?php endforeach; 
				?>
				</div>
			<?php endif; ?>
			<?php if( get_field('awards') ): ?>
				<div class="aspects">
				<h4>Awards:</h4>
				<?php 
					$awardField = get_field_object('awards');
					$awards = get_field('awards');
					foreach( $awards as $award ) : ?>
						<a href="/official-selection/?award=<?php echo $award['value']; ?>">
							<?php echo $award['label']; ?>
						</a>
					<?php endforeach; 
				?>
				</div>
			<?php endif; ?>
			
			<div class="synopsis">
				<h4>Synopsis:</h4>
				<?php echo get_field('synopsis'); ?>
			</div>
			
			<?php if( have_rows('cast_crew') ): ?>

				<div class="cast-crew">
				<h4>Crew:</h4>
				<?php while( have_rows('cast_crew') ): the_row(); ?>
					<div class="member">
						<span class="title">
							<?php echo get_sub_field('cast_crew_title'); ?>
						</span>: 
						<?php if(get_sub_field('cast_crew_url') != "") : ?>
							<a href="<?php echo get_sub_field('cast_crew_url'); ?>" target="_blank">
						<?php endif; ?>
						<span class="name">
							<?php echo get_sub_field('cast_crew_name'); ?>
						</span>
						<?php if(get_sub_field('cast_crew_url') != "") : ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
				</div><!-- cast-crew -->
			<?php endif; ?>

			<?php if( have_rows('cast_crew') ): ?>

			<div class="cast-crew">
			<h4>Cast:</h4>
			<?php while( have_rows('cast') ): the_row(); ?>
				<div class="member">
					<span class="title">
						<?php echo get_sub_field('cast_crew_title'); ?>
					</span>: 
					<?php if(get_sub_field('cast_crew_url') != "") : ?>
						<a href="<?php echo get_sub_field('cast_crew_url'); ?>" target="_blank">
					<?php endif; ?>
					<span class="name">
						<?php echo get_sub_field('cast_crew_name'); ?>
					</span>
					<?php if(get_sub_field('cast_crew_url') != "") : ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
			</div><!-- cast-crew -->
			<?php endif; ?>
			<?php if( have_rows('links') ): ?>

				<div class="links">
				<h4>Links:</h4>
				<?php while( have_rows('links') ): the_row(); ?>
					<a href="<?php echo get_sub_field('link_url'); ?>" target="_blank">
						<?php echo get_sub_field('text'); ?>
					</a>
				<?php endwhile; ?>
				</div><!-- links -->
			<?php endif; ?>
			<?php if( get_field('country_of_origin') ): ?>
				<div class="aspects">
					<h4>Country of Origin:</h4>
					<?php echo get_field('country_of_origin'); ?>
				</div>
			<?php endif; ?>

			<?php if( get_field('original_language') ): ?>
				<div class="aspects">
					<h4>Original Language:</h4>
					<?php echo get_field('original_language'); ?>
				</div>
			<?php endif; ?>

			<?php if( get_field('countries_allowed') ): ?>
				<div class="aspects">
				<h4>Countries Allowed:</h4>
				<?php 
					$allowed = get_field('countries_allowed');
					$count = 0;
					foreach( $allowed as $all ) : 
					
					if($count > 0) {
							echo ', ';
						}
					echo $all; 
					$count++;
					endforeach; 
				?>
				</div>
			<?php endif; ?>

			<?php if( get_field('countries_blocked') ): ?>
				<div class="aspects">
				<h4>Countries Blocked:</h4>
				<?php 
					$blocked = get_field('countries_blocked');
					$count = 0;
					foreach( $blocked as $block ) : 
					
					if($count > 0) {
							echo ', ';
						}
					echo $block; 
					$count++;
					endforeach; 
				?>
				</div>
			<?php endif; ?>
		</div><!-- info-txt -->
	</div><!-- info -->

	<?php if($photos) : ?>
	<div class="section-header">
		<h3 class="title">
			Photos
		</h3><!-- title -->
	</div><!-- section-header -->

	<div class="photo-gallery">
		<?php foreach($photos as $photo) : ?>
		<div class="thumb-photos photos" data-hires="<?php echo $photo['image']['url']; ?>" data-hires-w="<?php echo $photo['image']['width']; ?>" data-hires-h="<?php echo $photo['image']['height']; ?>">
			<img src="<?php echo $photo['image']['sizes']['thumbnail']; ?>"/>
		</div>
		 <?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php if($videos) : ?>
	<div class="section-header">
		<h3 class="title">
			Videos
		</h3><!-- title -->
	</div><!-- section-header -->

	<div class="photo-gallery">
		<?php foreach($videos as $video) : ?>
		<div class="thumb-videos videos" data-vimeo-vidid="<?php echo $video['vimeo_id']; ?>" data-youtube-vidid="<?php echo $video['youtube_id']; ?>">
			<img src="<?php echo $video['thumb']['sizes']['rect']; ?>"/>
			<div class="thumb-title">
				<?php echo $video['video_title']; ?>
			</div>
		</div>
		 <?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php 
		$args = array(
			'category_name'		=>'photos',
			'order'				=> 'ASC',
			'meta_query' => array(
				array(
					'key' => 'selections', // name of custom field
					'value' => '"' . $post->ID . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
					'compare' => 'LIKE'
				)
			)
		);
		$festivalPhotos = new WP_Query( $args );
		if( $festivalPhotos->have_posts() ) :?>
		<div class="section-header">
			<div class="title">
				Festival Photos
			</div><!-- title -->
		</div><!-- section-header -->
			<div class="photos-thumbs">
				<?php
				while ( $festivalPhotos->have_posts() ) : $festivalPhotos->the_post();
					//Post data
					get_template_part( 'thumb-photos' );
					//echo get_the_post_thumbnail(get_the_ID());
				endwhile; ?>
			</div><!-- photo-thumbs --->
	<?php endif; ?>
	<?php 
		$page_placement = 'Official Selection Top Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
</div><!-- selection -->

<div class="page-nav">
	<?php previous_post_link('%link', '<i class="fas fa-caret-square-left"></i>', TRUE); ?>  <?php next_post_link('%link', '<i class="fas fa-caret-square-right"></i>', TRUE); ?> 
</div> 


