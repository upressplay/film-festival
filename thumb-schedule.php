<?php 
	$start_date = get_field('start_date',$post->ID);
	$end_date = get_field('end_date',$post->ID);
	
	$date_now_u = current_time('U');
	$start_date_u = date("U", strtotime($start_date));
	$end_date_u = date("U", strtotime($end_date));

	$weekday = date("D", strtotime($start_date));
	$time = date("g:i a", strtotime($start_date));
	$month = date("M", strtotime($start_date));
	$day = date("j", strtotime($start_date));
	$selections = get_field('selections');
	$feature = get_field('feature');

?>

	<div class="thumb-schedule">
		<?php if($feature) :
		    foreach( $feature as $f ) : ?>
		    	<?php 
		    		$poster = get_field('poster', $f->ID);
		    	?>
		    	<a href="<?php echo get_permalink($f->ID);?>">
					
						<div class="poster-thumb"> 
							<img src="<?php echo $poster['sizes']['tall']; ?>"/>
						</div><!-- poster-thumb -->

				</a>
	    <?php endforeach; ?>
	<?php else: ?>
		<a href="<?php echo get_permalink($post->ID);?>">
		<?php if ( has_post_thumbnail() )  : ?>
			<div class="poster-thumb"> 
				<?php the_post_thumbnail('tall'); ?>
			</div><!-- poster-thumb -->
		<?php endif; ?>
		</a>
	<?php endif; ?>
	

		<div class="info">
			<div class="title"> 
				<?php echo get_the_title($post->ID);?>
			</div> 
			<div class="date-tickets">
			<div class="schedule-date">
				<div class="day-holder">
					<div class="day"><?php echo $weekday; ?></div>
				</div> 
				<div class="time-date">
					<div class="time"><?php echo $time; ?> </div>
					<div class="date"><?php echo $month; ?> <?php echo $day; ?> </div>
				</div><!-- date-time -->
			</div><!-- schedule-date -->
			</div><!-- date-tickets -->
			<div class="selections">
				<?php 
				
				if($selections) :
				    foreach( $selections as $selection ) : ?>

				    	<?php 
				    		$poster = get_field('poster', $selection->ID);
				    	?>
				    	<a href="<?php echo get_permalink($selection->ID);?>">
							<div class="thumb-selection-sm">
							
								<div class="poster-thumb-sm"> 
									<img src="<?php echo $poster['sizes']['tall']; ?>"/>
								</div><!-- poster-thumb-sm -->

							</div> <!-- thumb-selection-sm -->
						</a>
				    <?php endforeach; ?>
				<?php endif; ?>
			</div><!-- selections -->
		</div><!-- info -->
	</div> <!-- thumb-schedule -->


