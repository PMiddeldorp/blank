<!-- nav -->
<nav id="nav" role="navigation" aria-label="main">
  <?php
    wp_nav_menu(
      array(
        'theme_location' => 'hoofdmenu',
        'container' => '',
        'items_wrap' => '<ul role="list">%3$s</ul>',
      )
    );
  ?>
</nav>
