<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?></title>

		<?php wp_head(); ?>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		
	</head>
	<body <?php body_class(); ?>>
			
		<a class="sr-only" href="#main">Skip to main content</a>

		<!-- wrapper -->
		<div id="wrapper">

			<!-- header -->
			<header id="header" role="banner">
				<div class="container">
					<div class="row">

						<?php get_template_part('templates/components/base/logo');?>

						<?php get_template_part('templates/components/base/nav');?>

						<?php get_template_part('templates/components/base/hamburger');?>

					</div>
				</div>
			</header>