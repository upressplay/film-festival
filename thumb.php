<div class="thumb">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="thumb-img"> 
			<?php the_post_thumbnail('sq'); ?>
		</div><!-- thumb-img --> 
	<?php endif; ?>
	<div class="info">
		<div class="title"> 
			<?php echo get_the_title($post->ID); ?>
		</div> 
		<?php if ( !empty( get_the_excerpt() ) ) : ?>
		<div class="excerpt"> 
			<?php echo get_the_excerpt($post->ID); ?>
		</div> 
		<?php endif; ?>

		<?php if ( !empty( get_the_content() ) ) : ?>
		<div class="content"> 
			<?php echo get_the_content($post->ID); ?>
		</div> 
		<?php endif; ?>
	</div><!-- info --> 
	
</div> <!-- thumb -->



