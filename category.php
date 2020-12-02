<?php 
	get_header(); 
	$cat = get_the_category($post->ID);
	$catSlug = $cat[0]->slug;
	$catName = $cat[0]->name;

	$page_placement_top = 'Category Top Banner';
	$page_placement_bottom = 'Category Top Banner';
	$template_part = 'thumb';

	if ($catSlug == "official-selection" || $segments[0] == "official-selection") {
		$page_placement_top = 'Official Selection Top Banner';
		$page_placement_bottom = 'Official Selection Bottom Banner';
		$template_part = 'thumb-official-selection';
	} elseif ($catSlug == "your-hosts") {
		$page_placement_top = 'Your Host Top Banner';
		$page_placement_bottom = 'Your Host Bottom Banner';
		$template_part = 'thumb-host';
	} elseif ($catSlug == "schedule") {
		$page_placement_top = 'Schedule Top Banner';
		$page_placement_bottom = 'Schedule Bottom Banner';
		$template_part = 'post-schedule';
	} elseif ($catSlug == "news") {
		$page_placement_top = 'News Top Banner';
		$page_placement_bottom = 'News Bottom Banner';
		$template_part = 'thumb-news';
	} elseif ($catSlug == "photos") {
		$page_placement_top = 'Photos Top Banner';
		$page_placement_bottom = 'Photos Bottom Banner';
		$template_part = 'thumb-photos';
	} elseif ($catSlug == "winners") {
		$page_placement_top = 'Winners Top Banner';
		$page_placement_bottom = 'Winners Bottom Banner';
		$template_part = 'thumb-winners';
	} else {
	} 
?>

<div class="section-header">
	<h1 class="title">
		<?php echo $catName;?>
	</h1>
</div><!-- section-header -->
<?php 
	$page_placement = $page_placement_top;
	include( locate_template( 'banner.php', false, false ) ); 
?>
<?php if ($catSlug == "official-selection" || $segments[0] == "official-selection") :?>

<form id="filter-nav">
<?php 
	$tags = get_tags();
	$years = array();
	$genres = array();
	foreach ( $tags as $tag ) {
		$tag_link = get_tag_link( $tag->term_id );
		if(is_numeric($tag->slug)) {
			array_push($years, $tag);
		} else {
			array_push($genres, $tag);
		}
	} ?>
	<select name="years" id="years">
		<option value="">Year</option>
		<?php foreach ( $years as $year ) : ?>
			<option value="<?php echo $year->slug; ?>"><?php echo $year->name; ?></option>
		<?php endforeach; ?>
	</select>

	<select name="genres" id="genres">
		<option value="">Genre</option>
		<?php foreach ( $genres as $genre ) : ?>
			<option value="<?php echo $genre->slug; ?>"><?php echo $genre->name; ?></option>
		<?php endforeach; ?>
	</select>
	<button type="submit">Submit</button>
</form><!-- filter-nav -->
<?php endif; ?>
<div class="thumb-holder">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( $template_part ); ?>

<?php endwhile; endif; ?>

</div><!-- thumb-holder -->
<?php 
	$page_placement = $page_placement_bottom;
	include( locate_template( 'banner.php', false, false ) ); 
?>
<?php if (function_exists("pagination")) {
		pagination();
	} 
?>

<?php get_footer(); ?>