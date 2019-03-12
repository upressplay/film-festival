<?php 
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
	$vidid = get_field('youtube_vidid');
	$playlist = get_field('youtube_playlist');
	$cat = '';
	$categories = get_the_category($post->ID);
	$cat_count = count($categories);

	foreach( $categories as $c ) {
		$cat = $cat . $c->slug;
		$cat_count = $cat_count - 1;
		if($cat_count != 0) $cat = $cat . ' ';
	}
?>

<div class="thumb-photos" id="<?php echo $post->ID; ?>" data-postid="<?php echo $post->ID; ?>"data-hires="<?php echo $img[0]; ?>" data-hires-w="<?php echo $img[1]; ?>" data-hires-h="<?php echo $img[2]; ?>" data-vidid="<?php echo $vidid; ?>" data-playlist="<?php echo $playlist; ?>" data-cat="<?php echo $cat; ?>"  >
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="thumb-img"> 
			<?php the_post_thumbnail('thumbnail'); ?>
		</div><!-- thumb-img --> 
	<?php endif; ?>
</div> <!-- thumb -->



