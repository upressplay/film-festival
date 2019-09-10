<?php 
	get_header(); 
	$cat = get_the_category($post->ID);
	$catSlug = $cat[0]->slug;
	$catName = $cat[0]->name;
	$banners = array();
?>

<div class="section-header">
	<h1 class="title">
		<?php echo $catName; ?>
	</h1>
</div><!-- section-header -->
<?php 
	$page_placement = 'Schedule Top Banner';
	$args = array(
	   'category_name' =>'banner'
	);
	$query = new WP_Query( $args );
	while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php 
			$size = get_field('size',$query->ID);
			$url = get_field('url',$query->ID);
			$placements = get_field('placement',$query->ID);
			$img = get_the_post_thumbnail_url($query->ID); 			
			foreach($placements as $placement) {
				if($placement == $page_placement) {
					$banners[] = array(
						'size' => $size,
						'url' => $url,
						'placements' => $placements,
						'img' => $img
					);
				}
			}
		?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>

<div class="thumb-holder">
<?php 
			$date_now = date('Y-m-d H:i:s');
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			$args = array(
			   'category_name'		=>'schedule',
			    'order'				=> 'ASC',
				'orderby'			=> 'meta_value',
				'meta_key'			=> 'start_date',
				'meta_type'			=> 'DATETIME',
				'paged'				=> $paged
			);
			$query = new WP_Query( $args );
			$count = 0;
			$banner_count = 0;
			while ( $query->have_posts() ) : $query->the_post(); 
			    if($count%2 == 0) {
			    	echo '<a href="'.$banners[$banner_count]["url"].'" target="_blank" class="banner '.$banners[$banner_count]["size"].'">
								<img src="'.$banners[$banner_count]["img"].'"/>
						</a>';
			    	$banner_count++;
			    	if($banner_count >= count($banners)) {
			    		$banner_count = 0;
			    	}
			    }
			    get_template_part( 'post-schedule' );	

			    $count++;
		 endwhile; ?>

</div><!-- thumb-holder -->
<?php 
	$page_placement = 'Schedule Bottom Banner';
	include( locate_template( 'banner.php', false, false ) ); 
?>
<?php if (function_exists("pagination")) {
		pagination($query->max_num_pages);
	} 
?>

<?php get_footer(); ?>