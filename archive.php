<?php
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="posts-list">
					<div class="row">
						<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								get_template_part( 'content', 'postlist-2' );
							endwhile;
						?>
					</div>

					<?php get_template_part( 'component', 'pagination' ); ?>
				</div>
			<?php else: ?>
				<?php get_template_part( 'component', 'none' ); ?>
			<?php endif; ?>
		</main>
	</div>

<?php get_footer(); ?>
