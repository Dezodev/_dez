<?php
get_header();

$title = get_the_title()
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<div class="site-content">
		<main>
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'post' ); ?>

				<?php comments_template(); ?>
			<?php endwhile; endif; ?>
		</main>
	</div>

<?php get_footer(); ?>
