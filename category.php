<?php 
	get_header(); 
	$cat = get_the_category($post->ID);
	$catSlug = $cat[0]->slug;
	$catName = $cat[0]->name;
?>

<div class="section-header">
	<h1 class="title">
		<?php echo $catName;?>
	</h1>
</div><!-- section-header -->
<?php 
	$page_placement = 'Official Selection Top Banner';
	include( locate_template( 'banner.php', false, false ) ); 
?>
<div class="thumb-holder">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php if ($catSlug == "official-selection" || $segments[0] == "official-selection") {
		get_template_part( 'thumb-official-selection' );	
	} elseif ($catSlug == "your-hosts") {
		get_template_part( 'thumb-host' );
	} elseif ($catSlug == "schedule") {
		get_template_part( 'post-schedule' );	
	} elseif ($catSlug == "news") {
		get_template_part( 'thumb-news' );
	} elseif ($catSlug == "photos") {
		get_template_part( 'thumb-photos' );
	} elseif ($catSlug == "winners") {
		get_template_part( 'thumb-winners' );
	} else {
		get_template_part( 'thumb' );
	} ?>

<?php endwhile; endif; ?>

</div><!-- thumb-holder -->
<?php 
	$page_placement = 'Official Selection Top Banner';
	include( locate_template( 'banner.php', false, false ) ); 
?>
<?php if (function_exists("pagination")) {
		pagination();
	} 
?>

<?php get_footer(); ?>