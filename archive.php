<?php get_header(); ?>

<h1>Archive : </h1>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', 'postlist' ); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
