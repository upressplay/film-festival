<?php 
	$args = array(
	   'category_name' =>'banner'
	);
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php 
			$size = get_field('size',$query->ID);
			$url = get_field('url',$query->ID);
			$placements = get_field('placement',$query->ID);
			$right_placement = false;
			foreach($placements as $placement) {
				if($placement == $page_placement) {
					$right_placement = true;
				}
			}
		?>
		<?php if ( has_post_thumbnail() && $right_placement) : ?>
			
		<a href="<?php echo $url; ?>" target="_blank" class="banner <?php echo $size; ?>">
				<?php the_post_thumbnail(); ?>
		</a>
		<?php endif; ?>
		

<?php endwhile; ?>
<?php wp_reset_postdata(); ?>