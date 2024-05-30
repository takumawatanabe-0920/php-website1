<?php

/**
 * Template Name: Math
 */
?>

<?php wp_head(); ?>

<h1>
  math.php
</h1>


<div>
  <ul>
    <?php
    $args = array(
      'tag' => 'Math',
      'posts_per_page' => -1
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
      }
    } else {
      echo '<li>Post not found</li>';
    }

    // クエリをリセット
    wp_reset_postdata();
    ?>
  </ul>
</div>

<p>end of math.php</p>

<?php wp_footer(); ?>