<a href="<?php echo get_permalink($post->ID);?>">
	<div class="thumb-news">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="thumb-img"> 
				<?php the_post_thumbnail('rect'); ?>
			</div><!-- thumb-img --> 
		<?php endif; ?>
		<div class="info">
			<div class="title"> 
				<?php echo get_the_title($post->ID); ?>
			</div> 

			<div class="date">
				<?php the_date('F j, Y'); ?>
			</div>

			<?php if ( !empty( get_the_excerpt() ) ) : ?>
			<div class="excerpt"> 
				<?php echo get_the_excerpt($post->ID); ?>
			</div> 
			<?php endif; ?>
		</div><!-- info --> 
		
	</div> <!-- thumb -->
</a> 



