<?php

	$poster = get_field('poster');
    $thumb = get_the_post_thumbnail_url(get_the_ID(),'rect'); 
?>
<a href="<?php echo get_permalink($post->ID);?>">
	<div class="thumb-featurette">
	<?php if ( $thumb ) : ?>
			<img src="<?php echo $thumb; ?>"/>
	<?php endif; ?>
	<h3><?php echo get_the_title($post->ID); ?></h3> 
	</div> <!-- thumb-selection -->
</a> 



