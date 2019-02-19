<?php
	$link = get_permalink($post->ID);
	$title = get_the_title($post->ID);	
	$date = get_the_date('M d, Y', $post->ID);	
	$body = get_the_content($post->ID);
	$summary = get_the_excerpt($post->ID);	
	$cat = get_the_category($post->ID);
	$cat = $cat[0]->slug;

	$vidid = get_field('youtube_vidid');
	$playlist = get_field('youtube_playlist');

	$thumb = get_the_post_thumbnail_url( $post->ID, $thumb_size );
	//$img = get_the_post_thumbnail_url( $post->ID );
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large" );

	echo $cat;
?>

<?php if ( is_single() ) : ?>

	entry
<? else: ?>
	not single entry
<?php endif; ?>
post