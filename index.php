<?php get_header(); ?>

<main id="main">
	<div class="container">

		<h1>Latest posts</h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<article>
			<header>
				<h2><?php the_title();?></h2>
				<?php the_excerpt();?>
				<a href="<?php the_permalink();?>">read more</a>
			</article>
		</article>
		<?php endwhile; ?>
		<?php else: ?>
		<?php endif; ?>


	</div>
</main>

<?php get_footer(); ?>