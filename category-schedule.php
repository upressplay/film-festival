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
<?php 
	$page_placement = 'Official Selection Top Banner';
	include( locate_template( 'banner.php', false, false ) ); 
?>
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
			while ( $query->have_posts() ) : $query->the_post(); 
			    
			    get_template_part( 'post-schedule' );	


		 endwhile; ?>

</div><!-- thumb-holder -->
<?php 
	$page_placement = 'Official Selection Top Banner';
	include( locate_template( 'banner.php', false, false ) ); 
?>
<?php if (function_exists("pagination")) {
		pagination($query->max_num_pages);
	} 
?>

<?php get_footer(); ?>