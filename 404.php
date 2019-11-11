<?php
get_header();

$title = __( 'Page not found', 'dezodev' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dezodev' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dezodeV' ); ?></p>

					<div class="row">
						<div class="col">
							<h2><?php esc_html_e('Search', 'dezodev') ?></h2>
							<?php get_search_form(); ?>
						</div>
						<div class="col">
							<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
						</div>
						<div class="col">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'dezodev' ); ?></h2>
							<ul>
								<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
								?>
							</ul>
						</div>
					</div>
				</div>
			</section>
		</main>
	</div>

<?php get_footer(); ?>
