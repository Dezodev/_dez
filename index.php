<?php
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			if ( have_posts() ) :
				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;
			?>
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
			<?php
			else :
				get_template_part( 'content', 'none' );
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
