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

<h1><?php echo $title; ?></h1>

<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', 'postlist' ); ?>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
