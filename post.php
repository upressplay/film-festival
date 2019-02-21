<?php

	$poster = get_field('poster');

?>
<a href="<?php echo get_permalink($post->ID);?>">
	<div class="selection-thumb">
	<?php if ( $poster ) : ?>
		<div class="poster-thumb"> 
			<img src="<?php echo $poster['sizes']['tall']; ?>"/>
		</div><!-- poster-thumb -->
	<?php endif; ?>
		<span class="title"> 
			<?php echo get_the_title($post->ID); ?>
		</span> 
	</div> <!-- selection-thumb -->
</a> 



