<article class="post">
	<div class="post-meta-infos-container">
		<?php display_post_meta_info(); ?>
	</div>

	<?php if ( has_post_thumbnail() ): ?>
		<div class="post__thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php endif; ?>


	<div class="post__content">
		<?php the_content(); ?>
	</div>
</article>
