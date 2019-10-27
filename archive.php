<?php
get_header();

if ( is_category() ) {
	$title = "Catégorie : " . single_tag_title( '', false );
} elseif ( is_tag() ) {
	$title = "Étiquette : " . single_tag_title( '', false );
} elseif ( is_search() ) {
	$title = "Vous avez recherché : " . get_search_query();
} else {
	$title = 'Le Blog';
}
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<div class="site-content blog-list">
		<main>
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'postlist' ); ?>
			<?php endwhile; endif; ?>
			<?php get_template_part( 'component', 'pagination' ); ?>
		</main>
	</div>

<?php get_footer(); ?>
