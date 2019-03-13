<div class="selections">
	<?php 
	$selections = get_field('selection');
	if($selections) :
	    foreach( $selections as $selection ) : ?>

	    	<?php 
	    		$poster = get_field('poster', $selection->ID);
	    	?>
	    	<a href="<?php echo get_permalink($selection->ID);?>">
				<div class="thumb-selection">
					<div class="winner">
						<div class="title">WINNER</div>
						<div class="desc"><?php echo get_the_title($post->ID); ?></div>
					</div>
					<div class="poster-thumb"> 
						<img src="<?php echo $poster['sizes']['tall']; ?>"/>
					</div><!-- poster-thumb-sm -->
					<span class="title"> 
						<?php echo get_the_title($selection->ID); ?>
					</span> 
					

				</div> <!-- thumb-selection-sm -->
			</a>
	    <?php endforeach; ?>
	<?php endif; ?>
</div><!-- selections -->


