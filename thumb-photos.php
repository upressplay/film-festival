<?php 
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
?>

<a href="<?php echo get_permalink($post->ID);?>" class="thumb-photos" id="<?php echo $post->ID; ?>" data-hires="<?php echo $img[0]; ?>" data-hires-w="<?php echo $img[1]; ?>" data-hires-h="<?php echo $img[2]; ?>"  >
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="thumb-img"> 
			<?php the_post_thumbnail('thumbnail'); ?>
		</div><!-- thumb-img --> 
	<?php endif; ?>
</a> <!-- thumb -->



