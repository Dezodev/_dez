		</div> <!-- container -->
	</div> <!-- wrapper-page -->

	<footer id="footer">
		<div id="footer-widgets">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('footer-sidebar'); ?>
				</div>
			</div>
		</div>

		<div id="footer-nav">
			<div class="container">
				<?php $GLOBALS['DezoTheme_Main']->dezo_nav("footer-menu"); ?>
			</div>
		</div>

		<div id="footer-sub">
			<div class="container">
				<div class="row">
					<div class="col col-sm-auto">
						<p class="site-copyright mb-0">
							&copy; <?php echo date('Y'); ?>
							<a href="<?php echo bloginfo('url'); ?>">
								<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>
							</a>
						</p>
					</div>
					<div class="col col-sm-auto ml-auto">
						<ul class="list-inline mb-0">
							<li class="list-inline-item">
								<a href="http://dezo.dev/" target="_blank">Développé par DezoDev</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<?php get_template_part( 'templates/starter/component', 'tools' ); ?>

	<?php wp_footer(); ?>
</body>
</html>
