<?php wp_head(); ?>

<h1>index.php</h1>

<!-- <div>
  <?php
  if (is_user_logged_in()) {
    echo "You are logged in.";
  } else {
    echo "You are not logged in.";
  }
  ?>
</div>

<div>
  <?php
  global $wpdb;

  $post_title = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE post_title = 'Hello World!' AND post_status = 'publish' AND post_type = 'post'");

  // 取得した投稿タイトルを表示
  if ($post_title) {
    echo '<h1>' . esc_html($post_title) . '</h1>';
  } else {
    echo '<h1>Post not found</h1>';
  }

  echo "the id is " . get_the_ID();
  ?>
</div> -->

<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <?php
    if (have_posts()) :
      while (have_posts()) :
        the_post();
    ?>
        <div style="max-width: 500px; border: 2px solid black; margin-bottom: 20px; padding: 10px;">
          <h2><?php the_title(); ?></h2>
          <p style="color: darkgray;"><?php the_author(); ?></p>
          <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
          <a href="<?php the_permalink(); ?>">Read more</a>
        </div>
    <?php
      endwhile;
    else :
    endif;
    ?>
  </main>
</div>

<?php wp_footer(); ?>