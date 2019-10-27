<?php
get_header();

$title = get_the_title();
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<div class="site-content post-list">
		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'postlist' ); ?>
		<?php endwhile; endif; ?>
		<?php get_template_part( 'component', 'pagination' ); ?>
	</div>


<?php get_footer(); ?>
