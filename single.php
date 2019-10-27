<?php
get_header();

$title = get_the_title()
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<div class="site-content">
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'post' ); ?>

			<div class="text-right my-3">
				<?php edit_post_link(null, null, null, null, 'btn btn-sm btn-light'); ?>
			</div>

			<?php comments_template(); ?>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>
