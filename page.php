<?php
get_header();

$title = get_the_title()
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<div class="site-content">
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>

			<?php edit_post_link(null, null, null, null, 'btn btn-sm btn-light'); ?>

			<?php comments_template(); ?>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>
