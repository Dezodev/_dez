<?php
$blog_name = get_bloginfo('name');
$blog_description = get_bloginfo('description');

$social_links = [
	'facebook' 	=> get_theme_mod('facebook_page_url', false),
	'twitter' 	=> get_theme_mod('twitter_page_url', false),
	'instagram'	=> get_theme_mod('instagram_page_url', false),
	'github' 	=> get_theme_mod('github_page_url', false),
];
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<header id="site-header">
		<nav class="navbar fixed-top navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="<?= home_url(); ?>">
					<?= $blog_name ?>
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<?php dezo_nav('header-menu'); ?>
				</div>

				<div class="col col-sm-auto ml-auto" id="header-right">
					<div class="extra-links">
						<ul class="list-inline">
							<?php if(!empty($social_links['facebook'])): ?>
								<li class="list-inline-item facebook-link">
									<a href="<?php echo $social_links['facebook'] ?>" target="_blank">
										<i class="fab fa-facebook-f"></i>
									</a>
								</li>
							<?php endif; ?>
							<?php if(!empty($social_links['twitter'])): ?>
								<li class="list-inline-item twitter-link">
									<a href="<?php echo $social_links['twitter'] ?>" target="_blank">
										<i class="fab fa-twitter"></i>
									</a>
								</li>
							<?php endif; ?>
							<?php if(!empty($social_links['instagram'])): ?>
								<li class="list-inline-item instagram-link">
									<a href="<?php echo $social_links['instagram'] ?>" target="_blank">
										<i class="fab fa-instagram"></i>
									</a>
								</li>
							<?php endif; ?>
							<?php if(!empty($social_links['github'])): ?>
								<li class="list-inline-item github-link">
									<a href="<?php echo $social_links['github'] ?>" target="_blank">
										<i class="fab fa-github"></i>
									</a>
								</li>
							<?php endif; ?>
							<li class="list-inline-item search-link">
								<i class="fas fa-search"></i>
							</li>
						</ul>
					</div>
					<div class="search-bar">
						<?php get_search_form(); ?>
						<button type="button" class="btn btn-link search-close">
							<i class="fas fa-times"></i>
						</button>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<div id="wrapper-page">
		<div class="container">
