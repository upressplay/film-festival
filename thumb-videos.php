<?php 
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
?>

<a href="<?php echo get_permalink($post->ID);?>" class="thumb-photos photos" id="<?php echo $post->ID; ?>" data-youtubeId="<?php echo $img[0]; ?>" data-vimeoId="<?php echo $img[1]; ?>"  >
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="thumb-img"> 
			<?php the_post_thumbnail('thumbnail'); ?>
		</div><!-- thumb-img --> 
	<?php endif; ?>
</a> <!-- thumb -->



