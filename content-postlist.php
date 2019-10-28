<article class="post">
	<h2>
		<a href="<?php the_permalink(); ?>" class="post__link">
			<?php the_title(); ?>
		</a>
	</h2>
	<div class="post-meta-infos-container">
		<?php display_post_meta_info(); ?>
	</div>

	<a href="<?php the_permalink(); ?>" class="post__image-link">
		<?php the_post_thumbnail(); ?>
	</a>


	<?php the_excerpt(); ?>

	<p>
		<a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a>
	</p>
</article>
