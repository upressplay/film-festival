<div class="single">
	<?php 
		$page_placement = 'Photos Top Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
	
	<?php if ( has_post_thumbnail() ) : 
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );	
	?>
	<header class="photo-header"> 
		<a href="<?php echo $img[0]; ?>" target="_blank">
			<?php the_post_thumbnail(); ?>
		</a>
	</header> 
	<?php endif; ?>

	<div class="page-nav">
		<?php previous_post_link('%link', '<i class="fas fa-caret-square-left"></i>', TRUE); ?>  <?php next_post_link('%link', '<i class="fas fa-caret-square-right"></i>', TRUE); ?> 
	</div> 
	
	<div class="title"> 
		<?php echo get_the_title($post->ID);?>
	</div>
	<?php 
		$content = get_the_content($post->ID);
	if ( $content !="" ) : ?>
	<div class="content">
		<?php echo $content; ?>
	</div>
	<?php endif; ?>
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

	<?php 
		$selections = get_field('selections');
		if($selections) : 
			foreach($selections as $selection) : ?>
		<?php

			$poster = get_field('poster', $selection->ID);

			?>
			<a class="horizontal-thumb" href="<?php echo get_permalink($selection->ID);?>">
			<?php if ( $poster ) : ?>
				<div class="poster-thumb"> 
					<img src="<?php echo $poster['sizes']['tall']; ?>"/>
				</div><!-- poster-thumb -->
			<?php endif; ?>
				<div class="info">
					<div class="title"> 
						<?php echo get_the_title($selection->ID); ?>
					</div> 
					<div class="sub"> 
						<?php echo get_field('tagline', $selection->ID); ?>
					</div> 
				</div><!-- info -->
			</a> <!-- photo-selection -->
			<?php endforeach; ?>
		<?php endif; ?>
		
	<?php 
		$page_placement = 'Photos Bottom Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>


</div><!-- single -->




