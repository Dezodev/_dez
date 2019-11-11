<?php
get_header();

$title = sprintf( esc_html__( 'Search Results for: %s', '_s' ), '<span>' . get_search_query() . '</span>' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			if ( have_posts() ) :
			?>
				<header class="page-header">
					<h1 class="page-title"><?php echo $title ?></h1>
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
			<?php
			else :
				get_template_part( 'content', 'none' );
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
