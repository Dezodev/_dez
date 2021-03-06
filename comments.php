<?php
// Comment args
$start_form_row = '<div class="row">';
$end_form_row = '</div>';

$comm_args = [
	'comment_field'		=>
		'<div class="form-group comment-form-comment">'.
		'<textarea id="comment" class="form-control" name="comment" placeholder="' . __( 'Comment', 'dezodev' ) . '" rows="5" aria-required="true"></textarea>'.
		'</div>',

	'label_submit'			=> __('Send', 'dezodev'),
	'class_submit'			=> 'submit btn btn-primary',

	'title_reply_before'	=> '<h5 id="reply-title" class="comment-reply-title">',
	'title_reply'			=> __('Add comment', 'dezodev'),
	'title_reply_after'		=> '</h5>',

	'cancel_reply_before'	=> '',
	'cancel_reply_link'		=> '<button class="btn btn-sm btn-dark ml-2">'. __('Cancel', 'dezodev') .'</button>',
	'cancel_reply_after'	=> '',

	'fields'				=> [
		'author' =>
			$start_form_row .'<div class="form-group comment-form-author col-6">' .
			'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" placeholder="' . __( 'Name', 'dezodev' ) . ( $req ? ' *' : '' ) . '" ' . $aria_req . ' /></div>',
		'email' =>
			'<div class="form-group comment-form-email col-6">' .
			'<input id="email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" placeholder="' . __( 'Email', 'dezodev' ) . ( $req ? ' *' : '' ) . '" ' . $aria_req . ' /></div>'. $end_form_row,
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
	<div class="entry-comments protected-comments">
		<p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'dezodev' ); ?></p>
	</div>
<?php return; endif; ?>

<?php if (comments_open()) : ?>
	<div class="entry-comments">
		<div class="comments-block">
			<p>
				<i class="far fa-comment-alt mr-1"></i>
				<?php
					comments_number(
						__('No comment', 'dezodev'),
						__('Show the comment', 'dezodev'),
						__('Show the % comments', 'dezodev')
					);
				?>
			</p>
		</div>
	</div>

	<div id="comments-drawer">
		<div class="comments-header row mb-4">
			<div class="col-auto">
				<h2 class="comment-title m-0">
					<?php
						comments_number(
							__('No comment', 'dezodev'),
							__('1 comment', 'dezodev'),
							__('% comments', 'dezodev')
						);
					?>
				</h2>
			</div>
			<div class="col-auto ml-auto">
				<button class="btn btn-sm btn-link close-btn"><i class="fas fa-times"></i></button>
			</div>
		</div>

		<div class="comments-body">
			<?php if (get_comments_number() <= 0) : ?>
				<p class="zero-comment">
					<?php _e('There are no comments for the moment. Be the first to participate!', 'dezodev') ?>
				</p>

			<?php else: ?>
				<ul id="comment-list" class="list-unstyled">
					<?php wp_list_comments([
						'type' 			=> 'comment',
						'callback'		=> [&$GLOBALS['DezoTheme_Main'], 'dezo_comments'],
						'style'			=> 'ul',
						'short_ping'	=> true,
						'avatar_size'	=> 42,
					]); ?>
				</ul><!-- .comment-list -->
			<?php endif; ?>

			<?php comment_form($comm_args); ?>
					</div>
		</div>
	</div>
	<div id="comments-overlay"></div>
<?php endif; ?>
