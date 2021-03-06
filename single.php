<?php 
	get_header(); 
	$cat = get_the_category($post->ID);
	$catSlug = $cat[0]->slug;
	$catName = $cat[0]->name;
	?>


	<div class="section-header">
		<span class="title">
			<?php echo $catName;?>
		</span>
	</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if ($catSlug == "official-selection") {
				get_template_part( 'post-official-selection' );	
			} elseif ($catSlug == "featurettes") {
				get_template_part( 'post-featurettes' );
			} elseif ($catSlug == "photos") {
				get_template_part( 'post-photos' );
			} elseif ($catSlug == "schedule") {
				get_template_part( 'post-schedule' );
			} elseif ($catSlug == "news") {
				get_template_part( 'post-news' );
			} else {
				get_template_part( 'post-single' );
			} 
		?>
	<?php endwhile; endif; ?>
	
<?php get_footer(); ?>
