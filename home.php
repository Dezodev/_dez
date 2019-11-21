<?php
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>
				<h2><?php esc_html_e('Latest post', 'dezodev') ?></h2>
				<div class="posts-list">
					<div class="row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							get_template_part( 'templates/starter/content', 'postlist-2' );
						endwhile;
						?>
					</div>
					<?php get_template_part( 'templates/starter/component', 'pagination' ); ?>
				</div>
			<?php
			else :
				get_template_part( 'templates/starter/content', 'none' );
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
