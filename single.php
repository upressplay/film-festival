<?php 
	get_header(); 
	$cat = get_the_category($post->ID);
	$catSlug = $cat[0]->slug;
	$catName = $cat[0]->name;
	?>


	<div class="section-header">
		<span class="title">
			<?php if($catSlug == "news") {
				echo $catName;
				
				} else {
					the_title();	
				} ?>
		</span>
	</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if ($catSlug == "official-selection") {
				get_template_part( 'post-official-selection' );	
			} elseif ($catSlug == "photos") {
				get_template_part( 'post-photos' );
			} else {
				get_template_part( 'post-single' );
			} 
		?>
	<?php endwhile; endif; ?>
	<div class="next-prev">
		<?php previous_post_link('%link', 'Previous', TRUE); ?>  <?php next_post_link('%link', 'Next', TRUE); ?> 
	</div> 
<?php get_footer(); ?>
