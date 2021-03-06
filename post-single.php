<div class="single">
	<?php if ( has_post_thumbnail() ) : ?>
	<header> 
		<?php the_post_thumbnail('header'); ?>
	</header> 
	<?php endif; ?>

	
	<h1 class="title">
		<?php the_title(); ?>
	</h1>

	<h2 class="date">
		<?php the_date('F j, Y'); ?>
	</h2>

	<div class="content">
		<?php the_content(); ?>
	</div>

</div><!-- single -->

<div class="page-nav">
	<?php previous_post_link('%link', '<i class="fas fa-caret-square-left"></i>', TRUE); ?>  <?php next_post_link('%link', '<i class="fas fa-caret-square-right"></i>', TRUE); ?> 
</div> 




