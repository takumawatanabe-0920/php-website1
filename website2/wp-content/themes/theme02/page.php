<?php wp_head(); ?>

<h1>
  page.php
</h1>


<div>
  <?php
  if (have_posts()) :
    while (have_posts()) : the_post();
      the_content();
    endwhile;
  endif;
  ?>

</div>

<p>end of page.php</p>

<?php wp_footer(); ?>