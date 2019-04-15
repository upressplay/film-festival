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

	<div class="banner">
		<a href="https://bang-energy.com" target="_blank">
			<img src="http://new.kapowiff.com/wp-content/uploads/2019/02/bang_720x90.jpg"/>
		</a>
	</div>


</div><!-- single -->




