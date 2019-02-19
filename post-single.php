<?php
	
	$header = get_field('header');
	$videos = get_field('videos');
	$photos = get_field('photos');

?>

<div class="selection">
	<?php if ( $header ) : ?>
		<header> 
			<img src="<?php echo $header['sizes']['header']; ?>"/>
		</header> 
		
	<?php endif; ?>

	<div class="banner">
		<a href="https://bang-energy.com" target="_blank">
			<img src="http://new.kapowiff.com/wp-content/uploads/2019/02/bang_720x90.jpg"/>
		</a>
	</div>
	<div class="info">
		<div class="poster-social">
			<div class="poster-thumb" data-hires=""> 
				<?php the_post_thumbnail('thumb-poster'); ?>
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
		<div class="photo-thumb" data-hires="<?php echo $photo['image']['url']; ?>">
			<img src="<?php echo $photo['image']['sizes']['thumb-sq']; ?>"/>
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




