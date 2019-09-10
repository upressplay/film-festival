<div class="single">

	<div class="title"> 
		<?php echo get_the_title($post->ID);?>
	</div>
	<?php 
		$content = the_content();
	if ( $content !="" ) : ?>
	<div class="page-content">
		<?php echo $content; ?>
	</div>
	<?php endif; ?>
	<?php if ( has_post_thumbnail() ) : ?>
	<header> 
		<?php the_post_thumbnail('large'); ?>
	</header> 
	<?php endif; ?>

	


</div><!-- single -->




