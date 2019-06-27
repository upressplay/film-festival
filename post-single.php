<div class="single">
	<?php if ( has_post_thumbnail() ) : ?>
	<header> 
		<?php the_post_thumbnail('header'); ?>
	</header> 
	<?php endif; ?>

	<?php 
		$page_placement = 'News Top Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
	
	<h1 class="title">
		<?php the_title(); ?>
	</h1>

	<h2 class="date">
		<?php the_date('F j, Y'); ?>
	</h2>

	<div class="content">
		<?php the_content(); ?>
	</div>

	<?php 
		$page_placement = 'News Bottom Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>
</div><!-- single -->




