<?php
// Comment args
$comm_args = [
	'comment_field'		=>
		'<div class="form-group comment-form-comment">'.
		'<label for="comment">' . _x( 'Comment', 'noun' ) . '</label>'.
		'<textarea id="comment" class="form-control" name="comment" rows="5" aria-required="true"></textarea>'.
		'</div>',

	'label_submit'			=> __('Send', 'dezodev'),
	'class_submit'			=> 'submit btn btn-primary',

	'title_reply_before'	=> '<h5 id="reply-title" class="comment-reply-title">',
	'title_reply'			=> __('Add comment', 'dezodev'),
	'title_reply_after'		=> '</h5>',

	'cancel_reply_before'	=> '',
	// 'cancel_reply_link'		=> '<button class="btn btn-sm btn-secondary ml-2">'. __('cancel', 'dezodev') .'</button>',
	'cancel_reply_after'	=> '',

	'fields'				=> [
		'author' =>
			'<div class="form-group row comment-form-author"><div class="col-sm-4"><label for="author">' . __( 'Name' ) .
			( $req ? ' <span class="required">*</span>' : '' ) . '</label></div>' .
			'<div class="col-sm-8"><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'"' . $aria_req . ' /></div></div>',
		'email' =>
			'<div class="form-group row comment-form-email"><div class="col-sm-4"><label for="email">' . __( 'Email' ) .
			( $req ? ' <span class="required">*</span>' : '' ) . '</label></div>' .
			'<div class="col-sm-8"><input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'"' . $aria_req . ' /></div></div>',
		'cookies' => "
			<div class=\"form-group form-check\">
			<input type=\"checkbox\" name=\"wp-comment-cookies-consent\" class=\"form-check-input\" id=\"cookieCmtCheck\">
			<label class=\"form-check-label\" for=\"cookieCmtCheck\" value=\"yes\">".
			__( 'Save my name, email, and website in this browser for the next time I comment.' )
			."	</label>
			</div>"
	]
];
?>


<?php if (post_password_required()) : ?>
	<div class="site-comments protected-comments">
		<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'dezodev' ); ?></p>
	</div>
<?php return; endif; ?>

<div class="comments">

	<?php if (comments_open()) : ?>
		<h2 class="comment-title">
			<?php
			comments_number(
				__('No comment', 'dezodev'),
				__('1 comment', 'dezodev'),
				__('% comments', 'dezodev')
			);
			?>
		</h2>

		<?php if (get_comments_number() <= 0) : ?>
			<p class="zero-comment">
				<?php _e('There are no comments for the moment. Be the first to participate!', 'dezodev') ?>
			</p>

		<?php else: ?>
			<ul id="comment-list" class="list-unstyled">
				<?php wp_list_comments([
					'type' 			=> 'comment',
					'callback'		=> 'dezo_comments',
					'style'			=> 'ul',
					'short_ping'	=> true,
					'avatar_size'	=> 64,
				]); ?>
			</ul><!-- .comment-list -->
		<?php endif; ?>
	<?php endif; ?>

	<?php comment_form($comm_args); ?>

</div>
