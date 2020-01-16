<?php
/**
 * Template part for displaying previous and next post link
 */

$previous_post = get_previous_post();
$next_post = get_next_post();
?>

<div id="dezo-post-navigation">
	<div class="row">
		<?php if (!empty($previous_post)): ?>
			<div class="col-12 col-sm-6 previous-col">
				<a href="<?php echo get_permalink($previous_post) ?>" class="post-navigation-link">
					<p class="link-label">
						<i class="fas fa-arrow-left mr-1"></i>
						<?php _e('Previous post'); ?>
					</p>
					<p class="link-title">
						<?php echo get_the_title($previous_post) ?>
					</p>
				</a>
			</div>
		<?php endif; ?>
		<?php if (!empty($next_post)): ?>
			<div class="col-12 col-sm-6 next-col">
				<a href="<?php echo get_permalink($next_post) ?>" class="post-navigation-link">
					<p class="link-label">
						<?php _e('Next post'); ?>
						<i class="fas fa-arrow-right ml-1"></i>
					</p>
					<p class="link-title">
						<?php echo get_the_title($next_post) ?>
					</p>
				</a>
			</div>
		<?php endif; ?>
	</div>
</div>
