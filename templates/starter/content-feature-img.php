<?php
	$show_meta_info = false;
	$page_type = dezo_get_page_type();
?>

<header class="entry-header post-feature-img">
	<?php if (has_post_thumbnail()): ?>
		<?php the_post_thumbnail('cover'); ?>
	<?php elseif (has_header_image()): ?>
		<img src="<?php echo header_image() ?>" alt="<?php the_title() ?>">
	<?php endif; ?>

	<div class="feature-img-overlay">
		<div class="overlay-content">
			<h1 class="entry-title"><?php the_title() ?></h1>

			<?php if (in_array($page_type, ['single'])) : ?>
				<div class="post-meta-infos-container">
					<?php display_post_meta_info(); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</header>
