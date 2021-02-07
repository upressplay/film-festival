<?php 
	get_header(); 
	$cat = get_the_category($post->ID);
	$catSlug = $cat[0]->slug;
	$catName = $cat[0]->name;
?>

<div class="section-header">
	<h1 class="title">
		<?php echo $catName;?>
	</h1>
</div><!-- section-header -->
<?php 
	$page_placement = 'Official Selection Top Banner';
	include( locate_template( 'banner.php', false, false ) ); 
?>

<?php 

    $meta_query = array('relation' => 'AND');

    if($_GET['award'] && !empty($_GET['award']))
    {
        $awardQuery = $_GET['award'];
        $meta_query[] = array(
            'key'     => 'awards',
            'value'   => $awardQuery,
            'compare' => 'LIKE',
        );

    }

    if($_GET['genre'] && !empty($_GET['genre']))
    {
        $genreQuery = $_GET['genre'];
        $meta_query[] = array(
            'key'     => 'genre',
            'value'   => $genreQuery,
            'compare' => 'LIKE',
        );

    }
    if($_GET['festival'] && !empty($_GET['festival']))
    {
        $festivalQuery = $_GET['festival'];
        $meta_query[] = array(
            'key'     => 'festival-year',
            'value'   => $festivalQuery,
            'compare' => 'LIKE',
        );
    }
    if($_GET['title'] && !empty($_GET['title']))
    {
        $titleQuery = $_GET['title'];
        echo $titleQuery;
        $meta_query[] = array(
            'post_title_like' => $titleQuery
            
        );
    }

    $date_now = date('Y-m-d H:i:s');
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
        'category_name'		=> $catSlug,
        'meta_query'        => $meta_query,
        'paged'				=> $paged,
        'order'				=> 'ASC'
        
    );    
    
    $query = new WP_Query( $args );

    while ( $query->have_posts() ) : $query->the_post(); 

        $genre_field = get_field_object('genre');
        $genres = $genre_field['choices']; 
        $festivalYear = get_field_object('festival-year');
        $festivalYears = $festivalYear['choices']; 
        $awards_field = get_field_object('awards');
        $awards = $awards_field['choices']; 
        
        ?>
        <form id="filter-nav">
            <select name="festival" id="festival">    
                <option value="">Festival</option>  
                <?php foreach( $festivalYears as $festivalYear ): 
                    $festivalSelected = '';
                    if($festivalQuery == $festivalYear) {
                        $festivalSelected = 'selected';
                    }
                    ?>
                
                    <option <?php echo $festivalSelected; ?> value="<?php echo $festivalYear; ?>"><?php echo $festivalYear; ?></option>
                <?php endforeach; ?>
            </select>
            <select name="genre" id="genre">    
                <option value="">Genre</option>  
                <?php foreach( $genres as $key => $genre ): 
                    
                    $genreSelected = '';
                    if($genreQuery == $key) {
                        $genreSelected = 'selected';
                    }?>
                    <option <?php echo $genreSelected; ?> value="<?php echo $key; ?>"><?php echo $genre; ?></option>
                <?php endforeach; ?>
            </select>

            <select name="award" id="award">    
                <option value="">Award</option>  
                <?php foreach( $awards as $key => $award ): 
                    
                    $awardSelected = '';
                    if($awardQuery == $key) {
                        $awardSelected = 'selected';
                    }?>
                    <option <?php echo $awardSelected; ?> value="<?php echo $key; ?>"><?php echo $award; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        <?php 
        break;
        
    endwhile; ?>
    <div class="thumb-holder">
    <?php
    $query = new WP_Query( $args );
    while ( $query->have_posts() ) : $query->the_post(); 
        get_template_part( 'thumb-official-selection' );	
    endwhile; ?>
</div><!-- thumb-holder -->        



<?php 
	$page_placement = 'Official Selection Bottom Banner';
	include( locate_template( 'banner.php', false, false ) ); 
?>
<?php if (function_exists("pagination")) {
		pagination();
	} 
?>

<?php get_footer(); ?>