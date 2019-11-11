<?php
	$post_title = get_the_title();
?>

<div class="col-12 col-sm-6">
	<div class="one-post one-post-th2 row">
		<?php if (has_post_thumbnail()): ?>
			<div class="col-auto">
				<a href="<?php the_permalink(); ?>" class="post-link">
					<img
						src="<?= get_the_post_thumbnail_url(null, "thumbnail") ?>"
						class="post-thumbnails"
						alt="<?= $post_title ?>"
					>
				</a>
			</div>
		<?php endif; ?>
		<div class="col align-self-center">
			<a href="<?php the_permalink(); ?>" class="post-link">
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
