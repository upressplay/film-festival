
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.min.css" />

</head>
<body>
<table id="festival-lineup" style="vertical-align:top;">

<tr>
	<td>
	Film Name
	</td>
	<td>
	director
	</td>
	<td>
	producers
	</td>
	<td>
	writers
	</td>
	<td>
	cast
	</td>
	<td>
	release year
	</td>
	<td>
	Synopsis
	</td>
	<td>
	Short Synopsis
	</td>
	<td>
		Duration (minutes)
	</td>
	<td>
		Genres
	</td>
	<td>
	Country of Origin
	</td>
	<td>
	Original Language
	</td>
	<td>
	Countries Allowed
	</td>
	<td>
	Countries Blocked	
	</td>

																		
</tr>
<?php 
			$today = date('Y-m-d H:i:s');
			$args = array(
				'category_name'		=> array('official-selection','features'),
				'order' 			=> 'ASC',
				'posts_per_page'	=> 800,
			);
			$query = new WP_Query( $args );
			while ( $query->have_posts() ) : $query->the_post(); 
				$isMovie = true;
				$genres = get_field('genre');
				$genreString = '';
				$count = 0;
				foreach( $genres as $genre ) : 
					if($count > 0) {
						$genreString = $genreString . ', ';
					}
					$count = 1;
					$genreString = $genreString  . $genre['label'];
					if($genre['label'] == 'VR' || $genre['label'] == 'Podcasts') {
						$isMovie = false;
					}
				endforeach; 
					
				if( (get_field('festival-year') == '2021') && $isMovie ): ?>

				
				
				<tr>
					<td><?php echo get_the_title($post->ID); ?></td>
					
					<?php 
						$directors = '';
						$dCount = 0;
						$producers = '';
						$pCount = 0;
						$writers = '';
						$wCount = 0;
						if( have_rows('cast_crew') ): ?>

						<?php while( have_rows('cast_crew') ): the_row(); 
							$cctitle = get_sub_field('cast_crew_title');
							$ccname = get_sub_field('cast_crew_name');
							
							if(strpos($cctitle, 'Director') !== false){
								if($dCount > 0 ) $directors .= ', ';
								$directors .= $ccname;
								$dCount++;
							}
							if(strpos($cctitle, 'Producer') !== false){
								if($pCount > 0 ) $producers .= ', ';
								$producers .= $ccname;
								$pCount++;
							}
							if(strpos($cctitle, 'Writer') !== false){
								if($wCount > 0 ) $writers .= ', ';
								$writers .= $ccname;
								$wCount++;
							}
						endwhile; ?>
					<?php endif; ?>
					<td>
						<?php echo $directors; ?>
					</td>
					
					<td>
						<?php echo $producers; ?>
					</td>
					<td>
						<?php echo $writers; ?>
					</td>
					<?php 
						$cast = '';
						$count = 0;
						if( have_rows('cast') ): ?>

						<?php while( have_rows('cast') ): the_row(); 
							$cctitle = get_sub_field('cast_crew_title');
							$ccname = get_sub_field('cast_crew_name');
							if($count > 0 ) $cast .= ', ';
							$cast .= $ccname;
							$count++;
						endwhile; ?>
						
					<?php endif; ?>
					<td><?php echo $cast; ?></td>
					<td><?php echo get_field('festival-year'); ?></td>
					
					
					<td><?php echo the_field('synopsis'); ?></td>
					
					<td><?php echo get_field('tagline'); ?></td>
					<td><?php echo the_field('runtime'); ?></td>
					<td>
					<?php 
						echo $genreString;
					?>
					</td>
					<td>
						<?php echo get_field('country_of_origin'); ?>
					</td>
					<td>
						<?php echo get_field('original_language'); ?>
					</td>
					<td>
					<?php if( get_field('countries_allowed') ): ?>
						<?php 
							$allowed = get_field('countries_allowed');
							$count = 0;
							foreach( $allowed as $all ) : 
							
							if($count > 0) {
									echo ', ';
								}
							echo $all; 
							$count++;
							endforeach; 
						?>
					<?php endif; ?>
					</td>
					<td>
					<?php if( get_field('countries_blocked') ): ?>
						<?php 
							$blocked = get_field('countries_blocked');
							$count = 0;
							foreach( $blocked as $block ) : 
							
							if($count > 0) {
									echo ', ';
								}
							echo $block; 
							$count++;
							endforeach; 
						?>
					<?php endif; ?>
					</td>
				</tr>	
			<?php endif; ?>
			
				

			<? endwhile; ?>

</table>

</body>
</html>
