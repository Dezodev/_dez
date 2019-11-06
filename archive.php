<?php
get_header();

$title = get_the_archive_title();
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<?php if( have_posts() ) : ?>
		<div class="posts-list">
			<div class="row">
				<?php while( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'postlist-1' ); ?>
				<?php endwhile; ?>
			</div>
			<?php get_template_part( 'component', 'pagination' ); ?>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>
