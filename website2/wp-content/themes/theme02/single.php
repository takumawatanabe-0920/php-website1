<?php get_header(); ?>

<!-- <h1>single.php</h1> -->

<main id="main" class="site-main">
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
  ?>
      <article>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); // the_content フィルターが適用される場所 
        ?>
        <?php
        $tags = get_the_tags();
        if ($tags) {
          echo '<ul>';
          foreach ($tags as $tag) {
            echo '<li>' . $tag->name . '</li>';
          }
          echo '</ul>';
        }
        ?>
        <?php
        $content = get_the_content();
        echo $content;
        ?>
      </article>
  <?php
    endwhile;
  endif;
  ?>
</main>

<?php get_footer(); ?>