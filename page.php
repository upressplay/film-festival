<?php get_header(); ?>

	<?php if(is_front_page()) : ?>
		
	<?php  else :  ?>
		
	<?php endif; ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<div class="section-header">
				<span class="title">
					<?php the_title(); ?>
				</span>
			</div><!-- section-header -->
			<?php if ( has_post_thumbnail() ) : ?>
				<header> 
					<?php the_post_thumbnail('header'); ?>
				</header><!-- header --> 
			<?php endif; ?>
			<?php if ( !empty( get_the_content() ) ) : ?>
			<div class="page-content">
				<?php the_content(); ?>
			</div>
			<?php endif; ?>
			
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
