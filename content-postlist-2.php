<?php
	$post_title = get_the_title();
?>

<div class="col-12 col-sm-6">
	<div class="one-post row">
		<div class="col-auto">
			<a href="<?php the_permalink(); ?>" class="post__link">
				<img
					src="<?= get_the_post_thumbnail_url(null, "thumbnail") ?>"
					class="post-feature-img"
					alt="<?= $post_title ?>"
				>
			</a>
		</div>
		<div class="col align-self-center">
			<a href="<?php the_permalink(); ?>" class="post__link">
				<h2 class="post-title"><?= $post_title ?></h2>
			</a>

			<!-- <p class="post-excerpt">
				<?php the_excerpt() ?>
			</p> -->

		</div>
		<div class="col-12 mt-3">
			<?php display_post_meta_info(); ?>
		</div>
	</div>
</div>
