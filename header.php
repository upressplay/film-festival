<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/main.min.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.1/TweenMax.min.js"></script>

		<script src="<?php echo get_template_directory_uri(); ?>/build/js/main.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	
	<div id="site">
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
					<div class="menu-btn">MENU <i class="far fa-caret-square-down"></i></div>
				<div id="nav-btns">
					<?php
						$menu_items = wp_get_nav_menu_items( 'Main Menu' );
						foreach ( (array) $menu_items as $key => $menu_item ) {
						    $title = $menu_item->title;
						    $url = $menu_item->url;
						    $attr_title = $menu_item->attr_title;
						    $btn_class = "nav-btn";
						    //if($attr_title == $segments[0]) $btn_class = "activeBtn";
						    echo '<a href="' . $url . '"><div class="' . $btn_class . '">' . $title . '</div></a>';
						}
					?>
					
				</div>
				<div class="schedule-btn">SCHEDULE <i class="far fa-caret-square-down"></i></div>
				
				
				
			</nav>
			<div id="site-content">