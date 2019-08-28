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
				<img src="<?php echo $poster['sizes']['tall']; ?>"/>
				<img src="<?php echo $poster['url']; ?>" style=
				"display: none;"/>
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

				<?php 

				$args = array(
				   'category_name'		=>'schedule',
				    'order'				=> 'ASC',
				    'meta_query' => array(
						array(
							'key' => 'feature', // name of custom field
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
			<div class="synopsis">
				<strong>Runtime:</strong>
				<?php echo get_field('runtime'); ?>
				<?php echo get_field('synopsis'); ?>
			</div>
			
			<?php if( have_rows('cast_crew') ): ?>

				<div class="cast-crew">
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
			<?php if( have_rows('links') ): ?>

				<div class="links">
				<?php while( have_rows('links') ): the_row(); ?>
					<a href="<?php echo get_sub_field('link_url'); ?>" target="_blank">
						<?php echo get_sub_field('text'); ?>
					</a>
				<?php endwhile; ?>
				</div><!-- cast-crew -->
			<?php endif; ?>
		</div><!-- info-txt -->
	</div><!-- info -->

	<?php if($photos) : ?>
	<div class="section-header">
		<div class="title">
			Photos
		</div><!-- title -->
	</div><!-- section-header -->
	<div class="photo-gallery">
		<?php foreach($photos as $photo) : ?>
		<div class="thumb-photos photos" data-hires="<?php echo $photo['image']['url']; ?>" data-hires-w="<?php echo $photo['image']['width']; ?>" data-hires-h="<?php echo $photo['image']['height']; ?>">
			<img src="<?php echo $photo['image']['sizes']['thumbnail']; ?>"/>
			<img src="<?php echo $photo['image']['url']; ?>"style="display:none;"/>
		</div>
		 <?php endforeach; ?>
	</div>
	<?php endif; ?>
	<?php if($videos) : ?>
	<div class="section-header">
		<div class="title">
			Videos
		</div><!-- title -->
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
		$page_placement = 'Official Selection Top Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
</div><!-- selection -->




