<?php 
	get_header(); 
	$cat = get_the_category($post->ID);
	$catSlug = $cat[0]->slug;
	$catName = $cat[0]->name;
?>

<div class="section-header">
	<h1 class="title">
		<?php echo $catName; ?>
	</h1>
</div><!-- section-header -->
<div class="thumb-holder">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php if ($catSlug == "official-selection") {
		get_template_part( 'thumb-official-selection' );	
	} elseif ($catSlug == "hosts") {
		get_template_part( 'thumb-host' );
	} elseif ($catSlug == "news") {
		get_template_part( 'thumb-news' );
	} elseif ($catSlug == "photos") {
		get_template_part( 'thumb-photos' );
	} else {
		get_template_part( 'thumb' );
	} ?>

<?php endwhile; endif; ?>


</div><!-- thumb-holder -->
<div class="navigation"><p><?php posts_nav_link(); ?></p></div>

<?php get_footer(); ?>