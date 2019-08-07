<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/js/main.min.js"></script>
		<?php 
			global $segments;
			$segments = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/')); 
		?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	
	<div id="site">
		<?php include 'overlay.php'; ?>
		<div id="site-holder">
			<nav>
				<a href="/">
					<div id="nav-logo">	
						<img src="<?php echo get_template_directory_uri(); ?>/img/site_logo.png" alt="Site Logo"/>
					</div>	
				</a>
				<div id="social-nav">
					<?php
						$btn_class;
						$menu_items = wp_get_nav_menu_items( 'Social Menu' );
						foreach ( (array) $menu_items as $key => $menu_item ) {
						    $title = $menu_item->title;
						    $url = $menu_item->url;
						    $attr_title = $menu_item->attr_title;
						    $icon_class = get_field('icon_class', $menu_item);
						    $btn_class = "social-btn ";

						   	echo '<a href="'.$url.'" target="_blank" >
		                        <div class="'.$btn_class.'">
		                          <span class="'.$icon_class.'" aria-hidden="true" ></span>
		                          <span class="screen-reader-text">'.$title.'</span>
		                        </div>
		                    </a>'; 
						}
					?>
					</div>
					<div id="menu-btn">MENU <i class="far fa-caret-square-down"></i></div>
				<div id="nav-btns">
					<?php
						$menu_items = wp_get_nav_menu_items( 'Main Menu' );
						foreach ( (array) $menu_items as $key => $menu_item ) {
						    $title = $menu_item->title;
						    $url = $menu_item->url;
						    $attr_title = $menu_item->attr_title;
						    $target = $menu_item->target;
						    $btn_class = "nav-btn";
						    //if($attr_title == $segments[0]) $btn_class = "activeBtn";
						    echo '<a href="' . $url . '" target="' . $target . '"><div class="' . $btn_class . '">' . $title . '</div></a>';
						}
					?>
					
				</div>
				<?php 
					$page_placement = 'Nav Top Banner';
					include( locate_template( 'banner.php', false, false ) ); 
				?>
				<div id="schedule-btn">SCHEDULE <i class="far fa-caret-square-down"></i></div>
				<div id="schedule-menu" class="schedule-thumbs menu">
					<?php 
						$today = date('Y-m-d H:i:s');
						$args = array(
						   	'category_name'		=>'schedule',
						    'posts_per_page'	=> 3,
						    'meta_key' 			=> 'start_date',
							'orderby' 			=> 'meta_value',
							'order' 			=> 'ASC',
							'meta_query' 		=> array(
			                    array(
			                        'key' 		=> 'start_date',
			                        'value' 	=> $today,
			                        'compare' 	=> '>'
			                    ),
			                ),  
						);
						$query = new WP_Query( $args );
						while ( $query->have_posts() ) : $query->the_post(); 
						    
						    get_template_part( 'thumb-schedule' );	


					 endwhile; 
					 wp_reset_postdata();?>
					<a href="/schedule">
					 	<div class="blue-btn">
					 		MORE <i class="fas fa-caret-square-right"></i>
					 	</div>
					</a>

				</div>
				<?php 
					$page_placement = 'Nav Bottom Banner';
					include( locate_template( 'banner.php', false, false ) ); 
				?>
				
			</nav>
			<div id="site-content">