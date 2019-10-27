<?php
get_header();

$title = __( 'Page not found', 'dezodev' );
?>

	<h1 class="site-heading"><?= $title ?></h1>

	<div class="site-content">
		<p class="lead">
			<a href="<?php echo home_url(); ?>">
				<?php _e( 'Return home?', 'dezodev' ); ?>
			</a>
		</p>
	</div>

<?php get_footer(); ?>
