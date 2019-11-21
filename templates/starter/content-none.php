
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'dezodev' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) :
			echo '<p>'. esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dezodev' ) .'</p>';

			get_search_form();
		else :
			echo '<p>'. esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'dezodev' ) .'</p>';

			get_search_form();
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
