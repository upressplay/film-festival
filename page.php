<?php get_header(); ?>

	<?php 
		$page_placement = 'Page Top Banner';
		include( locate_template( 'banner.php', false, false ) ); 
	?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<div class="section-header">
				<h1 class="title">
					<?php the_title(); ?>
				</h1>
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
			<?php 
				$page_placement = 'Page Bottom Banner';
				include( locate_template( 'banner.php', false, false ) ); 
			?>
		<?php endwhile; ?>
	<?php endif; ?>
<?php get_footer(); ?>
