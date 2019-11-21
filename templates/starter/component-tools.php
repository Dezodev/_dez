
<div id="dezo-site-tools">
	<div class="tools-item" id="page-up-tool">
		<i class="fas fa-angle-double-up" title="<?php esc_html_e('Back to top') ?>"></i>
	</div>
	<div class="tools-item" id="share-icons">
		<ul class="list-inline">
			<li class="list-inline-item"><?php esc_html_e('Share:') ?></li>
			<li class="list-inline-item share-icon share-icon-fb">
				<i class="fab fa-facebook"></i>
			</li>
			<li class="list-inline-item share-icon share-icon-tw">
				<i class="fab fa-twitter"></i>
			</li>
			<li class="list-inline-item share-icon share-icon-wh">
				<i class="fab fa-whatsapp"></i>
			</li>
			<li class="list-inline-item share-icon share-icon-ld">
				<i class="fab fa-linkedin-in"></i>
			</li>
		</ul>
	</div>
	<?php if (comments_open() && is_singular()) : ?>
		<div class="tools-item" id="comments-tool">
			<i class="far fa-comment-alt mr-1"></i>
			<?php
				comments_number(
					__('No comment', 'dezodev'),
					__('1 comment', 'dezodev'),
					__('% comments', 'dezodev')
				);
			?>
		</div>
	<?php endif; ?>
	<div class="tools-item" id="reduce-tools">
		<i class="fas fa-angle-double-left" title="<?php esc_html_e('Reduce tools') ?>"></i>
	</div>
</div>
