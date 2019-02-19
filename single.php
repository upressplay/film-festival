<?php get_header(); ?>
	<div class="section-header">
	<span class="title">
		<?php the_title(); ?>
	</span>
</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'post-single' ); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
