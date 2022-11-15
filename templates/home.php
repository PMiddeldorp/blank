<?php /* Template Name: Home */ get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<main id="main">
  <div class="container">
    <h1><?php the_title();?></h1>
    <?php the_content();?>
    <button class="open-modal" aria-expanded="false" aria-controls="modal" role="button">Open modal</button>

    <h2>Grid</h2>
    <div class="grid">
      <div></div>
      <div></div>
    </div>
    <div class="grid">
      <div></div>
      <div></div>
      <div></div>
    </div>
    <div class="grid">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
</main>

<?php endwhile; ?>
<?php else: ?>
<?php endif; ?>
<?php get_footer(); ?>
