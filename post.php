<a href="<?php echo get_permalink($post->ID);?>">
	<div class="selection-thumb">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="poster-thumb"> 
			<?php the_post_thumbnail('thumb-poster'); ?>
		</div><!-- poster-thumb -->
	<?php endif; ?>
		<span class="title"> 
			<?php echo get_the_title($post->ID); ?>
		</span> 
	</div> <!-- selection-thumb -->
</a> 



