<?php 
	get_header(); 
	$cat = get_the_category($post->ID);
	$catSlug = $cat[0]->slug;
	$catName = $cat[0]->name;
?>

<div class="section-header">
	<div class="title">
		<?php echo $catName; ?>
	</div>
</div>
<div class="thumb-holder">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'post' ); ?>
<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>