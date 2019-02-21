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

	<div class="banner">
		<a href="https://bang-energy.com" target="_blank">
			<img src="http://new.kapowiff.com/wp-content/uploads/2019/02/bang_720x90.jpg"/>
		</a>
	</div>
	<div class="info">
		<div class="poster-social">
			<div class="poster-thumb" data-hires="<?php echo $poster['url']; ?>"> 
				<img src="<?php echo $poster['sizes']['tall']; ?>"/>
			</div>
			<div class="social"> 
				
			</div>
		</div>
		<div class="info-txt">
			<div class="title">
				<?php echo get_the_title($post->ID); ?>
			</div><!-- title -->
			<?php if(get_field('tagline') != "") : ?>
			<div class="tagline">
				<?php echo get_field('tagline'); ?>
			</div><!-- tagline -->
			<?php endif; ?>
			<div class="schedule-date">
				<div class="day-holder">
					<div class="day">TH</div>
				</div> 
				<div class="time-date">
					<div class="time">9:00pm </div>
					<div class="date">Sept 13 </div>
				</div><!-- date-time -->
				<a href="https://www.laemmle.com/films/44626" target="_blank">
					<div class="tickets-btn">
						Buy Ticketes
					</div><!-- buy-tickets-btn -->
				</a>
			</div><!-- schedule-date -->
			<div class="synopsis">
				<?php echo get_field('synopsis'); ?>
			</div>
			
			<?php if( have_rows('cast_crew') ): ?>

				<div class="cast-crew">
				<?php while( have_rows('cast_crew') ): the_row(); ?>
					<div class="member">
						<span class="title">
							<?php echo get_sub_field('cast_crew_title'); ?>
						</span>: 
						<span class="name">
							<?php echo get_sub_field('cast_crew_name'); ?>
						</span>
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
		<div class="photo-thumb" data-hires="<?php echo $poster['image']['url']; ?>">
			<img src="<?php echo $poster['image']['sizes']['sq']; ?>"/>
		</div>
		 <?php endforeach; ?>
	}
</div>
	<?php endif; ?>
	<?php if($videos) : ?>
	<div class="section-header">
		<div class="title">
			Videos
		</div><!-- title -->
	</div><!-- section-header -->
	<?php endif; ?>
</div><!-- selection -->




