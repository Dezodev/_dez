<article class="post">

	<?php if ( has_post_thumbnail() ): ?>
		<div class="post__thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>

	<h1><?php the_title(); ?></h1>

	<div class="post__meta">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
		<p>
			Publié le <?php the_date(); ?>
			par <?php the_author(); ?>
			Dans la catégorie <?php the_category(); ?>
			Avec les étiquettes <?php the_tags(); ?>
		</p>
	</div>

	<div class="post__content">
		<?php the_content(); ?>
	</div>
</article>
