<?php get_header(); ?>

<main role="main">
	<!-- section -->
	<section>

		<h1>Latest posts</h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<?php endwhile; ?>
		<?php else: ?>
		<?php endif; ?>

	</section>
	<!-- /section -->
</main>

<?php get_footer(); ?>
