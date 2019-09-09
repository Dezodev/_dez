<?php get_header(); ?>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="post__thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<h1><?php the_title(); ?></h1>

	<?php the_content(); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
