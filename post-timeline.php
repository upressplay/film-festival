<?php 
	$start_date = get_field('start_date',$post->ID);
	$end_date = get_field('end_date',$post->ID);
	
	$end_date_time = date("g:i a", strtotime($end_date));

	$weekday = date("D", strtotime($start_date));
	$time = date("g:i a", strtotime($start_date));
	$month = date("M", strtotime($start_date));
	$day = date("j", strtotime($start_date));

	$tickets_url = get_field('tickets',$post->ID);

	$selections = get_field('selections',$post->ID);
	$feature = get_field('feature',$post->ID);
	$content = "2021 ";
	$duration = "";
    if($selections) :
?>

    <tr>
        <td>
        <h1><?php echo get_the_title( $post->ID ); ?></h1>
        <h2><?php echo $weekday; ?> <?php echo $month; ?> <?php echo $day; ?>  <?php echo $time; ?> PST</h2>

        <?php if($feature) :
            foreach( $feature as $f ) : ?>
                <?php echo '<strong>Duration:</strong> '. get_field('runtime',$f->ID); ?>
            <?php endforeach; ?>
        <?php else: ?>
            <?php 

                
                    $totalSeconds = 0;
                    foreach( $selections as $selection ) :
                        $runtime = get_field('runtime', $selection->ID);
							if($runtime == ''){
								$runtime = 0;
							}
							$duration =  $duration + $runtime;
                        $content = $content . get_the_title($selection->ID) .' - '. $runtime.'<br/>';
                    endforeach; 
                    
                    echo '<p>'.$content.'</p>';
                    if($duration !='') {
                        echo '<strong>Duration: </strong>'.$duration;
                    }           
                
                ?>
        <?php endif; ?>
        </td>
    </tr>
    <?php endif; ?>

