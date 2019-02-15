<?php get_header(); ?>
		<section id="content" role="main">yo
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php endwhile; endif; ?>
		<?php get_template_part( 'nav', 'below' ); ?>
		</section>
<?php get_footer(); ?>