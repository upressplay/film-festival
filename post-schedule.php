<?php 
	$start_date = get_field('start_date',$post->ID);
	$end_date = get_field('end_date',$post->ID);
	
	$end_date_time = date("g:i a", strtotime($end_date));

	$weekday = date("D", strtotime($start_date));
	$time = date("g:i a", strtotime($start_date));
	$month = date("M", strtotime($start_date));
	$day = date("j", strtotime($start_date));

	$tickets_url = get_field('tickets',$post->ID);

?>
<div class="schedule">
	<div class="info-banner">
		<div class="day-holder">
			<div class="day"><?php echo $weekday; ?></div>
		</div> 
		<div class="date-time"><?php echo $month; ?> <?php echo $day; ?>  <?php echo $time; ?> to <?php echo $end_date_time; ?> </div>
		<a href="<?php echo $tickets_url['url']; ?>" target="blank">
			<div class="tickets-btn">
				Tickets
			</div>
		</a>
	</div><!-- info-banner -->
	<div class="block-selections">
		<div class="block-info">
			<?php if ( has_post_thumbnail() )  : ?>
				<div class="poster-thumb"> 
					<?php the_post_thumbnail('tall'); ?>
				</div><!-- poster-thumb -->
			<?php endif; ?>
			<div class="title"> 
				<?php echo get_the_title($post->ID);?>
			</div>
			<div class="hosted-by">
				Hosted By: 
			</div>
			<div class="host-name">
				<?php

					$host = get_field('host');

					if( $host ): 

						// override $post
						$post = $host;
						setup_postdata( $post ); 

						?>
					    <?php the_title(); ?>
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
			</div>
		</div> <!-- block-info -->
		<div class="selections">
			<?php 
			$selections = get_field('selections');
		    foreach( $selections as $selection ) : ?>

		    	<?php 
		    		$poster = get_field('poster', $selection->ID);
		    	?>
		    	<a href="<?php echo get_permalink($selection->ID);?>">
					<div class="thumb-selection">
					
						<div class="poster-thumb"> 
							<img src="<?php echo $poster['sizes']['tall']; ?>"/>
						</div><!-- poster-thumb-sm -->

					</div> <!-- thumb-selection-sm -->
				</a>
		    <?php endforeach; ?>
		</div><!-- selections -->
	</div><!-- block-selections -->
</div> <!-- schedule -->

