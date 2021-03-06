<?php
	$post_title = get_the_title();
?>

<div class="col-12 col-sm-6">
	<div class="card one-post one-post-th1">
		<?php if (has_post_thumbnail()): ?>
			<a href="<?php the_permalink(); ?>" class="post__link">
				<img
					src="<?= get_the_post_thumbnail_url(null, "large-169") ?>"
					class="card-img-top post-thumbnails"
					alt="<?= $post_title ?>"
				>
			</a>
		<?php endif; ?>
		<div class="card-body">
			<a href="<?php the_permalink(); ?>" class="post__link">
				<h2 class="card-title post-title"><?= $post_title ?></h2>
			</a>

			<!-- <p class="post-excerpt">
				<?php //the_excerpt() ?>
			</p> -->

			<?php $GLOBALS['DezoTheme_Main']->display_post_meta_info(); ?>
		</div>
	</div>
</div>
