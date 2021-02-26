
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.min.css" />

</head>
<body>
<table id="festival-lineup" style="vertical-align:top;">

<?php 
			$today = date('Y-m-d H:i:s');
			$args = array(
				'category_name'		=>'schedule',
			    'order'				=> 'ASC',
				'orderby'			=> 'meta_value',
				'meta_key'			=> 'start_date',
				'meta_type'			=> 'DATETIME',
				'meta_value' 		=> date('Y-m-d h:i'),
      			'meta_compare' 		=> '>',
			);
			$query = new WP_Query( $args );
            while ( $query->have_posts() ) : $query->the_post(); 
                get_template_part( 'post-timeline' );	
            endwhile; ?>

</table>

</body>
</html>
