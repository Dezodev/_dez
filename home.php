<?php
get_header();

$title = "Derniers articles"
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<div class="site-content">
		<section class="post-list">
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'postlist' ); ?>
			<?php endwhile; endif; ?>
			<?php get_template_part( 'component', 'pagination' ); ?>
		</section>
	</div>

<?php get_footer(); ?>
