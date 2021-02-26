<div class="single">

	<?php 
		$page_placement = 'News Top Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
	
	<?php if ( has_post_thumbnail() ) : ?>
	<header> 
		<?php the_post_thumbnail('header'); ?>
	</header> 
	<?php endif; ?>

	<h1 class="title">
		<?php the_title(); ?>
	</h1>

	<h2 class="date">
		<?php the_date('F j, Y'); ?>
	</h2>

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

	<div class="content">
		<?php the_content(); ?>
	</div>

	<?php 
		$nominees = get_field('nominees',$post->ID);
		?>

	
		<?php if($nominees) : ?>
			<div class="nominees">
			<?php foreach( $nominees as $awardCat ) : ?>
			<div class="award-category">
				<div class="kapowee">
					<h2><?php echo $awardCat['award_title'];?></h2>
					<h3><?php echo $awardCat['award_year'];?></h3>
				</div>
					<div class="selections">
					<?php foreach( $awardCat['selections'] as $selection ) : 
		
						$poster = get_field('poster', $selection->ID);
						?>
						<a href="<?php echo get_permalink($selection->ID);?>">
							<div class="thumb-selection">
							
								<div class="poster-thumb"> 
									<img src="<?php echo $poster['sizes']['tall']; ?>"/>
								</div><!-- poster-thumb-sm -->
								<div class="title"> 
									<?php echo get_the_title($selection->ID); ?>
								</div><!-- poster-thumb-sm -->
							</div> <!-- thumb-selection-sm -->
						</a>
					<?php endforeach; ?>
					</div><!-- selections -->
				</div><!-- award-category -->
			<?php endforeach; ?>
			</div><!-- nominees -->
		<?php endif; ?>
	



	<?php 
		$page_placement = 'News Bottom Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
</div><!-- single -->

<div class="page-nav">
	<?php previous_post_link('%link', '<i class="fas fa-caret-square-left"></i>', TRUE); ?>  <?php next_post_link('%link', '<i class="fas fa-caret-square-right"></i>', TRUE); ?> 
</div> 


