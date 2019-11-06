<?php
get_header();

$title = "Derniers articles"
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<div class="site-content">
		<?php if( have_posts() ) : ?>
			<div class="posts-list">
				<div class="row">
					<?php while( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'postlist-2' ); ?>
					<?php endwhile; ?>
				</div>
				<?php get_template_part( 'component', 'pagination' ); ?>
			</div>
		<?php endif; ?>
	</div>

<?php get_footer(); ?>
