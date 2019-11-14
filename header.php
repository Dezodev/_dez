<?php
$blog_name = get_bloginfo('name');
$blog_description = get_bloginfo('description');
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

				<div class="col col-sm-auto ml-auto search-form">
					<?php get_search_form(); ?>
				</div>
			</div>
		</nav>
	</header>

	<div id="wrapper-page">
		<div class="container">
